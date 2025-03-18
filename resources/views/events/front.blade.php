@extends('websitelayout.app')

@section('content')

<h1 class="text-3xl font-bold mb-4">Events Page</h1>
<p class="mb-6 text-gray-700">Welcome to the Events Page! Stay updated with the latest events and activities.</p>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($events as $event)
        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
            <h5 class="text-xl font-semibold text-gray-900">{{ $event->title }}</h5>
            <h4 class="text-gray-600">{{ $event->location }}</h4>
            <p class="text-gray-700 mt-2">{{ $event->description }}</p>
            <a href="{{ route('activities.show', $event->id) }}" class="btn btn-primary mt-2">View Details</a>
        </div>
    @endforeach
</div>

{{ $events->links() }}

@endsection

@section('styles')
<style>
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
        padding: 0.5rem 1rem;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 1rem;
        margin: 0.25rem 0;
        cursor: pointer;
        border-radius: 0.25rem;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .card {
        transition: transform 0.2s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection