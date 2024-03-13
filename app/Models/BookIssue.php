<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookIssue extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'book_issues';

    protected $fillable = [
        'seriel_no','user_type','class','division','book','library_member','issued_date','due_date','return_date','created_at','updated_at',
    ];
    public function bookname() {
        return $this->belongsTo(Book::class, 'book');
    }
    public function user_types() {
        return $this->belongsTo(UserType::class, 'user_type');
    }
    public function classname() {
        return $this->belongsTo(ClassModel::class, 'class');
    }
    public function divisionname() {
        return $this->belongsTo(Division::class, 'division');
    }

}
