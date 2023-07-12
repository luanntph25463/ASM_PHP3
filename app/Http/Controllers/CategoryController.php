<?php

namespace App\Http\Controllers;

use App\Models\category_courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function index(){
        $category = DB::table('category_courses')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.category_courses.list',compact('category'));
    }
    public function edit($id)
    {
        $data = category_courses::find($id);
        return response()->json([
            'data' => $data,
        ]);
    }
    public function create($id)
    {
        $data = category_courses::find($id);
        return response()->json([
            'data' => $data,
        ]);
    }
    public function delete(Request $request){
        $ids = $request->input('ids');
        category_courses::whereIn('id', $ids)->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $search = $request->input('search');
        $category = DB::table('category_courses')->where('name', 'LIKE', '%'.$search.'%')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.category_courses.list',compact('category'));
    }
}
