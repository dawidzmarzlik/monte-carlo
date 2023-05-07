<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    use HasFactory;

    protected $table = 'Drive';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'dateTime',
        'idTeacher',
        'idStudent',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'idTeacher');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'idStudent');    
    }

}