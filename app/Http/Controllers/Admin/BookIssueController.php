<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Librarymember;
use App\Models\UserType;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookIssueController extends Controller
{
    ###################################    Show Items   ################################################
    public function showBookissue(Request $request)
    {

        $academicyear = BookIssue::orderBy('created_at', 'DESC')->with('bookname')->with('user_types')
        ->with('classname')->with('divisionname')->get();
        for ($i = 0; $i < count($academicyear); $i++) {
            if($academicyear[$i]->user_type == "2")
            {
                $academicyear[$i]->user_name = Teacher::where('id',$academicyear[$i]->library_member)->select('first_name','last_name')->first();
            }
            elseif($academicyear[$i]->user_type == "3")
            {
                $academicyear[$i]->user_name = Student::where('id',$academicyear[$i]->library_member)->select('first_name','last_name')->first();
            }
            else
            {
                $academicyear[$i]->user_name = User::where('id',$academicyear[$i]->library_member)->select('first_name','last_name')->first();
            }
            
        }
        $data = [
            'bookissue' => $academicyear,
            'active'       => 'bookissue_list',
        ];
        return view('admin.issue.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addBookissue(Request $request)
    {
        $book = Book::orderBy('created_at', 'DESC')->get();
        $usertype = UserType::orderBy('created_at', 'DESC')->get();
        $class = ClassModel::orderBy('created_at', 'DESC')->get();
        $data = [
            'book' => $book,
            'active'       => 'bookissue_list',
            'usertype'       =>  $usertype,
            'class'       =>  $class,
        ];
        return view('admin.issue.add', $data);
    }
   ###################################    listUser   ################################################
        public function listUser(Request $request)
        {
       
            if($request->categoryId==2)
            {
             $assignmentlist = Teacher::orderBy('created_at', 'DESC')->get();
             return response()->json($assignmentlist);
               
            }
            elseif($request->categoryId==3)
            {
                $assignmentlist = Student::orderBy('created_at', 'DESC')->get();
                return response()->json($assignmentlist);
            }
            else
            {
                $assignmentlist = User::where('usertype',$request->get('categoryId'))->orderBy('created_at', 'DESC')->get();
                return response()->json($assignmentlist);
            }
        }
    ###################################    Save And Update Items   ################################################

    public function saveBookissue(Request $request)
    {

        if ($request->academicyear_id) {
            $inputs = $request->only(['seriel_no','user_type','book', 'library_member']);
            if($request->user_type == "3")
            {
                $inputs['class'] = $request->class;
                $inputs['division'] =$request->division;
            }
            else
            {
                $inputs['class'] = null;
                $inputs['division'] =null;
            }
            $inputs['issued_date'] = date('Y-m-d H:i:s', strtotime($request->issued_date));
            $inputs['due_date'] = date('Y-m-d H:i:s', strtotime($request->due_date));
            $inputs['return_date'] = date('Y-m-d H:i:s', strtotime($request->return_date));

            if (BookIssue::where('id', $request->academicyear_id)->update($inputs)) {
                return redirect('admin/bookissue/index')->withSuccess('Hostel Member Update successfully');
            }
            return redirect('admin/bookissue/index')->withError('Oops Something went wrong!!');
        } else {
            $user = new BookIssue();
            $user->seriel_no = $request->seriel_no;
            $user->book = $request->book;
            $user->user_type = $request->user_type;
            $user->class = $request->class;
            $user->division = $request->division;
            $user->library_member = $request->library_member;
            $user->issued_date =date('Y-m-d H:i:s', strtotime($request->issued_date));
            $user->return_date = date('Y-m-d H:i:s', strtotime($request->due_date));
            $user->due_date = date('Y-m-d H:i:s', strtotime($request->return_date));
            $user->created_user = Auth::user()->id;
            $user->created_usertype =Auth::user()->usertype;
            if ($user->save()) {
                return redirect('admin/bookissue/index')->withSuccess('Hostel Member created successfully');
            }
            return redirect('admin/bookissue/add')->withError('Oops Something went wrong!!');
        }
    }
    ###################################    Edit Items   ################################################
    public function editBookissue($editAcademicYear_id)
    {

        $vendor = BookIssue::where('id', $editAcademicYear_id)->with('divisionname')->first();
        $book = Book::orderBy('created_at', 'DESC')->get();
        $usertype = UserType::orderBy('created_at', 'DESC')->get();
        $class = ClassModel::orderBy('created_at', 'DESC')->get();
        if($vendor->user_type == "2")
        {
            $vendor->user_name = Teacher::where('id',$vendor->library_member)->select('first_name','id')->first();
        }
        elseif($vendor->user_type == "3")
        {
            $vendor->user_name = Student::where('id',$vendor->library_member)->select('first_name','id')->first();
        }
        else
        {
            $vendor->user_name = User::where('id',$vendor->library_member)->select('first_name','id')->first();
        }
        $data = [
            'book' => $book,
            'bookIssue' => $vendor,
            'usertype'       =>  $usertype,
            'class'       =>  $class,
            'active'       => 'bookissue_list',
        ];
        // return $vendor;
        return view('admin.issue.edit', $data);
    }


    ###################################    Delete Items   ################################################    
    public function deleteBookissue(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = BookIssue::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
