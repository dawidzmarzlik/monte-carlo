<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;
    protected $table = 'opinions';
    public $timestamps = false;

    protected $fillable = [
        'score',
        'opinionText',
        'idStudent'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'idStudent');
    }
}
