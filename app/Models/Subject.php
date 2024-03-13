<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'subjects';

    protected $fillable = [
        'name','subject_code','author','class','pass_mark','total_mark','created_user','created_usertype','created_at','updated_at','note',
    ];
    public function Classname()
    {
        return $this->belongsTo(ClassModel::class, 'class');
    }
}
