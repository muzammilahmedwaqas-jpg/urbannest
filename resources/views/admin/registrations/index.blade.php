@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-0">Event Registrations</h3>
        <p class="text-muted small mb-0">List of all attendee tickets and stored QR passes.</p>
    </div>
    <a href="{{ route('admin.registrations.export') }}" class="btn btn-success d-flex align-items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
        </svg>
        Export CSV
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">QR Code</th>
                        <th>Ticket Code</th>
                        <th>Attendee</th>
                        <th>Event</th>
                        <th>Tier</th>
                        <th>Registered At</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($registrations as $reg)
                        <tr>
                            <td class="ps-3">
                                @if ($reg->qr_code_path)
                                    <a href="{{ asset('storage/' . $reg->qr_code_path) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $reg->qr_code_path) }}" 
                                             alt="QR Thumbnail" 
                                             class="border rounded p-1 bg-white shadow-sm" 
                                             style="width: 50px; height: 50px; object-fit: contain;">
                                    </a>
                                @else
                                    <span class="badge bg-secondary">No QR</span>
                                @endif
                            </td>
                            <td>
                                <span class="fw-bold font-monospace text-primary">{{ $reg->ticket_code }}</span>
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $reg->user->name ?? 'Guest / Deleted' }}</div>
                                <div class="text-muted small">{{ $reg->user->email ?? 'No email' }}</div>
                            </td>
                            <td>
                                <span class="fw-semibold">{{ $reg->event->title ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle">
                                    {{ $reg->ticketType->name ?? 'Standard' }}
                                </span>
                            </td>
                            <td class="text-secondary small">
                                {{ $reg->created_at->format('M d, Y h:i A') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                No ticket registrations recorded yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection