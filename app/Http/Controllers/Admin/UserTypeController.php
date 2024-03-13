<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTypeController extends Controller
{
  ###################################    Show Items   ################################################
  public function showUsertype(Request $request)
  {
      $assignmentlist = UserType::orderBy('created_at', 'DESC')->get();
      $data = [
          'designationlist' => $assignmentlist,
          'active'       => 'usertype_list',
      ];
      return view('admin.setting.administration.usertype.index', $data);
  }
  ###################################    Add Items   ################################################
  public function addUsertype(Request $request)
  {

      $data = [
          'active'       => 'usertype_list',

      ];
      return view('admin.setting.administration.usertype.add', $data);
  }
  ###################################    Save And Update Items   ################################################

  public function saveUsertype(Request $request)
  {
      $inputs = $request->only(['name']);
      $inputs['created_user'] = Auth::user()->id;
      $inputs['created_usertype'] = Auth::user()->usertype;
      if ($request->academicyear_id) {
        UserType::where('id', $request->academicyear_id)->update($inputs);
          return redirect('admin/setting/administrator/usertype/index')->withSuccess('Department Update successfully');
      } else {
        UserType::create($inputs);
          return redirect('admin/setting/administrator/usertype/index')->withSuccess('Department created successfully');
      }
      return redirect('admin/setting/administrator/usertype/index')->withError('Oops Something went wrong!!');
  }
  ###################################    Edit Items   ################################################
  public function editUsertype($editAcademicYear_id)
  {
      // return $editAcademicYear_id;
      $vendor = UserType::where('id', $editAcademicYear_id)->first();
      $data = [
          'active'       => 'usertype_list',
          'designationlist' => $vendor,
      ];
      return view('admin.setting.administration.usertype.edit', $data);
  }
  ###################################    Delete Items   ################################################
  public function deleteUsertype(Request $request)
  {
      if ($request->categoryId) {

          $newscategory = UserType::where('id', $request->categoryId)->first();
          $newscategory->delete();
          return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
      } else {
          return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
      }
  }
}
