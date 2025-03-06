@extends('adminlayout.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">Create Service</h1>

    <div class="card shadow-sm border-0 rounded p-4 bg-white">
        <form action="{{ route('services.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Service Name</label>
                <input type="text" name="name" id="name" 
                    class="form-control" 
                    placeholder="Enter service name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea name="description" id="description" 
                    class="form-control" 
                    placeholder="Enter service description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-bold">Price</label>
                <input type="number" name="price" id="price" 
                    class="form-control" 
                    placeholder="Enter service price" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-4 py-2 fw-bold">
                    <i class="fas fa-save"></i> Create Service
                </button>
            </div>
        </form>
    </div>
</div>

@endsection