@extends('trainerlayout.app')

@section('content')
<div class="container py-4">
    <h1 class="text-primary">Event Reports</h1>

    <form method="GET" action="{{ route('trainer.reports') }}">
        <label>Start Date:</label>
        <input type="date" name="start_date" value="{{ request('start_date') }}">
        <label>End Date:</label>
        <input type="date" name="end_date" value="{{ request('end_date') }}">
        <button type="submit">Filter</button>
    </form>

    <h3>Summary</h3>
    <p>Total Events: <strong>{{ $totalEvents }}</strong></p>
    <p>Total Participants: <strong>{{ $totalParticipants }}</strong></p>
    <p>Average Participants per Event: <strong>{{ $averageParticipants }}</strong></p>
    <p>Total Attended: <strong>{{ $totalAttended }}</strong></p>
    <p>Attendance Rate: <strong>{{ $attendanceRate }}%</strong></p>

    <h3>Event Breakdown</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Event</th>
                <th>Date</th>
                <th>Location</th>
                <th>Participants</th>
                <th>Attended</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($events as $event)
        <tr>
            <td>{{ $event->title }}</td>
            <td>{{ $event->date }}</td>
            <td>{{ $event->location }}</td>
            <td>{{ is_iterable($event->participants) ? count($event->participants) : 0 }}</td>
            <td>{{ is_iterable($event->registrations) ? $event->registrations->where('attended', true)->count() : 0 }}</td>
        </tr>
    @endforeach
</tbody>




    </table>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="eventChart"></canvas>

