<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Teacher;
use App\Models\Tag;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use App\Models\AppConst;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $param = $request->all();
        if (!isset($param['name'])) {
            $keyword = '';
        } else {
            $keyword = $param['name'];
        }
        $articles = Article::filter($param)->paginate(AppConst::PER_PAGE);
        return view('article.list', compact('articles','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = CategoryBlog::all();
        $teachers = Teacher::all();
        return view('article.add', compact('teachers','tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $category_id = $request->category_blog_id;
        $tag_id = $request->tag_id;
        $article = new Article();
        $article->fill($request->all())->save();
        $article->tags()->attach($tag_id);
        $article->categoryBlogs()->attach($category_id);
        return redirect()->route('article.create')->with('success', trans('message.success.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::all();
        $categories = CategoryBlog::all();
        $teachers = Teacher::all();
        return view('article.edit', compact('article', 'teachers','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $category_id = $request->category_blog_id;
        $tag_id = $request->tag_id;
        $article->fill($request->all())->update();
        $article->tags()->sync($tag_id);
        $article->categoryBlogs()->sync($category_id);
        return redirect()->route('article.index')->with('success',  trans('message.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with('success',  trans('message.success.delete'));
    }
}
