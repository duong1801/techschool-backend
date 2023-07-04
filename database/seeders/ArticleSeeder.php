<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'name' => 'Bài viết 1',
            'slug' => 'bai-viet-1',
            'thumbnail' => 'url',
            'teacher_id' => '1',
            'description' => 'mô tả',
            'view'=>'200',
            'content' =>'Nội dung bài viết 1'
        ]);
        Article::create([
            'name' => 'Bài viết 2',
            'slug' => 'bai-viet-2',
            'thumbnail' => 'url',
            'teacher_id' => '2',
            'description' => 'mô tả',
            'view'=>'200',
            'content' =>'Nội dung bài viết 2'
        ]);
    }
}
