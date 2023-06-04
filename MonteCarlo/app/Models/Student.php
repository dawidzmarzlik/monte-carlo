<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'student';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     public function drives()
     {
         return $this->hasMany(Drive::class, 'idStudent');
     }

    protected $fillable = [
        'name',
        'surname',
        'email',
        'birthDate',
        'pkk',
        'phoneNumber',
        'password',
        'Teacher_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'Teacher_id');
    }

    public function opinions()
    {
        return $this->hasMany(Opinion::class, 'idStudent');
    }

    public function teacher_opinions()
    {
        return $this->hasOne(TeacherOpinions::class, 'idStudent', 'id');
    }
}