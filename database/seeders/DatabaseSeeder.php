<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed default testing user
        User::where('email', 'test@example.com')->delete();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Call specific dashboard seeders
        $this->call([
            FarmerDashboardSeeder::class,
            FPODashboardSeeder::class,
            SHGDashboardSeeder::class,
        ]);
    }
}
