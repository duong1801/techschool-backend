<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;

class Module extends Model
{
     use HasFactory, Filterable;
     protected $fillable = ['name', 'course_id', 'slug', 'description'];
     public function course()
     {
          return $this->belongsTo(Course::class);
     }
     public function lessons()
     {
          return $this->hasMany(Lesson::class);
     }
     public function filterName($query, $value)
     {
          return $query->where('name', 'LIKE', '%' . $value . '%');
     }
}
