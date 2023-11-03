<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'sender_name','sender_phone','sender_city','receiver_name','receiver_phone','receiver_city'
    ];
}
