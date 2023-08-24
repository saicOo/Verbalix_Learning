<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'ahmed',
            'email' => 'student@app.com',
            'password' => bcrypt('1234'),
            'user_id' => 1,
        ]);
    }
}
