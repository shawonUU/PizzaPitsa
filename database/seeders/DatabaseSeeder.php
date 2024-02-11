<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LeadGenaration;
use Database\Factories\LeadGenarationFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(SyncPermissionSeeder::class);
        $this->call(AssignroleSeeder::class);
        // LeadGenaration::factory(100000)->create();
    }
}

