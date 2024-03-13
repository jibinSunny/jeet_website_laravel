<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Librarymember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibrarymemberController extends Controller
{
     ###################################    Show Items   ################################################
     public function showLibrarymember (Request $request)
     {
 
         $academicyear = Librarymember::orderBy('created_at', 'DESC')->with('studentlname')->get();
      
         $data = [
             'memberlist' => $academicyear,
             'active'       => 'memberlist',
         ];
        
         return view('admin.lmember.index', $data);
     }
     ###################################    Add Items   ################################################
     public function addLibrarymember(Request $request)
     {
        //  $book = Book::orderBy('created_at', 'DESC')->get();
         $data = [
             'active'       => 'memberlist',
         ];
         return view('admin.lmember.add', $data);
     }
     ###################################    Save And Update Items   ################################################
 
     public function saveLibrarymember(Request $request)
     {
 
         if ($request->academicyear_id) {
             $inputs = $request->only(['student', 'balance']);
             $inputs['join_date'] = date('Y-m-d H:i:s', strtotime($request->join_date));
             if (Librarymember::where('id', $request->academicyear_id)->update($inputs)) {
                 return redirect('admin/librarymember/index')->withSuccess('Library Member Update successfully');
             }
             return redirect('admin/librarymember/index')->withError('Oops Something went wrong!!');
         } else {
            $lastid = DB::table('library_members')->latest()->first();
            if($lastid){
                $ldate=$lastid->member_id+1;
            }
            else{
                $ldate = date('Y');
            }
             $user = new Librarymember();
             $user->member_id = $ldate;
             $user->student = $request->student;
             $user->balance = $request->balance;
             $user->join_date = date('Y-m-d H:i:s', strtotime($request->join_date));
             if ($user->save()) {
                 return redirect('admin/librarymember/index')->withSuccess('Library Member created successfully');
             }
             return redirect('admin/librarymember/add')->withError('Oops Something went wrong!!');
         }
     }
     ###################################    Edit Items   ################################################
     public function editLibrarymember($editAcademicYear_id)
     {
 
         $vendor = Librarymember::where('id', $editAcademicYear_id)->first();
         $data = [
             'memberlist' => $vendor,
             'active'       => 'memberlist',
         ];
         // return $HostelCategory;
         return view('admin.lmember.edit', $data);
     }
 
 
     ###################################    Delete Items   ################################################    
     public function deleteLibrarymember(Request $request)
     {
         if ($request->categoryId) {
 
             $newscategory = Librarymember::where('id', $request->categoryId)->first();
             $newscategory->delete();
             return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
         } else {
             return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
         }
     }
}
