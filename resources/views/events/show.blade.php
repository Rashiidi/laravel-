@extends('websitelayout.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <!-- Event Header -->
    <div class="text-center mb-12">
        <h1 class="text-5xl font-bold mb-4 bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-500">
            {{ $event->title }}
        </h1>
        <div class="flex justify-center items-center space-x-6 text-gray-400">
            <div class="flex items-center">
                <i class="fas fa-map-marker-alt mr-2 text-cyan-500"></i>
                <span class="font-medium">{{ $event->location }}</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-calendar-day mr-2 text-cyan-500"></i>
                <span class="font-medium">{{ $event->date }}</span>
            </div>
        </div>
    </div>

    <!-- Event Details Card -->
    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl p-8 mb-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-noise-pattern"></div>
        
        <p class="text-gray-300 leading-relaxed text-lg mb-8">
            {{ $event->description }}
        </p>

        <!-- Registration Section -->
        <div class="border-t border-gray-700 pt-8">
            @if(Auth::check())
            <form action="{{ route('events.register', $event->id) }}" method="POST">
                @csrf
                <button type="submit" 
                        class="group relative bg-gradient-to-r from-cyan-500 to-blue-500 text-white px-8 py-3 rounded-xl
                               font-semibold hover:from-cyan-600 hover:to-blue-600 transition-all duration-300 shadow-lg
                               hover:shadow-xl">
                    <span class="relative z-10">Register Now</span>
                    <div class="absolute inset-0 rounded-xl border-2 border-white/20 group-hover:border-white/30"></div>
                </button>
            </form>
            @else
            <p class="text-gray-400">
                You must 
                <a href="{{ route('login') }}"
                   class="text-cyan-500 hover:text-cyan-400 transition-colors font-semibold">
                    log in
                </a> 
                to register for this event
            </p>
            @endif

            <!-- Alerts -->
            <div class="mt-6 space-y-3">
                @if(session('success'))
                <div class="bg-green-500/20 border border-green-500/30 text-green-300 px-4 py-3 rounded-lg">
                    ✓ {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-500/20 border border-red-500/30 text-red-300 px-4 py-3 rounded-lg">
                    ✗ {{ session('error') }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Feedback Section -->
    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl p-8 mb-12">
        <h3 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-500 mb-8">
            Share Your Experience
        </h3>

        @if(Auth::check())
        <form action="{{ route('feedback.store') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            
            <div class="space-y-2">
                <label class="text-gray-300 font-medium">Your Feedback</label>
                <textarea name="comment" 
                          class="w-full bg-gray-700/30 border border-gray-600 rounded-xl px-4 py-3 text-white
                                 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 transition-all"
                          placeholder="Share your thoughts about the event..."
                          rows="4" required></textarea>
            </div>

            <div class="space-y-2">
                <label class="text-gray-300 font-medium">Rating</label>
                <select name="rating" 
                        class="w-full bg-gray-700/30 border border-gray-600 rounded-xl px-4 py-3 text-white
                               focus:border-cyan-500 focus:ring-2 focus:ring-cyan-500/20 appearance-none
                               bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiNmZmZmZmYiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBjbGFzcz0ibHVjaWRlIGx1Y2lkZS1jaGV2cm9uLWRvd24iPjxwYXRoIGQ9Im03IDEwIDUgNSA1LTUiLz48L3N2Zz4=')]
                               bg-no-repeat bg-[center_right_1rem] bg-[length:24px_24px]"
                        required>
                    <option value="" disabled selected>Select Rating</option>
                    <option value="5">★★★★★ - Excellent</option>
                    <option value="4">★★★★☆ - Good</option>
                    <option value="3">★★★☆☆ - Average</option>
                    <option value="2">★★☆☆☆ - Poor</option>
                    <option value="1">★☆☆☆☆ - Terrible</option>
                </select>
            </div>

            <button type="submit" 
                    class="bg-gradient-to-r from-green-500 to-cyan-500 text-white px-8 py-3 rounded-xl
                           font-semibold hover:from-green-600 hover:to-cyan-600 transition-all duration-300
                           shadow-lg hover:shadow-xl">
                Submit Feedback
            </button>
        </form>
        @else
        <p class="text-gray-400">
            You must 
            <a href="{{ route('login', ['redirect' => url()->current()]) }}" 
               class="text-cyan-500 hover:text-cyan-400 transition-colors font-semibold">
                log in
            </a> 
            to leave feedback
        </p>
        @endif
    </div>

    <!-- Feedback Display -->
    <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-xl p-8">
        <h3 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-blue-500 mb-8">
            Community Feedback
        </h3>

        @forelse($event->feedback as $feedback)
        <div class="bg-gray-700/20 rounded-xl p-6 mb-6 border border-gray-600/30">
            <div class="flex items-center gap-4 mb-4">
                <div class="bg-gradient-to-br from-cyan-500 to-blue-500 w-10 h-10 rounded-full flex items-center justify-center">
                    <span class="font-bold text-white">{{ substr($feedback->user->name, 0, 1) }}</span>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-100">{{ $feedback->user->name }}</h4>
                    <div class="flex items-center gap-2">
                        <div class="flex text-amber-400">
                            @for($i = 0; $i < 5; $i++)
                                <i class="fas fa-star {{ $i < $feedback->rating ? 'text-amber-400' : 'text-gray-600' }}"></i>
                            @endfor
                        </div>
                        <span class="text-gray-400 text-sm">{{ $feedback->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            <p class="text-gray-300 leading-relaxed">{{ $feedback->comment }}</p>
        </div>
        @empty
        <div class="text-center py-12">
            <p class="text-gray-400">No feedback available for this event yet</p>
        </div>
        @endforelse
    </div>
</div>

<style>
    .bg-noise-pattern {
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 1000 1000' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
    }
</style>
@endsection