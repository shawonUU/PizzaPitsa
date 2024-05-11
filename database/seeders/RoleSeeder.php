<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name' => 'Administrator',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'name' => 'Shop Manager',
            'guard_name' => 'web',
        ]);
        DB::table('roles')->insert([
            'name' => 'Customer',
            'guard_name' => 'web',
        ]);
    }
}