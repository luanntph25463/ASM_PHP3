<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    //
    public function index(){
        $courses = DB::table('courses')->get();
        return view('admin.courses.list',compact('courses'));
    }
}
