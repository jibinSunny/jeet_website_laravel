<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    ###################################    Show Items   ################################################
    public function showBook(Request $request)
    {
        $academicyear = Book::with('subjects')->orderBy('created_at', 'DESC')->get();
        $data = [
            'book' => $academicyear,
            'active'       => 'booklist',
        ];
        // return $academicyear;
        return view('admin.book.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addBook(Request $request)
    {
        $subject = Subject::orderBy('created_at', 'DESC')->get();
        $data = [
            'subject' => $subject,
            'active'       => 'booklist',
        ];
        return view('admin.book.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveBook (Request $request)
    { 
        //  dd($request->all());

        if ($request->academicyear_id) {
            $inputs = $request->only(['name','status', 'author', 'price','quantity','minimum_quantity','rack',]);
            $inputs['category'] = $request->category;
            if($request->category == "1")
            {
                $inputs['subject'] = $request->subject;
            }
            else
            {
                $inputs['subject'] = null;
            }
            if($request->file('pdf')){
                $path = public_path('book/Pdf');
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('pdf');
                $visa_file_name     = $file->getClientOriginalName();
                $file->move($path, $visa_file_name);
                $inputs['pdf'] =$visa_file_name;
            }
            if (Book::where('id', $request->academicyear_id)->update($inputs)) {
                return redirect('admin/book/index')->withSuccess('book Update successfully');
            }
            return redirect('admin/book/index')->withError('Oops Something went wrong!!');
        } else {

            $user = new Book();
            $user->name = $request->name;
            $user->author = $request->author;
            $user->price = $request->price;
            $user->quantity = $request->quantity;
            $user->minimum_quantity = $request->minimum_quantity;
            $user->rack = $request->rack;
            $user->status = $request->status;
            $user->category = $request->category;
            $user->subject = $request->subject;
            $user->created_user = Auth::user()->id;
            $user->created_usertype = Auth::user()->usertype;
            // if ($request->hasFile('pdf')) {
            //     $mytime = Carbon::now()->timestamp;
            //     $filename = $mytime . $request->pdf->getClientOriginalName();
            //     $request->pdf->move('storage/book-Pdf', $filename);
            //     $user->pdf = $filename;
            // }
            if($request->file('pdf')){
                $path = public_path('book/Pdf');
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('pdf');
                $visa_file_name     = $file->getClientOriginalName();
                $file->move($path, $visa_file_name);
                $user->pdf =$visa_file_name;
            }
            if ($user->save()) {
                return redirect('admin/book/index')->withSuccess('book  created successfully');
            }
            return redirect('admin/book/add')->withError('Oops Something went wrong!!');
        }
    }
    ###################################    Edit Items   ################################################
    public function editBook($editAcademicYear_id)
    {
        $subject = Subject::orderBy('created_at', 'DESC')->get();
        $vendor = Book::where('id', $editAcademicYear_id)->first();
        $data = [
            'book' => $vendor,
            'active'       => 'hostlist',
            'subject' => $subject,
        ];
        return view('admin.book.edit', $data);
    }
    ###################################    Delete Items   ################################################    
    public function deleteBook(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = Book::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
