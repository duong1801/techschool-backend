<?php

namespace App\Models;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory,Filterable;
    protected $fillable = ['title', 'content', 'expired','is_send_mail'];
    public function filterName($query, $value)
    {
         return $query->where('title', 'LIKE', '%' . $value . '%');
    }
}
