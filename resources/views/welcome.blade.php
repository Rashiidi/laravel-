@extends('websitelayout.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-blue-900 via-blue-700 to-purple-900 text-white py-24 px-4 overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noiseFilter"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.65" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noiseFilter)"/%3E%3C/svg%3E');"></div>
    <div class="max-w-6xl mx-auto text-center relative">
        <h1 class="text-6xl font-extrabold mb-6 animate-fade-in-down">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-blue-300">Welcome to Fitness Hub</span>
        </h1>
        <p class="text-xl mb-8 text-blue-100 font-light tracking-wide">Transform Your Life Through Fitness & Wellness</p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('activities.index') }}" class="group relative bg-white/10 backdrop-blur-sm text-white px-8 py-4 rounded-full font-semibold hover:bg-white/20 transition-all duration-300 shadow-2xl hover:shadow-3xl transform hover:scale-105">
                <span class="relative z-10">Explore Events</span>
                <div class="absolute inset-0 rounded-full border-2 border-white/30 group-hover:border-white/50 transition-colors"></div>
            </a>
            <a href="#services" class="group relative border-2 border-white/30 px-8 py-4 rounded-full font-semibold hover:border-white/50 text-white hover:bg-white/10 transition-all duration-300 backdrop-blur-sm transform hover:scale-105">
                <span class="relative z-10">Our Services</span>
                <div class="absolute inset-0 rounded-full bg-white/0 group-hover:bg-white/5 transition-colors"></div>
            </a>
        </div>
    </div>
</div>

<!-- Featured Events Section -->
<div class="max-w-6xl mx-auto px-4 py-20">
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4 relative inline-block">
            <span class="relative z-10">Upcoming Events</span>
            <div class="absolute bottom-0 left-0 w-full h-3 bg-blue-100 opacity-50 -rotate-1"></div>
        </h2>
        <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto">Join our exciting fitness events and challenges designed to push your limits</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
        @foreach ($events as $event)
        <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden group transform hover:-translate-y-2">
            <div class="p-6 relative">
                <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-blue-400 to-purple-400"></div>
                <div class="flex items-center mb-4 mt-2">
                    <div class="bg-gradient-to-br from-blue-500 to-purple-500 p-3 rounded-xl mr-4 shadow-md">
                        <i class="fas fa-calendar-alt text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">{{ $event->title }}</h3>
                        <p class="text-gray-600 text-sm font-medium">{{ $event->location }}</p>
                    </div>
                </div>
                <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">{{ $event->description }}</p>
                <div class="flex justify-between items-center text-sm">
                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-medium text-xs uppercase tracking-wide">Coming Soon</span>
                    <span class="text-gray-500 font-medium">{{ $event->date }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Services Section -->
<div id="services" class="bg-gradient-to-b from-gray-50 to-white py-20">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4 relative inline-block">
                <span class="relative z-10">Our Services</span>
                <div class="absolute bottom-0 left-0 w-full h-3 bg-purple-100 opacity-50 -rotate-1"></div>
            </h2>
            <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto">Professional fitness services tailored to your personal goals and needs</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service)
            <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="p-6">
                    <div class="flex items-start mb-4">
                        <div class="bg-gradient-to-br from-purple-500 to-blue-500 p-3 rounded-xl mr-4 shadow-md">
                            <i class="fas fa-dumbbell text-white text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800">{{ $service->name }}</h3>
                            <p class="text-gray-600 mt-3 leading-relaxed">{{ $service->description }}</p>
                            <div class="mt-6 flex justify-between items-center">
                                <span class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">${{ $service->price }}</span>
                                <button class="group relative bg-gradient-to-r from-purple-500 to-blue-500 text-white px-5 py-2.5 rounded-xl font-medium hover:from-purple-600 hover:to-blue-600 transition-all duration-300 shadow-md hover:shadow-lg">
                                    <span class="relative z-10">Learn More</span>
                                    <div class="absolute inset-0 rounded-xl border-2 border-white/20 group-hover:border-white/30 transition-colors"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-purple-900 text-white py-20 px-4">
    <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noiseFilter"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.65" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noiseFilter)"/%3E%3C/svg%3E');"></div>
    <div class="max-w-4xl mx-auto text-center relative">
        <h2 class="text-3xl font-bold mb-6">Start Your Fitness Journey Today</h2>
        <p class="text-lg mb-8 text-blue-100 font-light max-w-xl mx-auto">Join our community of 50,000+ members transforming their lives</p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('register', ['eventId' => $event->id]) }}" class="group relative bg-white/10 backdrop-blur-sm text-white px-8 py-4 rounded-full font-semibold hover:bg-white/20 transition-all duration-300 shadow-2xl hover:shadow-3xl transform hover:scale-105">
                <span class="relative z-10">Get Started</span>
                <div class="absolute inset-0 rounded-full border-2 border-white/30 group-hover:border-white/50 transition-colors"></div>
            </a>
            <a href="{{ route('about') }}" class="group relative border-2 border-white/30 px-8 py-4 rounded-full font-semibold hover:border-white/50 text-white hover:bg-white/10 transition-all duration-300 backdrop-blur-sm transform hover:scale-105">
                <span class="relative z-10">Learn More</span>
                <div class="absolute inset-0 rounded-full bg-white/0 group-hover:bg-white/5 transition-colors"></div>
            </a>
        </div>
    </div>
</div>

<style>
    .animate-fade-in-down {
        animation: fadeInDown 0.8s ease-out both;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
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

    /* Subtle floating animation */
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    .hover\:animate-float:hover {
        animation: float 3s ease-in-out infinite;
    }
</style>
@endsection