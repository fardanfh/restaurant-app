<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Makanan Pembuka']);
        Category::create(['name' => 'Makanan Utama']);
        Category::create(['name' => 'Makanan Penutup']);
        Category::create(['name' => 'Minuman']);
    }
}
