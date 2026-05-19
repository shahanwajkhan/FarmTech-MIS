<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shg;
use App\Models\ShgProduct;
use App\Models\ShgInventory;
use App\Models\ShgTraining;
use App\Models\ShgMarketplace;
use App\Models\FpoOrder;
use Illuminate\Support\Facades\Auth;

class SHGDashboardController extends Controller
{
    /**
     * Display the Smart SHG Dashboard.
     */
    public function index()
    {
        $user = auth()->user();

        // 1. Get or create SHG Profile for robust demo
        $shg = Shg::where('user_id', $user->id)->first();
        if (!$shg) {
            $shg = Shg::create([
                'user_id' => $user->id,
                'shg_name' => $user->name,
                'registration_number' => 'SHG-PB-PAT-4901',
                'formation_year' => 2021,
                'members_count' => 12,
                'shg_category' => 'Food Processing & Preservation',
                'leader_name' => 'Sunita Devi',
                'mobile' => $user->mobile ?? '9812300445',
                'email' => $user->email,
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
            ]);
        }

        // 2. Fetch SHG Products
        $products = ShgProduct::all();
        if ($products->isEmpty()) {
            $this->seedInitialProducts();
            $products = ShgProduct::all();
        }

        // 3. Fetch Inventory
        $inventory = ShgInventory::all();
        if ($inventory->isEmpty()) {
            $this->seedInitialInventory();
            $inventory = ShgInventory::all();
        }

        // 4. Fetch Training Courses
        $trainingList = ShgTraining::all();
        if ($trainingList->isEmpty()) {
            $this->seedInitialTraining();
            $trainingList = ShgTraining::all();
        }

        // 5. Fetch Buyers
        $buyersList = ShgMarketplace::all();
        if ($buyersList->isEmpty()) {
            $this->seedInitialMarketplace();
            $buyersList = ShgMarketplace::all();
        }

        // 6. Pre-calculate metrics
        $totalProductsCount = $products->count();
        $monthlySalesTotal = 48200; // Mock static sales total
        $buyerRequestsCount = $buyersList->count();
        $pendingOrdersCount = 4;
        
        // Calculate average efficiency score
        $efficiencyScore = round($inventory->avg('efficiency_score') ?? 87);

        // 7. Prepare Leaderboard List
        $leaderboard = [
            ['rank' => 1, 'name' => 'Maa Shakti SHG (You)', 'sales' => 48200, 'sold' => 340, 'current' => true],
            ['rank' => 2, 'name' => 'Green Harvest SHG', 'sales' => 41000, 'sold' => 280, 'current' => false],
            ['rank' => 3, 'name' => 'Guru Nanak Women Group', 'sales' => 36500, 'sold' => 220, 'current' => false],
            ['rank' => 4, 'name' => 'Baba Nanak Organic SHG', 'sales' => 32000, 'sold' => 190, 'current' => false]
        ];

        // 8. Prepare WhatsApp Alerts
        $notifications = [
            [
                'type' => 'message',
                'icon' => '💬',
                'message' => 'Sarabjit Singh (Patiala Wholesale): Interested in 50 jars of Mango Pickle. Can you supply by Thursday?',
                'time' => '10 mins ago',
                'status' => 'Unread'
            ],
            [
                'type' => 'order',
                'icon' => '📦',
                'message' => 'New bulk order placed! 15kg Organic Paneer by Royal Kitchens Restaurant.',
                'time' => '1 hour ago',
                'status' => 'Unread'
            ],
            [
                'type' => 'market',
                'icon' => '📈',
                'message' => 'Tomato sauce prices increased by 8% in wholesale mandi index!',
                'time' => '3 hours ago',
                'status' => 'Read'
            ],
            [
                'type' => 'scheme',
                'icon' => '📢',
                'message' => 'Apply for Nabard Women Entrepreneurship Loan scheme before May 30th!',
                'time' => '1 day ago',
                'status' => 'Read'
            ]
        ];

        return view('shg.dashboard', compact(
            'shg', 'products', 'inventory', 'trainingList', 'buyersList', 
            'totalProductsCount', 'monthlySalesTotal', 'buyerRequestsCount', 
            'pendingOrdersCount', 'efficiencyScore', 'leaderboard', 'notifications'
        ));
    }

    /**
     * Publish a new processed value-added product.
     */
    public function addProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'raw_product' => 'required|string',
            'processed_product' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'packaging' => 'required|string',
        ]);

        // Smart dynamic value addition suggestor
        $suggestions = [
            'Milk' => 'Raw milk can be processed into high-grade organic Ghee or Mozzarella cheese to boost profit margins by 65%.',
            'Tomato' => 'Tomatoes can be dehydrated into sundried tomato flakes, fetching ₹450/kg compared to raw prices.',
            'Wheat' => 'Wheat can be milled into multi-grain healthy diabetic flour for high-end urban markets.',
            'Potato' => 'Potatoes can be processed into zero-chemical dehydrated potato chips for premium school-snack branding.',
        ];
        
        $aiSuggest = $suggestions[$request->raw_product] ?? "Your raw agricultural crop can be packaged into boutique organic bags to increase sales margins by 45%.";

        // Create product record in MongoDB
        $product = ShgProduct::create([
            'product_name' => $request->product_name,
            'raw_product' => $request->raw_product,
            'processed_product' => $request->processed_product,
            'price' => (float) $request->price,
            'quantity' => (int) $request->quantity,
            'packaging' => $request->packaging,
            'buyer_interest' => rand(12, 35) . ' Buyers'
        ]);

        // Add corresponding inventory stock automatically to guarantee sync
        ShgInventory::create([
            'product_id' => $product->id,
            'raw_stock' => rand(150, 400) . ' kg',
            'packaging_stock' => rand(200, 500) . ' Units',
            'production_quantity' => $request->quantity,
            'efficiency_score' => rand(82, 95)
        ]);

        return response()->json([
            'status' => 'success',
            'product' => $product,
            'suggestion' => $aiSuggest,
            'message' => 'Processed value-added product successfully listed!'
        ]);
    }

    /**
     * Update an existing inventory batch.
     */
    public function updateInventory(Request $request)
    {
        $request->validate([
            'inventory_id' => 'required|string',
            'raw_stock' => 'required|numeric|min:0',
            'packaging_stock' => 'required|numeric|min:0',
            'production_quantity' => 'required|numeric|min:0',
        ]);

        $inv = ShgInventory::find($request->inventory_id);
        if (!$inv) {
            return response()->json([
                'status' => 'error',
                'message' => 'Inventory batch not found.'
            ], 404);
        }

        $rawNum = (float) $request->raw_stock;
        $prodNum = (float) $request->production_quantity;
        $efficiency = $rawNum > 0 ? min(100, round(($prodNum / $rawNum) * 100)) : 87;

        $inv->update([
            'raw_stock' => $request->raw_stock . ' kg',
            'packaging_stock' => $request->packaging_stock . ' Units',
            'production_quantity' => (int) $request->production_quantity,
            'efficiency_score' => $efficiency
        ]);

        $avgEfficiency = round(ShgInventory::all()->avg('efficiency_score') ?? 87);

        return response()->json([
            'status' => 'success',
            'inventory' => [
                'id' => $inv->id,
                'raw_stock' => $inv->raw_stock,
                'packaging_stock' => $inv->packaging_stock,
                'production_quantity' => $inv->production_quantity,
                'efficiency_score' => $inv->efficiency_score,
                'status_label' => (intval($inv->packaging_stock) < 250) ? '🚨 Action Required' : '✅ Stock Optimal',
                'status_class' => (intval($inv->packaging_stock) < 250) ? 'bg-red-100 text-red-700' : 'bg-emerald-100 text-emerald-700'
            ],
            'avg_efficiency' => $avgEfficiency,
            'message' => 'Inventory batch successfully updated!'
        ]);
    }

    /**
     * Brand Name Generator Incubator using AJAX.
     */
    public function generateBrandName(Request $request)
    {
        $request->validate([
            'raw_material' => 'required|string',
            'theme' => 'required|string',
        ]);

        $raw = trim($request->raw_material);
        $theme = trim($request->theme);
        $brandNames = [];

        if (strtolower($theme) === 'organic') {
            $brandNames = [
                'FreshRoots ' . $raw,
                'PureNature ' . $raw . 's',
                'Maa Shakti Organics',
                'Kalyan Fields Pure'
            ];
        } elseif (strtolower($theme) === 'traditional') {
            $brandNames = [
                'Daadi Maa Recipes',
                'VedicGrains ' . $raw,
                'RuralHeritage Foods',
                'Maa Shakti Traditional'
            ];
        } else {
            $brandNames = [
                'NutriShield ' . $raw,
                'FreshPack Elite',
                'SmartHarvest Foods',
                'Maa Shakti Premium'
            ];
        }

        return response()->json([
            'status' => 'success',
            'suggestions' => $brandNames
        ]);
    }

    /**
     * Complete Skill Certification quiz.
     */
    public function completeQuiz(Request $request)
    {
        $request->validate([
            'course_id' => 'required|string',
            'answers' => 'required|array'
        ]);

        // Simplistic quiz checker
        $score = 0;
        foreach ($request->answers as $ans) {
            if ($ans === 'yes' || $ans === 'true' || $ans === 'b' || $ans === 'c') {
                $score++;
            }
        }

        $passed = $score >= 2; // Simple pass criteria

        return response()->json([
            'status' => 'success',
            'passed' => $passed,
            'score' => $score,
            'certificate_code' => $passed ? 'CERT-SHG-' . uppercase(uniqid()) : null
        ]);
    }

    /**
     * Location-based nearby buyer matching.
     */
    public function findNearbyBuyers(Request $request)
    {
        $buyers = ShgMarketplace::all();
        if ($buyers->isEmpty()) {
            $this->seedInitialMarketplace();
            $buyers = ShgMarketplace::all();
        }

        return response()->json([
            'status' => 'success',
            'buyers' => $buyers
        ]);
    }

    /**
     * Sourcing raw ingredients in bulk from FPO.
     */
    public function procureFromFpo(Request $request)
    {
        $request->validate([
            'crop' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'fpo_name' => 'required|string'
        ]);

        // standard pricing indexes per quintal (₹)
        $prices = [
            'Wheat' => 2275.00,
            'Milk' => 4500.00,
            'Potato' => 1500.00,
            'Mustard' => 5400.00,
            'Tomato' => 1800.00
        ];

        $crop = $request->crop;
        $pricePerQuintal = $prices[$crop] ?? 2000.00;
        $orderValue = (float) $request->quantity * $pricePerQuintal;

        $shgName = auth()->user()->name ?? 'Maa Shakti SHG';

        $order = FpoOrder::create([
            'buyer_name' => $shgName,
            'product' => $crop . ' (Bulk Sourcing)',
            'quantity' => (float) $request->quantity,
            'order_value' => $orderValue,
            'status' => 'Pending'
        ]);

        return response()->json([
            'status' => 'success',
            'order' => $order,
            'message' => 'Procurement request submitted to ' . $request->fpo_name . ' successfully! Contract value: ₹' . number_format($orderValue, 2)
        ]);
    }

    /**
     * Initial products seeder backup.
     */
    private function seedInitialProducts()
    {
        $data = [
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

        foreach ($data as $d) {
            ShgProduct::create($d);
        }
    }

    /**
     * Initial inventory stock data seeder backup.
     */
    private function seedInitialInventory()
    {
        $prods = ShgProduct::all();
        if ($prods->isEmpty()) {
            $this->seedInitialProducts();
            $prods = ShgProduct::all();
        }

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
    }

    /**
     * Initial training classes seeder backup.
     */
    private function seedInitialTraining()
    {
        $data = [
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

        foreach ($data as $d) {
            ShgTraining::create($d);
        }
    }

    /**
     * Initial marketplace buyers data backup.
     */
    private function seedInitialMarketplace()
    {
        $data = [
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
            ],
            [
                'buyer_name' => 'Kisan Retail Outlets',
                'product_interest' => 'Sun-dried Tomatoes & Paste',
                'location' => 'Chandigarh Highway (12.5 km away)',
                'contact' => '+91-99880-11223'
            ],
            [
                'buyer_name' => 'Aura Boutique Hotels',
                'product_interest' => 'Desi Ghee & Clarified Butter',
                'location' => 'Industrial Area, Ludhiana (45 km away)',
                'contact' => '+91-98765-99887'
            ],
            [
                'buyer_name' => 'Green Earth Exporters',
                'product_interest' => 'Multi-grain Flour & Millet Snacks',
                'location' => 'Amritsar Trade Center (110 km away)',
                'contact' => '+91-91234-56789'
            ]
        ];

        foreach ($data as $d) {
            ShgMarketplace::create($d);
        }
    }
}
