<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@tech2.vn',
            'username' => 'tech2',
            'avatar' => '',
            'phone' => '0987123123',
            'address' => '34 tran quy kien, cau giay, ha noi',
            'province_id' => '1',
            'district_id' => '1',
            'ward_id' => '1',
            'password' => Hash::make('123123123'),
            'role_id' => '1',
            'facebook_id'=>'545453545454554'
        ]);
        User::create([
            'name' => 'Hưng',
            'email' => 'user@tech2.vn',
            'username' => 'User1',
            'avatar' => 'TECH2',
            'phone' => '0987123123',
            'address' => '34 tran quy kien, cau giay, ha noi',
            'province_id' => '1',
            'district_id' => '1',
            'ward_id' => '1',
            'password' => Hash::make('123123123'),
            'role_id' => '3',
            'facebook_id'=>'545453545454554'
        ]);
        User::create([
            'name' => 'Dương',
            'email' => 'user21@tech2.vn',
            'username' => 'User2',
            'avatar' => 'TECH2',
            'phone' => '0987123123',
            'address' => '34 tran quy kien, cau giay, ha noi',
            'province_id' => '1',
            'district_id' => '1',
            'ward_id' => '1',
            'password' => Hash::make('123123123'),
            'role_id' => '3',
            'facebook_id'=>'545453545454554'
        ]);
        User::create([
            'name' => 'Vũ',
            'email' => 'user234@tech2.vn',
            'username' => 'User3',
            'avatar' => 'TECH2',
            'phone' => '0987123123',
            'address' => '34 tran quy kien, cau giay, ha noi',
            'province_id' => '1',
            'district_id' => '1',
            'ward_id' => '1',
            'password' => Hash::make('123123123'),
            'role_id' => '3'
        ]);
        User::create([
            'name' => 'Tạ Hoàng An',
            'email' => 'hoanganunicode@gmail.com',
            'username' => 'anunicode',
            'avatar' => 'TECH2',
            'phone' => '0987123123',
            'address' => '34 tran quy kien, cau giay, ha noi',
            'province_id' => '1',
            'district_id' => '1',
            'ward_id' => '1',
            'password' => Hash::make('123123123'),
            'role_id' => '3'
        ]);
    }
}
