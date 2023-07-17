<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewsRequest;
use App\Models\reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReviewsController extends Controller
{
    //
    public function index(){
        $reviews = DB::table('reviews')->orderBy('id','desc')->cursorPaginate(5);
        $courses = DB::table('courses')->get();
        $user = DB::table('users')->get();
        return view('admin.reviews.list',compact('reviews','courses','user'));
    }
    public function addcomment(Request $request){
        $user = new reviews;
        $user->content = $request->input('content');
        $user->course_id = $request->input('id_course');
        $user->id_user = $request->input('id_user');
        $user->rating = 5;
        $user->save();
        return back();
    }
    public function add(Request $request)
    {
        if ($request->post()) {
            $user = new reviews;
            $user->content = $request->input('content');
            $user->course_id = $request->input('course_id');
            $user->id_user = $request->input('id_user');
            $user->rating = $request->input('rating');
            $user->save();
            return response()->json([
                'code' => 1,
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        if ($request->post()) {
            $user = reviews::find($id);
            $user->content = $request->input('content');
            $user->course_id = $request->input('course_id');
            $user->id_user = $request->input('id_user');
            $user->rating = $request->input('rating');
            $user->save();
            return response()->json([
                'code' => 1,
            ]);
        }
        $data = reviews::find($id);
        return response()->json([
            'data' => $data,
        ]);
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
