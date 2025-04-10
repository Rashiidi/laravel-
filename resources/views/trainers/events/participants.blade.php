@extends('trainerlayout.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
            <i class="fas fa-arrow-left me-2"></i>Back to Events
        </a>
        <h1 class="text-primary mb-0">Participants: {{ $event->title }}</h1>
    </div>

    <!-- Event Details Card -->
    <div class="card event-detail-card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="detail-item">
                        <i class="fas fa-map-marker-alt text-primary"></i>
                        <div>
                            <h5>Location</h5>
                            <p class="mb-0">{{ $event->location }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="detail-item">
                        <i class="fas fa-calendar-alt text-primary"></i>
                        <div>
                            <h5>Date & Time</h5>
                            <p class="mb-0">{{ $event->date }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="detail-item">
                        <i class="fas fa-info-circle text-primary"></i>
                        <div>
                            <h5>Description</h5>
                            <p class="mb-0">{{ $event->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Participants Section -->
    <div class="participants-section">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Registered Participants</h3>
            <span class="badge bg-primary">{{ count($participants) }} Attendees</span>
        </div>

        @if (!is_iterable($participants) || $participants->isEmpty())
            <div class="empty-state">
                <div class="empty-content">
                    <i class="fas fa-users-slash fa-3x text-muted"></i>
                    <h4 class="mt-3">No Participants Yet</h4>
                    <p class="text-muted">Participants will appear here once registered</p>
                </div>
            </div>
        @else
            <div class="participants-list">
                @foreach ($participants as $participant)
                <div class="participant-card">
                    <div class="participant-info">
                        <div class="avatar">{{ strtoupper(substr($participant->name, 0, 1)) }}</div>
                        <div class="details">
                            <h5 class="mb-1">{{ $participant->name }}</h5>
                            <p class="text-muted mb-0">{{ $participant->email }}</p>
                        </div>
                    </div>
                    <div class="participant-meta">
                        <span class="badge bg-success">
                            <i class="fas fa-check-circle me-2"></i>Registered
                        </span>
                        <!-- Add more status indicators if needed -->
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection

<style>
.event-detail-card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
}

.detail-item {
    display: flex;
    align-items: center;
    padding: 1rem;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.03);
}

.detail-item i {
    font-size: 1.5rem;
    margin-right: 1rem;
    width: 40px;
    text-align: center;
}

.participants-section {
    background: white;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.participants-list {
    display: grid;
    gap: 1rem;
}

.participant-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.25rem;
    background: #fff;
    border-radius: 8px;
    transition: all 0.2s ease;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.participant-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.participant-info {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #1e3a8a;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.empty-state {
    padding: 4rem 2rem;
    text-align: center;
    background: #f8f9fa;
    border-radius: 12px;
    margin: 2rem 0;
}

.empty-content i {
    opacity: 0.5;
}

@media (max-width: 768px) {
    .participant-card {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .detail-item {
        margin-bottom: 1rem;
    }
    
    .d-flex.justify-content-between.align-items-center.mb-4 {
        flex-direction: column-reverse;
        gap: 1rem;
        align-items: flex-start;
    }
}
</style>