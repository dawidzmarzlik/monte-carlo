<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPermissions extends Model
{
    use HasFactory;

    protected $table = 'enrolledstudent';
    protected $primaryKey = ['idCourseRecords', 'idStudent'];
    public $incrementing = false;
    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Student::class, 'idStudent', 'id');
    }

    public function courseRecords()
    {
        return $this->belongsTo(Category::class, 'idCourseRecords', 'id');
    }

    protected $fillable = [
        'idCourseRecords',
        'idStudent',
    ];
}
