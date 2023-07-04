<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            "name" => "Tag 1",
            "description" => "mô tả 1"
        ]);
        Tag::Create([
            "name" => "Tag 2",
            "description" => "mô tả 2"
        ]);
        Tag::Create([
            "name" => "Tag 3",
            "description" => "mô tả 3"
        ]);
    }
}
