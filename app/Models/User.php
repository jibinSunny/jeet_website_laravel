<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User  extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'users';
    protected $hidden = [
        'password','usertype'
    ];

    public function usertypename()
    {
        return $this->belongsTo(UserType::class, 'usertype');
    }

    public function attendance()
    {
        return $this->hasMany(UserAttendance::class, 'user');
    }
    public function states()
    {
        return $this->belongsTo(State::class, 'state');
    }
    public function countries()
    {
        return $this->belongsTo(Country::class, 'country');
    }
    public function nationalities()
    {
        return $this->belongsTo(Country::class, 'nationality');
    }
}
