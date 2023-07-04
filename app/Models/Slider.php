<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    protected $fillable = [
        'title',
        'content',
        'text_color',
        'url_btn',
        'content_btn',
        'thumbnail',
        'category_id',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
