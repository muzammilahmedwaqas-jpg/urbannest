@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold text-dark">Ticket Types Directory</h3>
    <a href="{{ route('admin.ticket-types.create') }}" class="btn btn-primary btn-sm">+ Add New Ticket Type</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Ticket Name</th>
                        <th>Associated Event</th>
                        <th>Price</th>
                        <th>Capacity</th>
                        <th class="text-end pe-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ticketTypes as $ticket)
                        <tr>
                            <td class="ps-3 fw-semibold">{{ $ticket->name }}</td>
                            <td>{{ $ticket->event->title ?? 'N/A' }}</td>
                            <td>Rs. {{ number_format($ticket->price, 2) }}</td>
                            <td><span class="badge bg-info text-dark">{{ $ticket->capacity }}</span></td>
                            <td class="text-end pe-3">
                                <a href="{{ route('admin.ticket-types.edit', $ticket) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                                <form action="{{ route('admin.ticket-types.destroy', $ticket) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this ticket type?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">No ticket types found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection