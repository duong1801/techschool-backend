<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherCollection;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function featured()
    {
        $teachers = Teacher::all();

        if ($teachers->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return new TeacherCollection($teachers,$message,$statusCode);
    }

    public function teacherDetail($id)
    {
        $teacher = Teacher::with(['courses'])->find($id);

        if ($teacher->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return response()->json([
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => new TeacherResource($teacher)
        ]);
    }
}
