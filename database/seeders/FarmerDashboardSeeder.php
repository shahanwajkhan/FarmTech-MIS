<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Farmer;
use App\Models\Scheme;
use App\Models\ForumPost;
use App\Models\ChatbotHistory;
use Illuminate\Support\Facades\Hash;

class FarmerDashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create or update Ramesh Kumar (Farmer User)
        $user = User::where('email', 'ramesh@farmtech.com')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'Ramesh Kumar',
                'email' => 'ramesh@farmtech.com',
                'mobile' => '9812345678',
                'password' => Hash::make('password'),
                'role' => 'farmer',
                'status' => 'active',
                'profile_image' => null,
            ]);
        } else {
            $user->update([
                'role' => 'farmer',
                'status' => 'active'
            ]);
        }

        // 2. Create or update Ramesh's Farmer Profile
        $farmer = Farmer::where('user_id', $user->id)->first();
        $farmerData = [
            'user_id' => $user->id,
            'name' => 'Ramesh Kumar',
            'mobile' => '9812345678',
            'email' => 'ramesh@farmtech.com',
            'state' => 'Punjab',
            'district' => 'Patiala',
            'village' => 'Kalyan',
            'land_area' => 4.5,
            'crop_type' => 'Wheat',
            'shg_fpo_member' => 'Yes',
            'aadhaar_id' => 'XXXX-XXXX-8921',
            'soil_type' => 'Clayey Loam',
            'irrigation_type' => 'Drip Irrigation',
            'livestock' => '3 Cows (Murrah breed), 2 Buffaloes',
            'health_score' => 82,
            'soil_ph' => 6.8,
            'crop_status' => 'Flowering Stage',
            'nitrogen' => 'Medium',
            'phosphorus' => 'High',
            'potassium' => 'Low',
            'soil_condition' => 'Neutral / Optimal Soil',
            'recommended_fertilizers' => ['Maintain balanced NPK (120:60:40 kg/ha)', 'Apply Muriate of Potash (MOP) due to low Potassium'],
            'recommended_crops' => ['Wheat', 'Maize', 'Mustard', 'Gram'],
            'insurance_claims' => [
                [
                    'id' => 'claim_664e1c20',
                    'crop_name' => 'Mustard',
                    'area_damaged' => 1.2,
                    'damage_cause' => 'Pest Attack',
                    'estimated_damage' => 28,
                    'status' => 'Claim Approved',
                    'applied_at' => '2026-04-10'
                ]
            ]
        ];

        if (!$farmer) {
            Farmer::create($farmerData);
        } else {
            $farmer->update($farmerData);
        }

        // 3. Clean and seed Government Schemes
        Scheme::truncate();
        $schemesData = [
            [
                'scheme_name' => 'PM-KISAN Samman Nidhi',
                'eligibility' => 'Small and marginal farmers holding cultivable land up to 2 hectares.',
                'benefits' => 'Financial support of ₹6,000 per year in three equal installments of ₹2,000 directly to bank accounts.',
                'status' => 'Active',
                'recommended_why' => 'Recommended because you have a small land area (4.5 acres) and meet the primary smallholder criteria.',
                'category' => 'Income Support',
                'apply_url' => '#'
            ],
            [
                'scheme_name' => 'Pradhan Mantri Fasal Bima Yojana (PMFBY)',
                'eligibility' => 'All farmers cultivating notified crops in notified areas, including tenant farmers.',
                'benefits' => 'Comprehensive risk insurance against crop yield loss due to natural calamities, pests & diseases. Premium capped at 1.5% - 2%.',
                'status' => 'Applied',
                'recommended_why' => 'Recommended because you are cultivating Wheat, which has high weather vulnerability in Punjab during dry spells.',
                'category' => 'Crop Insurance',
                'apply_url' => '#'
            ],
            [
                'scheme_name' => 'Sub-Mission on Agricultural Mechanization (SMAM)',
                'eligibility' => 'Individual farmers, self-help groups (SHGs), and farmer cooperatives.',
                'benefits' => 'Up to 50% - 80% financial subsidy for purchasing modern farm implements like tractors, rotavators, and laser land levelers.',
                'status' => 'Active',
                'recommended_why' => 'Recommended because your FPO cooperative affiliation allows you to set up a shared Custom Hiring Center.',
                'category' => 'Subsidy',
                'apply_url' => '#'
            ],
            [
                'scheme_name' => 'PM-KUSUM Solar Pump Scheme',
                'eligibility' => 'Individual farmers or cooperatives having water source and land.',
                'benefits' => 'Provides 60% subsidy for setting up grid-connected or off-grid solar pumps, reducing energy bills to zero.',
                'status' => 'Active',
                'recommended_why' => 'Recommended because you are using Drip Irrigation, which operates highly efficiently with solar-powered pump setups.',
                'category' => 'Subsidy',
                'apply_url' => '#'
            ]
        ];
        foreach ($schemesData as $s) {
            Scheme::create($s);
        }

        // 4. Clean and seed Forum Posts
        ForumPost::truncate();
        $forumData = [
            [
                'user_id' => 'system',
                'author_name' => 'Baldev Singh',
                'author_role' => 'FPO Lead, Patiala',
                'title' => 'Successful control of aphid infestation in mustard crop',
                'description' => 'Hi everyone, last week I noticed initial aphid attack on my mustard flowers. Instead of heavy chemical sprays, I used Neem oil solution (5ml/liter) mixed with liquid soap. Within 3 days, 85% of pests were controlled. Highly recommend trying this first!',
                'likes' => 18,
                'comments' => [
                    ['author' => 'Harpreet Gill', 'text' => 'Thanks for sharing, Baldev ji! Neem oil is indeed very effective for organic prevention.'],
                    ['author' => 'Ramesh Kumar', 'text' => 'I will try this tomorrow, my crop has similar issues.']
                ],
                'created_at' => now()->subHours(5)->toDateTimeString()
            ],
            [
                'user_id' => 'system',
                'author_name' => 'Dr. Arpan Sen',
                'author_role' => 'KVK Agronomist',
                'title' => 'Precautions for wheat harvesting under high wind warnings',
                'description' => 'Dear farmers, the meteorological department has predicted high wind speeds over Punjab in the coming 48 hours. If your wheat is 90% dry, please initiate harvesting immediately. Secure stored bags in water-resistant shelters.',
                'likes' => 34,
                'comments' => [
                    ['author' => 'Jaswant Singh', 'text' => 'Important warning! Our local cooperative group has started sharing harvester schedules to finish early.'],
                ],
                'created_at' => now()->subDays(1)->toDateTimeString()
            ],
            [
                'user_id' => 'system',
                'author_name' => 'Meera Bai',
                'author_role' => 'SHG Coordinator, Nabha',
                'title' => 'High returns from dry flower processing - collective marketing',
                'description' => 'Our SHG started dry flower craft from organic residues last month. We processed marigolds and jasmine and sold them at the district art fair. We fetched ₹12,000 profit! If any sister SHG wants training on solar dry processing, let us know!',
                'likes' => 27,
                'comments' => [],
                'created_at' => now()->subDays(2)->toDateTimeString()
            ]
        ];
        foreach ($forumData as $f) {
            ForumPost::create($f);
        }

        // 5. Clean Chat history for fresh test
        ChatbotHistory::truncate();
        ChatbotHistory::create([
            'user_id' => $user->id,
            'message' => 'Hello!',
            'response' => "Welcome Ramesh! I am your FarmTech AI Assistant. I can help you with crop fertilizer schedules, local FPO coordinates, subsidy eligibility, and disease control. Ask me anything!",
            'timestamp' => now()->subMinutes(10)->toDateTimeString()
        ]);
    }
}
