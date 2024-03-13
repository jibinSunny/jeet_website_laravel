<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function user_types(){
        return $this->hasOne(UserType::class,'id','user_type');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
