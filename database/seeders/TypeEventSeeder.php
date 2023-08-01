<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_event')->insert([
            ["type_id" => 2, "event_id"=>6],
            ["type_id" => 1, "event_id"=>7],
            ["type_id" => 3, "event_id"=>8],
            ["type_id" => 2, "event_id"=>9],
            ["type_id" => 2, "event_id"=>10],
        ]);
    }
}
