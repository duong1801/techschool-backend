<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'slug'=>'required',
            'thumbnail'=>'required',
            'teacher_id'=>'required',
            'description'=>'required',
            'content'=>'required',
            'category_blog_id'=>'required',
            'tag_id'=>"required"
        ];
    }
}
