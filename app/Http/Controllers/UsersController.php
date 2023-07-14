<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //
    public function index(){
        $users = DB::table('users')->orderBy('id','desc')->cursorPaginate(5);
        return view('admin.users.list',compact('users'));
    }
    public function create(){
        $users = DB::table('users')->get();
        return view('admin.users.list',compact('users'));
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
