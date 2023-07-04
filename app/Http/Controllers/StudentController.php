<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\AppConst;
use App\Models\District;
use App\Models\Province;
use App\Models\Student;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $title = "Danh sách học viên";

        $param = $request->all();

        $students = Student::filter($param)->paginate(config('constants.LIMIT'));

        return view('student.list', compact('students', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tạo học viên";

        $provinces = Province::all();

        return view('student.add', compact('title', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();

        Student::create($input);

        return redirect()->route('student.index')->with('msg', trans('message.success.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('student.detail', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        $title = 'Cập nhật học viên';

        $provinces = Province::all();
        // dd($provinces);

        return view('student.edit', compact('student', 'provinces', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $student)
    {
        $student->fill($request->all())->update();
        return redirect()->route('student.index')->with('msg', trans('message.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect()->route('student.index')->with('msg',  trans('message.success.delete'));
    }
}
