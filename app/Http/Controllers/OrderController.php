<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\carts;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    //
    public function index(){
        $order = DB::table('carts')->orderBy('id','desc')->cursorPaginate(5);
        $users = DB::table('users')->get();
        $courses = DB::table('courses')->get();
        return view('admin.order.list',compact('order','courses','users'));
    }
    public function create(){
        $order = DB::table('carts')->get();
        return view('admin.order.list',compact('order'));
    }

    public function add(Request $request)
    {
        if ($request->post()) {
            $validator = Validator::make($request->all(), [
                'order_date' => 'required',
                'total_amount' => 'required|min:0.01| numeric',
                'quantity' => 'required|min:0.01| numeric',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $user = new carts;
            $user->order_date = $request->input('order_date');
            $user->quantity = $request->input('quantity');
            $user->total_amount = $request->input('total_amount');
            $user->id_user = $request->input('id_user');
            $user->id_course = $request->input('id_courses');
            $user->status = $request->input('status');
            $user->save();
            return response()->json([
                'code' => 1,
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        if ($request->post()) {
            $validator = Validator::make($request->all(), [
                'order_date' => 'required',
                'total_amount' => 'required|min:0.01| numeric',
                'quantity' => 'required|min:0.01| numeric',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $user = carts::find($id);
            $user->order_date = $request->input('order_date');
            $user->quantity = $request->input('quantity');
            $user->total_amount = $request->input('total_amount');
            $user->id_user = $request->input('id_user');
            $user->id_course = $request->input('id_courses');
            $user->status = $request->input('status');
            $user->save();
            return response()->json([
                'code' => 1,
            ]);
        }
        $data = carts::find($id);
        return response()->json([
            'data' => $data,
        ]);
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
