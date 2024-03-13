<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\ClassModel;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAssignmentController extends Controller
{
    public function __construct()
	{
		$this->caterory = [
			['value' =>'Home Work','name'=>'Home Work'],
            ['value' => 'Project','name'=> 'Project'],
            ['value' => 'Activity','name'=> 'Activity'],
        ];

	}
        ###################################    Show Items   ################################################

        public function studentAssignment(Request $request)
        {   
            $items = new Assignment;
            if (isset($request->category)) {
                $items = $items->where('category',$request->get('category'));
            }
            if (isset($request->subject)) {
                $items = $items->where('subject',$request->get('subject'));
            }
            $all_subject = Subject::where('class',Auth::user()->class)->get();
            //  return $all_subject;
            return view('student.assignment.index', ['assignmentlist' => $items->where('class',Auth::user()->class)->where('division',Auth::user()->division)->with('subjectname','classname','divisionname','academic_yearname')->orderBy('created_at', 'DESC')->get(),
             'caterory' => $this->caterory,
             'active' => 'assignment_list',
             'category_id' => $request->category,
             'subject_id' => $request->subject,
             'all_subject' => $all_subject,]);
        }

}
