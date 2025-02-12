@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4 text-primary">Create New Event</h1>

    <form action="store" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Event Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Event</button>
    </form>
</div>
@endsection
