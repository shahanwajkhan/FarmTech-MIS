<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fpo;
use App\Models\FpoFarmer;
use App\Models\FpoLogistics;
use App\Models\FpoWarehouse;
use App\Models\FpoEquipment;
use App\Models\FpoOrder;
use App\Models\Pacs;
use App\Models\CropPool;
use App\Models\ReportAuditLog;
use Illuminate\Support\Facades\Auth;

class FPODashboardController extends Controller
{
    /**
     * Display the FPO/FPG Dashboard Workspace.
     */
    public function index()
    {
        $user = auth()->user();

        // 1. Get or create FPO profile for robust demo
        $fpo = Fpo::where('user_id', $user->id)->first();
        if (!$fpo) {
            $fpo = Fpo::create([
                'user_id' => $user->id,
                'organization_name' => $user->name,
                'registration_number' => 'FPO-PB-PAT-8809',
                'organization_type' => 'Farmer Producer Company (FPC)',
                'establishment_year' => 2020,
                'members_count' => 150,
                'contact_person' => 'Gurpreet Singh',
                'mobile' => $user->mobile ?? '9877011223',
                'email' => $user->email,
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
            ]);
        }

        // 2. Fetch farmers
        $farmers = FpoFarmer::all();

        // 3. Fetch logistics
        $logistics = FpoLogistics::all();

        // 4. Fetch warehouse storage
        $warehouses = FpoWarehouse::all();

        // 5. Fetch equipment hiring roster
        $equipment = FpoEquipment::all();

        // 6. Fetch wholesale marketplace orders
        $orders = FpoOrder::all();

        // 7. Calculate aggregate dashboard statistics
        $totalFarmersCount = $farmers->count();
        $activeVillagesCount = $farmers->pluck('village')->unique()->count();
        $monthlyRevenueTotal = $orders->sum('order_value');
        $cropProductionVolume = 4800; // Mock total FPO yield (Tons)
        
        // Calculate average warehouse occupancy
        $avgWarehouseUsage = 0;
        if ($warehouses->isNotEmpty()) {
            $totalCapacity = $warehouses->sum('capacity');
            $totalOccupied = $warehouses->sum('occupied_space');
            $avgWarehouseUsage = round(($totalOccupied / $totalCapacity) * 100);
        }

        $pendingOrdersCount = $orders->where('status', 'Pending')->count();

        // 8. Yield forecast expected income calculation
        $expectedIncomeEst = 120000; // ₹1.2 Lakhs

        // 9. Farmers needing support alert logic (Unique Feature ⭐)
        $unsupportedFarmers = $farmers->where('performance_score', '<', 60);

        // 10. Smart notifications priority logs
        $notifications = [
            [
                'title' => 'Cold Storage Humidity Warning',
                'body' => 'High humidity levels (87%) detected in Alpha Potato Cold Room! Spoilage Risk: HIGH.',
                'badge' => 'CRITICAL',
                'color' => 'red',
                'icon' => '🌡️',
                'message' => 'High humidity levels (87%) detected in Alpha Potato Cold Room! Spoilage Risk: HIGH.',
                'time' => '2 mins ago',
                'status' => 'Unread'
            ],
            [
                'title' => 'Lowest Cost Logistics Alert',
                'body' => 'Route scan complete: Truck Route B saves ₹1,500 on current fuel index compared to Route A.',
                'badge' => 'OPTIMIZATION',
                'color' => 'purple',
                'icon' => '🚚',
                'message' => 'Route scan complete: Truck Route B saves ₹1,500 on current fuel index compared to Route A.',
                'time' => '1 hour ago',
                'status' => 'Unread'
            ],
            [
                'title' => 'National Farmer Subsidy Deadline',
                'body' => 'SMAM Farm Mechanization subsidy forms must be submitted to district officer by May 30th!',
                'badge' => 'GOVT SCHEME',
                'color' => 'emerald',
                'icon' => '📝',
                'message' => 'SMAM Farm Mechanization subsidy forms must be submitted to district officer by May 30th!',
                'time' => '3 hours ago',
                'status' => 'Read'
            ],
            [
                'title' => 'Disease Outbreak Alert (KVK Punjab)',
                'body' => 'Yellow rust advisory issued for wheat crops in Nabha cluster. Distribute spraying supplies.',
                'badge' => 'WEATHER & CROP',
                'color' => 'amber',
                'icon' => '🦠',
                'message' => 'Yellow rust advisory issued for wheat crops in Nabha cluster. Distribute spraying supplies.',
                'time' => 'Yesterday',
                'status' => 'Read'
            ]
        ];

        // 11. Fetch PACS for Proximity Sourcing
        $pacsList = Pacs::all();
        if ($pacsList->isEmpty()) {
            $this->seedInitialPacs();
            $pacsList = Pacs::all();
        }

        // 12. Fetch all crop pools
        $cropPools = CropPool::orderBy('created_at', 'desc')->get();

        // 13. Fetch report audit logs
        $reportLogs = ReportAuditLog::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('fpo.dashboard', compact(
            'fpo', 'farmers', 'logistics', 'warehouses', 'equipment', 'orders',
            'totalFarmersCount', 'activeVillagesCount', 'monthlyRevenueTotal',
            'cropProductionVolume', 'avgWarehouseUsage', 'pendingOrdersCount',
            'expectedIncomeEst', 'unsupportedFarmers', 'notifications', 'pacsList',
            'cropPools', 'reportLogs'
        ));
    }

    /**
     * Register a new farmer.
     */
    public function addFarmer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'village' => 'required|string',
            'crop_type' => 'required|string',
            'land_area' => 'required|numeric|min:0.1',
        ]);

        $farmer = FpoFarmer::create([
            'name' => $request->name,
            'village' => $request->village,
            'crop_type' => $request->crop_type,
            'land_area' => (float) $request->land_area,
            'performance_score' => rand(52, 94), // Mock scoring
            'scheme_status' => rand(0, 1) ? 'Active' : 'Pending'
        ]);

        return response()->json([
            'status' => 'success',
            'farmer' => $farmer,
            'message' => 'Farmer registered under GreenHarvest FPO successfully!'
        ]);
    }

    /**
     * Update farmer details.
     */
    public function updateFarmer(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|string|max:255',
            'village' => 'required|string',
            'crop_type' => 'required|string',
            'land_area' => 'required|numeric|min:0.1',
        ]);

        $farmer = FpoFarmer::find($request->id);
        if (!$farmer) {
            return response()->json(['status' => 'error', 'message' => 'Farmer not found'], 404);
        }

        $farmer->update([
            'name' => $request->name,
            'village' => $request->village,
            'crop_type' => $request->crop_type,
            'land_area' => (float) $request->land_area,
        ]);

        return response()->json([
            'status' => 'success',
            'farmer' => $farmer,
            'message' => 'Farmer profile updated successfully!'
        ]);
    }

    /**
     * Delete farmer profile.
     */
    public function deleteFarmer($id)
    {
        $farmer = FpoFarmer::find($id);
        if ($farmer) {
            $farmer->delete();
            return response()->json(['status' => 'success', 'message' => 'Farmer profile deleted successfully!']);
        }
        return response()->json(['status' => 'error', 'message' => 'Farmer not found'], 404);
    }

    /**
     * Delete logistics record (cancel booking).
     */
    public function deleteLogistics($id)
    {
        $logistics = FpoLogistics::find($id);
        if ($logistics) {
            $logistics->delete();
            return response()->json(['status' => 'success', 'message' => 'Logistics shipment canceled successfully!']);
        }
        return response()->json(['status' => 'error', 'message' => 'Logistics record not found'], 404);
    }

    /**
     * Register a new rental equipment.
     */
    public function addEquipment(Request $request)
    {
        $request->validate([
            'equipment_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'location' => 'required|string',
            'owner' => 'required|string',
        ]);

        $equipment = FpoEquipment::create([
            'equipment_name' => $request->equipment_name,
            'price' => (float) $request->price,
            'location' => $request->location,
            'owner' => $request->owner,
            'availability' => 'Available'
        ]);

        return response()->json([
            'status' => 'success',
            'equipment' => $equipment,
            'message' => 'New machinery registered under cooperative pool successfully!'
        ]);
    }

    /**
     * Update equipment specifications.
     */
    public function updateEquipment(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'equipment_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'location' => 'required|string',
            'owner' => 'required|string',
        ]);

        $equipment = FpoEquipment::find($request->id);
        if (!$equipment) {
            return response()->json(['status' => 'error', 'message' => 'Equipment not found'], 404);
        }

        $equipment->update([
            'equipment_name' => $request->equipment_name,
            'price' => (float) $request->price,
            'location' => $request->location,
            'owner' => $request->owner,
        ]);

        return response()->json([
            'status' => 'success',
            'equipment' => $equipment,
            'message' => 'Equipment specifications updated successfully!'
        ]);
    }

    /**
     * Delete equipment from hiring roster.
     */
    public function deleteEquipment($id)
    {
        $equipment = FpoEquipment::find($id);
        if ($equipment) {
            $equipment->delete();
            return response()->json(['status' => 'success', 'message' => 'Equipment deleted successfully!']);
        }
        return response()->json(['status' => 'error', 'message' => 'Equipment not found'], 404);
    }

    /**
     * Reset FPO dashboard Collections back to initial demo data.
     */
    public function resetDemoData()
    {
        FpoFarmer::truncate();
        $this->seedInitialFarmers();

        FpoLogistics::truncate();
        $this->seedInitialLogistics();

        FpoEquipment::truncate();
        $this->seedInitialEquipment();

        FpoOrder::truncate();
        $this->seedInitialOrders();

        return response()->json(['status' => 'success', 'message' => 'Dashboard demo data reset successfully!']);
    }

    /**
     * Approve a wholesale marketplace order.
     */
    public function approveOrder($id)
    {
        $order = FpoOrder::find($id);
        if ($order) {
            $order->update(['status' => 'Approved']);
            return response()->json([
                'status' => 'success',
                'order' => $order,
                'message' => 'Wholesale contract approved successfully! Sourcing cycle initiated.'
            ]);
        }
        return response()->json(['status' => 'error', 'message' => 'Order not found'], 404);
    }

    /**
     * Reject a wholesale marketplace order.
     */
    public function rejectOrder($id)
    {
        $order = FpoOrder::find($id);
        if ($order) {
            $order->update(['status' => 'Rejected']);
            return response()->json([
                'status' => 'success',
                'order' => $order,
                'message' => 'Wholesale contract rejected.'
            ]);
        }
        return response()->json(['status' => 'error', 'message' => 'Order not found'], 404);
    }

    /**
     * Book a logistics truck.
     */
    public function bookLogistics(Request $request)
    {
        $request->validate([
            'vehicle' => 'required|string',
            'driver' => 'required|string',
            'route' => 'required|string',
            'delivery_date' => 'required|date'
        ]);

        // Least cost routing simulator
        $savings = [
            'Route A (Via NH-44)' => 'Route A has high toll taxes. Truck Route B saves ₹1,500 on total fuel & toll cost.',
            'Route B (Via bypass)' => 'Truck Route B is the lowest cost route, saving ₹1,500 on current fuel index!',
            'Route C (Village link road)' => 'Route C has poor road quality. Truck Route B saves ₹1,500 by reducing wear-and-tear.',
        ];

        $suggestedRoute = $savings[$request->route] ?? "Truck Route B is recommended to save ₹1,500 on total fuel index.";

        $logItem = FpoLogistics::create([
            'vehicle' => $request->vehicle,
            'driver' => $request->driver,
            'route' => $request->route,
            'delivery_date' => $request->delivery_date,
            'status' => 'Scheduled',
            'cost' => 4500.00
        ]);

        return response()->json([
            'status' => 'success',
            'logistics' => $logItem,
            'optimization_suggestion' => $suggestedRoute,
            'message' => 'Logistics shipment scheduled and optimized successfully!'
        ]);
    }

    /**
     * Machinery proximity matching.
     */
    public function findCheapestEquipment(Request $request)
    {
        $cheapest = FpoEquipment::where('availability', 'Available')
            ->orderBy('price', 'asc')
            ->first();

        return response()->json([
            'status' => 'success',
            'equipment' => $cheapest,
            'message' => 'Cheapest nearby machinery located successfully!'
        ]);
    }

    /**
     * Auto government formatted report generator payload.
     */
    public function downloadReport(Request $request)
    {
        $type = $request->input('type', 'Farmer Registration');
        $farmers = FpoFarmer::all();
        $orders = FpoOrder::all();

        $reportType = 'Farmer Roster Compliance Audit';
        $metrics = $farmers->count() . ' Registered Farmers';
        $authority = 'Patiala Sub-Division Office';
        $status = '✓ Digitally Signed';

        if ($type === 'Scheme Penetration') {
            $reportType = 'Govt Subsidy Penetration Review';
            $metrics = '92 Active Schemes';
            $authority = 'Directorate of Subsidy, Punjab';
            $status = '✓ Filed & Approved';
        } elseif ($type === 'Cooperative Sourcing') {
            $reportType = 'FPO Production Output Sheets';
            $metrics = '4,800 Tons Sourced';
            $authority = 'Grain Board Authority Punjab';
            $status = '✓ Filed & Approved';
        }

        $user = auth()->user();
        $reportHash = 'FPC-' . strtoupper(substr(md5(uniqid()), 0, 8));

        $log = ReportAuditLog::create([
            'user_id' => $user->id,
            'hash_code' => $reportHash,
            'report_type' => $reportType,
            'metrics' => $metrics,
            'authority' => $authority,
            'status' => $status,
            'created_at' => now()->toDateTimeString()
        ]);

        $payload = [
            'fpo_title' => 'GreenHarvest Farmer Producer Company (FPC)',
            'district' => 'Patiala, District Directorate of Agriculture',
            'total_farmers' => $farmers->count(),
            'revenue_reported' => '₹' . number_format($orders->sum('order_value')),
            'wheat_production_tons' => '4,800 Tons Sourced',
            'scheme_penetration_rate' => '84% Active Participation',
            'signatory' => 'Gurpreet Singh (FPC Director)',
            'report_hash' => $reportHash
        ];

        return response()->json([
            'status' => 'success',
            'payload' => $payload,
            'report' => $log,
            'message' => 'Government-formatted District Office report payload generated and logged successfully!'
        ]);
    }

    /**
     * Initial farmers data backup.
     */
    private function seedInitialFarmers()
    {
        $data = [
            ['name' => 'Amrik Singh', 'village' => 'Kalyan', 'crop_type' => 'Wheat', 'land_area' => 5.2, 'performance_score' => 84, 'scheme_status' => 'Active'],
            ['name' => 'Baldev Singh', 'village' => 'Nabha', 'crop_type' => 'Basmati Rice', 'land_area' => 3.8, 'performance_score' => 78, 'scheme_status' => 'Active'],
            ['name' => 'Ketan Sharma', 'village' => 'Kalyan', 'crop_type' => 'Wheat', 'land_area' => 6.5, 'performance_score' => 55, 'scheme_status' => 'Pending'], // low productivity
            ['name' => 'Gurmeet Kaur', 'village' => 'Bhawanigarh', 'crop_type' => 'Mustard', 'land_area' => 4.2, 'performance_score' => 92, 'scheme_status' => 'Active'],
            ['name' => 'Harbhajan Singh', 'village' => 'Kalyan', 'crop_type' => 'Wheat', 'land_area' => 2.5, 'performance_score' => 50, 'scheme_status' => 'Pending'] // low productivity
        ];

        foreach ($data as $d) {
            FpoFarmer::create($d);
        }
    }

    /**
     * Initial logistics data backup.
     */
    private function seedInitialLogistics()
    {
        $data = [
            ['vehicle' => 'Eicher Pro Truck 10.90', 'driver' => 'Jaspal Singh', 'route' => 'Route B (Via bypass)', 'delivery_date' => '2026-05-20', 'status' => 'In Transit', 'cost' => 4200.00],
            ['vehicle' => 'Tata LPT 1613', 'driver' => 'Sukhdev Singh', 'route' => 'Route A (Via NH-44)', 'delivery_date' => '2026-05-22', 'status' => 'Scheduled', 'cost' => 5500.00]
        ];

        foreach ($data as $d) {
            FpoLogistics::create($d);
        }
    }

    /**
     * Initial warehouse storages data backup.
     */
    private function seedInitialWarehouse()
    {
        $data = [
            ['warehouse_name' => 'GreenHarvest Silo Alpha (Wheat Storage)', 'capacity' => 1000, 'occupied_space' => 780, 'temperature' => 18, 'rent' => 150.00],
            ['warehouse_name' => 'Cold Storage Beta (Potato & Vegetables)', 'capacity' => 500, 'occupied_space' => 390, 'temperature' => 4, 'rent' => 300.00]
        ];

        foreach ($data as $d) {
            FpoWarehouse::create($d);
        }
    }

    /**
     * Initial equipment list backup.
     */
    private function seedInitialEquipment()
    {
        $data = [
            ['equipment_name' => 'John Deere 5050D Tractor', 'price' => 800.00, 'availability' => 'Available', 'location' => 'Kalyan Hub', 'owner' => 'GreenHarvest cooperative pool'],
            ['equipment_name' => 'Mahindra Arjun Novel Combines Harvester', 'price' => 2500.00, 'availability' => 'Available', 'location' => 'Nabha Hub', 'owner' => 'PACS Associated pool'],
            ['equipment_name' => 'DJI Agras T40 Spraying Drone', 'price' => 1200.00, 'availability' => 'Available', 'location' => 'Kalyan Hub', 'owner' => 'GreenHarvest cooperative pool'],
            ['equipment_name' => 'Swaraj 744 FE Tractor', 'price' => 750.00, 'availability' => 'Available', 'location' => 'Bhawanigarh Village', 'owner' => 'PACS Associated pool'],
            ['equipment_name' => 'Preet 987 Harvester', 'price' => 2300.00, 'availability' => 'Available', 'location' => 'Kalyan Hub', 'owner' => 'GreenHarvest cooperative pool'],
            ['equipment_name' => 'Laser Land Leveler', 'price' => 500.00, 'availability' => 'Available', 'location' => 'Nabha Hub', 'owner' => 'PACS Associated pool']
        ];

        foreach ($data as $d) {
            FpoEquipment::create($d);
        }
    }

    /**
     * Initial wholesale marketplace orders backup.
     */
    private function seedInitialOrders()
    {
        $data = [
            ['buyer_name' => 'Punjab State Grain Corporation', 'product' => 'Wheat (Premium quality)', 'quantity' => 1500, 'order_value' => 36750.00, 'status' => 'Approved'],
            ['buyer_name' => 'ITC Ashirvaad Flour Mills', 'product' => 'Sarbati Wheat', 'quantity' => 800, 'order_value' => 24000.00, 'status' => 'Pending'],
            ['buyer_name' => 'India Organic Supermarkets', 'product' => 'Basmati Rice (Aromatic)', 'quantity' => 350, 'order_value' => 45500.00, 'status' => 'Approved']
        ];

        foreach ($data as $d) {
            FpoOrder::create($d);
        }
    }

    /**
     * Initial PACS data backup for proximity sourcing.
     */
    private function seedInitialPacs()
    {
        $data = [
            ['name' => 'Kalyan Cooperative PACS Hub', 'state' => 'Punjab', 'district' => 'Patiala', 'member_count' => 1250, 'verified' => true, 'registration_year' => 1995, 'available_fertilizer_tons' => 140, 'tractor_hourly_rate' => 750],
            ['name' => 'Nabha Farmers Welfare PACS', 'state' => 'Punjab', 'district' => 'Patiala', 'member_count' => 840, 'verified' => true, 'registration_year' => 2002, 'available_fertilizer_tons' => 95, 'tractor_hourly_rate' => 700],
            ['name' => 'Bhawanigarh Village PACS Society', 'state' => 'Punjab', 'district' => 'Patiala', 'member_count' => 1100, 'verified' => true, 'registration_year' => 1998, 'available_fertilizer_tons' => 180, 'tractor_hourly_rate' => 800]
        ];

        foreach ($data as $d) {
            Pacs::create($d);
        }
    }

    /**
     * Aggregate pooled crops of a specific type into a wholesale bulk contract.
     */
    public function aggregateCrop(Request $request)
    {
        $request->validate([
            'crop_type' => 'required|string',
        ]);

        $crop = $request->crop_type;

        // Fetch pooled records
        $pooledEntries = CropPool::where('crop_type', $crop)
            ->where('status', 'Pooled')
            ->get();

        if ($pooledEntries->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => "No pending pooled records found for {$crop}."
            ], 400);
        }

        $totalQty = $pooledEntries->sum('quantity');

        // Wholesale premium prices
        $wholesalePrices = [
            'Wheat'      => 2450,
            'Rice'       => 3350,
            'Mustard'    => 5750,
            'Potatoes'   => 1650,
            'Vegetables' => 1950,
        ];

        $price = $wholesalePrices[$crop] ?? 2200;
        $totalVal = $totalQty * $price;

        // Choose a buyer name based on crop
        $buyers = [
            'Wheat'      => 'Punjab State Grain Corporation',
            'Rice'       => 'India Organic Supermarkets',
            'Mustard'    => 'ITC Ashirvaad Oil Division',
            'Potatoes'   => 'Lays Agro Procurement',
            'Vegetables' => 'FreshPicks Wholesale Markets'
        ];
        $buyerName = $buyers[$crop] ?? 'National Wholesale Food Sourcing';

        // Update pooled entries status
        foreach ($pooledEntries as $entry) {
            $entry->update(['status' => 'Aggregated & Sold']);
        }

        // Create the wholesale bulk order contract
        $order = FpoOrder::create([
            'buyer_name'  => $buyerName,
            'product'     => "Bulk Aggregated " . $crop,
            'quantity'    => $totalQty,
            'order_value' => $totalVal,
            'status'      => 'Approved',
            'created_at'  => now()->toDateTimeString()
        ]);

        return response()->json([
            'status'  => 'success',
            'order'   => $order,
            'message' => "Successfully aggregated {$totalQty} Quintals of {$crop} into a B2B Bulk Sourcing Contract valued at ₹" . number_format($totalVal) . " with {$buyerName}!"
        ]);
    }
}
