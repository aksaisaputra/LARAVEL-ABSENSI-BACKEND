<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Aksai',
            'email' => 'aksaisaputra100@gmail.com', // Perbaiki format email
            'password'=> Hash::make('123456789'),
        ]);


        // data dammy for company
        \App\Models\Company::create([
            'name' => 'SMA N 1 Modayag',
            'email' => 'sma1modayag@gmail.com',
            'address' => 'jln. trans modayag  Kec.Modayag',
            'latitude' => '0.7128856046373271',
            'longitude' => '124.37828105466247',
            'radius_km' => '0.5',
            'time_in' => '08.00',
            'time_out' => '17.00',
        ]);

        $this ->call([
            AttendanceSeeder::class,
            PermissionSeeder::class
        ]);
    }
}
