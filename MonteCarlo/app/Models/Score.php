<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $table = 'testscore';
    public $timestamps = false;

    protected $fillable = [
        'score',
        'date',
        'idStudent',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'id', 'idStudent');
    }
}
