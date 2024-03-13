<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentMyProfileController extends Controller
{
    public function myProfile  (Request $request){
        $data = Student::where('id',Auth::user()->id)->first();
        return view('student/my_profile/view')
        ->with(['student' => $data])
        ->with(['active' =>'myprofile']);
    }
}
