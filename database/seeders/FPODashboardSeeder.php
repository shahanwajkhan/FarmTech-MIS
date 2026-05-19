<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Fpo;
use App\Models\FpoFarmer;
use App\Models\FpoLogistics;
use App\Models\FpoWarehouse;
use App\Models\FpoEquipment;
use App\Models\FpoOrder;
use App\Models\CropPool;
use App\Models\ReportAuditLog;
use Illuminate\Support\Facades\Hash;

class FPODashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create or update GreenHarvest FPO (FPO User)
        $user = User::where('email', 'greenharvest@farmtech.com')->first();
        if (!$user) {
            $user = User::create([
                'name' => 'GreenHarvest FPO',
                'email' => 'greenharvest@farmtech.com',
                'mobile' => '9877011223',
                'password' => Hash::make('password'),
                'role' => 'fpo',
                'status' => 'active',
                'profile_image' => null,
            ]);
        } else {
            $user->update([
                'role' => 'fpo',
                'status' => 'active'
            ]);
        }

        // 2. Create or update linked Fpo profile
        $fpo = Fpo::where('user_id', $user->id)->first();
        $fpoData = [
            'user_id' => $user->id,
            'organization_name' => 'GreenHarvest FPO',
            'registration_number' => 'FPO-PB-PAT-8809',
            'organization_type' => 'Farmer Producer Company (FPC)',
            'establishment_year' => 2020,
            'members_count' => 150,
            'contact_person' => 'Gurpreet Singh',
            'mobile' => '9877011223',
            'email' => 'greenharvest@farmtech.com',
            'state' => 'Punjab',
            'district' => 'Patiala',
            'village' => 'Kalyan',
            'address' => 'Grain Sourcing Hub, Kalyan Road, Patiala',
            'pincode' => '147001',
            'products' => 'Wheat, Basmati Rice, Mustard Oil',
            'business_activity' => 'Grain Procurement, Cold Storage & Tractor Custom Hiring',
            'bank_name' => 'State Bank of India',
            'account_number' => '40291002345',
            'ifsc_code' => 'SBIN0001234',
            'women_led' => 'No',
            'government_registered' => 'Yes',
            'organic_certified' => 'Yes'
        ];

        if (!$fpo) {
            Fpo::create($fpoData);
        } else {
            $fpo->update($fpoData);
        }

        // 3. Clean and seed Farmers
        FpoFarmer::truncate();
        $farmersData = [
            ['name' => 'Amrik Singh', 'village' => 'Kalyan', 'crop_type' => 'Wheat', 'land_area' => 5.2, 'performance_score' => 84, 'scheme_status' => 'Active'],
            ['name' => 'Baldev Singh', 'village' => 'Nabha', 'crop_type' => 'Basmati Rice', 'land_area' => 3.8, 'performance_score' => 78, 'scheme_status' => 'Active'],
            ['name' => 'Ketan Sharma', 'village' => 'Kalyan', 'crop_type' => 'Wheat', 'land_area' => 6.5, 'performance_score' => 55, 'scheme_status' => 'Pending'],
            ['name' => 'Gurmeet Kaur', 'village' => 'Bhawanigarh', 'crop_type' => 'Mustard', 'land_area' => 4.2, 'performance_score' => 92, 'scheme_status' => 'Active'],
            ['name' => 'Harbhajan Singh', 'village' => 'Kalyan', 'crop_type' => 'Wheat', 'land_area' => 2.5, 'performance_score' => 50, 'scheme_status' => 'Pending']
        ];
        foreach ($farmersData as $fd) {
            FpoFarmer::create($fd);
        }

        // 4. Clean and seed Logistics
        FpoLogistics::truncate();
        $logisticsData = [
            ['vehicle' => 'Eicher Pro Truck 10.90', 'driver' => 'Jaspal Singh', 'route' => 'Route B (Via bypass)', 'delivery_date' => '2026-05-20', 'status' => 'In Transit', 'cost' => 4200.00],
            ['vehicle' => 'Tata LPT 1613', 'driver' => 'Sukhdev Singh', 'route' => 'Route A (Via NH-44)', 'delivery_date' => '2026-05-22', 'status' => 'Scheduled', 'cost' => 5500.00]
        ];
        foreach ($logisticsData as $ld) {
            FpoLogistics::create($ld);
        }

        // 5. Clean and seed Warehouse
        FpoWarehouse::truncate();
        $warehouseData = [
            ['warehouse_name' => 'GreenHarvest Silo Alpha (Wheat Storage)', 'capacity' => 1000, 'occupied_space' => 780, 'temperature' => 18, 'rent' => 150.00],
            ['warehouse_name' => 'Cold Storage Beta (Potato & Vegetables)', 'capacity' => 500, 'occupied_space' => 390, 'temperature' => 4, 'rent' => 300.00]
        ];
        foreach ($warehouseData as $wd) {
            FpoWarehouse::create($wd);
        }

        // 6. Clean and seed Equipment
        FpoEquipment::truncate();
        $equipmentData = [
            ['equipment_name' => 'John Deere 5050D Tractor', 'price' => 800.00, 'availability' => 'Available', 'location' => 'Kalyan Hub', 'owner' => 'GreenHarvest cooperative pool'],
            ['equipment_name' => 'Mahindra Arjun Novel Combines Harvester', 'price' => 2500.00, 'availability' => 'Available', 'location' => 'Nabha Hub', 'owner' => 'PACS Associated pool'],
            ['equipment_name' => 'DJI Agras T40 Spraying Drone', 'price' => 1200.00, 'availability' => 'Available', 'location' => 'Kalyan Hub', 'owner' => 'GreenHarvest cooperative pool']
        ];
        foreach ($equipmentData as $ed) {
            FpoEquipment::create($ed);
        }

        // 7. Clean and seed Orders
        FpoOrder::truncate();
        $ordersData = [
            ['buyer_name' => 'Punjab State Grain Corporation', 'product' => 'Wheat (Premium quality)', 'quantity' => 1500, 'order_value' => 36750.00, 'status' => 'Approved'],
            ['buyer_name' => 'ITC Ashirvaad Flour Mills', 'product' => 'Sarbati Wheat', 'quantity' => 800, 'order_value' => 24000.00, 'status' => 'Pending'],
            ['buyer_name' => 'India Organic Supermarkets', 'product' => 'Basmati Rice (Aromatic)', 'quantity' => 350, 'order_value' => 45500.00, 'status' => 'Approved']
        ];
        foreach ($ordersData as $od) {
            FpoOrder::create($od);
        }

        // 8. Seed Crop Sourcing Pools
        CropPool::truncate();
        $cropPoolsData = [
            ['farmer_name' => 'Amrik Singh', 'crop_type' => 'Wheat', 'quantity' => 45, 'unit' => 'Quintals', 'price_per_unit' => 2275, 'total_value' => 45 * 2275, 'status' => 'Pooled', 'created_at' => now()->subDays(3)->toDateTimeString()],
            ['farmer_name' => 'Baldev Singh', 'crop_type' => 'Rice', 'quantity' => 30, 'unit' => 'Quintals', 'price_per_unit' => 3100, 'total_value' => 30 * 3100, 'status' => 'Pooled', 'created_at' => now()->subDays(4)->toDateTimeString()],
            ['farmer_name' => 'Ketan Sharma', 'crop_type' => 'Wheat', 'quantity' => 60, 'unit' => 'Quintals', 'price_per_unit' => 2275, 'total_value' => 60 * 2275, 'status' => 'Pooled', 'created_at' => now()->subDays(2)->toDateTimeString()],
            ['farmer_name' => 'Gurmeet Kaur', 'crop_type' => 'Mustard', 'quantity' => 25, 'unit' => 'Quintals', 'price_per_unit' => 5400, 'total_value' => 25 * 5400, 'status' => 'Pooled', 'created_at' => now()->subDays(5)->toDateTimeString()],
            ['farmer_name' => 'Harbhajan Singh', 'crop_type' => 'Wheat', 'quantity' => 20, 'unit' => 'Quintals', 'price_per_unit' => 2275, 'total_value' => 20 * 2275, 'status' => 'Pooled', 'created_at' => now()->subDays(1)->toDateTimeString()]
        ];
        foreach ($cropPoolsData as $cpd) {
            CropPool::create($cpd);
        }

        // 9. Seed Report Audit Logs for FPO
        ReportAuditLog::truncate();
        $reportsData = [
            [
                'user_id' => $user->id,
                'hash_code' => 'FPC-ROSTER-664B',
                'report_type' => 'Farmer Roster Compliance Audit',
                'metrics' => '150 Registered Farmers',
                'authority' => 'Patiala Sub-Division Office',
                'status' => '✓ Digitally Signed',
                'created_at' => now()->subDays(1)->toDateTimeString()
            ],
            [
                'user_id' => $user->id,
                'hash_code' => 'FPC-SUB-779D',
                'report_type' => 'Govt Subsidy Penetration Review',
                'metrics' => '92 Active Schemes',
                'authority' => 'Directorate of Subsidy, Punjab',
                'status' => '✓ Filed & Approved',
                'created_at' => now()->subDays(4)->toDateTimeString()
            ],
            [
                'user_id' => $user->id,
                'hash_code' => 'FPC-PROD-990A',
                'report_type' => 'FPO Production Output Sheets',
                'metrics' => '4,800 Tons Sourced',
                'authority' => 'Grain Board Authority Punjab',
                'status' => '✓ Filed & Approved',
                'created_at' => now()->subDays(9)->toDateTimeString()
            ]
        ];
        foreach ($reportsData as $rd) {
            ReportAuditLog::create($rd);
        }
    }
}
