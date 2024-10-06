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
        $categories = [
            ["name" => "Food & Beverages"],
            ["name" => "Pharmaceuticals & Medicine"],
            ["name" => "Cosmetics & Personal Care"],
            ["name" => "Household Cleaning Products"],
            ["name" => "Dairy Products"],
            ["name" => "Baked Goods"],
            ["name" => "Frozen Foods"],
            ["name" => "Baby Products"],
            ["name" => "Supplements & Vitamins"],
            ["name" => "Pet Food & Supplies"],
        ];
        
        foreach ($categories as $category) {
            Category::create($category);
        }
        
    }
}
