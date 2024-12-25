<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$products = Product::paginate(2); https://laravel.com/docs/11.x/pagination
        $courses = Courses::orderBy('created_at')->paginate(10);
        //$products = Product::orderBy('created_at','DESC')->get(); 

        return view('courses.list', [
            'courses' => $courses
        ]);
    }

    public function search(Request $request)
    {
        if (!empty($request)) {
            $search  = $request->input('search');

            $courses = Courses::where(
                'name',
                'like',
                "$search%"
            )
                ->orWhere('email', 'like', "$search%")
                ->paginate(5);
            return view('products.list', compact('products'));
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'difficulty' => 'required|string',
            'price' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        // Xác thực dữ liệu
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('courses.create')->withInput()->withErrors($validator);
        }

        // Lưu dữ liệu vào bảng Courses
        $course = new Courses();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->difficulty = $request->difficulty;
        $course->price = $request->price;
        $course->start_date = $request->start_date;

        // Xử lý ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/courses'), $imageName);
            $course->image = $imageName;
        } else {
            $course->image = 'default.jpg';
        }

        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Courses::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Courses::findOrFail($id);

        // Quy tắc xác thực
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'difficulty' => 'required|string',
            'price' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // image là tùy chọn khi cập nhật
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('courses.edit', $course->id)->withInput()->withErrors($validator);
        }

        // Cập nhật thông tin khóa học
        $course->name = $request->name;
        $course->description = $request->description;
        $course->difficulty = $request->difficulty;
        $course->price = $request->price;
        $course->start_date = $request->start_date;

        // Xử lý ảnh khi cập nhật
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($course->image && $course->image != 'default.jpg') {
                File::delete(public_path('uploads/courses/' . $course->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/courses'), $imageName);
            $course->image = $imageName;
        }

        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Courses::findOrFail($id);

        // Xóa ảnh nếu có
        if ($course->image && $course->image != 'default.jpg') {
            File::delete(public_path('uploads/courses/' . $course->image));
        }

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
