<?php

namespace App\Http\Controllers;

use App\Exports\ExportFile;
use App\Models\courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class CoursesController extends Controller
{
    //
    public function index()
    {
        $courses = DB::table('courses');
        return view('admin.courses.list', compact('courses'));
    }
    public function trangchu()
    {
        $csss = "main_style";
        $courses = DB::table('courses')
            ->join('category_courses', 'courses.id_category', '=', 'category_courses.id')

            ->join('teachers', 'courses.id_teachers', '=', 'teachers.id')
            ->join('classes', 'courses.id_class', '=', 'classes.id')
            ->leftJoin('reviews', 'courses.id', '=', 'reviews.course_id')
            ->select('courses.*', 'category_courses.name as tenDM','classes.start_date', 'classes.end_date', 'classes.name as tenLop', 'teachers.name as tenGiaoVien', 'classes.ca_hoc', 'classes.quantity_member as SiSo', DB::raw('AVG(reviews.rating) as DanhGia'))
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
        return view('include.trangchu.index', compact('courses', 'teachers','category'));

    }
    public function detailcoursres($id)
    {
        $courses = DB::table('courses')
            ->join('category_courses', 'courses.id_category', '=', 'category_courses.id')

            ->join('teachers', 'courses.id_teachers', '=', 'teachers.id')
            ->join('classes', 'courses.id_class', '=', 'classes.id')
            ->leftJoin('reviews', 'courses.id', '=', 'reviews.course_id')
            ->select('courses.*', 'category_courses.name as tenDM','classes.start_date', 'classes.end_date', 'classes.name as tenLop', 'teachers.name as tenGiaoVien', 'classes.ca_hoc', 'classes.quantity_member as SiSo', DB::raw('AVG(reviews.rating) as DanhGia'))
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
        $teachers = DB::table('teachers')->where('id','=',$courses->id_teachers)->first();
        $category = DB::table('category_courses')->limit(4)->get();
        return view('include.trangchu.detail', compact('courses', 'age','category','teachers'));
    }
    public function trangchuFull($id)
    {
        $courses = DB::table('courses')
            ->join('category_courses', 'courses.id_category', '=', 'category_courses.id')

            ->join('teachers', 'courses.id_teachers', '=', 'teachers.id')
            ->join('classes', 'courses.id_class', '=', 'classes.id')
            ->leftJoin('reviews', 'courses.id', '=', 'reviews.course_id')
            ->select('courses.*', 'category_courses.name as tenDM','classes.start_date', 'classes.end_date', 'classes.name as tenLop', 'teachers.name as tenGiaoVien', 'classes.ca_hoc', 'classes.quantity_member as SiSo', DB::raw('AVG(reviews.rating) as DanhGia'))
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
        return view('include.trangchu.index', compact('courses', 'teachers','category'));
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
        return view('admin.courses.list', compact('courses'));
    }
    public function downloadExcel()
    {
        return Excel::download(new ExportFile, 'users.xlsx');
    }
}
