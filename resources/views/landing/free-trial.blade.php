@extends('websitelayout.app')

@section('content')
<div class="bg-white">
    <!-- Hero -->
    <section class="text-center py-20 bg-blue-600 text-white">
        <h1 class="text-4xl font-bold mb-4">Ready to Begin Your Transformation Journey?</h1>
        <p class="text-lg mb-6">Join 50,000+ members who've already started changing their lives 🔥</p>
        <a href="#signup" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
            Start Free Trial
        </a>
    </section>

    <!-- Features -->
    <section class="py-16 px-6 max-w-5xl mx-auto text-center">
        <h2 class="text-3xl font-bold mb-10">What You'll Get</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-xl font-semibold mb-2">Custom Workout Plan</h3>
                <p>Get a personalized plan that fits your goals, whether it's weight loss, strength, or flexibility.</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-2">Nutrition Guide</h3>
                <p>Receive a basic but effective nutrition strategy for your trial period.</p>
            </div>
            <div>
                <h3 class="text-xl font-semibold mb-2">Access to Trainers</h3>
                <p>Chat with trainers and get your fitness questions answered during your trial.</p>
            </div>
        </div>
    </section>

    <!-- Signup -->
    <section id="signup" class="bg-gray-100 py-16 px-6">
        <h2 class="text-3xl font-bold text-center mb-10">Sign Up for Your Free Trial</h2>
        <form action="{{ route('free.trial.submit') }}" method="POST" class="max-w-xl mx-auto bg-white p-8 rounded shadow">
            @csrf
            <div class="mb-4">
                <input type="text" name="name" placeholder="Your Name" required class="w-full p-3 border rounded" />
            </div>
            <div class="mb-4">
                <input type="email" name="email" placeholder="Your Email" required class="w-full p-3 border rounded" />
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition">
                Get Started Free
            </button>
        </form>
    </section>

   
@endsection
