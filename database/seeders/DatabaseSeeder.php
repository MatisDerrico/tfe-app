<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création d'un utilisateur avec un compte admin
        User::factory()->create([
            'email' => 'matispgm@hotmail.com',
            'name' => 'Matis',
            'is_admin' => true
         ]);

         User::factory()->create([
            'email' => 'adminIfosup@hotmail.com',
            'name' => 'adminIfosup',
            'is_admin' => true
         ]);

        // Création de services de coiffure avec un employé attitré pour chaque service
        $barberServices = Service::factory()
            ->barber()
            ->count(2)
            ->has(Employee::factory()->barber())
            ->state(new Sequence(
                ['name' => 'Bigoudis'],
                ['name' => 'Lissage californien'],
            ))
            ->create();

        // Création de services de tatouage avec un employé attitré pour chaque service
        $tatooServices = Service::factory()
            ->tatoo()
            ->count(2)
            ->has(Employee::factory()->tatoo())
            ->state(new Sequence(
                ['name' => 'Tribal'],
                ['name' => 'Mahori'],
            ))
            ->create();

        // Création d'une réservation avec des services de tatouage
        Booking::factory()
            ->hasAttached($tatooServices)
            ->create();

        // Création d'une réservation avec des services de coiffure
        Booking::factory()
            ->hasAttached($barberServices)
            ->create();
    }
}
