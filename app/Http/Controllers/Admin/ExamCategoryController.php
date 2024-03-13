<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ExamCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamCategoryController extends Controller
{
    ###################################    Show Items   ################################################
    public function showExamCategory(Request $request)
    {
        $academicyear = ExamCategory::orderBy('created_at', 'DESC')->get();
        $data = [
            'examlist' => $academicyear,
            'active'       => 'exam_category_list',
        ];
        return view('admin.exam_category.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addExamCategory(Request $request)
    {
        $data = [
            'active'       => 'examlist',
        ];
        return view('admin.exam_category.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveExamCategory(Request $request)
    {

        $inputs = $request->only(['name', 'description']);
        $inputs['date'] = date('Y-m-d H:i:s', strtotime($request->date_time));
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] = Auth::user()->usertype;

        if ($request->academicyear_id) {
            ExamCategory::where('id', $request->academicyear_id)->update($inputs);
            return redirect('admin/exam_category/index')->withSuccess('Exam Update successfully');
        } else {
            ExamCategory::create($inputs);
            return redirect('admin/exam_category/index')->withSuccess('Exam created successfully');
        }
        return redirect('admin/exam_category/index')->withError('Oops Something went wrong!!');
    }
    ###################################    Edit Items   ################################################
    public function editExamCategory($editAcademicYear_id)
    {
        // return $editAcademicYear_id;
        $vendor = ExamCategory::where('id', $editAcademicYear_id)->first();
        $data = [
            'active'       => 'examlist',
            'examlist' => $vendor,
        ];
        return view('admin.exam_category.edit', $data);
    }
    ###################################    Delete Items   ################################################
    public function deleteExamCategory(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = ExamCategory::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
