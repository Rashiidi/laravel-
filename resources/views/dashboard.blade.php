@extends('adminlayout.app')

@section('content')
<!-- Main Content -->
<div class="flex-1 p-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Fitness Dashboard</h1>
        <a href="{{ route('admin.email.form') }}" class="bg-purple-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-purple-700 transition">
        📧 Send Email to Trainers
    </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg shadow-md transition duration-300 flex items-center">
                <i class="fas fa-sign-out-alt mr-2"></i>Logout
            </button>
        </form>

    

    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Activities Card -->
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-500 text-sm font-semibold">Total Events</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalEvents }}</p>
                </div>
                <div class="bg-blue-100 p-4 rounded-full">
                    <i class="fas fa-running text-blue-500 text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Services Card -->
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-500 text-sm font-semibold">Total Services</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalServices }}</p>
                </div>
                <div class="bg-green-100 p-4 rounded-full">
                    <i class="fas fa-dumbbell text-green-500 text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Users Card -->
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-500 text-sm font-semibold">Total Users</h3>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalUsers }}</p>
                </div>
                <div class="bg-purple-100 p-4 rounded-full">
                    <i class="fas fa-users text-purple-500 text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifications Section -->
    <div class="notifications">
    @foreach($notifications as $notification)
        <div class="notification">
            <strong>{{ $notification->title }}</strong>
            <p>{{ $notification->message }}</p>
        </div>
    @endforeach
</div>


    <!-- Registered Events Section -->
     
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-6 border-b border-gray-200">
@if(Auth::check() && Auth::user()->role !== 'admin')
    <a href="{{ route('my-registrations') }}" class="nav-link">My Registrations</a>
@endif        </div>

        @if($registrations->isEmpty())
            <div class="p-6 text-gray-500">
                <i class="fas fa-calendar-times mr-2"></i>No registered events found
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
    @foreach($registrations as $registration)
        <tr class="hover:bg-gray-50 transition duration-150">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{ $registration->event->title ?? 'N/A' }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $registration->event->date ?? 'N/A' }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $registration->event->location ?? 'N/A' }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm">
                <div class="flex space-x-2">
                    <a href="{{ route('registrations.edit', $registration->id) }}" class="text-blue-500 hover:text-blue-600 px-3 py-1 rounded-md transition duration-300">
                        <i class="fas fa-edit mr-1"></i>Edit
                    </a>
                    <form action="{{ route('cancel-registration', $registration->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-600 px-3 py-1 rounded-md transition duration-300">
                            <i class="fas fa-trash-alt mr-1"></i>Cancel
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection