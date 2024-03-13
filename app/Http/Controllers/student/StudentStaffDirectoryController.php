<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentStaffDirectoryController extends Controller
{
    public function staffDirectory (Request $request)
    {

        $subject=Subject::where('class',Auth::user()->class)->get();
        $teacher_id=Division::where('id',Auth::user()->division)->pluck('teacher');
        $class_teacher=Teacher::whereIn('id',$teacher_id)->get();
        foreach($subject as $subject1)
        {
            $subject1->teacher_name=Teacher::where('subjects',$subject1->id)->select('first_name','last_name')->get();
        }
        return view('student/staff_directory/view')
        ->with(['subject_list' => $subject])
        ->with(['class_teacher' => $class_teacher])
        ->with(['active' =>'staffdirectorylist']);

    }
}
