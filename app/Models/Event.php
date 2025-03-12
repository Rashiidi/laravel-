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
    ];
}