<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PublicEventController extends Controller
{
    public function index()
    {
        $events = Event::with('ticketTypes')->latest()->get();
        return view('public.events.index', compact('events'));
    }

    public function show(Event $event)
    {
        $event->load('ticketTypes');
        
        $alreadyRegistered = false;
        $userTicket = null;
        if (auth()->check()) {
            $userTicket = auth()->user()->tickets()->where('event_id', $event->id)->first();
            $alreadyRegistered = !is_null($userTicket);
        }

        return view('public.events.show', compact('event', 'alreadyRegistered', 'userTicket'));
    }
}