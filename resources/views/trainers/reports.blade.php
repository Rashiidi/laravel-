@extends('adminlayout.app')

@section('content')
<div class="container py-4">
    <h1 class="text-primary mb-4">Reports</h1>
    <div class="row">
        @foreach ($events as $event)
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p><strong>Participants:</strong> {{ $event->participants->count() }}</p>
                    <p><strong>Attendance:</strong> {{ $event->participants->where('attendance', 'present')->count() }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection