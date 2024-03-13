<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherleaveApply extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'teacher_leave_applications';

    protected $fillable = [
        'teacher','action_reason','leave_category','apply_date','od_status','from_date','from_time','to_date','to_time','leave_days','reason','attachment','applicationto_usertype','approver_user','approver_usertype','status','academic_year'
    ];

    public function Teachername()
    {
        return $this->belongsTo(Teacher::class, 'teacher');
    }
    public function leave_categoryname()
    {
        return $this->belongsTo(LeaveCategory::class, 'leave_category');
    }
    public function usertypename()
    {
        return $this->belongsTo(UserType::class, 'applicationto_usertype');
    }
}
