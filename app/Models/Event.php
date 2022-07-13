<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'description',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'available_car',
        'available_place',
        'image_event',
        'status',
        'price',
        'pilote_price',
        'companion_price'
    ];
}
