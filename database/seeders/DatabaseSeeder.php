<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $event1 = Event::updateOrCreate(
            ['title' => 'UrbanNest Tech Conference 2026'],
            [
                'description' => 'Flagship conference on cloud native development and microservices.',
                'location' => 'Convention Hall A, Lahore',
                'start_date' => '2026-11-15 09:00:00',
                'end_date' => '2026-11-15 17:00:00',
            ]
        );
        TicketType::updateOrCreate(['event_id' => $event1->id, 'name' => 'Standard Entry'], ['price' => 2000.00, 'capacity' => 250]);
        TicketType::updateOrCreate(['event_id' => $event1->id, 'name' => 'VIP Access'], ['price' => 5000.00, 'capacity' => 50]);

        $event2 = Event::updateOrCreate(
            ['title' => 'Startup Founders Mixer'],
            [
                'description' => 'An evening for entrepreneurs, angel investors, and software founders.',
                'location' => 'UrbanNest Workspace Lounge',
                'start_date' => '2026-11-20 18:00:00',
                'end_date' => '2026-11-20 21:00:00',
            ]
        );
        TicketType::updateOrCreate(['event_id' => $event2->id, 'name' => 'Early Bird'], ['price' => 1000.00, 'capacity' => 80]);
        TicketType::updateOrCreate(['event_id' => $event2->id, 'name' => 'General Pass'], ['price' => 1500.00, 'capacity' => 120]);

        $event3 = Event::updateOrCreate(
            ['title' => 'Hands-on Laravel Workshop'],
            [
                'description' => 'Practical laboratory covering Eloquent relationships, queues, and containerization.',
                'location' => 'Training Suite 2',
                'start_date' => '2026-12-05 10:00:00',
                'end_date' => '2026-12-05 14:00:00',
            ]
        );
        TicketType::updateOrCreate(['event_id' => $event3->id, 'name' => 'Workshop Seat'], ['price' => 3000.00, 'capacity' => 35]);
    }
}