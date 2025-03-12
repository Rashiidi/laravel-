@extends('adminlayout.app')

@section('content')

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Manage Users</h1>
    </div>

    <!-- Session Success Message -->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center mb-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($users as $user)
        <div class="col">
            <div class="card h-100 border-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary mb-3">{{ $user->name }}</h5>
                    <div class="bg-light p-3 rounded mb-3">
                        <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                        <p class="mb-1"><strong>Role:</strong> {{ $user->role }}</p>
                        <p class="mb-0 text-muted small"><strong>User ID:</strong> {{ $user->id }}</p>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-edit me-2"></i>Edit
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100" 
                                onclick="return confirm('Delete this user?')">
                                <i class="fas fa-trash-alt me-2"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection