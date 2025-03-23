@extends('adminlayout.app')

@section('content')

<div class="container mx-auto px-4 py-8 max-w-2xl">
    <!-- Header Section -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
            Edit Event
        </h1>
        <p class="text-gray-600">Update the event details below</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-2xl border border-gray-100 p-6 md:p-8">
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Title Input -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <i class="fas fa-heading text-blue-500 mr-2"></i>
                    Event Title
                </label>
                <input type="text" name="title" id="title"
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300"
                    value="{{ old('title', $event->title) }}"
                    placeholder="Enter event title"
                    required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Location Input -->
            <div class="mb-6">
                <label for="location" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <i class="fas fa-map-marker-alt text-purple-500 mr-2"></i>
                    Location
                </label>
                <input type="text" name="location" id="location"
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300"
                    value="{{ old('location', $event->location) }}"
                    placeholder="Enter event location"
                    required>
                @error('location')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date Input -->
            <div class="mb-6">
                <label for="date" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <i class="fas fa-calendar-day text-green-500 mr-2"></i>
                    Event Date
                </label>
                <input type="date" name="date" id="date"
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300"
                    value="{{ old('date', $event->date) }}"
                    required>
                @error('date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description Input -->
            <div class="mb-8">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <i class="fas fa-align-left text-orange-500 mr-2"></i>
                    Description
                </label>
                <textarea name="description" id="description" 
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300 min-h-[150px]"
                    placeholder="Describe the event...">{{ old('description', $event->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Add the same "Trainer Selection" section as in the create form -->
<div class="mb-6">
    <label for="trainer_id" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
        <i class="fas fa-user-tie text-blue-500 mr-2"></i>
        Assign Trainer
    </label>
    <select name="trainer_id" id="trainer_id"
        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition duration-300"
        required>
        <option value="">Select a Trainer</option>
        @foreach($trainers as $trainer)
            <option value="{{ $trainer->id }}" {{ old('trainer_id', $event->trainer_id) == $trainer->id ? 'selected' : '' }}>
                {{ $trainer->name }}
            </option>
        @endforeach
    </select>
    @error('trainer_id')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

            <!-- Form Actions -->
            <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">
                <a href="{{ route('events.index') }}" 
                   class="btn bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-lg transition duration-300 text-center">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
                <button type="submit" 
                        class="btn bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg shadow-md transition-all duration-300">
                    <i class="fas fa-save mr-2"></i>Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    input:focus, textarea:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
</style>

@endsection