@extends('layouts.app')

@section('content')

<!-- Services Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Our Services</h2>
        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-4">
                    <div class="card service-card mb-4">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="{{ $service->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $service->name }}</h5>
                            <p class="card-text">{{ $service->description }}</p>
                            <p class="card-text"><strong>Price:</strong> ${{ $service->price }}</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous">
</script>

@endsection
