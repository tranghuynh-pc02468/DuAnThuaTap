<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smell extends Model
{
    use HasFactory;

    protected $table = 'smells';

    protected $fillable = [
        'id',
        'name'
    ];
}
