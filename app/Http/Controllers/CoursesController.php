<?php

namespace App\Http\Controllers;

use App\Exports\ExportFile;
use App\Models\carts;
use App\Models\courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Http\Requests\CoursesRequest;
use App\Models\Cart_detail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class CoursesController extends Controller
{
    //
    public function index()
    {

        $courses = DB::table('courses')->orderBy('id', 'desc')->cursorPaginate(5);
        $category = DB::table('category_courses')->get();
        $promotions = DB::table('promotions')->get();
        $classes = DB::table('classes')->get();
        return view('admin.courses.list', compact('courses', 'category', 'promotions', 'classes'));
    }
    public function trangchu()
    {

        $courses = DB::table('courses')
            ->join('category_courses', 'courses.id_category', '=', 'category_courses.id')
            ->join('teachers', 'courses.id_teachers', '=', 'teachers.id')
            ->join('classes', 'courses.id_class', '=', 'classes.id')
            ->leftJoin('reviews', 'courses.id', '=', 'reviews.course_id')
            ->select('courses.*', 'category_courses.name as tenDM', 'classes.start_date', 'classes.end_date', 'classes.name as tenLop', 'teachers.name as tenGiaoVien', 'classes.ca_hoc', 'classes.quantity_member as SiSo', DB::raw('AVG(reviews.rating) as DanhGia'))
            ->groupBy(
                'courses.id',
                'classes.id',
                'teachers.id',
                'category_courses.name',
                'courses.name',
                'classes.name',
                'teachers.name',
                'classes.quantity_member',
                'courses.description',
                'courses.image',
                'courses.price',
                'courses.id_class',
                'courses.id_category',
                'classes.start_date',
                'classes.end_date',
                'courses.id_promotions',
                'courses.id_teachers',
                'courses.status',
                'classes.ca_hoc',
                'courses.created_at',
                'courses.updated_at'
            )
            ->distinct()->limit(6)->orderBy('id','desc')
            ->get();
        // dd($courses);
        $teachers = DB::table('teachers')->get();
        $category = DB::table('category_courses')->limit(4)->get();
        // $user = Auth::user();

        // // Lưu thông tin người dùng vào phiên làm việc hiện tại
        //   dd($user);
        return view('include.trangchu.index', compact('courses', 'teachers', 'category'));
    }
    public function detailcoursres($id)
    {
        $courses = DB::table('courses')
            ->join('category_courses', 'courses.id_category', '=', 'category_courses.id')

            ->join('teachers', 'courses.id_teachers', '=', 'teachers.id')
            ->join('classes', 'courses.id_class', '=', 'classes.id')
            ->leftJoin('reviews', 'courses.id', '=', 'reviews.course_id')
            ->select('courses.*', 'category_courses.name as tenDM', 'classes.start_date', 'classes.end_date', 'classes.name as tenLop', 'teachers.name as tenGiaoVien', 'classes.ca_hoc', 'classes.quantity_member as SiSo', DB::raw('AVG(reviews.rating) as DanhGia'))
            ->where('courses.id', '=', $id)
            ->groupBy(
                'courses.id',
                'classes.id',
                'teachers.id',
                'category_courses.name',
                'courses.name',
                'classes.name',
                'teachers.name',
                'classes.quantity_member',
                'courses.description',
                'courses.image',
                'courses.price',
                'courses.id_class',
                'courses.id_category',
                'classes.start_date',
                'classes.end_date',
                'courses.id_promotions',
                'courses.id_teachers',
                'courses.status',
                'classes.ca_hoc',
                'courses.created_at',
                'courses.updated_at'
            )
            ->distinct()
            ->first();
        // dd($courses);
        $age = date_diff(date_create($courses->end_date), date_create($courses->start_date))->d; // Tính tuổi

        // dd();
        // $hoc = $courses->start_date - $courses->end_date;
        $teachers = DB::table('teachers')->where('id', '=', $courses->id_teachers)->first();
        $promotions = DB::table('promotions')->limit(3)->get();
        $count = DB::table('reviews')->where('course_id', '=', $courses->id)->count();
        $reviews = DB::table('reviews')->join('users', 'reviews.id_user', 'users.id')->select('reviews.*', 'users.image', 'users.name')->where('course_id', '=', $id)->get();
        // dd($reviews);
        $category = DB::table('category_courses')->limit(4)->get();
        return view('include.trangchu.detail', compact('courses', 'promotions', 'reviews', 'age', 'count', 'teachers'));
    }
    public function trangchuFull($id)
    {
        $courses = DB::table('courses')
            ->join('category_courses', 'courses.id_category', '=', 'category_courses.id')

            ->join('teachers', 'courses.id_teachers', '=', 'teachers.id')
            ->join('classes', 'courses.id_class', '=', 'classes.id')
            ->leftJoin('reviews', 'courses.id', '=', 'reviews.course_id')
            ->select('courses.*', 'category_courses.name as tenDM', 'classes.start_date', 'classes.end_date', 'classes.name as tenLop', 'teachers.name as tenGiaoVien', 'classes.ca_hoc', 'classes.quantity_member as SiSo', DB::raw('AVG(reviews.rating) as DanhGia'))
            ->groupBy(
                'courses.id',
                'classes.id',
                'teachers.id',
                'category_courses.name',
                'courses.name',
                'classes.name',
                'teachers.name',
                'classes.quantity_member',
                'courses.description',
                'courses.image',
                'courses.price',
                'courses.id_class',
                'courses.id_category',
                'classes.start_date',
                'classes.end_date',
                'courses.id_promotions',
                'courses.id_teachers',
                'courses.status',
                'classes.ca_hoc',
                'courses.created_at',
                'courses.updated_at'
            )
            ->distinct()
            ->get();
        // dd($courses);

        $teachers = DB::table('teachers')->get();
        $category = DB::table('category_courses')->get();
        return view('include.trangchu.index', compact('courses', 'teachers', 'category'));
    }
    public function lienhe()
    {
        $teachers = DB::table('teachers')->get();
        $category = DB::table('category_courses')->get();
        return view('include.trangchu.contact', compact('teachers', 'category'));
    }
    public function listcourses(Request $request)
    {
        if ($request->post()) {
            // dd($request);
            $courses = DB::table('courses')
                ->join('category_courses', 'courses.id_category', '=', 'category_courses.id')

                ->join('teachers', 'courses.id_teachers', '=', 'teachers.id')
                ->join('classes', 'courses.id_class', '=', 'classes.id')
                ->leftJoin('reviews', 'courses.id', '=', 'reviews.course_id')
                ->select('courses.*', 'category_courses.name as tenDM', 'classes.start_date', 'classes.end_date', 'classes.name as tenLop', 'teachers.name as tenGiaoVien', 'classes.ca_hoc', 'classes.quantity_member as SiSo', DB::raw('AVG(reviews.rating) as DanhGia'))
                ->groupBy(
                    'courses.id',
                    'classes.id',
                    'teachers.id',
                    'category_courses.name',
                    'courses.name',
                    'classes.name',
                    'teachers.name',
                    'classes.quantity_member',
                    'courses.description',
                    'courses.image',
                    'courses.price',
                    'courses.id_class',
                    'courses.id_category',
                    'classes.start_date',
                    'classes.end_date',
                    'courses.id_promotions',
                    'courses.id_teachers',
                    'courses.status',
                    'classes.ca_hoc',
                    'courses.created_at',
                    'courses.updated_at'
                )
                ->distinct()->where('id_category', '=', $request->select)
                // ->where('courses.name','=',$request->search)
                ->get();
            // dd($courses);
            $teachers = DB::table('teachers')->get();
            $category = DB::table('category_courses')->get();
            return view('include.trangchu.listCourses', compact('courses', 'teachers', 'category'));
        }
        $courses = DB::table('courses')
            ->join('category_courses', 'courses.id_category', '=', 'category_courses.id')

            ->join('teachers', 'courses.id_teachers', '=', 'teachers.id')
            ->join('classes', 'courses.id_class', '=', 'classes.id')
            ->leftJoin('reviews', 'courses.id', '=', 'reviews.course_id')
            ->select('courses.*', 'category_courses.name as tenDM', 'classes.start_date', 'classes.end_date', 'classes.name as tenLop', 'teachers.name as tenGiaoVien', 'classes.ca_hoc', 'classes.quantity_member as SiSo', DB::raw('AVG(reviews.rating) as DanhGia'))
            ->groupBy(
                'courses.id',
                'classes.id',
                'teachers.id',
                'category_courses.name',
                'courses.name',
                'classes.name',
                'teachers.name',
                'classes.quantity_member',
                'courses.description',
                'courses.image',
                'courses.price',
                'courses.id_class',
                'courses.id_category',
                'classes.start_date',
                'classes.end_date',
                'courses.id_promotions',
                'courses.id_teachers',
                'courses.status',
                'classes.ca_hoc',
                'courses.created_at',
                'courses.updated_at'
            )
            ->distinct()
            ->get();
        // dd($courses);
        $teachers = DB::table('teachers')->get();
        $category = DB::table('category_courses')->get();
        return view('include.trangchu.listCourses', compact('courses', 'teachers', 'category'));
    }




    public function delete(Request $request)
    {
        $ids = $request->input('ids');
        courses::whereIn('id', $ids)->delete();
        return redirect()->back();
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $courses = DB::table('courses')->where('name', 'LIKE', '%' . $search . '%')->orderBy('id', 'desc')->cursorPaginate(5);
        $category = DB::table('category_courses')->get();
        $promotions = DB::table('promotions')->get();
        $classes = DB::table('classes')->get();
        return view('admin.courses.list', compact('courses', 'category', 'promotions', 'classes'));
    }
    public function add(Request $request)
    {
        if ($request->post()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|min:0.01| numeric',
                'image' => 'required |mimes:jpeg,png,jpg,gif,svg,PNG',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $user = new courses();

            $user->name = $request->input('name');
            $user->description = $request->input('description');
            $user->price = $request->input('price');
            $user->id_category = $request->input('id_category');
            $user->id_promotions = $request->input('id_promotions');
            $user->status = $request->input('status');
            $user->id_class = $request->input('id_class');

            $image = $request->file('image');
            $newName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/img/'), $newName);
            $user->image = $newName;


            $user->save();
            return response()->json([
                'code' => 1,
            ]);
        }
    }
    public function cart(Request $request)
    {
        $course = DB::table('courses')
            ->join('category_courses', 'courses.id_category', '=', 'category_courses.id')

            ->join('teachers', 'courses.id_teachers', '=', 'teachers.id')
            ->join('classes', 'courses.id_class', '=', 'classes.id')
            ->leftJoin('reviews', 'courses.id', '=', 'reviews.course_id')
            ->select('courses.*', 'category_courses.name as tenDM', 'classes.start_date', 'classes.end_date', 'classes.name as tenLop', 'teachers.name as tenGiaoVien', 'classes.ca_hoc', 'classes.quantity_member as SiSo', DB::raw('AVG(reviews.rating) as DanhGia'))
            ->where('courses.id', '=', $request->input('cart'))
            ->groupBy(
                'courses.id',
                'classes.id',
                'teachers.id',
                'category_courses.name',
                'courses.name',
                'classes.name',
                'teachers.name',
                'classes.quantity_member',
                'courses.description',
                'courses.image',
                'courses.price',
                'courses.id_class',
                'courses.id_category',
                'classes.start_date',
                'classes.end_date',
                'courses.id_promotions',
                'courses.id_teachers',
                'courses.status',
                'classes.ca_hoc',
                'courses.created_at',
                'courses.updated_at'
            )
            ->distinct()
            ->first();
        $cartItem = [
            'id' => $course->id,
            'name' => $course->name,
            'image' => $course->image,
            'id_user' => $request->input('id_user'),
            'price' => $course->price,
            'SiSo' => $course->SiSo,
            'ca_hoc' => $course->ca_hoc,
            'tenGiaoVien' => $course->tenGiaoVien,
            'tenLop' => $course->tenLop,
            'start_date' => $course->start_date,
            'end_date' => $course->end_date,
            'tenDM' => $course->tenDM,
        ];
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            $existingItemIndex = collect($cart)->search(function ($item) use ($course) {
                return $item['id'] == $course->id;
            });
            $existingItemIndex1 = collect($cart)->search(function ($item) use ($course) {
                return $item['id_user'] == Auth::user()->id;
            });
            if ($existingItemIndex !== false && $existingItemIndex1 !== false) {
                // $cart[$existingItemIndex]['quantity'] += 1;
            } else {
                $cart[] = $cartItem;
            }
        } else {
            $cart[] = $cartItem;
        }
        session()->put('cart', $cart);
        return redirect()->route('user.cartlist');
    }
    public function cartlist()
    {
        $carts = session()->get('cart', []);

        $carts_with_user_id = [];
        if(Auth::user()){
            foreach ($carts as $cart) {
                if (array_key_exists('id_user', $cart)) {
                    if ($cart['id_user'] == Auth::user()->id) {
                        $user_id = $cart['id_user'];
                        $carts_with_user_id[] = $cart;
                    }
                }
            }
        }

        $cart = $carts_with_user_id;

        return view('include.trangchu.cart', compact('cart'));
    }
    public function removecart($course_id)
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);
        // dd($cart);
        // Tìm kiếm course trong giỏ hàng với điều kiện id_user
        foreach ($cart as $key => $item) {
            // dd($item['id']);

            if (isset($item['id_user']) && $item['id_user'] == Auth::user()->id && $item['id'] == $course_id) {
                // Xóa course khỏi giỏ hàng
                unset($cart[$key]);
            }
        }

        // Cập nhật lại giỏ hàng trong session
        session()->put('cart', $cart);

        return redirect()->route('user.cartlist');
    }

    public function orderadd(Request $request)
    {
        $params = $request->except('_token');
        $student  = carts::create($params);
        if ($student->id) {
            // Lấy giỏ hàng từ session
            $cart = session()->get('cart', []);
            // dd($cart);
            // Tìm kiếm course trong giỏ hàng với điều kiện id_user
            foreach ($cart as $key => $item) {

                if (isset($item['id_user']) && $item['id_user'] == Auth::user()->id) {
                    $courses = DB::table('carts')->orderBy('id', 'desc')->first();
                    $users = new Cart_detail();
                    $users->id_order = $courses->id;
                    $users->id_courses = $item['id'];
                    $users->save();
                    unset($cart[$key]);
                }
            }
            session()->put('cart', $cart);
            Session::flash('success', 'ADD Thành Công');
            return redirect()->route('infomationuser',['id'=>Auth::user()->id]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->post()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|min:0.01| numeric',
                'image' => 'mimes:jpeg,png,jpg,gif,svg,PNG',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            $user = courses::find($id);
            $user->name = $request->input('name');
            $user->price = $request->input('price');
            $user->description = $request->input('description');
            $user->id_category = $request->input('id_category');
            $user->id_class = $request->input('id_class');
            $user->id_promotions = $request->input('id_promotions');
            $user->status = $request->input('status');
            $image = $request->file('image');
            if ($image == '') {
                $user->image = $request->input('hidden_image');
            } else {
                $newName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('/img/'), $newName);
                $user->image = $newName;
            }
            $user->save();
            return response()->json([
                'code' => 1,
            ]);
        }
        $data = courses::find($id);
        return response()->json([
            'data' => $data,
        ]);
    }
    public function downloadExcel()
    {
        return Excel::download(new ExportFile, 'users.xlsx');
    }
}
