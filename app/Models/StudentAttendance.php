<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentAttendance extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'student_attendances';

    protected $fillable = [
        'academic_year','student','class','division','department','month','year','created_user','created_usertype','a1',
        'a2','a3','a4','a5','a6','a7','a8','a9','a10','a11','a12','a13','a14','a15','a16','a17','a18','a19','a20','a21',
        'a22','a23','a24','a25','a26','a27','a28','a29','a30','a31'
    ];

    public function classname()
    {
        return $this->belongsTo(ClassModel::class, 'class');
    }
    public function academicyearname()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year');
    }
    public function divisionname()
    {
        return $this->belongsTo(Division::class, 'division');
    }
    public function departmentname()
    {
        return $this->belongsTo(Department::class, 'department');
    }
    public function studentname()
    {
        return $this->belongsTo(Student::class, 'student');
    }
}
