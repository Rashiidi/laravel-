@extends('adminlayout.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">Edit Service</h1>

    <div class="card shadow-sm border-0 rounded p-4 bg-white">
        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Service Name</label>
                <input type="text" name="name" id="name" 
                    class="form-control" 
                    value="{{ old('name', $service->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea name="description" id="description" 
                    class="form-control" required>{{ old('description', $service->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-bold">Price</label>
                <input type="number" name="price" id="price" 
                    class="form-control" 
                    value="{{ old('price', $service->price) }}" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

@endsection