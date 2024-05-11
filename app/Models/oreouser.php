<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oreouser extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'age',
        'nickname',
    ];
}
