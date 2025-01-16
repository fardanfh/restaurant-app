<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create(['name' => 'Sate Ayam', 'price' => 25000, 'category_id' => 1]);
        Menu::create(['name' => 'Nasi Goreng', 'price' => 30000, 'category_id' => 2]);
        Menu::create(['name' => 'Es Teh Manis', 'price' => 5000, 'category_id' => 4]);
        Menu::create(['name' => 'Puding Coklat', 'price' => 15000, 'category_id' => 3]);
        Menu::create(['name' => 'Ayam Penyet', 'price' => 35000, 'category_id' => 2]);
        Menu::create(['name' => 'Kwetiau Goreng', 'price' => 30000, 'category_id' => 2]);
    }
}
