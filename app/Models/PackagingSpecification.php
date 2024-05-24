<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagingSpecification extends Model
{
    use HasFactory;

    protected $table = 'packaging_specifications';

    protected $fillable = [
        'id',
        'name',
    ];
}
