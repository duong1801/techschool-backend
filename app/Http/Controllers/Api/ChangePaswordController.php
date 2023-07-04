<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePaswordController extends Controller
{
    public function changePassword(ChangePasswordRequest $request)
    {
        Student::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);

        return response()->json(['message' => 'Change password successfully'], 200);
    }
}
