<?php

namespace App\Http\Controllers;

use App\Models\Province;

class ProvinceController extends Controller
{
    public function index(Province $province)
    {
        $districts = $province->districts()->get();

        return response()->json([
            'districts' => $districts
        ]);
    }
}
