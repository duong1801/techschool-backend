<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Filterable;
    protected $fillable = ['name', 'slug', 'description'];
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function filterName($query, $value)
    {
        return $query->where('name', 'LIKE', '%' . $value . '%');
    }
    public function slider()
    {
        return $this->hasOne(Slider::class);
    }
}
