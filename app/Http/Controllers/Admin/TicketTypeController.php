<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    public function index()
    {
        $ticketTypes = TicketType::with('event')->latest()->get();
        return view('admin.ticket_types.index', compact('ticketTypes'));
    }

    public function create()
    {
        $events = Event::all();
        return view('admin.ticket_types.create', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:0',
        ]);

        TicketType::create($validated);

        return redirect()->route('admin.ticket-types.index')->with('success', 'Ticket type created successfully.');
    }

    public function edit(TicketType $ticketType)
    {
        $events = Event::all();
        return view('admin.ticket_types.edit', compact('ticketType', 'events'));
    }

    public function update(Request $request, TicketType $ticketType)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:0',
        ]);

        $ticketType->update($validated);

        return redirect()->route('admin.ticket-types.index')->with('success', 'Ticket type updated successfully.');
    }

    public function destroy(TicketType $ticketType)
    {
        $ticketType->delete();
        return redirect()->route('admin.ticket-types.index')->with('success', 'Ticket type deleted successfully.');
    }
}