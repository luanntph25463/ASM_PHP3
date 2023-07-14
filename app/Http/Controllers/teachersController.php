<?php

namespace App\Http\Controllers;

use App\Models\teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class teachersController extends Controller
{
    //
    public function index(){
        $teachers = DB::table('teachers')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.teachers.list',compact('teachers'));
    }
    public function add(Request $request)
    {
        if ($request->post()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required| email',
                'phone' => 'required',
                'address' => 'required',
                'description' => 'required',
                'specialized' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $user = new teachers;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->description = $request->input('description');
            $user->specialized = $request->input('specialized');
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
                'email' => 'required| email',
                'phone' => 'required',
                'address' => 'required',
                'description' => 'required',
                'specialized' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $user = teachers::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->description = $request->input('description');
            $user->specialized = $request->input('specialized');
            $user->save();
            return response()->json([
                'code' => 1,
            ]);
        }
        $data = teachers::find($id);
        return response()->json([
            'data' => $data,
        ]);
    }
    public function delete(Request $request){
        $ids = $request->input('ids');
        teachers::whereIn('id', $ids)->delete();
        return redirect()->back();
    }
    public function search(Request $request){
        $search = $request->input('search');
        $teachers = DB::table('teachers')->where('name', 'LIKE', '%'.$search.'%')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.teachers.list',compact('teachers'));
    }
}
