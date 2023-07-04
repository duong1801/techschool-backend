<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function lessonDetail($id)
    {
        $lesson = Lesson::with(['module','module.lessons','course'])->find($id);

        if ($lesson->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return response()->json([
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => new LessonResource($lesson)
        ]);
    }
}
