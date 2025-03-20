@extends('trainerlayout.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">Trainer Dashboard</h1>

    <!-- Assigned Activities Section -->
    <div class="card border-0 shadow-sm rounded-lg overflow-hidden bg-white mb-5">
        <div class="card-body text-dark p-4">
            <h2 class="text-xl font-bold mb-4">Assigned Activities</h2>

            @if ($activities && $activities->count() > 0)
                <ul class="list-group">
                    @foreach ($activities as $activity)
                        <li class="list-group-item">
                            <strong>{{ $activity->title }}</strong> <br>
                            <span>Date: {{ $activity->date }}</span> <br>
                            <span>Location: {{ $activity->location }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No activities assigned yet.</p>
            @endif
        </div>
    </div>

    <!-- Registrations Section -->
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($registrations as $registration)
        <tr class="hover:bg-gray-50 transition duration-150">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $registration->user->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $registration->event->title }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $registration->attended ? 'Yes' : 'No' }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm">
                <form action="{{ route('trainers.markAttendance', $registration->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <label>
                        <input type="checkbox" name="attended" {{ $registration->attended ? 'checked' : '' }} onchange="this.form.submit()">
                        Mark as Attended
                    </label>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
@endsection