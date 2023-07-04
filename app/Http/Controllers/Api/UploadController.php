<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('app/public');
            return response()->json(['path' => $path], 200);
        }
        return response()->json(['error' => 'No file provided'], 400);
    }
}
