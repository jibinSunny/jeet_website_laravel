<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\LeaveAssign;
use App\Models\Setting;
use App\Models\Teacher;
use App\Models\Teacherleave;
use App\Models\TeacherleaveApply;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use PDF;

class LeaveApplyController extends Controller
{
    ###################################    Show Items   ################################################
    public function leaveApply(Request $request)
    {

        $class_list = TeacherleaveApply::with('Teachername', 'leave_categoryname')->orderBy('created_at', 'DESC')->get();
        $data = [
            'leaveapply_list' => $class_list,
            'active'       => 'leaveapply_list',
        ];
        return view('admin.leaveapply.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addleaveApply(Request $request)
    {
        $teacherusers = Teacher::get();
        $category = LeaveAssign::where('usertype', 2)->with('leavecategoryname')->get();
        // return $category;
        $data = [
            'teacherusers'       => $teacherusers,
            'category'       => $category,
            'active'       => 'leaveapply_list',
        ];
        return view('admin.leaveapply.add', $data);
    }
     ###################################    Save And Update Items   ################################################
    // public function pdf_download($editAcademicYear_id)
    //  {
    //         // dd($request->all());
    //         $data = TeacherleaveApply::where('id', $editAcademicYear_id)->select('attachment')->first();
    //         // return  $data->attachment;{{ asset('book/Pdf/'.$row->pdf) }}
    //         $pdf = PDF::loadView('user-files.teacher.attachment.apply_leave.'.$data->attachment);
    //         // ->setPaper('a4', 'landscape');
    //         return $pdf->download('teacher_apply_leave.pdf');
    // }
    ###################################    Save And Update Items   ################################################

    public function saveleaveApply(Request $request)
    {

        //  dd($request->all());
        $date = explode('-', $request->leave_schedule);
        $date1 = explode(' ', $date[0]);
        $date2 = explode(' ', $date[1]);
        $date3 = Carbon::createFromFormat('d/m/Y', $date1[0])->format('Y-m-d');
        $date4 = Carbon::createFromFormat('d/m/Y', $date2[1])->format('Y-m-d');
        $date5 = Carbon::parse($date3);
        $date6 = Carbon::parse($date4);
        $diff = $date5->diffInDays($date6);
        $setting = Setting::first();
        $academic_year=AcademicYear::where('name',$setting->academic_year)->pluck('id');
        $leave_category_day=Teacherleave::where("teacher",$request->teacher)->where('leave_category',$request->leave_category)->select('no_of_day')->first();
        if($leave_category_day->no_of_day < $diff)
        {
           return redirect('admin/leaveapply/index')->withErrors(['name' => 'Your No Of Leave Day Is More Than Assign leave']);
        }
        $inputs['teacher'] = $request->teacher;
        $inputs['leave_category'] = $request->leave_category;
        $inputs['reason'] = $request->reason;
        $inputs['od_status'] = ($request->od_status) ?? 0;
        $inputs['apply_date'] = Carbon::now();
        $inputs['from_date'] = $date3;
        $inputs['to_date'] = $date4;
        $inputs['to_time'] = $date2[2];
        $inputs['from_time'] = $date1[1];
        $inputs['leave_days'] = $diff;
        $inputs['applicationto_usertype'] = "2";
        $inputs['status'] = "0";
        $inputs['academic_year'] = $academic_year[0];
        if ($request->file('attachment')) {
            $path = public_path('user-files/teacher/attachment/apply_leave/');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $file          = $request->file('attachment');
            $profile_file_name     = $file->getClientOriginalName();
            $file->move($path, $profile_file_name);
            $inputs['attachment'] = $profile_file_name;
        }

        if ($request->academicyear_id) {
            TeacherleaveApply::where('id', $request->academicyear_id)->update($inputs);
            return redirect('admin/leaveapply/index')->withSuccess('Department Update successfully');
        } else {
            TeacherleaveApply::create($inputs);
            return redirect('admin/leaveapply/index')->withSuccess('Department created successfully');
        }
        return redirect('admin/leaveapply/index')->withError('Oops Something went wrong!!');
    }

    ###################################    Edit Items   ################################################
    public function editleaveApply($editAcademicYear_id)
    {

        $vendor = TeacherleaveApply::where('id', $editAcademicYear_id)->first();
        $teacherusers = Teacher::get();
        $category = LeaveAssign::where('usertype', 2)->with('leavecategoryname')->get();
        $data = [
            'teacherusers'       => $teacherusers,
            'category'       => $category,
            'leaveapply_list' => $vendor,
            'active'       => 'leaveapply_list',
        ];
        // return $HostelCategory;
        return view('admin.leaveapply.edit', $data);
    }

    ###################################    Delete Items   ################################################
    public function deleteleaveApply(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = TeacherleaveApply::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
