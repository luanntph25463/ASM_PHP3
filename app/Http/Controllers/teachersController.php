<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeachersRequest;
use App\Models\teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
                'image' => 'required |mimes:jpeg,png,jpg,gif,svg,PNG',
                'phone' => 'required | regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
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
            $teachers = new teachers();
            $teachers->name = $request->input('name');
            $teachers->email = $request->input('email');
            $teachers->phone = $request->input('phone');
            $teachers->address = $request->input('address');
            $teachers->description = $request->input('description');
            $teachers->specialized = $request->input('specialized');
            $image = $request->file('image');
            $newName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/img/'), $newName);
            $teachers->image = $newName;
            $teachers->save();
            return response()->json([
                'code' => 1,
            ]);
        }
    }
    public function infomationteacher(TeachersRequest $request,$id)
    {
        if ($request->post()) {
            $student  = DB::table('teachers')->where('id',$id)->update($request->except("_token"));
            if($student){
                Session::flash('success','Sửa Thành Công');
                return redirect()->route('trangchu');
            }
        }
        $data = teachers::find($id);
        return view('include.trangchu.infomation',compact('data'));
    }
    public function update(Request $request, $id)
    {
        if ($request->post()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required| email',
                'phone' => 'required | regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'image' => 'mimes:jpeg,png,jpg,gif,svg,PNG',
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
            $image = $request->file('image');
            if($image == ''){
                $user->image =$request->input('hidden_image');
            }else{
                $newName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/img/'), $newName);
                $user->image = $newName;
            }
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
