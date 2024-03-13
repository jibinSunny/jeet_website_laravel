<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryTemplate extends Model
{
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
    public function allowances()
    {
        return $this->hasMany(Allowance::class, 'salary_template');
    }
    public function deductions()
    {
        return $this->hasMany(Deduction::class, 'salary_template');
    }
}
