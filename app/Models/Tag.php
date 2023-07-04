<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory,Filterable;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'description'
    ];
    public function articles(){
        return $this->belongsToMany(Article::class,"article_tags");
    }
}
