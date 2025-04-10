@extends('trainerlayout.app')

@section('content')


<div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
    <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2 border-blue-500">
        📬 Trainer Mailbox
    </h2>

    <div class="overflow-hidden border rounded-lg">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Subject</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Message</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Sent On</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($emails as $email)
                    <tr class="hover:bg-gray-100 transition duration-200">
                        <td class="px-6 py-4 font-semibold text-gray-800">{{ $email->subject }}</td>
                        <td class="px-6 py-4 text-gray-700 truncate w-96">{{ Str::limit($email->message, 50) }}</td>
                        <td class="px-6 py-4 text-gray-500 text-sm">{{ $email->created_at->format('d M Y, H:i A') }}</td>
                        <td class="px-6 py-4 text-center">
                            <button onclick="openEmailModal({{ $email->id }})"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                                View
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Email Modal -->
<div id="emailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h3 id="emailSubject" class="text-xl font-semibold text-gray-800 mb-3"></h3>
        <p id="emailMessage" class="text-gray-700 mb-4"></p>
        <p id="emailDate" class="text-gray-500 text-sm"></p>
        <button onclick="closeEmailModal()"
            class="mt-4 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
            Close
        </button>
    </div>
</div>



<div class="container py-4">
    <div class="dashboard-header">
        <h1 class="page-title">Training Events</h1>
        <div class="total-events">{{ $events->count() }} Upcoming Sessions</div>
    </div>

    @if ($events->isEmpty())
    <div class="no-events">
        <div class="empty-card">
            <i class="fas fa-calendar-star"></i>
            <h3>No Events Scheduled</h3>
            <p>Your assigned events will appear here</p>
        </div>
    </div>
    @else
    <div class="card-grid">
        @foreach ($events as $event)
        <div class="event-card">
            <div class="card-header">
                <div class="event-date">
                    <div class="date-day">{{ date('d', strtotime($event->date)) }}</div>
                    <div class="date-month">{{ date('M', strtotime($event->date)) }}</div>
                </div>
                <h3 class="event-title">{{ $event->title }}</h3>
            </div>
            <div class="card-content">
                <p class="event-description">{{ $event->description }}</p>
                <div class="event-details">
                    <div class="detail-item">
                        <i class="fas fa-map-pin"></i>
                        <span>{{ $event->location }}</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-clock"></i>
                        <span>{{ date('h:i A', strtotime($event->date)) }}</span>
                    </div>
                </div>
            </div>
            <div class="card-actions">
                <a href="{{ route('trainer.participants', $event->id) }}" class="action-link">
                    Manage Participants
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>


@endsection

<style>
/* Base Styles */
.dashboard-header {
    margin-bottom: 2.5rem;
}

.page-title {
    font-size: 2rem;
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.total-events {
    color: #718096;
    font-size: 0.9rem;
}

/* Card Grid */
.card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
}

/* Event Card */
.event-card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid #e2e8f0;
}

.event-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}

/* Card Header */
.card-header {
    padding: 1.5rem;
    background: #f7fafc;
    border-bottom: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.event-date {
    background: #ffffff;
    border-radius: 8px;
    padding: 0.75rem;
    text-align: center;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.date-day {
    font-size: 1.5rem;
    font-weight: 600;
    color: #2d3748;
}

.date-month {
    text-transform: uppercase;
    font-size: 0.75rem;
    color: #718096;
    letter-spacing: 0.5px;
}

.event-title {
    font-size: 1.1rem;
    color: #2d3748;
    margin: 0;
    flex-grow: 1;
}

/* Card Content */
.card-content {
    padding: 1.5rem;
}

.event-description {
    color: #4a5568;
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.event-details {
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: #4a5568;
    font-size: 0.9rem;
}

.detail-item i {
    color: #718096;
    width: 20px;
    text-align: center;
}

/* Card Actions */
.card-actions {
    padding: 1rem 1.5rem;
    border-top: 1px solid #e2e8f0;
}

.action-link {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    color: #4299e1;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s ease;
}

.action-link:hover {
    color: #3182ce;
    gap: 0.75rem;
}

/* Empty State */
.no-events {
    padding: 4rem 1rem;
    text-align: center;
}

.empty-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 3rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    margin: 0 auto;
}

.empty-card i {
    font-size: 3rem;
    color: #cbd5e0;
    margin-bottom: 1.5rem;
}

.empty-card h3 {
    color: #2d3748;
    margin-bottom: 0.5rem;
}

.empty-card p {
    color: #718096;
    margin: 0;
}

@media (max-width: 768px) {
    .card-grid {
        grid-template-columns: 1fr;
    }
    
    .page-title {
        font-size: 1.5rem;
    }
    
    .card-header {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>


<script>
    function openEmailModal(emailId) {
    fetch(`/emails/${emailId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('emailSubject').textContent = data.subject;
            document.getElementById('emailMessage').textContent = data.message;
            document.getElementById('emailDate').textContent = "Sent on " + data.created_at;
            document.getElementById('emailModal').classList.remove('hidden');
        });
}

// ✅ Ensure this function correctly hides the modal
function closeEmailModal() {
    document.getElementById('emailModal').classList.add('hidden');
}

// ✅ Attach event listener to close modal when clicking outside
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("emailModal");

    modal.addEventListener("click", function (event) {
        if (event.target === modal) {
            closeEmailModal();
        }
    });
});

</script>
