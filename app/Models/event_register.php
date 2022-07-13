<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event_register extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',
        'user_id',
        'event_id',
        'second_pilote',
        'third_pilote',
        'first_companion',
        'second_companion',
        'total_companion_price',
        'total_price_ht',
        'total_pilote_price'

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
