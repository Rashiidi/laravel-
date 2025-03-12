@extends('adminlayout.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">Create Event</h1>

    <div class="card shadow-sm border-0 rounded p-4 bg-white">
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Event Title</label>
                <input type="text" name="title" id="title" 
                    class="form-control" 
                    placeholder="Enter event title" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label fw-bold">Location</label>
                <input type="text" name="location" id="location" 
                    class="form-control" 
                    placeholder="Enter event location" required>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label fw-bold">Date</label>
                <input type="date" name="date" id="date" 
                    class="form-control" 
                    required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea name="description" id="description" 
                    class="form-control" 
                    placeholder="Enter event description"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                    <i class="fas fa-plus"></i> Create Event
                </button>
            </div>
        </form>
    </div>
</div>

@endsection