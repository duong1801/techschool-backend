<?php

namespace App\Models;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, Filterable;
    protected $fillable = [
        'name', 'slug',
        'price', 'teacher_id', 'discount',
        'status', 'featured', 'category_id',
        'thumbnail', 'description'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function filterKeyword($query, $value)
    {
        return $query->where('slug', 'LIKE', '%' . $value . '%')->orWhere('slug', 'LIKE', '%' . $value . '%');
    }

    public function filterName($query, $value)
    {
        return $query->where('name', 'LIKE', '%' . $value . '%');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_courses')->withPivot('created_at');

    }

    public function scopeFeaturedCourses($query)
    {
        return $query->where(['featured' => 1, 'status' => 'debuted'])->get();
    }

    public function scopeDiscountCourses($query)
    {
        return $query->where('discount','>',0)->orderby('name','desc')->limit(config('constants.LIMIT'))->get();
    }

    public function scopeUnpublishCourses($query)
    {
        return $query->where('status','comming_soon')->orderby('name','desc')->get();
    }
}
