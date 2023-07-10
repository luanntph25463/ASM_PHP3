<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    //
    public function index(){
        $reviews = DB::table('reviews')->get();
        return view('admin.reviews.list',compact('reviews'));
    }
}
