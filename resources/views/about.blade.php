@extends('websitelayout.app')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-br from-blue-900 to-purple-900 text-white py-16 px-4">
    <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-5xl font-bold mb-4 animate-fade-in-down">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-blue-300">
                About Iron Peak Fitness
            </span>
        </h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto leading-relaxed">
            Transforming lives through functional fitness, expert coaching, and community support.
        </p>
    </div>
</div>

<!-- Main Content -->
<div class="max-w-6xl mx-auto px-4 py-12">
    <!-- Core Values -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl p-8">
            <div class="bg-gradient-to-br from-cyan-500 to-blue-500 w-fit p-4 rounded-xl mb-4">
                <i class="fas fa-dumbbell text-white text-2xl"></i>
            </div>
            <h3 class="text-2xl font-semibold text-white mb-3">Functional Training</h3>
            <p class="text-gray-300">Movement-based programs that enhance real-world strength and mobility.</p>
        </div>

        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl p-8">
            <div class="bg-gradient-to-br from-cyan-500 to-blue-500 w-fit p-4 rounded-xl mb-4">
                <i class="fas fa-apple-alt text-white text-2xl"></i>
            </div>
            <h3 class="text-2xl font-semibold text-white mb-3">Nutrition Coaching</h3>
            <p class="text-gray-300">Personalized meal plans and dietary guidance for optimal results.</p>
        </div>

        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl p-8">
            <div class="bg-gradient-to-br from-cyan-500 to-blue-500 w-fit p-4 rounded-xl mb-4">
                <i class="fas fa-users text-white text-2xl"></i>
            </div>
            <h3 class="text-2xl font-semibold text-white mb-3">Community Support</h3>
            <p class="text-gray-300">A welcoming environment that keeps you motivated and accountable.</p>
        </div>
    </div>

    <!-- Our Story -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl p-8">
            <h2 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-500 mb-6">
                Our Fitness Journey
            </h2>
            <p class="text-gray-300 mb-4">
                Founded in 2023 by Olympic athlete Maria Sanchez, Iron Peak began as a small garage gym with 
                a simple mission: make elite-level training accessible to everyone. What started as a passion 
                project has grown into a 10,000 sq/ft fitness hub serving 1,500+ members.
            </p>
            <div class="bg-gray-700/30 rounded-xl p-6">
                <div class="flex items-center gap-4">
                    <div class="bg-gradient-to-br from-cyan-500 to-blue-500 p-3 rounded-lg">
                        <i class="fas fa-trophy text-white text-2xl"></i>
                    </div>
                    <div>
                        <h4 class="text-white text-lg font-semibold">2024 Best Gym Award</h4>
                        <p class="text-gray-300 text-sm">National Fitness Association</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl overflow-hidden">
        <img src="{{ asset('images/gym.jpeg') }}" alt="Fitness Banner" class="w-full h-full object-cover">
        </div>
    </div>

   <!-- Trainer Team -->
<div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl p-8 mb-16">
    <h2 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-500 mb-8">
        Meet Our Coaches
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="text-center">
            <div class="bg-gradient-to-br from-cyan-500 to-blue-500 p-1 rounded-full inline-block mb-4">
                <img src="/images/coach1.jpg" class="w-32 h-32 rounded-full object-cover">
            </div>
            <h4 class="text-white font-semibold">Chris Thompson</h4>
            <p class="text-cyan-400 mb-2">Strength Specialist</p>
            <p class="text-gray-300 text-sm">NASM Certified, 10+ years experience</p>
        </div>

        <div class="text-center">
            <div class="bg-gradient-to-br from-cyan-500 to-blue-500 p-1 rounded-full inline-block mb-4">
                <img src="/images/coach2.jpg" class="w-32 h-32 rounded-full object-cover">
            </div>
            <h4 class="text-white font-semibold">Jessica Lee</h4>
            <p class="text-cyan-400 mb-2">Yoga & Flexibility Coach</p>
            <p class="text-gray-300 text-sm">Certified Yoga Instructor, 8+ years experience</p>
        </div>

        <div class="text-center">
            <div class="bg-gradient-to-br from-cyan-500 to-blue-500 p-1 rounded-full inline-block mb-4">
                <img src="/images/coach3.jpg" class="w-32 h-32 rounded-full object-cover">
            </div>
            <h4 class="text-white font-semibold">David Parker</h4>
            <p class="text-cyan-400 mb-2">HIIT & Conditioning Expert</p>
            <p class="text-gray-300 text-sm">ACE Certified, 7+ years experience</p>
        </div>

        <div class="text-center">
            <div class="bg-gradient-to-br from-cyan-500 to-blue-500 p-1 rounded-full inline-block mb-4">
                <img src="/images/coach4.jpg" class="w-32 h-32 rounded-full object-cover">
            </div>
            <h4 class="text-white font-semibold">Samantha Brown</h4>
            <p class="text-cyan-400 mb-2">Nutrition & Wellness Coach</p>
            <p class="text-gray-300 text-sm">Registered Dietitian, 5+ years experience</p>
        </div>
    </div>
</div>


    <!-- Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-16">
        <div class="bg-gray-700/20 p-6 rounded-xl text-center">
            <div class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-500 mb-2">
                15K+
            </div>
            <div class="text-gray-300">Members Trained</div>
        </div>
        <div class="bg-gray-700/20 p-6 rounded-xl text-center">
            <div class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-500 mb-2">
                50+
            </div>
            <div class="text-gray-300">Weekly Classes</div>
        </div>
        <div class="bg-gray-700/20 p-6 rounded-xl text-center">
            <div class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-500 mb-2">
                98%
            </div>
            <div class="text-gray-300">Member Satisfaction</div>
        </div>
        <div class="bg-gray-700/20 p-6 rounded-xl text-center">
            <div class="text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-500 mb-2">
                10
            </div>
            <div class="text-gray-300">Certified Trainers</div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-br from-cyan-600 to-blue-700 rounded-2xl shadow-xl p-8 text-center">
        <h3 class="text-3xl font-bold text-white mb-4">Start Your Transformation Today</h3>
        <p class="text-blue-100 mb-6">Book your free trial session and experience the Iron Peak difference</p>
        <button class="bg-white text-cyan-600 px-8 py-3 rounded-xl font-bold hover:bg-gray-100 transition-all">
            Claim Free Session
        </button>
    </div>
</div>

<style>
    .animate-fade-in-down {
        animation: fadeInDown 0.8s ease-out both;
    }

    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .coach-image-wrapper {
        border: 2px solid transparent;
        background-clip: padding-box;
    }
</style>
@endsection