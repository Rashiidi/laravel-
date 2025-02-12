@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4 text-primary">Upcoming Events</h1>
      <!-- Create Event Button -->
      <a href="/CreateEvent" class="btn btn-success mb-3">Create Event</a>

    
    <div class="row">
        @foreach ($events as $event)
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <small class="text-muted">Event #{{ $event->id }}</small>
                        <span class="badge bg-primary">Featured</span>
                    </div>
                    <h3 class="card-title">{{ $event->title }}</h3>
                    <p class="card-text">
                        <i class="fas fa-map-marker-alt"></i> {{ $event->location }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .card {
        transition: transform 0.2s;
        border-radius: 8px;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .badge {
        font-size: 0.8rem;
        padding: 0.4em 0.8em;
    }
</style>
@endsection