<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Shg;
use App\Models\ShgProduct;
use App\Models\ShgInventory;
use App\Models\ShgTraining;
use App\Models\ShgMarketplace;
use Illuminate\Support\Facades\Hash;

class SHGDashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create or update Maa Shakti SHG (SHG User)
        $user = User::where('email', 'maashakti@farmtech.com')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'Maa Shakti SHG',
                'email' => 'maashakti@farmtech.com',
                'mobile' => '9812300445',
                'password' => Hash::make('password'),
                'role' => 'shg',
                'status' => 'active',
                'profile_image' => null,
            ]);
        } else {
            $user->update([
                'role' => 'shg',
                'status' => 'active'
            ]);
        }

        // 2. Create or update Shg profile
        $shg = Shg::where('user_id', $user->id)->first();
        $shgData = [
            'user_id' => $user->id,
            'shg_name' => 'Maa Shakti SHG',
            'registration_number' => 'SHG-PB-PAT-4901',
            'formation_year' => 2021,
            'members_count' => 12,
            'shg_category' => 'Food Processing & Preservation',
            'leader_name' => 'Sunita Devi',
            'mobile' => '9812300445',
            'email' => 'maashakti@farmtech.com',
            'state' => 'Punjab',
            'district' => 'Patiala',
            'village' => 'Kalyan',
            'address' => 'Gali No. 3, Near Panchayat Ghar, Kalyan',
            'pincode' => '147001',
            'main_activity' => 'Organic Pickles, Paneer, and Flour Processing',
            'bank_linkage' => 'Active',
            'bank_name' => 'State Bank of India',
            'account_number' => '39281002345',
            'ifsc_code' => 'SBIN0001234',
            'women_led' => 'Yes',
            'government_registered' => 'Yes',
            'training_completed' => 'Yes'
        ];

        if (!$shg) {
            Shg::create($shgData);
        } else {
            $shg->update($shgData);
        }

        // 3. Clean and seed Products
        ShgProduct::truncate();
        $productsData = [
            [
                'product_name' => 'Maa Shakti Mango Pickle',
                'raw_product' => 'Tomato',
                'processed_product' => 'Pickle',
                'price' => 150.00,
                'quantity' => 120,
                'packaging' => 'Glass jars, customized labeling',
                'buyer_interest' => '24 Buyers'
            ],
            [
                'product_name' => 'Premium Paneer',
                'raw_product' => 'Milk',
                'processed_product' => 'Paneer',
                'price' => 320.00,
                'quantity' => 45,
                'packaging' => 'Vacuum sealed bags, branding sticker',
                'buyer_interest' => '18 Buyers'
            ],
            [
                'product_name' => 'Shakti Organic Wheat Flour',
                'raw_product' => 'Wheat',
                'processed_product' => 'Flour',
                'price' => 65.00,
                'quantity' => 250,
                'packaging' => 'Decomposed paper bags, eco-friendly branding',
                'buyer_interest' => '15 Buyers'
            ]
        ];
        foreach ($productsData as $p) {
            ShgProduct::create($p);
        }

        // 4. Clean and seed Inventory
        ShgInventory::truncate();
        $prods = ShgProduct::all();
        $scores = [87, 92, 85];
        foreach ($prods as $index => $p) {
            ShgInventory::create([
                'product_id' => $p->id,
                'raw_stock' => (200 + $index * 50) . ' kg',
                'packaging_stock' => (300 + $index * 20) . ' Units',
                'production_quantity' => $p->quantity,
                'efficiency_score' => $scores[$index % 3]
            ]);
        }

        // 5. Clean and seed Training courses
        ShgTraining::truncate();
        $trainingData = [
            [
                'title' => 'FSSAI Food Packaging & Canning Standards',
                'video_link' => '#',
                'quiz' => ['Q1: Is vacuum sealing mandatory for dairy products? (Yes/No)', 'Q2: What is optimal humidity level?'],
                'certificate' => 'FSSAI Packaging Specialist Certificate'
            ],
            [
                'title' => 'Boutique Branding & Digital Marketing for Rural Artisans',
                'video_link' => '#',
                'quiz' => ['Q1: Can we use QR codes on paper bags? (Yes/No)', 'Q2: Best social channel?'],
                'certificate' => 'NABARD Brand Consultant Certificate'
            ],
            [
                'title' => 'Mango & Tomato Pulp Preservatives & Canning Techniques',
                'video_link' => '#',
                'quiz' => ['Q1: Do we use sodium benzoate for tomato ketchup? (Yes/No)', 'Q2: Boiling point?'],
                'certificate' => 'KVK Processing Master Certificate'
            ]
        ];
        foreach ($trainingData as $t) {
            ShgTraining::create($t);
        }

        // 6. Clean and seed Marketplace
        ShgMarketplace::truncate();
        $marketplaceData = [
            [
                'buyer_name' => 'Patiala Food Wholesalers',
                'product_interest' => 'Organic Mango Pickles',
                'location' => 'Patiala Grain Market (0.8 km away)',
                'contact' => '+91-98440-12345'
            ],
            [
                'buyer_name' => 'DailyFresh Organic Supermarket',
                'product_interest' => 'Premium Vacuum Sealed Paneer',
                'location' => 'Nabha Road Shopping Center (2.3 km away)',
                'contact' => '+91-98770-55667'
            ],
            [
                'buyer_name' => 'Royal Kitchens Restaurant Group',
                'product_interest' => 'Organic Wheat Flour & Grains',
                'location' => 'Patiala Bypass Junction (4.1 km away)',
                'contact' => '+91-94430-88990'
            ]
        ];
        foreach ($marketplaceData as $m) {
            ShgMarketplace::create($m);
        }
    }
}
