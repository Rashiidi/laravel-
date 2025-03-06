@extends('adminlayout.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">Edit Event</h1>

    <div class="card shadow-sm border-0 rounded p-4 bg-white">
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Event Title</label>
                <input type="text" name="title" id="title" 
                    class="form-control" 
                    value="{{ old('title', $event->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label fw-bold">Location</label>
                <input type="text" name="location" id="location" 
                    class="form-control" 
                    value="{{ old('location', $event->location) }}" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

@endsection