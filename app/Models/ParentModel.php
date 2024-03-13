<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParentModel extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'parents';
    protected $hidden = [
        'password'
    ];

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
    public function students()
    {
        return $this->hasMany(Student::class, 'parent', 'id');
    }
}
