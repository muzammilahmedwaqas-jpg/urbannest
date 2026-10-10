@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <nav aria-label="breadcrumb" class="mb-3">
            <a href="{{ route('events.index') }}" class="text-decoration-none text-muted">&larr; Back to Events</a>
        </nav>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <h2 class="fw-bold mb-3">{{ $event->title }}</h2>
                <div class="d-flex flex-wrap gap-3 text-muted mb-4 pb-3 border-bottom">
                    <div> <strong>Date:</strong> {{ \Carbon\Carbon::parse($event->start_date ?? $event->start_time)->format('M d, Y h:i A') }}</div>
                    <div> <strong>Location:</strong> {{ $event->location }}</div>
                </div>
                <h5>About this Event</h5>
                <p class="text-secondary">{{ $event->description }}</p>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 fw-bold">Ticket Registration</div>
            <div class="card-body p-4">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                @auth
                    @if ($alreadyRegistered)
                        <div class="alert alert-info d-flex justify-content-between align-items-center mb-0">
                            <div>
                                <strong>Registered!</strong> You already hold a ticket for this event.
                            </div>
                            <a href="{{ route('tickets.confirmation', $userTicket) }}" class="btn btn-outline-primary btn-sm">View Ticket & QR Pass</a>
                        </div>
                    @else
                        <form action="{{ route('tickets.register', $event) }}" method="POST">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Choose Your Ticket Tier</label>
                                @foreach ($event->ticketTypes as $tier)
                                    <div class="form-check p-3 border rounded mb-2">
                                        <input class="form-check-input" type="radio" name="ticket_type_id" id="tier_{{ $tier->id }}" value="{{ $tier->id }}" required>
                                        <label class="form-check-label w-100 d-flex justify-content-between" for="tier_{{ $tier->id }}">
                                            <span><strong>{{ $tier->name }}</strong> (Capacity: {{ $tier->capacity }})</span>
                                            <span class="text-primary fw-bold">Rs. {{ number_format($tier->price, 2) }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Register & Get QR Ticket</button>
                        </form>
                    @endif
                @else
                    <div class="text-center py-4">
                        <p class="text-muted">You need to be logged in to claim a ticket for this event.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary px-4 me-2">Log In</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary px-4">Create Account</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection