<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var User */
        $superadmin = User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => 'super',
        ]);

        $superadmin->assignRole('Superadministrator');

        $poblacion1Sect = User::create([
            'name' => 'Pob. 1 Secretary',
            'email' => 'sec@pob1.com',
            'password' => 'pob1',
        ]);

        $poblacion1Sect->assignRole('Barangay Secretary');
    }
}
