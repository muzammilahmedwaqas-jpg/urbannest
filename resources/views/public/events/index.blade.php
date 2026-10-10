@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2 class="fw-bold">Upcoming Events</h2>
        <p class="text-muted">Explore upcoming conferences, workshops, and gatherings at UrbanNest.</p>
    </div>
</div>

<div class="row g-4">
    @forelse ($events as $event)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-primary-subtle text-primary mb-2 align-self-start">
                        {{ \Carbon\Carbon::parse($event->start_date ?? $event->start_time)->format('M d, Y') }}
                    </span>
                    <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                    <p class="text-muted small mb-2">📍 {{ $event->location }}</p>
                    <p class="card-text text-secondary flex-grow-1">
                        {{ Str::limit($event->description, 110) }}
                    </p>
                    <div class="mt-3 pt-3 border-top d-flex justify-content-between align-items-center">
                        <small class="text-muted">From Rs. {{ number_format($event->ticketTypes->min('price') ?? 0, 0) }}</small>
                        <a href="{{ route('events.show', $event) }}" class="btn btn-dark btn-sm">View & Register &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">No upcoming events found.</p>
        </div>
    @endforelse
</div>
@endsection