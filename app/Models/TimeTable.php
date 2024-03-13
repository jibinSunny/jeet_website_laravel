<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TimeTable extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'timetables';

    protected $fillable = [
        'year','class','division','department','subject','teacher','day','start_time','end_time','room','created_user','created_usertype'
    ];
    public function yearname() {
        return $this->belongsTo(AcademicYear::class, 'year');
    }
    public function classname() {
        return $this->belongsTo(ClassModel::class, 'class');
    }
    public function divisionname() {
        return $this->belongsTo(Division::class, 'division');
    }
    public function departmentname() {
        return $this->belongsTo(Department::class, 'department');
    }
    public function subjectname() {
        return $this->belongsTo(Subject::class, 'subject');
    }
    public function Teachername() {
        return $this->belongsTo(Teacher::class, 'teacher');
    }
    public function roomname() {
        return $this->belongsTo(Room::class, 'room');
    }
}
