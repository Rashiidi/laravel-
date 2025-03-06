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
            <!-- <p class="text-gray-700 mt-2"><strong>Date:</strong> {{ $event->date }}</p> -->
        </div>
    @endforeach
</div>

{{ $events->links() }}

@endsection