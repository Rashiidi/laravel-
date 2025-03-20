<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Club</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
        .gradient-header {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .nav-link {
            position: relative;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #ef4444;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .event-card {
            background: linear-gradient(145deg, #1f2937 0%, #111827 100%);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .gradient-text {
            background: linear-gradient(45deg, #ef4444, #f59e0b);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-100 font-roboto">
<header class="gradient-header fixed w-full z-50">
    <div class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img alt="Fitness Club Logo" class="h-12 w-12 transform hover:scale-110 transition-transform" 
                     src="https://storage.googleapis.com/a1aa/image/kR40XUiHCrLkWC8pNcoJ170VlQk5sEPJQfXi4d9EkIo.jpg">
                <span class="text-2xl font-bold gradient-text font-poppins">FitClub</span>
            </div>
            
            <nav class="hidden md:flex items-center space-x-8">
                <a class="nav-link text-gray-300 hover:text-white" href="welcome">Home</a>
                <a class="nav-link text-gray-300 hover:text-white" href="#">About</a>
                <a class="nav-link text-gray-300 hover:text-white" href="{{ route('services.showServices') }}">Services</a>
                <a class="nav-link text-gray-300 hover:text-white" href="{{ route('events.index') }}">Events</a>
                <a class="nav-link text-gray-300 hover:text-white" href="contact">Contact</a>
                
                <div class="flex space-x-4 ml-6">
                    <a href="/login" class="px-6 py-2 bg-gradient-to-r from-red-500 to-orange-500 rounded-full 
                       font-medium hover:from-red-600 hover:to-orange-600 transition-all shadow-lg hover:shadow-xl">
                        Log in
                    </a>
                    <a href="{{ route('register') }}" class="px-6 py-2 border border-red-500 text-red-500 
                       rounded-full font-medium hover:bg-red-500/10 transition-all">
                        Register
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>

<main class="pt-24 animate-fade-in">
    @yield('content')
</main>

@if(session('success'))
<div class="fixed bottom-6 right-6 bg-green-600/90 text-white px-6 py-3 rounded-lg shadow-xl backdrop-blur-sm">
    ✓ {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="fixed bottom-6 right-6 bg-red-600/90 text-white px-6 py-3 rounded-lg shadow-xl backdrop-blur-sm">
    ✗ {{ session('error') }}
</div>
@endif



<!-- Footer Section -->
<footer class="bg-gradient-to-br from-gray-800 to-gray-900 border-t border-gray-700/50 mt-24">
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Brand Info -->
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <img alt="Fitness Club Logo" class="h-12 w-12" 
                         src="https://storage.googleapis.com/a1aa/image/kR40XUiHCrLkWC8pNcoJ170VlQk5sEPJQfXi4d9EkIo.jpg">
                    <span class="text-2xl font-bold gradient-text font-poppins">FitClub</span>
                </div>
                <p class="text-gray-400 text-sm">Transform your life through fitness. Join our community of passionate fitness enthusiasts.</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-gray-400 hover:text-red-500 transition-colors">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-red-500 transition-colors">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-red-500 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-red-500 transition-colors">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-4">
                <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="welcome" class="text-gray-400 hover:text-red-500 transition-colors">Home</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-red-500 transition-colors">About Us</a></li>
                    <li><a href="/showServices" class="text-gray-400 hover:text-red-500 transition-colors">Services</a></li>
                    <li><a href="{{ route('events.index') }}" class="text-gray-400 hover:text-red-500 transition-colors">Events</a></li>
                    <li><a href="contact" class="text-gray-400 hover:text-red-500 transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="space-y-4">
                <h4 class="text-lg font-semibold text-white mb-4">Contact Us</h4>
                <div class="space-y-2">
                    <p class="text-gray-400 flex items-center">
                        <i class="fas fa-map-marker-alt mr-3 text-red-500"></i>
                        123 Fitness Street, Health City
                    </p>
                    <p class="text-gray-400 flex items-center">
                        <i class="fas fa-phone-alt mr-3 text-red-500"></i>
                        +1 (555) 123-4567
                    </p>
                    <p class="text-gray-400 flex items-center">
                        <i class="fas fa-envelope mr-3 text-red-500"></i>
                        info@fitclub.com
                    </p>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="space-y-4">
                <h4 class="text-lg font-semibold text-white mb-4">Newsletter</h4>
                <form class="flex flex-col space-y-3">
                    <input type="email" placeholder="Enter your email" 
                           class="bg-gray-700/30 border border-gray-600 rounded-lg px-4 py-3 text-white 
                                  focus:outline-none focus:border-red-500 transition-colors">
                    <button type="submit" 
                            class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-6 py-3 
                                   rounded-lg font-medium hover:from-red-600 hover:to-orange-600 
                                   transition-all shadow-lg hover:shadow-xl">
                        Subscribe
                    </button>
                </form>
                <p class="text-gray-400 text-xs">We never share your information. Unsubscribe anytime.</p>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-700/50 mt-12 pt-8 text-center">
            <p class="text-gray-500 text-sm">
                © 2024 FitClub. All rights reserved. 
                <a href="#" class="hover:text-red-500 transition-colors">Privacy Policy</a> | 
                <a href="#" class="hover:text-red-500 transition-colors">Terms of Service</a>
            </p>
        </div>
    </div>
</footer>

<!-- Add Font Awesome for icons -->
<script src="https://kit.fontawesome.com/your-kit-code.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>