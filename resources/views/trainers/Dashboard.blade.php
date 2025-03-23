@extends('trainerlayout.app')

@section('content')
<div class="container py-4">
    <h1 class="text-primary mb-4">Trainer Dashboard</h1>

    @if ($events->isEmpty())
        <div class="alert alert-warning">
            <strong>No events assigned yet.</strong> Please check back later or contact the admin for assignments.
        </div>
    @else
        <div class="row">
            @foreach ($events as $event)
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                        <p><strong>Date:</strong> {{ $event->date }}</p>

                        <a href="{{ route('trainer.participants', $event->id) }}" class="btn btn-primary">View Participants</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection