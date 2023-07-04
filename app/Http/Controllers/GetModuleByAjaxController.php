<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class GetModuleByAjaxController extends Controller
{
    public function index(Request $request)
    {
        $course = Course::find($request->id);
        $modules = $course->modules;
        return response()->json([
           'data' => $modules
        ]);
    }
}
