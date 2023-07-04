<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'teacher_id',
        'view',
        'description',
        'content'
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, "article_tags");
    }
    public function categoryBlogs()
    {
        return $this->belongsToMany(CategoryBlog::class, "article_category_blogs","article_id","category_blog_id");
    }
    public function filterKeyword($query, $value)
    {
        return $query->where('name', 'LIKE', '%' . $value . '%')->orWhere('slug', 'LIKE', '%' . $value . '%');
    }

    public function filterName($query, $value)
    {
        return $query->where('name', 'LIKE', '%' . $value . '%');
    }

    public function scopeLatestArticle($query)
    {
        return $query->with(['tags','teacher','categoryBlogs'])->orderBy('id','desc')->limit(config('constants.LIMIT'))->paginate(config('constants.ARTICLE_PAGINATE'));
    }
}
