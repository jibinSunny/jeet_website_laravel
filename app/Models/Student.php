<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'students';

    protected $fillable = [
        'class','department','profile_image'
    ];
    public function classname()
    {
        return $this->belongsTo(ClassModel::class, 'class');
    }
    public function departmentname()
    {
        return $this->belongsTo(Department::class, 'department');
    }

    public function attendance()
    {
        return $this->hasMany(StudentAttendance::class, 'student');
    }
    public function postings()
    {
        return $this->hasMany(Posting::class, 'student');
    }
    public function divisions()
    {
        return $this->belongsTo(Division::class, 'division');
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
    public function parentname()
    {
        return $this->belongsTo(ParentModel::class, 'parent');
    }
    public function usertypename()
    {
        return $this->belongsTo(UserType::class, 'usertype');
    }
}
