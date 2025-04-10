@extends('adminlayout.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">Activity Performance</h1>

    <div class="row">
        @foreach ($events as $event)
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm rounded-lg overflow-hidden bg-white">
                <div class="card-body text-dark p-4">
                    <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                    <p class="card-text"><strong>Location:</strong> {{ $event->location }}</p>
                    <p class="card-text"><strong>Date:</strong> {{ $event->date }}</p>
                    <p class="card-text"><strong>Participants:</strong> {{ $event->participants }}</p>
                    <p class="card-text"><strong>Revenue:</strong> ${{ $event->revenue }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
