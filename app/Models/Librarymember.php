<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Librarymember extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'library_members';

    protected $fillable = [
        'member_id','student','balance','join_date',
    ];
    public function studentlname() {
        return $this->belongsTo(Librarymember::class, 'student');
    }
}
