<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\BookIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLibraryController extends Controller
{
        ###################################    Show Items   ################################################

        public function studentLibrary (Request $request)
        {    
        $data=BookIssue::where('class',Auth::user()->class)->where('library_member', Auth::user()->id)->where('division',Auth::user()->division)->with('bookname')->with('user_types')->with('classname')->with('divisionname')->orderBy('created_at', 'DESC')->get();
        return view('student.library.index')
        ->with(['bookissue' => $data])
        ->with(['active' =>'library_list']);
    }
}
