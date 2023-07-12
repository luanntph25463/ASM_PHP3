<?php

namespace App\Http\Controllers;

use App\Models\reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    //
    public function index(){
        $reviews = DB::table('reviews')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.reviews.list',compact('reviews'));
    }
    public function create(){
        $reviews = DB::table('reviews')->get();
        return view('admin.reviews.list',compact('reviews'));
    }
    public function delete(Request $request){
        $ids = $request->input('ids');
        reviews::whereIn('id', $ids)->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $search = $request->input('search');
        $reviews = DB::table('reviews')->where('user_name', 'LIKE', '%'.$search.'%')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.reviews.list',compact('reviews'));
    }
}
