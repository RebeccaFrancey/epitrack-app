<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Facades\File;

class TypeSeederJSON extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::factory(3)->create();
        Type::truncate();

        $json = File::get("database/data/types.json");
        $type = json_decode($json);

        foreach ($type as $key => $value){
            Type::create([
                "id" => $value->id,
                "type" => $value->type,
                "created_at" => $value->created_at,
                "updated_at" => $value->updated_at,
            ]);
        }

    }
}
