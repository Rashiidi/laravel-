@extends('websitelayout.app')

@section('content')
<div class="container">
    <h1>My Registrations</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Event Title</th>
                <th>Date</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $registration)
                <tr>
                    <td>{{ $registration->event->title }}</td>
                    <td>{{ $registration->event->date }}</td>
                    <td>{{ $registration->event->location }}</td>
                    <td>
                        <a href="{{ route('registrations.edit', $registration->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('cancel-registration', $registration->id) }}" method="POST" style="display:inline;">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
