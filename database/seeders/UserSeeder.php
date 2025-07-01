<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;


class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Rollen aanmaken
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $employeeRole = Role::firstOrCreate(['name' => 'employee']);
        $volunteerRole = Role::firstOrCreate(['name' => 'volunteer']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@maaskantje.nl'],
            [
                'persoon_id' => 1,
                'inlog_naam' => 'admin',
                'gebruikersnaam' => 'admin@maaskantje.nl',
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'is_ingelogd' => true,
                'ingelogd' => Carbon::parse('2024-03-13 17:03:06'),
                'uitgelogd' => null,
            ]
        );
        $admin->assignRole($adminRole);

        // Manager
        $manager = User::firstOrCreate(
            ['email' => 'hans@maaskantje.nl'],
            [
                'persoon_id' => 1,
                'inlog_naam' => 'Hans',
                'gebruikersnaam' => 'hans@maaskantje.nl',
                'name' => 'Manager User',
                'password' => Hash::make('password'),
                'is_ingelogd' => true,
                'ingelogd' => Carbon::parse('2024-03-13 17:03:06'),
                'uitgelogd' => null,
            ]
        );
        $manager->assignRole($managerRole);

        // Werknemer
        $employee = User::firstOrCreate(
            ['email' => 'jan@maaskantje.nl'],
            [
                'persoon_id' => 2,
                'inlog_naam' => 'Jan',
                'gebruikersnaam' => 'jan@maaskantje.nl',
                'name' => 'Employee User',
                'password' => Hash::make('password'),
                'is_ingelogd' => false,
                'ingelogd' => Carbon::parse('2024-03-13 15:13:23'),
                'uitgelogd' => Carbon::parse('2024-03-13 15:23:46'),
            ]
        );
        $employee->assignRole($employeeRole);

        // Vrijwilliger
        $volunteer = User::firstOrCreate(
            ['email' => 'herman@maaskantje.nl'],
            [
                'persoon_id' => 3,
                'inlog_naam' => 'Herman',
                'gebruikersnaam' => 'herman@maaskantje.nl',
                'name' => 'Volunteer User',
                'password' => Hash::make('password'),
                'is_ingelogd' => true,
                'ingelogd' => Carbon::parse('2024-06-20 12:05:20'),
                'uitgelogd' => null,
            ]
        );
        $volunteer->assignRole($volunteerRole);

        // Optional: Create 5 demo users with default 'employee' role
        User::factory()->count(5)->create()->each(function ($user) use ($employeeRole) {
            $user->assignRole($employeeRole);
        });
    }
}
