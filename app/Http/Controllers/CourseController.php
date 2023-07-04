<?php

namespace App\Http\Controllers;


use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\AppConst;
use App\Models\Teacher;
use App\Models\Category;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $param = $request->all();
        if (!isset($param['name'])) {
            $keyword = '';
        } else {
            $keyword = $param['name'];
        }
        $courses = Course::filter($param)->paginate(AppConst::PER_PAGE);
        
        return view('course.list', compact('courses','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $teachers = Teacher::all();
        return view('course.add',compact('teachers','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $course = new Course;
        $course->fill($request->all())
            ->save();
        return back()->with('success',  trans('message.success.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Category::all();
        $teachers = Teacher::all();
        return view('course.edit', compact('course','categories','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {

        $course->fill($request->all())
            ->update();
        return redirect()->route('course.index')->with('success',  trans('message.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('course.index')->with('success', trans('message.success.delete'));
    }
}
