<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'name' => 'Bùi Văn Nguyện',
            'slug' => 'bui-van-nguyen',
            'thumbnail' => '/storage/photos/1/avatar/312433236_100782699511660_949983432591240885_n.jpg',
            'url_social' => [
                "facebook" => "https://laravel.com/docs/9.x/facades",
                "github" => "facebook",
                "tiktok" => "facebook",
                "website" => [
                    "https://buivannguyen.com/",
                    "https://buivannguyen.com/",
                    "https://buivannguyen.com/"
                ]
            ],
            'phone_number' => '432535',
            'description' => 'mô tả',
        ]);
        Teacher::create([
            'name' => 'Tạ Hoàng An',
            'slug' => 'ta-hoang-an',
            'thumbnail' => '/storage/photos/1/avatar/312433236_100782699511660_949983432591240885_n.jpg',
            'url_social' => [
                "facebook" => "https://laravel.com/docs/9.x/facades",
                "github" => "facebook",
                "tiktok" => "facebook",
                "website" => [
                    "https://buivannguyen.com/",
                    "https://buivannguyen.com/",
                    "https://buivannguyen.com/"
                ]
            ],
            'phone_number' => '432535',
            'description' => 'mô tả tha',
        ]);
    }
}
