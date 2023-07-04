<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
class AjaxCourseController extends Controller
{
    public function store(Request $request)
    {
        $course = new Course();
        $course->fill($request->all())
            ->save();
        return response()->json([
            'data' => [
                'name' => $course->name,
                'id' => $course->id,
            ],
            'message' => trans('message.success.create')
        ], 200);
    }
}
