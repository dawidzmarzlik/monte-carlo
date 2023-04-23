<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questionsdatabase';
    public $timestamps = false;

    protected $fillable = [
        'questionText',
        'answer1',
        'answer2',
        'answer3',
        'correctAnswer',
        'questionScore',
        'questionFile'
    ];
}