<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhereProduct extends Model
{
    use HasFactory;

    protected $table = 'where_products';

    protected $fillable = [
        'id',
        'name',
    ];
}
