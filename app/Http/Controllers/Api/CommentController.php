<?php

namespace App\Http\Controllers\Api;
use Exception;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        try {
            $comment = new Comment;
            $comment->fill($request->all())->save();
            return response()->json([
                'data' => 'Tạo dữ liệu thành công'
            ], 200);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
