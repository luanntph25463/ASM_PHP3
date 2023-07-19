<?php

namespace App\Http\Controllers;

use App\Models\category_courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
    public function add(Request $request)
    {
        if ($request->post()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $user = new category_courses();
            $user->name = $request->input('name');
            $user->description = $request->input('description');
            $user->save();
            return response()->json([
                'code' => 1,
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        if ($request->post()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $user = category_courses::find($id);
            $user->name = $request->input('name');
            $user->description = $request->input('description');
            $user->save();
            return response()->json([
                'code' => 1,
            ]);
        }
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
