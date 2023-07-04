<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'user_id' => '1',
            'content' => 'Bài này dạy hay quá anh ơi',
            'lesson_id' => '1'
        ]);
        Comment::create([
            'user_id' => '2',
            'content' => 'Bài này dạy dở quá!',
            'lesson_id' => '1'
        ]);
        Comment::create([
            'user_id' => '3',
            'content' => 'Chê bài này',
            'lesson_id' => '2'
        ]);
    }
}
