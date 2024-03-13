<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Privilege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivilegeController extends Controller
{
        ###################################    Show Items   ################################################
        public function showPrivilege(Request $request)
        {
            $assignmentlist = Privilege::orderBy('created_at', 'DESC')->get();
            $data = [
                'privilegelist' => $assignmentlist,
                'active'       => 'privilegeist',
            ];
            return view('admin.setting.content_setting.privilege.index', $data);
        }
            ###################################    Add Items   ################################################
            public function addPrivilege(Request $request)
            {

                $data = [
                    'active'       => 'privilegeist',

                ];
                return view('admin.setting.content_setting.privilege.add', $data);
            }
                ###################################    Save And Update Items   ################################################

                public function savePrivilege(Request $request)
                {


                    $inputs = $request->only(['name']);
                    $inputs['created_user'] = Auth::user()->id;
                    $inputs['created_usertype'] = Auth::user()->usertype;
                    if ($request->academicyear_id) {
                        Privilege::where('id', $request->academicyear_id)->update($inputs);
                        return redirect('admin/setting/content_setting/privilege/index')->withSuccess('Rooms Update successfully');
                    } else {
                        Privilege::create($inputs);
                        return redirect('admin/setting/content_setting/privilege/index')->withSuccess('Rooms created successfully');
                    }
                    return redirect('admin/setting/content_setting/privilege/index')->withError('Oops Something went wrong!!');
                }

                    ###################################    Edit Items   ################################################
                    public function editPrivilege($editAcademicYear_id)
                    {
                        // return $editAcademicYear_id;
                        $vendor = Privilege::where('id', $editAcademicYear_id)->first();
                        $data = [
                            'active'       => 'privilegeist',
                            'privilegelist' => $vendor,
                        ];
                    //  return $vendor;
                        return view('admin.setting.content_setting.privilege.edit', $data);
                    }
                    ###################################    Delete Items   ################################################
                    public function deletePrivilege(Request $request)
                    {
                        if ($request->categoryId) {

                            $newscategory = Privilege::where('id', $request->categoryId)->first();
                            $newscategory->delete();
                            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
                        } else {
                            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
                        }
                    }
}
