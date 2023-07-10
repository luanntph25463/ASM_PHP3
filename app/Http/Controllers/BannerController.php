<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    //
    public function index(){
        $banners = DB::table('banners')->get();
        return view('admin.banner.list',compact('banners'));
    }
}
