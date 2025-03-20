@extends('websitelayout.app')

@section('content')
<!-- Contact Hero Section -->
<div class="bg-gradient-to-br from-blue-900 to-purple-900 text-white py-16 px-4">
    <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-5xl font-bold mb-4 animate-fade-in-down">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-400 to-blue-300">
                Get in Touch
            </span>
        </h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto leading-relaxed">
            We're here to help you on your fitness journey. Reach out for inquiries, feedback, or partnerships.
        </p>
    </div>
</div>

<!-- Contact Content -->
<div class="max-w-6xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Contact Information -->
        <div class="space-y-8">
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl p-8">
                <h2 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-500 mb-6">
                    Connect With Us
                </h2>

                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="bg-gradient-to-br from-cyan-500 to-blue-500 p-3 rounded-lg mr-4">
                            <i class="fas fa-map-marker-alt text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white mb-2">Our Studio</h3>
                            <p class="text-gray-300">
                                123 Fitness Avenue<br>
                                Health City, HC 12345<br>
                                United States
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-gradient-to-br from-cyan-500 to-blue-500 p-3 rounded-lg mr-4">
                            <i class="fas fa-phone-alt text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white mb-2">Contact Numbers</h3>
                            <p class="text-gray-300">
                                General Inquiries: +1 (555) 123-4567<br>
                                Membership: +1 (555) 765-4321<br>
                                Emergency: +1 (555) 987-6543
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-gradient-to-br from-cyan-500 to-blue-500 p-3 rounded-lg mr-4">
                            <i class="fas fa-clock text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white mb-2">Operating Hours</h3>
                            <p class="text-gray-300">
                                Monday-Friday: 5:00 AM - 11:00 PM<br>
                                Saturday: 7:00 AM - 9:00 PM<br>
                                Sunday: 8:00 AM - 8:00 PM
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-gradient-to-br from-cyan-500 to-blue-500 p-3 rounded-lg mr-4">
                            <i class="fas fa-envelope text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white mb-2">Email Support</h3>
                            <p class="text-gray-300">
                                General: info@fitclub.com<br>
                                Support: support@fitclub.com<br>
                                Careers: careers@fitclub.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media Section -->
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl p-8">
                <h3 class="text-2xl font-semibold text-white mb-6">Follow Our Journey</h3>
                <div class="flex space-x-6 justify-center">
                    <a href="#" class="social-icon" aria-label="Instagram">
                        <i class="fab fa-instagram text-2xl text-cyan-500 hover:text-cyan-400 transition-colors"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="Facebook">
                        <i class="fab fa-facebook text-2xl text-cyan-500 hover:text-cyan-400 transition-colors"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="YouTube">
                        <i class="fab fa-youtube text-2xl text-cyan-500 hover:text-cyan-400 transition-colors"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="TikTok">
                        <i class="fab fa-tiktok text-2xl text-cyan-500 hover:text-cyan-400 transition-colors"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl p-8">
            <h2 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-500 mb-8">
                Send a Message
            </h2>

            <form class="space-y-6">
                <div class="space-y-2">
                    <label class="text-gray-300 font-medium">Full Name</label>
                    <div class="relative">
                        <input type="text" 
                               class="w-full bg-gray-700/30 border border-gray-600 rounded-xl px-4 py-3 text-white
                                      focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all"
                               placeholder="Enter your full name">
                        <i class="fas fa-user absolute right-4 top-4 text-gray-400"></i>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-gray-300 font-medium">Email Address</label>
                    <div class="relative">
                        <input type="email" 
                               class="w-full bg-gray-700/30 border border-gray-600 rounded-xl px-4 py-3 text-white
                                      focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all"
                               placeholder="your.email@example.com">
                        <i class="fas fa-envelope absolute right-4 top-4 text-gray-400"></i>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-gray-300 font-medium">Phone Number</label>
                    <div class="relative">
                        <input type="tel" 
                               class="w-full bg-gray-700/30 border border-gray-600 rounded-xl px-4 py-3 text-white
                                      focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all"
                               placeholder="+1 (555) 123-4567">
                        <i class="fas fa-phone absolute right-4 top-4 text-gray-400"></i>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-gray-300 font-medium">Message</label>
                    <textarea 
                        class="w-full bg-gray-700/30 border border-gray-600 rounded-xl px-4 py-3 text-white
                               focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all"
                        rows="5"
                        placeholder="Type your message here..."></textarea>
                </div>

                <button type="submit" 
                        class="w-full bg-gradient-to-r from-cyan-500 to-blue-500 text-white px-8 py-3 rounded-xl
                               font-semibold hover:from-cyan-600 hover:to-blue-600 transition-all duration-300
                               shadow-lg hover:shadow-xl">
                    Send Message
                </button>
            </form>
        </div>
    </div>

    <!-- Map Section -->
    <div class="mt-12 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl overflow-hidden">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12345.678901234567!2d-122.12345678901234!3d37.12345678901234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDA3JzI0LjQiTiAxMjLCsDA3JzI0LjQiVw!5e0!3m2!1sen!2sus!4v1234567890123!5m2!1sen!2sus" 
            class="w-full h-96 border-0" 
            allowfullscreen="" 
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <!-- Trust Badges -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-12">
        <div class="bg-gray-700/20 p-4 rounded-xl flex items-center justify-center">
            <i class="fas fa-shield-alt text-3xl text-cyan-500 mr-3"></i>
            <span class="text-gray-300 font-medium">SSL Secured</span>
        </div>
        <div class="bg-gray-700/20 p-4 rounded-xl flex items-center justify-center">
            <i class="fas fa-lock text-3xl text-cyan-500 mr-3"></i>
            <span class="text-gray-300 font-medium">24/7 Security</span>
        </div>
        <div class="bg-gray-700/20 p-4 rounded-xl flex items-center justify-center">
            <i class="fas fa-certificate text-3xl text-cyan-500 mr-3"></i>
            <span class="text-gray-300 font-medium">Certified</span>
        </div>
        <div class="bg-gray-700/20 p-4 rounded-xl flex items-center justify-center">
            <i class="fas fa-heartbeat text-3xl text-cyan-500 mr-3"></i>
            <span class="text-gray-300 font-medium">Health Safe</span>
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
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .social-icon {
        @apply transition-transform hover:scale-110;
    }

    .contact-form input,
    .contact-form textarea {
        @apply transition-all duration-300;
    }

    .contact-form input:focus,
    .contact-form textarea:focus {
        @apply ring-2 ring-cyan-500/20;
    }
</style>
@endsection