<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;
    public function classes(){
        return $this->hasOne(ClassModel::class,'id','class');
    }
    public function divisions(){
        return $this->hasOne(Division::class,'id','division');
    }
    public function feetypes(){
        return $this->hasOne(FeeType::class,'id','feetype');
    }
    public function students(){
        return $this->hasOne(Student::class,'id','student');
    }
    public function paymentPostings(){
        return $this->hasOne(PaymentPosting::class,'posting');
    }
}
