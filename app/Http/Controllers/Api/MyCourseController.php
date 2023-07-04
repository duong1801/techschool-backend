<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MyCourseController extends Controller
{
    public function myCourse()
    {
        $userId = Auth::id();

        $student = Student::myCourse($userId);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'courses' => $student
        ], 200);
    }
}
