<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::all();
        $sequence = new Sequence(
            [
                "schedule" => "Full Time",
                'featured' => false
            ],
            [
                "schedule" => "Part Time",
                'featured' => true
            ],
        );
        Job::factory(20)->hasAttached($tags)->state($sequence)->create();
        // Job::factory(3)->hasAttached($tags)->featured()->create();
    }
}
