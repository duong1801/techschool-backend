<?php

namespace Database\Seeders;

use App\Models\CategoryBlog;
use Illuminate\Database\Seeder;

class CategoryBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryBlog::create([
            "name" => "Chuyện cuộc sống",
            "description" => "mô tả 1"
        ]);
        CategoryBlog::create([
            "name" => "Chuyện bên lề",
            "description" => "mô tả 2"
        ]);
        CategoryBlog::create([
            "name" => "Chuyện nghề nghiệp",
            "description" => "mô tả 3"
        ]);
    }
}
