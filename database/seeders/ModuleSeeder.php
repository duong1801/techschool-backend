<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create([
            'name'=>'Module 1',
            'course_id'=>'1',
            'slug'=>'module-1', 
            'description'=>'mô tả1'
        ]);
        Module::create([
            'name'=>'Module 2',
            'course_id'=>'1',
            'slug'=>'module-2', 
            'description'=>'mô tả2'
        ]);
        Module::create([
            'name'=>'Module 3',
            'course_id'=>'2',
            'slug'=>'module-2', 
            'description'=>'mô tả3'
        ]);
        
    }
}
