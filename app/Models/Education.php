<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'birth_of_date',
        'program',
    ];
}
