@extends('websitelayout.app')

@section('content')

<h1 class="text-3xl font-bold mb-4">Services Page</h1>
<p class="mb-6 text-gray-700">Welcome to the Services Page! Discover our range of services.</p>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($services as $service)
        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
            <h5 class="text-xl font-semibold text-gray-900">{{ $service->name }}</h5>
            <p class="text-gray-700 mt-2">{{ $service->description }}</p>
            <p class="text-gray-700 mt-2"><strong>Price:</strong> ${{ $service->price }}</p>
        </div>
    @endforeach
</div>

<!-- Pagination Links -->
<div class="mt-6">
    {{ $services->links() }}
</div>

@endsection