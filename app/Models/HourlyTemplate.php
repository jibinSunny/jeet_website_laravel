<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HourlyTemplate extends Model
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
}
