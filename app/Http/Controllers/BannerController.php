<?php

namespace App\Http\Controllers;

use App\Models\banners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    //
    public function index(){
        $banners = DB::table('banners')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.banner.list',compact('banners'));
    }
    public function create(){
        $banners = DB::table('banners')->get();
        return view('admin.banner.list',compact('banners'));
    }
    public function delete(Request $request){
        $ids = $request->input('ids');
        banners::whereIn('id', $ids)->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $search = $request->input('search');
        $banners = DB::table('banners')->where('link', 'LIKE', '%'.$search.'%')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.banner.list',compact('banners'));
    } 
}
