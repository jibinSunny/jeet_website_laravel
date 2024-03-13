<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'books';

    protected $fillable = [
        'name','subject','author','price','category','status','quantity','minimum_quantity','rack','pdf','created_user','created_usertype',
    ];

    public function subjects()
    {
        return $this->belongsTo(Subject::class,'subject');
    }
}
