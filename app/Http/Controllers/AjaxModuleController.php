<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class AjaxModuleController extends Controller
{
    public function store(Request $request)
    {
        $module = new Module();
        $module->fill($request->all())
            ->save();
        return response()->json([
            'data' => [
                'name' => $module->name,
                'id' => $module->id,
                'course_id'=>$module->course_id
            ],
            'message' => trans('message.success.create')
        ], 200);
    }
}
