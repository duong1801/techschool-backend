<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory,Filterable;
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'url_social',
        'phone_number',
        'description'
    ];
    protected $casts = [
        'url_social' => 'array',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function articles (){
        $this->hasMany(Article::class);
    }

    public function filterKeyword($query, $value)
    {
        return $query->where('name', 'LIKE', '%' . $value . '%')->orWhere('slug', 'LIKE', '%' . $value . '%');
    }

    public function filterName($query, $value)
    {
        return $query->where('name', 'LIKE', '%' . $value . '%');
    }
}
