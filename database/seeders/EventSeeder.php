<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::factory(10)->create();

        // DB::table('events')->insert([
        //     ["category" => "Seizure"],
        //     ["category" => "Seizure"],
        //     ["category" => "Seizure"],
        //     ["category" => "Pre Seizure"],
        //     ["category" => "Seizure"],
        //     ["category" => "Post Seizure"],
        //     ["category" => "Seizure"],
        // ]);
    }
}
