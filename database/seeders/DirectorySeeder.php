<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fpo;
use App\Models\Shg;
use App\Models\Pacs;
use App\Models\Cooperative;

class DirectorySeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        Fpo::truncate();
        Shg::truncate();
        Pacs::truncate();
        Cooperative::truncate();

        $states = ['Maharashtra', 'Karnataka', 'Kerala', 'Punjab', 'Uttar Pradesh'];
        $districts = ['Pune', 'Nashik', 'Bangalore', 'Mysore', 'Palakkad', 'Amritsar', 'Lucknow'];
        $products = ['Rice', 'Wheat', 'Dairy', 'Organic Vegetables', 'Fruits', 'Honey', 'Handicrafts'];
        $activities = ['Aggregation', 'Processing', 'Marketing', 'Credit Services', 'Training'];

        // Seed FPOs
        for ($i = 1; $i <= 20; $i++) {
            Fpo::create([
                'name' => "Kisan Prosperity FPO Group $i",
                'state' => $states[array_rand($states)],
                'district' => $districts[array_rand($districts)],
                'products' => array_intersect($products, array_rand(array_flip($products), 3)),
                'activities' => array_intersect($activities, array_rand(array_flip($activities), 2)),
                'member_count' => rand(100, 1000),
                'women_members' => rand(50, 400),
                'verified' => (bool)rand(0, 1),
                'registration_year' => rand(2015, 2024),
                'phone' => "98765" . rand(10000, 99999),
                'email' => "fpo$i@farmtech.org",
            ]);
        }

        // Seed SHGs
        for ($i = 1; $i <= 20; $i++) {
            Shg::create([
                'group_name' => "Jai Maa Durga SHG $i",
                'state' => $states[array_rand($states)],
                'district' => $districts[array_rand($districts)],
                'products' => array_intersect($products, array_rand(array_flip($products), 2)),
                'activity_type' => $activities[array_rand($activities)],
                'members_count' => rand(10, 50),
                'women_led' => true,
                'verified' => (bool)rand(0, 1),
                'formation_year' => rand(2018, 2024),
                'phone' => "91234" . rand(10000, 99999),
            ]);
        }

        // Seed PACS
        for ($i = 1; $i <= 10; $i++) {
            Pacs::create([
                'name' => "Gramin Seva PACS $i",
                'state' => $states[array_rand($states)],
                'district' => $districts[array_rand($districts)],
                'member_count' => rand(500, 5000),
                'verified' => true,
                'registration_year' => rand(1980, 2010),
            ]);
        }

        // Seed Cooperatives
        for ($i = 1; $i <= 10; $i++) {
            Cooperative::create([
                'name' => "United Dairy Cooperative $i",
                'state' => $states[array_rand($states)],
                'district' => $districts[array_rand($districts)],
                'products' => ['Milk', 'Butter', 'Cheese'],
                'member_count' => rand(1000, 10000),
                'verified' => true,
                'registration_year' => rand(1990, 2020),
            ]);
        }
    }
}
