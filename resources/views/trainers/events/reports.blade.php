@extends('trainerlayout.app')

@section('content')
<div class="container py-4">
    <h1 class="text-primary mb-4">Reports</h1>
    <form method="GET" action="{{ route('trainer.reports') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <input type="date" name="start_date" class="form-control" placeholder="Start Date" required>
            </div>
            <div class="col-md-4">
                <input type="date" name="end_date" class="form-control" placeholder="End Date" required>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <div class="row">
        @foreach ($events as $event)
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p><strong>Participants:</strong> {{ $event->participants ? $event->participants->count() : 0 }}</p>
                    <p><strong>Attendance:</strong> {{ $event->participants && $event->participants->where('attendance', 'present') ? $event->participants->where('attendance', 'present')->count() : 0 }}</p>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
