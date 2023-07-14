<?php

namespace App\Http\Controllers;

use App\Exports\ExportFile;
use App\Models\courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Http\Requests\CoursesRequest;
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
            ->distinct()->limit(6)
            ->get();
        // dd($courses);
        $teachers = DB::table('teachers')->get();
        $category = DB::table('category_courses')->limit(4)->get();
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
        $count = DB::table('reviews')->where('course_id', '=', $courses->id)->count();
        $reviews = DB::table('reviews')->join('users', 'reviews.id_user', 'users.id')->select('reviews.*', 'users.image', 'users.name')->where('course_id', '=', $id)->get();
        // dd($reviews);
        $category = DB::table('category_courses')->limit(4)->get();
        return view('include.trangchu.detail', compact('courses', 'reviews', 'age', 'count', 'teachers'));
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
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'code' => 0,
                    'errors' => $validator->errors()->toArray()
                ]);
            }
            courses::create($request->except("_token"));
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
                'description' => 'required',
                'price' => 'required|min:0.01| numeric',
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
