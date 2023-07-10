<?php

namespace App\Http\Controllers;

use App\Models\category_courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function index(){
        $category = DB::table('category_courses')->get();
        return view('admin.category_courses.list',compact('category'));
    }
    public function edit($id)
    {
        $data = category_courses::find($id);
        return response()->json([
            'data' => $data,
        ]);
    }
}
