<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryBlogRequest;
use App\Models\AppConst;
use Illuminate\Http\Request;
use App\Models\CategoryBlog;

class CategoryBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Danh sách chuyên mục';

        $param = $request->all();

        $categoriesBlog = CategoryBlog::filter($param)->paginate(AppConst::PER_PAGE);

        return view('category-blog.list', compact('categoriesBlog', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Thêm chuyên mục";
        return view('category-blog.add', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryBlogRequest $request)
    {
        $input = $request->all();

        CategoryBlog::create($input);

        return redirect()->route('category-blog.index')->with('msg',  trans('message.success.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryBlog $categoryBlog)
    {
        $title = "Cập nhật chuyên mục";

        return view('category-blog.edit', compact('title','categoryBlog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryBlogRequest $request, CategoryBlog $categoryBlog)
    {
        $input = $request->all();

        $categoryBlog->update($input);

        return redirect()->route('category-blog.index')->with('msg',  trans('message.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryBlog::destroy($id);
        return redirect()->route('category-blog.index')->with('msg',  trans('message.success.delete'));
    }
}
