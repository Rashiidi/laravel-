<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{

    protected $fillable = ['event_id', 'user_id']; // Adjust based on your database

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
