<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'events';

    protected $fillable = [
        'title','class','division','type','date','ex_date','time','created_user','created_usertype','created_at','updated_at','description',
    ];
    public function Classname() {
        return $this->belongsTo(ClassModel::class, 'class');
    }
    public function Division() {
        return $this->belongsTo(Division::class, 'division');
    }
}
