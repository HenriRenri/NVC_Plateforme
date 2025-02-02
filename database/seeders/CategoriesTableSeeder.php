<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Electronics', 'parent_id' => null, 'description' => 'Electronic items', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fashion', 'parent_id' => null, 'description' => 'Clothing and accessories', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
