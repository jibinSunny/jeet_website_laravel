<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserleaveApply extends Model
{
    use HasFactory;
    protected $table = 'user_leave_applications';



    public function username()
    {
        return $this->belongsTo(User::class, 'user');
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


