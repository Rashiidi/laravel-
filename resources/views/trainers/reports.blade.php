@extends('trainerlayout.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">Trainer Reports</h1>

    <div class="card border-0 shadow-sm rounded-lg overflow-hidden bg-white">
        <div class="card-body text-dark p-4">
            <h2 class="text-xl font-bold mb-4">Activity Reports</h2>
            <p>Total Participants: {{ $totalParticipants }}</p>
            <p>Attendance Rate: {{ $attendanceRate }}%</p>
        </div>
    </div>
</div>
@endsection