<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\carts;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function index(){
        $order = DB::table('carts')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.order.list',compact('order'));
    }
    public function create(){
        $order = DB::table('carts')->get();
        return view('admin.order.list',compact('order'));
    }
    public function delete(Request $request){
        $ids = $request->input('ids');
        carts::whereIn('id', $ids)->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $search = $request->input('search');
        $order = DB::table('carts')->where('name', 'LIKE', '%'.$search.'%')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.order.list',compact('order'));
    }
    public function pdf($id)
    {
        $item = carts::find($id);
        $pdf = PDF::loadView('invoices',compact('item'))->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'portrait');
        return $pdf->download('invoices.pdf');
    }
    public function newPage($value)
{
        $order = DB::table('carts')->orderBy('id',$value)->cursorPaginate(5);

        // $order = DB::table('carts')->orderBy('id','desc')->cursorPaginate($value);

    // Trả về trang mới với dữ liệu mới
    return view('admin.order.list',compact('order'));

}
}
