<?php

namespace App\Http\Controllers;

use App\Models\classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClassesController extends Controller
{
    //
    public function index(){
        $classes = DB::table('classes')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.classes.list',compact('classes'));
    }
    public function edit($id)
    {
        // $data = category_courses::find($id);
        // return response()->json([
        //     'data' => $data,
        // ]);
    }
    public function add(Request $request)
    {
        if ($request->post()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'end_date' => 'required',
                'start_date' => 'required',
                'quantity_member' => 'required|min:0.01| numeric',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $user = new classes;
            $user->name = $request->input('name');
            $user->start_date = $request->input('start_date');
            $user->end_date = $request->input('end_date');
            $user->quantity_member = $request->input('quantity_member');
            $user->ca_hoc = $request->input('ca_hoc');
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
                'end_date' => 'required',
                'start_date' => 'required',
                'quantity_member' => 'required|min:0.01| numeric',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $user = classes::find($id);
            $user->name = $request->input('name');
            $user->start_date = $request->input('start_date');
            $user->end_date = $request->input('end_date');
            $user->quantity_member = $request->input('quantity_member');
            $user->ca_hoc = $request->input('ca_hoc');
            $user->status = $request->input('status');
            $user->save();
            return response()->json([
                'code' => 1,
            ]);
        }
        $data = classes::find($id);
        return response()->json([
            'data' => $data,
        ]);
    }
    public function delete(Request $request){
        $ids = $request->input('ids');
        classes::whereIn('id', $ids)->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $search = $request->input('search');
        $classes = DB::table('classes')->where('name', 'LIKE', '%'.$search.'%')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.classes.list',compact('classes'));
    }
}
