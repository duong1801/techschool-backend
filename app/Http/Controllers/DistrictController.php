<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Ward;

class DistrictController extends Controller
{
    public function index(District $district)
    {
        $wards = $district->wards()->get();

        return response()->json([
            'wards' => $wards
        ]);
    }
}
