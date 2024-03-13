<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Assignment;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AssignmentsController extends Controller
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
    public function showlAssignment(Request $request)
    {   

        $classes = ClassModel::orderBy('created_at', 'DESC')->get();
        $items = new Assignment;
        if (isset($request->class)) {
            $items = $items->where('class',$request->get('class'));
        }
        if (isset($request->division)) {
            $items = $items->where('division',$request->get('division'));
        }
        if (isset($request->subject)) {
            $items = $items->where('subject',$request->get('subject'));
        }
        $all_subject = Subject::where('class',$request->class)->get();
        $all_division = Division::where('class',$request->class)->get();
        // return $all_division;

        return view('admin.assignment.index', ['assignmentlist' => $items->with('subjectname','classname','divisionname','academic_yearname')->orderBy('created_at', 'DESC')->get(),
         'classes' => $classes, 
         'active' => 'assignmentlist', 
         'class_id' => $request->class,
         'division_id' => $request->division, 
         'subject_id' => $request->subject,
         'all_subject' => $all_subject,
         'all_division' => $all_division,]);
        // $assignmentlist = Assignment::with('subjectname','classname','divisionname','academic_yearname')->orderBy('created_at', 'DESC')->get();
        // $data = [
        //     'assignmentlist' => $assignmentlist,
        //     'classes' => $classes,
        //     'active'       => 'assignmentlist',
        // ];
        // return view('admin.assignment.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addAssignment(Request $request)
    {
        $class = ClassModel::orderBy('created_at', 'DESC')->get();
        $academic_year = AcademicYear::orderBy('created_at', 'DESC')->get();
        $data = [
            'active'       => 'assignmentlist',
            'class' => $class,
            'caterory' => $this->caterory,
            'academic_year' => $academic_year,

        ];
        return view('admin.assignment.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveAssignment(Request $request)
    {


            $inputs = $request->only(['name','category', 'title','description','class','division','academic_year','subject']);
            $inputs['deadline_date'] = date('Y-m-d H:i:s', strtotime($request->deadline_date));
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
                    return redirect('admin/assignment/index')->withSuccess('Assignment Update successfully');

            }
            else{
                Assignment::create($inputs);
                return redirect('admin/assignment/index')->withSuccess('Assignment created successfully');

            }
            return redirect('admin/administrator/index')->withError('Oops Something went wrong!!');


    }
    ###################################    Edit Items   ################################################
    public function editAssignment($editAcademicYear_id)
    {
        // return $editAcademicYear_id;
        $vendor = Assignment::where('id', $editAcademicYear_id)->first();
        $subject = Subject::where('class',  $vendor->class)->get();
        $division = Division::where('class',  $vendor->class)->get();
        $class = ClassModel::orderBy('created_at', 'DESC')->get();
        $academic_year = AcademicYear::orderBy('created_at', 'DESC')->get();
        $data = [
            'active'       => 'assignmentlist',
            'assignmentlist' => $vendor,
            'subject' => $subject,
            'division' => $division,
            'class' => $class,
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
