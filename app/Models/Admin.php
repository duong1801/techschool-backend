<?php

namespace App\Models;

use App\Scopes\AdminScope;
use App\Scopes\StudentScope;
use App\Scopes\TeacherScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected static function booted()
    {
        static::addGlobalScope(new AdminScope);
    }
}
