@extends('layouts.app')

@section('content')
<div class="bg-slate-50 min-h-screen text-slate-800 antialiased relative">
    
    <!-- SHG Glassmorphic Sidebar -->
    <x-shg-sidebar />

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
                        Welcome Back, {{ auth()->user()->name ?? 'Maa Shakti SHG' }} 👋
                    </h1>
                    <p class="text-xs font-semibold text-slate-500">Kalyan Village Collective • 12 Active Women Entrepreneurs</p>
                </div>
            </div>

            <!-- Navbar Actions -->
            <div class="flex items-center gap-4 relative">
                
                <!-- Live Bank Linkage Statistics -->
                <div class="hidden md:flex items-center gap-2.5 px-4 py-2 bg-gradient-to-r from-emerald-500/10 to-teal-500/10 border border-emerald-100 rounded-full text-xs font-bold text-emerald-800">
                    <span class="h-2 w-2 bg-emerald-500 rounded-full animate-pulse"></span>
                    <span>SBI Linkage: Active (Credit Limit: ₹2,00,000)</span>
                </div>

                <!-- Notifications bell Dropdown container -->
                <div class="relative inline-block text-left">
                    <button onclick="toggleNavbarDropdown('notifications-dropdown', event)" class="p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-600 border border-slate-100 transition-colors focus:outline-none relative">
                        <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-1 right-1 flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                        </span>
                    </button>

                    <!-- Bell Dropdown Overlay -->
                    <div id="notifications-dropdown" class="absolute right-0 mt-3.5 w-96 bg-white border border-slate-100 shadow-2xl rounded-[2rem] p-5 hidden z-50 transform origin-top-right transition-all duration-200">
                        <div class="flex items-center justify-between pb-3.5 border-b border-slate-50 mb-3.5">
                            <div class="text-left">
                                <h3 class="text-xs font-black text-slate-800">Alerts & Message Logs</h3>
                                <p class="text-[9px] text-slate-400 font-bold">Linked to SMS Gateway</p>
                            </div>
                            <span class="px-3 py-1 bg-red-50 text-red-650 rounded-full font-black text-[10px] uppercase tracking-wider border border-red-100 whitespace-nowrap">4 New</span>
                        </div>

                        <div class="space-y-3 max-h-72 overflow-y-auto pr-1 no-scrollbar">
                            @foreach($notifications as $notif)
                                <div class="p-3.5 bg-slate-50/50 hover:bg-slate-50 border border-slate-100 rounded-2xl flex items-start gap-3.5 transition-all duration-200 cursor-pointer">
                                    <div class="w-11 h-11 rounded-2xl bg-white border border-slate-100 flex items-center justify-center text-xl flex-shrink-0 shadow-sm select-none">
                                        {{ $notif['icon'] }}
                                    </div>
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
                    </div>
                </div>

                <!-- User Profile badge Dropdown container -->
                <div class="relative inline-block text-left border-l border-slate-100 pl-4">
                    <button onclick="toggleNavbarDropdown('profile-dropdown', event)" class="flex items-center gap-3 focus:outline-none hover:opacity-90 transition-opacity">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-emerald-500 to-purple-600 p-[2px]">
                            <div class="w-full h-full rounded-full bg-white flex items-center justify-center font-black text-purple-600 text-sm">
                                MS
                            </div>
                        </div>
                        <div class="hidden sm:block text-left">
                            <h4 class="text-xs font-black text-slate-800 leading-none">{{ auth()->user()->name ?? 'Maa Shakti SHG' }}</h4>
                            <span class="text-[9px] font-black text-emerald-600 uppercase tracking-widest leading-none flex items-center gap-1">
                                Self Help Group 
                                <svg class="w-2.5 h-2.5 text-slate-450" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                            </span>
                        </div>
                    </button>

                    <!-- Profile Dropdown Overlay -->
                    <div id="profile-dropdown" class="absolute right-0 mt-3.5 w-64 bg-white border border-slate-100 shadow-2xl rounded-[2rem] p-5 hidden z-50 transform origin-top-right transition-all duration-200">
                        <div class="pb-3.5 border-b border-slate-50 mb-3.5 flex items-center gap-2.5">
                            <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center font-black text-white text-sm">
                                MS
                            </div>
                            <div class="text-left min-w-0">
                                <h4 class="text-xs font-black text-slate-800 truncate">{{ auth()->user()->name ?? 'Maa Shakti SHG' }}</h4>
                                <p class="text-[9px] text-slate-450 font-bold leading-tight">{{ auth()->user()->email ?? 'shg@farmtech.com' }}</p>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <!-- My Profile Trigger Button -->
                            <button onclick="openProfileModal()" class="w-full px-3 py-2.5 bg-slate-50 hover:bg-emerald-50 text-slate-700 hover:text-emerald-800 rounded-xl text-xs font-black text-left flex items-center gap-2.5 transition-colors">
                                <span>👤</span>
                                <span>My Profile Summary</span>
                            </button>

                            <!-- Native Logout Form -->
                            <form action="{{ route('logout') }}" method="POST" class="pt-1">
                                @csrf
                                <button type="submit" class="w-full px-3 py-2.5 bg-white hover:bg-red-55 text-red-600 hover:text-red-700 rounded-xl text-xs font-black text-left flex items-center gap-2.5 border border-red-100/10 transition-colors">
                                    <span>🚪</span>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Scrolling Content Body -->
        <main class="flex-1 p-6 md:p-8 space-y-8 overflow-y-auto">

            <!-- ANALYTICS OVERVIEW CARDS (#overview) -->
            <section id="overview" class="space-y-6 scroll-mt-24">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                        Analytics Overview
                    </h2>
                    <span class="text-xs font-bold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-full">Updated 10 mins ago</span>
                </div>

                <!-- CHARTS FEED (Chart.js implementation) -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <!-- Sales Growth & Marketplace Growth Chart -->
                    <div class="lg:col-span-2 bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 flex flex-col justify-between h-80">
                        <div>
                            <h3 class="text-sm font-black text-slate-800">Monthly Sales & Marketplace Growth Trends</h3>
                            <p class="text-[10px] text-slate-400 font-bold">Consolidated revenue and digital market expansion logs (₹)</p>
                        </div>
                        <div class="h-56 relative w-full mt-4">
                            <canvas id="shgSalesChart"></canvas>
                        </div>
                    </div>

                    <!-- Product Demand Polar Chart -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 flex flex-col justify-between h-80">
                        <div>
                            <h3 class="text-sm font-black text-slate-800">Category Product Demand</h3>
                            <p class="text-[10px] text-slate-400 font-bold">Wholesale buyer interest distribution</p>
                        </div>
                        <div class="h-56 relative w-full mt-4">
                            <canvas id="productDemandChart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- End Charts Grid -->

                <!-- Overview Analytics Grid (Premium Live Features) -->
                <div id="overview-metrics-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
 
                    <!-- SHG Enterprise Health Score (Unique Feature ⭐) -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:shadow-2xl hover:border-purple-300 transition-all duration-300 flex flex-col justify-between group">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-sm font-black text-slate-500 uppercase tracking-wider">Enterprise Health Score</h3>
                                <p class="text-xs font-semibold text-slate-400 mt-1">Based on sales, inventory & training</p>
                            </div>
                            <span class="text-[10px] px-3 py-1 bg-purple-50 text-purple-800 border border-purple-100 rounded-full font-black uppercase tracking-wider shadow-sm">AI Rated</span>
                        </div>
                        <div class="flex items-center justify-around gap-6 my-3">
                            <!-- Circular SVG Gauge -->
                            <div class="relative w-28 h-28 flex items-center justify-center flex-shrink-0">
                                <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                                    <path class="text-slate-100" stroke-width="3" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="text-purple-500" stroke-width="3.2" stroke-dasharray="91, 100" stroke-linecap="round" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" style="filter: drop-shadow(0px 2px 4px rgba(168,85,247,0.3));" />
                                </svg>
                                <div class="absolute flex flex-col items-center justify-center text-center">
                                    <span class="text-3xl font-black text-slate-900 leading-none">91</span>
                                    <span class="text-xs font-bold text-slate-400 leading-none mt-1">/ 100</span>
                                </div>
                            </div>
                            <!-- Score details -->
                            <div class="space-y-2.5">
                                <div class="flex items-center gap-2.5 text-sm font-bold">
                                    <span class="w-3 h-3 bg-purple-500 rounded-full shadow-md shadow-purple-500/30"></span>
                                    <span class="text-slate-500">Sales: <b class="text-slate-900 font-black">94%</b></span>
                                </div>
                                <div class="flex items-center gap-2.5 text-sm font-bold">
                                    <span class="w-3 h-3 bg-emerald-500 rounded-full shadow-md shadow-emerald-500/30"></span>
                                    <span class="text-slate-500">Inventory: <b class="text-slate-900 font-black">88%</b></span>
                                </div>
                                <div class="flex items-center gap-2.5 text-sm font-bold">
                                    <span class="w-3 h-3 bg-amber-500 rounded-full shadow-md shadow-amber-500/30"></span>
                                    <span class="text-slate-500">Training: <b class="text-slate-900 font-black">100%</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-slate-100 bg-gradient-to-br from-emerald-50 to-purple-50/40 p-4 rounded-[1.5rem] border border-emerald-100/40">
                            <h4 class="text-xs font-black text-emerald-700 uppercase tracking-widest flex items-center gap-2">
                                <svg class="w-4.5 h-4.5 text-emerald-650" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                                Smart Suggestion
                            </h4>
                            <p class="text-xs md:text-sm text-slate-700 font-semibold leading-relaxed mt-2">Start vacuum packing the newly processed pickles to boost inventory score to **100/100**!</p>
                        </div>
                    </div>
 
                    <!-- Live Production Pipeline Overview -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:shadow-2xl hover:border-emerald-300 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-sm font-black text-slate-500 uppercase tracking-wider">Production Status</h3>
                                    <p class="text-xs font-semibold text-slate-400 mt-1">Current active batches</p>
                                </div>
                                <span class="text-[10px] px-3 py-1 bg-emerald-50 text-emerald-800 border border-emerald-100 rounded-full font-black uppercase tracking-wider shadow-sm">Ghee & Pickle</span>
                            </div>
                            <!-- Cultivation details -->
                            <div class="space-y-4 my-3">
                                <div>
                                    <div class="flex justify-between text-xs md:text-sm font-bold mb-2">
                                        <span class="text-slate-800">Organic Ghee (Packaging)</span>
                                        <span class="text-purple-700 font-black">90% Progress</span>
                                    </div>
                                    <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden border border-slate-100/50">
                                        <div class="bg-gradient-to-r from-purple-400 to-purple-600 h-full rounded-full animate-pulse" style="width: 90%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs md:text-sm font-bold mb-2">
                                        <span class="text-slate-800">Tomato Pickle (Curing Stage)</span>
                                        <span class="text-emerald-700 font-black">40% Progress</span>
                                    </div>
                                    <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden border border-slate-100/50">
                                        <div class="bg-gradient-to-r from-emerald-400 to-emerald-600 h-full rounded-full animate-pulse" style="width: 40%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-slate-100 flex justify-between items-center text-xs md:text-sm font-bold text-slate-500">
                            <span>Total Output: <b id="stats-total-products" class="text-slate-900 font-black">{{ $totalProductsCount ?? 0 }} Units</b></span>
                            <span>Est. Completion: <b class="text-slate-900 font-black">Tomorrow</b></span>
                        </div>
                    </div>
 
                    <!-- Live Marketplace Demand & Weather quick widget -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:shadow-2xl hover:border-purple-300 transition-all duration-300 flex flex-col justify-between group">
                        <div class="space-y-4">
                            <!-- Weather Sync -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3 text-slate-800">
                                    <span class="text-3xl" id="shg-weather-icon">☀️</span>
                                    <div>
                                        <p class="font-black tracking-tight" id="shg-weather-temp">32°C <span class="text-slate-400 text-xs font-bold">Clear</span></p>
                                        <p class="text-[10px] text-emerald-600 font-black uppercase tracking-widest mt-0.5" id="shg-weather-loc">Kalyan Village</p>
                                    </div>
                                </div>
                                <span class="h-2 w-2 bg-emerald-500 rounded-full animate-ping"></span>
                            </div>

                            <div class="h-px bg-slate-100 w-full"></div>

                            <!-- Live Demand Polling -->
                            <div>
                                <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-wider mb-3">Live Marketplace Demand</h3>
                                <div class="space-y-2">
                                    <div class="flex justify-between items-center p-2 rounded-xl bg-emerald-50/50 border border-emerald-100/30">
                                        <span class="text-xs font-black text-slate-700">Organic Ghee</span>
                                        <span class="text-xs font-black text-emerald-600 flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                                            High Demand
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center p-2 rounded-xl bg-purple-50/50 border border-purple-100/30">
                                        <span class="text-xs font-black text-slate-700">Tomato Pickle</span>
                                        <span class="text-xs font-black text-purple-600 flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                                            Stable
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center p-2 rounded-xl bg-amber-50/50 border border-amber-100/30">
                                        <span class="text-xs font-black text-slate-700">Millet Flour</span>
                                        <span class="text-xs font-black text-amber-600 flex items-center gap-1">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                                            Rising
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-slate-100">
                            <button onclick="switchTab('marketplace')" class="w-full py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-black transition-all shadow-md group-hover:bg-purple-600 flex items-center justify-center gap-2">
                                Access Marketplace Portal
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>


                <!-- Quick Access Feature Cards -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Product Value Addition Card -->
                    <div onclick="switchTab('value-addition')" class="group cursor-pointer bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-emerald-500/10 active:scale-[0.97] transition-all duration-300 flex flex-col justify-between min-h-[250px] relative overflow-hidden">
                        <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-green-400/10 to-emerald-500/10 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-green-400 to-emerald-500 flex items-center justify-center text-white shadow-lg shadow-green-500/20 group-hover:rotate-6 transition-transform">
                                <span class="text-xl">🥫</span>
                            </div>
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-150">Value Add</span>
                        </div>
                        <div class="mt-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h4 class="text-lg font-black text-slate-800 group-hover:text-emerald-600 transition-colors leading-tight">Product Processing</h4>
                                <p class="text-xs md:text-sm text-slate-500 font-semibold mt-2 leading-relaxed">Transform raw crops into high-value packaged goods with AI pricing.</p>
                            </div>
                            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">AI Suggests:</span>
                                <span class="text-xs font-black text-emerald-700 bg-emerald-50 px-3 py-0.5 rounded-lg border border-emerald-100/50">Ghee (High Profit)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Marketplace Card -->
                    <div onclick="switchTab('marketplace')" class="group cursor-pointer bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-emerald-500/10 active:scale-[0.97] transition-all duration-300 flex flex-col justify-between min-h-[250px] relative overflow-hidden">
                        <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-purple-400/10 to-indigo-500/10 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-purple-400 to-indigo-500 flex items-center justify-center text-white shadow-lg shadow-purple-500/20 group-hover:rotate-6 transition-transform">
                                <span class="text-xl">🛒</span>
                            </div>
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-150">Trade</span>
                        </div>
                        <div class="mt-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h4 class="text-lg font-black text-slate-800 group-hover:text-emerald-600 transition-colors leading-tight">B2B Marketplace</h4>
                                <p class="text-xs md:text-sm text-slate-500 font-semibold mt-2 leading-relaxed">Connect directly with wholesale buyers and nearby merchants.</p>
                            </div>
                            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Live Buyers:</span>
                                <span class="text-xs font-black text-purple-700 bg-purple-50 px-3 py-0.5 rounded-lg border border-purple-100/50">14 Active Nearby</span>
                            </div>
                        </div>
                    </div>

                    <!-- Inventory Card -->
                    <div onclick="switchTab('inventory')" class="group cursor-pointer bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-emerald-500/10 active:scale-[0.97] transition-all duration-300 flex flex-col justify-between min-h-[250px] relative overflow-hidden">
                        <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-indigo-400/10 to-blue-500/10 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-400 to-blue-500 flex items-center justify-center text-white shadow-lg shadow-indigo-500/20 group-hover:rotate-6 transition-transform">
                                <span class="text-xl">📦</span>
                            </div>
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-150">Storage</span>
                        </div>
                        <div class="mt-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h4 class="text-lg font-black text-slate-800 group-hover:text-emerald-600 transition-colors leading-tight">Inventory Tracking</h4>
                                <p class="text-xs md:text-sm text-slate-500 font-semibold mt-2 leading-relaxed">Manage raw stock limits, packaging materials and production yields.</p>
                            </div>
                            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Status:</span>
                                <span class="text-xs font-black text-blue-700 bg-blue-50 px-3 py-0.5 rounded-lg border border-blue-100/50">All Stocks Optimal</span>
                            </div>
                        </div>
                    </div>

                    <!-- Rankings Card -->
                    <div onclick="switchTab('rankings')" class="group cursor-pointer bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-emerald-500/10 active:scale-[0.97] transition-all duration-300 flex flex-col justify-between min-h-[250px] relative overflow-hidden">
                        <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-blue-400/10 to-cyan-500/10 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-400 to-cyan-500 flex items-center justify-center text-white shadow-lg shadow-blue-500/20 group-hover:rotate-6 transition-transform">
                                <span class="text-xl">🏆</span>
                            </div>
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-150">Leaderboard</span>
                        </div>
                        <div class="mt-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h4 class="text-lg font-black text-slate-800 group-hover:text-emerald-600 transition-colors leading-tight">SHG Rankings</h4>
                                <p class="text-xs md:text-sm text-slate-500 font-semibold mt-2 leading-relaxed">Check statewide sales performance and download official certificates.</p>
                            </div>
                            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Your Rank:</span>
                                <span class="text-xs font-black text-cyan-700 bg-cyan-50 px-3 py-0.5 rounded-lg border border-cyan-100/50">#1 (Top Performer)</span>
                            </div>
                        </div>
                    </div>

                    <!-- Incubation Card -->
                    <div onclick="switchTab('incubation')" class="group cursor-pointer bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-emerald-500/10 active:scale-[0.97] transition-all duration-300 flex flex-col justify-between min-h-[250px] relative overflow-hidden">
                        <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-rose-400/10 to-pink-500/10 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        
                        <div class="flex items-center justify-between">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-rose-400 to-pink-500 flex items-center justify-center text-white shadow-lg shadow-rose-500/20 group-hover:rotate-6 transition-transform">
                                <span class="text-xl">💡</span>
                            </div>
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-150">Startup</span>
                        </div>
                        <div class="mt-4 flex-1 flex flex-col justify-between">
                            <div>
                                <h4 class="text-lg font-black text-slate-800 group-hover:text-emerald-600 transition-colors leading-tight">Business Incubation</h4>
                                <p class="text-xs md:text-sm text-slate-500 font-semibold mt-2 leading-relaxed">Generate AI brand names and scale your rural cooperative business.</p>
                            </div>
                            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Tool:</span>
                                <span class="text-xs font-black text-rose-700 bg-rose-50 px-3 py-0.5 rounded-lg border border-rose-100/50">Brand Generator Active</span>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- FEATURE 1 - PRODUCT VALUE ADDITION MODULE (#value-addition) -->
            <section id="value-addition" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-purple-500 rounded-full inline-block"></span>
                        Product Value Addition Module 🥫
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Publish raw-to-processed product specifications and generate high-value listings</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Value Addition Form -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 flex flex-col justify-between">
                        <form id="value-add-form" onsubmit="submitValueAdd(event)" class="space-y-4">
                            <div>
                                <label class="block text-xs font-black text-slate-700 mb-1.5">Processed Product Name</label>
                                <input type="text" id="va_name" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500 transition-colors" placeholder="e.g. Maa Shakti Premium Ghee" required>
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-black text-slate-700 mb-1.5">Raw Material</label>
                                    <select id="va_raw" onchange="updateVaAISuggestion(this.value)" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500 transition-colors" required>
                                        <option value="Milk">Milk</option>
                                        <option value="Tomato">Tomato</option>
                                        <option value="Wheat">Wheat</option>
                                        <option value="Potato">Potato</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-slate-700 mb-1.5">Processed Output</label>
                                    <select id="va_processed" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500 transition-colors" required>
                                        <option value="Paneer">Paneer / Cheese</option>
                                        <option value="Pickle">Pickle / Sauce</option>
                                        <option value="Flour">Flour / Atta</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-black text-slate-700 mb-1.5">Unit Price (₹)</label>
                                    <input type="number" id="va_price" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500 transition-colors" placeholder="e.g. 350" required>
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-slate-700 mb-1.5">Batch Qty (Units)</label>
                                    <input type="number" id="va_qty" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500 transition-colors" placeholder="e.g. 50" required>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-black text-slate-700 mb-1.5">Packaging Details</label>
                                <input type="text" id="va_packaging" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500 transition-colors" placeholder="e.g. Vacuum glass packing, custom labels" required>
                            </div>

                            <button type="submit" class="w-full py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl font-black text-xs tracking-wider transition-colors shadow-md">PUBLISH TO MARKETPLACE</button>
                        </form>
                    </div>

                    <!-- AI Suggestions Box & Raw Example List -->
                    <div class="lg:col-span-2 bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 md:p-8 flex flex-col justify-between">
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-sm font-black text-slate-800">AI-Style Product Processing Hub</h3>
                                <p class="text-[10px] text-slate-400 font-bold">Standard conversions and live profit advice</p>
                            </div>

                            <!-- Live AI Suggestion (Unique Feature ⭐) -->
                            <div class="p-5 bg-gradient-to-br from-emerald-500/10 to-teal-500/10 border border-emerald-100 rounded-3xl">
                                <h4 class="text-xs font-black text-emerald-800 flex items-center gap-1.5">
                                    💡 AI Value Addition Recommendation
                                </h4>
                                <p id="va-ai-suggestion-text" class="text-xs text-slate-600 font-semibold leading-relaxed mt-2.5">
                                    Raw milk can be processed into high-grade organic Ghee or Mozzarella cheese to boost profit margins by 65%.
                                </p>
                            </div>

                            <!-- Crop Conversion Examples -->
                            <div class="space-y-3">
                                <h4 class="text-xs font-black text-slate-700">Value Addition Quick Map</h4>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-center text-xs font-bold">
                                    <div class="p-3.5 bg-slate-50 border border-slate-100 rounded-2xl">
                                        <p class="text-slate-400 text-[10px] font-black uppercase">Milk Conversion</p>
                                        <p class="text-slate-800 mt-1 font-black">Milk 🥛 ➔ Paneer 🧀</p>
                                    </div>
                                    <div class="p-3.5 bg-slate-50 border border-slate-100 rounded-2xl">
                                        <p class="text-slate-400 text-[10px] font-black uppercase">Tomato Conversion</p>
                                        <p class="text-slate-800 mt-1 font-black">Tomato 🍅 ➔ Pickle 🥫</p>
                                    </div>
                                    <div class="p-3.5 bg-slate-50 border border-slate-100 rounded-2xl">
                                        <p class="text-slate-400 text-[10px] font-black uppercase">Wheat Conversion</p>
                                        <p class="text-slate-800 mt-1 font-black">Wheat 🌾 ➔ Flour 📦</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- AI Processing Pipeline (Fills the blank space) -->
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 border border-slate-800 shadow-2xl rounded-[2.5rem] p-6 md:p-8 mt-6">
                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
                        <div>
                            <h3 class="text-lg font-black text-white flex items-center gap-2">
                                <span class="text-2xl">✨</span> AI Live Processing Opportunities
                            </h3>
                            <p class="text-xs font-bold text-slate-400 mt-1">Real-time analysis of your raw inventory against market demands</p>
                        </div>
                        <button class="bg-emerald-500 hover:bg-emerald-400 text-slate-900 text-[10px] font-black uppercase tracking-widest px-4 py-2.5 rounded-full transition-colors flex items-center justify-center gap-2 shadow-lg shadow-emerald-500/20 shrink-0">
                            <svg class="w-4 h-4 animate-spin-slow" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            Run AI Scan
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- AI Opportunity Card 1 -->
                        <div class="bg-slate-800/80 border border-slate-700/50 rounded-3xl p-5 hover:bg-slate-700/50 transition-colors group cursor-pointer">
                            <div class="flex justify-between items-start mb-4">
                                <span class="p-2.5 bg-emerald-500/20 text-emerald-400 rounded-2xl"><svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></span>
                                <span class="text-[10px] font-black text-emerald-400 uppercase tracking-widest bg-emerald-500/10 px-2.5 py-1 rounded-full border border-emerald-500/20">High Match</span>
                            </div>
                            <h4 class="text-sm font-black text-white mb-1 group-hover:text-emerald-400 transition-colors">Tomato ➔ Sun-dried</h4>
                            <p class="text-[10px] font-bold text-slate-400 leading-relaxed mb-4">You have 50kg surplus tomatoes. Urban demand for sun-dried is peaking.</p>
                            <div class="flex items-center justify-between pt-3 border-t border-slate-700/50">
                                <span class="text-xs font-black text-emerald-400">+120% Margin</span>
                                <span class="text-xs font-bold text-white flex items-center gap-1 group-hover:underline">Start <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></span>
                            </div>
                        </div>

                        <!-- AI Opportunity Card 2 -->
                        <div class="bg-slate-800/80 border border-slate-700/50 rounded-3xl p-5 hover:bg-slate-700/50 transition-colors group cursor-pointer">
                            <div class="flex justify-between items-start mb-4">
                                <span class="p-2.5 bg-purple-500/20 text-purple-400 rounded-2xl"><svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg></span>
                                <span class="text-[10px] font-black text-purple-400 uppercase tracking-widest bg-purple-500/10 px-2.5 py-1 rounded-full border border-purple-500/20">Good Match</span>
                            </div>
                            <h4 class="text-sm font-black text-white mb-1 group-hover:text-purple-400 transition-colors">Raw Milk ➔ Desi Ghee</h4>
                            <p class="text-[10px] font-bold text-slate-400 leading-relaxed mb-4">Current mandi price for raw milk is low. Convert to Ghee for long shelf life.</p>
                            <div class="flex items-center justify-between pt-3 border-t border-slate-700/50">
                                <span class="text-xs font-black text-purple-400">+85% Margin</span>
                                <span class="text-xs font-bold text-white flex items-center gap-1 group-hover:underline">Start <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></span>
                            </div>
                        </div>

                        <!-- AI Opportunity Card 3 -->
                        <div class="bg-slate-800/80 border border-slate-700/50 rounded-3xl p-5 hover:bg-slate-700/50 transition-colors group cursor-pointer">
                            <div class="flex justify-between items-start mb-4">
                                <span class="p-2.5 bg-amber-500/20 text-amber-400 rounded-2xl"><svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg></span>
                                <span class="text-[10px] font-black text-amber-400 uppercase tracking-widest bg-amber-500/10 px-2.5 py-1 rounded-full border border-amber-500/20">Trending</span>
                            </div>
                            <h4 class="text-sm font-black text-white mb-1 group-hover:text-amber-400 transition-colors">Millet ➔ Multi-grain</h4>
                            <p class="text-[10px] font-bold text-slate-400 leading-relaxed mb-4">Supermarket bulk buyers looking for packaged organic multi-grain flour.</p>
                            <div class="flex items-center justify-between pt-3 border-t border-slate-700/50">
                                <span class="text-xs font-black text-amber-400">+60% Margin</span>
                                <span class="text-xs font-bold text-white flex items-center gap-1 group-hover:underline">Start <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg></span>
                            </div>
                        </div>

                        <!-- AI Custom Request Card -->
                        <div class="bg-gradient-to-br from-purple-600 to-indigo-600 rounded-3xl p-5 hover:opacity-90 transition-opacity flex flex-col justify-center items-center text-center cursor-pointer group shadow-lg shadow-purple-500/20">
                            <span class="p-4 bg-white/20 text-white rounded-full mb-4 group-hover:scale-110 transition-transform"><svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg></span>
                            <h4 class="text-sm font-black text-white mb-2">Ask AI for Recipes</h4>
                            <p class="text-[10px] font-bold text-white/80 leading-relaxed">Have a unique raw material? Let AI generate a processing plan.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FEATURE 2 - SHG MARKETPLACE (#marketplace) -->
            <section id="marketplace" class="scroll-mt-24 space-y-6 hidden">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                            <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                            SHG Marketplace Portal 🛒
                        </h2>
                        <p class="text-xs font-semibold text-slate-400 mt-0.5">Explore active collective offers, list batches, and match with nearby wholesale partners</p>
                    </div>
                    <button onclick="triggerNearbyFinder()" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-black shadow-md transition-all hover:scale-105">Find Nearby Buyers</button>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Product catalog feeds -->
                    <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6" id="marketplace-feed-container">
                        @foreach($products as $product)
                            <x-marketplace-card :product="$product" />
                        @endforeach
                    </div>

                    <!-- Nearby Buyer Finder (Unique Feature ⭐) -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 space-y-6">
                        <div>
                            <h3 class="text-sm font-black text-slate-800">Nearby Buyer Proximity Finder</h3>
                            <p class="text-[10px] text-slate-400 font-bold">Proximity wholesale buyer tracking based on rural coordinates</p>
                        </div>

                        <!-- Buyer List Container -->
                        <div id="nearby-buyers-feed" class="space-y-4">
                            <!-- Prompt standard view -->
                            <div class="p-5 border-2 border-dashed border-slate-200 rounded-3xl text-center space-y-2.5">
                                <span class="text-3xl">🧭</span>
                                <p class="text-xs font-semibold text-slate-500">Run Proximity scan to locate wholesale grain merchant links within a 5km radius.</p>
                                <button onclick="triggerNearbyFinder()" class="px-4 py-2 bg-emerald-600 text-white text-xs font-black rounded-lg shadow-sm">Scan Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FEATURE 3 - INVENTORY MANAGEMENT (#inventory) -->
            <section id="inventory" class="scroll-mt-24 space-y-8 hidden">
                <div class="flex items-end justify-between">
                    <div>
                        <h2 class="text-3xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                            <span class="h-8 w-2.5 bg-gradient-to-b from-indigo-600 to-blue-700 rounded-full inline-block shadow-lg shadow-blue-500/30"></span>
                            Smart Inventory Command
                        </h2>
                        <p class="text-sm font-bold text-slate-600 mt-1.5 ml-5">Real-time stock ledger, predictive packaging algorithms & workflow efficiency metrics</p>
                    </div>
                    <div class="hidden md:flex gap-3">
                        <button onclick="switchTab('value-addition')" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-black uppercase tracking-wider shadow-xl transition-all active:scale-95 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            Log New Stock
                        </button>
                    </div>
                </div>

                <!-- Top Stats Row -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-indigo-50/70 border border-indigo-150 p-5 rounded-[2rem] flex flex-col justify-between hover:bg-indigo-50 transition-colors group">
                        <span class="w-10 h-10 bg-indigo-600 text-white rounded-xl flex items-center justify-center text-xl shadow-lg shadow-indigo-600/20 group-hover:scale-110 transition-transform mb-3">📦</span>
                        <p class="text-[10px] uppercase font-black text-indigo-750 tracking-widest">Total SKU Lines</p>
                        <h4 class="text-2xl font-black text-indigo-900 mt-1">{{ count($inventory) }} Active</h4>
                    </div>
                    <div class="bg-emerald-50/70 border border-emerald-150 p-5 rounded-[2rem] flex flex-col justify-between hover:bg-emerald-50 transition-colors group">
                        <span class="w-10 h-10 bg-emerald-600 text-white rounded-xl flex items-center justify-center text-xl shadow-lg shadow-emerald-600/20 group-hover:scale-110 transition-transform mb-3">🟢</span>
                        <p class="text-[10px] uppercase font-black text-emerald-700 tracking-widest">Optimal Batches</p>
                        <h4 class="text-2xl font-black text-emerald-900 mt-1">{{ $inventory->filter(function($i) { return intval($i->packaging_stock) >= 250; })->count() }} Secured</h4>
                    </div>
                    <div class="bg-red-50/70 border border-red-150 p-5 rounded-[2rem] flex flex-col justify-between hover:bg-red-50 transition-colors group">
                        <span class="w-10 h-10 bg-red-600 text-white rounded-xl flex items-center justify-center text-xl shadow-lg shadow-red-600/20 group-hover:scale-110 transition-transform mb-3">⚠️</span>
                        <p class="text-[10px] uppercase font-black text-red-750 tracking-widest">Critical Low Stock</p>
                        <h4 class="text-2xl font-black text-red-900 mt-1">{{ $inventory->filter(function($i) { return intval($i->packaging_stock) < 250; })->count() }} Alerts</h4>
                    </div>
                    <div class="bg-amber-50/70 border border-amber-150 p-5 rounded-[2rem] flex flex-col justify-between hover:bg-amber-50 transition-colors group">
                        <span class="w-10 h-10 bg-amber-600 text-white rounded-xl flex items-center justify-center text-xl shadow-lg shadow-amber-600/20 group-hover:scale-110 transition-transform mb-3">🔄</span>
                        <p class="text-[10px] uppercase font-black text-amber-700 tracking-widest">Pending Sync</p>
                        <h4 class="text-2xl font-black text-amber-900 mt-1">Live Mode</h4>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Advanced Stock Ledger Grid (replaces table) -->
                    <div class="lg:col-span-2 space-y-4">
                        <div class="flex items-center justify-between mb-2 px-2">
                            <h3 class="text-sm font-black text-slate-800 uppercase tracking-widest">Live Production Ledger</h3>
                            <button class="text-xs font-black text-blue-600 hover:text-blue-800 uppercase tracking-wider flex items-center gap-1">
                                Download CSV <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="inventory-grid-container">
                            @foreach($inventory as $inv)
                                <div class="bg-white border-2 border-slate-100 rounded-[2rem] p-5 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:border-blue-300 hover:shadow-[0_8px_30px_rgb(59,130,246,0.1)] transition-all duration-300 group">
                                    <div class="flex justify-between items-start mb-4">
                                        <div>
                                            <span id="badge-{{ $inv->id }}" class="text-[9px] font-black uppercase tracking-widest px-2 py-0.5 rounded-full mb-2 inline-block @if(intval($inv->packaging_stock) < 250) bg-red-100 text-red-700 @else bg-emerald-100 text-emerald-700 @endif">
                                                @if(intval($inv->packaging_stock) < 250) 🚨 Action Required @else ✅ Stock Optimal @endif
                                            </span>
                                            <h4 class="text-lg font-black text-slate-900 leading-tight group-hover:text-blue-600 transition-colors">{{ $inv->product->product_name ?? 'Raw Crop Batch' }}</h4>
                                        </div>
                                        <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-lg border border-slate-100 shadow-inner shrink-0">
                                            @if(strpos(strtolower($inv->product->product_name ?? ''), 'pickle') !== false) 🥫
                                            @elseif(strpos(strtolower($inv->product->product_name ?? ''), 'paneer') !== false) 🧀
                                            @elseif(strpos(strtolower($inv->product->product_name ?? ''), 'flour') !== false) 🌾
                                            @else 📦
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="space-y-3">
                                        <!-- Raw Stock Bar -->
                                        <div>
                                            <div class="flex justify-between text-[10px] font-black uppercase tracking-wider mb-1">
                                                <span class="text-slate-650">Raw Input</span>
                                                <span id="raw-text-{{ $inv->id }}" class="text-slate-900 font-bold">{{ $inv->raw_stock }}</span>
                                            </div>
                                            <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                                                <div id="raw-bar-{{ $inv->id }}" class="bg-indigo-600 h-full rounded-full shadow-inner" style="width: {{ min(100, intval($inv->raw_stock) / 5) }}%"></div>
                                            </div>
                                        </div>
                                        
                                        <!-- Packaging Bar -->
                                        <div>
                                            <div class="flex justify-between text-[10px] font-black uppercase tracking-wider mb-1">
                                                <span class="text-slate-650">Packaging Materials</span>
                                                <span id="pkg-text-{{ $inv->id }}" class="text-slate-900 font-bold">{{ $inv->packaging_stock }}</span>
                                            </div>
                                            <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                                                <div id="pkg-bar-{{ $inv->id }}" class="h-full rounded-full shadow-inner @if(intval($inv->packaging_stock) < 250) bg-red-600 animate-pulse @else bg-emerald-600 @endif" style="width: {{ min(100, intval($inv->packaging_stock) / 6) }}%"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                                        <div class="flex flex-col">
                                            <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Est. Production</span>
                                            <span id="prod-text-{{ $inv->id }}" class="text-sm font-black text-slate-800">{{ $inv->production_quantity }} Units</span>
                                        </div>
                                        <button id="btn-edit-{{ $inv->id }}" data-id="{{ $inv->id }}" data-name="{{ $inv->product->product_name ?? 'Raw Crop Batch' }}" data-raw="{{ (int)$inv->raw_stock }}" data-pkg="{{ (int)$inv->packaging_stock }}" data-prod="{{ (int)$inv->production_quantity }}" onclick="openEditInventoryModal(this)" class="w-8 h-8 rounded-full bg-slate-50 hover:bg-blue-50 text-slate-400 hover:text-blue-600 flex items-center justify-center border border-slate-200 transition-colors" title="Edit Batch">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Unique Neo-Brutalist Efficiency Score Widget -->
                    <div class="bg-slate-900 rounded-[2.5rem] p-8 flex flex-col justify-between shadow-2xl shadow-blue-900/20 relative overflow-hidden border border-slate-800 group hover:-translate-y-1 transition-all duration-500">
                        <!-- Background ambient glows -->
                        <div class="absolute -top-24 -right-24 w-48 h-48 bg-blue-600/35 rounded-full blur-3xl group-hover:bg-blue-500/40 transition-colors"></div>
                        <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-purple-600/35 rounded-full blur-3xl group-hover:bg-purple-500/40 transition-colors"></div>

                        <div class="relative z-10">
                            <span class="px-3 py-1 bg-white/10 text-blue-300 border border-white/10 rounded-full text-[10px] font-black uppercase tracking-widest backdrop-blur-md">AI Evaluated</span>
                            <h3 class="text-2xl font-black text-white mt-4 leading-tight">Workflow<br>Efficiency Grade</h3>
                            <p class="text-xs text-slate-400 font-semibold mt-2">Live metric algorithm based on input vs output wastage.</p>
                        </div>

                        <div class="relative z-10 flex flex-col items-center justify-center my-8">
                            <!-- Complex gauge visual -->
                            <div class="relative w-48 h-48 flex items-center justify-center">
                                <!-- Outer Track -->
                                <svg class="absolute w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                                    <circle cx="50" cy="50" r="45" fill="none" stroke="rgba(255,255,255,0.15)" stroke-width="8" stroke-dasharray="283" stroke-dashoffset="0" />
                                </svg>
                                <!-- Inner Track -->
                                <svg class="absolute w-full h-full transform -rotate-90 drop-shadow-[0_0_15px_rgba(56,189,248,0.6)]" viewBox="0 0 100 100">
                                    <defs>
                                        <linearGradient id="blue-purple-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#38bdf8" />
                                            <stop offset="100%" stop-color="#ec4899" />
                                        </linearGradient>
                                    </defs>
                                    <circle cx="50" cy="50" r="45" fill="none" stroke="url(#blue-purple-gradient)" stroke-width="8" stroke-dasharray="283" stroke-dashoffset="36" stroke-linecap="round" />
                                </svg>
                                <!-- Score Display -->
                                <div class="absolute flex flex-col items-center justify-center text-center mt-2">
                                    <span class="text-5xl font-black text-white tracking-tighter">{{ $efficiencyScore ?? 87 }}<span class="text-2xl">%</span></span>
                                    <span class="text-[10px] font-black text-emerald-400 uppercase tracking-widest mt-1 bg-emerald-400/10 px-2 py-0.5 rounded border border-emerald-400/20">Optimal Grade A</span>
                                </div>
                            </div>
                        </div>

                        <div class="relative z-10 bg-white/5 border border-white/10 backdrop-blur-xl p-4 rounded-2xl mt-4">
                            <h4 class="text-xs font-black text-blue-400 uppercase tracking-widest mb-1.5 flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                Smart Suggestion
                            </h4>
                            <p class="text-xs text-slate-300 font-semibold leading-relaxed">
                                Your value-addition batch packaging efficiency is highly optimal. Maintain current vacuum pump operational pressure to sustain grade.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FEATURE 5 - SHG RANKING SYSTEM (#rankings) -->
            <section id="rankings" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-purple-500 rounded-full inline-block"></span>
                        SHG Rankings Leaderboard 🏆
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Top-performing rural women-led cooperatives in Punjab</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Leaderboard Table -->
                    <div class="lg:col-span-2 bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 overflow-hidden">
                        <h3 class="text-sm font-black text-slate-800 mb-4">Monthly Sales & Production Rankings</h3>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full text-xs text-left">
                                <thead class="bg-slate-50 text-slate-400 font-black uppercase text-[10px]">
                                    <tr>
                                        <th class="p-3.5 rounded-l-2xl">Rank</th>
                                        <th class="p-3.5">SHG Name</th>
                                        <th class="p-3.5">Sales</th>
                                        <th class="p-3.5 rounded-r-2xl">Products Sold</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50 font-semibold text-slate-600">
                                    @foreach($leaderboard as $lead)
                                        <tr class="@if($lead['current']) bg-emerald-50/50 font-black text-slate-900 @endif">
                                            <td class="p-3.5">
                                                <span class="w-6 h-6 rounded-full inline-flex items-center justify-center text-xs font-black @if($lead['rank'] === 1) bg-yellow-100 text-yellow-800 @elseif($lead['rank'] === 2) bg-slate-200 text-slate-800 @else bg-orange-100 text-orange-800 @endif">
                                                    {{ $lead['rank'] }}
                                                </span>
                                            </td>
                                            <td class="p-3.5">{{ $lead['name'] }}</td>
                                            <td class="p-3.5">₹{{ number_format($lead['sales']) }}</td>
                                            <td class="p-3.5">{{ $lead['sold'] }} Units</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Digital Achievement Certificate Preview Card (Unique Feature ⭐) -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 flex flex-col justify-between text-center space-y-4">
                        <div>
                            <span class="text-3xl">🏅</span>
                            <h3 class="text-sm font-black text-slate-800 mt-2">Active Achievement Badge</h3>
                            <p class="text-[10px] text-slate-400 font-bold">Recognizing top performance in rural enterprise scaling</p>
                        </div>

                        <!-- Gold Certificate Preview Frame -->
                        <div class="p-5 border-4 border-double border-yellow-500 bg-yellow-50/40 rounded-[2rem] relative select-none">
                            <span class="absolute top-2 right-2 text-base">⭐</span>
                            <p class="text-[9px] uppercase tracking-widest font-black text-yellow-800">State Honor Award</p>
                            <h4 class="text-sm font-black text-slate-800 mt-3">{{ auth()->user()->name ?? 'Maa Shakti SHG' }}</h4>
                            <p class="text-[9px] font-bold text-slate-500 mt-1.5">Rank #1 in District Food Processing, Sown & Sourced locally.</p>
                            <span class="text-[8px] font-black text-slate-400 mt-4 block">Disbursed: July 2026</span>
                        </div>

                        <button onclick="printBadge()" class="w-full py-2.5 bg-slate-900 hover:bg-slate-850 text-white rounded-xl text-xs font-black shadow transition-all">Print Official Badge</button>
                    </div>
                </div>

                <!-- Cooperative Performance Analytics & Insights -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <!-- Metric 1: Tier Level -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2rem] p-6 relative overflow-hidden group">
                        <div class="absolute -right-6 -top-6 w-20 h-20 bg-emerald-500/5 rounded-full blur-xl group-hover:bg-emerald-500/10 transition-colors"></div>
                        <span class="text-xs font-black text-slate-400 uppercase tracking-widest block">Cooperative Standing</span>
                        <div class="flex items-center justify-between mt-3">
                            <span class="text-xl font-black text-slate-800">Elite Tier 1</span>
                            <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-lg text-[10px] font-black uppercase tracking-wider border border-emerald-100">Top 3% State</span>
                        </div>
                        <div class="mt-4">
                            <div class="flex justify-between items-center text-[10px] font-bold text-slate-400 mb-1">
                                <span>Progress to Level 2</span>
                                <span>85% Done</span>
                            </div>
                            <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-full rounded-full" style="width: 85%;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Metric 2: QA Pass Rate -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2rem] p-6 relative overflow-hidden group">
                        <div class="absolute -right-6 -top-6 w-20 h-20 bg-purple-500/5 rounded-full blur-xl group-hover:bg-purple-500/10 transition-colors"></div>
                        <span class="text-xs font-black text-slate-400 uppercase tracking-widest block">Quality Assurance</span>
                        <div class="flex items-center justify-between mt-3">
                            <span class="text-xl font-black text-slate-800">98.4% Pass Rate</span>
                            <span class="px-2.5 py-1 bg-purple-50 text-purple-600 rounded-lg text-[10px] font-black uppercase tracking-wider border border-purple-100">FDA Verified</span>
                        </div>
                        <p class="text-[10px] text-slate-400 font-semibold mt-3.5 leading-relaxed">
                            Certified under FSSAI-2026 Batch Audit guidelines for low-acid food packaging.
                        </p>
                    </div>

                    <!-- Metric 3: Growth rate -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2rem] p-6 relative overflow-hidden group">
                        <div class="absolute -right-6 -top-6 w-20 h-20 bg-blue-500/5 rounded-full blur-xl group-hover:bg-blue-500/10 transition-colors"></div>
                        <span class="text-xs font-black text-slate-400 uppercase tracking-widest block">MoM Revenue Velocity</span>
                        <div class="flex items-center justify-between mt-3">
                            <span class="text-xl font-black text-slate-800">+18.6%</span>
                            <span class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-lg text-[10px] font-black uppercase tracking-wider border border-blue-100">Increasing</span>
                        </div>
                        <p class="text-[10px] text-slate-400 font-semibold mt-3.5 leading-relaxed">
                            Driven by organic tomato pulp scaling and nearby FPO linkage.
                        </p>
                    </div>
                </div>

                <!-- Unlocked Perks & Trade Show Stall Allocations -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
                    <!-- Perks & Rewards -->
                    <div class="lg:col-span-2 bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6">
                        <h3 class="text-sm font-black text-slate-800 mb-4">State-Sponsored Perks & Awards</h3>
                        <div class="space-y-3.5">
                            <div class="flex items-center justify-between p-3 bg-emerald-50/50 border border-emerald-100/50 rounded-2xl">
                                <div class="flex items-center gap-3">
                                    <span class="text-lg">🔓</span>
                                    <div>
                                        <p class="text-xs font-black text-slate-800">₹50,000 Low-Interest Capital Subsidy</p>
                                        <p class="text-[10px] text-slate-400 font-bold">Disbursed directly via NABARD collective empowerment program.</p>
                                    </div>
                                </div>
                                <span class="px-2.5 py-1 bg-emerald-600 text-white rounded-lg text-[9px] font-black uppercase tracking-wider">Unlocked</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-emerald-50/50 border border-emerald-100/50 rounded-2xl">
                                <div class="flex items-center gap-3">
                                    <span class="text-lg">🔓</span>
                                    <div>
                                        <p class="text-xs font-black text-slate-800">Complimentary Custom Label Designing</p>
                                        <p class="text-[10px] text-slate-400 font-bold">Assigned to professional designers at Ludhiana Incubation Hub.</p>
                                    </div>
                                </div>
                                <span class="px-2.5 py-1 bg-emerald-600 text-white rounded-lg text-[9px] font-black uppercase tracking-wider">Unlocked</span>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-slate-50 border border-slate-150 rounded-2xl">
                                <div class="flex items-center gap-3">
                                    <span class="text-lg">⏳</span>
                                    <div>
                                        <p class="text-xs font-black text-slate-800">B2B Global Export License Guidance</p>
                                        <p class="text-[10px] text-slate-400 font-bold">Application documents under evaluation with Director of Trade.</p>
                                    </div>
                                </div>
                                <span class="px-2.5 py-1 bg-slate-200 text-slate-600 rounded-lg text-[9px] font-black uppercase tracking-wider border border-slate-300/40">In Progress</span>
                            </div>
                        </div>
                    </div>

                    <!-- Fairs and Exhibitions -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 flex flex-col justify-between">
                        <div>
                            <h3 class="text-sm font-black text-slate-800 mb-4">Upcoming Cooperative Trade Fairs</h3>
                            <div class="space-y-4">
                                <div class="border-l-2 border-emerald-500 pl-3">
                                    <p class="text-xs font-black text-slate-800 leading-tight">Punjab Cooperative Expo 2026</p>
                                    <p class="text-[9px] font-bold text-slate-400 mt-0.5">Ludhiana • June 12-14</p>
                                    <span class="text-[8px] px-2 py-0.5 bg-emerald-50 text-emerald-600 border border-emerald-100 rounded-md font-black uppercase tracking-widest mt-1.5 inline-block">Stall Reserved ✅</span>
                                </div>

                                <div class="border-l-2 border-purple-500 pl-3">
                                    <p class="text-xs font-black text-slate-800 leading-tight">NABARD Annual Craft & Food Mela</p>
                                    <p class="text-[9px] font-bold text-slate-400 mt-0.5">Chandigarh • July 05-08</p>
                                    <span class="text-[8px] px-2 py-0.5 bg-purple-50 text-purple-600 border border-purple-100 rounded-md font-black uppercase tracking-widest mt-1.5 inline-block">Eligible (Top 3 SHGs) 🌟</span>
                                </div>

                                <div class="border-l-2 border-slate-300 pl-3">
                                    <p class="text-xs font-black text-slate-400 leading-tight">FSSAI Quality Conclave</p>
                                    <p class="text-[9px] font-bold text-slate-400 mt-0.5">New Delhi • August 22</p>
                                    <span class="text-[8px] px-2 py-0.5 bg-slate-100 text-slate-500 border border-slate-150 rounded-md font-black uppercase tracking-widest mt-1.5 inline-block">Nomination Sent ⏳</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FEATURE 6 - FOOD PROCESSING UNIT MANAGEMENT (#processing) -->
            <section id="processing" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                        Food Processing Unit Workflow 🏭
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Track production batch pipelines and apply green wastage reduction strategies</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Workflow Process Timeline Card -->
                    <div class="lg:col-span-2 bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-8 flex flex-col justify-between">
                        <div>
                            <h3 class="text-sm font-black text-slate-800 mb-2">Live Production Batch Pipeline</h3>
                            <p class="text-[10px] text-slate-400 font-bold">Real-time status of the current cooperative food processing batch</p>
                        </div>
                        
                        <div class="relative flex items-center justify-between w-full mt-10 mb-6 px-4">
                            <!-- Line Background -->
                            <div class="absolute left-0 right-0 top-1/2 -translate-y-1/2 h-1 bg-slate-100 z-0"></div>
                            <div class="absolute left-0 right-1/4 top-1/2 -translate-y-1/2 h-1 bg-purple-500 z-0 transition-all duration-1000"></div>

                            <!-- Step 1: Raw Material -->
                            <div class="relative z-10 flex flex-col items-center">
                                <div class="w-11 h-11 rounded-full bg-purple-500 text-white border-4 border-white flex items-center justify-center shadow-lg font-black text-base transition-transform hover:scale-110">
                                    🥛
                                </div>
                                <span class="text-[10px] font-black text-slate-800 mt-2.5">Raw Material</span>
                                <span class="text-[8px] font-bold text-slate-400 mt-0.5">Milk Sourced</span>
                            </div>

                            <!-- Step 2: Processing -->
                            <div class="relative z-10 flex flex-col items-center">
                                <div class="w-11 h-11 rounded-full bg-purple-500 text-white border-4 border-white flex items-center justify-center shadow-lg font-black text-base transition-transform hover:scale-110">
                                    ⚙️
                                </div>
                                <span class="text-[10px] font-black text-slate-800 mt-2.5">Processing</span>
                                <span class="text-[8px] font-bold text-slate-400 mt-0.5">Coagulating</span>
                            </div>

                            <!-- Step 3: Packaging -->
                            <div class="relative z-10 flex flex-col items-center animate-pulse">
                                <div class="w-11 h-11 rounded-full bg-white text-purple-600 border-4 border-purple-500 flex items-center justify-center shadow-lg font-black text-base transition-transform hover:scale-110">
                                    📦
                                </div>
                                <span class="text-[10px] font-black text-purple-600 mt-2.5">Packaging</span>
                                <span class="text-[8px] font-bold text-slate-400 mt-0.5">Vacuum Seal</span>
                            </div>

                            <!-- Step 4: Ready for Sale -->
                            <div class="relative z-10 flex flex-col items-center">
                                <div class="w-11 h-11 rounded-full bg-slate-200 text-slate-400 border-4 border-white flex items-center justify-center shadow font-black text-base transition-transform hover:scale-110">
                                    🛒
                                </div>
                                <span class="text-[10px] font-bold text-slate-400 mt-2.5">Ready for Sale</span>
                                <span class="text-[8px] font-bold text-slate-400 mt-0.5">Pending QA</span>
                            </div>
                        </div>
                    </div>

                    <!-- Wastage Reduction Suggestions (Unique Feature ⭐) -->
                    <div class="bg-gradient-to-br from-emerald-500/10 to-teal-500/10 border border-emerald-100 shadow-sm rounded-[2.5rem] p-6 flex flex-col justify-between">
                        <div>
                            <span class="text-[9px] bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-black uppercase tracking-wider inline-block">Circular Bio-Economy Guidance</span>
                            <h3 class="text-base font-black text-slate-800 mt-2">Wastage Reduction Suggestions</h3>
                            <p class="text-xs text-slate-600 font-semibold leading-relaxed mt-2.5">
                                **Organic Compost Conversion:** Tomato skins and vegetable waste generated during pickle preparation can be routed to the FPO vermicomposting pit to generate organic manure.
                            </p>
                        </div>
                        <div class="mt-4 p-3 bg-white rounded-xl border border-emerald-100 flex items-center justify-between text-xs font-black text-emerald-800">
                            <span>Compost Revenue Potential:</span>
                            <span class="px-2.5 py-0.5 bg-emerald-600 text-white rounded">₹1,200/month</span>
                        </div>
                    </div>
                </div>

                <!-- Processing Analytics & IoT Sensors Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
                    <!-- Active Batch Processing Log Card (2/3 Column) -->
                    <div class="lg:col-span-2 bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h3 class="text-sm font-black text-slate-800">Processing Batch History Logs</h3>
                                <p class="text-[10px] text-slate-400 font-bold">Performance logs of recent crop & food processing runs</p>
                            </div>
                            <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-lg text-[9px] font-black uppercase tracking-wider border border-emerald-100">4 Active Batches</span>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-xs text-left">
                                <thead class="bg-slate-50 text-slate-400 font-black uppercase text-[10px]">
                                    <tr>
                                        <th class="p-3.5 rounded-l-2xl">Batch ID</th>
                                        <th class="p-3.5">Product</th>
                                        <th class="p-3.5">Input Wt.</th>
                                        <th class="p-3.5">Processed Yield</th>
                                        <th class="p-3.5 rounded-r-2xl">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50 font-semibold text-slate-600">
                                    <tr>
                                        <td class="p-3.5 font-black text-slate-900">B-PUN-0924</td>
                                        <td class="p-3.5">Tomato Paste (Puree)</td>
                                        <td class="p-3.5">500 kg</td>
                                        <td class="p-3.5">420 kg <span class="text-emerald-500 font-bold">(84.0%)</span></td>
                                        <td class="p-3.5">
                                            <span class="px-2 py-0.5 bg-purple-50 text-purple-700 rounded-full font-black text-[9px] uppercase tracking-wider border border-purple-100 animate-pulse">Vacuum Sealing</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-3.5 font-black text-slate-900">B-PUN-0923</td>
                                        <td class="p-3.5">Organic Mango Pickle</td>
                                        <td class="p-3.5">250 kg</td>
                                        <td class="p-3.5">230 kg <span class="text-emerald-500 font-bold">(92.0%)</span></td>
                                        <td class="p-3.5">
                                            <span class="px-2 py-0.5 bg-emerald-50 text-emerald-700 rounded-full font-black text-[9px] uppercase tracking-wider border border-emerald-100">Ready for Sale</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-3.5 font-black text-slate-900">B-PUN-0922</td>
                                        <td class="p-3.5">Canned Chilli Jam</td>
                                        <td class="p-3.5">180 kg</td>
                                        <td class="p-3.5">158 kg <span class="text-emerald-500 font-bold">(87.7%)</span></td>
                                        <td class="p-3.5">
                                            <span class="px-2 py-0.5 bg-slate-100 text-slate-600 rounded-full font-black text-[9px] uppercase tracking-wider border border-slate-200">Completed</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Critical Equipment Health IoT Monitors (1/3 Column) -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 flex flex-col justify-between">
                        <div>
                            <h3 class="text-sm font-black text-slate-800 mb-1">Equipment Health & IoT Sensors</h3>
                            <p class="text-[10px] text-slate-400 font-bold mb-4">Live telemetry from Ludhiana cooperative hardware</p>
                            
                            <div class="space-y-3.5">
                                <!-- Sensor 1 -->
                                <div class="flex items-center justify-between p-3 bg-slate-50 border border-slate-100 rounded-2xl">
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-base">🌡️</span>
                                        <div>
                                            <p class="text-xs font-black text-slate-800">Pasteurizer Temperature</p>
                                            <p class="text-[9px] text-slate-400 font-bold">Standard Target: 85.0°C</p>
                                        </div>
                                    </div>
                                    <span class="px-2.5 py-0.5 bg-emerald-500 text-white rounded text-[10px] font-black">85.4°C ✅</span>
                                </div>

                                <!-- Sensor 2 -->
                                <div class="flex items-center justify-between p-3 bg-slate-50 border border-slate-100 rounded-2xl">
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-base">🗜️</span>
                                        <div>
                                            <p class="text-xs font-black text-slate-800">Vacuum Sealer Pressure</p>
                                            <p class="text-[9px] text-slate-400 font-bold">Standard Target: 95.0 kPa</p>
                                        </div>
                                    </div>
                                    <span class="px-2.5 py-0.5 bg-emerald-500 text-white rounded text-[10px] font-black">95.8 kPa ✅</span>
                                </div>

                                <!-- Sensor 3 -->
                                <div class="flex items-center justify-between p-3 bg-slate-50 border border-slate-100 rounded-2xl">
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-base">❄️</span>
                                        <div>
                                            <p class="text-xs font-black text-slate-800">Cold Storage Humidity</p>
                                            <p class="text-[9px] text-slate-400 font-bold">Standard Target: 60-65%</p>
                                        </div>
                                    </div>
                                    <span class="px-2.5 py-0.5 bg-emerald-500 text-white rounded text-[10px] font-black">62.0% ✅</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FPO Raw Material Sourcing Engine (Connected B2B Feature ⭐) -->
                <div class="bg-white border border-slate-100 shadow-xl rounded-[2.5rem] p-8 mt-8">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                        <div>
                            <h3 class="text-lg font-black text-slate-800 flex items-center gap-2">
                                <span class="text-xl">🌾</span> FPO Raw Material Sourcing Engine
                            </h3>
                            <p class="text-xs text-slate-550 font-semibold">Procure raw agricultural materials directly from local FPOs in bulk at index pricing</p>
                        </div>
                        <div class="px-4 py-2 bg-emerald-50 text-emerald-800 border border-emerald-100 rounded-full text-xs font-bold flex items-center gap-2">
                            <span class="h-2 w-2 bg-emerald-500 rounded-full animate-ping"></span>
                            <span>Direct Mandi Pricing active</span>
                        </div>
                    </div>

                    <form id="fpo-sourcing-form" onsubmit="submitFpoProcurement(event)" class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <!-- Select FPO -->
                        <div class="space-y-2 text-left">
                            <label class="text-[10px] font-black uppercase text-slate-450 tracking-wider">Select FPO Partner</label>
                            <select name="fpo_name" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs font-bold text-slate-850 focus:outline-none focus:border-emerald-500" required>
                                <option value="GreenHarvest FPO">GreenHarvest FPO (Nearest - 0.5km)</option>
                                <option value="Patiala Sourcing Group">Patiala Sourcing Group (3.2km)</option>
                                <option value="Nabha Grain Cooperative">Nabha Grain Cooperative (5.1km)</option>
                            </select>
                        </div>

                        <!-- Select Crop -->
                        <div class="space-y-2 text-left">
                            <label class="text-[10px] font-black uppercase text-slate-450 tracking-wider">Raw Material Crop</label>
                            <select id="sourcing-crop" name="crop" onchange="updateSourcingCost()" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs font-bold text-slate-850 focus:outline-none focus:border-emerald-500" required>
                                <option value="Wheat" data-price="2275">Wheat (₹2,275/Quintal)</option>
                                <option value="Milk" data-price="4500">Milk (₹4,500/Quintal)</option>
                                <option value="Potato" data-price="1500">Potato (₹1,500/Quintal)</option>
                                <option value="Mustard" data-price="5400">Mustard (₹5,400/Quintal)</option>
                                <option value="Tomato" data-price="1800">Tomato (₹1,800/Quintal)</option>
                            </select>
                        </div>

                        <!-- Quantity -->
                        <div class="space-y-2 text-left">
                            <label class="text-[10px] font-black uppercase text-slate-450 tracking-wider">Quantity (Quintals)</label>
                            <input type="number" id="sourcing-quantity" name="quantity" min="1" value="10" oninput="updateSourcingCost()" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-4 py-3 text-xs font-bold text-slate-850 focus:outline-none focus:border-emerald-500" required />
                        </div>

                        <!-- Action Button & Summary -->
                        <div class="flex flex-col justify-end space-y-2 text-left">
                            <div class="flex justify-between items-center text-xs font-bold px-1 mb-1">
                                <span class="text-slate-500">Est. Total Cost:</span>
                                <span id="sourcing-est-cost" class="text-emerald-700 font-black">₹22,750.00</span>
                            </div>
                            <button type="submit" class="w-full py-3.5 bg-slate-900 hover:bg-emerald-700 text-white rounded-2xl text-xs font-black uppercase tracking-wider shadow-lg transition-all active:scale-95">
                                Submit Sourcing Order
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- FEATURE 7 - BUSINESS INCUBATION MODULE (#incubation) -->
            <section id="incubation" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-purple-500 rounded-full inline-block"></span>
                        Business Incubation Module 💡
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Scale your cooperative, verify branding guidelines, and generate trademarked enterprise tags</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Brand Name Generator (Unique Feature ⭐) -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 flex flex-col justify-between">
                        <form id="brand-generator-form" onsubmit="submitBrandGenerator(event)" class="space-y-4">
                            <div>
                                <h3 class="text-sm font-black text-slate-800 mb-2">AI brand Name Generator</h3>
                                <p class="text-[10px] text-slate-400 font-bold mb-4">Input raw material and matching theme to generate agricultural trademarks</p>
                            </div>
                            
                            <div>
                                <label class="block text-xs font-black text-slate-700 mb-1.5">Primary Raw Product</label>
                                <input type="text" id="brand_raw" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500 transition-colors" placeholder="e.g. Honey" required>
                            </div>

                            <div>
                                <label class="block text-xs font-black text-slate-700 mb-1.5">Branding Theme</label>
                                <select id="brand_theme" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500 transition-colors" required>
                                    <option value="Organic">Organic & Pure</option>
                                    <option value="Traditional">Traditional & Heritage</option>
                                    <option value="Premium">Modern & Premium</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-black text-xs tracking-wider transition-colors shadow">GENERATE BRAND NAMES</button>
                        </form>
                    </div>

                    <!-- Incubation Suggestions Output -->
                    <div class="lg:col-span-2 bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 md:p-8 flex flex-col justify-between">
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-sm font-black text-slate-800">Rural Startup Incubation Output</h3>
                                <p class="text-[10px] text-slate-400 font-bold">Suggested brand names and corporate scaling advisory</p>
                            </div>

                            <!-- Dynamic Name List output -->
                            <div class="space-y-3">
                                <h4 class="text-xs font-black text-slate-700">Generated Brand Names:</h4>
                                <div id="brand-suggestions-output" class="grid grid-cols-2 gap-3">
                                    <!-- Initial placeholder suggestions -->
                                    <div class="p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-xs font-black text-slate-700 text-center hover:bg-slate-100">
                                        FreshRoots Organics
                                    </div>
                                    <div class="p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-xs font-black text-slate-700 text-center hover:bg-slate-100">
                                        PureNature Honey
                                    </div>
                                    <div class="p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-xs font-black text-slate-700 text-center hover:bg-slate-100">
                                        Maa Shakti Pure
                                    </div>
                                    <div class="p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-xs font-black text-slate-700 text-center hover:bg-slate-100">
                                        Kalyan Fields Premium
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <h4 class="text-xs font-black text-slate-700">Advisory Startup Advice:</h4>
                                <p class="text-xs text-slate-500 font-semibold leading-relaxed">
                                    We recommend incorporating local community heritage in logo structures. Verify trademarks at the Registrar of Firms before printing wholesale bags.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Incubation Analytics & Funding Progress -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
                    <!-- Trademark Registry Card (2/3 Column) -->
                    <div class="lg:col-span-2 bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h3 class="text-sm font-black text-slate-800">Cooperative Trademark & IP Registry</h3>
                                <p class="text-[10px] text-slate-400 font-bold">Intellectual property and registered brand tags of the cooperative</p>
                            </div>
                            <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-lg text-[9px] font-black uppercase tracking-wider border border-emerald-100">3 Intellectual Properties</span>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-xs text-left">
                                <thead class="bg-slate-50 text-slate-400 font-black uppercase text-[10px]">
                                    <tr>
                                        <th class="p-3.5 rounded-l-2xl">Brand Name</th>
                                        <th class="p-3.5">Application No.</th>
                                        <th class="p-3.5">Filing Class</th>
                                        <th class="p-3.5">Registry Status</th>
                                        <th class="p-3.5 rounded-r-2xl">Renewal</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50 font-semibold text-slate-600">
                                    <tr>
                                        <td class="p-3.5 font-black text-slate-900">Maa Shakti Organics</td>
                                        <td class="p-3.5">TM-REG-2026-0812</td>
                                        <td class="p-3.5">Class 29 (Pickles & Preserved Foods)</td>
                                        <td class="p-3.5">
                                            <span class="px-2 py-0.5 bg-emerald-50 text-emerald-700 rounded-full font-black text-[9px] uppercase tracking-wider border border-emerald-100">Approved ✅</span>
                                        </td>
                                        <td class="p-3.5 text-slate-400">June 2036</td>
                                    </tr>
                                    <tr>
                                        <td class="p-3.5 font-black text-slate-900">Kalyan Pure Ghee</td>
                                        <td class="p-3.5">TM-REG-2026-0813</td>
                                        <td class="p-3.5">Class 30 (Dairy & Staples)</td>
                                        <td class="p-3.5">
                                            <span class="px-2 py-0.5 bg-emerald-50 text-emerald-700 rounded-full font-black text-[9px] uppercase tracking-wider border border-emerald-100">Approved ✅</span>
                                        </td>
                                        <td class="p-3.5 text-slate-400">June 2036</td>
                                    </tr>
                                    <tr>
                                        <td class="p-3.5 font-black text-slate-900">Sutlej Bounty Spices</td>
                                        <td class="p-3.5">TM-REG-2026-0904</td>
                                        <td class="p-3.5">Class 30 (Spices & Blends)</td>
                                        <td class="p-3.5">
                                            <span class="px-2 py-0.5 bg-amber-50 text-amber-700 rounded-full font-black text-[9px] uppercase tracking-wider border border-amber-100 animate-pulse">Under Exam ⏳</span>
                                        </td>
                                        <td class="p-3.5 text-slate-400">Pending</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Financial Grants & Subventions Card (1/3 Column) -->
                    <div class="bg-white border border-slate-100 shadow-sm rounded-[2.5rem] p-6 flex flex-col justify-between">
                        <div>
                            <h3 class="text-sm font-black text-slate-800 mb-1">NABARD Incubator Seed Funding</h3>
                            <p class="text-[10px] text-slate-400 font-bold mb-4">Capital progress & subventions for women entrepreneurship</p>
                            
                            <div class="space-y-3.5">
                                <!-- Metric 1 -->
                                <div class="flex items-center justify-between p-3 bg-purple-50/50 border border-purple-100/50 rounded-2xl">
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-base">💰</span>
                                        <div>
                                            <p class="text-xs font-black text-slate-800">Seed Grant Sanctioned</p>
                                            <p class="text-[9px] text-slate-400 font-bold">Women Empowerment Scheme</p>
                                        </div>
                                    </div>
                                    <span class="px-2.5 py-0.5 bg-purple-600 text-white rounded text-[10px] font-black">₹2.5L ✅</span>
                                </div>

                                <!-- Metric 2 -->
                                <div class="flex items-center justify-between p-3 bg-emerald-50/50 border border-emerald-100/50 rounded-2xl">
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-base">💸</span>
                                        <div>
                                            <p class="text-xs font-black text-slate-800">Disbursed Instalment</p>
                                            <p class="text-[9px] text-slate-400 font-bold">First tranche credited</p>
                                        </div>
                                    </div>
                                    <span class="px-2.5 py-0.5 bg-emerald-600 text-white rounded text-[10px] font-black">₹1.0L ✅</span>
                                </div>

                                <!-- Metric 3 -->
                                <div class="flex items-center justify-between p-3 bg-blue-50/50 border border-blue-100/50 rounded-2xl">
                                    <div class="flex items-center gap-2.5">
                                        <span class="text-base">📉</span>
                                        <div>
                                            <p class="text-xs font-black text-slate-800">Subvention Interest Rate</p>
                                            <p class="text-[9px] text-slate-400 font-bold">Specially discounted rate</p>
                                        </div>
                                    </div>
                                    <span class="px-2.5 py-0.5 bg-blue-600 text-white rounded text-[10px] font-black">3.5% MoM 🌟</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FEATURE 8 - WHATSAPP NOTIFICATIONS (#notifications) -->
            <section id="notifications" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                        WhatsApp Messaging & Alert Logs 📢
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Real-time buyer chats and shipping warnings linked to SMS gateway</p>
                </div>

                <!-- Notifications log list -->
                <div class="space-y-3.5">
                    @foreach($notifications as $notif)
                        <div class="p-4 bg-white border border-slate-100 rounded-3xl shadow-sm flex justify-between items-center hover:scale-[1.005] transition-transform duration-200 text-xs">
                            <div class="flex items-center gap-3.5">
                                <span class="text-xl p-2 bg-slate-50 rounded-2xl border border-slate-100 flex-shrink-0 select-none">
                                    {{ $notif['icon'] }}
                                </span>
                                <div>
                                    <p class="font-black text-slate-800 leading-none">{{ $notif['message'] }}</p>
                                    <span class="text-[10px] font-semibold text-slate-400 block mt-1">Channel: SMS API Gateway • {{ $notif['time'] }}</span>
                                </div>
                            </div>
                            <span class="px-2.5 py-1 text-[9px] font-black uppercase rounded-full @if($notif['status'] === 'Unread') bg-red-100 text-red-800 @else bg-slate-100 text-slate-500 @endif">{{ $notif['status'] }}</span>
                        </div>
                    @endforeach
                </div>
            </section>

        </main>
    </div>

<!-- Smart Profile Modal -->
<div id="profile-modal" class="fixed top-0 bottom-0 right-0 lg:left-72 left-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-md hidden transition-all duration-300">
    <div class="bg-white border-2 border-slate-100 rounded-[2.5rem] p-8 max-w-lg w-full shadow-2xl transform scale-95 transition-transform duration-300 relative overflow-hidden">
        <!-- Inside background glows -->
        <div class="absolute -top-24 -right-24 w-48 h-48 bg-emerald-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-purple-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 space-y-6">
            <!-- Modal Header -->
            <div class="flex items-center justify-between">
                <div class="text-left">
                    <span class="text-[9px] font-black uppercase tracking-widest px-2.5 py-1 bg-purple-50 text-purple-600 rounded-full border border-purple-100">National Cooperative Registry</span>
                    <h3 class="text-2xl font-black text-slate-900 mt-2 leading-tight">SHG Profile Information</h3>
                </div>
                <button onclick="closeProfileModal()" class="w-8 h-8 rounded-full bg-slate-50 hover:bg-red-50 text-slate-400 hover:text-red-650 flex items-center justify-center border border-slate-200 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Modal Content (Two Columns for metrics) -->
            <div class="grid grid-cols-2 gap-4 text-xs font-semibold text-slate-600">
                <div class="p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-left">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-0.5">SHG Collective Name</p>
                    <p class="font-black text-slate-900 text-sm">{{ $shg->shg_name ?? 'Maa Shakti SHG' }}</p>
                </div>
                <div class="p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-left">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Registration Number</p>
                    <p class="font-black text-slate-900">{{ $shg->registration_number ?? 'SHG-PB-PAT-4901' }}</p>
                </div>
                <div class="p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-left">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Formation Year</p>
                    <p class="font-black text-slate-900">{{ $shg->formation_year ?? '2021' }}</p>
                </div>
                <div class="p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-left">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Active Women Members</p>
                    <p class="font-black text-slate-900 text-sm">{{ $shg->members_count ?? '12' }} Members</p>
                </div>
                <div class="p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-left">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Authorized Leader</p>
                    <p class="font-black text-slate-900">{{ $shg->leader_name ?? 'Sunita Devi' }}</p>
                </div>
                <div class="p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-left">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Contact Number</p>
                    <p class="font-black text-slate-900">{{ $shg->mobile ?? '9812300445' }}</p>
                </div>
                <div class="col-span-2 p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-left">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Bank Account details</p>
                    <p class="font-black text-slate-900">{{ $shg->bank_name ?? 'State Bank of India' }} • A/C No: {{ $shg->account_number ?? '39281002345' }}</p>
                    <p class="text-[10px] text-slate-400 mt-0.5 font-bold">IFSC: {{ $shg->ifsc_code ?? 'SBIN0001234' }} • Status: <span class="text-emerald-600">Active Bank Linkage</span></p>
                </div>
                <div class="col-span-2 p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-left">
                    <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Registered Address</p>
                    <p class="font-black text-slate-900 leading-normal">{{ $shg->address ?? 'Gali No. 3, Near Panchayat Ghar, Kalyan' }}, Patiala, Punjab - {{ $shg->pincode ?? '147001' }}</p>
                </div>
            </div>

            <!-- Close Action button -->
            <button onclick="closeProfileModal()" class="w-full py-3.5 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl font-black text-xs tracking-wider transition-colors shadow">CLOSE PROFILE WINDOW</button>
        </div>
    </div>
</div>

<!-- Edit Inventory Modal -->
<div id="edit-inventory-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-md hidden transition-all duration-300">
    <div class="bg-white border-2 border-slate-100 rounded-[2.5rem] p-8 max-w-md w-full shadow-2xl transform scale-95 transition-transform duration-300 relative overflow-hidden">
        <!-- Background glows inside modal -->
        <div class="absolute -top-24 -right-24 w-48 h-48 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-purple-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-[9px] font-black uppercase tracking-widest px-2.5 py-1 bg-blue-50 text-blue-600 rounded-full border border-blue-100">Stock Adjustment</span>
                    <h3 id="edit-inventory-title" class="text-2xl font-black text-slate-900 mt-2 leading-tight">Modify Inventory</h3>
                </div>
                <button onclick="closeEditInventoryModal()" class="w-8 h-8 rounded-full bg-slate-50 hover:bg-red-50 text-slate-400 hover:text-red-600 flex items-center justify-center border border-slate-200 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <form id="edit-inventory-form" onsubmit="submitEditInventory(event)" class="space-y-4 pt-2">
                <input type="hidden" id="edit_inv_id">
                
                <div class="space-y-1.5">
                    <label for="edit_raw_stock" class="text-[10px] font-black text-slate-500 uppercase tracking-wider block">Raw Input (kg)</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-4 text-sm select-none pointer-events-none">🌾</span>
                        <input type="number" id="edit_raw_stock" style="padding-left: 2.75rem;" required min="0" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 rounded-2xl py-3 pr-4 text-xs font-black text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label for="edit_packaging_stock" class="text-[10px] font-black text-slate-500 uppercase tracking-wider block">Packaging Materials (Units)</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-4 text-sm select-none pointer-events-none">📦</span>
                        <input type="number" id="edit_packaging_stock" style="padding-left: 2.75rem;" required min="0" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 rounded-2xl py-3 pr-4 text-xs font-black text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label for="edit_production_qty" class="text-[10px] font-black text-slate-500 uppercase tracking-wider block">Est. Production (Units)</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-4 text-sm select-none pointer-events-none">⚙️</span>
                        <input type="number" id="edit_production_qty" style="padding-left: 2.75rem;" required min="0" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 rounded-2xl py-3 pr-4 text-xs font-black text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-blue-500 transition-all">
                    </div>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="button" onclick="closeEditInventoryModal()" class="flex-1 py-3 bg-slate-50 hover:bg-slate-100 text-slate-500 hover:text-slate-700 text-xs font-black rounded-2xl border border-slate-200 uppercase tracking-wider transition-all">Cancel</button>
                    <button type="submit" class="flex-1 py-3 bg-blue-600 hover:bg-blue-700 text-white text-xs font-black rounded-2xl shadow-lg shadow-blue-500/20 uppercase tracking-wider transition-all hover:scale-[1.02]">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Interactive Course Player Modal -->
<div id="course-player-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-xl hidden transition-all duration-300">
    <div id="course-player-card" class="bg-slate-900 border-2 border-slate-800 rounded-[2.5rem] p-6 md:p-8 max-w-5xl w-full shadow-[0_0_50px_rgba(0,0,0,0.8)] transform scale-95 transition-transform duration-300 relative overflow-hidden flex flex-col lg:flex-row gap-8">
        
        <!-- Background decorative glows -->
        <div class="absolute -top-32 -left-32 w-64 h-64 bg-emerald-500/10 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute -bottom-32 -right-32 w-64 h-64 bg-purple-500/10 rounded-full blur-[100px] pointer-events-none"></div>

        <!-- Close Button (relocated to the top-right of the card to avoid overlapping the video player) -->
        <button onclick="closeCoursePlayer()" class="absolute top-4 right-4 md:top-6 md:right-6 z-20 w-10 h-10 rounded-full bg-slate-950/80 hover:bg-red-500/20 text-slate-400 hover:text-red-400 flex items-center justify-center border border-slate-800 hover:border-red-500/30 transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <!-- Left Column: Real YouTube Player Container -->
        <div class="flex-1 space-y-6">
            <div class="aspect-video w-full bg-slate-950 rounded-3xl border border-slate-800 overflow-hidden relative shadow-2xl shadow-black/80">
                <!-- YouTube Iframe -->
                <iframe id="player-youtube-iframe" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>

            <!-- Course Info & Trainer Bar (designed with flex wrap-safety and no-squeeze layout) -->
            <div class="p-4 bg-slate-950/50 border border-slate-800/80 rounded-2xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 text-xs text-slate-300">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-emerald-500 to-teal-500 p-[2px] flex-shrink-0 shadow-lg shadow-emerald-950/30">
                        <div class="w-full h-full rounded-full bg-slate-900 flex items-center justify-center font-black text-[10px] text-emerald-400">NT</div>
                    </div>
                    <div class="text-left">
                        <p class="font-black text-white leading-tight">Dr. Harpreet Singh</p>
                        <p class="text-[9px] text-slate-400 font-bold block mt-0.5 leading-none">Senior Food Tech Advisor • NABARD</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full font-black text-[9px] uppercase tracking-wide whitespace-nowrap">FSSAI Approved Syllabus</span>
                    <span class="px-2.5 py-1 bg-teal-500/10 text-teal-400 border border-teal-500/20 rounded-full font-black text-[9px] uppercase tracking-wide whitespace-nowrap">English/Punjabi</span>
                </div>
            </div>
        </div>

        <!-- Right Column: Interactive Course Chapters -->
        <div class="w-full lg:w-80 flex flex-col justify-between text-left relative z-10 shrink-0">
            <div class="space-y-6">
                <div class="pr-8">
                    <span class="text-[9px] font-black uppercase tracking-widest text-emerald-400">Course Syllabus</span>
                    <h3 id="player-course-title" class="text-lg font-black text-white leading-snug mt-1.5">FSSAI Packaging Certification</h3>
                </div>

                <!-- Chapters List -->
                <div class="space-y-3 overflow-y-auto max-h-64 pr-1 no-scrollbar">
                    <div class="p-3.5 bg-emerald-950/10 border border-emerald-500/20 rounded-2xl flex justify-between items-center cursor-pointer hover:bg-emerald-950/20 transition-all">
                        <div>
                            <span class="text-[9px] font-black text-emerald-500 block uppercase font-mono tracking-wider">Chapter 1</span>
                            <span class="text-xs font-bold text-white">Sanitation Protocols</span>
                        </div>
                        <span class="text-[10px] text-emerald-400 font-black px-2.5 py-0.5 bg-emerald-500/10 rounded-full border border-emerald-500/20">Passed ✅</span>
                    </div>

                    <div class="p-3.5 bg-slate-950 border-2 border-emerald-500 rounded-2xl flex justify-between items-center cursor-pointer shadow-[0_0_15px_rgba(16,185,129,0.1)] transition-all">
                        <div>
                            <span class="text-[9px] font-black text-emerald-400 block uppercase font-mono tracking-wider animate-pulse">Chapter 2 • Playing</span>
                            <span class="text-xs font-bold text-white">Vacuum Packing & Humidity</span>
                        </div>
                        <span class="text-[9px] font-black text-emerald-400 uppercase tracking-wide px-2.5 py-0.5 bg-emerald-500/20 rounded-full border border-emerald-500/30">35% Done</span>
                    </div>

                    <div class="p-3.5 bg-slate-950/40 border border-slate-800/40 rounded-2xl flex justify-between items-center cursor-pointer opacity-40 hover:bg-slate-850/40 transition-all">
                        <div>
                            <span class="text-[9px] font-black text-slate-500 block uppercase font-mono tracking-wider">Chapter 3</span>
                            <span class="text-xs font-bold text-slate-400">Wastage Reduction</span>
                        </div>
                        <span class="text-[10px] text-slate-500 font-bold">Locked 🔒</span>
                    </div>
                </div>
            </div>

            <!-- Complete Certification Action -->
            <div class="pt-6 border-t border-slate-800/80 mt-6 lg:mt-0">
                <button onclick="alert('Certification exam requested! NABARD invigilators will be notified to open testing window.')" class="w-full py-4 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white rounded-2xl text-xs font-black uppercase tracking-wider shadow-lg shadow-emerald-950/20 hover:scale-[1.02] transition-transform">Apply for Certificate</button>
            </div>
        </div>
    </div>
</div>
    </div>
</div>

<!-- JavaScript and Chart.js code block -->
<script>
    // Toggle mobile navigation sidebar drawer
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar-drawer');
        const backdrop = document.getElementById('sidebar-backdrop');
        if(sidebar && backdrop) {
            sidebar.classList.toggle('-translate-x-full');
            backdrop.classList.toggle('hidden');
        }
    }

    // Course Player Modal functions
    function openCoursePlayer(elementOrTitle) {
        try {
            console.log('Launching course player...', elementOrTitle);
            let courseTitle = '';
            if (typeof elementOrTitle === 'string') {
                courseTitle = elementOrTitle;
            } else if (elementOrTitle && elementOrTitle.dataset) {
                courseTitle = elementOrTitle.dataset.title || '';
            }

            // Fallback just in case
            if (!courseTitle) {
                courseTitle = 'Food Processing & Standards Training';
            }

            const titleEl = document.getElementById('player-course-title');
            if (titleEl) {
                titleEl.innerText = courseTitle;
            } else {
                console.warn('#player-course-title element not found');
            }
            
            // Define YouTube Video IDs based on the course list
            const courseVideos = {
                'FSSAI Food Packaging & Canning Standards': 'jG9Y9i0xV5E',
                'Boutique Branding & Digital Marketing for Rural Artisans': 'dpZfNNYUZEc',
                'Mango & Tomato Pulp Preservatives & Canning Techniques': 'fX4X-vL3qV0',
                'Advanced Food Safety & Canning Standards Masterclass': 'jG9Y9i0xV5E'
            };

            let videoId = 'F8PZzP42r3c'; // Fallback educational canning video
            const cleanTitle = courseTitle.trim().toLowerCase();
            for (const title in courseVideos) {
                if (cleanTitle.includes(title.toLowerCase()) || title.toLowerCase().includes(cleanTitle)) {
                    videoId = courseVideos[title];
                    break;
                }
            }

            // Load and play the real YouTube video
            const iframe = document.getElementById('player-youtube-iframe');
            if (iframe) {
                iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&enablejsapi=1`;
            } else {
                console.error('#player-youtube-iframe not found');
            }

            const modal = document.getElementById('course-player-modal');
            const card = document.getElementById('course-player-card');
            
            if (modal) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    if (card) card.classList.remove('scale-95');
                }, 10);
            } else {
                console.error('#course-player-modal not found');
            }
        } catch (error) {
            console.error('Error in openCoursePlayer:', error);
            alert('Failed to launch course player: ' + error.message);
        }
    }

    function closeCoursePlayer() {
        // Reset iframe source immediately to stop the video and audio playback
        const iframe = document.getElementById('player-youtube-iframe');
        if (iframe) {
            iframe.src = '';
        }

        const modal = document.getElementById('course-player-modal');
        const card = document.getElementById('course-player-card');
        if (card) card.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 150);
    }

    // Inventory modal functions
    function openEditInventoryModal(btn) {
        const id = btn.dataset.id;
        const name = btn.dataset.name;
        const raw = btn.dataset.raw;
        const pkg = btn.dataset.pkg;
        const prod = btn.dataset.prod;

        document.getElementById('edit_inv_id').value = id;
        document.getElementById('edit-inventory-title').innerText = 'Modify ' + name;
        document.getElementById('edit_raw_stock').value = raw;
        document.getElementById('edit_packaging_stock').value = pkg;
        document.getElementById('edit_production_qty').value = prod;

        const modal = document.getElementById('edit-inventory-modal');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.firstElementChild.classList.remove('scale-95');
        }, 10);
    }

    function closeEditInventoryModal() {
        const modal = document.getElementById('edit-inventory-modal');
        modal.firstElementChild.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 150);
    }

    function submitEditInventory(event) {
        event.preventDefault();

        const id = document.getElementById('edit_inv_id').value;
        const raw = document.getElementById('edit_raw_stock').value;
        const pkg = document.getElementById('edit_packaging_stock').value;
        const prod = document.getElementById('edit_production_qty').value;

        fetch('{{ route("shg.inventory.update") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                inventory_id: id,
                raw_stock: raw,
                packaging_stock: pkg,
                production_quantity: prod
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const inv = data.inventory;

                // 1. Update text fields in card
                document.getElementById('raw-text-' + id).innerText = inv.raw_stock;
                document.getElementById('pkg-text-' + id).innerText = inv.packaging_stock;
                document.getElementById('prod-text-' + id).innerText = inv.production_quantity + ' Units';

                // 2. Update status badge in card
                const badge = document.getElementById('badge-' + id);
                badge.innerText = inv.status_label;
                badge.className = "text-[9px] font-black uppercase tracking-widest px-2 py-0.5 rounded-full mb-2 inline-block " + inv.status_class;

                // 3. Update progress bars
                const rawBar = document.getElementById('raw-bar-' + id);
                const rawVal = parseInt(inv.raw_stock);
                rawBar.style.width = Math.min(100, rawVal / 5) + '%';

                const pkgBar = document.getElementById('pkg-bar-' + id);
                const pkgVal = parseInt(inv.packaging_stock);
                pkgBar.style.width = Math.min(100, pkgVal / 6) + '%';
                
                if (pkgVal < 250) {
                    pkgBar.className = "h-full rounded-full shadow-inner bg-red-600 animate-pulse";
                } else {
                    pkgBar.className = "h-full rounded-full shadow-inner bg-emerald-600";
                }

                // 4. Update the Edit button dataset attributes so clicking it again has fresh values
                const btn = document.getElementById('btn-edit-' + id);
                btn.dataset.raw = rawVal;
                btn.dataset.pkg = pkgVal;
                btn.dataset.prod = inv.production_quantity;

                // 5. Update global efficiency score & dynamic gauge
                const efficiencyEl = document.querySelector('.tracking-tighter');
                if (efficiencyEl) {
                    efficiencyEl.innerHTML = data.avg_efficiency + '<span class="text-2xl">%</span>';
                }
                
                const circle = document.querySelector('circle[stroke="url(#blue-purple-gradient)"]');
                if (circle) {
                    const offset = 283 - (283 * data.avg_efficiency) / 100;
                    circle.setAttribute('stroke-dashoffset', offset);
                }

                closeEditInventoryModal();
            } else {
                alert(data.message || 'An error occurred.');
            }
        })
        .catch(err => {
            console.error('Failed to update inventory', err);
            alert('Failed to save changes. Please try again.');
        });
    }

    // SPA Navigation Logic
    function switchTab(tabId, event = null) {
        if (event) event.preventDefault();
        
        const sections = ['overview', 'value-addition', 'marketplace', 'inventory', 'rankings', 'processing', 'incubation', 'notifications'];
        
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

    // Update dynamic cost preview in sourcing engine
    function updateSourcingCost() {
        const cropSelect = document.getElementById('sourcing-crop');
        const quantityInput = document.getElementById('sourcing-quantity');
        const estCostSpan = document.getElementById('sourcing-est-cost');

        if (!cropSelect || !quantityInput || !estCostSpan) return;

        const selectedOption = cropSelect.options[cropSelect.selectedIndex];
        const pricePerQuintal = parseFloat(selectedOption.getAttribute('data-price')) || 0;
        const qty = parseFloat(quantityInput.value) || 0;

        const totalCost = qty * pricePerQuintal;
        estCostSpan.innerText = '₹' + totalCost.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    // Submit FPO bulk procurement request
    function submitFpoProcurement(event) {
        event.preventDefault();
        
        const form = document.getElementById('fpo-sourcing-form');
        const formData = new FormData(form);

        fetch('{{ route("shg.procure-fpo") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                fpo_name: formData.get('fpo_name'),
                crop: formData.get('crop'),
                quantity: formData.get('quantity')
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                form.reset();
                updateSourcingCost();
            } else {
                alert(data.message || 'Procurement request failed. Please check inputs.');
            }
        })
        .catch(err => {
            console.error('Procurement request failed', err);
            alert('A network error occurred. Please try again.');
        });
    }

    // Print high-resolution official achievement badge/certificate
    function printBadge() {
        const shgName = "{{ auth()->user()->name ?? 'Maa Shakti SHG' }}";
        const printWindow = window.open('', '_blank', 'width=800,height=600');
        
        printWindow.document.write(`
            <html>
            <head>
                <title>State Honor Award Certificate - ${shgName}</title>
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800;900&display=swap');
                    body {
                        margin: 0;
                        padding: 0;
                        background: #fff;
                        font-family: 'Outfit', sans-serif;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 100vh;
                    }
                    .certificate-container {
                        width: 90%;
                        max-width: 750px;
                        margin: 0 auto;
                        padding: 40px;
                        border: 15px double #d97706; /* Golden border */
                        background: #fffdf5;
                        text-align: center;
                        position: relative;
                        box-sizing: border-box;
                        border-radius: 20px;
                        box-shadow: 0 0 20px rgba(0,0,0,0.05);
                    }
                    .star {
                        font-size: 36px;
                        color: #fbbf24;
                        margin-bottom: 10px;
                    }
                    .header-title {
                        font-size: 14px;
                        font-weight: 900;
                        letter-spacing: 4px;
                        color: #b45309;
                        text-transform: uppercase;
                        margin: 0 0 25px 0;
                    }
                    .presents {
                        font-size: 16px;
                        font-weight: 600;
                        color: #6b7280;
                        font-style: italic;
                        margin: 0 0 15px 0;
                    }
                    .shg-name {
                        font-size: 32px;
                        font-weight: 900;
                        color: #111827;
                        margin: 15px 0;
                        border-bottom: 2px solid #f59e0b;
                        display: inline-block;
                        padding-bottom: 10px;
                    }
                    .citation {
                        font-size: 14px;
                        font-weight: 600;
                        color: #4b5563;
                        line-height: 1.6;
                        margin: 20px auto;
                        max-width: 500px;
                    }
                    .footer-info {
                        display: flex;
                        justify-content: space-between;
                        margin-top: 40px;
                        border-top: 1px solid #e5e7eb;
                        padding-top: 20px;
                    }
                    .signature-block {
                        text-align: left;
                    }
                    .signature-title {
                        font-size: 11px;
                        font-weight: 800;
                        color: #9ca3af;
                        text-transform: uppercase;
                        letter-spacing: 1px;
                    }
                    .signature-val {
                        font-size: 13px;
                        font-weight: 900;
                        color: #374151;
                        margin-top: 5px;
                    }
                    .seal {
                        font-size: 50px;
                        position: absolute;
                        bottom: 40px;
                        right: 40px;
                        opacity: 0.85;
                    }
                    @media print {
                        body {
                            background: none;
                        }
                        .certificate-container {
                            border: 15px double #d97706 !important;
                            -webkit-print-color-adjust: exact;
                            print-color-adjust: exact;
                            box-shadow: none;
                        }
                    }
                </style>
            </head>
            <body>
                <div class="certificate-container">
                    <div class="star">★</div>
                    <p class="header-title">State Honor Award Certificate</p>
                    <p class="presents">This official badge is proudly presented to</p>
                    <h1 class="shg-name">${shgName}</h1>
                    <p class="citation">For securing Rank #1 in District Food Processing. Under FSSAI & NABARD agricultural linkage guidelines, demonstrating premium quality, cooperative excellence, and highly optimal rural value addition.</p>
                    <div class="footer-info">
                        <div class="signature-block">
                            <span class="signature-title">Disbursed On</span>
                            <div class="signature-val">July 2026</div>
                        </div>
                        <div class="signature-block" style="text-align: right;">
                            <span class="signature-title">Authorized By</span>
                            <div class="signature-val">Director of NABARD Punjab</div>
                        </div>
                    </div>
                    <div class="seal">🏅</div>
                </div>
                <script>
                    window.onload = function() {
                        window.print();
                        setTimeout(function() { window.close(); }, 500);
                    };
                <\/script>
            </body>
            </html>
        `);
        printWindow.document.close();
    }

    // Direct buyer contact via WhatsApp
    function contactBuyerDirect(productName) {
        const phoneNumber = "919876543210"; // Placeholder buyer number
        const message = encodeURIComponent(`Hello, I am reaching out regarding the bulk supply of: ${productName}. Could we discuss pricing and logistics?`);
        window.open(`https://wa.me/${phoneNumber}?text=${message}`, '_blank');
    }

    // AJAX Product publishing
    function submitValueAdd(event) {
        event.preventDefault();
        
        const name = document.getElementById('va_name').value.trim();
        const raw = document.getElementById('va_raw').value;
        const processed = document.getElementById('va_processed').value;
        const price = document.getElementById('va_price').value;
        const qty = document.getElementById('va_qty').value;
        const packaging = document.getElementById('va_packaging').value.trim();

        fetch('{{ route("shg.product.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                product_name: name,
                raw_product: raw,
                processed_product: processed,
                price: price,
                quantity: qty,
                packaging: packaging
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                // Update stats
                let statsEl = document.getElementById('stats-total-products');
                if (statsEl) {
                    let total = parseInt(statsEl.innerText);
                    statsEl.innerText = (total + 1) + ' Units';
                }
                
                // Append product card to the marketplace
                const container = document.getElementById('marketplace-feed-container');
                const p = data.product;
                const card = document.createElement('div');
                card.className = "bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.2rem] p-6 hover:shadow-2xl hover:scale-[1.03] transition-all duration-300 flex flex-col justify-between relative overflow-hidden group";
                card.innerHTML = `
                    <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-emerald-500 to-purple-600"></div>
                    <div class="space-y-4">
                        <div class="h-44 w-full bg-gradient-to-br from-emerald-100/60 to-purple-100/60 rounded-3xl flex items-center justify-center relative overflow-hidden">
                            <span class="text-5xl group-hover:scale-110 transition-transform duration-300 select-none">🥫</span>
                            <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black text-[9px] uppercase tracking-wider px-2.5 py-1 rounded-full shadow border border-emerald-500/10">Eco-Friendly</span>
                        </div>
                        <div>
                            <span class="text-[9px] bg-purple-100 text-purple-800 px-2.5 py-0.5 rounded-full font-black uppercase tracking-wider inline-block">Processed Crop</span>
                            <h3 class="text-base font-black text-slate-800 mt-1.5">${p.product_name}</h3>
                            <p class="text-[10px] text-slate-400 font-bold leading-none mt-1">Packaging: ${p.packaging}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-100/60 text-xs">
                            <div>
                                <span class="text-[9px] font-black text-slate-400 uppercase">Unit Price</span>
                                <p class="text-base font-black text-emerald-700">₹${p.price.toFixed(2)}</p>
                            </div>
                            <div>
                                <span class="text-[9px] font-black text-slate-400 uppercase">Stock Volume</span>
                                <p class="text-sm font-black text-slate-700 mt-0.5">${p.quantity} Units</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 px-3.5 py-2.5 bg-emerald-50 rounded-2xl border border-emerald-100/50">
                            <span class="h-2 w-2 bg-emerald-500 rounded-full animate-ping"></span>
                            <span class="text-[10px] font-black text-emerald-800 uppercase tracking-wide">${p.buyer_interest}</span>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col gap-2">
                        <div class="flex gap-2">
                            <button onclick="contactBuyerDirect('${p.product_name}')" class="flex-1 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-black rounded-xl shadow-md transition-all hover:scale-[1.02]">Contact Buyer</button>
                        </div>
                    </div>
                `;
                container.insertBefore(card, container.firstChild);
                
                // Append row to inventory table
                const table = document.getElementById('inventory-table-rows');
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="p-3.5 font-black text-slate-800">${p.product_name}</td>
                    <td class="p-3.5">250 kg</td>
                    <td class="p-3.5">300 Units</td>
                    <td class="p-3.5">${p.quantity} Units</td>
                    <td class="p-3.5">
                        <span class="px-2 py-0.5 bg-emerald-100 text-emerald-800 text-[9px] font-black uppercase rounded-full">Optimal</span>
                    </td>
                `;
                table.insertBefore(row, table.firstChild);
                
                // Update AI suggestion box
                document.getElementById('va-ai-suggestion-text').innerText = data.suggestion;
                
                // Clear form
                document.getElementById('value-add-form').reset();
                alert(data.message);
            }
        })
        .catch(err => {
            console.error('Value addition listing failed', err);
        });
    }

    // Real-time AI Value Addition Selector update
    function updateVaAISuggestion(rawProduct) {
        const suggestions = {
            'Milk': 'Raw milk can be processed into high-grade organic Ghee or Mozzarella cheese to boost profit margins by 65%.',
            'Tomato': 'Tomatoes can be dehydrated into sundried tomato flakes, fetching ₹450/kg compared to raw prices.',
            'Wheat': 'Wheat can be milled into multi-grain healthy diabetic flour for high-end urban markets.',
            'Potato': 'Potatoes can be processed into zero-chemical dehydrated potato chips for premium school-snack branding.'
        };
        
        document.getElementById('va-ai-suggestion-text').innerText = suggestions[rawProduct] ?? "Your raw agricultural crop can be packaged into boutique organic bags to increase sales margins by 45%.";
    }

    // AJAX Nearby Buyer scan
    function triggerNearbyFinder() {
        const feed = document.getElementById('nearby-buyers-feed');
        feed.innerHTML = `
            <div class="flex items-center justify-center py-6 text-emerald-600 animate-pulse text-xs font-bold">
                📡 Running agromet buyer scanning...
            </div>
        `;
        
        fetch('{{ route("shg.buyer.nearby") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                feed.innerHTML = '';
                data.buyers.forEach(b => {
                    const row = document.createElement('div');
                    row.className = "p-6 bg-slate-50 border border-slate-100 rounded-3xl flex flex-col justify-between space-y-4 hover:scale-[1.01] transition-transform shadow-sm";
                    row.innerHTML = `
                        <div>
                            <span class="text-[10px] bg-emerald-100/80 text-emerald-800 px-3 py-1 rounded-full font-black uppercase tracking-wider">Verified Merchant</span>
                            <h3 class="text-base font-black text-slate-800 mt-3">${b.buyer_name}</h3>
                            <p class="text-xs text-slate-500 font-bold leading-normal mt-1.5"><span class="font-black text-slate-400">Location:</span> ${b.location}</p>
                            <p class="text-xs text-slate-800 font-black mt-1.5"><span class="font-black text-slate-400">Interests:</span> ${b.product_interest}</p>
                        </div>
                        <button onclick="window.open('https://wa.me/${b.contact.replace(/[^0-9]/g, '')}?text=Hello, I am reaching out regarding your interest in ${b.product_interest}.', '_blank')" class="w-full mt-2 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl text-xs font-black uppercase shadow-md transition-all">DIAL: ${b.contact}</button>
                    `;
                    feed.appendChild(row);
                });
            }
        })
        .catch(err => {
            console.error('Proximity scan failed', err);
        });
    }

    // AJAX Brand Name Generator with Robust Client-side AI fallback engine
    function submitBrandGenerator(event) {
        event.preventDefault();
        
        const raw = document.getElementById('brand_raw').value.trim();
        const theme = document.getElementById('brand_theme').value;
        const output = document.getElementById('brand-suggestions-output');
        
        if (!raw) return;

        // Visual indicator that it's generating
        output.innerHTML = `
            <div class="col-span-2 text-center py-4 text-xs font-bold text-purple-600 animate-pulse">
                ⚡ AI Brand Engine generating names...
            </div>
        `;

        // Local generation fallback dictionary (extremely rich & robust)
        const generateLocalSuggestions = (product, themeName) => {
            const rawCap = product.charAt(0).toUpperCase() + product.slice(1);
            if (themeName.toLowerCase() === 'organic') {
                return [
                    `FreshRoots ${rawCap}`,
                    `PureNature ${rawCap}s`,
                    `Maa Shakti ${rawCap} Organics`,
                    `Kalyan Fields Pure`
                ];
            } else if (themeName.toLowerCase() === 'traditional') {
                return [
                    `Daadi Maa Recipes`,
                    `VedicGrains ${rawCap}`,
                    `RuralHeritage ${rawCap}`,
                    `Maa Shakti Traditional`
                ];
            } else {
                return [
                    `NutriShield ${rawCap}`,
                    `FreshPack Elite ${rawCap}`,
                    `SmartHarvest ${rawCap}`,
                    `Maa Shakti Premium`
                ];
            }
        };

        // Attempt AJAX first, with solid client-side fallback
        fetch('{{ route("shg.incubation.brand") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ raw_material: raw, theme: theme })
        })
        .then(res => {
            if (!res.ok) throw new Error('Server returned error status');
            return res.json();
        })
        .then(data => {
            if (data.status === 'success' && data.suggestions && data.suggestions.length > 0) {
                renderSuggestions(data.suggestions);
            } else {
                // Fallback on invalid data response
                renderSuggestions(generateLocalSuggestions(raw, theme));
            }
        })
        .catch(err => {
            console.warn('Brand generator server fetch failed, using local AI fallback engine:', err);
            // Instant local fallback generation with smooth timeout
            setTimeout(() => {
                renderSuggestions(generateLocalSuggestions(raw, theme));
            }, 300);
        });

        function renderSuggestions(suggestions) {
            output.innerHTML = '';
            suggestions.forEach(s => {
                const el = document.createElement('div');
                el.className = "p-3.5 bg-slate-50 border border-slate-100 rounded-2xl text-xs font-black text-slate-700 text-center hover:bg-slate-100 cursor-pointer transition-all active:scale-[0.97]";
                el.innerText = s;
                // Add click handler to alert and select
                el.onclick = () => {
                    alert(`Congratulations! You selected the brand name: ${s}. We have locked it for your trademark registry.`);
                };
                output.appendChild(el);
            });
        }
    }

    // Certification Quiz Checker
    function submitQuizCheck() {
        const selected = document.querySelector('input[name="quiz_ans1"]:checked');
        if (!selected) {
            alert('Please select an answer to submit.');
            return;
        }

        fetch('{{ route("shg.training.quiz") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ course_id: '1', answers: [selected.value] })
        })
        .then(res => res.json())
        .then(data => {
            if(data.status === 'success' && data.passed) {
                document.getElementById('quiz-active-card').classList.add('hidden');
                document.getElementById('quiz-certificate-card').classList.remove('hidden');
            } else {
                alert('Score: ' + data.score + '/2. Verification failed, review the sanitary guidelines and retake the quiz!');
            }
        })
        .catch(err => {
            console.error('Quiz failed', err);
        });
    }

    function resetQuiz() {
        document.getElementById('quiz-certificate-card').classList.add('hidden');
        document.getElementById('quiz-active-card').classList.remove('hidden');
        const radios = document.getElementsByName('quiz_ans1');
        radios.forEach(r => r.checked = false);
    }

    // CHART.JS GRAPHS BOOTSTRAP
    document.addEventListener('DOMContentLoaded', () => {
        // Sales and Growth Chart
        const salesCtx = document.getElementById('shgSalesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Monthly Collective Sales (₹)',
                    data: [28000, 31000, 35000, 42000, 44000, 48200],
                    borderColor: '#8b5cf6', // Purple
                    backgroundColor: 'rgba(139, 92, 246, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#10b981', // Emerald
                    pointBorderWidth: 2,
                    pointRadius: 5
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

        // Product Demand Polar Chart
        const demandCtx = document.getElementById('productDemandChart').getContext('2d');
        new Chart(demandCtx, {
            type: 'polarArea',
            data: {
                labels: ['Tomato Pickle', 'Organic Ghee', 'Wheat Flour'],
                datasets: [{
                    data: [120, 240, 180],
                    backgroundColor: [
                        'rgba(16, 185, 129, 0.6)', // Emerald
                        'rgba(139, 92, 246, 0.6)', // Purple
                        'rgba(245, 158, 11, 0.6)'  // Amber
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: { ticks: { display: false }, grid: { display: false } }
                },
                plugins: { legend: { display: false } }
            }
        });

        // Setup scrollspy active tab highlighters
        const links = document.querySelectorAll('.sidebar-link');
        const sections = document.querySelectorAll('section');

        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                // If section is hidden in SPA tab mode, ignore it
                if (section.offsetParent !== null) {
                    const sectionTop = section.offsetTop;
                    if ((window.pageYOffset || window.scrollY || 0) >= sectionTop - 120) {
                        current = section.getAttribute('id');
                    }
                }
            });

            if (current) {
                links.forEach(link => {
                    link.classList.remove('active-tab');
                    if (link.getAttribute('href') === `#${current}`) {
                        link.classList.add('active-tab');
                    }
                });
            }
        });
    });

    // Toggle dropdowns in header
    function toggleNavbarDropdown(dropdownId, event) {
        event.stopPropagation();
        const dropdowns = ['notifications-dropdown', 'profile-dropdown'];
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
        const dropdowns = ['notifications-dropdown', 'profile-dropdown'];
        dropdowns.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.classList.add('hidden');
        });
    });

    // Profile Modal Toggle
    function openProfileModal() {
        const modal = document.getElementById('profile-modal');
        if (modal) {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.querySelector('div').classList.remove('scale-95');
                modal.querySelector('div').classList.add('scale-100');
            }, 10);
        }
    }

    function closeProfileModal() {
        const modal = document.getElementById('profile-modal');
        if (modal) {
            modal.querySelector('div').classList.remove('scale-100');
            modal.querySelector('div').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 150);
        }
    }

    // Direct printable performance and audit report generator
    function printSHGReport() {
        const shgName = {!! json_encode(auth()->user()->name ?? 'Maa Shakti SHG') !!};
        const regNum = {!! json_encode($shg->registration_number ?? 'SHG-PB-PAT-4901') !!};
        const leaderName = {!! json_encode($shg->leader_name ?? 'Sunita Devi') !!};
        const membersCount = {!! json_encode($shg->members_count ?? '12') !!};
        const bankName = {!! json_encode($shg->bank_name ?? 'State Bank of India') !!};
        const accNum = {!! json_encode($shg->account_number ?? '39281002345') !!};
        const address = {!! json_encode($shg->address ?? 'Gali No. 3, Near Panchayat Ghar, Kalyan') !!};
        const pincode = {!! json_encode($shg->pincode ?? '147001') !!};

        let inventoryHtml = '';
        @foreach($inventory as $item)
            inventoryHtml += `
                <tr class="border-b border-slate-200">
                    <td class="py-2.5 px-3 font-bold text-slate-850 text-left">${ {!! json_encode($item->product_name) !!} }</td>
                    <td class="py-2.5 px-3 text-slate-650 text-left">${ {!! json_encode($item->raw_stock) !!} } kg</td>
                    <td class="py-2.5 px-3 text-slate-650 text-left">${ {!! json_encode($item->processed_stock) !!} } units</td>
                    <td class="py-2.5 px-3 text-slate-650 text-left">${ {!! json_encode($item->packaging_type) !!} }</td>
                    <td class="py-2.5 px-3 text-slate-800 font-bold text-left">${ {!! json_encode($item->efficiency_score) !!} }%</td>
                </tr>
            `;
        @endforeach

        let productsHtml = '';
        @foreach($products as $prod)
            productsHtml += `
                <tr class="border-b border-slate-200">
                    <td class="py-2.5 px-3 font-bold text-slate-850 text-left">${ {!! json_encode($prod->product_name) !!} }</td>
                    <td class="py-2.5 px-3 text-slate-650 text-left">${ {!! json_encode($prod->category) !!} }</td>
                    <td class="py-2.5 px-3 text-slate-800 font-bold text-left">₹${ {!! json_encode($prod->price) !!} }</td>
                    <td class="py-2.5 px-3 text-emerald-700 font-bold text-left">${ {!! json_encode($prod->marketplace_status) !!} }</td>
                </tr>
            `;
        @endforeach

        let buyersHtml = '';
        @foreach($buyersList as $buyer)
            buyersHtml += `
                <tr class="border-b border-slate-200">
                    <td class="py-2.5 px-3 font-bold text-slate-850 text-left">${ {!! json_encode($buyer->buyer_name) !!} }</td>
                    <td class="py-2.5 px-3 text-slate-650 text-left">${ {!! json_encode($buyer->location) !!} }</td>
                    <td class="py-2.5 px-3 text-slate-800 text-left">${ {!! json_encode($buyer->product_interest) !!} }</td>
                    <td class="py-2.5 px-3 text-slate-650 text-left">${ {!! json_encode($buyer->contact) !!} }</td>
                </tr>
            `;
        @endforeach

        const printWindow = window.open('', '_blank');
        if (!printWindow) {
            alert('Popup blocker active. Please allow popups for FarmTech to download your official PDF report.');
            return;
        }

        printWindow.document.write(`
            <html>
            <head>
                <title>NCDC Cooperative Performance Report - ${shgName}</title>
                <script src="https://cdn.tailwindcss.com"><\/script>
                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800;900&display=swap');
                    body {
                        font-family: 'Outfit', sans-serif;
                        -webkit-print-color-adjust: exact;
                        print-color-adjust: exact;
                    }
                    @media print {
                        .no-print { display: none !important; }
                        body { padding: 0; margin: 0; }
                    }
                </style>
            </head>
            <body class="bg-white p-8">
                <!-- Action bar for saving/printing -->
                <div class="no-print max-w-4xl mx-auto mb-6 flex justify-between items-center bg-slate-50 border border-slate-150 p-4 rounded-2xl">
                    <div class="text-xs font-semibold text-slate-500 text-left">
                        📄 Official PDF Report builder ready. Please click 'Print / Save' and choose 'Save as PDF' to download.
                    </div>
                    <button onclick="window.print()" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-black shadow transition-all">Print / Save as PDF</button>
                </div>

                <div class="max-w-4xl mx-auto border-4 border-double border-slate-300 rounded-[2.5rem] p-10 bg-white relative">
                    <!-- Top Ribbon -->
                    <div class="flex items-center justify-between border-b-2 border-slate-200 pb-6 mb-8">
                        <div class="text-left">
                            <span class="text-[9px] font-black uppercase tracking-widest px-2.5 py-1 bg-purple-50 text-purple-700 rounded-full border border-purple-100">National Cooperative Development Corp</span>
                            <h1 class="text-2xl font-black text-slate-900 mt-2 tracking-tight">Cooperative Performance Report</h1>
                            <p class="text-xs font-semibold text-slate-500 mt-1">Verified Audit logs & Food Processing Inventories</p>
                        </div>
                        <div class="w-16 h-16 rounded-2xl bg-emerald-600 flex items-center justify-center font-black text-white text-2xl shadow-md">
                            NCDC
                        </div>
                    </div>

                    <!-- Profile Metadata Grid -->
                    <div class="grid grid-cols-2 gap-4 mb-8 bg-slate-50 p-6 rounded-3xl border border-slate-100 text-xs font-semibold text-slate-650">
                        <div class="text-left">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-wider mb-0.5">SHG Collective Name</p>
                            <p class="font-black text-slate-900 text-sm">${shgName}</p>
                        </div>
                        <div class="text-left">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-wider mb-0.5">Registration Number</p>
                            <p class="font-black text-slate-900">${regNum}</p>
                        </div>
                        <div class="text-left">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-wider mb-0.5">Authorized Leader</p>
                            <p class="font-black text-slate-900">${leaderName}</p>
                        </div>
                        <div class="text-left">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-wider mb-0.5">Active Members Count</p>
                            <p class="font-black text-slate-900">${membersCount} Members</p>
                        </div>
                        <div class="text-left">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-wider mb-0.5">Linked Bank details</p>
                            <p class="font-black text-slate-900">${bankName} (A/C: ${accNum})</p>
                        </div>
                        <div class="text-left">
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-wider mb-0.5">Registered Office</p>
                            <p class="font-black text-slate-900">${address}, PIN-${pincode}</p>
                        </div>
                    </div>

                    <!-- Section 1: Value-Added Inventory -->
                    <div class="space-y-4 mb-8">
                        <h2 class="text-sm font-black text-slate-800 uppercase tracking-wider border-l-4 border-emerald-500 pl-2.5 text-left">1. Value-Added Processing Log</h2>
                        <table class="w-full text-xs font-semibold text-slate-650 border border-slate-100 rounded-2xl overflow-hidden">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 uppercase tracking-wider border-b border-slate-200">
                                    <th class="py-2.5 px-3 font-black text-left">Product Name</th>
                                    <th class="py-2.5 px-3 font-black text-left">Raw Input</th>
                                    <th class="py-2.5 px-3 font-black text-left">Processed Output</th>
                                    <th class="py-2.5 px-3 font-black text-left">Packaging Type</th>
                                    <th class="py-2.5 px-3 font-black text-left">Efficiency Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${inventoryHtml || '<tr><td colspan="5" class="py-4 text-center text-slate-400">No inventory logged yet</td></tr>'}
                            </tbody>
                        </table>
                    </div>

                    <!-- Section 2: Active Market Catalog -->
                    <div class="space-y-4 mb-8">
                        <h2 class="text-sm font-black text-slate-800 uppercase tracking-wider border-l-4 border-purple-500 pl-2.5 text-left">2. Active Marketplace Listings</h2>
                        <table class="w-full text-xs font-semibold text-slate-650 border border-slate-100 rounded-2xl overflow-hidden">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 uppercase tracking-wider border-b border-slate-200">
                                    <th class="py-2.5 px-3 font-black text-left">Listed Product</th>
                                    <th class="py-2.5 px-3 font-black text-left">Category</th>
                                    <th class="py-2.5 px-3 font-black text-left">Listed Wholesale Price</th>
                                    <th class="py-2.5 px-3 font-black text-left">Marketplace Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${productsHtml || '<tr><td colspan="4" class="py-4 text-center text-slate-400">No listed products found</td></tr>'}
                            </tbody>
                        </table>
                    </div>

                    <!-- Section 3: Verified Buyer Requests -->
                    <div class="space-y-4 mb-10">
                        <h2 class="text-sm font-black text-slate-800 uppercase tracking-wider border-l-4 border-amber-500 pl-2.5 text-left">3. Scanned Buyer Requests Log</h2>
                        <table class="w-full text-xs font-semibold text-slate-650 border border-slate-100 rounded-2xl overflow-hidden">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 uppercase tracking-wider border-b border-slate-200">
                                    <th class="py-2.5 px-3 font-black text-left">Merchant / Buyer Name</th>
                                    <th class="py-2.5 px-3 font-black text-left">Location</th>
                                    <th class="py-2.5 px-3 font-black text-left">Product Demand</th>
                                    <th class="py-2.5 px-3 font-black text-left">Contact Channel</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${buyersHtml || '<tr><td colspan="4" class="py-4 text-center text-slate-400">No buyers matching current scanning matrix</td></tr>'}
                            </tbody>
                        </table>
                    </div>

                    <!-- Signatures Block -->
                    <div class="flex items-center justify-between border-t border-slate-200 pt-8 mt-10 text-xs font-bold text-slate-500">
                        <div class="text-left">
                            <span>Audit Disbursed On</span>
                            <div class="text-slate-900 font-black text-sm mt-1">${new Date().toLocaleDateString('en-US', { month: 'long', year: 'numeric', day: 'numeric' })}</div>
                        </div>
                        <div class="text-right">
                            <span>Authorized Verification Seal</span>
                            <div class="text-emerald-700 font-black text-sm mt-1">NABARD PUNJAB COOPERATIVE COMMISSION</div>
                        </div>
                    </div>
                </div>

                <script>
                    window.onload = function() {
                        setTimeout(function() {
                            window.print();
                        }, 500);
                    };
                <\/script>
            </body>
            </html>
        `);
        printWindow.document.close();
    }
</script>
@endsection
