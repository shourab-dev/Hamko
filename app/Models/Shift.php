<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "status",
        "time",
    ];

    
    function employee() {
        return $this->hasMany(Employee::class);
    }

}
