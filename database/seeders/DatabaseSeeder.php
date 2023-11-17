<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Log;
use App\Models\Shift;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Shift::create([
            'start' => '10:00:00',
            'end' => '17:00:00'
        ]);

        User::create([
            'username' => 'raynald',
            'password' => '123210092',
            'name' => 'Raynald Sage K.',
            'gender' => 'male',
            'card_id' => '777',
            'is_admin' => true,
            'shift_id' => 1
        ]);

        User::create([
            'username' => 'anin',
            'password' => '123210142',
            'name' => 'ANINDYA FEBRIHANA ARDHANI',
            'gender' => 'female',
            'card_id' => '1',
            'is_admin' => true
        ]);

        Log::create([
            'card_id' => "777",
            'user_id' => 1,
            'name' => "Raynald",
            'out' => Carbon::now()->addHours(7),
        ]);
    }
}
