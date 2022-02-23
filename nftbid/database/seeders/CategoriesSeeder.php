<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'category' => 'Art',
            'img' => 'default.jpg'
        ]);
        DB::table('categories')->insert([
            'category' => 'Changos feos',
            'img' => 'default.jpg'
        ]);
    }
}
