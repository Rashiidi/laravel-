@extends('trainerlayout.app')

@section('content')
<div class="container py-4">
    <h1 class="text-primary mb-4">Participants for Event: {{ $event->title }}</h1>

    <p><strong>Location:</strong> {{ $event->location }}</p>
    <p><strong>Date:</strong> {{ $event->date }}</p>
    <p><strong>Description:</strong> {{ $event->description }}</p>

    <h3 class="mt-4">Registered Participants:</h3>
    @if (!is_iterable($participants) || $participants->isEmpty())

        <div class="alert alert-warning">
            <strong>No participants registered for this event yet.</strong>
        </div>
    @else
        <ul class="list-group">
            @foreach ($participants as $participant)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $participant->name }} ({{ $participant->email }})
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection 
