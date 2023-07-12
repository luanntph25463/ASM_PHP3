<?php

namespace App\Http\Controllers;

use App\Exports\ExportFile;
use App\Models\courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
class CoursesController extends Controller
{
    //
    public function index(){
        $courses = DB::table('courses')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.courses.list',compact('courses'));
    }
        public function trangchu(){
        $courses = DB::table('courses')->orderBy('id','asc')->cursorPaginate(5);
        $teachers = DB::table('teachers')->get();
        return view('include.trangchu.index',compact('courses','teachers'));
    }
    public function delete(Request $request){
        $ids = $request->input('ids');
        courses::whereIn('id', $ids)->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $search = $request->input('search');
        $courses = DB::table('courses')->where('name', 'LIKE', '%'.$search.'%')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.courses.list',compact('courses'));
    }
    public function downloadExcel()
{
    return Excel::download(new ExportFile, 'users.xlsx');
}
}
