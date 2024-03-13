<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'divisions';

    protected $fillable = [
        'name','class','teacher','capacity','category','created_user','created_usertype','created_at','updated_at','note',
    ];
    public function Classname() {
        return $this->belongsTo(ClassModel::class, 'class');
    }
    public function Tachername() {
        return $this->belongsTo(Teacher::class, 'teacher');
    }
}
