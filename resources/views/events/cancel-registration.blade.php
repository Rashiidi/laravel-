@extends('adminlayout.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">My Registrations</h1>

    <div class="row">
        @foreach ($registrations as $event)
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm rounded-lg overflow-hidden bg-white">
                <div class="card-body text-dark p-4">
                    <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                    <p class="card-text"><strong>Location:</strong> {{ $event->location }}</p>
                    <p class="card-text"><strong>Date:</strong> {{ $event->date }}</p>
                    <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                    <form action="{{ route('cancel-registration', $event->pivot->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancel Registration</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection