<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HostelMember extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'hostel_members';

    protected $fillable = [
        'hostel	','hostel_category','student','hostel_balance','join_date','created_at','updated_at',
    ];

    public function Hostelname() {
        return $this->belongsTo(Hostel::class, 'hostel');
    }
    public function hostelcategoryname() {
        return $this->belongsTo(HostelCategory::class, 'hostel_category');
    }
    public function studentlname() {
        return $this->belongsTo(Student::class, 'student');
    }
}
