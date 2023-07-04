<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notification::create([
            'title' => 'Thông báo 1',
            'content' => 'Nội dung 1',
            'expired' => '2022-11-15 23:09:00',
            'is_send_mail' => '1'
        ]);
        Notification::create([
            'title' => 'Thông báo 2',
            'content' => 'Nội dung 2',
            'expired' => '2022-11-15 20:09:00',
            'is_send_mail' => '0'
        ]);
        Notification::create([
            'title' => 'Thông báo 4',
            'content' => 'Nội dung 4',
            'expired' => '2022-11-15 21:09:00',
            'is_send_mail' => '0'
        ]);
    }
}
