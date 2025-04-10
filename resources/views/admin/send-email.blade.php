@extends('adminlayout.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-primary">Send Email to Trainers</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<form action="{{ route('email.send') }}" method="POST">

        @csrf
        <div class="mb-3">
            <label for="subject" class="form-label">Email Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send Email</button>
    </form>
</div>


@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@endsection
