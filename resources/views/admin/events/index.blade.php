@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold text-dark">Events Directory</h3>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm">+ Add New Event</a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">Title</th>
                        <th>Location</th>
                        <th>Start Time</th>
                        <th>Ticket Types</th>
                        <th class="text-end pe-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($events as $event)
                        <tr>
                            <td class="ps-3 fw-semibold">{{ $event->title }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->start_date->format('M d, Y h:i A') }}</td>
                            <td>
                                @foreach ($event->ticketTypes as $ticket)
                                    <span class="badge bg-secondary me-1">{{ $ticket->name }} (Rs. {{ number_format($ticket->price, 0) }})</span>
                                @endforeach
                            </td>
                            <td class="text-end pe-3">
                                <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">No events created yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection