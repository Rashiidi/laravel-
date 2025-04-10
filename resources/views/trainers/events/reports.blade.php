@extends('trainerlayout.app')

@section('content')
<div class="container py-4">
    <h1 class="text-primary mb-4">Event Reports</h1>

    <!-- Filter Form -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="GET" action="{{ route('trainer.reports') }}" class="row g-3 align-items-center">
                <div class="col-md-4">
                    <label class="form-label">Start Date:</label>
                    <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">End Date:</label>
                    <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-filter me-2"></i>Filter Results
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-3 col-6 mb-3">
            <div class="card dashboard-card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Events</h5>
                    <p class="display-6">{{ $totalEvents }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <div class="card dashboard-card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Participants</h5>
                    <p class="display-6">{{ $totalParticipants }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <div class="card dashboard-card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Average Attendance</h5>
                    <p class="display-6">{{ $averageParticipants }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <div class="card dashboard-card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">Attendance Rate</h5>
                    <p class="display-6">{{ $attendanceRate }}%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row mb-4">
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Attendance Overview</h5>
                    <canvas id="attendanceChart" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Event Participation</h5>
                    <canvas id="participationChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Breakdown Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title mb-4">Event Breakdown</h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Event</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Participants</th>
                            <th>Attended</th>
                            <th>Attendance Rate</th>
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
                            <td>
                                @php
                                    $participants = is_iterable($event->participants) ? count($event->participants) : 0;
                                    $attended = is_iterable($event->registrations) ? $event->registrations->where('attended', true)->count() : 0;
                                    $rate = $participants > 0 ? round(($attended / $participants) * 100) : 0;
                                @endphp
                                <div class="progress" style="height: 25px;">
                                    <div class="progress-bar bg-success" role="progressbar" 
                                         style="width: {{ $rate }}%" 
                                         aria-valuenow="{{ $rate }}" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100">
                                        {{ $rate }}%
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Attendance Chart (Doughnut)
    const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
    new Chart(attendanceCtx, {
        type: 'doughnut',
        data: {
            labels: ['Attended', 'Registered'],
            datasets: [{
                data: [{{ $totalAttended }}, {{ $totalParticipants - $totalAttended }}],
                backgroundColor: ['#4caf50', '#2196f3'],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' },
                tooltip: { enabled: true }
            }
        }
    });

    // Participation Chart (Line)
    const participationCtx = document.getElementById('participationChart').getContext('2d');
    new Chart(participationCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($events->pluck('date')) !!},
            datasets: [{
                label: 'Participants',
                data: {!! json_encode($events->map(function($event) { 
                    return is_iterable($event->participants) ? count($event->participants) : 0; 
                })) !!},
                borderColor: '#2196f3',
                tension: 0.4,
                fill: false
            },
            {
                label: 'Attended',
                data: {!! json_encode($events->map(function($event) { 
                    return is_iterable($event->registrations) ? $event->registrations->where('attended', true)->count() : 0; 
                })) !!},
                borderColor: '#4caf50',
                tension: 0.4,
                fill: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            },
            plugins: {
                legend: { position: 'top' }
            }
        }
    });
</script>
@endsection