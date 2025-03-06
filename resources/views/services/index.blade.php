@extends('adminlayout.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Manage Services</h1>
        <a href="{{ route('services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>New Service
        </a>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($services as $service)
        <div class="col">
            <div class="card h-100 border-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3 text-primary">{{ $service->name }}</h5>
                    <p class="card-text text-secondary">{{ $service->description }}</p>
                    <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded mb-3">
                        <span class="text-muted">Price:</span>
                        <strong class="text-primary">${{ number_format($service->price, 2) }}</strong>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100" 
                                onclick="return confirm('Delete this service?')">
                                <i class="fas fa-trash me-2"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .card {
        transition: transform 0.2s;
        border: 1px solid #2c3e50;
        border-radius: 8px;
    }
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(44, 62, 80, 0.1);
    }
    .btn-primary {
        background-color: #2c3e50;
        border-color: #2c3e50;
    }
    .btn-outline-primary {
        border-color: #2c3e50;
        color: #2c3e50;
    }
    .btn-outline-primary:hover {
        background-color: #2c3e50;
        color: white;
    }
</style>
@endsection