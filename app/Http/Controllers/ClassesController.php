<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    //
    public function index(){
        $classes = DB::table('classes')->get();
        return view('admin.classes.list',compact('classes'));
    }
    public function edit($id)
    {
        // $data = category_courses::find($id);
        // return response()->json([
        //     'data' => $data,
        // ]);
    }
}
