<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'brand',
        'model',
        'year',
        'license_plate',
        'gray_card',
        'green_card',
        'car_photo',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
