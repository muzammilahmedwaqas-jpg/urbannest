<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'description', 
        'location', 
        'start_date', 
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime', 
        'end_date' => 'datetime',
    ];

    public function ticketTypes():HasMany
    {
        return $this->hasMany(TicketType::class);
    }

}
