<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use App\Models\HostelCategory;
use Illuminate\Http\Request;

class HostelCategoryController extends Controller
{
    ###################################    Show Items   ################################################
    public function showHostelCategory(Request $request)
    {
        // return "wsdf";
        $academicyear = HostelCategory::orderBy('created_at', 'DESC')->with('Hostelname')->get();
        // return $academicyear;
        $data = [
            'host_category_list' => $academicyear,
            'active'       => 'host_category_list',
        ];

        return view('admin.category.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addHostelCategory(Request $request)
    {
        $hostel = Hostel::orderBy('created_at', 'DESC')->get();
        $data = [
            'hostel' => $hostel,
            'active'       => 'host_category_list',
        ];
        return view('admin.category.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function savedHostelCategory(Request $request)
    {

        if ($request->academicyear_id) {
            $request->validate([
                'hostel' => 'required',
                'class_type' => 'required',
                'fee' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            ]);
            $inputs = $request->only(['hostel', 'class_type', 'fee', 'note']);


            if (HostelCategory::where('id', $request->academicyear_id)->update($inputs)) {
                return redirect('admin/hostel_category/index')->withSuccess('Hostel Category Update successfully');
            }
            return redirect('admin/hostel_category/index')->withError('Oops Something went wrong!!');
        } else {

            $request->validate([
                'hostel' => 'required',
                'class_type' => 'required',
                'fee' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',

            ]);
            $user = new HostelCategory();
            $user->hostel = $request->hostel;
            $user->class_type = $request->class_type;
            $user->fee = $request->fee;
            $user->note = $request->note;
            // $user->created_user=Auth::user()->id;
            if ($user->save()) {
                return redirect('admin/hostel_category/index')->withSuccess('Hostel Category created successfully');
            }
            return redirect('admin/hostel_category/add')->withError('Oops Something went wrong!!');
        }
    }
    ###################################    Edit Items   ################################################
    public function editHostelCategory ($editAcademicYear_id)
    {
 
        $vendor = HostelCategory::where('id', $editAcademicYear_id)->first();
        $hostel = Hostel::orderBy('created_at', 'DESC')->get();
        $data = [
            'hostel' => $hostel,
            'host_category_list' => $vendor,
            'active'       => 'host_category_list',
        ];
        return view('admin.category.edit', $data);
    }
    ###################################    Delete Items   ################################################    
    public function deleteHostelCategory(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = HostelCategory::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
