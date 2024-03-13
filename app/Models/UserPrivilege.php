<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPrivilege extends Model
{
   
        use HasFactory;
        use SoftDeletes;
        protected $table = 'user_privileges';
    
        protected $fillable = [
            'user','privilege','created_user','created_usertype'
        ];
        public function privilegename() {
            return $this->belongsTo(Privilege::class, 'privilege');
        }
}
