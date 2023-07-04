<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class GetIdCourseByAjaxController extends Controller
{
    public function index(Request $request)
    {
        $student_id = $request->student_id;
        if (is_numeric($student_id)) {
            $student = Student::find($student_id);
            $courses = $student->courses;
            $array_id = [];

            foreach ($courses as $course) {
                $array_id[] = $course->id;
            }
            return ($array_id);
        }
    }
}
