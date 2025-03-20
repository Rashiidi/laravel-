<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'trainer_activity', 'trainer_id', 'event_id');
    }
}