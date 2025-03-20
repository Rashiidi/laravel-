<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;


public function trainers()
{
    return $this->belongsToMany(Trainer::class, 'trainer_activity');
}

public function registrations()
{
    return $this->hasMany(Registration::class, 'event_id'); // 'activity_id' links registrations to activities
}


}
