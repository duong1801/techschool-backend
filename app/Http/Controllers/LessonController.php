<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Models\AppConst;
use App\Models\Category;
use App\Models\Module;
use App\Models\Teacher;
use Illuminate\Support\Facades\Http;

class LessonController extends Controller
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
        $lessons = Lesson::filter($param)->paginate(AppConst::PER_PAGE);
        return view('lesson.list', compact('lessons','keyword'));

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
        $courses = Course::all();
        $modules = Module::all();


        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");

        $response = Http::withHeaders([
            'SproutVideo-Api-Key' => '0536a73155705b50e632f3f75d8cc2c2'
        ])->get('https://api.sproutvideo.com/v1/videos/');

        $result = json_decode($response, TRUE);

        $idVideos = [];
        foreach ($result['videos'] as $video) {
            $idVideos[] = $video['id'];
        }

        return view('lesson.add',compact('courses','modules','teachers','categories','idVideos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonRequest $request)
    {

        $lesson = new Lesson;
        $lesson->fill($request->all())
            ->save();
        return back()->with('success',  config('flashMessage.success.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $categories = Category::all();
        $teachers = Teacher::all();
        $courses = Course::all();
        $modules = Module::all();

        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json");

        $response = Http::withHeaders([
            'SproutVideo-Api-Key' => '0536a73155705b50e632f3f75d8cc2c2'
        ])->get('https://api.sproutvideo.com/v1/videos/');

        $result = json_decode($response, TRUE);

        $idVideos = [];
        foreach ($result['videos'] as $video) {
            $idVideos[] = $video['id'];
        }
        return view('lesson.edit', compact('lesson','categories','teachers','courses','modules','idVideos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {

        $lesson->fill($request->all())
            ->update();
        return redirect()->route('lesson.index')->with('success',  config('flashMessage.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lesson.index')->with('success',  config('flashMessage.success.delete'));
    }
}
