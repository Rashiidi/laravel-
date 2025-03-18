@extends('websitelayout.app')

@section('content')

<h1 class="text-3xl font-bold mb-4">Feedback Page</h1>
<p class="mb-6 text-gray-700">This is where user feedback will be displayed.</p>

@foreach ($feedbacks as $feedback)
    <div class="border p-3 mt-3">
        <p><strong>{{ $feedback->user->name }}</strong> ({{ $feedback->rating }} stars)</p>
        <p>{{ $feedback->comment }}</p>
        <p class="text-muted">{{ $feedback->created_at->diffForHumans() }}</p>
    </div>
@endforeach

@if(Auth::check())
    <form action="{{ route('feedback.store') }}" method="POST" class="mt-6">
        @csrf
        <textarea name="comment" class="form-control w-full p-2 border rounded" placeholder="Write your feedback..." required></textarea>
        <select name="rating" class="form-control mt-2 p-2 border rounded" required>
            <option value="5">5 - Excellent</option>
            <option value="4">4 - Good</option>
            <option value="3">3 - Average</option>
            <option value="2">2 - Poor</option>
            <option value="1">1 - Terrible</option>
        </select>
        <button type="submit" class="btn btn-primary mt-3">Submit Feedback</button>
    </form>
@else
    <p class="text-danger">You must <a href="{{ route('login') }}">log in</a> to submit feedback.</p>
@endif

@endsection