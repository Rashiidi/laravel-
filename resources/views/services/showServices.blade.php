@extends('websitelayout.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-900 to-purple-900 text-white py-24 px-4 overflow-hidden">
    <div class="max-w-6xl mx-auto text-center relative z-10">
        <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in-down">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-blue-300">
                Transform Your Fitness Journey
            </span>
        </h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto leading-relaxed mb-8">
            Experience premium training programs designed by world-class athletes and nutrition experts
        </p>
        <div class="flex justify-center space-x-4">
            <a href="/register" class="px-8 py-3 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full font-bold 
              hover:from-cyan-600 hover:to-blue-600 transition-all shadow-lg hover:shadow-xl">
                Get Started
            </a>
            <a href="/about" class="px-8 py-3 border border-cyan-500 text-cyan-500 rounded-full 
              font-bold hover:bg-cyan-500/10 transition-all">
                Learn More
            </a>
        </div>
    </div>
    <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/diamond-upholstery.png')"></div>
</section>

<!-- Features Grid -->
<section id="features" class="py-16 bg-gray-800">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-white mb-4">Why Choose FitClub?</h2>
            <p class="text-gray-400 max-w-xl mx-auto">Discover the unique advantages of our fitness ecosystem</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="feature-card p-6 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-all">
                <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-award text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Certified Experts</h3>
                <p class="text-gray-300">NASM & ACE certified trainers with 10+ years experience</p>
            </div>
            <div class="feature-card p-6 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-all">
                <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-heartbeat text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Holistic Approach</h3>
                <p class="text-gray-300">Combining fitness, nutrition, and mental wellness</p>
            </div>
            <div class="feature-card p-6 bg-gray-700/30 rounded-xl hover:bg-gray-700/50 transition-all">
                <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-clock text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Flexible Scheduling</h3>
                <p class="text-gray-300">24/7 access with personalized time slots</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="py-16 bg-gray-900">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-white mb-4">Premium Training Programs</h2>
            <p class="text-gray-400 max-w-xl mx-auto">Customized plans for every fitness level</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service)
            <div class="relative group bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-cyan-500 to-blue-500"></div>
                <div class="p-6">
                    <div class="flex items-start mb-4">
                        <div class="bg-gradient-to-br from-cyan-500 to-blue-500 p-3 rounded-xl mr-4 shadow-md">
                            <i class="fas fa-dumbbell text-white text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-white mb-1">{{ $service->name }}</h3>
                            <div class="bg-gradient-to-r from-cyan-500 to-blue-500 bg-clip-text text-transparent">
                                <span class="text-2xl font-bold">${{ $service->price }}</span>
                                <span class="text-sm">/session</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed line-clamp-3">
                        {{ $service->description }}
                    </p>
                    
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $services->links('pagination::tailwind') }}
        </div>
    </div>
</section>




<!-- Testimonials -->
<section class="py-16 bg-gray-900">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-white mb-4">Success Stories</h2>
            <p class="text-gray-400 max-w-xl mx-auto">Hear from our transformed members</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="testimonial-card bg-gray-800 p-6 rounded-xl border border-gray-700 hover:border-cyan-500 transition-all">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/men/1.jpg" 
                         class="w-12 h-12 rounded-full mr-4 border-2 border-cyan-500">
                    <div>
                        <h4 class="font-bold text-white">John Carter</h4>
                        <p class="text-cyan-500 text-sm">Lost 28kg in 4 months</p>
                    </div>
                </div>
                <p class="text-gray-300">"The best decision I ever made! The trainers understood exactly what I needed."</p>
            </div>

            <div class="testimonial-card bg-gray-800 p-6 rounded-xl border border-gray-700 hover:border-cyan-500 transition-all">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/women/2.jpg" 
                         class="w-12 h-12 rounded-full mr-4 border-2 border-cyan-500">
                    <div>
                        <h4 class="font-bold text-white">Emily Roberts</h4>
                        <p class="text-cyan-500 text-sm">Gained 10kg of muscle in 6 months</p>
                    </div>
                </div>
                <p class="text-gray-300">"I feel stronger and more confident! The personalized workouts were a game changer."</p>
            </div>

            <div class="testimonial-card bg-gray-800 p-6 rounded-xl border border-gray-700 hover:border-cyan-500 transition-all">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/men/3.jpg" 
                         class="w-12 h-12 rounded-full mr-4 border-2 border-cyan-500">
                    <div>
                        <h4 class="font-bold text-white">Michael Thompson</h4>
                        <p class="text-cyan-500 text-sm">Completed his first marathon</p>
                    </div>
                </div>
                <p class="text-gray-300">"Never thought I could run a marathon. This gym helped me achieve the impossible!"</p>
            </div>
        </div>
    </div>
</section>


<!-- CTA Section -->
<section class="py-16 bg-gradient-to-br from-blue-900 to-purple-900">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-3xl font-bold text-white mb-4">Start Your Transformation Today</h2>
        <p class="text-blue-100 mb-8 max-w-xl mx-auto">Take the first step towards a healthier, stronger you with our 7-day free trial</p>
        <div class="flex justify-center space-x-4">
            <a href="/register" class="px-8 py-3 bg-white text-blue-900 rounded-full font-bold 
              hover:bg-opacity-90 transition-all shadow-lg hover:shadow-xl">
                Free Trial
            </a>
            <a href="/contact" class="px-8 py-3 border border-white text-white rounded-full 
              font-bold hover:bg-white/10 transition-all">
                Book Consultation
            </a>
        </div>
    </div>
</section>

<style>
    .animate-fade-in-down {
        animation: fadeInDown 0.8s ease-out both;
    }

    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .feature-card:hover .feature-icon {
        transform: rotate(15deg) scale(1.1);
    }

    .pricing-card:hover .pricing-icon {
        animation: pulse 1.5s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .testimonial-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
</style>
@endsection