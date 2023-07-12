<?php

namespace App\Http\Controllers;

use App\Models\promotions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionsController extends Controller
{
    //
    public function index(){
        $promotions = DB::table('promotions')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.promotions.list',compact('promotions'));
    }
    public function create(){
        $promotions = DB::table('promotions')->get();
        return view('admin.promotions.list',compact('promotions'));
    }
    public function delete(Request $request){
        $ids = $request->input('ids');
        promotions::whereIn('id', $ids)->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $search = $request->input('search');
        $promotions = DB::table('promotions')->where('name', 'LIKE', '%'.$search.'%')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.promotions.list',compact('promotions'));
    }
}
