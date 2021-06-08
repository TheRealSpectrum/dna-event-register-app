<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            "name" => "admin",
            "email" => "admin@example.org",
        ]);
        User::factory()
            ->count(10)
            ->create();
    }
}
