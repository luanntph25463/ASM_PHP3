<?php

namespace App\Http\Controllers;

use App\Models\teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class teachersController extends Controller
{
    //
    public function index(){
        $teachers = DB::table('teachers')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.teachers.list',compact('teachers'));
    }
    public function create(){
        $teachers = DB::table('teachers')->get();
        return view('admin.teachers.list',compact('teachers'));
    }
    public function delete(Request $request){
        $ids = $request->input('ids');
        teachers::whereIn('id', $ids)->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $search = $request->input('search');
        $teachers = DB::table('teachers')->where('name', 'LIKE', '%'.$search.'%')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.teachers.list',compact('teachers'));
    }
}
