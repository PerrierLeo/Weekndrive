<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'address',
        'zip_code',
        'city',
        'transaction_id',
        'total',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
