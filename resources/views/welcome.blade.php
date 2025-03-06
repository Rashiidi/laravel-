@extends('websitelayout.app')

@section('content')

<h1 class="text-3xl font-bold mb-4">Welcome to Our Website</h1>
<p class="mb-6 text-gray-700">Stay updated with the latest events and discover our range of services.</p>

<!-- Events Section -->
<h2 class="text-2xl font-bold mb-4">Upcoming Events</h2>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    @foreach ($events as $event)
        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
            <h5 class="text-xl font-semibold text-gray-900">{{ $event->title }}</h5>
            <h4 class="text-gray-600">{{ $event->location }}</h4>
            <p class="text-gray-700 mt-2">{{ $event->description }}</p>
            <!-- <p class="text-gray-700 mt-2"><strong>Date:</strong> {{ $event->date }}</p> -->
        </div>
    @endforeach
</div>

<!-- Services Section -->
<h2 class="text-2xl font-bold mb-4">Our Services</h2>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($services as $service)
        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
            <h5 class="text-xl font-semibold text-gray-900">{{ $service->name }}</h5>
            <p class="text-gray-700 mt-2">{{ $service->description }}</p>
            <p class="text-gray-700 mt-2"><strong>Price:</strong> ${{ $service->price }}</p>
        </div>
    @endforeach
</div>

@endsection