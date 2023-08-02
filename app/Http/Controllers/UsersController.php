<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeachersRequest;
use App\Http\Requests\UsersRequest;
use App\Models\teachers;
use App\Models\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //
    public function index(){
        $users = DB::table('user')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.users.list',compact('users'));
    }
    public function add(Request $request)
    {
        if ($request->post()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required| email',
                'image' => 'required |mimes:jpeg,png,jpg,gif,svg,PNG',
                'password' => 'required',
                'phone' => 'required | regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'address' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $users = new User();
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->phone = $request->input('phone');
            $users->address = $request->input('address');
            $users->password = $request->input('password');
            $users->status = $request->input('status');
            $users->role = $request->input('role');
            $image = $request->file('image');
            $newName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/img/'), $newName);
            $users->image = $newName;
            $users->save();
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
                'password' => 'required',
                'image' => 'mimes:jpeg,png,jpg,gif,svg,PNG',
                'phone' => 'required |regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'address' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->role = $request->input('role');
            $user->status = $request->input('status');
            $image = $request->file('image');
            if($image == ''){
                $user->image =$request->input('image_hidden');
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
        $data = User::find($id);
        return response()->json([
            'data' => $data,
        ]);
    }
    public function login(UsersRequest $request)
    {
        if ($request->post()) {
            $user = DB::table('user')->where('email', '=', $request->email)->where('password', '=', $request->password)->first();
            if ($user !== null) {
                $request->session()->regenerate();
                session()->put('user', $user);
                return redirect()->route('trangchu');
            }else{
                return redirect()->route('user.login')->with('success','Sai tài khoản hoặc mật khẩu');
            }
        }
        return view('include.trangchu.login');
    }
    public function logout()
    {
        Session::flush();
         return redirect()->route('trangchu');
    }
    public function infomation(TeachersRequest $request,$id)
    {
        if ($request->post()) {
            $student  = DB::table('user')->where('id',$id)->update($request->except("_token"));
            if($student){
                Session::flash('success','Sửa Thành Công');
                return redirect()->route('trangchu');
            }
        }
        $data = User::find($id);
        return view('include.trangchu.infomations',compact('data'));
    }
    public function delete(Request $request){
        $ids = $request->input('ids');
        if($ids > 0){
            User::whereIn('id', $ids)->delete();

        }
        return redirect()->back();
    }
    public function search(Request $request){
        $search = $request->input('search');
        $users = DB::table('users')->where('name', 'LIKE', '%'.$search.'%')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.users.list',compact('users'));
    }
    public function Dashboard(){
        return view('admin.dashboarh');
    }
}
