@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow border-0 text-center p-4">
            <div class="mb-3 text-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
            </div>
            <h3 class="fw-bold mb-1">Registration Confirmed!</h3>
            <p class="text-muted">Aapka digital admission pass generate ho chuka hai.</p>

            <div class="bg-light border rounded p-4 my-3 text-center">
                <div class="mb-3 d-flex justify-content-center">
                    <img src="{{ asset('storage/' . $ticket->qr_code_path) }}" alt="Ticket QR Code" class="img-fluid bg-white p-2 border rounded" style="max-width: 220px;">
                </div>
                
                <h5 class="fw-bold text-dark mb-1">{{ $ticket->ticket_code }}</h5>
                <span class="badge bg-primary fs-6">{{ $ticket->ticketType->name }} Pass</span>

                <div class="text-start mt-3 pt-3 border-top small">
                    <div class="row mb-1">
                        <span class="col-4 text-muted">Event:</span>
                        <span class="col-8 fw-semibold">{{ $ticket->event->title }}</span>
                    </div>
                    <div class="row mb-1">
                        <span class="col-4 text-muted">Attendee:</span>
                        <span class="col-8 fw-semibold">{{ $ticket->user->name }} ({{ $ticket->user->email }})</span>
                    </div>
                    <div class="row mb-1">
                        <span class="col-4 text-muted">Location:</span>
                        <span class="col-8">{{ $ticket->event->location }}</span>
                    </div>
                    <div class="row mb-1">
                        <span class="col-4 text-muted">Price:</span>
                        <span class="col-8 fw-semibold">Rs. {{ number_format($ticket->ticketType->price, 2) }}</span>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center gap-2">
                <button onclick="window.print()" class="btn btn-outline-secondary btn-sm"> Print Pass</button>
                <a href="{{ route('events.index') }}" class="btn btn-primary btn-sm">Back to Events</a>
            </div>
        </div>
    </div>
</div>
@endsection