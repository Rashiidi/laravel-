@extends('adminlayout.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Manage Events</h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>New Event
        </a>
    </div>

    <!-- Session Success Message -->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center mb-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($events as $event)
        <div class="col">
            <div class="card h-100 border-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3">{{ $event->title }}</h5>
                    <div class="bg-light p-3 rounded mb-3">
                        <p class="mb-1"><strong>Location:</strong> {{ $event->location }}</p>
                        <p class="mb-1"><strong>Date:</strong> {{ $event->date }}</p>
                        <p class="mb-0 text-muted small"><strong>Description:</strong> {{ $event->description }}</p>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100" 
                                onclick="return confirm('Delete this event?')">
                                <i class="fas fa-trash me-2"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .card {
        transition: transform 0.2s;
        border: 1px solid #2c3e50;
        border-radius: 8px;
    }
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(44, 62, 80, 0.1);
    }
    .btn-primary {
        background-color: #2c3e50;
        border-color: #2c3e50;
    }
    .btn-outline-primary {
        border-color: #2c3e50;
        color: #2c3e50;
    }
    .btn-outline-primary:hover {
        background-color: #2c3e50;
        color: white;
    }
    .card-title {
        min-height: 3rem;
    }
</style>

@endsection