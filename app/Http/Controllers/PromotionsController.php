<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionsController extends Controller
{
    //
    public function index(){
        $promotions = DB::table('promotions')->get();
        return view('admin.promotions.list',compact('promotions'));
    }
}
