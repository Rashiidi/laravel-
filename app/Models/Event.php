<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this line
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory; // Add this line

    protected $fillable = [
        'title',
        'location',
        'date',
        'description',
        'trainer_id',
    ];

    public function registrations()
{
    return $this->hasMany(Registration::class, 'event_id');
}

public function registeredEvents()
{
    return $this->belongsToMany(Event::class, 'registrations');
}

public function feedback()
{
    return $this->hasMany(Feedback::class);
}


    // Define the relationship with users (registered users)
    public function participants()
    {
        return $this->belongsToMany(User::class, 'registrations', 'event_id', 'user_id');
    }
}