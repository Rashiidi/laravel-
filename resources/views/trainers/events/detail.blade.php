@extends('trainerlayout.app')

@section('content')
<div class="container py-4">
    <h1 class="text-primary mb-4">{{ $event->title }}</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-primary">Event Details</h5>
            <p><strong>Location:</strong> {{ $event->location }}</p>
            <p><strong>Date:</strong> {{ $event->date }}</p>
            <p><strong>Description:</strong> {{ $event->description }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('trainer.participants', $event->id) }}" class="btn btn-secondary">
            Manage Participants
        </a>
    </div>
</div>
@endsection