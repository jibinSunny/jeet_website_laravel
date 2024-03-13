<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\ClassModel;
use App\Models\Department;
use App\Models\Division;
use App\Models\Room;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Timer\Timer;

class TimeTableController extends Controller
{

    public function __construct()
	{
		$this->dayArray = [
			['id' =>'sunday','name'=>'Sunday'],
            ['id' => 'monday','name'=> 'Monday'],
            ['id' => 'tuesday','name'=> 'Tuesday'],
            ['id' => 'wednesday','name'=> 'Wednesday'],
            ['id' => 'thursday','name'=> 'Thursday'],
            ['id' => 'friday','name'=> 'Friday'],
            ['id' => 'saturday','name'=> 'Saturday'],
        ];

	}
    ###################################    Show Items   ################################################
    public function showTimeTable(Request $request)
    {
        // $assignmentlist = TimeTable::with('classname','divisionname','departmentname','subjectname','Teachername','roomname')->orderBy('created_at', 'DESC')->get();
        $classes = ClassModel::get();
        $timetable_list = TimeTable::get();
        $data = [
            'classes' => $classes,
            'timetable_list' => $timetable_list,
            'active'       => 'timetablelist',
        ];
        return view('admin.timetable.index', $data);
    }

    ###################################    view Items   ################################################
    public function viewTimeTable(Request $request)
    {
        $division=Division::where('class',$request->get('categoryId'))->get();
        $assignmentlist = TimeTable::where('class',$request->get('categoryId'))->with('classname','divisionname','departmentname','subjectname','Teachername','roomname')->orderBy('created_at', 'DESC')->get();
       
        $data = [
            'division'=>$division,
           'assignmentlist' =>  $assignmentlist,

       ];
        return response()->json($data);

    }
    ###################################    Add Items   ################################################
    public function addTimeTable(Request $request)
    {
        $classes = ClassModel::get();
        $academicyear = AcademicYear::get();
        $teacher = Teacher::get();
        $room = Room::get();
        $department = Department::get();
        $data = [
            'classes'       => $classes,
            'academicyear'       => $academicyear,
            'teacher'       => $teacher,
            'room'       => $room,
            'department'       => $department,
            'dayArray' => $this->dayArray,
            'active'       => 'timetablelist',

        ];
        // return $this->dayArray;
        return view('admin.timetable.add', $data);
    }
    ###################################    Division List   ################################################
    public function listDivision(Request $request)
    {
        $subject = Division::where('class', $request->get('categoryId'))->get();

        return response()->json($subject);
    }
    ###################################    Subject List   ################################################
    public function listSubject(Request $request)
    {
        // return $request->categoryId;
        $subject = Subject::where('class', $request->get('categoryId'))->get();
        return response()->json($subject);
    }

    ###################################    Save And Update Items   ################################################

    public function saveTimeTable(Request $request)
    {


        $inputs = $request->only(['year','class','division','department','subject','teacher','day','start_time','end_time','room']);
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] = Auth::user()->usertype;
        if ($request->academicyear_id) {
            TimeTable::where('id', $request->academicyear_id)->update($inputs);
            return redirect('admin/timetable/index')->withSuccess('Time Table Update successfully');
        } else {
            $data=TimeTable::where('year',$request->year)->where('teacher',$request->teacher)->where('class',$request->class)->where('division',$request->division)->where('day',$request->day)->where('end_time','>',$request->start_time)->get();
             if(count($data) == 0)
             { 

                TimeTable::create($inputs);
                 return redirect('admin/timetable/index')->withSuccess('successfully');
              
             }
             else{

             return redirect('admin/timetable/index')->withErrors(['name' => 'This Teacher Is already assign Peroid!!']);

             }

        }
        return redirect('admin/timetable/index')->withErrors(['name' => 'Oops Something went wrong!!']);
    }
    ###################################    Edit Items   ################################################
    public function editTimeTable($editAcademicYear_id)
    {
        $vendor = TimeTable::where('id', $editAcademicYear_id)->first();
        $classes = ClassModel::get();
        $academicyear = AcademicYear::get();
        $teacher = Teacher::get();
        $room = Room::get();
        $department = Department::get();
        $subject = Subject::where('class',$vendor->class)->get();
        $division = Division::where('class',$vendor->class)->get();

        $data = [
            'classes'       => $classes,
            'academicyear'       => $academicyear,
            'teacher'       => $teacher,
            'room'       => $room,
            'department'       => $department,
            'subject'       => $subject,
            'division'       => $division,
            'timetablelist'       => $vendor,
            'dayArray' => $this->dayArray,
            'active'       => 'timetablelist',

        ];
        return view('admin.timetable.edit', $data);
    }
    ###################################    Delete Items   ################################################
    public function deleteTimeTable(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = TimeTable::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
