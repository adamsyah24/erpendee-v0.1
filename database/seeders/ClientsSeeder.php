<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Database\Factories\ClientsFactory;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::factory()
            ->count(3)
            ->sequence(fn ($sequence) => [
                'client_name' => 'PT Trial ' . $sequence->index + 1,
                'address' => 'JKT',
                'client_slug' => 'TRL' . $sequence->index + 1,
            ])
            ->has(
                Brand::factory()
                    ->count(2)
                    ->state(
                        new Sequence(
                            [
                                'brand_name' => 'Trialthon',
                                'brand_slug' => 'TRLT'
                            ],
                            [
                                'brand_name' => 'Teritorial',
                                'brand_slug' => 'TERTL'
                            ],
                        )
                    )
            )
            ->create();
    }
}
