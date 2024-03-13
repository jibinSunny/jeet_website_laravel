<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ClassModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'classes';

    protected $fillable = [
        'name','name_numeric','note','created_user','created_usertype',
    ];

    public function divisions()
    {
        return $this->hasMany(Division::class, 'class', 'id');
    }
}
