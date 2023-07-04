<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Lập trình Front-End',
            'slug' => 'lap-trinh-front-end',
            'description' => 'mô tả'
        ]);
        Category::create([
            'name' => 'Lập trình Back-End',
            'slug' => 'lap-trinh-back-end',
            'description' => 'mô tả'
        ]);
    }
}
