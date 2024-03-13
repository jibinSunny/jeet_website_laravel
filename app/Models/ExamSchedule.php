<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    use HasFactory;

    protected $table = 'examschedule';

    protected $fillable = [
        'name','category','class','division','instruction_id','subject','edate','examfrom','examto','room','academic_year','created_user','created_usertype',
    ];
    public function exams_category() {
        return $this->belongsTo(ExamCategory::class, 'category');
    }
    public function classes() {
        return $this->belongsTo(ClassModel::class, 'class');
    }
    public function divisions() {
        return $this->belongsTo(Division::class, 'division');
    }
    public function subjects() {
        return $this->belongsTo(Subject::class, 'subject');
    }
    public function academicyears() {
        return $this->belongsTo(AcademicYear::class, 'academic_year');
    }
    public function rooms() {
        return $this->belongsTo(Room::class, 'room');
    }
    public function instructions() {
        return $this->belongsTo(Instruction::class, 'instruction_id');
    }
}
