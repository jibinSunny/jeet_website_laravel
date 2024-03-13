<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    use HasFactory;
    public function students()
    {
        return $this->belongsTo(Student::class, 'student');
    }
    public function classes()
    {
        return $this->belongsTo(ClassModel::class, 'class');
    }
    public function divisions()
    {
        return $this->belongsTo(Division::class, 'division');
    }
}
