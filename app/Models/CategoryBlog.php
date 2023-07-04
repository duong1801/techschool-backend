<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    use HasFactory, Filterable;

    protected $table = 'category_blogs';

    protected $fillable = [
        'name',
        'description'
    ];

    public function filterName($query, $value)
    {
        return $query->where('name', 'LIKE', '%' . $value . '%');
    }
    public function articles(){
        return $this->belongsToMany(Article::class,"article_category_blogs","category_blog_id","article_id");
    }
}
