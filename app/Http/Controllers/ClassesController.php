<?php

namespace App\Http\Controllers;

use App\Models\classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    //
    public function index(){
        $classes = DB::table('classes')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.classes.list',compact('classes'));
    }
    public function edit($id)
    {
        // $data = category_courses::find($id);
        // return response()->json([
        //     'data' => $data,
        // ]);
    }
    public function delete(Request $request){
        $ids = $request->input('ids');
        classes::whereIn('id', $ids)->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $search = $request->input('search');
        $classes = DB::table('classes')->where('name', 'LIKE', '%'.$search.'%')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.classes.list',compact('classes'));
    }
}
