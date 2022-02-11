<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    // use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'content', 
    ];

    public $timestamps = true;
}
