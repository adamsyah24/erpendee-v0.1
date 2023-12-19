<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Clients;
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
        $this->call([
            ClientsSeeder::class,
            ProductsSeeder::class,
            MediasSeeder::class,
            StatusesSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();


        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@endeecom.com',
            'password' => bcrypt('password'),
        ]);
    }
}
