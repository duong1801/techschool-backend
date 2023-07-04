<?php

namespace App\Http\Controllers\Api;
use App\Models\Course;
use App\Http\Resources\CourseResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CourseCollection;
use App\Models\Category;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function featured()
    {
        $courses = Course::with('modules','teacher','category')->featuredCourses();

        if ($courses->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return new CourseCollection($courses,$message,$statusCode);
    }

    public function discount()
    {
        $courses = Course::with('modules','teacher','category')->discountCourses();

        if ($courses->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return new CourseCollection($courses,$message,$statusCode);
    }

    public function unpublish()
    {
        $courses = Course::with('modules','teacher','category')->unpublishCourses();

        if ($courses->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return new CourseCollection($courses,$message,$statusCode);
    }

    public function categories()
    {
        $categories = Category::with(['courses','courses.teacher'])->get();

        if ($categories->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return new CategoryCollection($categories,$message,$statusCode);
    }

    public function categoryDetail($id)
    {
        $categories = Category::with(['courses','courses.teacher'])->find($id);

        if ($categories->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return new CategoryResource($categories,$message,$statusCode);

    }

    public function courseDetail($id)
    {

        $courseDetail = Course::with(['modules','teacher','modules.lessons','category'])->find($id);


        if ($courseDetail->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return response()->json([
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => new CourseResource($courseDetail)
        ]);
    }
}
