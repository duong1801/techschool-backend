<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::create([

            'name'=>'Bài học 1',
            'slug'=>'bai-hoc-1',
            'course_id'=>'1',
            'module_id'=>'1',
            'document'=>'http/...',
            'video_id'=>'1',
            'status'=>'charges',
            'description'=>'mô tả'
            
        ]);
        Lesson::create([

            'name'=>'Bài học 2',
            'slug'=>'bai-hoc-2',
            'course_id'=>'1',
            'module_id'=>'1',
            'document'=>'http/...',
            'video_id'=>'2',
            'status'=>'charges',
            'description'=>'mô tả'

        ]);
    }
}
