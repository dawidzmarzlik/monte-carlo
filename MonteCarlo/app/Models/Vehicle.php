<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicle';
    public $timestamps = false;

    protected $fillable = [
        'brand',
        'model',
        'numberplate',
        'type'
    ];
}
