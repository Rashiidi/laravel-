@extends('websitelayout.app')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-blue-900 to-purple-900 text-white py-16 px-4">
    <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-5xl font-bold mb-4 animate-fade-in-down">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-blue-300">
                Upcoming Events
            </span>
        </h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto leading-relaxed">
            Discover our curated fitness events and transformative wellness experiences.
        </p>
    </div>
</div>

<!-- Featured Event Section -->
<div class="max-w-6xl mx-auto px-4 py-12">
    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">
        <div class="md:w-1/2">
            <img src="{{ asset('images/fitness.jpeg') }}" alt="Featured Event" class="w-full h-full object-cover">
        </div>
        <div class="p-8 md:w-1/2 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-white mb-4">Featured Event: Ultimate Bootcamp</h2>
            <p class="text-gray-300 mb-6">
                Join our Ultimate Bootcamp for an intense workout experience designed to push your limits. Enjoy live coaching, interactive challenges, and a community that supports your journey to peak fitness.
            </p>
            <a href="{{ route('activities.show', 1) }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-cyan-500 to-blue-500 text-white rounded-lg font-medium hover:from-cyan-600 hover:to-blue-600 transition-all duration-300">
                Learn More
                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</div>

<!-- Why Attend Our Events Section -->
<div class="bg-gray-800 py-12">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-white">Why Attend Our Events?</h2>
            <p class="text-gray-400 mt-2">
                Experience the benefits of community, expert training, and personalized fitness guidance.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="p-6 bg-gray-900 rounded-xl shadow-md">
                <h3 class="text-xl font-bold text-white mb-2">Expert Coaching</h3>
                <p class="text-gray-300">Train with industry professionals who have years of experience and a passion for helping you succeed.</p>
            </div>
            <div class="p-6 bg-gray-900 rounded-xl shadow-md">
                <h3 class="text-xl font-bold text-white mb-2">Community Support</h3>
                <p class="text-gray-300">Join a like-minded community that motivates you to achieve your fitness goals together.</p>
            </div>
            <div class="p-6 bg-gray-900 rounded-xl shadow-md">
                <h3 class="text-xl font-bold text-white mb-2">Innovative Workouts</h3>
                <p class="text-gray-300">Experience diverse training sessions and interactive fitness challenges to keep your routine exciting.</p>
            </div>
        </div>
    </div>
</div>

<!-- Events Grid Heading -->
<div class="max-w-6xl mx-auto px-4 py-4">
    <h2 class="text-3xl font-bold text-white mb-8">Upcoming Events</h2>
</div>

<!-- Events Grid -->
<div class="max-w-6xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($events as $event)
        <div class="relative group bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-cyan-500 to-blue-500"></div>
            <div class="p-6">
                <div class="flex items-start mb-4">
                    <div class="bg-gradient-to-br from-cyan-500 to-blue-500 p-2 rounded-lg mr-4 shadow-md">
                        <i class="fas fa-calendar-alt text-white text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-white mb-1">{{ $event->title }}</h3>
                        <p class="text-cyan-400 text-sm font-medium">{{ $event->location }}</p>
                    </div>
                </div>
                <p class="text-gray-300 text-sm leading-relaxed mb-4 line-clamp-3">
                    {{ $event->description }}
                </p>
                <a href="{{ route('activities.show', $event->id) }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-cyan-500 to-blue-500 text-white rounded-lg font-medium hover:from-cyan-600 hover:to-blue-600 transition-all duration-300 group">
                    <span>View Details</span>
                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-12">
        {{ $events->links('pagination::tailwind') }}
    </div>
</div>
@endsection

@section('styles')
<style>
    .animate-fade-in-down {
        animation: fadeInDown 0.8s ease-out both;
    }
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .pagination {
        @apply flex justify-center mt-12;
    }
    .pagination .page-item {
        @apply mx-1;
    }
    .pagination .page-link {
        @apply bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors;
    }
    .pagination .active .page-link {
        @apply bg-gradient-to-r from-cyan-500 to-blue-500 text-white;
    }
</style>
@endsection
