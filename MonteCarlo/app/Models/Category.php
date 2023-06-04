<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'courserecords';
    public $timestamps = false;

    protected $fillable = [
        'category',
        'price',
    ];
}