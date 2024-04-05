<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory()->create();
         \App\Models\Employee::factory(10)->create();
         \App\Models\Service::factory(10)->create();
         \App\Models\Connection::factory(5)->create();
         \App\Models\Booking::factory(10)

            ->has(Service::factory()->count(3))
            ->create();
    }


}
