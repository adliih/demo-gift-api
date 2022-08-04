<?php

namespace Database\Seeders;

use App\Models\Gift;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seedUser();
        $this->seedGifts();
    }

    private function seedUser()
    {
        User::factory()->create([
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
    }

    private function seedGifts()
    {
        Gift::factory()->times(10)->create();
    }
}
