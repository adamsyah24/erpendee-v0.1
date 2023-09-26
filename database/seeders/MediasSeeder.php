<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::factory()
            ->count(2)
            ->sequence(fn ($sequence) => [
                'media_name' => 'Media Test ' . $sequence->index + 1,
                'media_desc' => 'Test Description',
                // 'client_slug' => 'TRL' . $sequence->index + 1,
            ])
            ->create();
    }
}
