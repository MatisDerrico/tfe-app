<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class employeeHolidaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employee_holidays')->insert(['user_id'=>3, 'date_debut'=>'2024-06-17', 'date_fin'=>'2024-06-21']);
    }
}
