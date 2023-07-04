<?php

namespace App\Models;

use App\Scopes\StudentScope;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, Filterable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'username',
        'phone',
        'address',
        'province_id',
        'district_id',
        'ward_id',
        'role_id'
    ];
    protected $table = 'users';
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected static function booted()
    {
        static::addGlobalScope(new StudentScope);
    }

    public function filterName($query, $value)
    {
        return $query->where('name', 'LIKE', '%' . $value . '%');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_courses')->withPivot('created_at');
    }

    public function scopeMyCourse($query, $id)
    {
        return $query->find($id)->courses()->with(['teacher', 'modules', 'modules.lessons','category'])->get();
    }
}
