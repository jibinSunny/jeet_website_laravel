<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPosting extends Model
{
    use HasFactory;
    public function payments(){
        return $this->hasMany(Payment::class,'payment');
    }
    public function postings(){
        return $this->belongsTo(Posting::class, 'posting');
    }
}
