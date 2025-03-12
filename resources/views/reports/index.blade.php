@extends('adminlayout.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary fw-bold">Reports</h1>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-lg overflow-hidden bg-white">
                <div class="card-body text-dark p-4">
                    <h5 class="card-title fw-bold">Total Revenue</h5>
                    <p class="card-text">${{ $totalRevenue }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-lg overflow-hidden bg-white">
                <div class="card-body text-dark p-4">
                    <h5 class="card-title fw-bold">Total Participants</h5>
                    <p class="card-text">{{ $totalParticipants }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection