<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function index(){
        $order = DB::table('carts')->get();
        return view('admin.order.list',compact('order'));
    }
}
