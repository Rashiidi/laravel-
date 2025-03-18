@extends('adminlayout.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">Edit Registration</h1>

    <form action="{{ route('registrations.update', $registration->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
    <label for="eventTitle" class="form-label">Event Title</label>
    <input type="text" class="form-control" id="eventTitle" name="title" value="{{ $event->title }}">
</div>

<div class="mb-3">
    <label for="eventDate" class="form-label">Event Date</label>
    <input type="text" class="form-control" id="eventDate" name="date" value="{{ $event->date }}">
</div>

<div class="mb-3">
    <label for="eventLocation" class="form-label">Event Location</label>
    <input type="text" class="form-control" id="eventLocation" name="location" value="{{ $event->location }}">
</div>
        

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif
</div>
@endsection