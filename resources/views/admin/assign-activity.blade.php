
@extends('adminlayout.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Assign Activity to Trainer</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.assignActivity') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="trainer_id" class="form-label">Select Trainer</label>
            <select name="trainer_id" id="trainer_id" class="form-control" required>
                <option value="">-- Select Trainer --</option>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="activity_id" class="form-label">Select Activity</label>
            <select name="activity_id" id="activity_id" class="form-control" required>
                <option value="">-- Select Activity --</option>
                @foreach($activities as $activity)
                    <option value="{{ $activity->id }}">{{ $activity->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Assign Activity</button>
    </form>
</div>
@endsection