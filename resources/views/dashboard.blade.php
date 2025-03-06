@extends('adminlayout.app')

@section('content')

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Fitness Application</h1>
                <div>
                    <span class="mr-4">Admin</span>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
        </form>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-lg font-semibold">Total Events</h2>
                    <p class="text-2xl font-bold">{{ $totalEvents }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-lg font-semibold">Total Services</h2>
                    <p class="text-2xl font-bold">{{ $totalServices }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-lg font-semibold">Revenue</h2>
                    <p class="text-2xl font-bold">$125</p>
                </div>
            </div>
@endsection