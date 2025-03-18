@extends('websitelayout.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">{{ $event->title }}</h1>

    <div class="card border-0 shadow-sm rounded-lg overflow-hidden bg-white">
        <div class="card-body text-dark p-4">
            <p class="card-text"><strong>Location:</strong> {{ $event->location }}</p>
            <p class="card-text"><strong>Date:</strong> {{ $event->date }}</p>
            <p class="card-text">{{ $event->description }}</p>

            @if(Auth::check())
            <form action="{{ route('events.register', $event->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            @else
            <p class="text-danger">
                You must <a href="{{ route('login', ['redirect' => url()->current()]) }}">log in</a> to register for this event.
            </p>
            @endif

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger mt-3">{{ session('error') }}</div>
            @endif
        </div>
    </div>

    <!-- Feedback Form -->
    <div class="mt-5">
        <h3 class="text-primary fw-bold">Leave Feedback</h3>
        @if(Auth::check())
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <div class="mb-3">
                <textarea name="comment" class="form-control" placeholder="Write your feedback..." rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <select name="rating" class="form-control" required>
                    <option value="" disabled selected>Rate the event</option>
                    <option value="5">5 - Excellent</option>
                    <option value="4">4 - Good</option>
                    <option value="3">3 - Average</option>
                    <option value="2">2 - Poor</option>
                    <option value="1">1 - Terrible</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Submit Feedback</button>
        </form>
        @else
        <p class="text-danger">
            You must <a href="{{ route('login', ['redirect' => url()->current()]) }}">log in</a> to leave feedback.
        </p>
        @endif
    </div>

    <!-- Display Feedback -->
    <div class="mt-5">
        <h3 class="text-primary fw-bold">User Feedback</h3>
        @forelse($event->feedback as $feedback)
            <div class="border p-3 mt-3">
                <p><strong>{{ $feedback->user->name }}</strong> ({{ $feedback->rating }} stars)</p>
                <p>{{ $feedback->comment }}</p>
                <p class="text-muted">{{ $feedback->created_at->diffForHumans() }}</p>
            </div>
        @empty
            <p>No feedback available for this event.</p>
        @endforelse
    </div>
</div>
@endsection