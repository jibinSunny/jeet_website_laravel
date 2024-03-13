<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    public function usertypes()
    {
        return $this->belongsTo(UserType::class, 'usertype');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user');
    }
    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 'teacher');
    }
    public function salary_templates()
    {
        return $this->belongsTo(SalaryTemplate::class, 'salary_template');
    }
}
