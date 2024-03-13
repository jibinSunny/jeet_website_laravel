<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\Hostel;
use App\Models\HostelCategory;
use App\Models\HostelMember;
use App\Models\Student;
use Illuminate\Http\Request;

class HostelMemberController extends Controller
{
    ###################################    Show Items   ################################################
    public function showHostelMember(Request $request)
    {

        $academicyear = HostelMember::orderBy('created_at', 'DESC')->with('studentlname')->with('Hostelname')->with('hostelcategoryname')->get();
       $allclass=ClassModel::get();
        $data = [
            'hmember' => $academicyear,
            'allclass' => $allclass,
            'active'       => 'hmember_list',
        ];

        return view('admin.hmember.index', $data);
    }
    ###################################   classFliter   ################################################
    public function classfilterHostelMember(Request $request)
    {

        $sattandance = Student::where('class',$request->get('categoryId'))->select('id')->get();
        // return  $sattandance;
        $division=Division::where('class',$request->get('categoryId'))->get();
        // return  $sattandance[3]['id'];
        foreach ($sattandance as $row) {
            $academicyear[] = HostelMember::where('student',$row['id'] )->with('Hostelname')->with('studentlname')->with('hostelcategoryname')->get();
        }
        // return  $academicyear;
        $data = [
            'division'=>$division,
            'hostelm' => $academicyear,
        ];
        return response()->json($data);
    }
    ###################################    Add Items   ################################################
    public function addHostelMember(Request $request)
    {
        $hostel = Hostel::orderBy('created_at', 'DESC')->get();
        $HostelCategory = HostelCategory::orderBy('created_at', 'DESC')->get();
        // $student = student::orderBy('created_at', 'DESC')->get();
        $data = [
            'hostel' => $hostel,
            'HostelCategory' => $HostelCategory,
            'active'       => 'hmember_list',
        ];
        return view('admin.hmember.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveHostelMember(Request $request)
    {

        if ($request->academicyear_id) {
            $request->validate([
                'hostel' => 'required',
                'hostel_category' => 'required',
                'student' => 'required',
                'join_date' => 'required',
                'hostel_balance' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            ]);
            $inputs = $request->only(['hostel', 'hostel_category', 'student', 'hostel_balance','join_date']);
            $inputs['join_date'] = date('Y-m-d', strtotime($request->join_date));

            if (HostelMember::where('id', $request->academicyear_id)->update($inputs)) {
                return redirect('admin/hmember/index')->withSuccess('Hostel Member Update successfully');
            }
            return redirect('admin/hmember/index')->withError('Oops Something went wrong!!');
        } else {

            $request->validate([
                'hostel' => 'required',
                'hostel_category' => 'required',
                'student' => 'required',
                'join_date' => 'required',
                'hostel_balance' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',

            ]);
            $user = new HostelMember();
            //  dd($user);
            $user->hostel = $request->hostel;
            $user->hostel_category = $request->hostel_category;
            $user->student = $request->student;
            $user->join_date = date('Y-m-d', strtotime($request->join_date));
            $user->hostel_balance = $request->hostel_balance;
            //  return "ewf";
            if ($user->save()) {
                return redirect('admin/hmember/index')->withSuccess('Hostel Member created successfully');
            }
            return redirect('admin/hmember/add')->withError('Oops Something went wrong!!');
        }
    }
    ###################################    Edit Items   ################################################
    public function editHostelMember($editAcademicYear_id)
    {

        $vendor = HostelMember::where('id', $editAcademicYear_id)->first();
        $hostel = Hostel::orderBy('created_at', 'DESC')->get();
        $HostelCategory = HostelCategory::where('hostel',$vendor->hostel)->get();
        $data = [
            'hostel' => $hostel,
            'hmember' => $vendor,
            'hostel_category' => $HostelCategory,
            'active'       => 'hmember_list',
        ];
        // return $HostelCategory;
        return view('admin.hmember.edit', $data);
    }
    ###################################    view Items   ################################################
    public function viewHostelMember($editAcademicYear_id)
    {

        $vendor = HostelMember::where('id', $editAcademicYear_id)->first();
        $hostel = Hostel::orderBy('created_at', 'DESC')->get();
        $HostelCategory = HostelCategory::orderBy('created_at', 'DESC')->get();
        $data = [
            'hostel' => $hostel,
            'hmember' => $vendor,
            'hostel_category' => $HostelCategory,
            'active'       => 'hmember_list',
        ];
      
        return view('admin.hmember.view1', $data);
    }
    ###################################    Category List   ################################################    
    public function listHostelCategory(Request $request)
    {
        $subject = HostelCategory::where('hostel', $request->get('categoryId'))->get();

        return response()->json($subject);
    }
    ###################################    Delete Items   ################################################    
    public function deleteHostelMember(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = HostelMember::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
