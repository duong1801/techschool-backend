<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name'=>'Khóa học reactjs',
            'slug'=>'khoa-hoc-reactjs',
            'price'=>'8000000',
            'discount'=>'7000000',
            'teacher_id'=>'1',
            'status'=>'debuted',
            'featured'=>'1',
            'category_id'=>'1',
            'thumbnail'=>'/storage/photos/1/thumbs/wallpaperflare.com_wallpaper.jpg',
            'description'=>'mô tả',
            // 'click' => 100
        ]);
        Course::create([
            'name'=>'Khóa học laravel',
            'slug'=>'khoa-hoc-laravel',
            'price'=>'8000000',
            'discount'=>'7000000',
            'teacher_id'=>'2',
            'status'=>'debuted',
            'featured'=>'1',
            'category_id'=>'2',
            'thumbnail'=>'/storage/photos/1/thumbs/wallpaperflare.com_wallpaper.jpg',
            'description'=>'mô tả',
            // 'click' => 100
        ]);
        Course::create([
            'name'=>'Khóa học Vuejs',
            'slug'=>'khoa-hoc-vuejs',
            'price'=>'8000000',
            'discount'=>'7000000',
            'teacher_id'=>'1',
            'status'=>'debuted',
            'featured'=>'1',
            'category_id'=>'1',
            'thumbnail'=>'/storage/photos/1/thumbs/wallpaperflare.com_wallpaper.jpg',
            'description'=>'mô tả',
            // 'click' => 100
        ]);
    }
}
