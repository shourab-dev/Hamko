<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;


    function dineType()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
