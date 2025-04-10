@extends('websitelayout.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-900 via-blue-700 to-purple-900 text-white py-24 px-4 overflow-hidden">
    <div class="absolute inset-0 opacity-10 animate-move-noise" style="background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noiseFilter"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.65" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noiseFilter)"/%3E%3C/svg%3E');"></div>
    <div class="max-w-6xl mx-auto text-center relative space-y-8">
        <div class="animate-fade-in-down">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-blue-300 px-2">
                    Transform Your <span class="animate-text-shimmer inline-block">Fitness</span>
                </span>
            </h1>
            <p class="text-xl mb-8 text-blue-100 font-light tracking-wide max-w-2xl mx-auto">
                Where every drop of sweat becomes a step towards greatness
            </p>
        </div>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('activities.index') }}" 
               class="group relative bg-white/10 backdrop-blur-sm px-8 py-4 rounded-full font-semibold 
                      hover:bg-white/20 transition-all duration-500 shadow-2xl hover:shadow-3xl 
                      transform hover:scale-105 hover:-rotate-1">
                <span class="relative z-10 flex items-center gap-2">
                    <span class="animate-pulse">🚀</span>
                    Explore Events
                </span>
                <div class="absolute inset-0 rounded-full border-2 border-white/30 group-hover:border-cyan-300 transition-all"></div>
            </a>
            <a href="#services" 
               class="group relative border-2 border-white/30 px-8 py-4 rounded-full font-semibold 
                      hover:border-purple-300 text-white hover:bg-white/10 transition-all duration-500 
                      backdrop-blur-sm transform hover:scale-105 hover:rotate-1">
                <span class="relative z-10 flex items-center gap-2">
                    <span class="animate-bounce">💎</span>
                    Our Services
                </span>
                <div class="absolute inset-0 rounded-full bg-gradient-to-r from-blue-500/0 to-purple-500/0 group-hover:opacity-20 opacity-0 transition-opacity"></div>
            </a>
        </div>
        <div class="mt-12 animate-float">
            <div class="w-24 h-24 bg-gradient-to-r from-cyan-400/30 to-blue-300/30 blur-2xl mx-auto rounded-full"></div>
        </div>
    </div>
</section>

<!-- Featured Events Section -->
<section class="max-w-6xl mx-auto px-4 py-20">
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-900 mb-4 relative inline-block">
            <span class="relative z-10 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-500">
                Upcoming Events
            </span>
            <div class="absolute bottom-0 left-0 w-full h-2 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full animate-width-expand"></div>
        </h2>
        <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">
            Immerse yourself in transformative experiences that challenge both body and mind
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
        @foreach ($events as $event)
        <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden group 
                   transform hover:-translate-y-2 hover:rotate-[0.5deg] relative">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="p-6 relative">
                <div class="flex items-center mb-4">
                    <div class="bg-gradient-to-br from-blue-500 to-purple-500 p-3 rounded-xl mr-4 shadow-md 
                              transform group-hover:rotate-12 transition-transform">
                        <i class="fas fa-calendar-alt text-white text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">
                            {{ $event->title }}
                        </h3>
                        <p class="text-gray-600 text-sm font-medium mt-1 flex items-center gap-1">
                            <i class="fas fa-map-marker-alt text-purple-500"></i>
                            {{ $event->location }}
                        </p>
                    </div>
                </div>
                <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed group-hover:text-gray-800 transition-colors">
                    {{ $event->description }}
                </p>
                <div class="flex justify-between items-center text-sm">
                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-medium text-xs 
                              uppercase tracking-wide group-hover:bg-purple-100 group-hover:text-purple-700 transition-colors">
                        {{ $event->type }}
                    </span>
                    <span class="text-gray-500 font-medium flex items-center gap-2">
                        <i class="fas fa-clock text-purple-500"></i>
                        {{ $event->date }}
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Services Section -->
<section id="services" class="bg-gradient-to-b from-gray-50 to-white py-20">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4 relative inline-block">
                <span class="relative z-10 bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-blue-500">
                    Elite Services
                </span>
                <div class="absolute bottom-0 left-0 w-full h-2 bg-gradient-to-r from-purple-400 to-blue-300 rounded-full animate-width-expand-delayed"></div>
            </h2>
            <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">
                Premium fitness solutions crafted by world-class trainers and wellness experts
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service)
            <div class="bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 
                       transform hover:-translate-y-2 group relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-blue-500/5 opacity-0 
                          group-hover:opacity-100 transition-opacity"></div>
                <div class="p-6">
                    <div class="flex items-start mb-4">
                        <div class="bg-gradient-to-br from-purple-500 to-blue-500 p-3 rounded-xl mr-4 shadow-md 
                                  transform group-hover:scale-110 transition-transform">
                            <i class="fas fa-dumbbell text-white text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800 group-hover:text-purple-600 transition-colors">
                                {{ $service->name }}
                            </h3>
                            <p class="text-gray-600 mt-3 leading-relaxed group-hover:text-gray-800 transition-colors">
                                {{ $service->description }}
                            </p>
                            <div class="mt-6 flex justify-between items-center">
                                <span class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 
                                          bg-clip-text text-transparent group-hover:from-purple-700 group-hover:to-blue-700 transition-colors">
                                    ${{ $service->price }}
                                </span>
                                <button class="group relative bg-gradient-to-r from-purple-500 to-blue-500 text-white 
                                             px-5 py-2.5 rounded-xl font-medium hover:from-purple-600 hover:to-blue-600 
                                             transition-all duration-300 shadow-md hover:shadow-lg transform hover:-rotate-2">
                                    <span class="relative z-10 flex items-center gap-2">
                                        Discover
                                        <i class="fas fa-arrow-right text-sm transition-transform group-hover:translate-x-1"></i>
                                    </span>
                                    <div class="absolute inset-0 rounded-xl border-2 border-white/20 
                                              group-hover:border-white/30 transition-colors"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="relative bg-gradient-to-br from-gray-50 to-white py-20 overflow-hidden">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4 relative inline-block">
                <span class="relative z-10 bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-blue-500">
                    Success Stories
                </span>
                <div class="absolute bottom-0 left-0 w-full h-2 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full animate-width-expand"></div>
            </h2>
            <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">
                Hear from our community members who've transformed their lives
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative">
            <div class="absolute -top-20 -right-20 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>
            
            <!-- Testimonial Cards -->
            <div class="bg-white/50 backdrop-blur-sm rounded-2xl p-6 shadow-xl hover:shadow-2xl transition-all duration-500 group transform hover:-translate-y-2 border border-gray-100/50">
                <div class="flex items-start mb-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center mr-4">
                        <span class="text-white text-xl">👑</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 group-hover:text-purple-600 transition-colors">Sarah Johnson</h4>
                        <p class="text-sm text-purple-500">Fitness Enthusiast</p>
                    </div>
                </div>
                <p class="text-gray-600 italic leading-relaxed group-hover:text-gray-800 transition-colors">
                    "The community support and expert guidance helped me achieve what I never thought possible!"
                </p>
                <div class="mt-4 flex gap-2">
                    <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-star text-white text-sm"></i>
                    </div>
                    <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-star text-white text-sm"></i>
                    </div>
                    <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-star text-white text-sm"></i>
                    </div>
                </div>
            </div>

            <!-- Repeat similar testimonial cards with different content -->
        </div>
    </div>
</section>

<!-- Transformations Section -->
<section class="relative bg-gradient-to-br from-blue-50 to-purple-50 py-20">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4 relative inline-block">
                <span class="relative z-10 bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-500">
                    Amazing Transformations
                </span>
                <div class="absolute bottom-0 left-0 w-full h-2 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full animate-width-expand-delayed"></div>
            </h2>
            <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">
                Witness real-life metamorphoses that inspire and motivate
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Transformation Card -->
            <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                <div class="relative h-80">
                    <img src="/images/transformation-1.jpg" alt="Mark's Journey" 
                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-xl font-bold mb-2 transform -translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                            Mark's 30kg Transformation
                        </h3>
                        <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <div class="w-12 h-1 bg-gradient-to-r from-cyan-400 to-blue-300 mb-4"></div>
                            <p class="text-sm font-light opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                From self-doubt to marathon finisher
                            </p>
                        </div>
                    </div>
                </div>
                <div class="absolute top-4 right-4">
                    <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm text-white">
                        Before/After
                    </span>
                </div>
            </div>

            <!-- Repeat similar transformation cards -->
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-purple-900 text-white py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10 animate-move-noise" style="background-image: url('data:image/svg+xml,%3Csvg viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"%3E%3Cfilter id="noiseFilter"%3E%3CfeTurbulence type="fractalNoise" baseFrequency="0.65" numOctaves="3" stitchTiles="stitch"/%3E%3C/filter%3E%3Crect width="100%25" height="100%25" filter="url(%23noiseFilter)"/%3E%3C/svg%3E');"></div>
    <div class="max-w-4xl mx-auto text-center relative space-y-8">
        <div class="animate-fade-in-down">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 leading-tight">
                Ready to Begin Your<br>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-blue-300">
                    Transformation Journey?
                </span>
            </h2>
            <p class="text-lg text-blue-100 font-light max-w-xl mx-auto">
                Join 50,000+ members who've already started changing their lives
            </p>
        </div>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('free.trial') }}" 
               class="group relative bg-white/10 backdrop-blur-sm px-8 py-4 rounded-full font-semibold 
                      hover:bg-white/20 transition-all duration-500 shadow-2xl hover:shadow-3xl 
                      transform hover:scale-105 hover:-rotate-1">
                <span class="relative z-10 flex items-center gap-2">
                    <span class="animate-pulse">🔥</span>
                    Start Free Trial
                </span>
                <div class="absolute inset-0 rounded-full border-2 border-white/30 group-hover:border-cyan-300 transition-all"></div>
            </a>
            
            <a href="{{ route('about') }}" 
               class="group relative border-2 border-white/30 px-8 py-4 rounded-full font-semibold 
                      hover:border-purple-300 text-white hover:bg-white/10 transition-all duration-500 
                      backdrop-blur-sm transform hover:scale-105 hover:rotate-1">
                <span class="relative z-10 flex items-center gap-2">
                    <span class="animate-spin-slow">🌟</span>
                    Why Choose Us?
                </span>
                <div class="absolute inset-0 rounded-full bg-gradient-to-r from-blue-500/0 to-purple-500/0 group-hover:opacity-20 opacity-0 transition-opacity"></div>
            </a>
        </div>
        
        <div class="mt-12 animate-float">
            <div class="w-24 h-24 bg-gradient-to-r from-cyan-400/30 to-blue-300/30 blur-2xl mx-auto rounded-full"></div>
        </div>
    </div>
</section>

<!-- Enhanced Styles -->
<style>
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .animate-spin-slow {
        animation: spin-slow 12s linear infinite;
    }

    .transform-card {
        transform-style: preserve-3d;
        perspective: 1000px;
    }

    .transform-card:hover .card-content {
        transform: translateZ(20px);
    }

    @keyframes gradient-wave {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .animate-gradient-wave {
        background-size: 200% 200%;
        animation: gradient-wave 8s ease infinite;
    }

    .hover-trigger:hover .hover-target {
        opacity: 1;
        transform: translateY(0);
    }

    .image-overlay {
        background: linear-gradient(180deg, 
            rgba(0,0,0,0) 0%, 
            rgba(0,0,0,0.6) 100%);
        transition: all 0.5s ease;
    }

    
    @keyframes move-noise {
        0% { background-position: 0 0; }
        100% { background-position: 100% 100%; }
    }

    .animate-move-noise {
        animation: move-noise 20s linear infinite;
    }

    @keyframes text-shimmer {
        0% { background-position: -100% 0; }
        100% { background-position: 100% 0; }
    }

    .animate-text-shimmer {
        background-size: 200% auto;
        background-image: linear-gradient(90deg, #67e8f9 25%, #6366f1 50%, #67e8f9 75%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        animation: text-shimmer 3s linear infinite;
    }

    @keyframes width-expand {
        0% { width: 0; opacity: 0; }
        100% { width: 100%; opacity: 1; }
    }

    .animate-width-expand {
        animation: width-expand 1s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    .animate-width-expand-delayed {
        animation: width-expand 1s 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    .hover\:animate-icon-bounce:hover {
        animation: icon-bounce 0.8s ease infinite;
    }

    @keyframes icon-bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
</style>
@endsection