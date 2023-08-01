<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\EventSeizure;
use Illuminate\Database\Seeder;

class EventSeizureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventSeizure::factory(10)->create();
    }
}
