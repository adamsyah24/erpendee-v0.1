<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::factory()
        ->count(3)
        ->sequence(fn ($sequence) => [
            'status' => 'Approved' . $sequence->index + 1,
            // 'product_desc' => 'WEB' . $sequence->index + 1,
            // 'price' => '1200000',
        ])
        ->create();
    }
}
