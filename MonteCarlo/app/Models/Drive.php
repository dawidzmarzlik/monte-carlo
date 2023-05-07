<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    use HasFactory;

    protected $table = 'Drive';

    protected $fillable = [
        'id',
        'dateTime',
        'idTeacher',
        'idStudent',
    ];

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'id', 'idTeacher');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'idStudent');    }
}