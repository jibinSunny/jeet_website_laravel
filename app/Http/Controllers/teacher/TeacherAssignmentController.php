<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Assignment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAssignmentController extends Controller
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
        public function showAssignment(Request $request)
        {   
            $items = new Assignment;
            return view('teacher.assignment.index', ['assignmentlist' => $items->where('created_user',Auth::user()->id)->where('created_usertype',Auth::user()->usertype)->where('subject',Auth::user()->subjects)->orderBy('created_at', 'DESC')->get()]);
        }
        ###################################    Add Items   ################################################
        public function addAssignment(Request $request)
        {
            $academic_year = AcademicYear::orderBy('created_at', 'DESC')->get();
            $data = [
                'active'       => 'assignmentlist',
                'caterory' => $this->caterory,
                'academic_year' => $academic_year,

            ];
            return view('teacher.assignment.add', $data);
        }
    ###################################    Save And Update Items   ################################################

            public function saveAssignment(Request $request)
            {


                    $inputs = $request->only(['name','category','description','academic_year']);
                    $inputs['deadline_date'] = date('Y-m-d H:i:s', strtotime($request->deadline_date));
                    $inputs['class'] = Auth::user()->classes;
                    $inputs['division'] = Auth::user()->division;
                    $inputs['subject'] = Auth::user()->subjects;
                    $inputs['created_user'] = Auth::user()->id;
                    $inputs['created_usertype'] =Auth::user()->usertype;
                    if ($request->hasFile('file')) {
                        $mytime = Carbon::now()->timestamp;
                        $filename = $mytime . $request->file->getClientOriginalName();
                        $request->file->move('storage/assignment-file', $filename);
                        $inputs['file'] = $filename;
                    }

                    if ($request->academicyear_id) {
                        Assignment::where('id', $request->academicyear_id)->update($inputs);
                            return redirect('teacher/assignment/list')->withSuccess('Update successfully');

                    }
                    else{
                        Assignment::create($inputs);
                        return redirect('teacher/assignment/list')->withSuccess('created successfully');

                    }
                    return redirect('teacher/administrator/list')->withError('Oops Something went wrong!!');


            }

                ###################################    Edit Items   ################################################
    public function editAssignment($editAcademicYear_id)
    {
        // return $editAcademicYear_id;
        $vendor = Assignment::where('id', $editAcademicYear_id)->first();
        $academic_year = AcademicYear::orderBy('created_at', 'DESC')->get();
        $data = [
            'active'       => 'assignmentlist',
            'assignmentlist' => $vendor,
            'caterory' => $this->caterory,
            'academic_year' => $academic_year,
        ];
        // return  $vendor->class;
        return view('teacher.assignment.edit', $data);
    }
    ###################################    Delete Items   ################################################
    public function deleteAssignment(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = Assignment::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
