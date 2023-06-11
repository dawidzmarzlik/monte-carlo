<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicle';
    public $timestamps = false;

    public function teacher()
     {
         return $this->belongsTo(Teacher::class, 'Teacher_id', 'id');
     }

    protected $fillable = [
        'brand',
        'model',
        'numberplate',
        'type'
    ];
}
