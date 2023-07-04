<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\ModuleRequest;
use App\Models\Category;
use App\Models\Module;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        return view('module.list', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('module.add', compact('courses','teachers','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleRequest $request)
    {
        $module = new Module;
        $module->fill($request->all())
            ->save();
        return back()->with('success',trans('message.success.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        $categories = Category::all();
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('module.edit', compact('module','courses','teachers','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $module->fill($request->all())
            ->update();
        return redirect()->route('module.index')->with('success', trans('message.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('module.index')->with('success', trans('message.success.delete'));
    }
}
