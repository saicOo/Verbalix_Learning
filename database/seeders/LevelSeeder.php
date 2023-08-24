<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 6; $i++) {
            \App\Models\Level::create([
                'name' => 'Level '.$i,
            ]);
        }
    }
}
