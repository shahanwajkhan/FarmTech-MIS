<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InfoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-fpo', [InfoController::class, 'fpo'])->name('about.fpo');
Route::get('/about-shg', [InfoController::class, 'shg'])->name('about.shg');
Route::get('/about-pacs', [InfoController::class, 'pacs'])->name('about.pacs');
Route::get('/cooperatives', [InfoController::class, 'cooperatives'])->name('cooperatives');

Route::get('/force-login', function () {
    $user = \App\Models\User::where('email', 'maashakti@farmtech.com')->first();
    if ($user) {
        auth()->login($user);
        return redirect('/dashboard');
    }
    return 'Maa Shakti not found';
});

Route::get('/force-login-fpo', function () {
    $user = \App\Models\User::where('email', 'greenharvest@farmtech.com')->first();
    if ($user) {
        auth()->login($user);
        return redirect('/dashboard');
    }
    return 'GreenHarvest FPO not found';
});

// Directory Routes
use App\Http\Controllers\DirectoryController;
Route::prefix('directory')->group(function () {
    Route::get('/fpo', [DirectoryController::class, 'fpo'])->name('directory.fpo');
    Route::get('/shg', [DirectoryController::class, 'shg'])->name('directory.shg');
    Route::get('/pacs', [DirectoryController::class, 'pacs'])->name('directory.pacs');
    Route::get('/cooperatives', [DirectoryController::class, 'cooperatives'])->name('directory.cooperatives');
    Route::get('/analytics', [DirectoryController::class, 'analytics'])->name('directory.analytics');
    Route::get('/{type}/{id}', [DirectoryController::class, 'profile'])->name('directory.profile');
    Route::get('/api/districts/{state}', [DirectoryController::class, 'districts']);
});

// Auth & Registration System
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\FPOController;
use App\Http\Controllers\SHGController;
use App\Http\Controllers\FarmerDashboardController;
use App\Http\Controllers\SHGDashboardController;
use App\Http\Controllers\FPODashboardController;

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register/select-role', [AuthController::class, 'selectRole'])->name('register.select');

Route::get('/register/farmer', [FarmerController::class, 'create'])->name('register.farmer');
Route::post('/register/farmer', [FarmerController::class, 'store']);

Route::get('/register/shg', [SHGController::class, 'create'])->name('register.shg');
Route::post('/register/shg', [SHGController::class, 'store']);

Route::get('/register/fpo', [FPOController::class, 'create'])->name('register.fpo');
Route::post('/register/fpo', [FPOController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        if ($role === 'farmer') {
            return redirect()->route('farmer.dashboard');
        } elseif ($role === 'shg' || $role === 'shg_manager') {
            return redirect()->route('shg.dashboard');
        } elseif ($role === 'fpo' || $role === 'fpo_manager') {
            return redirect()->route('fpo.dashboard');
        }
        return view('dashboard');
    })->name('dashboard');

    // Smart FPO/FPG Dashboard Routes
    Route::get('/fpo/dashboard', [FPODashboardController::class, 'index'])->name('fpo.dashboard');
    Route::post('/fpo/farmer/add', [FPODashboardController::class, 'addFarmer'])->name('fpo.farmer.add');
    Route::post('/fpo/farmer/update', [FPODashboardController::class, 'updateFarmer'])->name('fpo.farmer.update');
    Route::post('/fpo/farmer/delete/{id}', [FPODashboardController::class, 'deleteFarmer'])->name('fpo.farmer.delete');
    Route::post('/fpo/logistics/book', [FPODashboardController::class, 'bookLogistics'])->name('fpo.logistics.book');
    Route::post('/fpo/logistics/delete/{id}', [FPODashboardController::class, 'deleteLogistics'])->name('fpo.logistics.delete');
    Route::post('/fpo/equipment/add', [FPODashboardController::class, 'addEquipment'])->name('fpo.equipment.add');
    Route::post('/fpo/equipment/update', [FPODashboardController::class, 'updateEquipment'])->name('fpo.equipment.update');
    Route::post('/fpo/equipment/delete/{id}', [FPODashboardController::class, 'deleteEquipment'])->name('fpo.equipment.delete');
    Route::post('/fpo/equipment/rent', [FPODashboardController::class, 'findCheapestEquipment'])->name('fpo.equipment.rent');
    Route::post('/fpo/reports/download', [FPODashboardController::class, 'downloadReport'])->name('fpo.reports.download');
    Route::post('/fpo/reset-demo', [FPODashboardController::class, 'resetDemoData'])->name('fpo.reset-demo');
    Route::post('/fpo/order/approve/{id}', [FPODashboardController::class, 'approveOrder'])->name('fpo.order.approve');
    Route::post('/fpo/order/reject/{id}', [FPODashboardController::class, 'rejectOrder'])->name('fpo.order.reject');
    Route::post('/fpo/aggregate-crop', [FPODashboardController::class, 'aggregateCrop'])->name('fpo.crop.aggregate');
    // Smart SHG Dashboard Routes
    Route::get('/shg/dashboard', [SHGDashboardController::class, 'index'])->name('shg.dashboard');
    Route::post('/shg/product/add', [SHGDashboardController::class, 'addProduct'])->name('shg.product.add');
    Route::post('/shg/inventory/update', [SHGDashboardController::class, 'updateInventory'])->name('shg.inventory.update');
    Route::post('/shg/incubation/brand', [SHGDashboardController::class, 'generateBrandName'])->name('shg.incubation.brand');
    Route::post('/shg/training/quiz', [SHGDashboardController::class, 'completeQuiz'])->name('shg.training.quiz');
    Route::post('/shg/buyer/nearby', [SHGDashboardController::class, 'findNearbyBuyers'])->name('shg.buyer.nearby');
    Route::post('/shg/procure-fpo', [SHGDashboardController::class, 'procureFromFpo'])->name('shg.procure-fpo');

    // Smart Farmer Dashboard Routes
    Route::get('/farmer/dashboard', [FarmerDashboardController::class, 'index'])->name('farmer.dashboard');
    Route::post('/farmer/chatbot/message', [FarmerDashboardController::class, 'chatbotMessage'])->name('farmer.chatbot.message');
    Route::post('/farmer/forum/post', [FarmerDashboardController::class, 'createForumPost'])->name('farmer.forum.post');
    Route::post('/farmer/forum/like/{id}', [FarmerDashboardController::class, 'likeForumPost'])->name('farmer.forum.like');
    Route::post('/farmer/soil/test', [FarmerDashboardController::class, 'testSoil'])->name('farmer.soil.test');
    Route::post('/farmer/insurance/apply', [FarmerDashboardController::class, 'applyInsurance'])->name('farmer.insurance.apply');
    Route::get('/farmer/mandi/prices', [FarmerDashboardController::class, 'getRealtimeMandiPrices'])->name('farmer.mandi.prices');
    Route::post('/farmer/schemes/regenerate-ai', [FarmerDashboardController::class, 'regenerateAISchemes'])->name('farmer.schemes.regenerate');
    Route::post('/farmer/schemes/apply', [FarmerDashboardController::class, 'applyScheme'])->name('farmer.scheme.apply');
    Route::post('/farmer/profile/update', [FarmerDashboardController::class, 'updateProfile'])->name('farmer.profile.update');
    Route::post('/farmer/report/log', [FarmerDashboardController::class, 'logReportDownload'])->name('farmer.report.log');
    Route::post('/farmer/crop-pool', [FarmerDashboardController::class, 'poolCrop'])->name('farmer.crop.pool');
});

Route::get('/debug-db', function () {
    try {
        DB::connection('mongodb')->getMongoClient()->listDatabases();
        return response()->json(['status' => 'success', 'message' => 'Connected to MongoDB successfully!']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    }
});

