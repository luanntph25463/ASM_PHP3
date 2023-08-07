<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeachersRequest;
use App\Http\Requests\UsersRequest;
use App\Models\teachers;
use App\Models\User;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Contracts\Factory;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    //
    public function index(){
        $users = DB::table('users')->orderBy('id','desc')->cursorPaginate(5);
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
            $users->password = Hash::make($request->input('password'));
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
            $user->password = Hash::make($request->input('password'));
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
        // if ($request->post()) {
        //     $user = DB::table('users')->where('email', '=', $request->email)->where('password', '=', $request->password)->first();
        //     if ($user !== null) {
        //         $request->session()->regenerate();
        //         session()->put('user', $user);
        //         session()->put('role', $user->role);
        //         return redirect()->route('trangchu');
        //     }else{
        //         return redirect()->route('login')->with('success','Sai tài khoản hoặc mật khẩu');
        //     }
        // }
        if ($request->isMethod('POST')) {

            // dd(Auth()->user());
            //đăng nhập thành công
            if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                $user = Auth::user();

                Auth::login($user);
                return redirect()->route('trangchu');
            } else {
                dd(Auth::attempt());
                Session::flash('error','Sai mật khẩu hoặc email');
                return redirect()->route('login');
            }
        }
        return view('include.trangchu.login');
    }
    public function logingoogle(UsersRequest $request)
    {
        return Socialite::driver('google')->redirect();
    }
    public function logingooglecallback(UsersRequest $request)
    {
        $user = Socialite::driver('google')->user();
        $users = User::where('google_id', $user->getId())->first();
        if(!$users){
            $useradd = User::create([
                'name' => $user->getName(),
                'image' => $user->getAvatar(),
                'email' => $user->getEmail(),
                'google_id' => $user->getId()
            ]);

            Auth::login($useradd);
            return redirect()->route('trangchu');

        }else{
            Auth::login($users);

            return redirect()->route('trangchu');

        }
    }

      public function loginface(UsersRequest $request)
    {

        return Socialite::driver('facebook')->redirect();
    }
    public function loginfacecallback(UsersRequest $request)
    {
        $user = Socialite::driver('facebook')->user();
        $users = User::where('facebook_id', $user->getId())->first();
        if(!$users){
            $useradd = User::create([
                'facebook_id' => $user->getId(),
                'name' => $user->getName(),
                'image' => $user->getAvatar(),
                'email' => $user->getEmail(),
            ]);
            Auth::login($useradd);

            return redirect()->route('trangchu');

        }else{
            Auth::login($users);

            return redirect()->route('trangchu');

        }
    }
    public function logingit(UsersRequest $request)
    {

        return Socialite::driver('github')->redirect();
    }
    public function logingitcallback(UsersRequest $request)
    {
        $user = Socialite::driver('github')->user();
        $users = User::where('github_id', $user->getId())->first();
        if(!$users){
            $useradd = User::create([
                'github_id' => $user->getId(),
                'name' => $user->getName(),
                'image' => $user->getAvatar(),
                'email' => $user->getEmail(),
            ]);
            Auth::login($useradd);
            return redirect()->route('trangchu');

        }else{
            Auth::login($users);
            return redirect()->route('trangchu');

        }
    }
    public function testmail(Request $request)
    {
        if ($request->post()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'subject' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', 'Không Được Bỏ Trống subject and email');
            }
            $name = $request->input('name');
            $messages = $request->input('messages');
            $data = [
                'name' =>  $name,
                'messages' => $messages ,
                'subject' => $request->input('subject'),
                'email' => $request->input('email'),
            ];
            Mail::send('email.test', compact('name', 'messages'), function ($message) use ($data) {
                $message->from("luanntph25463@gmail.com", $data['name']);
                $message->to("luanntph25463@fpt.edu.vn");
                $message->subject($data['subject']);
            });
        }
        return view("include.trangchu.contact");

    }
    public function logout()
    {
        Auth::logout();
         return redirect()->route('trangchu');
    }
    public function infomationuser(TeachersRequest $request,$id)
    {
        if ($request->post()) {
            $student  = DB::table('users')->where('id',$id)->update($request->except("_token"));
            if($student){
                Session::flash('success','Sửa Thành Công');
                return redirect()->route('trangchu');
            }
        }
        $order = DB::table('cart_details')
        ->join('courses', 'cart_details.id_courses', '=', 'courses.id')
        ->leftJoin('teachers', 'courses.id_teachers', '=', 'teachers.id')
        ->leftJoin('classes', 'courses.id_class', '=', 'classes.id')

        ->leftJoin('carts', 'carts.id', '=', 'cart_details.id_order')
        ->leftJoin('users', 'users.id', '=', 'carts.id_user')
        ->select('courses.*', 'classes.start_date','carts.status as tt', 'classes.end_date', 'classes.name as tenLop', 'teachers.name as tenGiaoVien', 'classes.ca_hoc', 'classes.quantity_member as SiSo')
        ->where('users.id', '=', $id)
        ->get();
        $data = User::find($id);
        return view('include.trangchu.infomations',compact('data','order'));
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
