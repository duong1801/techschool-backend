<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CourseResource;
use App\Http\Resources\TeacherResource;
use App\Models\Article;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $param = $request->all();

        if ($param) {

            $articles = Article::filter($param)->get();

            $courses = Course::filter($param)->get();

            $teachers = Teacher::filter($param)->get();

            return response([
                'data' => [
                    'articles' => ArticleResource::collection($articles),
                    'courses' => CourseResource::collection($courses),
                    'teachers' => TeacherResource::collection($teachers),
                ],
            ], 200);
        } else {
            return response([
                'data' => [],
            ], 200);
        }
    }
}
