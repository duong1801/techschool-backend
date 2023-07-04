<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategoryBlogsCollection;
use App\Http\Resources\CategoryBlogsResource;
use App\Http\Resources\TagResource;
use App\Models\Article;
use App\Models\CategoryBlog;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function featured()
    {
        $articles = Article::with(['teacher','tags','categoryBlogs'])->get();

        if ($articles->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return new ArticleCollection($articles,$message,$statusCode);
    }

    public function latest()
    {
        $article = Article::latestArticle();

        if ($article->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return new ArticleCollection($article,$message,$statusCode);
    }

    public function categoryBlogs()
    {
        $categoryBlogs = CategoryBlog::with(['articles','articles.teacher'])->get();

        if ($categoryBlogs->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return new CategoryBlogsCollection($categoryBlogs,$message,$statusCode);
    }

    public function categoryBlogDetail($id)
    {
        $categoryBlog = CategoryBlog::with(['articles','articles.teacher'])->find($id);

        if ($categoryBlog->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return response()->json([
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => new CategoryBlogsResource($categoryBlog,$message,$statusCode)
        ]);
    }

    public function articleDetail($id)
    {
        $article = Article::with(['tags','teacher','categoryBlogs'])->find($id);

        if ($article->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return response()->json([
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => new ArticleResource($article)
        ]);
    }

    public function articleTagDetail($id)
    {
        $tag = Tag::with(['articles','articles.teacher'])->find($id);

        if ($tag->count() > 0) {
            $statusCode = 200;
            $message = "Successfully";
        } else {
            $statusCode = 500;
            $message = "Failed";
        }

        return response()->json([
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => new TagResource($tag)
        ]);
    }
}
