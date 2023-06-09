<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'teacher';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     public function drives()
     {
         return $this->hasMany(Drive::class, 'idTeacher');
     }

     public function permissions()
     {
         return $this->hasMany(TeacherPermissions::class, 'idTeacher', 'id');
     }

     public function opinions()
     {
         return $this->hasMany(TeacherOpinions::class, 'idTeacher', 'id');
     }
  
     public function vehicles()
     {
         return $this->hasMany(Vehicle::class, 'Teacher_id', 'id');
     }
     
     
    protected $fillable = [
        'name',
        'surname',
        'birthDate',
        'phoneNumber',
        'email',
        'password',
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

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}