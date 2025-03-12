@extends('adminlayout.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">Edit User</h1>

    <div class="card shadow-sm border-0 rounded p-4 bg-white">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" name="name" id="name" 
                    class="form-control" 
                    value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" name="email" id="email" 
                    class="form-control" 
                    value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label fw-bold">Role</label>
                <input type="text" name="role" id="role" 
                    class="form-control" 
                    value="{{ old('role', $user->role) }}" required>
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