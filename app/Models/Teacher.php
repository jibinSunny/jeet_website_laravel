<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;
    protected $rules = [
        'email_address' => 'sometimes|required|email|unique:users'
    ];
    public function attendance()
    {
        return $this->hasMany(TeacherAttendance::class, 'teacher');
    }
    public function usertypename()
    {
        return $this->belongsTo(UserType::class, 'usertype');
    }
    public function subjectname()
    {
        return $this->belongsTo(Subject::class, 'subjects');
    }
    public function states()
    {
        return $this->belongsTo(State::class, 'state');
    }
    public function countries()
    {
        return $this->belongsTo(Country::class, 'country');
    }
    public function nationalities()
    {
        return $this->belongsTo(Country::class, 'nationality');
    }
    

}
