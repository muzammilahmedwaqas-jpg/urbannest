<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketRegistrationController extends Controller
{
    public function store(StoreTicketRequest $request, Event $event)
    {
        $user = auth()->user();

        // Unique ticket identifier
        $ticketCode = 'TICK-' . strtoupper(Str::random(10));

        $qrPayload = json_encode([
            'ticket_code' => $ticketCode,
            'event' => $event->title,
            'attendee' => $user->name,
            'email' => $user->email,
            'issued_at' => now()->toDateTimeString(),
        ]);

     
        $fileName = 'tickets/qr_' . $ticketCode . '.svg';
        $qrImage = QrCode::size(240)->generate($qrPayload);
        Storage::disk('public')->put($fileName, $qrImage);

    
        $ticket = Ticket::create([
            'ticket_code' => $ticketCode,
            'user_id' => $user->id,
            'event_id' => $event->id,
            'ticket_type_id' => $request->ticket_type_id,
            'qr_code_path' => $fileName,
        ]);

        return redirect()->route('tickets.confirmation', $ticket);
    }

    public function confirmation(Ticket $ticket)
    {
       
        if ($ticket->user_id !== auth()->id()) {
            abort(403, 'Unauthorized ticket access.');
        }

        $ticket->load(['event', 'ticketType', 'user']);

        return view('public.tickets.confirmation', compact('ticket'));
    }
}