@extends('adminlayout.app')

@section('content')

<div class="container py-8">
    <div class="d-flex justify-content-between align-items-center mb-6">
        <h1 class="text-4xl font-extrabold bg-gradient-to-r from-cyan-600 to-blue-600 bg-clip-text text-transparent">
            Event Management
        </h1>
        <a href="{{ route('events.create') }}" class="group relative inline-flex items-center overflow-hidden rounded-xl bg-gradient-to-br from-cyan-600 to-blue-600 px-6 py-3 text-white shadow-lg transition-all duration-300 hover:from-cyan-700 hover:to-blue-700 hover:shadow-xl">
            <svg class="mr-2 h-5 w-5 transition-all group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Create New Event
        </a>
    </div>

    @if (session('success'))
    <div class="relative mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-800 shadow-lg" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
        <button class="absolute top-0 right-0 px-3 py-2" onclick="this.parentElement.remove()">
            <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                <path d="M10 8.586L14.95 3.636l1.414 1.414L11.414 10l4.95 4.95-1.414 1.414L10 11.414l-4.95 4.95-1.414-1.414L8.586 10 3.636 5.05l1.414-1.414L10 8.586z"/>
            </svg>
        </button>
    </div>
    @endif

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($events as $event)
        <div class="group relative flex flex-col rounded-2xl bg-white shadow-xl transition-all duration-300 hover:shadow-2xl">
            <div class="absolute inset-0 translate-y-1 bg-gradient-to-r from-cyan-100 to-blue-100 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
            <div class="relative flex-1 px-6 pt-6">
                <div class="flex items-center justify-between">
                    <span class="inline-flex items-center rounded-full bg-cyan-100 px-3 py-1 text-sm font-medium text-cyan-800">
                        #{{ $event->id }}
                    </span>
                    <div class="flex space-x-2">
                        <a href="{{ route('events.edit', $event->id) }}" class="rounded-lg p-2 text-gray-400 transition-all hover:bg-gray-100 hover:text-cyan-600">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                            </svg>
                        </a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this event?')" class="rounded-lg p-2 text-gray-400 transition-all hover:bg-gray-100 hover:text-red-600">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                <h3 class="mt-4 text-2xl font-bold text-gray-900">{{ $event->title }}</h3>
                <div class="mt-4 space-y-2 text-gray-600">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="ml-2">{{ $event->location }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 flex-shrink-0 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="ml-2">{{ $event->date }}</span>
                    </div>
                </div>
                <p class="mt-4 text-gray-600 line-clamp-3">{{ $event->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .shadow-xl {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .hover\:shadow-2xl:hover {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
</style>

@endsection