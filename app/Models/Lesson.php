<?php

namespace App\Models;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory,Filterable;
    protected $fillable = [
        'name', 'slug', 'course_id',
        'module_id', 'document', 'video_id',
        'status', 'description'
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function filterName($query, $value)
    {
         return $query->where('name', 'LIKE', '%' . $value . '%');
    }

}
