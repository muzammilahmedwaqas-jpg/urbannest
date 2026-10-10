<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class RegistrationsController extends Controller
{
    public function index()
    {
        $registrations = Ticket::with(['user', 'event', 'ticketType'])->latest()->get();
        return view('admin.registrations.index', compact('registrations'));
    }

    public function export()
    {
        $fileName = 'event_registrations_' . now()->format('Y_m_d_His') . '.csv';

        return response()->streamDownload(function () {
            $handle = fopen('php://output', 'w');


            fputcsv($handle, [
                'Attendee Name',
                'Email',
                'Event Title',
                'Ticket ID / Code',
                'Ticket Tier',
                'Registered At',
            ]);

            Ticket::with(['user', 'event', 'ticketType'])
                ->chunk(100, function ($tickets) use ($handle) {
                    foreach ($tickets as $ticket) {
                        fputcsv($handle, [
                            $ticket->user->name ?? 'N/A',
                            $ticket->user->email ?? 'N/A',
                            $ticket->event->title ?? 'N/A',
                            $ticket->ticket_code,
                            $ticket->ticketType->name ?? 'N/A',
                            $ticket->created_at->format('Y-m-d H:i:s'),
                        ]);
                    }
                });

            fclose($handle);
        }, $fileName, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
        ]);
    }
}