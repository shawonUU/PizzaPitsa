<?php

namespace Database\Seeders;

use App\Models\Admin\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Small',
            'Large',
            'Medium',          
        ];
        foreach ($categories as $category) {
            Size::create(['name' => $category]);
        }
    }
}
