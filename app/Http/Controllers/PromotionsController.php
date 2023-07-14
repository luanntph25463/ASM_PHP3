<?php

namespace App\Http\Controllers;

use App\Models\promotions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PromotionsController extends Controller
{
    //
    public function index(){
        $promotions = DB::table('promotions')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.promotions.list',compact('promotions'));
    }
    public function add(Request $request)
    {
        if ($request->post()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'discount' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $user = new promotions;
            $user->name = $request->input('name');
            $user->start_date = $request->input('start_date');
            $user->end_date = $request->input('end_date');
            $user->discount = $request->input('discount');
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
                'name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'discount' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $user = promotions::find($id);

            $user->name = $request->input('name');
            $user->start_date = $request->input('start_date');
            $user->end_date = $request->input('end_date');
            $user->discount = $request->input('discount');
            $user->status = $request->input('status');
            $user->save();
            return response()->json([
                'code' => 1,
            ]);
        }
        $data = promotions::find($id);
        return response()->json([
            'data' => $data,
        ]);
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
