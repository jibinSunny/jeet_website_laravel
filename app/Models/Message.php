<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    public function admins()
    {
        return $this->belongsTo(Admin::class,'admin');
    }
    public function students()
    {
        return $this->belongsTo(Student::class,'student');
    }
}
