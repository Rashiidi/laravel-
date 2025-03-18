@if(Auth::check())
    <form action="{{ route('feedback.store') }}" method="POST">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event->id }}">
        <textarea name="comment" class="form-control" placeholder="Write your feedback..." required></textarea>
        <select name="rating" class="form-control mt-2" required>
            <option value="5">5 - Excellent</option>
            <option value="4">4 - Good</option>
            <option value="3">3 - Average</option>
            <option value="2">2 - Poor</option>
            <option value="1">1 - Terrible</option>
        </select>
        <button type="submit" class="btn btn-primary mt-3">Submit Feedback</button>
    </form>
@endif

<h3 class="mt-5">User Feedback</h3>
@foreach($event->feedback as $feedback)
    <div class="border p-3 mt-3">
        <p><strong>{{ $feedback->user->name }}</strong> ({{ $feedback->rating }} stars)</p>
        <p>{{ $feedback->comment }}</p>
        <p class="text-muted">{{ $feedback->created_at->diffForHumans() }}</p>
    </div>
@endforeach