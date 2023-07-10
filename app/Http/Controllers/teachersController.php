<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class teachersController extends Controller
{
    //
    public function index(){
        $teachers = DB::table('teachers')->get();
        return view('admin.teachers.list',compact('teachers'));
    }
}
