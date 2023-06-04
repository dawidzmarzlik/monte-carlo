<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPermissions extends Model
{
    use HasFactory;

    protected $table = 'teacherpermissons';
    protected $primaryKey = ['idCourseRecords', 'idTeacher'];
    public $incrementing = false;
    public $timestamps = false;

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'idTeacher', 'id');
    }

    public function courseRecords()
    {
        return $this->belongsTo(Category::class, 'idCourseRecords', 'id');
    }

    protected $fillable = [
        'idCourseRecords',
        'idTeacher',
    ];
}