<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CommentSeeder::class,
            TeacherSeeder::class,
            CourseSeeder::class,
            CategorySeeder::class,
            LessonSeeder::class,
            ModuleSeeder::class,
            TagSeeder::class,
           CategoryBlogSeeder::class,
           ArticleSeeder::class,
           NotificationSeeder::class
        ]);
    }
}
