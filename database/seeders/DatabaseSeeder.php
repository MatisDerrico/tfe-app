<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'email' => 'matispgm@hotmail.com',
            'name' => 'Matis',
         ]);
         \App\Models\User::factory()->create();
         \App\Models\Employee::factory(10)
            ->has(Service::factory()->count(3)) // Un employé a 3 services
            ->create();
         \App\Models\Connection::factory(5)->create();
         \App\Models\Booking::factory()
            ->has(Service::factory())
            ->create();
    }


}
