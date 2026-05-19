@extends('layouts.app')

@section('content')
<div class="bg-slate-50 min-h-screen text-slate-800 antialiased relative">
    
    <!-- FPO Glassmorphic Sidebar -->
    <x-fpo-sidebar />

    <!-- Main Workspace Container -->
    <div class="lg:pl-72 min-h-screen flex flex-col transition-all duration-300">
        
        <!-- Top Navbar -->
        <nav class="sticky top-0 z-30 bg-white/95 backdrop-blur-xl border-b border-slate-100 px-6 py-4 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        Welcome Back, {{ auth()->user()->name ?? 'GreenHarvest FPO' }} 👋
                    </h1>
                    <p class="text-xs font-semibold text-slate-500">Patiala District Cooperative Alliance • 150 Registered Farmers</p>
                </div>
            </div>

            <!-- Navbar Actions -->
            <div class="flex items-center gap-4 relative">
                
                <!-- Live FPO Stats Badge -->
                <div class="hidden md:flex items-center gap-2.5 px-4 py-2 bg-gradient-to-r from-emerald-500/10 to-teal-500/10 border border-emerald-100 rounded-full text-xs font-bold text-emerald-800">
                    <span class="h-2 w-2 bg-emerald-500 rounded-full animate-pulse"></span>
                    <span>Tractor Pool: 3 Available • Silos Optimal</span>
                </div>

                <!-- Notifications Bell Dropdown container -->
                <div class="relative inline-block text-left">
                    <button onclick="toggleNavbarDropdown('fpo-notifications-dropdown', event)" class="p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-600 border border-slate-100 transition-colors focus:outline-none relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-1 right-1 flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                        </span>
                    </button>

                    <!-- Notifications Dropdown Overlay -->
                    <div id="fpo-notifications-dropdown" class="absolute right-0 mt-3.5 w-96 bg-white border border-slate-100 shadow-2xl rounded-[2rem] p-5 hidden z-50 transform origin-top-right transition-all duration-200">
                        <div class="flex items-center justify-between pb-3.5 border-b border-slate-50 mb-3.5">
                            <div class="text-left">
                                <h3 class="text-xs font-black text-slate-800">Alerts &amp; Cooperative Logs</h3>
                                <p class="text-[9px] text-slate-400 font-bold">Linked to District SMS Gateway</p>
                            </div>
                            <span class="px-3 py-1 bg-red-50 text-red-600 rounded-full font-black text-[10px] uppercase tracking-wider border border-red-100 whitespace-nowrap">{{ count($notifications) }} New</span>
                        </div>
                        <div class="space-y-3 max-h-72 overflow-y-auto pr-1 no-scrollbar">
                            @foreach($notifications as $notif)
                                <div class="p-3.5 bg-slate-50/50 hover:bg-slate-50 border border-slate-100 rounded-2xl flex items-start gap-3.5 transition-all duration-200 cursor-pointer">
                                    <div class="w-11 h-11 rounded-2xl bg-white border border-slate-100 flex items-center justify-center text-xl flex-shrink-0 shadow-sm select-none">{{ $notif['icon'] }}</div>
                                    <div class="min-w-0 flex-1 text-left pt-0.5">
                                        <p class="font-black text-xs text-slate-700 leading-normal">{{ $notif['message'] }}</p>
                                        <span class="text-[10px] font-bold text-slate-400 block mt-1.5">{{ $notif['time'] }}</span>
                                    </div>
                                    @if($notif['status'] === 'Unread')
                                        <div class="relative flex h-2 w-2 flex-shrink-0 mt-2">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500 shadow-sm shadow-red-500/50"></span>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-3.5 pt-3 border-t border-slate-50">
                            <button onclick="switchTab('notifications'); toggleNavbarDropdown('fpo-notifications-dropdown', event)" class="w-full py-2.5 text-xs font-black text-emerald-700 hover:text-emerald-800 bg-emerald-50 hover:bg-emerald-100 rounded-xl transition-colors">View All Notifications →</button>
                        </div>
                    </div>
                </div>

                <!-- User Profile Badge Dropdown container -->
                <div class="relative inline-block text-left border-l border-slate-100 pl-4">
                    <button onclick="toggleNavbarDropdown('fpo-profile-dropdown', event)" class="flex items-center gap-3 focus:outline-none hover:opacity-90 transition-opacity">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-emerald-500 to-purple-600 p-[2px]">
                            <div class="w-full h-full rounded-full bg-white flex items-center justify-center font-black text-emerald-600 text-sm">
                                {{ strtoupper(substr(auth()->user()->name ?? 'GH', 0, 2)) }}
                            </div>
                        </div>
                        <div class="hidden sm:block text-left">
                            <h4 class="text-xs font-black text-slate-800 leading-none">{{ auth()->user()->name ?? 'GreenHarvest FPO' }}</h4>
                            <span class="text-[9px] font-black text-emerald-600 uppercase tracking-widest leading-none flex items-center gap-1">
                                FPO Enterprise
                                <svg class="w-2.5 h-2.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </div>
                    </button>

                    <!-- Profile Dropdown Overlay -->
                    <div id="fpo-profile-dropdown" class="absolute right-0 mt-3.5 w-64 bg-white border border-slate-100 shadow-2xl rounded-[2rem] p-5 hidden z-50 transform origin-top-right transition-all duration-200">
                        <div class="pb-3.5 border-b border-slate-50 mb-3.5 flex items-center gap-2.5">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-emerald-500 to-purple-600 flex items-center justify-center font-black text-white text-sm">
                                {{ strtoupper(substr(auth()->user()->name ?? 'GH', 0, 2)) }}
                            </div>
                            <div class="text-left min-w-0">
                                <h4 class="text-xs font-black text-slate-800 truncate">{{ auth()->user()->name ?? 'GreenHarvest FPO' }}</h4>
                                <p class="text-[9px] text-slate-400 font-bold leading-tight">{{ auth()->user()->email ?? 'fpo@farmtech.org' }}</p>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <button onclick="openFpoProfileModal()" class="w-full px-3 py-2.5 bg-slate-50 hover:bg-emerald-50 text-slate-700 hover:text-emerald-800 rounded-xl text-xs font-black text-left flex items-center gap-2.5 transition-colors">
                                <span>👤</span>
                                <span>My Profile Summary</span>
                            </button>
                            <form action="{{ route('logout') }}" method="POST" class="pt-1">
                                @csrf
                                <button type="submit" class="w-full px-3 py-2.5 bg-white hover:bg-red-50 text-red-600 hover:text-red-700 rounded-xl text-xs font-black text-left flex items-center gap-2.5 border border-red-100/10 transition-colors">
                                    <span>🚪</span>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Scrolling Workspace Content -->
        <main class="flex-1 p-6 md:p-8 space-y-8 overflow-y-auto">

            <!-- ANALYTICS OVERVIEW CARDS (#overview) -->
            <section id="overview" class="space-y-6 scroll-mt-24">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                        FPO Enterprise Overview
                    </h2>
                    <span class="text-xs font-bold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-full">Live Operations Sync</span>
                </div>

                <!-- Metrics grid using components -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5">
                    <x-analytics-card title="Total Farmers" value="{{ $totalFarmersCount }}" metric="+12% YoY" emoji="👨🌾" theme="emerald" />
                    <x-analytics-card title="Active Villages" value="{{ $activeVillagesCount }}" emoji="🏡" theme="emerald" />
                    <x-analytics-card title="Monthly Revenue" id="stat-monthly-revenue" value="₹{{ number_format($monthlyRevenueTotal) }}" metric="+18% Index" emoji="💰" theme="purple" />
                    <x-analytics-card title="Crop Production" value="{{ $cropProductionVolume }} Tons" emoji="🌾" theme="emerald" />
                    <x-analytics-card title="Warehouse Usage" value="{{ $avgWarehouseUsage }}%" metric="Optimal" emoji="🧊" theme="purple" />
                    <x-analytics-card title="Pending Orders" id="stat-pending-orders" value="{{ $pendingOrdersCount }}" metric="Urgent" emoji="📦" theme="purple" />
                </div>

                <!-- Summary Charts Grid directly on the Dashboard -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                    <!-- Crop Yield Distribution (Bar Chart) -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 h-80 flex flex-col justify-between">
                        <div>
                            <h3 class="text-sm font-black text-slate-800">Crop yield Sourced (Tons)</h3>
                            <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Cooperative grain pools</span>
                        </div>
                        <div class="h-56 relative w-full mt-4">
                            <canvas id="cropYieldChart"></canvas>
                        </div>
                    </div>

                    <!-- Farmer Growth & Scheme Distribution (Pie Chart) -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 h-80 flex flex-col justify-between">
                        <div>
                            <h3 class="text-sm font-black text-slate-800">Government Scheme Distribution</h3>
                            <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Subsidies & loan approvals</span>
                        </div>
                        <div class="h-56 relative w-full mt-4">
                            <canvas id="schemeDistributionChart"></canvas>
                        </div>
                    </div>

                    <!-- Fleet Savings Index Chart (Additional Analytics ⭐) -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 h-80 flex flex-col justify-between">
                        <div>
                            <h3 class="text-sm font-black text-slate-800">Fleet Route Savings (₹)</h3>
                            <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Logistics toll savings trend</span>
                        </div>
                        <div class="h-56 relative w-full mt-4">
                            <canvas id="savingsChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Silo Status & Warehouse Capacity Gauges -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <!-- Silo Alpha Capacity Gauge -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 flex items-center justify-between">
                        <div class="space-y-2">
                            <span class="text-[9px] bg-emerald-100 text-emerald-800 px-2.5 py-0.5 rounded-full font-black uppercase tracking-wider">Cooperative Storage Silo A</span>
                            <h3 class="text-sm font-black text-slate-800">Alpha Silo (Wheat Capacity)</h3>
                            <p class="text-xs text-slate-500 font-bold">Moisture Risk: <span class="text-emerald-600">SAFE (14.2%)</span> • Temperature: 18°C</p>
                        </div>
                        <div class="relative w-20 h-20 flex items-center justify-center">
                            <svg class="w-full h-full transform -rotate-90">
                                <circle cx="40" cy="40" r="32" stroke="#e2e8f0" stroke-width="6" fill="transparent" />
                                <circle cx="40" cy="40" r="32" stroke="#10b981" stroke-width="6" fill="transparent" stroke-dasharray="201" stroke-dashoffset="44" />
                            </svg>
                            <span class="absolute font-black text-xs text-slate-800">78%</span>
                        </div>
                    </div>

                    <!-- Silo Beta Capacity Gauge -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 flex items-center justify-between">
                        <div class="space-y-2">
                            <span class="text-[9px] bg-purple-100 text-purple-800 px-2.5 py-0.5 rounded-full font-black uppercase tracking-wider">PACS Shared Cold Storage B</span>
                            <h3 class="text-sm font-black text-slate-800">Beta Silo (Potato Cold Storage)</h3>
                            <p class="text-xs text-slate-500 font-bold">Humidity Level: <span class="text-purple-600">OPTIMAL (65%)</span> • Temperature: 4°C</p>
                        </div>
                        <div class="relative w-20 h-20 flex items-center justify-center">
                            <svg class="w-full h-full transform -rotate-90">
                                <circle cx="40" cy="40" r="32" stroke="#e2e8f0" stroke-width="6" fill="transparent" />
                                <circle cx="40" cy="40" r="32" stroke="#8b5cf6" stroke-width="6" fill="transparent" stroke-dasharray="201" stroke-dashoffset="44" />
                            </svg>
                            <span class="absolute font-black text-xs text-slate-800">78%</span>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="h-px bg-slate-100 my-8"></div>

                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-purple-500 rounded-full inline-block"></span>
                        Interactive FPO Operations & Sourcing Tools
                    </h2>
                    <span class="text-xs font-bold text-slate-400">Direct PACS & Soil Planner Suite</span>
                </div>

                <!-- 3-Column Interactive Features Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                    <!-- Feature A: PACS Proximity Sourcing & Pricing Engine -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-black text-slate-800">Cooperative PACS Proximity Finder</h3>
                                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Cooperative Supply pools</span>
                            </div>
                            <p class="text-[10px] text-slate-500 font-bold mt-1 leading-normal">Directly source bulk fertilizers or custom machinery rentals from Primary Credit Societies.</p>
                            
                            <div class="space-y-2.5 mt-4">
                                <div>
                                    <label class="block text-[10px] font-black text-slate-500 uppercase">Select Nearby PACS Hub</label>
                                    <select id="pacs_hub_select" onchange="updatePacsEstimates()" class="w-full mt-1 px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500">
                                        @foreach($pacsList as $pacs)
                                            <option value="{{ $pacs->name }}" data-rate="{{ $pacs->tractor_hourly_rate ?? 750 }}" data-stock="{{ $pacs->available_fertilizer_tons ?? 120 }}">
                                                {{ $pacs->name }} ({{ $pacs->district }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-slate-500 uppercase">Required Supply quantity (Tons)</label>
                                    <input type="number" id="pacs_qty_input" oninput="updatePacsEstimates()" value="10" min="1" class="w-full mt-1 px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500">
                                </div>
                            </div>
                        </div>

                        <!-- Real-time dynamic quotes section -->
                        <div class="p-3 bg-slate-50 rounded-2xl border border-slate-100 space-y-1.5 text-xs font-semibold">
                            <div class="flex justify-between text-slate-500">
                                <span>Cooperative pricing:</span>
                                <span class="font-black text-slate-800" id="pacs_quote_text">₹45,000</span>
                            </div>
                            <div class="flex justify-between text-slate-500">
                                <span>Tractor Custom Hiring Rate:</span>
                                <span class="font-black text-emerald-600" id="pacs_tractor_text">₹750/hour</span>
                            </div>
                            <div class="flex justify-between text-[10px] text-slate-400 font-bold border-t border-slate-200/60 pt-1.5">
                                <span>Available Stock Reserve:</span>
                                <span id="pacs_stock_text">140 Tons</span>
                            </div>
                        </div>

                        <button onclick="alert('PACS wholesale supply request submitted! Booking ID: PACS-' + Math.floor(1000 + Math.random()*9000))" class="w-full py-2.5 bg-slate-900 hover:bg-slate-850 text-white rounded-xl text-xs font-black shadow transition-all focus:outline-none uppercase">Submit Sourcing Order</button>
                    </div>

                    <!-- Feature B: Soil Diagnostic & Nutrient Planner -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-black text-slate-800">Soil Diagnostic & Nutrient Planner</h3>
                                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest font-black text-purple-600 bg-purple-50 px-2 py-0.5 rounded">Active Test Index</span>
                            </div>
                            <p class="text-[10px] text-slate-500 font-bold mt-1 leading-normal">Interactive soil nitrogen (N), phosphorus (P), and potassium (K) level testing for optimal yield.</p>
                            
                            <div class="grid grid-cols-3 gap-2 mt-4 text-center">
                                <div class="bg-slate-50 p-2.5 border border-slate-100 rounded-2xl">
                                    <span class="block text-[8px] text-slate-400 font-black uppercase">Nitrogen (N)</span>
                                    <span class="block text-sm font-black text-purple-600" id="soil_n_val">42%</span>
                                    <span class="text-[8px] text-slate-500 font-bold">Deficient</span>
                                </div>
                                <div class="bg-slate-50 p-2.5 border border-slate-100 rounded-2xl">
                                    <span class="block text-[8px] text-slate-400 font-black uppercase">Phosphorus (P)</span>
                                    <span class="block text-sm font-black text-emerald-600" id="soil_p_val">68%</span>
                                    <span class="text-[8px] text-slate-500 font-bold">Optimal</span>
                                </div>
                                <div class="bg-slate-50 p-2.5 border border-slate-100 rounded-2xl">
                                    <span class="block text-[8px] text-slate-400 font-black uppercase">Potassium (K)</span>
                                    <span class="block text-sm font-black text-amber-500" id="soil_k_val">55%</span>
                                    <span class="text-[8px] text-slate-500 font-bold">Moderate</span>
                                </div>
                            </div>
                        </div>

                        <!-- Soil planner interactive dropdown -->
                        <div class="space-y-2">
                            <label class="block text-[10px] font-black text-slate-500 uppercase">Target Crop Optimization</label>
                            <select id="target_soil_crop" onchange="updateSoilNutrientPlanners()" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500">
                                <option value="wheat">Patiala Kalyan Basmati Wheat</option>
                                <option value="rice">Punjab Premium Basmati Rice</option>
                                <option value="mustard">Bhawanigarh Organic Mustard</option>
                            </select>
                        </div>

                        <div class="p-3 bg-purple-50/50 rounded-2xl border border-purple-100/50 text-[10px] font-semibold text-slate-650 leading-relaxed" id="soil_recommendation_box">
                            💡 **Basmati Wheat Soil Advice:** Deficient nitrogen levels detected! Sourcing +3.5 Tons of nitrogen fertilizer reserve is recommended to secure optimal crop yield.
                        </div>

                        <button onclick="alert('Soil prescription digitized and pushed to member grower registers!')" class="w-full py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-xs font-black shadow transition-all focus:outline-none uppercase">Prescribe Soil Nutrient</button>
                    </div>

                    <!-- Feature C: Smart Logistics Shipping Scheduler -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 flex flex-col justify-between space-y-4">
                        <div>
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-black text-slate-800">Logistics Shipping Dispatch</h3>
                                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Least Cost Router</span>
                            </div>
                            <p class="text-[10px] text-slate-500 font-bold mt-1 leading-normal">Schedule scheduled trucks across Patiala cooperative districts and optimize highway tolls.</p>
                            
                            <div class="space-y-2.5 mt-4">
                                <div class="flex items-center gap-3 p-2 bg-slate-50 rounded-2xl border border-slate-100">
                                    <span class="text-xl">🚚</span>
                                    <div class="flex-1">
                                        <h4 class="text-[10px] font-black text-slate-800">Eicher Pro Truck 10.90</h4>
                                        <span class="text-[8px] text-slate-400 font-bold">Route: Nabha Bypass • Status: <span class="text-purple-600 font-bold">IN TRANSIT</span></span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 p-2 bg-slate-50 rounded-2xl border border-slate-100">
                                    <span class="text-xl">🚛</span>
                                    <div class="flex-1">
                                        <h4 class="text-[10px] font-black text-slate-800">Tata LPT 1613</h4>
                                        <span class="text-[8px] text-slate-400 font-bold">Route: Kalyan Link road • Status: <span class="text-slate-500 font-bold">SCHEDULED</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Real-time interactive savings calculator -->
                        <div class="p-3 bg-emerald-50 rounded-2xl border border-emerald-100 flex items-center justify-between text-xs font-black text-emerald-800">
                            <span>Predicted Toll Savings index:</span>
                            <span class="text-emerald-700 font-black">₹1,500 Saved</span>
                        </div>

                        <button onclick="switchTab('logistics')" class="w-full py-2.5 bg-slate-900 hover:bg-slate-850 text-white rounded-xl text-xs font-black shadow transition-all focus:outline-none uppercase">Manage Fleet Schedules</button>
                    </div>
                </div>
            </section>

            <!-- FEATURE 1 - FARMER MANAGEMENT SYSTEM (#farmers) -->
            <section id="farmers" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-purple-500 rounded-full inline-block"></span>
                        Farmer Management System 👨🌾
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Register cooperative growers, track soil productivity indices, and verify scheme status</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                    
                    <!-- Farmer Roster Table List -->
                    <div class="lg:col-span-2 bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 flex flex-col justify-between overflow-hidden">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-sm font-black text-slate-800">Cooperative Farmer Register</h3>
                                <input type="text" id="farmer-search" onkeyup="filterFarmerTable()" placeholder="Search farmers by village..." class="px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500">
                            </div>

                            <div class="overflow-x-auto">
                                <table class="w-full text-xs text-left" id="farmer-roster-table">
                                    <thead class="bg-slate-50 text-slate-400 font-black uppercase text-[10px]">
                                        <tr>
                                            <th class="p-3.5 rounded-l-2xl">Farmer Name</th>
                                            <th class="p-3.5">Village</th>
                                            <th class="p-3.5">Crop Type</th>
                                            <th class="p-3.5">Land Area</th>
                                            <th class="p-3.5">Performance Score</th>
                                            <th class="p-3.5">Scheme Status</th>
                                            <th class="p-3.5 rounded-r-2xl text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="farmer-table-rows" class="divide-y divide-slate-50 font-semibold text-slate-600">
                                        @foreach($farmers as $farmer)
                                            <tr id="farmer-row-{{ $farmer->id }}">
                                                <td class="p-3.5 font-black text-slate-800">{{ $farmer->name }}</td>
                                                <td class="p-3.5">{{ $farmer->village }}</td>
                                                <td class="p-3.5">{{ $farmer->crop_type }}</td>
                                                <td class="p-3.5">{{ $farmer->land_area }} Acres</td>
                                                <td class="p-3.5">
                                                    <div class="flex items-center gap-2">
                                                        <div class="w-16 bg-slate-100 rounded-full h-2">
                                                            <div class="h-2 rounded-full @if($farmer->performance_score >= 80) bg-emerald-500 @elseif($farmer->performance_score >= 60) bg-purple-500 @else bg-red-500 @endif" style="width: {{ $farmer->performance_score }}%"></div>
                                                        </div>
                                                        <span class="font-black text-[10px]">{{ $farmer->performance_score }}/100</span>
                                                    </div>
                                                </td>
                                                <td class="p-3.5">
                                                    <span class="px-2 py-0.5 text-[9px] font-black uppercase rounded-full @if($farmer->scheme_status === 'Active') bg-emerald-100 text-emerald-800 @else bg-amber-100 text-amber-800 @endif">
                                                        {{ $farmer->scheme_status }}
                                                    </span>
                                                </td>
                                                <td class="p-3.5 text-right whitespace-nowrap">
                                                    <button onclick="editFarmer('{{ $farmer->id }}', '{{ addslashes($farmer->name) }}', '{{ $farmer->village }}', '{{ $farmer->crop_type }}', '{{ $farmer->land_area }}')" class="p-1.5 text-slate-400 hover:text-emerald-600 transition-colors" title="Edit Farmer">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                                    </button>
                                                    <button onclick="deleteFarmer('{{ $farmer->id }}')" class="p-1.5 text-slate-400 hover:text-red-650 transition-colors ml-1" title="Delete Farmer">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Farmer Registration Form -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6">
                        <h3 class="text-sm font-black text-slate-800 mb-4" id="farmer-form-title">Add Cooperative Farmer</h3>
                        
                        <form id="add-farmer-form" onsubmit="submitFarmerRegister(event)" class="space-y-4">
                            <input type="hidden" id="f_id" value="">
                            <div>
                                <label class="block text-xs font-black text-slate-700 mb-1.5">Farmer Name</label>
                                <input type="text" id="f_name" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500" placeholder="e.g. Jaswinder Singh" required>
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-black text-slate-700 mb-1.5">Village Cluster</label>
                                    <select id="f_village" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500">
                                        <option value="Kalyan">Kalyan</option>
                                        <option value="Nabha">Nabha</option>
                                        <option value="Bhawanigarh">Bhawanigarh</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-slate-700 mb-1.5">Primary Crop</label>
                                    <select id="f_crop" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500">
                                        <option value="Wheat">Wheat</option>
                                        <option value="Basmati Rice">Basmati Rice</option>
                                        <option value="Mustard">Mustard</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-black text-slate-700 mb-1.5">Land Area (Acres)</label>
                                <input type="number" step="0.1" id="f_land" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500" placeholder="e.g. 4.5" required>
                            </div>

                            <div class="flex gap-2">
                                <button type="submit" id="farmer-submit-btn" class="flex-1 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-black text-xs tracking-wider shadow transition-colors">REGISTER NEW FARMER</button>
                                <button type="button" onclick="cancelFarmerEdit()" id="farmer-cancel-btn" class="hidden px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-650 rounded-2xl font-black text-xs transition-colors">CANCEL</button>
                            </div>
                        </form>
                    </div>

                </div>

                <!-- Smart Insight Card (Unique Feature ⭐) -->
                <div class="p-5 bg-gradient-to-br from-red-500/10 to-amber-500/10 border border-red-100 rounded-[2rem] flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div class="space-y-1">
                        <h4 class="text-xs font-black text-red-800 flex items-center gap-1.5">
                            ⚠️ FPO Support Alert: Farmers Needing Soil Support
                        </h4>
                        <p class="text-xs text-slate-650 font-semibold leading-relaxed">
                            Our predictive analytics model indicates **{{ $unsupportedFarmers->count() }} farmers** have low crop productivity score ratings (< 60/100) this crop cycle. Sourcing compost packages is recommended.
                        </p>
                    </div>
                    <div class="flex gap-2 flex-wrap">
                        @foreach($unsupportedFarmers as $uf)
                            <span class="px-3 py-1.5 bg-white border border-red-200 text-slate-700 text-[10px] font-black rounded-lg shadow-sm whitespace-nowrap">
                                {{ $uf->name }} ({{ $uf->performance_score }}%)
                            </span>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- FEATURE 2 - ANALYTICS DASHBOARD & INSIGHTS (#analytics) -->
            <section id="analytics" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                        Crop & Income Analytics 📊
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">District growth metrics, crop distribution, and predictive scheme analytics</p>
                </div>

                @php
                    $villageAnalytics = [];
                    foreach($farmers as $f) {
                        if (!isset($villageAnalytics[$f->village])) {
                            $villageAnalytics[$f->village] = ['acres' => 0, 'score_sum' => 0, 'count' => 0, 'crops' => []];
                        }
                        $villageAnalytics[$f->village]['acres'] += $f->land_area;
                        $villageAnalytics[$f->village]['score_sum'] += $f->performance_score;
                        $villageAnalytics[$f->village]['count']++;
                        if (!in_array($f->crop_type, $villageAnalytics[$f->village]['crops'])) {
                            $villageAnalytics[$f->village]['crops'][] = $f->crop_type;
                        }
                    }
                @endphp

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Village-wise aggregate diagnostics -->
                    <div class="lg:col-span-2 bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 flex flex-col justify-between overflow-hidden">
                        <div>
                            <h3 class="text-sm font-black text-slate-800 mb-4">Village Crop Acreage & Soil Productivity Matrix</h3>
                            <div class="overflow-x-auto">
                                <table class="w-full text-xs text-left">
                                    <thead class="bg-slate-50 text-slate-400 font-black uppercase text-[10px]">
                                        <tr>
                                            <th class="p-3.5 rounded-l-2xl">Village Cluster</th>
                                            <th class="p-3.5">Total Sourced Area</th>
                                            <th class="p-3.5">Active Growers</th>
                                            <th class="p-3.5">Crops Cultivated</th>
                                            <th class="p-3.5 rounded-r-2xl">Avg Soil Index</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-50 font-semibold text-slate-600">
                                        @foreach($villageAnalytics as $village => $data)
                                            <tr>
                                                <td class="p-3.5 font-black text-slate-800">{{ $village }} Cluster</td>
                                                <td class="p-3.5 text-emerald-600 font-bold">{{ number_format($data['acres'], 1) }} Acres</td>
                                                <td class="p-3.5">{{ $data['count'] }} Members</td>
                                                <td class="p-3.5 text-slate-500 font-bold">{{ implode(', ', $data['crops']) }}</td>
                                                <td class="p-3.5">
                                                    <div class="flex items-center gap-2">
                                                        @php $avgScore = round($data['score_sum'] / $data['count']); @endphp
                                                        <div class="w-12 bg-slate-100 rounded-full h-1.5">
                                                            <div class="h-1.5 rounded-full @if($avgScore >= 80) bg-emerald-500 @elseif($avgScore >= 60) bg-purple-500 @else bg-red-500 @endif" style="width: {{ $avgScore }}%"></div>
                                                        </div>
                                                        <span class="font-black text-[10px]">{{ $avgScore }}%</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Cooperative Land & Crop Sourcing Summary Card -->
                    <div class="bg-gradient-to-br from-purple-500/10 to-indigo-500/10 border border-purple-100 rounded-[2.5rem] p-6 flex flex-col justify-between">
                        <div>
                            <span class="text-3xl">🌾</span>
                            <h3 class="text-sm font-black text-slate-800 mt-2">Active Cultivation Sourcing</h3>
                            <p class="text-xs text-slate-500 font-semibold leading-relaxed mt-2.5">
                                Your cooperative matches agricultural land records of **{{ $farmers->sum('land_area') }} Acres** across **{{ count($villageAnalytics) }} villages** in Patiala. Predictive crop yield forecasts remain high for this Rabi harvesting cycle.
                            </p>
                        </div>
                        <div class="mt-4 p-3.5 bg-white/60 rounded-2xl border border-purple-100 flex items-center justify-between text-xs font-black text-purple-800">
                            <span>Sourcing Capacity:</span>
                            <span>Optimal</span>
                        </div>
                    </div>
                </div>


            </section>

            <!-- FEATURE 3 - LOGISTICS & TRANSPORT (#logistics) -->
            <section id="logistics" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-purple-500 rounded-full inline-block"></span>
                        Logistics & Fleet Booking 🚚
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Schedule collective crop transit trucks and calculate route toll optimizations</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                    
                    <!-- Logistics Schedule Table -->
                    <div class="lg:col-span-2 bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 flex flex-col justify-between overflow-hidden">
                        <div>
                            <h3 class="text-sm font-black text-slate-800 mb-4">Active Sourcing Shipments</h3>
                            
                            <div class="overflow-x-auto">
                                <table class="w-full text-xs text-left">
                                    <thead class="bg-slate-50 text-slate-400 font-black uppercase text-[10px]">
                                        <tr>
                                            <th class="p-3.5 rounded-l-2xl">Vehicle</th>
                                            <th class="p-3.5">Driver</th>
                                            <th class="p-3.5">Delivery Date</th>
                                            <th class="p-3.5">Route Chosen</th>
                                            <th class="p-3.5">Status</th>
                                            <th class="p-3.5 rounded-r-2xl text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="logistics-table-rows" class="divide-y divide-slate-50 font-semibold text-slate-600">
                                        @foreach($logistics as $log)
                                            <tr id="logistics-row-{{ $log->id }}">
                                                <td class="p-3.5 font-black text-slate-800">{{ $log->vehicle }}</td>
                                                <td class="p-3.5">{{ $log->driver }}</td>
                                                <td class="p-3.5">{{ $log->delivery_date }}</td>
                                                <td class="p-3.5">{{ $log->route }}</td>
                                                <td class="p-3.5">
                                                    <span class="px-2.5 py-0.5 text-[9px] font-black uppercase rounded-full @if($log->status === 'In Transit') bg-purple-100 text-purple-800 @else bg-slate-100 text-slate-500 @endif">
                                                        {{ $log->status }}
                                                    </span>
                                                </td>
                                                <td class="p-3.5 text-right">
                                                    <button onclick="cancelLogistics('{{ $log->id }}')" class="px-2 py-1 bg-red-50 hover:bg-red-100 text-red-650 rounded-lg text-[9px] font-black uppercase tracking-wider transition-colors shadow-sm" title="Cancel Booking">Cancel</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Logistics Route Booker / Optimized fuel savings alert (Unique Feature ⭐) -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 flex flex-col justify-between">
                        <form id="logistics-booking-form" onsubmit="submitLogisticsBooking(event)" class="space-y-4">
                            <div>
                                <h3 class="text-sm font-black text-slate-800 mb-1">Book Fleet Transport</h3>
                                <p class="text-[10px] text-slate-400 font-bold mb-4">Book Eicher/Tata trucks for crop procurement trips</p>
                            </div>

                            <div>
                                <label class="block text-xs font-black text-slate-700 mb-1.5">Vehicle Model</label>
                                <select id="l_vehicle" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500">
                                    <option value="Eicher Pro Truck 10.90">Eicher Pro Truck 10.90</option>
                                    <option value="Tata LPT 1613">Tata LPT 1613</option>
                                    <option value="Ashok Leyland Boss 1215">Ashok Leyland Boss 1215</option>
                                    <option value="Mahindra Furio 14">Mahindra Furio 14</option>
                                    <option value="BharatBenz 1217C">BharatBenz 1217C</option>
                                </select>
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-black text-slate-700 mb-1.5">Driver</label>
                                    <input type="text" id="l_driver" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none" placeholder="e.g. Jaspal Singh" required>
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-slate-700 mb-1.5">Transit Date</label>
                                    <input type="date" id="l_date" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-black text-slate-700 mb-1.5">Procurement Route</label>
                                <select id="l_route" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500">
                                    <option value="Route B (Via bypass)">Route B (Via bypass)</option>
                                    <option value="Route A (Via NH-44)">Route A (Via NH-44)</option>
                                    <option value="Route C (Village link road)">Route C (Village link road)</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl font-black text-xs tracking-wider shadow">BOOK & CALCULATE OPTIMIZATION</button>
                        </form>
                    </div>

                </div>

                <!-- Logistics Optimization Insight Card -->
                <div class="p-5 bg-gradient-to-br from-emerald-500/10 to-teal-500/10 border border-emerald-100 rounded-[2rem] flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div class="space-y-1">
                        <h4 class="text-xs font-black text-emerald-800 flex items-center gap-1.5">
                            🛣️ Fleet Optimization Alert: Route B recommended
                        </h4>
                        <p class="text-xs text-slate-650 font-semibold leading-relaxed">
                            Our AI routing engine recommends **Route B (Via bypass)** for upcoming deliveries. This avoids heavy traffic on NH-44 and eliminates two toll plazas, reducing fuel burn by 14% and saving approximately ₹1,500 per trip.
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <span class="px-3 py-1.5 bg-white border border-emerald-200 text-emerald-700 text-[10px] font-black rounded-lg shadow-sm whitespace-nowrap">
                            Save ₹1,500/trip
                        </span>
                        <span class="px-3 py-1.5 bg-white border border-emerald-200 text-emerald-700 text-[10px] font-black rounded-lg shadow-sm whitespace-nowrap">
                            -14% Fuel Burn
                        </span>
                    </div>
                </div>
            </section>



            <!-- FEATURE 5 - EQUIPMENT RENTAL SYSTEM (#equipment) -->
            <section id="equipment" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-purple-500 rounded-full inline-block"></span>
                        Equipment Rental System 🚜
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Rent pooled tractors, combines harvesters, or agricultural spraying drones</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                    <!-- Roster list cards -->
                    <div id="equipment-roster-container" class="lg:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($equipment as $eq)
                            <div class="bg-white border border-slate-100 shadow-sm rounded-3xl p-5 hover:scale-[1.02] transition-transform duration-300 flex flex-col justify-between relative group/card" id="eq-card-{{ $eq->id }}">
                                <!-- Edit/Delete Overlay icons (Top-right corner, shows on hover) -->
                                <div class="absolute top-4 right-4 flex gap-1.5 opacity-0 group-hover/card:opacity-100 transition-opacity">
                                    <button onclick="editEquipment('{{ $eq->id }}', '{{ addslashes($eq->equipment_name) }}', '{{ $eq->price }}', '{{ $eq->location }}', '{{ addslashes($eq->owner ?? '') }}')" class="w-7 h-7 rounded-full bg-white border border-slate-150 text-slate-450 hover:text-purple-600 flex items-center justify-center shadow-sm transition-colors" title="Edit Machinery">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    </button>
                                    <button onclick="deleteEquipment('{{ $eq->id }}')" class="w-7 h-7 rounded-full bg-white border border-slate-150 text-slate-450 hover:text-red-650 flex items-center justify-center shadow-sm transition-colors" title="Delete Machinery">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </div>

                                <div>
                                    <span class="text-3xl select-none">
                                        @if(strpos(strtolower($eq->equipment_name), 'tractor') !== false) 🚜
                                        @elseif(strpos(strtolower($eq->equipment_name), 'harvester') !== false) 🌾
                                        @else 🛸
                                        @endif
                                    </span>
                                    <h4 class="text-xs font-black text-slate-800 mt-3 eq-card-name">{{ $eq->equipment_name }}</h4>
                                    <p class="text-[10px] text-slate-400 font-bold leading-none mt-1 eq-card-location">Location: {{ $eq->location }}</p>
                                    <p class="text-[9px] text-slate-400 font-bold mt-1.5 eq-card-owner">Owner: {{ $eq->owner ?? 'Cooperative' }}</p>
                                </div>

                                <div class="mt-5">
                                    <span class="text-[9px] font-black text-slate-400 uppercase">Coop Rate</span>
                                    <p class="text-sm font-black text-purple-700 eq-card-price">₹{{ number_format($eq->price, 2) }}/day</p>
                                    <button onclick="bookEquipment(this)" class="w-full mt-3 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-[10px] font-black uppercase tracking-wider transition-colors duration-300">Book Now</button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Right Column: Interactive Widgets -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 flex flex-col justify-between relative overflow-hidden min-h-[380px]">
                        <!-- Tabs Header -->
                        <div class="flex border-b border-slate-100 pb-3 mb-4 text-xs font-black">
                            <button onclick="switchEquipmentTab('finder')" id="eq-tab-finder-btn" class="flex-1 text-center py-1 text-purple-600 border-b-2 border-purple-600 focus:outline-none">Proximity Finder</button>
                            <button onclick="switchEquipmentTab('register')" id="eq-tab-register-btn" class="flex-1 text-center py-1 text-slate-400 focus:outline-none">Register Machinery</button>
                        </div>

                        <!-- Finder Panel -->
                        <div id="eq-panel-finder" class="space-y-4">
                            <div>
                                <h3 class="text-sm font-black text-slate-800 mb-2">Cheapest machinery Finder</h3>
                                <p class="text-[10px] text-slate-400 font-bold mb-4">Scans cooperative machinery pools within Kalyan & Nabha centers</p>
                            </div>
                            <!-- Finder list container -->
                            <div id="cheapest-machinery-feed" class="space-y-4 my-2">
                                <div class="p-5 border-2 border-dashed border-slate-200 rounded-3xl text-center space-y-2.5">
                                    <span class="text-3xl">🧭</span>
                                    <p class="text-xs font-semibold text-slate-500">Scan cooperative custom hiring registers for matching rates.</p>
                                    <button onclick="triggerCheapestFinder()" class="px-4 py-2 bg-emerald-600 text-white text-xs font-black rounded-lg shadow-sm">Scan Pools</button>
                                </div>
                            </div>
                        </div>

                        <!-- Register Panel (Hidden by default) -->
                        <div id="eq-panel-register" class="hidden space-y-4">
                            <div>
                                <h3 class="text-sm font-black text-slate-800 mb-1" id="equipment-form-title">Register Machinery</h3>
                                <p class="text-[10px] text-slate-400 font-bold mb-4">Add new machinery to the collective cooperative pool</p>
                            </div>
                            <form id="add-equipment-form" onsubmit="submitEquipmentForm(event)" class="space-y-3">
                                <input type="hidden" id="eq_id" value="">
                                <div>
                                    <label class="block text-[10px] font-black text-slate-700 mb-1">Equipment Name</label>
                                    <input type="text" id="eq_name" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-purple-500" placeholder="e.g. Laser Land Leveler" required>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <label class="block text-[10px] font-black text-slate-700 mb-1">Coop Rate (₹/day)</label>
                                        <input type="number" id="eq_rate" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-purple-500" placeholder="1200" required>
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-black text-slate-700 mb-1">Location Center</label>
                                        <select id="eq_location" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-purple-500">
                                            <option value="Kalyan">Kalyan</option>
                                            <option value="Nabha">Nabha</option>
                                            <option value="Bhawanigarh">Bhawanigarh</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[10px] font-black text-slate-700 mb-1">Associated Owner / Operator</label>
                                    <input type="text" id="eq_owner" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-purple-500" placeholder="e.g. Swaran Singh" required>
                                </div>
                                <div class="flex gap-2">
                                    <button type="submit" id="eq-submit-btn" class="flex-1 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-xs font-black uppercase tracking-wider transition-colors">Register</button>
                                    <button type="button" onclick="cancelEquipmentEdit()" id="eq-cancel-btn" class="hidden px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-650 rounded-xl text-xs font-black uppercase">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Equipment Utilization Insight Card -->
                <div class="p-5 bg-gradient-to-br from-purple-500/10 to-pink-500/10 border border-purple-100 rounded-[2rem] flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mt-6">
                    <div class="space-y-1">
                        <h4 class="text-xs font-black text-purple-800 flex items-center gap-1.5">
                            🚜 Pooling Optimization Alert: High Demand for Tractors
                        </h4>
                        <p class="text-xs text-slate-650 font-semibold leading-relaxed">
                            Our predictive analytics model indicates a **35% surge in tractor demand** for the upcoming sowing season. We recommend scheduling cooperative fleet maintenance this week to ensure maximum uptime and availability for member farmers.
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <span class="px-3 py-1.5 bg-white border border-purple-200 text-purple-700 text-[10px] font-black rounded-lg shadow-sm whitespace-nowrap">
                            Schedule Maintenance
                        </span>
                    </div>
                </div>
            </section>

            <!-- FEATURE 6 - GIS FARMER MAPPING (#gis) -->
            <section id="gis" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                        GIS Farmer Mapping & Heatmaps 📍
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Plot spatial village coordinate clusters and visualize district subsidy penetration levels</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
                    <!-- Grand Interactive SVG GIS Map (Unique Feature ⭐) -->
                    <div class="lg:col-span-2 bg-white/95 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 relative overflow-hidden flex flex-col justify-between min-h-[380px]">
                        <div>
                            <h3 class="text-sm font-black text-slate-800">District spatial Coordinate Grid</h3>
                            <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Kalyan village cooperative circles</span>
                        </div>

                        <!-- SVG GIS Grid -->
                        <div class="h-64 w-full bg-gradient-to-br from-slate-950 to-slate-900 rounded-[2rem] border border-slate-850 p-4 relative overflow-hidden flex items-center justify-center my-4 select-none">
                            <!-- Lat/Long GRID lines overlay -->
                            <div class="absolute inset-0 grid grid-cols-6 grid-rows-6 pointer-events-none opacity-10">
                                <div class="border-r border-b border-white"></div>
                                <div class="border-r border-b border-white"></div>
                                <div class="border-r border-b border-white"></div>
                                <div class="border-r border-b border-white"></div>
                                <div class="border-r border-b border-white"></div>
                                <div class="border-r border-b border-white"></div>
                            </div>

                            <!-- Cluster Marker 1 (Kalyan) -->
                            <div onclick="alert('Kalyan Village: 85 Wheat Farmers, Scheme Participation: 32% (Low)')" class="absolute top-1/4 left-1/4 cursor-pointer group flex flex-col items-center">
                                <div class="w-8 h-8 rounded-full bg-red-500/25 animate-ping absolute"></div>
                                <div class="w-5 h-5 rounded-full bg-red-500 border-2 border-white flex items-center justify-center font-black text-[9px] text-white shadow-lg relative z-10">
                                    85
                                </div>
                                <span class="text-[9px] font-black text-white bg-slate-950 px-2 py-0.5 rounded-full mt-1.5 opacity-80 group-hover:opacity-100 transition-opacity">Kalyan Cluster</span>
                            </div>

                            <!-- Cluster Marker 2 (Nabha) -->
                            <div onclick="alert('Nabha Hub: 45 Rice Farmers, Scheme Participation: 88% (Optimal)')" class="absolute top-1/3 right-1/4 cursor-pointer group flex flex-col items-center">
                                <div class="w-8 h-8 rounded-full bg-emerald-500/25 animate-ping absolute"></div>
                                <div class="w-5 h-5 rounded-full bg-emerald-500 border-2 border-white flex items-center justify-center font-black text-[9px] text-white shadow-lg relative z-10">
                                    45
                                </div>
                                <span class="text-[9px] font-black text-white bg-slate-950 px-2 py-0.5 rounded-full mt-1.5 opacity-80 group-hover:opacity-100 transition-opacity">Nabha Fields</span>
                            </div>

                            <!-- Cluster Marker 3 (Bhawanigarh) -->
                            <div onclick="alert('Bhawanigarh Fields: 20 Mustard Farmers, Scheme Participation: 94% (Optimal)')" class="absolute bottom-1/4 left-1/2 cursor-pointer group flex flex-col items-center">
                                <div class="w-8 h-8 rounded-full bg-emerald-500/25 animate-ping absolute"></div>
                                <div class="w-5 h-5 rounded-full bg-emerald-500 border-2 border-white flex items-center justify-center font-black text-[9px] text-white shadow-lg relative z-10">
                                    20
                                </div>
                                <span class="text-[9px] font-black text-white bg-slate-950 px-2 py-0.5 rounded-full mt-1.5 opacity-80 group-hover:opacity-100 transition-opacity">Bhawanigarh</span>
                            </div>
                        </div>

                        <p class="text-[9px] text-slate-400 font-bold leading-normal">Interactive: Click on any village cluster bubble to inspect active membership counts and crop distribution.</p>
                    </div>

                    <!-- Low Beneficiary Heatmap Alert (Unique Feature ⭐) -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 flex flex-col justify-between">
                        <div>
                            <span class="text-[9px] bg-red-100 text-red-800 px-2.5 py-1 rounded-full font-black uppercase tracking-wider inline-block">Spatial Scheme Heatmap</span>
                            <h3 class="text-base font-black text-slate-800 mt-2">Low Beneficiary Heatmap</h3>
                            <p class="text-xs text-slate-500 font-semibold leading-relaxed mt-2.5">
                                **Kalyan Village Hub Alert:** Our GIS census shows Kalyan has only **32%** subsidy scheme penetration (SMAM/PM-KISAN), compared to district average of **80%**. Form aggregation campaign scheduled for next Thursday.
                            </p>
                        </div>
                        <div class="mt-4 p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-xs font-black text-red-800">
                            <span>Registration Goal:</span>
                            <span class="float-right bg-red-600 text-white px-2 py-0.5 rounded">+45 farmers</span>
                        </div>
                    </div>
                </div>

                <!-- GIS Heatmap Analysis Insight Card -->
                <div class="p-5 bg-gradient-to-br from-emerald-500/10 to-teal-500/10 border border-emerald-100 rounded-[2rem] flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mt-6">
                    <div class="space-y-1">
                        <h4 class="text-xs font-black text-emerald-800 flex items-center gap-1.5">
                            📍 Spatial Optimization Insight: Kalyan Cluster
                        </h4>
                        <p class="text-xs text-slate-650 font-semibold leading-relaxed">
                            Spatial coordinate overlay indicates that **85 wheat farmers** in the Kalyan cluster are located more than 15km away from the nearest fertilizer depot. Establishing a temporary PACS sourcing point in Kalyan is recommended.
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <span class="px-3 py-1.5 bg-white border border-emerald-200 text-emerald-700 text-[10px] font-black rounded-lg shadow-sm whitespace-nowrap">
                            Reduce Sourcing Distance
                        </span>
                    </div>
                </div>
            </section>

            <!-- FEATURE 7 - YIELD PREDICTION & EXPECTED INCOME (#yield) -->
            <section id="yield" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-purple-500 rounded-full inline-block"></span>
                        Yield Prediction & Forecasts 📈
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Predict crop production outputs using rain indices, soil nutrient metrics, and historical logs</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Yield line prediction charts -->
                    <div class="lg:col-span-2 bg-white/95 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 h-80 flex flex-col justify-between">
                        <div>
                            <h3 class="text-sm font-black text-slate-800">Wheat yield Trend & Soil forecast</h3>
                            <p class="text-[10px] text-slate-400 font-bold">Consolidated crop productivity lines based on rain index</p>
                        </div>
                        <div class="h-56 relative w-full mt-4">
                            <canvas id="yieldPredictionChart"></canvas>
                        </div>
                    </div>

                    <!-- Expected Income Card (Unique Feature ⭐) -->
                    <div class="bg-gradient-to-br from-emerald-500/10 to-teal-500/10 border border-emerald-100 rounded-[2.5rem] p-6 flex flex-col justify-between text-center relative overflow-hidden">
                        <div class="space-y-3">
                            <span class="text-4xl animate-pulse">🌾</span>
                            <h3 class="text-sm font-black text-emerald-800">Expected Cooperative Income</h3>
                            <p class="text-xs text-slate-600 font-semibold leading-normal">
                                Based on a harvest prediction of **420 Tons** of premium wheat sourced from Patiala soils:
                            </p>
                        </div>

                        <!-- Financial Ledger Mock -->
                        <div class="p-5 border-4 border-double border-emerald-600 bg-white rounded-[2rem] shadow my-4 select-none">
                            <p class="text-[9px] uppercase tracking-widest font-black text-slate-400">MSP Wheat Estimation</p>
                            <h4 class="text-2xl font-black text-emerald-700 mt-2">₹1.2 Lakhs</h4>
                            <p class="text-[8px] font-bold text-slate-400 mt-1">Calculated at cooperative floor price index of ₹2,275/quintal.</p>
                        </div>

                        <p class="text-[8px] text-slate-450 font-bold">Disclaimer: Subject to grain moisture quality and Mandi wholesale listings.</p>
                    </div>
                </div>
            </section>

            <!-- FEATURE 8 - MARKETPLACE BULK ORDERS (#orders) -->
            <section id="orders" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                        Marketplace Bulk Orders 📦
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Track wholesaling contracts, bulk grain distributions, and buyer approval cycles</p>
                </div>

                <!-- Orders List table -->
                <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 overflow-hidden">
                    <h3 class="text-sm font-black text-slate-800 mb-4">Bulk Procurement Contracts</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs text-left">
                            <thead class="bg-slate-50 text-slate-400 font-black uppercase text-[10px]">
                                <tr>
                                    <th class="p-3.5 rounded-l-2xl">Buyer Name</th>
                                    <th class="p-3.5">Product</th>
                                    <th class="p-3.5">Quantity</th>
                                    <th class="p-3.5">Order Value</th>
                                    <th class="p-3.5">Status</th>
                                    <th class="p-3.5 text-right rounded-r-2xl">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="order-table-rows" class="divide-y divide-slate-50 font-semibold text-slate-600">
                                @foreach($orders as $order)
                                    <tr id="order-row-{{ $order->id }}">
                                        <td class="p-3.5 font-black text-slate-800">{{ $order->buyer_name }}</td>
                                        <td class="p-3.5">{{ $order->product }}</td>
                                        <td class="p-3.5">{{ $order->quantity }} Quintals</td>
                                        <td class="p-3.5 font-black text-emerald-700">₹{{ number_format($order->order_value, 2) }}</td>
                                        <td class="p-3.5" id="order-status-{{ $order->id }}">
                                            <span class="px-2 py-0.5 text-[9px] font-black uppercase rounded-full @if($order->status === 'Approved') bg-emerald-100 text-emerald-800 @elseif($order->status === 'Rejected') bg-red-100 text-red-800 @else bg-amber-100 text-amber-800 @endif">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                        <td class="p-3.5 text-right whitespace-nowrap" id="order-actions-{{ $order->id }}">
                                            @if($order->status === 'Pending')
                                                <button onclick="approveOrder('{{ $order->id }}', {{ $order->order_value }})" class="px-2.5 py-1 bg-emerald-50 hover:bg-emerald-100 text-emerald-750 rounded-lg text-[9px] font-black uppercase tracking-wider transition-colors shadow-sm animate-pulse-subtle" title="Approve Wholesale Order">Approve</button>
                                                <button onclick="rejectOrder('{{ $order->id }}')" class="px-2.5 py-1 bg-red-50 hover:bg-red-100 text-red-650 rounded-lg text-[9px] font-black uppercase tracking-wider transition-colors shadow-sm ml-1.5" title="Reject Wholesale Order">Reject</button>
                                            @else
                                                <span class="text-[10px] text-slate-400 font-black uppercase tracking-wider">No Action Required</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- FEATURE 9 - AUTO REPORT GENERATION (#reports) -->
            <section id="reports" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-purple-500 rounded-full inline-block"></span>
                        Government Formatted Reports 🧾
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Generate compliant summary registers for submission to Patiala District Directors</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Selection and actions -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 space-y-4">
                        <h3 class="text-sm font-black text-slate-800">Generate Audit Sheets</h3>
                        <p class="text-xs text-slate-500 font-semibold leading-relaxed">Select compliant government templates to auto-populate from cooperative registers.</p>
                        
                        <div class="space-y-2.5 text-xs font-bold text-slate-700">
                            <button onclick="triggerReportGenerator('Farmer Registration')" class="w-full p-3.5 bg-slate-50 hover:bg-slate-100 rounded-2xl text-left border border-slate-100 flex items-center justify-between">
                                <span>1. Farmer Roster Audit</span>
                                <span class="text-emerald-600">📥</span>
                            </button>
                            <button onclick="triggerReportGenerator('Scheme Penetration')" class="w-full p-3.5 bg-slate-50 hover:bg-slate-100 rounded-2xl text-left border border-slate-100 flex items-center justify-between">
                                <span>2. Government Subsidy Penetration</span>
                                <span class="text-emerald-600">📥</span>
                            </button>
                            <button onclick="triggerReportGenerator('Cooperative Sourcing')" class="w-full p-3.5 bg-slate-50 hover:bg-slate-100 rounded-2xl text-left border border-slate-100 flex items-center justify-between">
                                <span>3. FPO Production Output Sheets</span>
                                <span class="text-emerald-600">📥</span>
                            </button>
                        </div>
                    </div>

                    <!-- Government Formatted Report Modal Preview (Unique Feature ⭐) -->
                    <div class="lg:col-span-2 bg-white/95 backdrop-blur-xl border border-slate-150 shadow-2xl rounded-[2.5rem] p-6 relative min-h-[300px] flex flex-col justify-between" id="report-modal-container">
                        <div class="space-y-4" id="report-default-modal-text">
                            <span class="text-3xl select-none">🏛️</span>
                            <h3 class="text-sm font-black text-slate-800">Government Format Audit Preview</h3>
                            <p class="text-xs text-slate-550 leading-relaxed font-semibold">
                                Select a document from the left list. The system will pull current farmer lists, active subsidies, and storage indices to construct a digitized submission form complying with Punjab Agriculture Dept guidelines.
                            </p>
                        </div>

                        <!-- Digitized compliance preview (hidden by default) -->
                        <div id="report-compliance-modal" class="hidden space-y-4 p-5 border-4 border-double border-slate-800 bg-slate-50/50 rounded-3xl relative select-none text-xs">
                            <div class="text-center border-b border-slate-800 pb-3">
                                <h4 class="font-black text-slate-900 uppercase tracking-widest text-sm" id="report-title-header">Farmer Registration Audit</h4>
                                <span class="text-[9px] font-bold text-slate-400 block mt-1" id="report-dept-sub">Directorate of Agriculture, Govt of Punjab</span>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-3 text-[10px]">
                                <div>
                                    <span class="text-[8px] font-black text-slate-400 uppercase">FPO Registrant</span>
                                    <p class="font-black text-slate-800" id="report-registrant">{{ auth()->user()->name ?? 'GreenHarvest FPO' }}</p>
                                </div>
                                <div>
                                    <span class="text-[8px] font-black text-slate-400 uppercase">District Office</span>
                                    <p class="font-black text-slate-800">Patiala Sub-Division</p>
                                </div>
                                <div>
                                    <span class="text-[8px] font-black text-slate-400 uppercase">Total Sourced Volume</span>
                                    <p class="font-black text-emerald-700" id="report-sourced">4,800 Tons</p>
                                </div>
                                <div>
                                    <span class="text-[8px] font-black text-slate-400 uppercase">FPC Hash Code</span>
                                    <p class="font-bold text-slate-500 font-mono text-[9px]" id="report-hash-code">A98F76DE459011B</p>
                                </div>
                            </div>
                            
                            <div class="border-t border-slate-800 pt-3 text-center">
                                <span class="text-[9px] font-black text-slate-400">Complies with Section 12-B of FPC Audit Rules.</span>
                            </div>
                        </div>

                        <div class="pt-4 flex gap-2">
                            <button onclick="downloadPDF()" class="flex-1 py-2.5 bg-slate-900 hover:bg-slate-850 text-white rounded-xl text-xs font-black shadow transition-all focus:outline-none">Download Signed PDF</button>
                        </div>
                    </div>
                </div>

                <!-- Government Submissions & Audit Logs -->
                <div class="bg-white/80 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 space-y-4 mt-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-sm font-black text-slate-800">Verified Submission Ledger</h3>
                            <p class="text-xs text-slate-405 font-bold">Historically filed compliance reports with Punjab Department of Agriculture</p>
                        </div>
                        <span class="text-[10px] bg-emerald-50 text-emerald-700 font-extrabold px-3 py-1 rounded-full border border-emerald-100 uppercase tracking-wider flex items-center gap-1">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Live Registry Sync
                        </span>
                    </div>

                    <div class="overflow-x-auto no-scrollbar">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="text-slate-400 font-bold border-b border-slate-100">
                                    <th class="pb-3 font-black uppercase tracking-wider text-[10px]">Reference / Hash</th>
                                    <th class="pb-3 font-black uppercase tracking-wider text-[10px]">Report Type</th>
                                    <th class="pb-3 font-black uppercase tracking-wider text-[10px]">Registry Metrics</th>
                                    <th class="pb-3 font-black uppercase tracking-wider text-[10px]">Department Authority</th>
                                    <th class="pb-3 font-black uppercase tracking-wider text-[10px]">Generated Date</th>
                                    <th class="pb-3 font-black uppercase tracking-wider text-[10px] text-right">Verification Status</th>
                                </tr>
                            </thead>
                            <tbody id="submission-ledger-body" class="divide-y divide-slate-50 font-semibold text-slate-700">
                                @forelse($reportLogs as $log)
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <td class="py-4 font-mono text-[10px] text-slate-500 font-bold">{{ $log->hash_code }}</td>
                                        <td class="py-4">
                                            <div class="flex items-center gap-2">
                                                <span class="text-sm">
                                                    @if(str_contains($log->report_type, 'Farmer')) 👨‍🌾 @elseif(str_contains($log->report_type, 'Subsidy') || str_contains($log->report_type, 'Scheme')) 🏛️ @else 📈 @endif
                                                </span>
                                                <span>{{ $log->report_type }}</span>
                                            </div>
                                        </td>
                                        <td class="py-4 text-slate-900 font-bold">{{ $log->metrics }}</td>
                                        <td class="py-4 text-slate-500">{{ $log->authority }}</td>
                                        <td class="py-4 text-slate-500">{{ \Carbon\Carbon::parse($log->created_at)->format('M d, Y') }}</td>
                                        <td class="py-4 text-right">
                                            <span class="px-2.5 py-1 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-full font-black text-[9px]">{{ $log->status }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-8 text-center text-slate-400 font-bold">No compliance reports generated yet. Click above to generate!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- FEATURE 10 - SMART NOTIFICATION SYSTEM (#notifications) -->
            <section id="notifications" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                        Smart Notification Alerts 📢
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Real-time disease rust advisories, cold storage warnings, and government loan reminders</p>
                </div>

                <div class="space-y-4">
                    @foreach($notifications as $notif)
                        <div class="p-4 bg-white border border-slate-100 shadow-sm rounded-3xl flex justify-between items-center hover:scale-[1.005] transition-transform duration-250 text-xs">
                            <div class="flex items-center gap-3.5">
                                <span class="text-xl p-2 bg-slate-50 rounded-2xl border border-slate-100 flex-shrink-0 select-none">
                                    @if($notif['color'] === 'red') 🔴
                                    @elseif($notif['color'] === 'purple') 🚚
                                    @elseif($notif['color'] === 'emerald') 🏛️
                                    @else ⚠️
                                    @endif
                                </span>
                                <div>
                                    <p class="font-black text-slate-800 leading-none">{{ $notif['title'] }}</p>
                                    <span class="text-[10px] font-semibold text-slate-500 block mt-1.5">{{ $notif['body'] }}</span>
                                </div>
                            </div>
                            <span class="px-2.5 py-1 text-[9px] font-black uppercase rounded-full @if($notif['color'] === 'red') bg-red-100 text-red-800 @elseif($notif['color'] === 'purple') bg-purple-100 text-purple-800 @elseif($notif['color'] === 'emerald') bg-emerald-100 text-emerald-800 @else bg-amber-100 text-amber-800 @endif">{{ $notif['badge'] }}</span>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- FEATURE FPO CROP POOLING HUB (#pooling) -->
            <section id="pooling" class="scroll-mt-24 space-y-6 hidden">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                            <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                            Farmer Crop Pooling & Wholesale Aggregator 🤝
                        </h2>
                        <p class="text-xs font-semibold text-slate-400 mt-0.5">Aggregate smallholder farmer yields into bulk B2B contracts sold at premium wholesale/MSP market rates</p>
                    </div>
                </div>

                <!-- Crop Summary Sourcing Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-5">
                    @php
                        $crops = ['Wheat', 'Rice', 'Mustard', 'Potatoes', 'Vegetables'];
                        $wholesalePrices = [
                            'Wheat'      => 2450,
                            'Rice'       => 3350,
                            'Mustard'    => 5750,
                            'Potatoes'   => 1650,
                            'Vegetables' => 1950,
                        ];
                        $msps = [
                            'Wheat'      => 2275,
                            'Rice'       => 3100,
                            'Mustard'    => 5400,
                            'Potatoes'   => 1500,
                            'Vegetables' => 1800,
                        ];
                    @endphp
                    @foreach($crops as $crop)
                        @php
                            $cropEntries = $cropPools->where('crop_type', $crop);
                            $pendingQty = $cropEntries->where('status', 'Pooled')->sum('quantity');
                            $soldQty = $cropEntries->where('status', 'Aggregated & Sold')->sum('quantity');
                            $wPrice = $wholesalePrices[$crop];
                        @endphp
                        <div class="bg-white border border-slate-100 shadow-sm rounded-3xl p-5 flex flex-col justify-between hover:scale-[1.02] transition-transform duration-300">
                            <div>
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl">
                                        @if($crop == 'Wheat') 🌾
                                        @elseif($crop == 'Rice') 🍚
                                        @elseif($crop == 'Mustard') 🟡
                                        @elseif($crop == 'Potatoes') 🥔
                                        @else 🥦
                                        @endif
                                    </span>
                                    <span class="text-[9px] bg-slate-150 text-slate-700 px-2 py-0.5 rounded-full font-black uppercase">FPO Pool</span>
                                </div>
                                <h4 class="text-sm font-black text-slate-800 mt-3">{{ $crop }}</h4>
                                <p class="text-[10px] text-slate-400 font-bold mt-1">Pending: <span class="text-amber-600 font-black" id="pending-qty-{{ $crop }}">{{ $pendingQty }} qtl</span></p>
                                <p class="text-[10px] text-slate-400 font-bold">Aggregated: <span class="text-emerald-600 font-black" id="aggregated-qty-{{ $crop }}">{{ $soldQty }} qtl</span></p>
                            </div>

                            <div class="mt-4 pt-3 border-t border-slate-50">
                                <span class="text-[9px] font-black text-slate-400 uppercase block">Premium Wholesale</span>
                                <span class="text-xs font-black text-emerald-700">₹{{ number_format($wPrice) }} / qtl</span>
                                
                                <button onclick="triggerAggregation('{{ $crop }}')" id="agg-btn-{{ $crop }}" class="w-full mt-3 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-[9px] font-black uppercase tracking-wider transition-colors shadow-sm {{ $pendingQty == 0 ? 'opacity-40 cursor-not-allowed' : '' }}" {{ $pendingQty == 0 ? 'disabled' : '' }}>
                                    Aggregate & Sell
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Ledger Table of all Crop Poolings -->
                <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 overflow-hidden">
                    <h3 class="text-sm font-black text-slate-800 mb-4">Farmer Pooling Transactions</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs text-left">
                            <thead class="bg-slate-50 text-slate-400 font-black uppercase text-[10px]">
                                <tr>
                                    <th class="p-3.5 rounded-l-2xl">Farmer Name</th>
                                    <th class="p-3.5">Crop Type</th>
                                    <th class="p-3.5">Quantity</th>
                                    <th class="p-3.5">Rate Paid (MSP)</th>
                                    <th class="p-3.5">Total Value</th>
                                    <th class="p-3.5">Status</th>
                                    <th class="p-3.5 text-right rounded-r-2xl">Date Pooled</th>
                                </tr>
                            </thead>
                            <tbody id="fpo-pooling-table-rows" class="divide-y divide-slate-50 font-semibold text-slate-600">
                                @foreach($cropPools as $pool)
                                    <tr>
                                        <td class="p-3.5 font-black text-slate-800">{{ $pool->farmer_name ?? 'Cooperative Farmer' }}</td>
                                        <td class="p-3.5">{{ $pool->crop_type }}</td>
                                        <td class="p-3.5">{{ $pool->quantity }} Quintals</td>
                                        <td class="p-3.5">₹{{ number_format($pool->price_per_unit) }}/qtl</td>
                                        <td class="p-3.5 font-black text-slate-800">₹{{ number_format($pool->total_value) }}</td>
                                        <td class="p-3.5">
                                            <span class="px-2 py-0.5 text-[9px] font-black uppercase rounded-full @if($pool->status === 'Pooled') bg-amber-100 text-amber-800 @else bg-emerald-100 text-emerald-800 @endif">
                                                {{ $pool->status }}
                                            </span>
                                        </td>
                                        <td class="p-3.5 text-right font-semibold text-slate-450">{{ \Carbon\Carbon::parse($pool->created_at)->format('d M Y, h:i A') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- FPO Profile Modal Overlay -->
<div id="fpo-profile-modal" class="fixed inset-0 z-[60] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm hidden">
    <div class="bg-white rounded-[2.5rem] shadow-2xl border border-slate-100 w-full max-w-md mx-4 p-8 relative">
        <button onclick="closeFpoProfileModal()" class="absolute top-5 right-5 p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-500 transition-colors focus:outline-none">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        <!-- Avatar -->
        <div class="flex items-center gap-4 mb-6">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-emerald-500 to-purple-600 flex items-center justify-center font-black text-white text-2xl shadow-lg shadow-emerald-500/20">
                {{ strtoupper(substr(auth()->user()->name ?? 'GH', 0, 2)) }}
            </div>
            <div>
                <h2 class="text-lg font-black text-slate-900 tracking-tight">{{ auth()->user()->name ?? 'GreenHarvest FPO' }}</h2>
                <p class="text-xs font-bold text-emerald-600 uppercase tracking-widest">FPO Enterprise • District Union</p>
            </div>
        </div>
        <!-- Info rows -->
        <div class="space-y-3">
            <div class="flex items-center justify-between p-3.5 bg-slate-50 rounded-2xl border border-slate-100">
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Email</span>
                <span class="text-xs font-black text-slate-800">{{ auth()->user()->email ?? 'fpo@farmtech.org' }}</span>
            </div>
            <div class="flex items-center justify-between p-3.5 bg-slate-50 rounded-2xl border border-slate-100">
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Role</span>
                <span class="text-xs font-black text-emerald-700">FPO Enterprise Administrator</span>
            </div>
            <div class="flex items-center justify-between p-3.5 bg-slate-50 rounded-2xl border border-slate-100">
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">District</span>
                <span class="text-xs font-black text-slate-800">Patiala, Punjab</span>
            </div>
            <div class="flex items-center justify-between p-3.5 bg-emerald-50 rounded-2xl border border-emerald-100">
                <span class="text-[10px] font-black text-emerald-600 uppercase tracking-wider">Verification Code</span>
                <span class="text-xs font-black text-emerald-800 font-mono">FPO-IN-9844</span>
            </div>
        </div>
        <!-- Close button -->
        <button onclick="closeFpoProfileModal()" class="w-full mt-6 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white rounded-2xl text-xs font-black uppercase tracking-wider shadow-lg transition-all">
            Close Profile
        </button>
    </div>
</div>

<!-- Global FPO Dashboard Styles -->
<style>
    /* No scrollbar utility for dropdowns & sidebars */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    /* Active sidebar tab — SHG-identical emerald gradient pill */
    .active-tab {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
        color: #fff !important;
        border-left: none !important;
        border-radius: 14px !important;
        box-shadow: 0 4px 16px rgba(16,185,129,0.35), 0 1px 4px rgba(16,185,129,0.2);
        font-weight: 900 !important;
    }
    .sidebar-link:not(.active-tab):hover {
        background: rgba(16,185,129,0.12) !important;
        color: #065f46 !important;
        border-radius: 14px;
    }
</style>

<!-- JavaScript and Chart.js code block -->
<script>
    // Toggle mobile sidebar drawer
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar-drawer');
        const backdrop = document.getElementById('sidebar-backdrop');
        sidebar.classList.toggle('-translate-x-full');
        backdrop.classList.toggle('hidden');
    }

    // Interactive Farmer search filter village-wise
    function filterFarmerTable() {
        const input = document.getElementById('farmer-search');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('farmer-roster-table');
        const tr = table.getElementsByTagName('tr');

        for (let i = 1; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName('td')[1]; // Village column
            if (td) {
                let txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Reset Demo Data
    function resetDemoData() {
        if (!confirm('Are you sure you want to reset all FPO demo data to the initial seeded state? This will clear all manual additions, edits, and deletions.')) return;
        
        fetch('{{ route("fpo.reset-demo") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                window.location.reload();
            } else {
                alert('Reset failed: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(err => {
            console.error('Reset failed', err);
            alert('An error occurred during reset.');
        });
    }

    // AJAX Farmer registration & updates
    function submitFarmerRegister(event) {
        event.preventDefault();
        
        const id = document.getElementById('f_id').value;
        const name = document.getElementById('f_name').value.trim();
        const village = document.getElementById('f_village').value;
        const crop = document.getElementById('f_crop').value;
        const land = document.getElementById('f_land').value;

        const isEdit = !!id;
        const url = isEdit ? '{{ route("fpo.farmer.update") }}' : '{{ route("fpo.farmer.add") }}';
        const payload = isEdit ? { id: id, name: name, village: village, crop_type: crop, land_area: land } : { name: name, village: village, crop_type: crop, land_area: land };

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const f = data.farmer;
                
                if (isEdit) {
                    const row = document.getElementById(`farmer-row-${f.id}`);
                    if (row) {
                        row.innerHTML = `
                            <td class="p-3.5 font-black text-slate-800">${f.name}</td>
                            <td class="p-3.5">${f.village}</td>
                            <td class="p-3.5">${f.crop_type}</td>
                            <td class="p-3.5">${f.land_area} Acres</td>
                            <td class="p-3.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-16 bg-slate-100 rounded-full h-2">
                                        <div class="h-2 rounded-full ${f.performance_score >= 80 ? 'bg-emerald-500' : (f.performance_score >= 60 ? 'bg-purple-500' : 'bg-red-500')}" style="width: ${f.performance_score}%"></div>
                                    </div>
                                    <span class="font-black text-[10px]">${f.performance_score}/100</span>
                                </div>
                            </td>
                            <td class="p-3.5">
                                <span class="px-2 py-0.5 text-[9px] font-black uppercase rounded-full ${f.scheme_status === 'Active' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800'}">${f.scheme_status}</span>
                            </td>
                            <td class="p-3.5 text-right whitespace-nowrap">
                                <button onclick="editFarmer('${f.id}', '${f.name.replace(/'/g, "\\'")}', '${f.village}', '${f.crop_type}', '${f.land_area}')" class="p-1.5 text-slate-400 hover:text-emerald-600 transition-colors" title="Edit Farmer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </button>
                                <button onclick="deleteFarmer('${f.id}')" class="p-1.5 text-slate-400 hover:text-red-650 transition-colors ml-1" title="Delete Farmer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </td>
                        `;
                    }
                    cancelFarmerEdit();
                } else {
                    // Add row to farmer table
                    const table = document.getElementById('farmer-table-rows');
                    const row = document.createElement('tr');
                    row.id = `farmer-row-${f.id}`;
                    row.className = "divide-y divide-slate-50 font-semibold text-slate-600";
                    row.innerHTML = `
                        <td class="p-3.5 font-black text-slate-800">${f.name}</td>
                        <td class="p-3.5">${f.village}</td>
                        <td class="p-3.5">${f.crop_type}</td>
                        <td class="p-3.5">${f.land_area} Acres</td>
                        <td class="p-3.5">
                            <div class="flex items-center gap-2">
                                <div class="w-16 bg-slate-100 rounded-full h-2">
                                    <div class="h-2 rounded-full ${f.performance_score >= 80 ? 'bg-emerald-500' : (f.performance_score >= 60 ? 'bg-purple-500' : 'bg-red-500')}" style="width: ${f.performance_score}%"></div>
                                </div>
                                <span class="font-black text-[10px]">${f.performance_score}/100</span>
                            </div>
                        </td>
                        <td class="p-3.5">
                            <span class="px-2 py-0.5 text-[9px] font-black uppercase rounded-full ${f.scheme_status === 'Active' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800'}">${f.scheme_status}</span>
                        </td>
                        <td class="p-3.5 text-right whitespace-nowrap">
                            <button onclick="editFarmer('${f.id}', '${f.name.replace(/'/g, "\\'")}', '${f.village}', '${f.crop_type}', '${f.land_area}')" class="p-1.5 text-slate-400 hover:text-emerald-600 transition-colors" title="Edit Farmer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </button>
                            <button onclick="deleteFarmer('${f.id}')" class="p-1.5 text-slate-400 hover:text-red-650 transition-colors ml-1" title="Delete Farmer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </td>
                    `;
                    table.insertBefore(row, table.firstChild);
                    document.getElementById('add-farmer-form').reset();
                }
                alert(data.message);
            }
        })
        .catch(err => {
            console.error('Farmer registration/update failed', err);
        });
    }

    function editFarmer(id, name, village, crop, land) {
        document.getElementById('f_id').value = id;
        document.getElementById('f_name').value = name;
        document.getElementById('f_village').value = village;
        document.getElementById('f_crop').value = crop;
        document.getElementById('f_land').value = land;

        document.getElementById('farmer-form-title').innerText = 'Edit Cooperative Farmer';
        document.getElementById('farmer-submit-btn').innerText = 'UPDATE FARMER DETAILS';
        document.getElementById('farmer-cancel-btn').classList.remove('hidden');
        
        document.getElementById('farmer-form-title').scrollIntoView({ behavior: 'smooth' });
    }

    function cancelFarmerEdit() {
        document.getElementById('f_id').value = '';
        document.getElementById('add-farmer-form').reset();

        document.getElementById('farmer-form-title').innerText = 'Add Cooperative Farmer';
        document.getElementById('farmer-submit-btn').innerText = 'REGISTER NEW FARMER';
        document.getElementById('farmer-cancel-btn').classList.add('hidden');
    }

    function deleteFarmer(id) {
        if (!confirm('Are you sure you want to delete this farmer?')) return;
        
        fetch(`/fpo/farmer/delete/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const row = document.getElementById(`farmer-row-${id}`);
                if (row) row.remove();
                alert(data.message);
            }
        })
        .catch(err => {
            console.error('Farmer deletion failed', err);
        });
    }

    // AJAX Logistics Schedule & Route optimization
    function submitLogisticsBooking(event) {
        event.preventDefault();
        
        const vehicle = document.getElementById('l_vehicle').value;
        const driver = document.getElementById('l_driver').value.trim();
        const route = document.getElementById('l_route').value;
        const date = document.getElementById('l_date').value;

        fetch('{{ route("fpo.logistics.book") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ vehicle: vehicle, driver: driver, route: route, delivery_date: date })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const log = data.logistics;
                
                // Append row to logistics table
                const table = document.getElementById('logistics-table-rows');
                const row = document.createElement('tr');
                row.id = `logistics-row-${log.id}`;
                row.className = "divide-y divide-slate-50 font-semibold text-slate-600";
                row.innerHTML = `
                    <td class="p-3.5 font-black text-slate-800">${log.vehicle}</td>
                    <td class="p-3.5">${log.driver}</td>
                    <td class="p-3.5">${log.delivery_date}</td>
                    <td class="p-3.5">${log.route}</td>
                    <td class="p-3.5">
                        <span class="px-2.5 py-0.5 text-[9px] font-black uppercase bg-slate-100 text-slate-500 rounded-full">${log.status}</span>
                    </td>
                    <td class="p-3.5 text-right">
                        <button onclick="cancelLogistics('${log.id}')" class="px-2 py-1 bg-red-50 hover:bg-red-100 text-red-650 rounded-lg text-[9px] font-black uppercase tracking-wider transition-colors shadow-sm" title="Cancel Booking">Cancel</button>
                    </td>
                `;
                table.insertBefore(row, table.firstChild);
                
                // Reset form
                document.getElementById('logistics-booking-form').reset();
                
                // Alert optimized route details
                alert(`${data.message}\n\n🔍 Route Advice: ${data.optimization_suggestion}`);
            }
        })
        .catch(err => {
            console.error('Logistics booking failed', err);
        });
    }

    function cancelLogistics(id) {
        if (!confirm('Are you sure you want to cancel this fleet dispatch schedule?')) return;
        
        fetch(`/fpo/logistics/delete/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const row = document.getElementById(`logistics-row-${id}`);
                if (row) row.remove();
                alert(data.message);
            }
        })
        .catch(err => {
            console.error('Logistics cancellation failed', err);
        });
    }

    // Equipment Tab Switcher
    function switchEquipmentTab(tab) {
        if (tab === 'finder') {
            document.getElementById('eq-panel-finder').classList.remove('hidden');
            document.getElementById('eq-panel-register').classList.add('hidden');
            document.getElementById('eq-tab-finder-btn').className = 'flex-1 text-center py-1 text-purple-600 border-b-2 border-purple-600 focus:outline-none';
            document.getElementById('eq-tab-register-btn').className = 'flex-1 text-center py-1 text-slate-400 focus:outline-none';
        } else {
            document.getElementById('eq-panel-finder').classList.add('hidden');
            document.getElementById('eq-panel-register').classList.remove('hidden');
            document.getElementById('eq-tab-finder-btn').className = 'flex-1 text-center py-1 text-slate-400 focus:outline-none';
            document.getElementById('eq-tab-register-btn').className = 'flex-1 text-center py-1 text-purple-600 border-b-2 border-purple-600 focus:outline-none';
        }
    }

    // AJAX Equipment Sourcing & Registration
    function submitEquipmentForm(event) {
        event.preventDefault();
        
        const id = document.getElementById('eq_id').value;
        const name = document.getElementById('eq_name').value.trim();
        const price = document.getElementById('eq_rate').value;
        const location = document.getElementById('eq_location').value;
        const owner = document.getElementById('eq_owner').value.trim();

        const isEdit = !!id;
        const url = isEdit ? '{{ route("fpo.equipment.update") }}' : '{{ route("fpo.equipment.add") }}';
        const payload = isEdit ? { id: id, equipment_name: name, price: price, location: location, owner: owner } : { equipment_name: name, price: price, location: location, owner: owner };

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const eq = data.equipment;
                const priceFormatted = parseFloat(eq.price).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const emoji = name.toLowerCase().includes('tractor') ? '🚜' : (name.toLowerCase().includes('harvester') ? '🌾' : '🛸');
                
                if (isEdit) {
                    const card = document.getElementById(`eq-card-${eq.id}`);
                    if (card) {
                        card.innerHTML = `
                            <div class="absolute top-4 right-4 flex gap-1.5 opacity-0 group-hover/card:opacity-100 transition-opacity">
                                <button onclick="editEquipment('${eq.id}', '${eq.equipment_name.replace(/'/g, "\\'")}', '${eq.price}', '${eq.location}', '${eq.owner.replace(/'/g, "\\'")}')" class="w-7 h-7 rounded-full bg-white border border-slate-150 text-slate-450 hover:text-purple-600 flex items-center justify-center shadow-sm transition-colors" title="Edit Machinery">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </button>
                                <button onclick="deleteEquipment('${eq.id}')" class="w-7 h-7 rounded-full bg-white border border-slate-150 text-slate-450 hover:text-red-650 flex items-center justify-center shadow-sm transition-colors" title="Delete Machinery">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                            <div>
                                <span class="text-3xl select-none">${emoji}</span>
                                <h4 class="text-xs font-black text-slate-800 mt-3 eq-card-name">${eq.equipment_name}</h4>
                                <p class="text-[10px] text-slate-400 font-bold leading-none mt-1 eq-card-location">Location: ${eq.location}</p>
                                <p class="text-[9px] text-slate-400 font-bold mt-1.5 eq-card-owner">Owner: ${eq.owner || 'Cooperative'}</p>
                            </div>
                            <div class="mt-5">
                                <span class="text-[9px] font-black text-slate-400 uppercase">Coop Rate</span>
                                <p class="text-sm font-black text-purple-700 eq-card-price">₹${priceFormatted}/day</p>
                                <button onclick="bookEquipment(this)" class="w-full mt-3 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-[10px] font-black uppercase tracking-wider transition-colors duration-300">Book Now</button>
                            </div>
                        `;
                    }
                    cancelEquipmentEdit();
                } else {
                    const roster = document.getElementById('equipment-roster-container');
                    const card = document.createElement('div');
                    card.id = `eq-card-${eq.id}`;
                    card.className = "bg-white border border-slate-100 shadow-sm rounded-3xl p-5 hover:scale-[1.02] transition-transform duration-300 flex flex-col justify-between relative group/card";
                    card.innerHTML = `
                        <div class="absolute top-4 right-4 flex gap-1.5 opacity-0 group-hover/card:opacity-100 transition-opacity">
                            <button onclick="editEquipment('${eq.id}', '${eq.equipment_name.replace(/'/g, "\\'")}', '${eq.price}', '${eq.location}', '${eq.owner.replace(/'/g, "\\'")}')" class="w-7 h-7 rounded-full bg-white border border-slate-150 text-slate-450 hover:text-purple-600 flex items-center justify-center shadow-sm transition-colors" title="Edit Machinery">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </button>
                            <button onclick="deleteEquipment('${eq.id}')" class="w-7 h-7 rounded-full bg-white border border-slate-150 text-slate-450 hover:text-red-650 flex items-center justify-center shadow-sm transition-colors" title="Delete Machinery">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                        <div>
                            <span class="text-3xl select-none">${emoji}</span>
                            <h4 class="text-xs font-black text-slate-800 mt-3 eq-card-name">${eq.equipment_name}</h4>
                            <p class="text-[10px] text-slate-400 font-bold leading-none mt-1 eq-card-location">Location: ${eq.location}</p>
                            <p class="text-[9px] text-slate-400 font-bold mt-1.5 eq-card-owner">Owner: ${eq.owner || 'Cooperative'}</p>
                        </div>
                        <div class="mt-5">
                            <span class="text-[9px] font-black text-slate-400 uppercase">Coop Rate</span>
                            <p class="text-sm font-black text-purple-700 eq-card-price">₹${priceFormatted}/day</p>
                            <button onclick="bookEquipment(this)" class="w-full mt-3 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-[10px] font-black uppercase tracking-wider transition-colors duration-300">Book Now</button>
                        </div>
                    `;
                    roster.insertBefore(card, roster.firstChild);
                    document.getElementById('add-equipment-form').reset();
                }
                alert(data.message);
            }
        })
        .catch(err => {
            console.error('Equipment action failed', err);
        });
    }

    function editEquipment(id, name, price, location, owner) {
        switchEquipmentTab('register');

        document.getElementById('eq_id').value = id;
        document.getElementById('eq_name').value = name;
        document.getElementById('eq_rate').value = price;
        document.getElementById('eq_location').value = location;
        document.getElementById('eq_owner').value = owner;

        document.getElementById('equipment-form-title').innerText = 'Edit Machinery';
        document.getElementById('eq-submit-btn').innerText = 'UPDATE DETAILS';
        document.getElementById('eq-cancel-btn').classList.remove('hidden');
    }

    function cancelEquipmentEdit() {
        document.getElementById('eq_id').value = '';
        document.getElementById('add-equipment-form').reset();

        document.getElementById('equipment-form-title').innerText = 'Register Machinery';
        document.getElementById('eq-submit-btn').innerText = 'REGISTER';
        document.getElementById('eq-cancel-btn').classList.add('hidden');
    }

    function deleteEquipment(id) {
        if (!confirm('Are you sure you want to remove this equipment from the collective pool?')) return;
        
        fetch(`/fpo/equipment/delete/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const card = document.getElementById(`eq-card-${id}`);
                if (card) card.remove();
                alert(data.message);
            }
        })
        .catch(err => {
            console.error('Equipment deletion failed', err);
        });
    }

    // AJAX Cheapest Nearby Machinery scan
    function triggerCheapestFinder() {
        const feed = document.getElementById('cheapest-machinery-feed');
        feed.innerHTML = `
            <div class="flex items-center justify-center py-6 text-emerald-600 animate-pulse text-xs font-bold">
                🚜 Sifting tractor customary rates...
            </div>
        `;

        fetch('{{ route("fpo.equipment.rent") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const eq = data.equipment;
                feed.innerHTML = `
                    <div class="p-4 bg-gradient-to-br from-emerald-500/10 to-teal-500/10 border border-emerald-100 rounded-3xl flex flex-col justify-between space-y-3 hover:scale-[1.01] transition-transform">
                        <div>
                            <span class="text-[9px] bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-black uppercase tracking-wider">Cheapest Available Machinery</span>
                            <h4 class="text-xs font-black text-slate-800 mt-1.5">${eq.equipment_name}</h4>
                            <p class="text-[10px] text-slate-500 font-bold leading-normal mt-1">Location: ${eq.location} • Associated Pool</p>
                        </div>
                        <div class="flex items-center justify-between text-xs font-black">
                            <span class="text-emerald-700">₹${eq.price}/day</span>
                            <button onclick="alert('Tractor booked!')" class="px-3.5 py-1.5 bg-emerald-600 text-white rounded-xl shadow-sm uppercase text-[9px]">Confirm Booking</button>
                        </div>
                    </div>
                `;
            }
        })
        .catch(err => {
            console.error('Cheapest scan failed', err);
        });
    }

    // AJAX Audit Government Formatted report preview
    function triggerReportGenerator(type) {
        fetch('{{ route("fpo.reports.download") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ type: type })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const p = data.payload;
                const r = data.report;
                
                document.getElementById('report-default-modal-text').classList.add('hidden');
                document.getElementById('report-compliance-modal').classList.remove('hidden');
                
                document.getElementById('report-title-header').innerText = r.report_type;
                document.getElementById('report-dept-sub').innerText = 'FPC Directorate Audit Form • Section 12-B';
                document.getElementById('report-registrant').innerText = p.fpo_title;
                document.getElementById('report-sourced').innerText = r.metrics;
                document.getElementById('report-hash-code').innerText = r.hash_code;

                // Prepend dynamically to submission ledger
                const ledgerBody = document.getElementById('submission-ledger-body');
                if (ledgerBody) {
                    // Remove empty placeholder if it exists
                    if (ledgerBody.innerHTML.includes('No compliance reports generated yet')) {
                        ledgerBody.innerHTML = '';
                    }

                    let icon = '📈';
                    if (r.report_type.includes('Farmer')) icon = '👨‍🌾';
                    else if (r.report_type.includes('Subsidy') || r.report_type.includes('Scheme')) icon = '🏛️';

                    const dateStr = new Date(r.created_at).toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' });

                    const newRow = document.createElement('tr');
                    newRow.className = "hover:bg-slate-50/50 transition-colors animate-fade-in";
                    newRow.innerHTML = `
                        <td class="py-4 font-mono text-[10px] text-slate-500 font-bold">${r.hash_code}</td>
                        <td class="py-4">
                            <div class="flex items-center gap-2">
                                <span class="text-sm">${icon}</span>
                                <span>${r.report_type}</span>
                            </div>
                        </td>
                        <td class="py-4 text-slate-900 font-bold">${r.metrics}</td>
                        <td class="py-4 text-slate-500">${r.authority}</td>
                        <td class="py-4 text-slate-500">${dateStr}</td>
                        <td class="py-4 text-right">
                            <span class="px-2.5 py-1 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-full font-black text-[9px]">${r.status}</span>
                        </td>
                    `;
                    ledgerBody.insertBefore(newRow, ledgerBody.firstChild);
                }
            }
        })
        .catch(err => {
            console.error('Report generator failed', err);
        });
    }

    // AJAX Bulk Order Approval & Rejection
    function approveOrder(id, orderValue) {
        if (!confirm('Are you sure you want to approve this wholesale contract?')) return;
        
        fetch(`/fpo/order/approve/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                // Update status badge
                const statusCell = document.getElementById(`order-status-${id}`);
                if (statusCell) {
                    statusCell.innerHTML = `
                        <span class="px-2 py-0.5 text-[9px] font-black uppercase rounded-full bg-emerald-100 text-emerald-800">
                            Approved
                        </span>
                    `;
                }
                
                // Update actions cell
                const actionsCell = document.getElementById(`order-actions-${id}`);
                if (actionsCell) {
                    actionsCell.innerHTML = `<span class="text-[10px] text-slate-400 font-black uppercase tracking-wider">No Action Required</span>`;
                }

                // Update Monthly Revenue in stats card
                const revCard = document.getElementById('stat-monthly-revenue');
                if (revCard) {
                    let curValText = revCard.innerText.replace(/[^\d]/g, '');
                    let curVal = parseInt(curValText) || 0;
                    let newVal = curVal + parseFloat(orderValue);
                    revCard.innerText = '₹' + newVal.toLocaleString('en-IN');
                }

                // Update Pending Orders count in stats card
                const pendCard = document.getElementById('stat-pending-orders');
                if (pendCard) {
                    let curCount = parseInt(pendCard.innerText) || 0;
                    if (curCount > 0) {
                        pendCard.innerText = curCount - 1;
                    }
                }

                alert(data.message);
            }
        })
        .catch(err => {
            console.error('Order approval failed', err);
        });
    }

    function rejectOrder(id) {
        if (!confirm('Are you sure you want to reject this wholesale contract?')) return;
        
        fetch(`/fpo/order/reject/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                // Update status badge
                const statusCell = document.getElementById(`order-status-${id}`);
                if (statusCell) {
                    statusCell.innerHTML = `
                        <span class="px-2 py-0.5 text-[9px] font-black uppercase rounded-full bg-red-100 text-red-800">
                            Rejected
                        </span>
                    `;
                }
                
                // Update actions cell
                const actionsCell = document.getElementById(`order-actions-${id}`);
                if (actionsCell) {
                    actionsCell.innerHTML = `<span class="text-[10px] text-slate-400 font-black uppercase tracking-wider">No Action Required</span>`;
                }

                // Update Pending Orders count in stats card
                const pendCard = document.getElementById('stat-pending-orders');
                if (pendCard) {
                    let curCount = parseInt(pendCard.innerText) || 0;
                    if (curCount > 0) {
                        pendCard.innerText = curCount - 1;
                    }
                }

                alert(data.message);
            }
        })
        .catch(err => {
            console.error('Order rejection failed', err);
        });
    }

    // CHART.JS ENGINE GRAPH CONFIGURATION
    document.addEventListener('DOMContentLoaded', () => {
        
        // 1. Crop Yield Distribution Bar Chart
        const yieldCtx = document.getElementById('cropYieldChart').getContext('2d');
        new Chart(yieldCtx, {
            type: 'bar',
            data: {
                labels: ['Kalyan Wheat', 'Nabha Basmati', 'Bhawanigarh Mustard'],
                datasets: [{
                    label: 'Sourced Crop volume (Tons)',
                    data: [2800, 1500, 500],
                    backgroundColor: [
                        'rgba(16, 185, 129, 0.7)', // Emerald
                        'rgba(139, 92, 246, 0.7)', // Purple
                        'rgba(245, 158, 11, 0.7)'  // Amber
                    ],
                    borderColor: '#fff',
                    borderWidth: 2,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { font: { family: 'Outfit', weight: 'bold' } } },
                    y: { grid: { color: 'rgba(226, 232, 240, 0.5)' }, ticks: { font: { family: 'Outfit', weight: 'bold' } } }
                }
            }
        });

        // 2. Government Scheme Distribution Pie Chart
        const schemeCtx = document.getElementById('schemeDistributionChart').getContext('2d');
        new Chart(schemeCtx, {
            type: 'pie',
            data: {
                labels: ['PM-KISAN (Subsidies)', 'SMAM (Drone Rentals)', 'Soil Health Cards'],
                datasets: [{
                    data: [85, 45, 20],
                    backgroundColor: [
                        '#10b981', // Emerald
                        '#8b5cf6', // Purple
                        '#f59e0b'  // Amber
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } }
            }
        });

        // 3. Wheat Yield Line Trend & Forecast Chart
        const trendCtx = document.getElementById('yieldPredictionChart').getContext('2d');
        new Chart(trendCtx, {
            type: 'line',
            data: {
                labels: ['Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [
                    {
                        label: 'Estimated Wheat Yield (Tons)',
                        data: [200, 240, 290, 340, 390, 420],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'District Average Index',
                        data: [150, 180, 210, 260, 300, 330],
                        borderColor: '#8b5cf6',
                        borderWidth: 2,
                        borderDash: [5, 5],
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { font: { family: 'Outfit', weight: 'bold' } } },
                    y: { grid: { color: 'rgba(226, 232, 240, 0.5)' }, ticks: { font: { family: 'Outfit', weight: 'bold' } } }
                }
            }
        });

        // 4. Fleet Savings Index Line Chart (Additional Analytics ⭐)
        const savingsCtx = document.getElementById('savingsChart').getContext('2d');
        new Chart(savingsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Highway Toll Savings Index (₹)',
                    data: [4200, 5800, 7200, 8900, 10500, 12500],
                    borderColor: '#8b5cf6',
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { font: { family: 'Outfit', weight: 'bold' } } },
                    y: { grid: { color: 'rgba(226, 232, 240, 0.5)' }, ticks: { font: { family: 'Outfit', weight: 'bold' } } }
                }
            }
        });

        // Initialize dynamic quotes and diagnostics
        if (window.updatePacsEstimates) window.updatePacsEstimates();
        if (window.updateSoilNutrientPlanners) window.updateSoilNutrientPlanners();
    });

    // PACS Sourcing Pricing Estimator
    window.updatePacsEstimates = function() {
        const select = document.getElementById('pacs_hub_select');
        const qtyInput = document.getElementById('pacs_qty_input');
        
        if (!select || !qtyInput) return;
        
        const selectedOption = select.options[select.selectedIndex];
        const rate = parseFloat(selectedOption.getAttribute('data-rate')) || 750;
        const stock = parseInt(selectedOption.getAttribute('data-stock')) || 120;
        const qty = parseFloat(qtyInput.value) || 0;
        
        // Calculate pricing (₹4,500 base fertilizer sourcing rate per ton)
        const pricing = qty * 4500;
        
        document.getElementById('pacs_quote_text').innerText = '₹' + pricing.toLocaleString('en-IN');
        document.getElementById('pacs_tractor_text').innerText = '₹' + rate + '/hour';
        document.getElementById('pacs_stock_text').innerText = stock + ' Tons Stocked';
    }

    // Soil Nutrient Diagnostics Planner
    window.updateSoilNutrientPlanners = function() {
        const cropSelect = document.getElementById('target_soil_crop');
        const recBox = document.getElementById('soil_recommendation_box');
        
        if (!cropSelect || !recBox) return;
        
        const crop = cropSelect.value;
        
        let n = '42%', p = '68%', k = '55%';
        let advice = '';
        
        if (crop === 'wheat') {
            n = '42%'; p = '68%'; k = '55%';
            advice = '💡 **Basmati Wheat Soil Advice:** Deficient nitrogen levels detected! Sourcing +3.5 Tons of nitrogen fertilizer reserve is recommended to secure optimal crop yield.';
        } else if (crop === 'rice') {
            n = '88%'; p = '45%'; k = '78%';
            advice = '💡 **Basmati Rice Soil Advice:** Optimal nitrogen reserve, but deficient phosphorus detected! Sourcing +2.8 Tons of phosphate and potash mix is advised.';
        } else if (crop === 'mustard') {
            n = '55%'; p = '72%'; k = '35%';
            advice = '💡 **Organic Mustard Soil Advice:** Moderate nutrient distribution. High deficiency in Potassium (K) noted. Apply potash mix to secure high oil content indices.';
        }
        
        document.getElementById('soil_n_val').innerText = n;
        document.getElementById('soil_p_val').innerText = p;
        document.getElementById('soil_k_val').innerText = k;
        recBox.innerHTML = advice;
    }

    // Navbar Dropdown Toggle (SHG-identical pattern)
    function toggleNavbarDropdown(dropdownId, event) {
        if (event) event.stopPropagation();
        const dropdowns = ['fpo-notifications-dropdown', 'fpo-profile-dropdown'];
        dropdowns.forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                if (id === dropdownId) {
                    el.classList.toggle('hidden');
                } else {
                    el.classList.add('hidden');
                }
            }
        });
    }

    // Close dropdowns on outside clicks
    window.addEventListener('click', function() {
        const dropdowns = ['fpo-notifications-dropdown', 'fpo-profile-dropdown'];
        dropdowns.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.classList.add('hidden');
        });
    });

    // FPO Profile Modal
    function openFpoProfileModal() {
        const modal = document.getElementById('fpo-profile-modal');
        if (modal) modal.classList.remove('hidden');
        // Close profile dropdown
        const dd = document.getElementById('fpo-profile-dropdown');
        if (dd) dd.classList.add('hidden');
    }

    function closeFpoProfileModal() {
        const modal = document.getElementById('fpo-profile-modal');
        if (modal) modal.classList.add('hidden');
    }

    // SPA Navigation Logic
    window.switchTab = function(tabId, event = null) {
        if (event) event.preventDefault();
        
        const sections = ['overview', 'farmers', 'analytics', 'logistics', 'warehouse', 'equipment', 'gis', 'yield', 'orders', 'reports', 'notifications', 'pooling'];
        
        // Hide all sections, show active
        sections.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.classList.add('hidden');
        });
        
        const activeEl = document.getElementById(tabId);
        if (activeEl) {
            activeEl.classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Update sidebar links UI
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.classList.remove('active-tab');
            if (link.getAttribute('href') === `#${tabId}`) {
                link.classList.add('active-tab');
            }
        });

        // Close mobile drawer if open
        const sidebar = document.getElementById('sidebar-drawer');
        if (sidebar && !sidebar.classList.contains('-translate-x-full') && window.innerWidth < 1024) {
            toggleSidebar();
        }
    }

    // Trigger Crop Sourcing Aggregation
    async function triggerAggregation(cropType) {
        if (!confirm(`Are you sure you want to aggregate all pending quantities of ${cropType} into a B2B Bulk Contract?`)) return;

        const btn = document.getElementById(`agg-btn-${cropType}`);
        const originalText = btn.innerHTML;
        btn.innerHTML = 'Aggregating...';
        btn.disabled = true;

        try {
            const res = await fetch('{{ route("fpo.crop.aggregate") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ crop_type: cropType })
            });

            const data = await res.json();
            if (data.status === 'success') {
                alert(data.message);
                window.location.reload();
            } else {
                alert(data.message || 'Aggregation failed.');
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        } catch (err) {
            console.error(err);
            alert('Server error occurred during crop pooling aggregation.');
            btn.innerHTML = originalText;
            btn.disabled = false;
        }
    }
    // Equipment Booking Functionality
    function bookEquipment(button) {
        // Change button state to booked
        const originalText = button.innerHTML;
        button.innerHTML = 'Booking...';
        button.classList.remove('bg-purple-600', 'hover:bg-purple-700');
        button.classList.add('bg-slate-400', 'cursor-wait');
        
        // Simulate network request
        setTimeout(() => {
            button.innerHTML = '✓ BOOKED';
            button.classList.remove('bg-slate-400', 'cursor-wait');
            button.classList.add('bg-emerald-500', 'hover:bg-emerald-600');
            button.disabled = true;
            
            // Show a simple alert for confirmation
            alert('Equipment booked successfully!');
        }, 1200);
    }
    
    function bookCheapestEquipment(button) {
        // Change button state to booked
        const originalText = button.innerHTML;
        button.innerHTML = 'Processing...';
        button.classList.remove('bg-emerald-600', 'hover:bg-emerald-700');
        button.classList.add('bg-slate-400', 'cursor-wait');
        
        // Simulate network request
        setTimeout(() => {
            button.innerHTML = '✓ CONFIRMED';
            button.classList.remove('bg-slate-400', 'cursor-wait');
            button.classList.add('bg-emerald-500', 'hover:bg-emerald-600');
            button.disabled = true;
            
            alert('Cheapest machinery booking confirmed!');
        }, 1200);
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    function downloadPDF() {
        const element = document.getElementById('report-compliance-modal');
        if (element.classList.contains('hidden')) {
            alert('Please select a report first to preview and download!');
            return;
        }

        const title = document.getElementById('report-title-header').innerText || 'FPO_Compliance_Report';

        try {
            if (typeof html2pdf !== 'undefined') {
                const opt = {
                    margin:       [0.5, 0.5, 0.5, 0.5],
                    filename:     title.toLowerCase().replace(/[^a-z0-9]/g, '_') + '.pdf',
                    image:        { type: 'jpeg', quality: 0.98 },
                    html2canvas:  { scale: 2, useCORS: true, logging: false },
                    jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
                };

                const originalBorder = element.style.border;
                element.style.border = '2px solid #1e293b';

                html2pdf().set(opt).from(element).save().then(() => {
                    element.style.border = originalBorder;
                }).catch(err => {
                    console.error('html2pdf save failed, falling back to print window:', err);
                    fallbackPrintWindow(element, title);
                });
            } else {
                console.warn('html2pdf is not defined, falling back to print window');
                fallbackPrintWindow(element, title);
            }
        } catch (e) {
            console.error('Error during pdf generation:', e);
            fallbackPrintWindow(element, title);
        }
    }

    function fallbackPrintWindow(element, title) {
        // Open a new printable window containing the formatted report modal
        const printWindow = window.open('', '_blank', 'width=800,height=900');
        if (!printWindow) {
            alert('Popup blocker blocked the print window. Please allow popups or download manually.');
            return;
        }
        
        var htmlContent = '<html>' +
            '<head>' +
            '<title>' + title + '</title>' +
            '<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">' +
            '<script src="https://cdn.tailwindcss.com"><\/script>' +
            '<style>' +
            'body { font-family: \'Outfit\', sans-serif; background-color: #ffffff; padding: 40px; }' +
            '.compliance-box { border: 4px double #1e293b; padding: 30px; border-radius: 20px; background-color: #f8fafc; }' +
            '</style>' +
            '</head>' +
            '<body>' +
            '<div class="compliance-box max-w-2xl mx-auto space-y-6">' +
            element.innerHTML +
            '</div>' +
            '<script>' +
            'window.onload = function() { setTimeout(function() { window.print(); window.close(); }, 500); };' +
            '<\/script>' +
            '</body>' +
            '</html>';

        printWindow.document.write(htmlContent);
        printWindow.document.close();
    }

    document.addEventListener('DOMContentLoaded', () => {
        triggerReportGenerator('Farmer Registration');
    });
</script>
@endsection
