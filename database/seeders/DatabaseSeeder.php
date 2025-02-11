<?php

namespace Database\Seeders;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Role::create(['name' => 'SuperAdmin']);
        // Role::create(['name' => 'SchoolAdmin']);
        // Role::create(['name' => 'Teacher']);
        $this->call([
            // Other seeders
            AttendancesTableSeeder::class,
        ]);
        // Role::create(['name' => 'Student']);

    }
}
