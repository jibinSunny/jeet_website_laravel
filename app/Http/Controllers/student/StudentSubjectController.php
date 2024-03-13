<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentSubjectController extends Controller
{
    public function studentSubject (Request $request)
    {

        $subject=Subject::where('class',Auth::user()->class)->get();
        // return $subject;
        foreach($subject as $subject1)
        {
            $subject1->teacher_name=Teacher::where('subjects',$subject1->id)->select('first_name','last_name')->get();
        }
        $data['subject_list']=$subject;
        $data['active'] ="subject_list";
        return view('student.subject.index',$data);

    }
}
