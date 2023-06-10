<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherOpinions extends Model
{
    use HasFactory;

    protected $table = 'teacheropinions';
    public $timestamps = false;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'idTeacher', 'id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'idStudent');
    }

    protected $fillable = [
        'score',
        'opinionText',
        'idStudent',
        'idTeacher',
    ];
}