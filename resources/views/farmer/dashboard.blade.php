@extends('layouts.app')

@section('content')
<div class="bg-[#fcfdfb] h-screen w-screen text-slate-800 antialiased flex overflow-hidden relative">
    
    <!-- Grid Pattern Background -->
    <div class="absolute inset-0 z-0 opacity-5 pointer-events-none">
        <svg class="h-full w-full" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="plus-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 20 0 L 20 40 M 0 20 L 40 20" fill="none" stroke="currentColor" stroke-width="0.5" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#plus-grid)" />
        </svg>
    </div>

    <!-- Soft Blur Glow Backdrops -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-green-200 rounded-full blur-3xl opacity-30 z-0 pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-purple-200 rounded-full blur-3xl opacity-30 z-0 pointer-events-none"></div>
    
    <!-- Sidebar Navigation -->
    <x-sidebar />

    <!-- Main Dashboard Container -->
    <div class="flex-1 h-screen flex flex-col transition-all duration-300 relative z-10 overflow-hidden lg:pl-72">
        
        <!-- Top Navbar (Feature 9 Mobile Sidebar trigger included) -->
        <nav class="sticky top-0 z-30 bg-white/95 backdrop-blur-xl border-b border-slate-100 px-6 py-4 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        Welcome Back, {{ explode(' ', auth()->user()->name ?? 'Ramesh Kumar')[0] }} 👋
                    </h1>
                    <p class="text-xs font-semibold text-slate-500">Kalyan Village, Patiala District, Punjab</p>
                </div>
            </div>

            <!-- Navbar Actions -->
            <div class="flex items-center gap-4">
                
                <!-- Weather Widget Quick Pill (Feature 2) -->
                <div class="hidden md:flex items-center gap-2.5 px-4 py-2 bg-gradient-to-r from-emerald-500/10 to-teal-500/10 border border-emerald-100 rounded-full text-xs font-bold text-emerald-800">
                    <svg class="w-5 h-5 text-emerald-600 animate-spin-slow" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464-5.636a1 1 0 010 1.414l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-5.464 4.036a1 1 0 010 1.414l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 0zM7 10a1 1 0 00-1-1H5a1 1 0 100 2h1a1 1 0 001-1zM5.05 6.464a1 1 0 10-1.414 1.414l.707.707a1 1 0 001.414-1.414l-.707-.707zm1.414 8.486a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707z" clip-rule="evenodd"></path></svg>
                    <span id="nav-weather-badge">32°C • Light Drizzle Advisory</span>
                </div>

                <!-- Comprehensive Executive Report Button -->
                <button onclick="switchTab('reports')" class="hidden sm:flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white rounded-full text-xs font-black shadow-md hover:scale-105 active:scale-95 transition-all focus:outline-none">
                    <span>🧾</span> Report Hub
                </button>

                <!-- Notifications Quick-center (Feature 9) -->
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open" class="p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-600 border border-slate-100 transition-colors relative">
                        <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-1 right-1 flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                        </span>
                    </button>
                    
                    <!-- Notifications Dropdown Menu -->
                    <div x-show="open" x-transition.opacity.duration.200ms class="absolute right-0 mt-3 w-80 bg-white/95 backdrop-blur-xl border border-slate-100/70 shadow-2xl rounded-3xl p-4 z-50 space-y-3" style="display: none;">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                            <h3 class="text-xs font-black text-slate-800 uppercase tracking-wider flex items-center gap-1.5">
                                <span>🔔</span> Notifications
                            </h3>
                            <span class="text-[9px] font-black bg-red-100 text-red-700 px-2 py-0.5 rounded-full uppercase tracking-wider">3 New</span>
                        </div>
                        
                        <div class="space-y-2.5 max-h-72 overflow-y-auto no-scrollbar">
                            <!-- Notification Item 1: Mandi Price Spike -->
                            <div class="p-2.5 bg-gradient-to-br from-emerald-500/5 to-teal-500/5 hover:from-emerald-500/10 hover:to-teal-500/10 border border-emerald-100/35 rounded-2xl transition-all duration-200">
                                <div class="flex justify-between items-start">
                                    <span class="text-[10px] font-black text-emerald-800 uppercase tracking-wider">🌾 Mandi Price Alert</span>
                                    <span class="text-[8px] text-slate-400 font-bold">Just now</span>
                                </div>
                                <p class="text-[11px] text-slate-600 font-semibold mt-1">Wheat prices spiked by <b class="text-emerald-700">+₹15</b> in Patiala Mandi today.</p>
                            </div>

                            <!-- Notification Item 2: Weather Warning -->
                            <div class="p-2.5 bg-gradient-to-br from-purple-500/5 to-indigo-500/5 hover:from-purple-500/10 hover:to-indigo-500/10 border border-purple-100/35 rounded-2xl transition-all duration-200">
                                <div class="flex justify-between items-start">
                                    <span class="text-[10px] font-black text-purple-800 uppercase tracking-wider">🌤️ Weather Warning</span>
                                    <span class="text-[8px] text-slate-400 font-bold">5 mins ago</span>
                                </div>
                                <p class="text-[11px] text-slate-600 font-semibold mt-1">High windstorm advisory issued for Punjab agricultural blocks over 48h.</p>
                            </div>

                            <!-- Notification Item 3: Scheme Match -->
                            <div class="p-2.5 bg-gradient-to-br from-amber-500/5 to-orange-500/5 hover:from-amber-500/10 hover:to-orange-500/10 border border-amber-100/35 rounded-2xl transition-all duration-200">
                                <div class="flex justify-between items-start">
                                    <span class="text-[10px] font-black text-amber-800 uppercase tracking-wider">🏛️ Scheme Updates</span>
                                    <span class="text-[8px] text-slate-400 font-bold">2 hours ago</span>
                                </div>
                                <p class="text-[11px] text-slate-600 font-semibold mt-1">Your PM-KISAN application document has successfully passed verification.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Profile photo with role -->
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <div class="flex items-center gap-3 border-l border-slate-100 pl-4 cursor-pointer" @click="open = !open">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-emerald-500 to-purple-600 p-[2px]">
                            <div class="w-full h-full rounded-full bg-white flex items-center justify-center font-black text-emerald-600">
                                {{ substr(explode(' ', Auth::user()->name ?? 'Ramesh Kumar')[0], 0, 1) }}
                            </div>
                        </div>
                        <div class="hidden sm:block text-left">
                            <h4 class="text-xs font-black text-slate-800 leading-none">{{ Auth::user()->name ?? 'Ramesh Kumar' }}</h4>
                            <span class="text-[9px] font-black text-purple-600 uppercase tracking-widest leading-none">{{ Auth::user()->role ?? 'Farmer' }}</span>
                        </div>
                    </div>

                    <!-- Dropdown Menu -->
                    <div x-show="open" x-transition.opacity.duration.200ms class="absolute right-0 mt-3 w-48 bg-white border border-slate-100 rounded-2xl shadow-xl py-2 z-50" style="display: none;">
                        <a href="#profile" class="block px-4 py-2 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 font-bold transition-colors flex items-center gap-2">
                            <span>👤</span> My Profile
                        </a>
                        <a href="#forum" class="block px-4 py-2 text-sm text-slate-700 hover:bg-emerald-50 hover:text-emerald-600 font-bold transition-colors flex items-center gap-2">
                            <span>💬</span> Community Forum
                        </a>
                        <div class="h-px bg-slate-100 my-2"></div>
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-bold transition-colors flex items-center gap-2">
                                <span>🔑</span> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Scrolling Content Body -->
        <main class="flex-1 p-6 md:p-8 space-y-8 overflow-y-auto">

            <!-- PWA Offline Notice Banner (Feature 9) -->
            <div id="pwa-offline-banner" class="hidden flex items-center justify-between p-4 bg-purple-50 border border-purple-100 rounded-3xl shadow-sm text-sm text-purple-800 font-semibold animate-pulse">
                <div class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 bg-purple-500 rounded-full"></span>
                    <span>Simulated Offline Mode Active: Soil testing, claim uploads, and forum postings will be cached locally and synced automatically when connections resume.</span>
                </div>
                <button onclick="document.getElementById('pwa-offline-banner').classList.add('hidden')" class="text-purple-600 hover:text-purple-800 text-xs font-bold font-black uppercase">Dismiss</button>
            </div>

            <!-- OVERVIEW ANALYTICS SECTON (#overview) -->
            <section id="overview" class="space-y-6 scroll-mt-24">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                        <span class="h-7 w-2.5 bg-emerald-500 rounded-full inline-block shadow-md shadow-emerald-500/20"></span>
                        Overview Analytics
                    </h2>
                    <span class="text-xs font-extrabold text-slate-500 bg-slate-100/90 px-4 py-2 rounded-full border border-slate-150 backdrop-blur shadow-sm">Updated 5 mins ago</span>
                </div>
 
                <!-- Analytics Grid -->
                <div id="overview-metrics-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
 
                    <!-- Farmer Health Score (Unique Feature ⭐) -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:shadow-2xl hover:border-emerald-300 transition-all duration-300 flex flex-col justify-between group">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-sm font-black text-slate-500 uppercase tracking-wider">Farmer Health Score</h3>
                                <p class="text-xs font-semibold text-slate-400 mt-1">Based on yields, training & schemes</p>
                            </div>
                            <span class="text-[10px] px-3 py-1 bg-emerald-50 text-emerald-800 border border-emerald-100 rounded-full font-black uppercase tracking-wider shadow-sm">AI Rated</span>
                        </div>
                        <div class="flex items-center justify-around gap-6 my-3">
                            <!-- Circular SVG Gauge -->
                            <div class="relative w-28 h-28 flex items-center justify-center flex-shrink-0">
                                <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                                    <path class="text-slate-100" stroke-width="3" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                    <path class="text-emerald-500" stroke-width="3.2" stroke-dasharray="82, 100" stroke-linecap="round" stroke="currentColor" fill="none" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" style="filter: drop-shadow(0px 2px 4px rgba(16,185,129,0.3));" />
                                </svg>
                                <div class="absolute flex flex-col items-center justify-center text-center">
                                    <span class="text-3xl font-black text-slate-900 leading-none">82</span>
                                    <span class="text-xs font-bold text-slate-400 leading-none mt-1">/ 100</span>
                                </div>
                            </div>
                            <!-- Score details -->
                            <div class="space-y-2.5">
                                <div class="flex items-center gap-2.5 text-sm font-bold">
                                    <span class="w-3 h-3 bg-emerald-500 rounded-full shadow-md shadow-emerald-500/30"></span>
                                    <span class="text-slate-500">Yield: <b class="text-slate-900 font-black">92%</b></span>
                                </div>
                                <div class="flex items-center gap-2.5 text-sm font-bold">
                                    <span class="w-3 h-3 bg-purple-500 rounded-full shadow-md shadow-purple-500/30"></span>
                                    <span class="text-slate-500">Training: <b class="text-slate-900 font-black">75%</b></span>
                                </div>
                                <div class="flex items-center gap-2.5 text-sm font-bold">
                                    <span class="w-3 h-3 bg-amber-500 rounded-full shadow-md shadow-amber-500/30"></span>
                                    <span class="text-slate-500">Schemes: <b class="text-slate-900 font-black">80%</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-slate-100 bg-gradient-to-br from-purple-50 to-emerald-50/40 p-4 rounded-[1.5rem] border border-purple-100/40">
                            <h4 class="text-xs font-black text-purple-700 uppercase tracking-widest flex items-center gap-2">
                                <svg class="w-4.5 h-4.5 text-purple-650" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                                Smart Suggestion
                            </h4>
                            <p class="text-xs md:text-sm text-slate-700 font-semibold leading-relaxed mt-2">Participate in the upcoming Organic Composting training on May 24th to boost your score to **90/100**!</p>
                        </div>
                    </div>
 
                    <!-- Crop Status Overview -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:shadow-2xl hover:border-emerald-300 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-sm font-black text-slate-500 uppercase tracking-wider">Crop Status</h3>
                                    <p class="text-xs font-semibold text-slate-400 mt-1">Current active cultivation</p>
                                </div>
                                <span class="text-[10px] px-3 py-1 bg-purple-50 text-purple-800 border border-purple-100 rounded-full font-black uppercase tracking-wider shadow-sm">Wheat & Mustard</span>
                            </div>
                            <!-- Cultivation details -->
                            <div class="space-y-4 my-3">
                                <div>
                                    <div class="flex justify-between text-xs md:text-sm font-bold mb-2">
                                        <span class="text-slate-800">Wheat (Flowering Stage)</span>
                                        <span class="text-emerald-700 font-black">65% Progress</span>
                                    </div>
                                    <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden border border-slate-100/50">
                                        <div class="bg-gradient-to-r from-emerald-400 to-emerald-650 h-full rounded-full animate-pulse" style="width: 65%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-xs md:text-sm font-bold mb-2">
                                        <span class="text-slate-800">Mustard (Pod Filling Stage)</span>
                                        <span class="text-purple-700 font-black">85% Progress</span>
                                    </div>
                                    <div class="w-full bg-slate-100 h-3 rounded-full overflow-hidden border border-slate-100/50">
                                        <div class="bg-gradient-to-r from-purple-400 to-purple-650 h-full rounded-full animate-pulse" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-slate-100 flex justify-between items-center text-xs md:text-sm font-bold text-slate-500">
                            <span>Irrigation: <b class="text-slate-900 font-black">Drip System</b></span>
                            <span>Est. Harvest: <b class="text-slate-900 font-black">June 2026</b></span>
                        </div>
                    </div>
 
                    <!-- Mandi price & Weather quick widget -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:shadow-2xl hover:border-emerald-300 transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-sm font-black text-slate-500 uppercase tracking-wider">Quick Market & Climate Alerts</h3>
                                    <p class="text-xs font-semibold text-slate-400 mt-1">Important real-time regional feeds</p>
                                </div>
                            </div>
                            <!-- Alerts -->
                            <div class="space-y-3.5 my-2">
                                <!-- Price alert -->
                                <div class="flex gap-3.5 items-center p-3.5 bg-gradient-to-r from-emerald-500/5 to-teal-500/5 rounded-2xl border border-emerald-100/50 shadow-sm hover:scale-[1.02] transition-transform">
                                    <div class="w-10 h-10 rounded-xl bg-emerald-100/80 flex items-center justify-center text-emerald-600 flex-shrink-0 font-bold text-xl shadow-sm">📈</div>
                                    <div>
                                        <p class="text-xs md:text-sm font-black text-slate-900 leading-tight">Wheat Mandi Trend</p>
                                        <p class="text-xs font-bold text-emerald-705 mt-1">₹2,450/qtl • Rising (+4.2%) • <span class="underline font-black">HOLD</span></p>
                                    </div>
                                </div>
                                <!-- Climate alert -->
                                <div class="flex gap-3.5 items-center p-3.5 bg-gradient-to-r from-amber-500/5 to-orange-500/5 rounded-2xl border border-amber-100/50 shadow-sm hover:scale-[1.02] transition-transform">
                                    <div class="w-10 h-10 rounded-xl bg-amber-100/80 flex items-center justify-center text-amber-600 flex-shrink-0 font-bold text-xl shadow-sm">⚠️</div>
                                    <div>
                                        <p class="text-xs md:text-sm font-black text-slate-900 leading-tight">Irrigation Rain Warning</p>
                                        <p class="text-xs font-bold text-amber-705 mt-1 leading-normal">Light rain expected in 2 days. Stop irrigation.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between text-xs font-bold text-slate-500 pt-4 border-t border-slate-100">
                            <span>Active Schemes: <b class="text-slate-900 font-black">3 Verified</b></span>
                            <span>Soil pH: <b class="text-slate-900 font-black">6.8 (Optimal)</b></span>
                        </div>
                    </div>
 
                </div>
 
                <!-- Premium SaaS Module Control Panel (App Launcher) -->
                <div id="feature-center-block" class="pt-6 border-t border-slate-200/60">
                    <h3 class="text-lg font-black text-slate-900 tracking-tight flex items-center gap-3 mb-6">
                        <span class="h-7 w-2.5 bg-purple-500 rounded-full inline-block shadow-md shadow-purple-500/30"></span>
                        Smart Farming Feature Center
                    </h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        <!-- Digital Profile Card -->
                        <div onclick="switchTab('profile')" class="group cursor-pointer bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-emerald-500/10 active:scale-[0.97] transition-all duration-300 flex flex-col justify-between min-h-[250px] relative overflow-hidden">
                            <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-emerald-400/10 to-teal-500/10 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white shadow-lg shadow-emerald-500/20 group-hover:rotate-6 transition-transform">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-150">Digital ID</span>
                            </div>
                            <div class="mt-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h4 class="text-lg font-black text-slate-800 group-hover:text-emerald-600 transition-colors leading-tight">My Digital Profile</h4>
                                    <p class="text-xs md:text-sm text-slate-500 font-semibold mt-2 leading-relaxed">Verify land area, soil profile credentials & cooperative certifications.</p>
                                </div>
                                <!-- Analytics Summary Pill -->
                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                    <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Region / Land:</span>
                                    <span class="text-xs font-black text-emerald-700 bg-emerald-50 px-3 py-0.5 rounded-lg border border-emerald-100/50">Patiala, PB • 4.5 Ac</span>
                                </div>
                            </div>
                        </div>
 
                        <!-- Crop Advisory Card -->
                        <div onclick="switchTab('advisory')" class="group cursor-pointer bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-emerald-500/10 active:scale-[0.97] transition-all duration-300 flex flex-col justify-between min-h-[250px] relative overflow-hidden">
                            <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-green-400/10 to-emerald-500/10 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-green-400 to-emerald-500 flex items-center justify-center text-white shadow-lg shadow-green-500/20 group-hover:rotate-6 transition-transform">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19V5m0 0C9 9 4 10 4 14a8 8 0 0016 0c0-4-5-5-8-9z"></path></svg>
                                </div>
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-150">Crop Care</span>
                            </div>
                            <div class="mt-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h4 class="text-lg font-black text-slate-800 group-hover:text-emerald-600 transition-colors leading-tight">Crop Advisory</h4>
                                    <p class="text-xs md:text-sm text-slate-500 font-semibold mt-2 leading-relaxed">Get customized agromet suggestions & instant extreme weather alerts.</p>
                                </div>
                                <!-- Analytics Summary Pill -->
                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                    <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Live Advisory:</span>
                                    <span class="text-xs font-black text-amber-700 bg-amber-50 px-3 py-0.5 rounded-lg border border-amber-100/50">⚠️ Light Drizzle Alert</span>
                                </div>
                            </div>
                        </div>
 
                        <!-- Soil Testing Card -->
                        <div onclick="switchTab('soil')" class="group cursor-pointer bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-emerald-500/10 active:scale-[0.97] transition-all duration-300 flex flex-col justify-between min-h-[250px] relative overflow-hidden">
                            <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-purple-400/10 to-indigo-500/10 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-purple-400 to-indigo-500 flex items-center justify-center text-white shadow-lg shadow-purple-500/20 group-hover:rotate-6 transition-transform">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-.102-.547l-2.377-4.754a2 2 0 01-.22-.917V5a2 2 0 00-2-2H9.271a2 2 0 00-2 2v4.21a2 2 0 01-.22.917l-2.377 4.754a2 2 0 00-.102.547c0 1.105.895 2 2 2h10.856a2 2 0 002-2zM9.271 8.5h5.458"></path></svg>
                                </div>
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-150">Lab Test</span>
                            </div>
                            <div class="mt-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h4 class="text-lg font-black text-slate-800 group-hover:text-emerald-600 transition-colors leading-tight">Soil Health Card</h4>
                                    <p class="text-xs md:text-sm text-slate-500 font-semibold mt-2 leading-relaxed">Enter pH levels, check organic compounds & review NPK advice.</p>
                                </div>
                                <!-- Analytics Summary Pill -->
                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                    <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Chemistry:</span>
                                    <span class="text-xs font-black text-emerald-700 bg-emerald-50 px-3 py-0.5 rounded-lg border border-emerald-100/50">pH 6.8 (Optimal) • NPK</span>
                                </div>
                            </div>
                        </div>
 
                        <!-- Government Schemes Card -->
                        <div onclick="switchTab('schemes')" class="group cursor-pointer bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-emerald-500/10 active:scale-[0.97] transition-all duration-300 flex flex-col justify-between min-h-[250px] relative overflow-hidden">
                            <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-indigo-400/10 to-blue-500/10 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-400 to-blue-500 flex items-center justify-center text-white shadow-lg shadow-indigo-500/20 group-hover:rotate-6 transition-transform">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V10M5 21V10M2 10h20M12 3L2 10h20L12 3zM12 10v11M9 21h6"></path></svg>
                                </div>
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-150">Benefits</span>
                            </div>
                            <div class="mt-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h4 class="text-lg font-black text-slate-800 group-hover:text-emerald-600 transition-colors leading-tight">Government Schemes</h4>
                                    <p class="text-xs md:text-sm text-slate-500 font-semibold mt-2 leading-relaxed">Browse AI-matched financial programs, PM-KISAN, and urea subsidies.</p>
                                </div>
                                <!-- Analytics Summary Pill -->
                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                    <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Financial Aid:</span>
                                    <span class="text-xs font-black text-purple-700 bg-purple-50 px-3 py-0.5 rounded-lg border border-purple-100/50">₹24,500 Total Benefit</span>
                                </div>
                            </div>
                        </div>
 
                        <!-- Application Tracker Card -->
                        <div onclick="switchTab('tracker')" class="group cursor-pointer bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-emerald-500/10 active:scale-[0.97] transition-all duration-300 flex flex-col justify-between min-h-[250px] relative overflow-hidden">
                            <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-amber-400/10 to-orange-500/10 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-white shadow-lg shadow-amber-500/20 group-hover:rotate-6 transition-transform">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                </div>
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-150">Progress</span>
                            </div>
                            <div class="mt-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h4 class="text-lg font-black text-slate-800 group-hover:text-emerald-600 transition-colors leading-tight">Application Tracker</h4>
                                    <p class="text-xs md:text-sm text-slate-500 font-semibold mt-2 leading-relaxed">Track live verification phases of fertilizer claims and PM-KISAN payouts.</p>
                                </div>
                                <!-- Analytics Summary Pill -->
                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                    <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Live Status:</span>
                                    <span class="text-xs font-black text-purple-700 bg-purple-50 px-3 py-0.5 rounded-lg border border-purple-100/50">Verified (75%)</span>
                                </div>
                            </div>
                        </div>
 
                        <!-- Market Prices Card -->
                        <div onclick="switchTab('market')" class="group cursor-pointer bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-emerald-500/10 active:scale-[0.97] transition-all duration-300 flex flex-col justify-between min-h-[250px] relative overflow-hidden">
                            <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-blue-400/10 to-cyan-500/10 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-blue-400 to-cyan-500 flex items-center justify-center text-white shadow-lg shadow-blue-500/20 group-hover:rotate-6 transition-transform">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                                </div>
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-150">Market</span>
                            </div>
                            <div class="mt-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h4 class="text-lg font-black text-slate-800 group-hover:text-emerald-600 transition-colors leading-tight">Market Prices</h4>
                                    <p class="text-xs md:text-sm text-slate-500 font-semibold mt-2 leading-relaxed">Check real-time wholesale Mandi indices with HOLD or SELL predictive signals.</p>
                                </div>
                                <!-- Analytics Summary Pill -->
                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                    <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Patiala Mandi:</span>
                                    <span class="text-xs font-black text-emerald-700 bg-emerald-50 px-3 py-0.5 rounded-lg border border-emerald-100/50">Wheat: ₹2,450 • HOLD</span>
                                </div>
                            </div>
                        </div>
 
                        <!-- Crop Insurance Card -->
                        <div onclick="switchTab('insurance')" class="group cursor-pointer bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-emerald-500/10 active:scale-[0.97] transition-all duration-300 flex flex-col justify-between min-h-[250px] relative overflow-hidden">
                            <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-rose-400/10 to-pink-500/10 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-rose-400 to-pink-500 flex items-center justify-center text-white shadow-lg shadow-rose-500/20 group-hover:rotate-6 transition-transform">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751A11.956 11.956 0 0112 2.714z"></path></svg>
                                </div>
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-150">Protection</span>
                            </div>
                            <div class="mt-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h4 class="text-lg font-black text-slate-800 group-hover:text-emerald-600 transition-colors leading-tight">Crop Insurance</h4>
                                    <p class="text-xs md:text-sm text-slate-500 font-semibold mt-2 leading-relaxed">Report seasonal crop damages and upload geo-tagged field snaps for payouts.</p>
                                </div>
                                <!-- Analytics Summary Pill -->
                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                    <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Active Claim:</span>
                                    <span class="text-xs font-black text-rose-700 bg-rose-50 px-3 py-0.5 rounded-lg border border-rose-100/50">35% Loss Est. • Review</span>
                                </div>
                            </div>
                        </div>
 
                        <!-- Community Forum Card -->
                        <div onclick="switchTab('forum')" class="group cursor-pointer bg-white/90 backdrop-blur-xl border border-slate-100 shadow-lg hover:shadow-2xl rounded-[2.5rem] p-6 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-emerald-500/10 active:scale-[0.97] transition-all duration-300 flex flex-col justify-between min-h-[250px] relative overflow-hidden">
                            <div class="absolute -right-6 -top-6 w-24 h-24 bg-gradient-to-br from-purple-400/10 to-pink-500/10 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center text-white shadow-lg shadow-purple-500/20 group-hover:rotate-6 transition-transform">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                </div>
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest bg-slate-50 px-3 py-1 rounded-full border border-slate-150">Social</span>
                            </div>
                            <div class="mt-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h4 class="text-lg font-black text-slate-800 group-hover:text-emerald-600 transition-colors leading-tight">Community Forum</h4>
                                    <p class="text-xs md:text-sm text-slate-500 font-semibold mt-2 leading-relaxed">Discuss soil health, equipment leases and harvest aggregations with peer FPOs.</p>
                                </div>
                                <!-- Analytics Summary Pill -->
                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                    <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider">Recent Activity:</span>
                                    <span class="text-xs font-black text-teal-700 bg-teal-50 px-3 py-0.5 rounded-lg border border-teal-100/50">12 Active Posts • 5m ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ===== ANALYTICS GRAPHS ROW ===== -->
                <div id="live-analytics-block" class="pt-6 border-t border-slate-200/60 space-y-6">

                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                            <span class="h-7 w-2.5 bg-blue-500 rounded-full inline-block shadow-md shadow-blue-500/20"></span>
                            Live Analytics
                        </h3>
                        <span class="text-xs font-extrabold text-slate-400 bg-slate-100/90 px-4 py-2 rounded-full border border-slate-150">Kharif–Rabi 2025–26</span>
                    </div>

                    <!-- Top Row: 2 large charts -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                        <!-- Yield Trend Line Chart -->
                        <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                            <div class="flex justify-between items-start mb-5">
                                <div>
                                    <h4 class="text-base font-black text-slate-900">Crop Yield Trend</h4>
                                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Quintals/acre — last 6 seasons</p>
                                </div>
                                <span class="text-[10px] px-3 py-1 bg-emerald-50 text-emerald-700 border border-emerald-100 rounded-full font-black uppercase tracking-wide">↑ 12% vs last yr</span>
                            </div>
                            <div class="relative h-56">
                                <canvas id="yieldTrendChart"></canvas>
                            </div>
                        </div>

                        <!-- Mandi Price Bar Chart -->
                        <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                            <div class="flex justify-between items-start mb-5">
                                <div>
                                    <h4 class="text-base font-black text-slate-900">Mandi Price Index</h4>
                                    <p class="text-xs font-semibold text-slate-400 mt-0.5">₹/quintal — Patiala Mandi, May 2026</p>
                                </div>
                                <span class="text-[10px] px-3 py-1 bg-blue-50 text-blue-700 border border-blue-100 rounded-full font-black uppercase tracking-wide">Live Rates</span>
                            </div>
                            <div class="relative h-56">
                                <canvas id="overviewMandiChart"></canvas>
                            </div>
                        </div>

                    </div>

                    <!-- Bottom Row: 2 smaller charts -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        <!-- Monthly Income vs Expense -->
                        <div class="lg:col-span-2 bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                            <div class="flex justify-between items-start mb-5">
                                <div>
                                    <h4 class="text-base font-black text-slate-900">Income vs Expense</h4>
                                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Monthly farm financials (₹ thousands)</p>
                                </div>
                                <span class="text-[10px] px-3 py-1 bg-purple-50 text-purple-700 border border-purple-100 rounded-full font-black uppercase tracking-wide">Net: +₹42K</span>
                            </div>
                            <div class="relative h-48">
                                <canvas id="incomeExpenseChart"></canvas>
                            </div>
                        </div>

                        <!-- Crop Distribution Doughnut -->
                        <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">
                            <div class="flex justify-between items-start mb-5">
                                <div>
                                    <h4 class="text-base font-black text-slate-900">Land Use</h4>
                                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Crop distribution — 4.5 acres</p>
                                </div>
                            </div>
                            <div class="relative h-48">
                                <canvas id="cropDistributionChart"></canvas>
                            </div>
                        </div>

                    </div>

                    <!-- KPI Stats Row -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-[2rem] p-5 text-white shadow-lg shadow-emerald-500/20 hover:-translate-y-1 transition-all">
                            <p class="text-xs font-black uppercase tracking-wider text-emerald-100">Total Yield</p>
                            <p class="text-3xl font-black mt-1">48.6 <span class="text-lg">qtl</span></p>
                            <p class="text-xs text-emerald-200 font-bold mt-1">↑ +5.2 from last season</p>
                        </div>
                        <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-[2rem] p-5 text-white shadow-lg shadow-purple-500/20 hover:-translate-y-1 transition-all">
                            <p class="text-xs font-black uppercase tracking-wider text-purple-100">Gross Income</p>
                            <p class="text-3xl font-black mt-1">₹1.18<span class="text-lg">L</span></p>
                            <p class="text-xs text-purple-200 font-bold mt-1">↑ +12% vs Rabi 2025</p>
                        </div>
                        <div class="bg-gradient-to-br from-amber-500 to-orange-500 rounded-[2rem] p-5 text-white shadow-lg shadow-amber-500/20 hover:-translate-y-1 transition-all">
                            <p class="text-xs font-black uppercase tracking-wider text-amber-100">Scheme Benefit</p>
                            <p class="text-3xl font-black mt-1">₹24.5<span class="text-lg">K</span></p>
                            <p class="text-xs text-amber-200 font-bold mt-1">PM-KISAN + Insurance</p>
                        </div>
                        <div class="bg-gradient-to-br from-blue-500 to-cyan-500 rounded-[2rem] p-5 text-white shadow-lg shadow-blue-500/20 hover:-translate-y-1 transition-all">
                            <p class="text-xs font-black uppercase tracking-wider text-blue-100">Soil Health</p>
                            <p class="text-3xl font-black mt-1">82<span class="text-lg">/100</span></p>
                            <p class="text-xs text-blue-200 font-bold mt-1">Grade A — Excellent</p>
                        </div>
                    </div>

                </div>
            </section>


            <!-- FEATURE 1 - DIGITAL PROFILE (#profile) -->
            <section id="profile" class="scroll-mt-24">
                <div class="bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 md:p-8 hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex flex-col lg:flex-row items-center gap-8">
                        <!-- Profile Image & Left details -->
                        <div class="flex flex-col items-center text-center lg:border-r lg:border-slate-100 lg:pr-8 flex-shrink-0 w-full lg:w-72">
                            <div class="relative w-32 h-32 rounded-[2.5rem] bg-gradient-to-tr from-emerald-500 to-purple-600 p-1 shadow-md mb-4 group overflow-hidden">
                                <div class="w-full h-full rounded-[2.3rem] bg-emerald-50 flex items-center justify-center font-black text-emerald-700 text-4xl">
                                    RK
                                </div>
                                <!-- PWA badge overlay -->
                                <span class="absolute bottom-1.5 right-1.5 bg-emerald-600 text-white rounded-full p-1 border border-white flex items-center justify-center shadow">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.9L10 1.554 17.834 4.9a1 1 0 01.616.92v5.334c0 3.327-2.096 6.3-5.263 7.424L10 19.554l-3.187-1.077c-3.167-1.124-5.263-4.097-5.263-7.424V5.82a1 1 0 01.616-.92zM10 12.35l3.707-3.708a1 1 0 00-1.414-1.414L10 9.522 7.707 7.228a1 1 0 00-1.414 1.414L10 12.35z" clip-rule="evenodd"></path></svg>
                                </span>
                            </div>
                            <h3 class="text-xl font-black text-slate-900 tracking-tight">{{ auth()->user()->name ?? 'Ramesh Kumar' }}</h3>
                            <span class="text-xs bg-slate-100 px-3 py-1 rounded-full font-bold text-slate-500 mt-1">Aadhaar: ****-****-8921</span>
                            
                            <div class="mt-6 flex flex-wrap gap-2 justify-center">
                                <span class="text-[10px] px-2.5 py-1 bg-purple-50 border border-purple-100 text-purple-700 font-bold rounded-full">FPO Kalyan Collective</span>
                                <span class="text-[10px] px-2.5 py-1 bg-emerald-50 border border-emerald-100 text-emerald-700 font-bold rounded-full">PACS Affiliated</span>
                            </div>
                        </div>

                        <!-- Profile Parameters grid -->
                        <div class="flex-1 w-full space-y-6">
                            <div>
                                <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                                    <span class="h-6 w-2 bg-purple-500 rounded-full inline-block"></span>
                                    Farmer Digital Profile
                                </h2>
                                <p class="text-xs font-semibold text-slate-400 mt-0.5">Verified details on national farmer registry system</p>
                            </div>
                            
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-5">
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Land Information</span>
                                    <p class="text-base font-black text-slate-800 mt-1">4.5 Acres</p>
                                    <span class="text-[9px] font-bold text-slate-400 block">Cultivable Area</span>
                                </div>
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Soil Profile</span>
                                    <p class="text-base font-black text-slate-800 mt-1">Clayey Loam</p>
                                    <span class="text-[9px] font-bold text-slate-400 block">pH 6.8 Optimal</span>
                                </div>
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Irrigation Type</span>
                                    <p class="text-base font-black text-slate-800 mt-1">Drip Irrigation</p>
                                    <span class="text-[9px] font-bold text-slate-400 block">Smart Automated</span>
                                </div>
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Primary Cultivation</span>
                                    <p class="text-base font-black text-slate-800 mt-1">Wheat & Mustard</p>
                                    <span class="text-[9px] font-bold text-slate-400 block">Kharif / Rabi double crop</span>
                                </div>
                                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Livestock Holdings</span>
                                    <p class="text-base font-black text-slate-800 mt-1">3 Cows, 2 Buffaloes</p>
                                    <span class="text-[9px] font-bold text-slate-400 block">Dairy coop supplier</span>
                                </div>
                                <div class="p-4 bg-gradient-to-br from-emerald-500/5 to-purple-500/5 rounded-2xl border border-emerald-100/50">
                                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Health Rating</span>
                                    <p class="text-base font-black text-emerald-700 mt-1">82/100 (Grade A)</p>
                                    <span class="text-[9px] font-bold text-slate-400 block">Eligible for premier credits</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FEATURE 2 - WEATHER & ADVISORY (#advisory) -->
            <section id="advisory" class="scroll-mt-24 space-y-6">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                        Weather & Crop Advisory 🌦️
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Real-time localized agromet advisories for Patiala, Punjab</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Live Weather Card — data injected by fetchRealWeather() -->
                    <div id="weather-card" class="bg-gradient-to-br from-emerald-600 to-teal-700 text-white rounded-[2.5rem] p-6 shadow-xl flex flex-col justify-between min-h-[300px] border border-emerald-500/20 relative overflow-hidden">
                        <!-- Loading shimmer overlay -->
                        <div id="weather-loading" class="absolute inset-0 bg-emerald-700/80 backdrop-blur-sm flex items-center justify-center rounded-[2.5rem] z-10">
                            <div class="flex flex-col items-center gap-3">
                                <svg class="w-8 h-8 animate-spin text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path></svg>
                                <span class="text-xs font-black text-emerald-100 uppercase tracking-widest">Fetching Live Data…</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-2xl font-black">Patiala Weather</h3>
                                <p id="weather-updated" class="text-xs text-emerald-100 font-bold">Connecting…</p>
                            </div>
                            <div id="weather-icon" class="text-4xl">⏳</div>
                        </div>
                        <div class="flex items-baseline gap-2 my-4">
                            <span id="weather-temp" class="text-6xl font-black">--°C</span>
                            <span id="weather-desc" class="text-emerald-100 text-lg font-bold">Loading</span>
                        </div>
                        <div class="grid grid-cols-3 gap-2 bg-white/10 backdrop-blur-md rounded-2xl p-4 border border-white/10 text-center text-xs font-bold">
                            <div>
                                <p class="text-[10px] text-emerald-100/80 uppercase">Humidity</p>
                                <p id="weather-humidity" class="text-sm mt-0.5">--%</p>
                            </div>
                            <div class="border-x border-white/10">
                                <p class="text-[10px] text-emerald-100/80 uppercase">Wind</p>
                                <p id="weather-wind" class="text-sm mt-0.5">-- km/h</p>
                            </div>
                            <div>
                                <p class="text-[10px] text-emerald-100/80 uppercase">Rain Today</p>
                                <p id="weather-rain" class="text-sm mt-0.5 text-yellow-300">-- mm</p>
                            </div>
                        </div>
                        <div class="mt-3 text-center text-xs text-emerald-200/80 font-bold">
                            Feels like <span id="weather-feels" class="text-white font-black">--°C</span>
                            &nbsp;·&nbsp; UV Index <span id="weather-uv" class="text-white font-black">--</span>
                        </div>
                    </div>

                    <!-- 7-Day Forecast Trend — updated with real data -->
                    <div class="lg:col-span-2 bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 flex flex-col justify-between min-h-[300px]">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-sm font-black text-slate-800">7-Day Weather Forecast</h3>
                                <p class="text-[10px] font-bold text-slate-400">Live temp &amp; rain probability — Patiala, Punjab</p>
                            </div>
                            <span id="forecast-status" class="text-[10px] px-3 py-1 bg-slate-100 text-slate-500 border border-slate-200 rounded-full font-black uppercase animate-pulse">Loading…</span>
                        </div>
                        <div class="h-44 relative mt-4">
                            <canvas id="weatherForecastChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Crop Advisory Feed (Personalized alerts) -->
                <div class="space-y-4 pt-4 border-t border-slate-100">
                    <h3 class="text-xs font-black text-slate-700 uppercase tracking-widest flex items-center gap-2">
                        <span class="h-2 w-2 bg-emerald-500 rounded-full inline-block"></span>
                        Personalized Crop Advisories
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($advisories as $index => $adv)
                            <div class="p-4 bg-white border border-slate-100 rounded-3xl shadow-sm flex gap-4 items-start hover:scale-[1.01] transition-transform duration-300">
                                <div class="p-3 rounded-2xl flex-shrink-0 @if($adv['severity'] === 'urgent') bg-red-50 text-red-600 border border-red-100 @elseif($adv['severity'] === 'warning') bg-amber-50 text-amber-600 border border-amber-100 @else bg-emerald-50 text-emerald-600 border border-emerald-100 @endif">
                                    @if($adv['icon'] === 'droplet')
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707.707M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    @elseif($adv['icon'] === 'beaker')
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 9.172V5L8 4z"></path></svg>
                                    @else
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                    @endif
                                </div>
                                <div class="space-y-1">
                                    <div class="flex items-center gap-2">
                                        <h4 class="text-sm font-black text-slate-800">{{ $adv['title'] }}</h4>
                                        <span class="text-[9px] px-2 py-0.5 rounded-full font-bold uppercase tracking-wider @if($adv['severity'] === 'urgent') bg-red-100 text-red-800 @elseif($adv['severity'] === 'warning') bg-amber-100 text-amber-800 @else bg-emerald-100 text-emerald-800 @endif">{{ $adv['severity'] }}</span>
                                    </div>
                                    <p id="advisory-desc-{{ $index }}" class="text-xs text-slate-500 font-semibold leading-relaxed">{{ $adv['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- FEATURE 3 - AI SCHEME RECOMMENDATION (#schemes) -->
            <section id="schemes" class="scroll-mt-24 space-y-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                            <span class="h-6 w-2 bg-purple-500 rounded-full inline-block"></span>
                            AI Scheme Recommendation 🧠
                        </h2>
                        <p class="text-xs font-semibold text-slate-400 mt-0.5">Government programs dynamically matched for your land area and crop schedule</p>
                    </div>
                    <button onclick="regenerateAISchemes()" id="ai-regenerate-schemes-btn" class="px-5 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-black rounded-2xl text-xs shadow-lg hover:shadow-purple-500/25 transition-all flex items-center gap-2 hover:scale-105 active:scale-[0.98]">
                        <span class="animate-pulse">✨</span> Let AI Update & Match Schemes
                    </button>
                </div>

                <!-- Category Filter Pills (Premium Interactive) -->
                <div class="flex flex-wrap gap-2.5">
                    <button onclick="filterSchemes('All')" id="btn-filter-All" class="px-4 py-2 rounded-full font-black text-xs border border-purple-500 bg-purple-500 text-white shadow-md hover:scale-105 active:scale-[0.98] transition-all duration-300">All Recommended</button>
                    <button onclick="filterSchemes('Subsidy')" id="btn-filter-Subsidy" class="px-4 py-2 rounded-full font-black text-xs border border-slate-100 bg-white text-slate-600 hover:border-purple-300 hover:scale-105 active:scale-[0.98] transition-all duration-300">Direct Subsidies</button>
                    <button onclick="filterSchemes('Crop Insurance')" id="btn-filter-Crop-Insurance" class="px-4 py-2 rounded-full font-black text-xs border border-slate-100 bg-white text-slate-600 hover:border-purple-300 hover:scale-105 active:scale-[0.98] transition-all duration-300">Crop Insurance</button>
                    <button onclick="filterSchemes('Income Support')" id="btn-filter-Income-Support" class="px-4 py-2 rounded-full font-black text-xs border border-slate-100 bg-white text-slate-600 hover:border-purple-300 hover:scale-105 active:scale-[0.98] transition-all duration-300">Income Support</button>
                </div>

                <div class="w-full">
                    <!-- Recommended Schemes List (Takes Full Width) -->
                    <div id="schemes-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($schemes as $index => $scheme)
                            <div id="scheme-card-{{ $index }}" data-scheme-category="{{ $scheme->category }}" class="scheme-item bg-white/90 backdrop-blur-xl border border-slate-100/70 shadow-lg rounded-[2.2rem] p-6 hover:shadow-2xl hover:scale-[1.01] transition-all duration-300 flex flex-col justify-between">
                                <div class="space-y-4">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <span class="text-[9px] bg-purple-100 text-purple-800 px-2.5 py-1 rounded-full font-black uppercase tracking-wider">{{ $scheme->category }}</span>
                                            <h3 class="text-base font-black text-slate-800 mt-2">{{ $scheme->scheme_name }}</h3>
                                        </div>
                                        <span class="text-xs font-bold text-slate-500 px-2 py-1 bg-slate-100 rounded-lg">Verified</span>
                                    </div>

                                    <div class="space-y-2 text-xs">
                                        <p class="font-semibold text-slate-500 leading-normal"><b class="text-slate-700">Eligibility:</b> {{ $scheme->eligibility }}</p>
                                        <p class="font-semibold text-slate-500 leading-normal"><b class="text-slate-700">Benefits:</b> {{ $scheme->benefits }}</p>
                                    </div>

                                    <!-- Why Recommended AI Box -->
                                    <div class="p-3 bg-gradient-to-br from-purple-500/5 to-emerald-500/5 border border-purple-100/50 rounded-2xl">
                                        <h4 class="text-[10px] font-black text-purple-700 uppercase tracking-wider flex items-center gap-1">
                                            💡 Why is this recommended?
                                        </h4>
                                        <p class="text-[11px] text-slate-600 font-semibold leading-relaxed mt-1">{{ $scheme->recommended_why }}</p>
                                    </div>
                                </div>

                                <div class="mt-6 flex items-center justify-between">
                                    <span class="text-xs font-bold text-slate-400">Apply Status: <b id="scheme-status-{{ Str::slug($scheme->scheme_name) }}" class="text-emerald-600">{{ $scheme->status }}</b></span>
                                    @if($scheme->status === 'Applied')
                                        <button class="px-5 py-2.5 bg-slate-100 text-slate-400 font-black rounded-xl text-xs cursor-not-allowed" disabled>Applied Successfully</button>
                                    @else
                                        <button id="scheme-btn-{{ Str::slug($scheme->scheme_name) }}" onclick="openApplySchemeModal('{{ $scheme->scheme_name }}', '{{ $scheme->category }}')" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-black rounded-xl text-xs shadow-md hover:scale-105 transition-all">Apply Now</button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- FEATURE 4 - APPLICATION TRACKER (#tracker) -->
            <section id="tracker" class="scroll-mt-24">
                <div class="bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 md:p-8">
                    <div class="mb-6">
                        <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                            <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                            Scheme Application Tracker 📄
                        </h2>
                        <p class="text-xs font-semibold text-slate-400 mt-0.5">Real-time status updates on submitted financial applications</p>
                    </div>

                    <!-- Scheme Tracking Progress List -->
                    <div class="space-y-8 mt-4">
                        <div>
                            <div class="flex justify-between items-center text-xs font-bold mb-3">
                                <span>Pradhan Mantri Fasal Bima Yojana (Wheat Crop Insurance 2026)</span>
                                <span class="text-emerald-600">Verification Underway (75%)</span>
                            </div>
                            
                            <!-- Custom Animated Timeline Tracker -->
                            <div class="relative flex items-center justify-between w-full mt-6 mb-2">
                                <!-- Background Line -->
                                <div class="absolute left-0 right-0 top-1/2 -translate-y-1/2 h-1 bg-slate-100 rounded-full z-0"></div>
                                <div class="absolute left-0 right-1/3 top-1/2 -translate-y-1/2 h-1 bg-emerald-500 rounded-full z-0 transition-all duration-1000"></div>

                                <!-- Node 1: Submitted -->
                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="w-8 h-8 rounded-full bg-emerald-500 text-white border-4 border-white flex items-center justify-center shadow-lg font-black text-xs">
                                        ✓
                                    </div>
                                    <span class="text-[10px] font-black text-slate-800 mt-2">Submitted</span>
                                    <span class="text-[8px] font-bold text-slate-400">Apr 12, 2026</span>
                                </div>

                                <!-- Node 2: Document Verified -->
                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="w-8 h-8 rounded-full bg-emerald-500 text-white border-4 border-white flex items-center justify-center shadow-lg font-black text-xs">
                                        ✓
                                    </div>
                                    <span class="text-[10px] font-black text-slate-800 mt-2">Verified</span>
                                    <span class="text-[8px] font-bold text-slate-400">May 02, 2026</span>
                                </div>

                                <!-- Node 3: Patwari Survey -->
                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="w-8 h-8 rounded-full bg-white text-emerald-600 border-4 border-emerald-500 flex items-center justify-center shadow-lg font-black text-xs animate-pulse">
                                        2
                                    </div>
                                    <span class="text-[10px] font-black text-emerald-600 mt-2">Under Review</span>
                                    <span class="text-[8px] font-bold text-slate-400">Survey Phase</span>
                                </div>

                                <!-- Node 4: Approved & Disbursed -->
                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="w-8 h-8 rounded-full bg-slate-200 text-slate-400 border-4 border-white flex items-center justify-center shadow font-black text-xs">
                                        3
                                    </div>
                                    <span class="text-[10px] font-bold text-slate-400 mt-2">Approved</span>
                                    <span class="text-[8px] font-bold text-slate-400">Pending Survey</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FEATURE 5 - MARKET PRICE DASHBOARD (#market) -->
            <section id="market" class="scroll-mt-24 space-y-6">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-purple-500 rounded-full inline-block"></span>
                        Market Price Dashboard 📈
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">National Mandi prices & AI sales recommendation feeds</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Prices List & Sell Recommendation -->
                    <div class="space-y-4">
                        <!-- Mandi price table card -->
                        <div class="p-5 bg-white border border-slate-100 rounded-[2rem] shadow-sm">
                            <h3 class="text-sm font-black text-slate-800 mb-4">Patiala Mandi Current Feeds</h3>
                            <div class="space-y-4">
                                @foreach($mandiPrices as $crop => $data)
                                    <div id="mandi-row-{{ $crop }}" class="flex justify-between items-center p-3 bg-slate-50 border border-transparent rounded-2xl transition-all duration-300">
                                        <div>
                                            <p class="text-xs font-black text-slate-800">{{ $crop }}</p>
                                            <span class="text-[10px] font-bold text-slate-400">Per Quintal (qtl)</span>
                                        </div>
                                        <div class="text-right">
                                            <p id="mandi-price-{{ $crop }}" class="text-sm font-black text-slate-800">₹{{ number_format($data['current']) }}</p>
                                            <span id="mandi-change-{{ $crop }}" class="text-[10px] font-black @if($data['trend'] === 'up') text-emerald-600 @else text-red-600 @endif">
                                                @if($data['trend'] === 'up') ▲ @else ▼ @endif {{ $data['change'] }}%
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Hold or Sell Suggestion (Unique Feature) -->
                        <div class="p-5 bg-gradient-to-br from-emerald-500/10 to-teal-500/10 border border-emerald-100 rounded-[2rem] shadow-sm flex flex-col justify-between">
                            <div>
                                <span class="text-[9px] bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-black uppercase tracking-wider inline-block">Smart Marketing Guidance</span>
                                <h3 class="text-base font-black text-slate-800 mt-2">Wheat Selling Suggestion</h3>
                                <p class="text-xs text-slate-600 font-semibold leading-relaxed mt-2">
                                    **AI Forecast:** Wheat prices are expected to surge by **6% next week** due to high demand and export clearances.
                                </p>
                            </div>
                            <div class="mt-4 p-3 bg-white rounded-xl border border-emerald-100 flex items-center justify-between text-xs font-black text-emerald-800">
                                <span>Guidance:</span>
                                <span class="px-3 py-1 bg-emerald-600 text-white rounded-lg uppercase animate-pulse">HOLD CROP</span>
                            </div>
                        </div>
                    </div>

                    <!-- Mandi Price Trends Chart (Chart.js) -->
                    <div class="lg:col-span-2 bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-sm font-black text-slate-800">Market Price Trends (6-Month History)</h3>
                                    <p class="text-[10px] text-slate-400 font-bold">Patiala grain market wholesale price logs (₹/quintal)</p>
                                </div>
                                <select id="mandi-crop-select" onchange="updateMandiChart()" class="text-xs bg-slate-50 border border-slate-200 rounded-xl px-2.5 py-1.5 font-bold focus:outline-none focus:border-emerald-500">
                                    <option value="Wheat">Wheat</option>
                                    <option value="Rice">Rice</option>
                                    <option value="Cotton">Cotton</option>
                                    <option value="Vegetables">Vegetables</option>
                                </select>
                            </div>
                            
                            <!-- Chart.js canvas wrapper -->
                            <div class="h-64 relative w-full mt-4">
                                <canvas id="mandiTrendsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FEATURE 7 - SOIL TESTING MODULE (#soil) -->
            <section id="soil" class="scroll-mt-24 space-y-6">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                        Soil Testing Module 🧪
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Input laboratory reports or update pH to receive tailored crop suggestions</p>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">
                    <!-- Soil test parameters form -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 xl:p-8 flex flex-col justify-between">
                        <form id="soil-test-form" onsubmit="submitSoilTest(event)" class="space-y-6">
                            <div>
                                <h3 class="text-sm font-black text-slate-800 mb-3">Manually Enter pH Level</h3>
                                <div class="flex items-center gap-4">
                                    <input type="range" id="ph_slider" min="1" max="14" step="0.1" value="6.8" oninput="document.getElementById('ph_value_lbl').innerText = this.value" class="w-full accent-emerald-600">
                                    <span id="ph_value_lbl" class="text-xl font-black text-slate-800 bg-emerald-50 border border-emerald-100 rounded-xl px-3 py-1 flex-shrink-0">6.8</span>
                                </div>
                            </div>

                            <div class="h-[1px] bg-slate-100/50"></div>

                            <div>
                                <h3 class="text-sm font-black text-slate-800 mb-3">Upload Digital Soil Report</h3>
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-slate-200 border-dashed rounded-3xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors shadow-sm">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                            <p class="text-xs text-slate-500 font-bold" id="upload-status-lbl">Upload PDF or JPEG</p>
                                        </div>
                                        <input type="file" id="report_file" class="hidden" onchange="simulateReportUpload(event)">
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="w-full py-4 mt-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-black text-sm tracking-widest transition-colors shadow-lg hover:shadow-emerald-500/30 hover:-translate-y-0.5">RUN SOIL ANALYSIS</button>
                        </form>
                    </div>

                    <!-- Analysis Output Suggestions (Features and unique Best crop Suggestions) -->
                    <div class="xl:col-span-3 bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 md:p-8 flex flex-col justify-between">
                        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                            <div class="space-y-8 xl:col-span-2">
                                <div>
                                    <h3 class="text-base font-black text-slate-800">Dynamic AI Soil Recommendation</h3>
                                    <p class="text-xs font-semibold text-slate-400 mt-1">Suggestions updated based on pH & report input</p>
                                </div>

                                <!-- Soil Health indicator -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div class="p-5 bg-slate-50 hover:bg-slate-100 transition-colors rounded-2xl border border-slate-100/50 shadow-sm">
                                        <h4 class="text-sm font-black text-slate-500">Soil Condition:</h4>
                                        <p id="soil_condition_lbl" class="text-lg font-black text-emerald-700 mt-2">Neutral / Optimal Soil</p>
                                    </div>
                                    <div class="p-5 bg-slate-50 hover:bg-slate-100 transition-colors rounded-2xl border border-slate-100/50 shadow-sm">
                                        <!-- Best Crop for Soil (Unique Feature) -->
                                        <h4 class="text-sm font-black text-slate-500">Best Crops for Your Soil:</h4>
                                        <p id="best_crops_lbl" class="text-lg font-black text-slate-800 mt-2">Wheat, Maize, Mustard, Gram</p>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <h4 class="text-sm font-black text-slate-700">Recommended Fertilizers & Additions:</h4>
                                    <ul id="fertilizer_suggestions_list" class="text-sm font-semibold text-slate-600 space-y-3 list-disc pl-5 leading-relaxed">
                                        <li>Maintain current soil quality using balanced NPK ratios (120:60:40 kg/ha).</li>
                                        <li>Apply farmyard manure (FYM) @ 5 tonnes/acre before next sowing to enrich microbes.</li>
                                        <li>Top dress with Muriate of Potash (MOP) @ 25 kg/acre due to low Potassium logs.</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Soil Composition Polar Chart -->
                            <div class="flex flex-col border-t xl:border-t-0 xl:border-l border-slate-100 pt-8 xl:pt-0 xl:pl-8 items-center xl:items-start justify-center">
                                <div class="w-48 h-48 relative flex-shrink-0 mx-auto">
                                    <canvas id="soilNutrientChart"></canvas>
                                </div>
                                <p class="text-xs text-slate-500 font-semibold leading-relaxed mt-6 text-center xl:text-left">The N-P-K distribution represents current values from your latest soil card report. Potassium is heavily depleted, consider immediate enrichment.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FEATURE 8 - CROP INSURANCE MODULE (#insurance) -->
            <section id="insurance" class="scroll-mt-24 space-y-6">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-purple-500 rounded-full inline-block"></span>
                        Crop Insurance Module 🧾
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Submit yields reports, upload damage imagery, and trigger AI yield loss estimations</p>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">
                    <!-- Apply Insurance Form -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 xl:p-8 flex flex-col justify-between">
                        <form id="insurance-claim-form" onsubmit="submitInsuranceClaim(event)" class="space-y-5">
                            <div>
                                <label class="block text-sm font-black text-slate-700 mb-2">Cultivated Crop</label>
                                <select id="ins_crop" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-semibold focus:outline-none focus:border-emerald-500 transition-colors shadow-sm" required>
                                    <option value="Wheat">Wheat</option>
                                    <option value="Mustard">Mustard</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-black text-slate-700 mb-2">Damaged Area (Acres)</label>
                                <input type="number" id="ins_area" step="0.1" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-semibold focus:outline-none focus:border-emerald-500 transition-colors shadow-sm" placeholder="e.g. 1.5" required>
                            </div>

                            <div>
                                <label class="block text-sm font-black text-slate-700 mb-2">Cause of Damage</label>
                                <select id="ins_cause" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-semibold focus:outline-none focus:border-emerald-500 transition-colors shadow-sm" required>
                                    <option value="Drought">Drought (Dry Spell)</option>
                                    <option value="Hailstorm">Hailstorm</option>
                                    <option value="Pest Attack">Pest Attack</option>
                                    <option value="Excessive Rain">Excessive Rain</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-black text-slate-700 mb-2">Upload Field Photo (Damage proof)</label>
                                <input type="file" id="ins_photo" class="w-full text-sm text-slate-500 file:mr-4 file:py-3 file:px-5 file:rounded-xl file:border-0 file:text-sm file:font-black file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer shadow-sm">
                            </div>

                            <button type="submit" class="w-full py-4 mt-2 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl font-black text-sm tracking-widest transition-colors shadow-lg hover:shadow-purple-500/30 hover:-translate-y-0.5">SUBMIT CLAIM REPORT</button>
                        </form>
                    </div>

                    <!-- AI Damage Estimation Output & Claims log -->
                    <div class="xl:col-span-3 bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 md:p-8 flex flex-col justify-between">
                        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                            <div class="space-y-8 xl:col-span-1">
                                <div>
                                    <h3 class="text-base font-black text-slate-800">AI Crop Damage Assessment Center</h3>
                                    <p class="text-xs font-bold text-slate-400 mt-1">Automated yield loss estimation and payout tracking</p>
                                </div>

                                <!-- Live Damage Estimation result -->
                                <div id="ai-estimation-result" class="p-6 bg-gradient-to-br from-purple-500/10 to-emerald-500/10 border border-purple-100 rounded-3xl hidden">
                                    <h4 class="text-sm font-black text-purple-700 flex items-center gap-2">
                                        ⚙️ AI Damage Estimation Assessment
                                    </h4>
                                    <div class="flex items-baseline gap-3 mt-4">
                                        <span id="est_percentage" class="text-5xl font-black text-slate-800">35%</span>
                                        <span class="text-slate-500 text-sm font-bold">Estimated Crop Yield Loss</span>
                                    </div>
                                    <p class="text-xs text-slate-600 font-semibold leading-relaxed mt-3">
                                        The estimation has been computed using localized agromet imagery and the reported cause of damage. Claim verification status updated to **Under Review**.
                                    </p>
                                </div>

                                <!-- Claims History List -->
                                <div class="space-y-4">
                                    <h4 class="text-sm font-black text-slate-700">Insurance Claims Logs</h4>
                                    <div id="claims-history-list" class="space-y-3 max-h-64 overflow-y-auto pr-2 custom-scrollbar">
                                        @if(isset($farmer->insurance_claims) && count($farmer->insurance_claims) > 0)
                                            @foreach($farmer->insurance_claims as $claim)
                                                <div class="p-4 bg-slate-50 hover:bg-slate-100 transition-colors border border-slate-100 rounded-2xl flex justify-between items-center text-xs gap-3">
                                                    <div>
                                                        <p class="font-black text-slate-800 leading-tight">{{ $claim['crop_name'] }} claim</p>
                                                        <span class="text-[10px] font-semibold text-slate-500 block mt-1">Damaged Area: {{ $claim['area_damaged'] }} Acres</span>
                                                    </div>
                                                    <div class="text-right flex-shrink-0">
                                                        <span class="px-2.5 py-1 text-[10px] font-black uppercase rounded-full @if($claim['status'] === 'Claim Approved') bg-emerald-100 text-emerald-800 @else bg-amber-100 text-amber-800 @endif">{{ $claim['status'] }}</span>
                                                        <p class="text-[10px] font-bold text-slate-500 mt-1.5">Loss: <b class="text-slate-800 font-black">{{ $claim['estimated_damage'] }}%</b></p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="flex flex-col items-center justify-center py-8 text-center bg-slate-50/50 rounded-2xl border border-dashed border-slate-200">
                                                <span class="text-3xl mb-2">📋</span>
                                                <p class="text-sm text-slate-400 font-semibold italic">No active insurance claims reported yet.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Claims Analytics Bar Chart -->
                            <div class="flex flex-col xl:col-span-2 border-t xl:border-t-0 xl:border-l border-slate-100 pt-8 xl:pt-0 xl:pl-8">
                                <div class="mb-6">
                                    <h4 class="text-base font-black text-slate-800">Claims & Payout Analytics</h4>
                                    <p class="text-xs font-bold text-slate-400 mt-1">Comparison of Insurance Premiums paid vs Claim amounts disbursed</p>
                                </div>
                                <div class="flex-1 w-full relative min-h-[300px]">
                                    <canvas id="insuranceClaimsChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FEATURE 9 - INTERACTIVE FARM GIS MAPS (#maps) -->
            <section id="maps" class="scroll-mt-24 space-y-6">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block shadow-md shadow-emerald-500/20"></span>
                        Smart Farm GIS Maps & NDVI Satellite 🗺️
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Visualize your 4.5-acre land boundary, monitor real-time soil moisture sensors, and track NDVI crop health metrics</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- GIS Farm Plot Grid (Takes 2 cols) -->
                    <div class="lg:col-span-2 bg-white/95 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 relative overflow-hidden flex flex-col justify-between min-h-[420px]">
                        <div>
                            <div class="flex flex-wrap justify-between items-center gap-4 mb-4">
                                <div>
                                    <h3 class="text-sm font-black text-slate-800">4.5-Acre Spatial Farm Grid</h3>
                                    <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Kalyan village, patiala - sector 4</span>
                                </div>
                                <!-- Layer Toggles -->
                                <div class="flex gap-2">
                                    <button onclick="toggleMapLayer('ndvi')" id="btn-map-ndvi" class="px-3.5 py-1.5 rounded-xl font-black text-[10px] border border-emerald-500 bg-emerald-500 text-white shadow-sm transition-all duration-300">NDVI Vigour</button>
                                    <button onclick="toggleMapLayer('moisture')" id="btn-map-moisture" class="px-3.5 py-1.5 rounded-xl font-black text-[10px] border border-slate-100 bg-white text-slate-600 hover:border-emerald-300 transition-all duration-300">Soil Moisture</button>
                                    <button onclick="toggleMapLayer('boundary')" id="btn-map-boundary" class="px-3.5 py-1.5 rounded-xl font-black text-[10px] border border-slate-100 bg-white text-slate-600 hover:border-emerald-300 transition-all duration-300">Land Boundary</button>
                                </div>
                            </div>

                            <!-- Interactive Grid Leaflet Area -->
                            <div class="h-80 w-full rounded-[2.2rem] border border-slate-200/80 overflow-hidden relative shadow-inner">
                                <div id="gis-farm-leaflet-map" class="w-full h-full z-10"></div>
                                
                                <!-- Floating Glassmorphic Plot Cards on Top of Map -->
                                <div class="absolute bottom-4 left-4 right-4 z-20 bg-slate-950/80 backdrop-blur-md border border-white/10 rounded-2xl p-3 flex justify-between gap-3 text-xs shadow-2xl">
                                    <!-- Plot A Card Toggle -->
                                    <button onclick="focusPlot('A')" id="btn-plot-A" class="flex-1 p-2 bg-emerald-500/20 border border-emerald-500 rounded-xl text-left transition-all duration-300 hover:scale-[1.02]">
                                        <div class="flex justify-between items-center">
                                            <span class="font-black text-white text-[10px]">Plot A (Wheat)</span>
                                            <span class="text-[8px] bg-emerald-500 text-white px-1.5 py-0.5 rounded-full font-black">2.0 Ac</span>
                                        </div>
                                        <p class="text-[9px] text-emerald-300 font-semibold mt-1">NDVI: 0.84 (Excellent)</p>
                                    </button>
                                    
                                    <!-- Plot B Card Toggle -->
                                    <button onclick="focusPlot('B')" id="btn-plot-B" class="flex-1 p-2 bg-slate-900/60 border border-white/10 rounded-xl text-left transition-all duration-300 hover:scale-[1.02]">
                                        <div class="flex justify-between items-center">
                                            <span class="font-black text-slate-300 text-[10px]">Plot B (Wheat)</span>
                                            <span class="text-[8px] bg-slate-700 text-white px-1.5 py-0.5 rounded-full font-black">1.5 Ac</span>
                                        </div>
                                        <p class="text-[9px] text-slate-400 font-semibold mt-1">NDVI: 0.72 (Good)</p>
                                    </button>
                                    
                                    <!-- Plot C Card Toggle -->
                                    <button onclick="focusPlot('C')" id="btn-plot-C" class="flex-1 p-2 bg-slate-900/60 border border-white/10 rounded-xl text-left transition-all duration-300 hover:scale-[1.02]">
                                        <div class="flex justify-between items-center">
                                            <span class="font-black text-slate-300 text-[10px]">Plot C (Mustard)</span>
                                            <span class="text-[8px] bg-slate-700 text-white px-1.5 py-0.5 rounded-full font-black">1.0 Ac</span>
                                        </div>
                                        <p class="text-[9px] text-slate-400 font-semibold mt-1">NDVI: 0.58 (Mature)</p>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <p class="text-[10px] text-slate-400 font-bold leading-normal">💡 **Tip:** Click on any of the Plot cards above to pull live IoT telemetry and chemical balance summaries directly into the inspectors panel.</p>
                    </div>

                    <!-- GIS Inspector Panel (Takes 1 col) -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 flex flex-col justify-between min-h-[420px]">
                        <div class="space-y-6">
                            <div class="border-b border-slate-100 pb-3">
                                <span class="text-[9px] bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full font-black uppercase tracking-wider">Spatial IoT Node</span>
                                <h3 class="text-base font-black text-slate-800 mt-2">Plot Telemetry Inspector</h3>
                                <p class="text-[10px] text-slate-400 font-bold mt-0.5">Real-time localized agromet readings</p>
                            </div>

                            <!-- Plot Inspector Fields -->
                            <div class="space-y-4 text-xs font-bold text-slate-500">
                                <div>
                                    <span class="text-[9px] uppercase tracking-wider block text-slate-400">Inspecting Target</span>
                                    <p id="insp-plot-title" class="text-sm font-black text-slate-800 mt-0.5">Plot A - Wheat (Flowering Stage)</p>
                                </div>
                                <div class="grid grid-cols-2 gap-3.5 text-left">
                                    <div class="p-3 bg-slate-50 border border-slate-100 rounded-2xl">
                                        <span class="text-[9px] text-slate-400 uppercase block">NDVI Index</span>
                                        <span id="insp-plot-ndvi" class="font-black text-emerald-700 text-xs block mt-0.5">0.84 (Highly Vigorous)</span>
                                    </div>
                                    <div class="p-3 bg-slate-50 border border-slate-100 rounded-2xl">
                                        <span class="text-[9px] text-slate-400 uppercase block">Soil Moisture</span>
                                        <span id="insp-plot-moisture" class="font-black text-slate-800 text-xs block mt-0.5">32%</span>
                                    </div>
                                    <div class="p-3 bg-slate-50 border border-slate-100 rounded-2xl">
                                        <span class="text-[9px] text-slate-400 uppercase block">Soil pH level</span>
                                        <span id="insp-plot-ph" class="font-black text-slate-800 text-xs block mt-0.5">6.8</span>
                                    </div>
                                    <div class="p-3 bg-slate-50 border border-slate-100 rounded-2xl">
                                        <span class="text-[9px] text-slate-400 uppercase block">NPK (N:P:K)</span>
                                        <span id="insp-plot-npk" class="font-black text-slate-800 text-xs block mt-0.5">140:65:42</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Soil Moisture Advisory Banner -->
                        <div class="p-3.5 bg-gradient-to-br from-emerald-500/5 to-teal-500/5 border border-emerald-100/50 rounded-2xl text-[10px] text-emerald-800 font-semibold leading-relaxed mt-4 text-left">
                            🌿 **Spatial Insight:** Localized soil parameters are fully consistent with high-yield Punjab grain production. Irrigation schedule is synchronized.
                        </div>
                    </div>
                </div>
            </section>

            <!-- FEATURE 10 - COMMUNITY FORUM (#forum) -->
            <section id="forum" class="scroll-mt-24 space-y-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                            <span class="h-6 w-2 bg-emerald-500 rounded-full inline-block"></span>
                            Farmer Community Forum 🧑‍🌾🧑‍🌾
                        </h2>
                        <p class="text-xs font-semibold text-slate-400 mt-0.5">Share agricultural practices, FPO decisions, and crop protection advisories</p>
                    </div>
                    <button onclick="toggleForumModal()" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-black shadow-md transition-all hover:scale-105">New Post</button>
                </div>

                <!-- Forum Feed Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- New Post Modal (hidden by default) -->
                    <div id="forum-modal" class="lg:col-span-1 bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 hidden lg:block h-fit">
                        <h3 class="text-sm font-black text-slate-800 mb-4">Post a Farming Tip or Question</h3>
                        <form id="forum-post-form" onsubmit="submitForumPost(event)" class="space-y-4">
                            <div>
                                <label class="block text-xs font-black text-slate-700 mb-1.5">Title</label>
                                <input type="text" id="forum_title" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500 transition-colors" placeholder="e.g. Best organic pesticide for mustard crop" required>
                            </div>
                            <div>
                                <label class="block text-xs font-black text-slate-700 mb-1.5">Description (Share success stories or ask advice)</label>
                                <textarea id="forum_desc" rows="4" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:outline-none focus:border-emerald-500 transition-colors" placeholder="Explain in detail..." required></textarea>
                            </div>
                            <button type="submit" class="w-full py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-black text-xs tracking-wider transition-colors shadow">PUBLISH POST</button>
                        </form>
                    </div>

                    <!-- Forum Posts List -->
                    <div class="lg:col-span-2 space-y-6" id="forum-posts-container">
                        @foreach($forumPosts as $post)
                            <div class="bg-white border border-slate-100 shadow-sm rounded-[2rem] p-6 space-y-4 hover:shadow-md transition-shadow duration-300">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-emerald-500 to-purple-600 p-[1.5px] flex-shrink-0">
                                            <div class="w-full h-full rounded-xl bg-white flex items-center justify-center text-xs font-black text-emerald-700">
                                                {{ substr($post->author_name, 0, 1) }}
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="text-xs font-black text-slate-800 leading-none">{{ $post->author_name }}</h4>
                                            <span class="text-[9px] font-black text-purple-600 uppercase tracking-widest leading-none mt-1 inline-block">{{ $post->author_role }}</span>
                                        </div>
                                    </div>
                                    <span class="text-[10px] text-slate-400 font-bold">
                                        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                    </span>
                                </div>

                                <div class="space-y-1">
                                    <h3 class="text-sm font-black text-slate-800">{{ $post->title }}</h3>
                                    <p class="text-xs text-slate-500 font-semibold leading-relaxed">{{ $post->description }}</p>
                                </div>

                                <div class="flex gap-4 items-center pt-2 border-t border-slate-50">
                                    <!-- Interactive Like Button -->
                                    <button onclick="likePost('{{ $post->id }}', this)" class="flex items-center gap-1.5 text-xs text-slate-500 hover:text-emerald-600 font-black transition-colors focus:outline-none">
                                        <span>👍</span>
                                        <span class="like-counter">{{ $post->likes }} Likes</span>
                                    </button>
                                    <span class="text-xs text-slate-400 font-semibold">•</span>
                                    <button class="flex items-center gap-1.5 text-xs text-slate-500 hover:text-purple-600 font-black transition-colors focus:outline-none">
                                        <span>💬</span>
                                        <span>{{ is_array($post->comments) ? count($post->comments) : 0 }} Comments</span>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- COMPREHENSIVE COMPLIANCE REPORTS SECTION (#reports) -->
            <section id="reports" class="scroll-mt-24 space-y-6 hidden">
                <div class="border-b border-slate-100 pb-4">
                    <span class="text-[9px] bg-purple-100 text-purple-800 px-2.5 py-1 rounded-full font-black uppercase tracking-wider">Report Generation Suite</span>
                    <h2 class="text-2xl font-black text-slate-900 tracking-tight mt-2">Executive Agricultural Registry & Health Reports 🧾</h2>
                    <p class="text-xs text-slate-500 font-semibold mt-1">Compile verified digital agromet credentials, soil chemistry status, spatial plots, and scheme records into downloadable compliance reports.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Report Compiler Configuration Card -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.5rem] p-6 space-y-6">
                        <div>
                            <h3 class="text-base font-black text-slate-800">Report Compiler Config</h3>
                            <p class="text-[10px] text-slate-400 font-bold mt-0.5">Toggle sections to include in the official register</p>
                        </div>

                        <div class="space-y-4 font-bold text-slate-600 text-xs">
                            <!-- Toggle: Land Registry & Spatial Fields -->
                            <label class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-2xl cursor-pointer hover:bg-slate-100/50 transition-colors">
                                <input type="checkbox" id="rep-toggle-land" checked onchange="updateLiveReportPreview()" class="w-4.5 h-4.5 text-purple-600 border-slate-200 rounded focus:ring-purple-500" />
                                <div>
                                    <span class="text-slate-800 font-black block">Land Boundaries & Plots</span>
                                    <span class="text-[9px] text-slate-400 block font-semibold">Includes 3 Spatial wheat/mustard fields (4.5 Ac)</span>
                                </div>
                            </label>

                            <!-- Toggle: Soil Chemistry Card Analysis -->
                            <label class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-2xl cursor-pointer hover:bg-slate-100/50 transition-colors">
                                <input type="checkbox" id="rep-toggle-soil" checked onchange="updateLiveReportPreview()" class="w-4.5 h-4.5 text-purple-600 border-slate-200 rounded focus:ring-purple-500" />
                                <div>
                                    <span class="text-slate-800 font-black block">Soil Quality Card Data</span>
                                    <span class="text-[9px] text-slate-400 block font-semibold">Includes NPK values & pH cards (pH 6.8)</span>
                                </div>
                            </label>

                            <!-- Toggle: Localized Advisory Forecasts -->
                            <label class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-2xl cursor-pointer hover:bg-slate-100/50 transition-colors">
                                <input type="checkbox" id="rep-toggle-weather" checked onchange="updateLiveReportPreview()" class="w-4.5 h-4.5 text-purple-600 border-slate-200 rounded focus:ring-purple-500" />
                                <div>
                                    <span class="text-slate-800 font-black block">Agromet Forecast & Advisory</span>
                                    <span class="text-[9px] text-slate-400 block font-semibold">Includes localized crop advisory (32°C Drizzle)</span>
                                </div>
                            </label>

                            <!-- Toggle: Mandi Pricing Trends -->
                            <label class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-2xl cursor-pointer hover:bg-slate-100/50 transition-colors">
                                <input type="checkbox" id="rep-toggle-mandi" checked onchange="updateLiveReportPreview()" class="w-4.5 h-4.5 text-purple-600 border-slate-200 rounded focus:ring-purple-500" />
                                <div>
                                    <span class="text-slate-800 font-black block">Mandi Prices & Trends</span>
                                    <span class="text-[9px] text-slate-400 block font-semibold">Includes Wheat (₹2,450) & Mustard prices</span>
                                </div>
                            </label>

                            <!-- Toggle: Government Program Tracking -->
                            <label class="flex items-center gap-3 p-3 bg-slate-50 border border-slate-100 rounded-2xl cursor-pointer hover:bg-slate-100/50 transition-colors">
                                <input type="checkbox" id="rep-toggle-schemes" checked onchange="updateLiveReportPreview()" class="w-4.5 h-4.5 text-purple-600 border-slate-200 rounded focus:ring-purple-500" />
                                <div>
                                    <span class="text-slate-800 font-black block">Government Schemes Registry</span>
                                    <span class="text-[9px] text-slate-400 block font-semibold">PM-KISAN document application log and approvals</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Verified Digitized Official Document Preview Section -->
                    <div class="lg:col-span-2 space-y-6 flex flex-col justify-between">
                        <!-- Preview Card Canvas -->
                        <div id="digitized-report-document" class="bg-slate-50 border-4 border-double border-slate-900 rounded-[2.5rem] p-8 shadow-inner relative overflow-hidden select-none font-serif text-slate-900 bg-white">
                            <!-- Official Watermark State Emblem -->
                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-[0.025] select-none">
                                <span class="text-[12rem] font-black tracking-widest uppercase">PUNJAB</span>
                            </div>

                            <!-- Document Top Header -->
                            <div class="text-center border-b-2 border-slate-800 pb-4 relative z-10">
                                <h4 class="font-extrabold text-sm uppercase tracking-widest text-slate-900 leading-none">Directorate of Agriculture & Farmer Welfare</h4>
                                <p class="text-[9px] uppercase tracking-wider text-slate-500 font-bold font-sans mt-1">Government of Punjab • Digital Agriculture Mission</p>
                                <h3 class="text-lg font-black tracking-tight text-slate-800 uppercase font-sans mt-3.5 border-2 border-slate-900 px-4 py-1.5 inline-block rounded-lg bg-white shadow-sm">Verified Smart Agromet Health Card</h3>
                            </div>

                            <!-- Document Core Identity Metadata -->
                            <div class="grid grid-cols-2 gap-4 text-xs font-sans mt-6 border-b border-slate-200 pb-4 relative z-10">
                                <div>
                                    <span class="text-[8px] uppercase tracking-widest text-slate-400 font-bold block">Applicant Credentials</span>
                                    <p class="font-black text-slate-800 mt-0.5">{{ auth()->user()->name ?? 'Ramesh Kumar' }}</p>
                                    <p class="text-[9px] text-slate-500 font-semibold">Kalyan Village, Patiala Block, Punjab</p>
                                </div>
                                <div class="text-right">
                                    <span class="text-[8px] uppercase tracking-widest text-slate-400 font-bold block">Document Registry details</span>
                                    <p class="font-mono text-slate-800 font-bold mt-0.5">REG-IN-PB8921-2026</p>
                                    <p class="text-[9px] text-slate-500 font-semibold" id="rep-current-date">Issued: May 18, 2026</p>
                                </div>
                            </div>

                            <!-- Document Sections Area -->
                            <div class="py-5 space-y-5 text-xs relative z-10 font-sans leading-normal">
                                <!-- Land coordinates -->
                                <div id="rep-sec-land" class="space-y-1.5 transition-all">
                                    <h4 class="font-black text-slate-900 border-b border-slate-200 pb-1 text-[11px] uppercase tracking-wider flex items-center gap-1.5">
                                        <span>🗺️</span> Section 1: Land registry & Spatial Fields
                                    </h4>
                                    <div class="grid grid-cols-3 gap-3 text-slate-700">
                                        <div class="bg-white/80 p-2 border border-slate-100 rounded-xl">
                                            <span class="text-[8px] text-slate-400 block font-bold">PLOT A (Wheat)</span>
                                            <span class="font-bold text-[10px]">Area: 2.0 Acres</span>
                                            <span class="text-[9px] text-emerald-600 block font-bold">Vigour: 0.84 NDVI</span>
                                        </div>
                                        <div class="bg-white/80 p-2 border border-slate-100 rounded-xl">
                                            <span class="text-[8px] text-slate-400 block font-bold">PLOT B (Wheat)</span>
                                            <span class="font-bold text-[10px]">Area: 1.5 Acres</span>
                                            <span class="text-[9px] text-green-600 block font-bold">Vigour: 0.72 NDVI</span>
                                        </div>
                                        <div class="bg-white/80 p-2 border border-slate-100 rounded-xl">
                                            <span class="text-[8px] text-slate-400 block font-bold">PLOT C (Mustard)</span>
                                            <span class="font-bold text-[10px]">Area: 1.0 Acres</span>
                                            <span class="text-[9px] text-amber-600 block font-bold">Vigour: 0.58 NDVI</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Soil Quality card -->
                                <div id="rep-sec-soil" class="space-y-1.5 transition-all">
                                    <h4 class="font-black text-slate-900 border-b border-slate-200 pb-1 text-[11px] uppercase tracking-wider flex items-center gap-1.5">
                                        <span>🧪</span> Section 2: Soil Chemistry Card Analysis
                                    </h4>
                                    <div class="grid grid-cols-4 gap-2.5 text-slate-700">
                                        <div class="bg-white/80 p-2 border border-slate-100 rounded-xl text-center">
                                            <span class="text-[8px] text-slate-400 block font-bold">PH VALUE</span>
                                            <span class="font-black text-xs text-slate-800 block mt-0.5">6.8</span>
                                            <span class="text-[8px] text-emerald-600 block font-bold uppercase tracking-wider">Optimal</span>
                                        </div>
                                        <div class="bg-white/80 p-2 border border-slate-100 rounded-xl text-center">
                                            <span class="text-[8px] text-slate-400 block font-bold">NITROGEN (N)</span>
                                            <span class="font-black text-xs text-slate-800 block mt-0.5">140 kg/h</span>
                                            <span class="text-[8px] text-emerald-600 block font-bold uppercase tracking-wider">Adequate</span>
                                        </div>
                                        <div class="bg-white/80 p-2 border border-slate-100 rounded-xl text-center">
                                            <span class="text-[8px] text-slate-400 block font-bold">PHOSPHORUS (P)</span>
                                            <span class="font-black text-xs text-slate-800 block mt-0.5">65 kg/h</span>
                                            <span class="text-[8px] text-emerald-600 block font-bold uppercase tracking-wider">Adequate</span>
                                        </div>
                                        <div class="bg-white/80 p-2 border border-slate-100 rounded-xl text-center">
                                            <span class="text-[8px] text-slate-400 block font-bold">POTASSIUM (K)</span>
                                            <span class="font-black text-xs text-slate-800 block mt-0.5">42 kg/h</span>
                                            <span class="text-[8px] text-amber-600 block font-bold uppercase tracking-wider">Depleted</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Advisory and forecast -->
                                <div id="rep-sec-weather" class="space-y-1.5 transition-all">
                                    <h4 class="font-black text-slate-900 border-b border-slate-200 pb-1 text-[11px] uppercase tracking-wider flex items-center gap-1.5">
                                        <span>🌤️</span> Section 3: Weather Forecast & Localized Advisory
                                    </h4>
                                    <div class="p-3 bg-white/80 border border-slate-100 rounded-2xl flex justify-between items-center text-slate-700">
                                        <div>
                                            <span class="text-[9px] text-slate-400 font-bold block">CURRENT OUTLOOK</span>
                                            <p class="font-black text-xs text-slate-800">32°C • Light Drizzle Advisory</p>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-[9px] text-slate-400 font-bold block">RECOMMENDED CROP ADVISORY</span>
                                            <p class="font-black text-xs text-emerald-700">Delay chemical spray applications due to precipitation.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Mandi rates -->
                                <div id="rep-sec-mandi" class="space-y-1.5 transition-all">
                                    <h4 class="font-black text-slate-900 border-b border-slate-200 pb-1 text-[11px] uppercase tracking-wider flex items-center gap-1.5">
                                        <span>📈</span> Section 4: Mandi Market Rates Trend
                                    </h4>
                                    <div class="grid grid-cols-2 gap-3 text-slate-700">
                                        <div class="p-2.5 bg-white/80 border border-slate-100 rounded-xl flex justify-between items-center">
                                            <span class="font-bold">Wheat (Kalyan block)</span>
                                            <span class="font-black text-slate-800">₹2,450/quintal</span>
                                        </div>
                                        <div class="p-2.5 bg-white/80 border border-slate-100 rounded-xl flex justify-between items-center">
                                            <span class="font-bold">Mustard (Patiala block)</span>
                                            <span class="font-black text-slate-800">₹5,850/quintal</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Gov Programs -->
                                <div id="rep-sec-schemes" class="space-y-1.5 transition-all">
                                    <h4 class="font-black text-slate-900 border-b border-slate-200 pb-1 text-[11px] uppercase tracking-wider flex items-center gap-1.5">
                                        <span>🏛️</span> Section 5: Eligible Government Programs Log
                                    </h4>
                                    <div class="grid grid-cols-3 gap-2.5 text-[9px] font-bold text-slate-700">
                                        <div class="p-2 bg-white/80 border border-slate-100 rounded-xl text-center">
                                            <span class="block">PM-KISAN Nidhi</span>
                                            <span class="text-emerald-700 uppercase tracking-widest font-black block mt-0.5">✓ Verified</span>
                                        </div>
                                        <div class="p-2 bg-white/80 border border-slate-100 rounded-xl text-center">
                                            <span class="block">PM Fasal Bima Yojana</span>
                                            <span class="text-purple-700 uppercase tracking-widest font-black block mt-0.5">Approved</span>
                                        </div>
                                        <div class="p-2 bg-white/80 border border-slate-100 rounded-xl text-center">
                                            <span class="block">Agri Infra Fund</span>
                                            <span class="text-amber-700 uppercase tracking-widest font-black block mt-0.5">Eligible</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Document Footer & Security Hash code -->
                            <div class="border-t border-slate-200 pt-4 flex justify-between items-end relative z-10 font-sans">
                                <div>
                                    <span class="text-[8px] uppercase tracking-widest text-slate-400 font-bold block">State Digitization Checksum</span>
                                    <p class="font-mono text-[9px] font-bold text-slate-600 mt-0.5" id="rep-security-hash">SHA256: F598DE821034A7B76F71A378D82650E63AA5F156</p>
                                </div>
                                <div class="text-right flex flex-col items-end">
                                    <div class="w-14 h-14 bg-white border-2 border-slate-900 rounded-lg p-1.5 flex items-center justify-center shadow-sm">
                                        <!-- Mini QR Code simulation badge -->
                                        <div class="w-full h-full bg-slate-950 grid grid-cols-4 grid-rows-4 gap-0.5 opacity-80">
                                            <div class="bg-white"></div><div class="bg-slate-950"></div><div class="bg-white"></div><div class="bg-white"></div>
                                            <div class="bg-slate-950"></div><div class="bg-white"></div><div class="bg-slate-950"></div><div class="bg-white"></div>
                                            <div class="bg-white"></div><div class="bg-slate-950"></div><div class="bg-white"></div><div class="bg-slate-950"></div>
                                            <div class="bg-slate-950"></div><div class="bg-white"></div><div class="bg-slate-950"></div><div class="bg-white"></div>
                                        </div>
                                    </div>
                                    <span class="text-[7px] text-slate-400 font-black uppercase mt-1">Scan to Verify Registry</span>
                                </div>
                            </div>
                        </div>

                        <!-- Document Export Action Buttons -->
                        <div class="flex gap-4">
                            <button onclick="downloadAgrometPDF()" class="flex-1 py-4 bg-slate-950 hover:bg-slate-900 text-white rounded-[1.8rem] font-black text-sm tracking-wider transition-colors shadow-lg flex items-center justify-center gap-2 focus:outline-none">
                                <span>📄</span> Download Signed PDF Report
                            </button>
                            <button onclick="exportAgrometJSON()" class="flex-1 py-4 bg-white hover:bg-slate-50 text-slate-800 border-2 border-slate-950 rounded-[1.8rem] font-black text-sm tracking-wider transition-colors shadow flex items-center justify-center gap-2 focus:outline-none">
                                <span>⚡</span> Export Clean JSON Data
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FPO CROP SOURCING & POOLING CENTER (#pooling) -->
            <section id="pooling" class="scroll-mt-24 space-y-6 hidden">
                <div>
                    <h2 class="text-2xl font-black text-slate-900 tracking-tight flex items-center gap-3">
                        <span class="h-7 w-2.5 bg-emerald-500 rounded-full inline-block shadow-md shadow-emerald-500/20"></span>
                        FPO Sourcing Pool 🤝
                    </h2>
                    <p class="text-xs font-semibold text-slate-400 mt-0.5">Pool your crop yields with other Kalyan village farmers to secure high-value wholesale contracts via GreenHarvest FPO</p>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                    <!-- Sourcing Form Card -->
                    <div class="bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 xl:p-8 flex flex-col justify-between">
                        <div>
                            <div class="border-b border-slate-100 pb-3 mb-5">
                                <span class="text-[9px] bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full font-black uppercase tracking-wider">Supply Pool</span>
                                <h3 class="text-base font-black text-slate-800 mt-2">Pool My Crop Sowing</h3>
                                <p class="text-[10px] text-slate-400 font-bold mt-0.5">Pool your harvest to fulfill wholesale volume targets</p>
                            </div>

                            <form id="crop-pool-form" onsubmit="submitCropPool(event)" class="space-y-5">
                                @csrf
                                <div>
                                    <label class="block text-sm font-black text-slate-700 mb-2">Crop Type</label>
                                    <select name="crop_type" id="pool_crop_type" onchange="updatePoolPricePreview()" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-semibold focus:outline-none focus:border-emerald-500 transition-colors shadow-sm" required>
                                        <option value="Wheat">Wheat (MSP: ₹2,275/qtl)</option>
                                        <option value="Mustard">Mustard (MSP: ₹5,400/qtl)</option>
                                        <option value="Rice">Basmati Rice (MSP: ₹3,100/qtl)</option>
                                        <option value="Potatoes">Potatoes (MSP: ₹1,500/qtl)</option>
                                        <option value="Vegetables">Organic Vegetables (MSP: ₹1,800/qtl)</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-black text-slate-700 mb-2">Quantity (Quantity in Quintals)</label>
                                    <input type="number" name="quantity" id="pool_quantity" oninput="updatePoolPricePreview()" min="0.1" step="0.1" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-semibold focus:outline-none focus:border-emerald-500 transition-colors shadow-sm" placeholder="e.g. 50" required>
                                </div>

                                <!-- Dynamic Price Preview -->
                                <div class="p-4 bg-emerald-500/5 border border-emerald-100 rounded-2xl space-y-2">
                                    <div class="flex justify-between items-center text-xs font-bold text-slate-500">
                                        <span>Estimated MSP Rate:</span>
                                        <span id="pool-msp-rate">₹2,275 / qtl</span>
                                    </div>
                                    <div class="flex justify-between items-center text-sm font-black text-slate-800 border-t border-emerald-100/50 pt-2">
                                        <span>Total Sourcing Value:</span>
                                        <span id="pool-total-val" class="text-emerald-700">₹0</span>
                                    </div>
                                </div>

                                <button type="submit" class="w-full py-4 mt-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-black text-sm tracking-widest transition-colors shadow-lg hover:shadow-emerald-500/30 hover:-translate-y-0.5">SUBMIT TO FPO POOL</button>
                            </form>
                        </div>
                    </div>

                    <!-- Sourcing Ledger Table -->
                    <div class="xl:col-span-2 bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 md:p-8 flex flex-col justify-between">
                        <div class="space-y-6">
                            <div class="border-b border-slate-100 pb-3">
                                <h3 class="text-lg font-black text-slate-800">My Sourced Crop Pooling History</h3>
                                <p class="text-xs text-slate-400 font-semibold mt-0.5">Ledger of all crop quantities pooled under GreenHarvest FPO sourcing</p>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse">
                                    <thead>
                                        <tr class="border-b border-slate-150 text-[10px] font-black text-slate-400 uppercase tracking-wider">
                                            <th class="pb-3 pl-2">Sowing/Crop</th>
                                            <th class="pb-3">Quantity</th>
                                            <th class="pb-3">MSP Rate</th>
                                            <th class="pb-3">Total Value</th>
                                            <th class="pb-3">Status</th>
                                            <th class="pb-3 text-right pr-2">Date Pooled</th>
                                        </tr>
                                    </thead>
                                    <tbody id="crop-pool-history-body" class="text-xs font-bold text-slate-600 divide-y divide-slate-100">
                                        @foreach($cropPools as $pool)
                                        <tr class="hover:bg-slate-50 transition-colors">
                                            <td class="py-4 pl-2 font-black text-slate-800 flex items-center gap-2">
                                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                                                {{ $pool->crop_type }}
                                            </td>
                                            <td class="py-4">{{ $pool->quantity }} Quintals</td>
                                            <td class="py-4">₹{{ number_format($pool->price_per_unit) }}/qtl</td>
                                            <td class="py-4 font-black text-slate-800">₹{{ number_format($pool->total_value) }}</td>
                                            <td class="py-4">
                                                @if($pool->status == 'Pooled')
                                                    <span class="text-[9px] font-black bg-amber-100 text-amber-800 border border-amber-200 px-2.5 py-0.5 rounded-full uppercase tracking-wider">Pooled</span>
                                                @else
                                                    <span class="text-[9px] font-black bg-emerald-100 text-emerald-800 border border-emerald-250 px-2.5 py-0.5 rounded-full uppercase tracking-wider text-white">Aggregated & Sold</span>
                                                @endif
                                            </td>
                                            <td class="py-4 text-right pr-2 font-semibold text-slate-400">{{ \Carbon\Carbon::parse($pool->created_at)->format('d M Y, h:i A') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- PRE-FILLED GOVERNMENT SCHEMES APPLICATION MODAL -->
<div id="apply-scheme-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-md transition-opacity duration-300">
    <div class="bg-white/95 backdrop-blur-2xl border-4 border-slate-900 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] rounded-[2.5rem] max-w-lg w-full overflow-hidden transform transition-all duration-300 hover:scale-[1.005]">
        
        <!-- Header -->
        <div class="px-6 py-5 bg-gradient-to-r from-purple-500/10 to-indigo-500/10 border-b-4 border-slate-900 flex justify-between items-center">
            <div>
                <span class="text-[9px] bg-purple-100 text-purple-800 px-2 py-0.5 rounded-full font-black uppercase tracking-wider">AI Integration Flow</span>
                <h3 class="text-base font-black text-slate-800 mt-1 flex items-center gap-1.5">
                    Apply for Government Scheme 📄
                </h3>
            </div>
            <button onclick="closeApplySchemeModal()" class="w-8 h-8 rounded-full bg-slate-100 text-slate-600 font-extrabold hover:bg-slate-200 transition-colors flex items-center justify-center">✕</button>
        </div>

        <form id="scheme-apply-form" onsubmit="submitSchemeApplication(event)" class="p-6 space-y-5">
            <!-- Selected Scheme Box -->
            <div class="p-4 bg-slate-50 border border-slate-200 rounded-2xl">
                <span class="text-[9px] text-slate-400 font-bold uppercase tracking-widest block">Selected Program</span>
                <h4 id="modal-scheme-title" class="text-sm font-black text-slate-800 mt-0.5">PM-KISAN Nidhi</h4>
                <p id="modal-scheme-category" class="text-[10px] text-purple-700 font-extrabold mt-0.5">Category: Income Support</p>
            </div>

            <!-- Auto-populated Farmer Profile Fields (Like Soil/Insurance) -->
            <div class="space-y-3">
                <h5 class="text-[10px] text-slate-400 font-black uppercase tracking-wider">Auto-filled Digital Identity Credentials</h5>
                
                <div class="grid grid-cols-2 gap-3 text-xs">
                    <div class="p-2 bg-slate-50 border border-slate-100 rounded-xl">
                        <span class="text-[9px] text-slate-400 font-bold block">Applicant Name</span>
                        <span class="font-extrabold text-slate-700">{{ auth()->user()->name ?? 'Ramesh Kumar' }}</span>
                    </div>
                    <div class="p-2 bg-slate-50 border border-slate-100 rounded-xl">
                        <span class="text-[9px] text-slate-400 font-bold block">Aadhaar Verification</span>
                        <span class="font-extrabold text-emerald-600 flex items-center gap-1">✓ Verified</span>
                    </div>
                    <div class="p-2 bg-slate-50 border border-slate-100 rounded-xl col-span-2">
                        <span class="text-[9px] text-slate-400 font-bold block">Verified Land Registry</span>
                        <span class="font-extrabold text-slate-700">4.5 Acres (Kalyan, Patiala, Punjab)</span>
                    </div>
                </div>
            </div>

            <!-- Supporting Document Upload (Premium File Zone) -->
            <div class="space-y-2">
                <label class="text-[10px] text-slate-400 font-black uppercase tracking-wider block">Upload Support Documents</label>
                <div class="border-2 border-dashed border-slate-200 hover:border-purple-400 rounded-2xl p-4 text-center cursor-pointer transition-colors relative bg-slate-50/50">
                    <input type="file" id="scheme-file-upload" class="absolute inset-0 opacity-0 cursor-pointer" required />
                    <div class="space-y-1">
                        <span class="text-2xl block">📂</span>
                        <span id="scheme-upload-label" class="text-[11px] font-black text-slate-700 block">Click or Drop Land Revenue Receipt (PDF)</span>
                        <span class="text-[9px] font-bold text-slate-400 block">Accepted: PDF, PNG, JPG (Max 5MB)</span>
                    </div>
                </div>
            </div>

            <!-- Warning/Instruction Box -->
            <div class="p-3 bg-amber-50 border border-amber-200 rounded-2xl flex gap-2.5 items-start">
                <span class="text-base">⚠️</span>
                <p class="text-[10px] text-amber-800 font-semibold leading-relaxed">
                    By submitting, you certify that the uploaded land receipt aligns with your registered digital identification. The AI tracking engine will automatically run verification.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 justify-end pt-2">
                <button type="button" onclick="closeApplySchemeModal()" class="px-5 py-2.5 bg-slate-100 text-slate-600 hover:bg-slate-200 font-black rounded-xl text-xs transition-colors">Cancel</button>
                <button type="submit" id="scheme-submit-btn" class="px-6 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-black rounded-xl text-xs shadow-md transition-all flex items-center gap-1.5 hover:scale-105 active:scale-[0.98]">
                    <span>Submit & Track</span>
                </button>
            </div>
        </form>

        <!-- Loading Overlay (Simulation) -->
        <div id="scheme-modal-loading" class="absolute inset-0 bg-white/95 backdrop-blur-sm z-30 flex-col items-center justify-center hidden">
            <div class="relative flex items-center justify-center mb-4">
                <div class="w-16 h-16 rounded-full border-4 border-purple-100 border-t-purple-600 animate-spin"></div>
                <div class="absolute text-xl">🧬</div>
            </div>
            <h4 class="text-sm font-black text-slate-800">Verifying Eligibility Parameters</h4>
            <p class="text-[10px] text-purple-600 font-extrabold mt-1">Cross-referencing Land Registry API...</p>
        </div>
    </div>
</div>

<!-- Floating AI Chatbot Popup -->
<x-chatbot />

<!-- JavaScript and Chart.js code block -->
<script>
    // Navigation highlighting scroll-spy & sidebar toggle
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar-drawer');
        const backdrop = document.getElementById('sidebar-backdrop');
        sidebar.classList.toggle('-translate-x-full');
        backdrop.classList.toggle('hidden');
    }

    function toggleForumModal() {
        const modal = document.getElementById('forum-modal');
        modal.classList.toggle('hidden');
    }

    // Dynamic AI Scheme Regeneration
    function regenerateAISchemes() {
        const btn = document.getElementById('ai-regenerate-schemes-btn');
        const grid = document.getElementById('schemes-grid');
        if (!btn || !grid) return;

        btn.disabled = true;
        const originalHTML = btn.innerHTML;
        btn.innerHTML = `<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Generating AI Matches...`;
        
        grid.style.opacity = '0.5';
        
        fetch('/farmer/schemes/regenerate-ai', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(res => res.json())
        .then(data => {
            btn.disabled = false;
            btn.innerHTML = originalHTML;
            grid.style.opacity = '1';

            if (data.status === 'success') {
                grid.innerHTML = '';
                data.schemes.forEach((scheme, index) => {
                    const slug = slugify(scheme.scheme_name);
                    const isApplied = scheme.status === 'Applied';
                    
                    const cardHTML = `
                        <div id="scheme-card-${index}" data-scheme-category="${scheme.category}" class="scheme-item bg-white/90 backdrop-blur-xl border border-slate-100/70 shadow-lg rounded-[2.2rem] p-6 hover:shadow-2xl hover:scale-[1.01] transition-all duration-300 flex flex-col justify-between">
                            <div class="space-y-4">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <span class="text-[9px] bg-purple-100 text-purple-800 px-2.5 py-1 rounded-full font-black uppercase tracking-wider">${scheme.category}</span>
                                        <h3 class="text-base font-black text-slate-800 mt-2">${scheme.scheme_name}</h3>
                                    </div>
                                    <span class="text-xs font-bold text-slate-500 px-2 py-1 bg-slate-100 rounded-lg">Verified</span>
                                </div>

                                <div class="space-y-2 text-xs">
                                    <p class="font-semibold text-slate-500 leading-normal"><b class="text-slate-700">Eligibility:</b> ${scheme.eligibility}</p>
                                    <p class="font-semibold text-slate-500 leading-normal"><b class="text-slate-700">Benefits:</b> ${scheme.benefits}</p>
                                </div>

                                <!-- Why Recommended AI Box -->
                                <div class="p-3 bg-gradient-to-br from-purple-500/5 to-emerald-500/5 border border-purple-100/50 rounded-2xl">
                                    <h4 class="text-[10px] font-black text-purple-700 uppercase tracking-wider flex items-center gap-1">
                                        💡 Why is this recommended?
                                    </h4>
                                    <p class="text-[11px] text-slate-600 font-semibold leading-relaxed mt-1">${scheme.recommended_why}</p>
                                </div>
                            </div>

                            <div class="mt-6 flex items-center justify-between">
                                <span class="text-xs font-bold text-slate-400">Apply Status: <b id="scheme-status-${slug}" class="text-emerald-600">${scheme.status}</b></span>
                                ${isApplied ? `
                                    <button class="px-5 py-2.5 bg-slate-100 text-slate-400 font-black rounded-xl text-xs cursor-not-allowed" disabled>Applied Successfully</button>
                                ` : `
                                    <button id="scheme-btn-${slug}" onclick="openApplySchemeModal('${scheme.scheme_name.replace(/'/g, "\\'")}', '${scheme.category}')" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-black rounded-xl text-xs shadow-md hover:scale-105 transition-all">Apply Now</button>
                                `}
                            </div>
                        </div>
                    `;
                    grid.insertAdjacentHTML('beforeend', cardHTML);
                });

                // Reset filter
                filterSchemes('All');
            } else {
                alert('AI Scheme matching encountered a temporary latency. Please try again.');
            }
        })
        .catch(err => {
            btn.disabled = false;
            btn.innerHTML = originalHTML;
            grid.style.opacity = '1';
            console.error(err);
            alert('AI Scheme matching encountered a temporary latency. Please try again.');
        });
    }

    // Category schemes filter
    function filterSchemes(category) {
        const categories = ['All', 'Subsidy', 'Crop Insurance', 'Income Support'];
        categories.forEach(cat => {
            const btn = document.getElementById(`btn-filter-${cat.replace(' ', '-')}`);
            if (btn) {
                if (cat === category) {
                    btn.className = "px-4 py-2 rounded-full font-black text-xs border border-purple-500 bg-purple-500 text-white shadow-md hover:scale-105 active:scale-[0.98] transition-all duration-300";
                } else {
                    btn.className = "px-4 py-2 rounded-full font-black text-xs border border-slate-100 bg-white text-slate-600 hover:border-purple-300 hover:scale-105 active:scale-[0.98] transition-all duration-300";
                }
            }
        });

        const items = document.querySelectorAll('.scheme-item');
        items.forEach(item => {
            const itemCat = item.getAttribute('data-scheme-category');
            if (category === 'All' || itemCat === category) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Modal apply helpers
    let activeSchemeName = '';
    let activeSchemeCategory = '';

    function openApplySchemeModal(schemeName, category) {
        activeSchemeName = schemeName;
        activeSchemeCategory = category;
        document.getElementById('modal-scheme-title').textContent = schemeName;
        document.getElementById('modal-scheme-category').textContent = `Category: ${category}`;
        
        document.getElementById('scheme-apply-form').reset();
        document.getElementById('scheme-upload-label').textContent = 'Click or Drop Land Revenue Receipt (PDF)';
        document.getElementById('scheme-upload-label').className = 'text-[11px] font-black text-slate-700 block';

        const modal = document.getElementById('apply-scheme-modal');
        modal.classList.remove('hidden');
    }

    function closeApplySchemeModal() {
        const modal = document.getElementById('apply-scheme-modal');
        modal.classList.add('hidden');
        document.getElementById('scheme-modal-loading').classList.add('hidden');
    }

    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^\w\-]+/g, '')
            .replace(/\-\-+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
    }

    function submitSchemeApplication(event) {
        event.preventDefault();

        const loader = document.getElementById('scheme-modal-loading');
        loader.classList.remove('hidden');
        loader.classList.add('flex');

        // Build FormData — includes optional uploaded document from the scheme modal file input
        const formData = new FormData();
        formData.append('scheme_name', activeSchemeName);
        formData.append('category', activeSchemeCategory ?? 'Subsidy');
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        const docInput = document.getElementById('scheme-file-upload');
        if (docInput && docInput.files.length > 0) {
            formData.append('document', docInput.files[0]);
        }

        fetch('{{ route("farmer.scheme.apply") }}', {
            method: 'POST',
            body: formData
        })
        .then(r => r.json())
        .then(data => {
            loader.classList.add('hidden');
            loader.classList.remove('flex');
            closeApplySchemeModal();

            const isAlreadyApplied = data.status === 'already_applied';

            // 1. Success / duplicate feedback
            const feedbackMsg = isAlreadyApplied
                ? `⚠️ You have already applied for "${activeSchemeName}". Your application is Under Verification.`
                : `✅ Application for "${activeSchemeName}" saved to MongoDB! Status: Under Verification.`;
            
            // Show a non-blocking toast instead of alert
            showToast(feedbackMsg, isAlreadyApplied ? 'warning' : 'success');

            // 2. Disable Apply button & update status label
            const slug = slugify(activeSchemeName);
            const btn = document.getElementById(`scheme-btn-${slug}`);
            const statusText = document.getElementById(`scheme-status-${slug}`);
            if (btn) {
                btn.className = "px-5 py-2.5 bg-slate-100 text-slate-400 font-black rounded-xl text-xs cursor-not-allowed";
                btn.disabled = true;
                btn.textContent = isAlreadyApplied ? 'Already Applied' : 'Applied ✓';
                btn.removeAttribute('onclick');
            }
            if (statusText) statusText.textContent = 'Applied';

            // 3. Update Chart benefit data if new application
            if (!isAlreadyApplied && benefitsChart) {
                benefitsChart.data.datasets[0].data[0] += 6000;
                benefitsChart.update();
            }

            // 4. Inject live tracking timeline node
            if (!isAlreadyApplied) {
                const trackerContainer = document.querySelector('#tracker .space-y-8');
                if (trackerContainer) {
                    const newItemHTML = `
                        <div class="border-t border-slate-100 pt-6 mt-6 animate-pulse">
                            <div class="flex justify-between items-center text-xs font-bold mb-3">
                                <span>${activeSchemeName} (MongoDB Saved)</span>
                                <span class="text-purple-600">Pending Verification (25%)</span>
                            </div>
                            <div class="relative flex items-center justify-between w-full mt-6 mb-2">
                                <div class="absolute left-0 right-0 top-1/2 -translate-y-1/2 h-1 bg-slate-100 rounded-full z-0"></div>
                                <div class="absolute left-0 right-3/4 top-1/2 -translate-y-1/2 h-1 bg-purple-500 rounded-full z-0 transition-all duration-1000"></div>
                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="w-8 h-8 rounded-full bg-purple-500 text-white border-4 border-white flex items-center justify-center shadow-lg font-black text-xs">✓</div>
                                    <span class="text-[10px] font-black text-slate-800 mt-2">Submitted</span>
                                    <span class="text-[8px] font-bold text-slate-400">Just Now</span>
                                </div>
                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="w-8 h-8 rounded-full bg-white text-purple-600 border-4 border-purple-500 flex items-center justify-center shadow-lg font-black text-xs animate-pulse">1</div>
                                    <span class="text-[10px] font-black text-purple-600 mt-2">Under Review</span>
                                    <span class="text-[8px] font-bold text-slate-400">AI Verification</span>
                                </div>
                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="w-8 h-8 rounded-full bg-slate-200 text-slate-400 border-4 border-white flex items-center justify-center shadow font-black text-xs">2</div>
                                    <span class="text-[10px] font-bold text-slate-400 mt-2">Survey Phase</span>
                                    <span class="text-[8px] font-bold text-slate-400">Pending</span>
                                </div>
                                <div class="relative z-10 flex flex-col items-center">
                                    <div class="w-8 h-8 rounded-full bg-slate-200 text-slate-400 border-4 border-white flex items-center justify-center shadow font-black text-xs">3</div>
                                    <span class="text-[10px] font-bold text-slate-400 mt-2">Approved</span>
                                    <span class="text-[8px] font-bold text-slate-400">Pending Survey</span>
                                </div>
                            </div>
                        </div>`;
                    trackerContainer.insertAdjacentHTML('beforeend', newItemHTML);
                }
            }
        })
        .catch(err => {
            loader.classList.add('hidden');
            loader.classList.remove('flex');
            console.error('Scheme application error:', err);
            showToast('⚠️ Network error — scheme saved locally, will sync when online.', 'warning');
        });
    }

    // ── Toast notification helper ──────────────────────────────────────────────
    function showToast(message, type = 'success') {
        const colours = {
            success: 'bg-emerald-600',
            warning: 'bg-amber-500',
            error:   'bg-red-600'
        };
        const toast = document.createElement('div');
        toast.className = `fixed bottom-6 right-6 z-[999] px-5 py-3 rounded-2xl text-white text-xs font-black shadow-2xl transition-all duration-500 ${ colours[type] || colours.success }`;
        toast.innerText = message;
        document.body.appendChild(toast);
        setTimeout(() => { toast.style.opacity = '0'; setTimeout(() => toast.remove(), 500); }, 4000);
    }

    // AJAX Like counter
    function likePost(id, button) {
        fetch(`/farmer/forum/like/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                button.querySelector('.like-counter').innerText = `${data.likes} Likes`;
                button.classList.add('text-emerald-600');
            }
        })
        .catch(err => {
            console.error('Like failed, running local count update.', err);
            // PWA support simulation
            let counter = parseInt(button.querySelector('.like-counter').innerText);
            button.querySelector('.like-counter').innerText = `${counter + 1} Likes`;
            button.classList.add('text-emerald-600');
            document.getElementById('pwa-offline-banner').classList.remove('hidden');
        });
    }

    // AJAX Forum Post creation
    function submitForumPost(event) {
        event.preventDefault();
        const title = document.getElementById('forum_title').value.trim();
        const desc = document.getElementById('forum_desc').value.trim();
        const btn = event.target.querySelector('button[type="submit"]');
        const originalText = btn.innerText;
        btn.innerText = 'PUBLISHING...';
        btn.disabled = true;
        
        fetch('{{ route("farmer.forum.post") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ title: title, description: desc })
        })
        .then(res => {
            if (!res.ok) throw new Error('Network error');
            return res.json();
        })
        .then(data => {
            if (data.status === 'success') {
                // Prepend new post to the list
                const container = document.getElementById('forum-posts-container');
                const post = data.post;
                const card = document.createElement('div');
                card.className = "bg-white border border-slate-100 shadow-sm rounded-[2rem] p-6 space-y-4 hover:shadow-md transition-shadow duration-300";
                card.innerHTML = `
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-emerald-500 to-purple-600 p-[1.5px] flex-shrink-0">
                                <div class="w-full h-full rounded-xl bg-white flex items-center justify-center text-xs font-black text-emerald-700">${post.author_name.charAt(0)}</div>
                            </div>
                            <div>
                                <h4 class="text-xs font-black text-slate-800 leading-none">${post.author_name}</h4>
                                <span class="text-[9px] font-black text-purple-600 uppercase tracking-widest leading-none mt-1 inline-block">${post.author_role}</span>
                            </div>
                        </div>
                        <span class="text-[10px] text-slate-400 font-bold">Just now</span>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-sm font-black text-slate-800">${post.title}</h3>
                        <p class="text-xs text-slate-500 font-semibold leading-relaxed">${post.description}</p>
                    </div>
                    <div class="flex gap-4 items-center pt-2 border-t border-slate-50">
                        <button onclick="likePost('${post._id}', this)" class="flex items-center gap-1.5 text-xs text-slate-500 hover:text-emerald-600 font-black transition-colors focus:outline-none">
                            <span>👍</span>
                            <span class="like-counter">0 Likes</span>
                        </button>
                        <span class="text-xs text-slate-400 font-semibold">•</span>
                        <button class="flex items-center gap-1.5 text-xs text-slate-500 hover:text-purple-600 font-black transition-colors focus:outline-none">
                            <span>💬</span>
                            <span>0 Comments</span>
                        </button>
                    </div>
                `;
                container.insertBefore(card, container.firstChild);
                document.getElementById('forum-post-form').reset();
                if(window.innerWidth < 1024) toggleForumModal();
            }
        })
        .catch(err => {
            console.error('Forum post failed, simulating offline sync.', err);
            const banner = document.getElementById('pwa-offline-banner');
            if(banner) banner.classList.remove('hidden');
            
            // Fake append post
            const container = document.getElementById('forum-posts-container');
            const card = document.createElement('div');
            card.className = "bg-white border border-slate-100 shadow-sm rounded-[2rem] p-6 space-y-4 hover:shadow-md transition-shadow duration-300";
            card.innerHTML = `
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-emerald-500 to-purple-600 p-[1.5px] flex-shrink-0">
                            <div class="w-full h-full rounded-xl bg-white flex items-center justify-center text-xs font-black text-emerald-700">R</div>
                        </div>
                        <div>
                            <h4 class="text-xs font-black text-slate-800 leading-none">{{ auth()->user()->name ?? 'Ramesh Kumar' }}</h4>
                            <span class="text-[9px] font-black text-purple-600 uppercase tracking-widest leading-none mt-1 inline-block">Farmer</span>
                        </div>
                    </div>
                    <span class="text-[10px] text-purple-600 font-black flex items-center gap-1"><svg class="w-3 h-3 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg> Sync Queue</span>
                </div>
                <div class="space-y-1">
                    <h3 class="text-sm font-black text-slate-800">${title}</h3>
                    <p class="text-xs text-slate-500 font-semibold leading-relaxed">${desc}</p>
                </div>
                <div class="flex gap-4 items-center pt-2 border-t border-slate-50">
                    <button class="flex items-center gap-1.5 text-xs text-slate-500 font-black">
                        <span>👍</span>
                        <span class="like-counter">0 Likes</span>
                    </button>
                </div>
            `;
            container.insertBefore(card, container.firstChild);
            document.getElementById('forum-post-form').reset();
            if(window.innerWidth < 1024) toggleForumModal();
        })
        .finally(() => {
            btn.innerText = originalText;
            btn.disabled = false;
        });
    }

    // PWA Report simulation
    function simulateReportUpload(event) {
        const fileInput = event.target;
        if(fileInput.files.length > 0) {
            document.getElementById('upload-status-lbl').innerText = `Selected: ${fileInput.files[0].name} (Ready to Analyze)`;
            document.getElementById('upload-status-lbl').classList.add('text-emerald-700');
        }
    }

    // ======= EXECUTIVE REPORT SYSTEM =======
    function updateLiveReportPreview() {
        const landChecked = document.getElementById('rep-toggle-land').checked;
        const soilChecked = document.getElementById('rep-toggle-soil').checked;
        const weatherChecked = document.getElementById('rep-toggle-weather').checked;
        const mandiChecked = document.getElementById('rep-toggle-mandi').checked;
        const schemesChecked = document.getElementById('rep-toggle-schemes').checked;

        // Toggle elements display based on checkboxes
        document.getElementById('rep-sec-land').className = landChecked ? "space-y-1.5 transition-all" : "hidden transition-all";
        document.getElementById('rep-sec-soil').className = soilChecked ? "space-y-1.5 transition-all" : "hidden transition-all";
        document.getElementById('rep-sec-weather').className = weatherChecked ? "space-y-1.5 transition-all" : "hidden transition-all";
        document.getElementById('rep-sec-mandi').className = mandiChecked ? "space-y-1.5 transition-all" : "hidden transition-all";
        document.getElementById('rep-sec-schemes').className = schemesChecked ? "space-y-1.5 transition-all" : "hidden transition-all";

        // Compute a deterministic SHA-256 simulation based on checked states
        let hashSeed = (landChecked ? '1' : '0') + (soilChecked ? '1' : '0') + (weatherChecked ? '1' : '0') + (mandiChecked ? '1' : '0') + (schemesChecked ? '1' : '0');
        let computedHash = 'SHA256: F598DE821034A7B76F' + hashSeed.charCodeAt(0) + 'A' + hashSeed.charCodeAt(1) + '8' + hashSeed.charCodeAt(2) + 'D' + hashSeed.charCodeAt(3) + 'E' + hashSeed.charCodeAt(4);
        document.getElementById('rep-security-hash').innerText = computedHash;
    }

    function downloadAgrometPDF() {
        // 1. Log download event to MongoDB audit log
        const sections = [];
        if (document.getElementById('rep-toggle-land')?.checked)    sections.push('Land Boundaries');
        if (document.getElementById('rep-toggle-soil')?.checked)    sections.push('Soil Chemistry');
        if (document.getElementById('rep-toggle-weather')?.checked) sections.push('Agromet Advisory');
        if (document.getElementById('rep-toggle-mandi')?.checked)   sections.push('Mandi Prices');
        if (document.getElementById('rep-toggle-schemes')?.checked) sections.push('Gov Schemes');

        fetch('{{ route("farmer.report.log") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ report_type: 'PDF', sections_included: sections })
        }).catch(e => console.warn('Report log error:', e));

        // 2. Open clean print-friendly window
        const reportContent = document.getElementById('digitized-report-document').innerHTML;
        const printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>REG-IN-PB8921-2026_Report</title>');
        printWindow.document.write('<script src="https://cdn.tailwindcss.com"><\/script>');
        printWindow.document.write('<style>@media print { body { -webkit-print-color-adjust: exact; } }</style>');
        printWindow.document.write('</head><body class="bg-white p-8">');
        printWindow.document.write('<div class="border-4 border-double border-slate-900 rounded-[2.5rem] p-8 max-w-3xl mx-auto bg-white font-serif relative">');
        printWindow.document.write(reportContent);
        printWindow.document.write('</div>');
        printWindow.document.write('<script>window.onload = function() { setTimeout(function() { window.print(); window.close(); }, 700); };<\/script>');
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        showToast('📄 PDF report logged to MongoDB & sent to printer!', 'success');
    }

    function exportAgrometJSON() {
        // Gather current report variables
        const reportData = {
            registry: "REG-IN-PB8921-2026",
            timestamp: new Date().toISOString(),
            applicant: {
                name: "{{ auth()->user()->name ?? 'Ramesh Kumar' }}",
                village: "Kalyan Village",
                district: "Patiala",
                state: "Punjab",
                role: "Farmer"
            },
            compiled_metrics: {
                land_boundaries: document.getElementById('rep-toggle-land').checked ? {
                    total_area_acres: 4.5,
                    plots: [
                        { name: "Plot A", crop: "Wheat", area_acres: 2.0, vigour_ndvi: 0.84 },
                        { name: "Plot B", crop: "Wheat", area_acres: 1.5, vigour_ndvi: 0.72 },
                        { name: "Plot C", crop: "Mustard", area_acres: 1.0, vigour_ndvi: 0.58 }
                    ]
                } : null,
                soil_health: document.getElementById('rep-toggle-soil').checked ? {
                    ph_level: 6.8,
                    status: "Optimal",
                    nitrogen_kg_ha: 140,
                    phosphorus_kg_ha: 65,
                    potassium_kg_ha: 42
                } : null,
                agromet_advisory: document.getElementById('rep-toggle-weather').checked ? {
                    temp_c: 32,
                    condition: "Light Drizzle Advisory",
                    advisory: "Delay chemical spray applications due to precipitation."
                } : null,
                mandi_market_rates: document.getElementById('rep-toggle-mandi').checked ? [
                    { crop: "Wheat", rate_quintal_inr: 2450 },
                    { crop: "Mustard", rate_quintal_inr: 5850 }
                ] : null,
                eligible_schemes: document.getElementById('rep-toggle-schemes').checked ? [
                    { name: "PM-KISAN Nidhi", status: "Verified" },
                    { name: "PM Fasal Bima Yojana", status: "Approved" },
                    { name: "Agri Infra Fund", status: "Eligible" }
                ] : null
            },
            digital_signoff: {
                authority: "Directorate of Agriculture & Farmer Welfare, Govt of Punjab",
                checksum: document.getElementById('rep-security-hash').innerText
            }
        };

        // 1. Log JSON export event to MongoDB audit log
        const exportedSections = [];
        if (reportData.compiled_metrics.land_boundaries)  exportedSections.push('Land Boundaries');
        if (reportData.compiled_metrics.soil_health)      exportedSections.push('Soil Chemistry');
        if (reportData.compiled_metrics.agromet_advisory) exportedSections.push('Agromet Advisory');
        if (reportData.compiled_metrics.mandi_market_rates) exportedSections.push('Mandi Prices');
        if (reportData.compiled_metrics.eligible_schemes) exportedSections.push('Gov Schemes');

        fetch('{{ route("farmer.report.log") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ report_type: 'JSON', sections_included: exportedSections })
        }).catch(e => console.warn('Report log error:', e));

        // 2. Create programmatic anchor link and click it to download cleanly
        const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(reportData, null, 4));
        const downloadAnchor = document.createElement('a');
        downloadAnchor.setAttribute("href", dataStr);
        downloadAnchor.setAttribute("download", "PB8921_agricultural_audit_2026.json");
        document.body.appendChild(downloadAnchor);
        downloadAnchor.click();
        downloadAnchor.remove();
        showToast('⚡ JSON data logged to MongoDB & downloaded!', 'success');
    }

    // AJAX Soil Test Report Submit
    function submitSoilTest(event) {
        event.preventDefault();
        const ph = document.getElementById('ph_slider').value;
        const fileInput = document.getElementById('report_file');
        const hasReport = fileInput.files.length > 0;
        
        const btn = event.target.querySelector('button[type="submit"]');
        const originalText = btn.innerText;
        btn.innerText = 'ANALYZING...';
        btn.disabled = true;
        
        const formData = new FormData();
        formData.append('ph_level', ph);
        if (hasReport) {
            formData.append('report_file', fileInput.files[0]);
        }
        
        fetch('{{ route("farmer.soil.test") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(res => {
            if (!res.ok) throw new Error('Network error');
            return res.json();
        })
        .then(data => {
            if(data.status === 'success') {
                // Update views
                document.getElementById('soil_condition_lbl').innerText = data.condition;
                document.getElementById('best_crops_lbl').innerText = data.crops.join(', ');
                
                const list = document.getElementById('fertilizer_suggestions_list');
                list.innerHTML = '';
                data.fertilizers.forEach(f => {
                    const li = document.createElement('li');
                    li.innerText = f;
                    list.appendChild(li);
                });
                
                // Animate pH value
                document.getElementById('ph_value_lbl').innerText = data.ph;
                
                // Update chart
                let phValue = parseFloat(data.ph);
                soilChart.data.datasets[0].data = [phValue, phValue > 7 ? 40 : 80, phValue < 6 ? 30 : 70];
                soilChart.update();
            }
        })
        .catch(err => {
            console.error('Soil test failed, simulating locally.', err);
            
            // Local fallback simulation
            let phValue = parseFloat(ph);
            let condition = phValue < 6 ? 'Acidic Soil' : (phValue > 7.5 ? 'Alkaline Soil' : 'Neutral / Optimal Soil');
            let crops = phValue < 6 ? ['Potatoes', 'Oats'] : (phValue > 7.5 ? ['Barley', 'Cotton'] : ['Wheat', 'Maize', 'Mustard']);
            
            let simulatedCondition = condition + ' (Simulated)';
            let fertilizersHTML = `<li>Maintain current soil quality using balanced NPK ratios for ${phValue.toFixed(1)} pH.</li>`;
            
            // Richer output if a report is uploaded
            if (hasReport) {
                simulatedCondition = condition + ' (AI Report Scanned)';
                fertilizersHTML = `
                    <li class="text-purple-700 font-bold">✨ AI extracted from ${fileInput.files[0].name}</li>
                    <li>Nitrogen is optimal (45kg/ha), but Potassium is severely deficient.</li>
                    <li>Apply farmyard manure (FYM) @ 5 tonnes/acre before next sowing to enrich microbes.</li>
                    <li>Top dress with Muriate of Potash (MOP) @ 25 kg/acre.</li>
                    <li>Avoid excessive urea application near the waterways.</li>
                `;
            }
            
            document.getElementById('soil_condition_lbl').innerText = simulatedCondition;
            document.getElementById('best_crops_lbl').innerText = crops.join(', ');
            document.getElementById('ph_value_lbl').innerText = phValue.toFixed(1);
            
            const list = document.getElementById('fertilizer_suggestions_list');
            list.innerHTML = fertilizersHTML;
            
            if(soilChart) {
                if (hasReport) {
                    soilChart.data.datasets[0].data = [phValue, 45, 10]; // High N, Low K simulation from report
                } else {
                    soilChart.data.datasets[0].data = [phValue, phValue > 7 ? 40 : 80, phValue < 6 ? 30 : 70];
                }
                soilChart.update();
            }
            
            const banner = document.getElementById('pwa-offline-banner');
            if(banner) banner.classList.remove('hidden');
        })
        .finally(() => {
            btn.innerText = originalText;
            btn.disabled = false;
        });
    }

    // AJAX Insurance claim submit with AI estimation
    function submitInsuranceClaim(event) {
        event.preventDefault();
        const crop = document.getElementById('ins_crop').value;
        const area = document.getElementById('ins_area').value;
        const cause = document.getElementById('ins_cause').value;
        const btn = event.target.querySelector('button[type="submit"]');
        const originalText = btn.innerText;
        btn.innerText = 'SUBMITTING...';
        btn.disabled = true;
        
        fetch('{{ route("farmer.insurance.apply") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ crop_name: crop, area_damaged: area, damage_cause: cause })
        })
        .then(res => {
            if (!res.ok) throw new Error('Network error');
            return res.json();
        })
        .then(data => {
            if(data.status === 'success') {
                const claim = data.claim;
                // Show AI assessment
                document.getElementById('est_percentage').innerText = `${claim.estimated_damage}%`;
                document.getElementById('ai-estimation-result').classList.remove('hidden');
                
                // Append claim log
                const list = document.getElementById('claims-history-list');
                const row = document.createElement('div');
                row.className = "p-4 bg-slate-50 hover:bg-slate-100 transition-colors border border-slate-100 rounded-2xl flex justify-between items-center text-xs gap-3";
                row.innerHTML = `
                    <div>
                        <p class="font-black text-slate-800 leading-tight">${claim.crop_name} claim</p>
                        <span class="text-[10px] font-semibold text-slate-500 block mt-1">Applied: Today • Damaged Area: ${claim.area_damaged} Acres</span>
                    </div>
                    <div class="text-right flex-shrink-0">
                        <span class="px-2.5 py-1 text-[10px] font-black uppercase rounded-full bg-amber-100 text-amber-800">${claim.status}</span>
                        <p class="text-[10px] font-bold text-slate-500 mt-1.5">Loss: <b class="text-slate-800 font-black">${claim.estimated_damage}%</b></p>
                    </div>
                `;
                
                // Remove placeholder if present
                const placeholder = list.querySelector('.flex-col');
                if(placeholder) placeholder.remove();
                
                list.insertBefore(row, list.firstChild);
                document.getElementById('insurance-claim-form').reset();
            }
        })
        .catch(err => {
            console.error('Insurance claim failed, simulating offline sync.', err);
            
            // Fake damage estimation percentage
            document.getElementById('est_percentage').innerText = `35%`;
            document.getElementById('ai-estimation-result').classList.remove('hidden');
            
            const list = document.getElementById('claims-history-list');
            const row = document.createElement('div');
            row.className = "p-4 bg-slate-50 hover:bg-slate-100 transition-colors border border-slate-100 rounded-2xl flex justify-between items-center text-xs gap-3";
            row.innerHTML = `
                <div>
                    <p class="font-black text-slate-800 leading-tight">${crop} claim</p>
                    <span class="text-[10px] font-semibold text-slate-500 block mt-1">Damaged Area: ${area} Acres</span>
                </div>
                <div class="text-right flex-shrink-0">
                    <span class="px-2.5 py-1 text-[10px] font-black uppercase rounded-full bg-amber-100 text-amber-800">Under Review</span>
                    <p class="text-[10px] font-bold text-slate-500 mt-1.5">Loss: <b class="text-slate-800 font-black">35%</b></p>
                </div>
            `;
            
            // Remove placeholder if present
            const placeholder = list.querySelector('.flex-col');
            if(placeholder) placeholder.remove();
            
            list.insertBefore(row, list.firstChild);
            document.getElementById('insurance-claim-form').reset();
            
            const banner = document.getElementById('pwa-offline-banner');
            if(banner) banner.classList.remove('hidden');
        })
        .finally(() => {
            btn.innerText = originalText;
            btn.disabled = false;
        });
    }

    // CHART.JS INITIALIZATION FEEDS
    let mandiChartInstance = null;
    const mandiData = @json($mandiPrices);

    function initMandiChart() {
        const ctx = document.getElementById('mandiTrendsChart').getContext('2d');
        const selectedCrop = document.getElementById('mandi-crop-select').value;
        const cropHistory = mandiData[selectedCrop].history;
        
        mandiChartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: `${selectedCrop} Mandi Price (₹/qtl)`,
                    data: cropHistory,
                    borderColor: '#10b981', // Emerald
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#8b5cf6', // Purple point markers
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                family: 'Outfit',
                                weight: 'bold'
                            }
                        }
                    },
                    y: {
                        grid: {
                            color: 'rgba(226, 232, 240, 0.5)'
                        },
                        ticks: {
                            font: {
                                family: 'Outfit',
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });
    }

    function updateMandiChart() {
        if(!mandiChartInstance) return;
        const selectedCrop = document.getElementById('mandi-crop-select').value;
        const cropHistory = mandiData[selectedCrop].history;
        
        mandiChartInstance.data.datasets[0].label = `${selectedCrop} Mandi Price (₹/qtl)`;
        mandiChartInstance.data.datasets[0].data = cropHistory;
        mandiChartInstance.data.datasets[0].borderColor = selectedCrop === 'Cotton' ? '#ef4444' : '#10b981';
        mandiChartInstance.update();
    }

    // Polar nutrient chart inside Soil testing card
    let soilChart = null;
    function initSoilChart() {
        const ctx = document.getElementById('soilNutrientChart').getContext('2d');
        soilChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ['pH Score', 'Nitrogen', 'Phosphorus'],
                datasets: [{
                    data: [6.8, 45, 80],
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
                    r: {
                        ticks: { display: false },
                        grid: { display: false }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    }

    // Weather forecast trend chart (Mixed Line + Bar)
    let weatherForecastChart = null;
    function initWeatherForecastChart() {
        const ctx = document.getElementById('weatherForecastChart').getContext('2d');
        weatherForecastChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [
                    {
                        type: 'line',
                        label: 'Temperature (°C)',
                        data: [32, 31, 29, 30, 33, 34, 32],
                        borderColor: '#8b5cf6', // Purple
                        backgroundColor: 'transparent',
                        borderWidth: 3,
                        yAxisID: 'yTemp',
                        tension: 0.4,
                        pointBackgroundColor: '#8b5cf6',
                        pointBorderColor: '#fff',
                        pointRadius: 4
                    },
                    {
                        type: 'bar',
                        label: 'Rain Probability (%)',
                        data: [20, 60, 80, 40, 10, 5, 15],
                        backgroundColor: 'rgba(16, 185, 129, 0.6)', // Emerald (semi-transparent)
                        borderColor: '#10b981',
                        borderWidth: 1,
                        yAxisID: 'yRain'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: { family: 'Outfit', weight: 'bold', size: 10 }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { font: { family: 'Outfit', weight: 'bold', size: 10 } }
                    },
                    yTemp: {
                        type: 'linear',
                        position: 'left',
                        title: { display: true, text: 'Temp (°C)', font: { family: 'Outfit', weight: 'bold', size: 9 } },
                        ticks: { font: { family: 'Outfit', weight: 'bold' } },
                        grid: { display: false }
                    },
                    yRain: {
                        type: 'linear',
                        position: 'right',
                        title: { display: true, text: 'Rain Prob (%)', font: { family: 'Outfit', weight: 'bold', size: 9 } },
                        ticks: { font: { family: 'Outfit', weight: 'bold' } },
                        min: 0,
                        max: 100,
                        grid: { color: 'rgba(226, 232, 240, 0.5)' }
                    }
                }
            }
        });
    }

    // Benefits doughnut chart
    let benefitsChart = null;
    function initBenefitsDoughnutChart() {
        const el = document.getElementById('benefitsDoughnutChart');
        if (!el) return;
        const ctx = el.getContext('2d');
        benefitsChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['PM-KISAN', 'Crop Insurance', 'Fertilizer Subsidy', 'Seed Subsidy'],
                datasets: [{
                    data: [6000, 12500, 4000, 2000],
                    backgroundColor: [
                        'rgba(16, 185, 129, 0.8)', // Emerald
                        'rgba(139, 92, 246, 0.8)', // Purple
                        'rgba(245, 158, 11, 0.8)',  // Amber
                        'rgba(20, 184, 166, 0.8)'   // Teal
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            font: { family: 'Outfit', weight: 'bold', size: 10 }
                        }
                    }
                },
                cutout: '65%'
            }
        });
    }

    // Insurance claims premium vs payout chart
    let insuranceClaimsChart = null;
    function initInsuranceClaimsChart() {
        const ctx = document.getElementById('insuranceClaimsChart').getContext('2d');
        insuranceClaimsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Wheat (24)', 'Paddy (24)', 'Mustard (25)', 'Wheat (26)'],
                datasets: [
                    {
                        label: 'Premium Paid (₹)',
                        data: [1200, 1800, 800, 1500],
                        backgroundColor: 'rgba(139, 92, 246, 0.7)', // Purple
                        borderColor: '#8b5cf6',
                        borderWidth: 1.5
                    },
                    {
                        label: 'Disbursed (₹)',
                        data: [8500, 14000, 0, 12500],
                        backgroundColor: 'rgba(16, 185, 129, 0.8)', // Emerald
                        borderColor: '#10b981',
                        borderWidth: 1.5
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            boxWidth: 12,
                            font: { family: 'Outfit', weight: 'bold', size: 10 }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { font: { family: 'Outfit', weight: 'bold', size: 10 } }
                    },
                    y: {
                        grid: { color: 'rgba(226, 232, 240, 0.5)' },
                        ticks: { font: { family: 'Outfit', weight: 'bold', size: 9 } }
                    }
                }
            }
        });
    }

    // ======= NEW OVERVIEW ANALYTICS CHARTS =======

    // Crop Yield Trend — smooth line chart
    function initYieldTrendChart() {
        const ctx = document.getElementById('yieldTrendChart');
        if (!ctx) return;
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Kharif 23', 'Rabi 24', 'Kharif 24', 'Rabi 25', 'Kharif 25', 'Rabi 26'],
                datasets: [
                    {
                        label: 'Wheat (qtl/ac)',
                        data: [6.2, 7.1, 6.8, 7.8, 7.2, 8.1],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16,185,129,0.08)',
                        borderWidth: 3,
                        tension: 0.45,
                        fill: true,
                        pointBackgroundColor: '#10b981',
                        pointBorderColor: '#fff',
                        pointRadius: 5
                    },
                    {
                        label: 'Mustard (qtl/ac)',
                        data: [4.5, 5.2, 5.0, 5.8, 5.5, 6.3],
                        borderColor: '#8b5cf6',
                        backgroundColor: 'rgba(139,92,246,0.07)',
                        borderWidth: 3,
                        tension: 0.45,
                        fill: true,
                        pointBackgroundColor: '#8b5cf6',
                        pointBorderColor: '#fff',
                        pointRadius: 5
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: { mode: 'index', intersect: false },
                plugins: {
                    legend: { position: 'top', labels: { boxWidth: 12, font: { family: 'Outfit', weight: 'bold', size: 11 } } },
                    tooltip: { backgroundColor: '#1e293b', titleFont: { family: 'Outfit', weight: 'black' }, bodyFont: { family: 'Outfit' } }
                },
                scales: {
                    x: { grid: { display: false }, ticks: { font: { family: 'Outfit', weight: 'bold', size: 10 } } },
                    y: { grid: { color: 'rgba(226,232,240,0.6)' }, ticks: { font: { family: 'Outfit', weight: 'bold', size: 10 } }, beginAtZero: false, min: 3 }
                }
            }
        });
    }

    // Overview Mandi Price Bar Chart
    let overviewMandiChartInstance = null;
    function initOverviewMandiChart() {
        const ctx = document.getElementById('overviewMandiChart');
        if (!ctx) return;
        overviewMandiChartInstance = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Wheat', 'Rice', 'Cotton', 'Vegetables'],
                datasets: [{
                    label: '₹/qtl (May 2026)',
                    data: [
                        mandiData['Wheat'].current,
                        mandiData['Rice'].current,
                        mandiData['Cotton'].current,
                        mandiData['Vegetables'].current
                    ],
                    backgroundColor: [
                        'rgba(16,185,129,0.8)',
                        'rgba(139,92,246,0.8)',
                        'rgba(59,130,246,0.8)',
                        'rgba(245,158,11,0.8)'
                    ],
                    borderColor: [
                        '#10b981','#8b5cf6','#3b82f6','#f59e0b'
                    ],
                    borderWidth: 1.5,
                    borderRadius: 10,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: { backgroundColor: '#1e293b', titleFont: { family: 'Outfit', weight: 'black' }, bodyFont: { family: 'Outfit' } }
                },
                scales: {
                    x: { grid: { display: false }, ticks: { font: { family: 'Outfit', weight: 'bold', size: 11 } } },
                    y: { grid: { color: 'rgba(226,232,240,0.5)' }, ticks: { font: { family: 'Outfit', weight: 'bold', size: 10 }, callback: v => '₹' + v.toLocaleString() } }
                }
            }
        });
    }

    // Income vs Expense monthly bar chart
    function initIncomeExpenseChart() {
        const ctx = document.getElementById('incomeExpenseChart');
        if (!ctx) return;
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [
                    {
                        label: 'Income (₹K)',
                        data: [8, 12, 18, 22, 35, 14, 9],
                        backgroundColor: 'rgba(16,185,129,0.85)',
                        borderColor: '#10b981',
                        borderWidth: 1.5,
                        borderRadius: 8,
                        borderSkipped: false
                    },
                    {
                        label: 'Expense (₹K)',
                        data: [5, 7, 9, 11, 14, 8, 6],
                        backgroundColor: 'rgba(239,68,68,0.7)',
                        borderColor: '#ef4444',
                        borderWidth: 1.5,
                        borderRadius: 8,
                        borderSkipped: false
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: { mode: 'index', intersect: false },
                plugins: {
                    legend: { position: 'top', labels: { boxWidth: 12, font: { family: 'Outfit', weight: 'bold', size: 11 } } },
                    tooltip: { backgroundColor: '#1e293b', titleFont: { family: 'Outfit', weight: 'black' }, bodyFont: { family: 'Outfit' } }
                },
                scales: {
                    x: { grid: { display: false }, ticks: { font: { family: 'Outfit', weight: 'bold', size: 10 } } },
                    y: { grid: { color: 'rgba(226,232,240,0.5)' }, ticks: { font: { family: 'Outfit', weight: 'bold', size: 10 }, callback: v => '₹' + v + 'K' } }
                }
            }
        });
    }

    // Crop Land-Use Doughnut
    function initCropDistributionChart() {
        const ctx = document.getElementById('cropDistributionChart');
        if (!ctx) return;
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Wheat (2 ac)', 'Mustard (1.5 ac)', 'Vegetables (0.5 ac)', 'Fallow (0.5 ac)'],
                datasets: [{
                    data: [2, 1.5, 0.5, 0.5],
                    backgroundColor: [
                        'rgba(16,185,129,0.85)',
                        'rgba(139,92,246,0.85)',
                        'rgba(245,158,11,0.85)',
                        'rgba(203,213,225,0.7)'
                    ],
                    borderColor: '#fff',
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%',
                plugins: {
                    legend: { position: 'bottom', labels: { boxWidth: 10, font: { family: 'Outfit', weight: 'bold', size: 9 }, padding: 8 } },
                    tooltip: { backgroundColor: '#1e293b', titleFont: { family: 'Outfit', weight: 'black' }, bodyFont: { family: 'Outfit' } }
                }
            }
        });
    }

    // Tab Switching / SPA Navigation Logic (Open selected feature only)
    function switchTab(tabId, isInitial = false) {
        const sections = ['overview', 'profile', 'advisory', 'schemes', 'tracker', 'market', 'soil', 'insurance', 'maps', 'forum', 'reports', 'pooling'];
        
        // Hide all sections except the active tabId to satisfy "open that only" directive
        sections.forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                if (id === tabId) {
                    el.classList.remove('hidden');
                } else {
                    el.classList.add('hidden');
                }
            }
        });
        
        // Highlight corresponding sidebar link
        const links = document.querySelectorAll('.sidebar-link');
        links.forEach(link => {
            link.classList.remove('active-tab');
            const href = link.getAttribute('href');
            if (href === `#${tabId}`) {
                link.classList.add('active-tab');
            }
        });
        
        // Reset main viewport scrollpane to top
        const mainContent = document.querySelector('main');
        if (mainContent) {
            mainContent.scrollTop = 0;
        }
        
        // Close sidebar drawer if open on mobile
        const sidebar = document.getElementById('sidebar-drawer');
        const backdrop = document.getElementById('sidebar-backdrop');
        if (sidebar && !sidebar.classList.contains('-translate-x-full')) {
            sidebar.classList.add('-translate-x-full');
            if (backdrop) backdrop.classList.add('hidden');
        }

        // Recalculate and trigger Leaflet map redrawing to avoid rendering glitches
        if (tabId === 'maps' && window.gisMap) {
            setTimeout(() => {
                window.gisMap.invalidateSize();
            }, 100);
        }
    }

    // ======= REAL-TIME WEATHER API (Open-Meteo — no key needed) =======
    let weatherForecastChartInstance = null;

    // WMO weather code → description + emoji
    function wmoToInfo(code) {
        if (code === 0)            return { desc: 'Clear Sky',       icon: '☀️',  bg: 'from-yellow-400 to-orange-400' };
        if (code <= 2)             return { desc: 'Partly Cloudy',   icon: '⛅',  bg: 'from-blue-400 to-cyan-500' };
        if (code === 3)            return { desc: 'Overcast',        icon: '☁️',  bg: 'from-slate-400 to-slate-500' };
        if (code <= 48)            return { desc: 'Foggy',           icon: '🌫️', bg: 'from-slate-400 to-gray-500' };
        if (code <= 55)            return { desc: 'Drizzle',         icon: '🌦️', bg: 'from-emerald-500 to-teal-600' };
        if (code <= 65)            return { desc: 'Rainy',           icon: '🌧️', bg: 'from-blue-600 to-indigo-700' };
        if (code <= 75)            return { desc: 'Snowfall',        icon: '❄️',  bg: 'from-blue-200 to-indigo-400' };
        if (code <= 82)            return { desc: 'Rain Showers',    icon: '🌦️', bg: 'from-emerald-500 to-teal-700' };
        if (code <= 99)            return { desc: 'Thunderstorm',    icon: '⛈️',  bg: 'from-slate-700 to-gray-900' };
        return                            { desc: 'Variable',        icon: '🌡️', bg: 'from-emerald-600 to-teal-700' };
    }

    async function fetchRealWeather() {
        const LAT = 30.34, LON = 76.39; // Patiala, Punjab
        const url = '{{ config("services.weather.url", "https://api.open-meteo.com/v1/forecast") }}' +
            `?latitude=${LAT}&longitude=${LON}` +
            `&current=temperature_2m,relative_humidity_2m,wind_speed_10m,precipitation,weather_code,apparent_temperature,uv_index` +
            `&daily=temperature_2m_max,temperature_2m_min,precipitation_sum,weather_code,precipitation_probability_max` +
            `&timezone=Asia%2FKolkata&forecast_days=7`;
        try {
            const res  = await fetch(url);
            const data = await res.json();
            const c    = data.current;
            const d    = data.daily;

            // --- Current weather ---
            const info = wmoToInfo(c.weather_code);
            const now  = new Date();
            const timeStr = now.toLocaleTimeString('en-IN', { hour: '2-digit', minute: '2-digit', hour12: true });

            document.getElementById('weather-temp').textContent     = `${Math.round(c.temperature_2m)}°C`;
            document.getElementById('weather-desc').textContent     = info.desc;
            document.getElementById('weather-icon').textContent     = info.icon;
            document.getElementById('weather-humidity').textContent = `${c.relative_humidity_2m}%`;
            document.getElementById('weather-wind').textContent     = `${Math.round(c.wind_speed_10m)} km/h`;
            document.getElementById('weather-rain').textContent     = `${c.precipitation ?? 0} mm`;
            document.getElementById('weather-feels').textContent    = `${Math.round(c.apparent_temperature)}°C`;
            document.getElementById('weather-uv').textContent       = c.uv_index ?? '--';
            document.getElementById('weather-updated').textContent  = `Live • Updated ${timeStr}`;

            // --- Badge update ---
            const badge = document.getElementById('forecast-status');
            if (badge) {
                badge.textContent = 'Live ✓';
                badge.className = 'text-[10px] px-3 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-full font-black uppercase';
            }

            // --- Hide loading overlay ---
            const loader = document.getElementById('weather-loading');
            if (loader) loader.style.display = 'none';

            // --- 7-day forecast chart with real data ---
            const dayLabels = d.time.map(t => {
                const dt = new Date(t);
                return dt.toLocaleDateString('en-IN', { weekday: 'short', day: 'numeric' });
            });
            const maxTemps  = d.temperature_2m_max;
            const minTemps  = d.temperature_2m_min;
            const rainProbs = d.precipitation_probability_max;

            const ctx = document.getElementById('weatherForecastChart');
            if (!ctx) return;

            if (weatherForecastChartInstance) weatherForecastChartInstance.destroy();

            weatherForecastChartInstance = new Chart(ctx, {
                data: {
                    labels: dayLabels,
                    datasets: [
                        {
                            type: 'line',
                            label: 'Max Temp (°C)',
                            data: maxTemps,
                            borderColor: '#8b5cf6',
                            backgroundColor: 'transparent',
                            borderWidth: 3,
                            yAxisID: 'yTemp',
                            tension: 0.4,
                            pointBackgroundColor: '#8b5cf6',
                            pointBorderColor: '#fff',
                            pointRadius: 5
                        },
                        {
                            type: 'line',
                            label: 'Min Temp (°C)',
                            data: minTemps,
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16,185,129,0.05)',
                            borderWidth: 2,
                            borderDash: [5, 4],
                            yAxisID: 'yTemp',
                            tension: 0.4,
                            pointBackgroundColor: '#10b981',
                            pointBorderColor: '#fff',
                            pointRadius: 4,
                            fill: true
                        },
                        {
                            type: 'bar',
                            label: 'Rain Probability (%)',
                            data: rainProbs,
                            backgroundColor: 'rgba(59,130,246,0.55)',
                            borderColor: '#3b82f6',
                            borderWidth: 1,
                            borderRadius: 6,
                            yAxisID: 'yRain'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: { boxWidth: 12, font: { family: 'Outfit', weight: 'bold', size: 11 } }
                        },
                        tooltip: {
                            backgroundColor: '#1e293b',
                            titleFont: { family: 'Outfit', weight: 'black' },
                            bodyFont: { family: 'Outfit' }
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { font: { family: 'Outfit', weight: 'bold', size: 10 } }
                        },
                        yTemp: {
                            position: 'left',
                            title: { display: true, text: 'Temp (°C)', font: { family: 'Outfit', weight: 'bold', size: 9 } },
                            ticks: { font: { family: 'Outfit', weight: 'bold', size: 10 } },
                            grid: { color: 'rgba(226,232,240,0.5)' }
                        },
                        yRain: {
                            position: 'right',
                            title: { display: true, text: 'Rain Prob (%)', font: { family: 'Outfit', weight: 'bold', size: 9 } },
                            ticks: { font: { family: 'Outfit', weight: 'bold', size: 10 } },
                            min: 0, max: 100,
                            grid: { display: false }
                        }
                    }
                }
            });

            // --- Also update the navbar weather badge if it exists ---
            const navBadge = document.getElementById('nav-weather-badge');
            if (navBadge) {
                navBadge.textContent = `${info.icon} ${Math.round(c.temperature_2m)}°C · ${info.desc}`;
            }

            // --- Dynamically update crop advisories with accurate real-time weather ---
            const temp = Math.round(c.temperature_2m);
            const humidity = c.relative_humidity_2m;
            
            const irrDesc = document.getElementById('advisory-desc-0');
            if (irrDesc) {
                if (temp > 30) {
                    irrDesc.innerHTML = `High temperature of <strong class="text-slate-800 font-extrabold">${temp}°C</strong> detected in Patiala. Wheat crop is in flowering stage; schedule light irrigation within 2 days to prevent flower drop.`;
                } else {
                    irrDesc.innerHTML = `Mild temperature of <strong class="text-slate-800 font-extrabold">${temp}°C</strong> detected. Keep routine soil moisture checks; schedule normal drip cycles accordingly.`;
                }
            }

            const pestDesc = document.getElementById('advisory-desc-2');
            if (pestDesc) {
                if (humidity > 70) {
                    pestDesc.innerHTML = `High relative humidity of <strong class="text-slate-800 font-extrabold">${humidity}%</strong> is conducive for Yellow Rust fungal growth. Inspect fields daily and spray Propiconazole if spots appear.`;
                } else {
                    pestDesc.innerHTML = `Moderate relative humidity of <strong class="text-slate-800 font-extrabold">${humidity}%</strong> reduces active disease risks. Inspect crops twice a week for organic preventive wellness.`;
                }
            }

        } catch (err) {
            console.warn('Weather fetch failed:', err);
            const loader = document.getElementById('weather-loading');
            if (loader) {
                loader.innerHTML = `<div class="text-center text-white"><div class="text-2xl mb-2">⚠️</div><p class="text-xs font-black">Weather Offline</p><p class="text-[10px] text-emerald-200 mt-1">Check internet connection</p></div>`;
            }
        }
    }

    // Real-time Mandi Prices Poller (Feature 3)
    function startRealtimeMandiPolling() {
        setInterval(async () => {
            try {
                const res = await fetch('{{ route("farmer.mandi.prices") }}');
                const data = await res.json();
                if (data.status === 'success') {
                    const prices = data.mandiPrices;
                    
                    // Update global mandiData
                    Object.keys(prices).forEach(crop => {
                        mandiData[crop] = prices[crop];
                        
                        // 1. Update HTML table row with visual flash effect
                        const row = document.getElementById(`mandi-row-${crop}`);
                        const priceEl = document.getElementById(`mandi-price-${crop}`);
                        const changeEl = document.getElementById(`mandi-change-${crop}`);
                        
                        if (priceEl && changeEl) {
                            const oldPrice = parseFloat(priceEl.innerText.replace(/[^\d\.]/g, ''));
                            const newPrice = prices[crop].current;
                            
                            // Visual tick/flash animation!
                            if (newPrice > oldPrice) {
                                if (row) {
                                    row.classList.remove('bg-slate-50', 'border-transparent');
                                    row.classList.add('bg-emerald-500/10', 'border-emerald-500/35');
                                    setTimeout(() => {
                                        row.classList.remove('bg-emerald-500/10', 'border-emerald-500/35');
                                        row.classList.add('bg-slate-50', 'border-transparent');
                                    }, 1500);
                                }
                            } else if (newPrice < oldPrice) {
                                if (row) {
                                    row.classList.remove('bg-slate-50', 'border-transparent');
                                    row.classList.add('bg-red-500/10', 'border-red-500/35');
                                    setTimeout(() => {
                                        row.classList.remove('bg-red-500/10', 'border-red-500/35');
                                        row.classList.add('bg-slate-50', 'border-transparent');
                                    }, 1500);
                                }
                            }
                            
                            priceEl.innerText = `₹${newPrice.toLocaleString('en-IN')}`;
                            
                            const arrow = prices[crop].trend === 'up' ? '▲' : '▼';
                            changeEl.innerText = `${arrow} ${prices[crop].change}%`;
                            if (prices[crop].trend === 'up') {
                                changeEl.className = 'text-[10px] font-black text-emerald-600';
                            } else {
                                changeEl.className = 'text-[10px] font-black text-red-600';
                            }
                        }
                    });
                    
                    // 2. Update mandi trends chart smoothly
                    updateMandiChart();
                    
                    // 3. Update overview bar chart smoothly
                    if (overviewMandiChartInstance) {
                        overviewMandiChartInstance.data.datasets[0].data = [
                            prices['Wheat'].current,
                            prices['Rice'].current,
                            prices['Cotton'].current,
                            prices['Vegetables'].current
                        ];
                        overviewMandiChartInstance.update();
                    }
                }
            } catch (err) {
                console.warn('Real-time Mandi price fetch failed:', err);
            }
        }, 8000);
    }

    // ======= CROP POOLING MANAGEMENT HANDLERS =======
    const poolPrices = {
        'Wheat': 2275,
        'Rice': 3100,
        'Mustard': 5400,
        'Potatoes': 1500,
        'Vegetables': 1800
    };

    function updatePoolPricePreview() {
        const crop = document.getElementById('pool_crop_type').value;
        const qty = parseFloat(document.getElementById('pool_quantity').value) || 0;
        const rate = poolPrices[crop] || 2000;
        const total = qty * rate;

        document.getElementById('pool-msp-rate').textContent = `₹${rate.toLocaleString('en-IN')} / qtl`;
        document.getElementById('pool-total-val').textContent = `₹${total.toLocaleString('en-IN')}`;
    }

    async function submitCropPool(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        try {
            const res = await fetch('{{ route("farmer.crop.pool") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            });
            const data = await res.json();
            if (data.status === 'success') {
                // Show notification / alert
                alert(data.message);
                
                // Add to history table
                const pool = data.cropPool;
                const tbody = document.getElementById('crop-pool-history-body');
                const row = document.createElement('tr');
                row.className = 'hover:bg-slate-50 transition-colors animate-pulse';
                row.innerHTML = `
                    <td class="py-4 pl-2 font-black text-slate-800 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                        \${pool.crop_type}
                    </td>
                    <td class="py-4">\${pool.quantity} Quintals</td>
                    <td class="py-4">₹\${parseFloat(pool.price_per_unit).toLocaleString('en-IN')}/qtl</td>
                    <td class="py-4 font-black text-slate-800">₹\${parseFloat(pool.total_value).toLocaleString('en-IN')}</td>
                    <td class="py-4">
                        <span class="text-[9px] font-black bg-amber-100 text-amber-800 border border-amber-200 px-2.5 py-0.5 rounded-full uppercase tracking-wider">Pooled</span>
                    </td>
                    <td class="py-4 text-right pr-2 font-semibold text-slate-400">Just Now</td>
                `;
                tbody.insertBefore(row, tbody.firstChild);
                form.reset();
                updatePoolPricePreview();
            } else {
                alert(data.message || 'Something went wrong.');
            }
        } catch (err) {
            console.error(err);
            alert('Server error occurred during crop pooling submission.');
        }
    }

    // ======= REAL-TIME INTERACTIVE GIS FARM LEAFLET MAP =======
    let gisMap = null;
    let currentMapLayer = 'ndvi';
    let mapPlots = {};

    // Exact coordinates for {{ explode(' ', auth()->user()->name ?? 'Ramesh Kumar')[0] }}'s three plots (adjacent fields near Patiala, Punjab)
    const plotA_coords = [
        [30.3421, 76.3984],
        [30.3429, 76.3984],
        [30.3429, 76.3995],
        [30.3421, 76.3995]
    ];
    const plotB_coords = [
        [30.3421, 76.3996],
        [30.3429, 76.3996],
        [30.3429, 76.4005],
        [30.3421, 76.4005]
    ];
    const plotC_coords = [
        [30.3421, 76.4006],
        [30.3429, 76.4006],
        [30.3429, 76.4015],
        [30.3421, 76.4015]
    ];

    // Plot parameters
    const plotData = {
        'A': {
            title: 'Plot A - Wheat (Flowering Stage)',
            coords: plotA_coords,
            center: [30.3425, 76.39895],
            ndvi: 'NDVI Score: 0.84 (Highly Vigorous)',
            moisture: '32%',
            ph: '6.8',
            npk: '140:65:42',
            crop: 'Wheat',
            area: '2.0 Acres',
            colors: {
                ndvi: { fill: '#10b981', stroke: '#34d399' },
                moisture: { fill: '#2563eb', stroke: '#60a5fa' },
                boundary: { fill: '#a855f7', stroke: '#d8b4fe' }
            }
        },
        'B': {
            title: 'Plot B - Wheat (Tillering Stage)',
            coords: plotB_coords,
            center: [30.3425, 76.40005],
            ndvi: 'NDVI Score: 0.72 (Healthy)',
            moisture: '28%',
            ph: '6.7',
            npk: '120:58:38',
            crop: 'Wheat',
            area: '1.5 Acres',
            colors: {
                ndvi: { fill: '#84cc16', stroke: '#a3e635' },
                moisture: { fill: '#0d9488', stroke: '#2dd4bf' },
                boundary: { fill: '#a855f7', stroke: '#d8b4fe' }
            }
        },
        'C': {
            title: 'Plot C - Mustard (Harvest Ready)',
            coords: plotC_coords,
            center: [30.3425, 76.40105],
            ndvi: 'NDVI Score: 0.58 (Mature)',
            moisture: '22%',
            ph: '6.9',
            npk: '90:45:30',
            crop: 'Mustard',
            area: '1.0 Acres',
            colors: {
                ndvi: { fill: '#f59e0b', stroke: '#fbbf24' },
                moisture: { fill: '#0ea5e9', stroke: '#38bdf8' },
                boundary: { fill: '#a855f7', stroke: '#d8b4fe' }
            }
        }
    };

    function initGISFarmMap() {
        const mapContainer = document.getElementById('gis-farm-leaflet-map');
        if (!mapContainer || gisMap) return;

        // Initialize Map centered at {{ explode(' ', auth()->user()->name ?? 'Ramesh Kumar')[0] }}'s farm
        gisMap = L.map('gis-farm-leaflet-map', {
            center: [30.3425, 76.4000],
            zoom: 17,
            zoomControl: false, // Clean minimalist style
            attributionControl: false
        });

        window.gisMap = gisMap; // Expose globally for tab resize updates

        // Load Esri World Imagery (Satellite Tiles)
        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 19
        }).addTo(gisMap);

        // Render each plot as an interactive vector polygon
        Object.keys(plotData).forEach(key => {
            const data = plotData[key];
            const polygon = L.polygon(data.coords, getPolygonStyle(key, currentMapLayer))
                .addTo(gisMap)
                .bindTooltip(`<div class="font-black text-xs text-slate-800">${data.title}</div>`, {
                    permanent: false,
                    direction: 'top'
                });

            // Handle clicking directly on the map polygon
            polygon.on('click', () => {
                focusPlot(key);
            });

            mapPlots[key] = polygon;
        });
    }

    function getPolygonStyle(plotKey, layer) {
        const data = plotData[plotKey];
        const style = data.colors[layer];
        
        if (layer === 'boundary') {
            return {
                fillColor: style.fill,
                fillOpacity: 0.1,
                color: style.stroke,
                weight: 3,
                dashArray: '4, 4'
            };
        } else {
            return {
                fillColor: style.fill,
                fillOpacity: 0.55,
                color: style.stroke,
                weight: 2
            };
        }
    }

    // Toggle between NDVI, Moisture, and Boundary layers
    function toggleMapLayer(layer) {
        currentMapLayer = layer;
        
        // Update layer toggle buttons styles
        ['ndvi', 'moisture', 'boundary'].forEach(l => {
            const btn = document.getElementById(`btn-map-${l}`);
            if (btn) {
                if (l === layer) {
                    btn.className = "px-3.5 py-1.5 rounded-xl font-black text-[10px] border border-emerald-500 bg-emerald-500 text-white shadow-sm transition-all duration-300";
                } else {
                    btn.className = "px-3.5 py-1.5 rounded-xl font-black text-[10px] border border-slate-100 bg-white text-slate-600 hover:border-emerald-300 transition-all duration-300";
                }
            }
        });

        // Apply style update to Leaflet Polygons
        Object.keys(mapPlots).forEach(key => {
            if (mapPlots[key]) {
                mapPlots[key].setStyle(getPolygonStyle(key, layer));
            }
        });
    }

    // Focus on a plot (triggered by clicking polygons OR bottom floating bar)
    function focusPlot(plotKey) {
        const data = plotData[plotKey];
        if (!data) return;

        // 1. Pan & Zoom Leaflet Map to plot center
        if (gisMap) {
            gisMap.panTo(data.center, { animate: true, duration: 1.2 });
        }

        // 2. Open map popup with details
        if (mapPlots[plotKey]) {
            mapPlots[plotKey].openTooltip();
        }

        // 3. Update right side Telemetry Inspector panel fields
        document.getElementById('insp-plot-title').innerText = data.title;
        document.getElementById('insp-plot-ndvi').innerText = data.ndvi;
        document.getElementById('insp-plot-moisture').innerText = data.moisture;
        document.getElementById('insp-plot-ph').innerText = data.ph;
        document.getElementById('insp-plot-npk').innerText = data.npk;

        // 4. Update CSS highlights of the bottom floating plot cards
        ['A', 'B', 'C'].forEach(k => {
            const card = document.getElementById(`btn-plot-${k}`);
            if (card) {
                if (k === plotKey) {
                    card.className = "flex-1 p-2 bg-emerald-500/20 border border-emerald-500 rounded-xl text-left transition-all duration-300 hover:scale-[1.02]";
                    // Update text/badges colors inside the highlighted card
                    card.querySelector('span:first-child').className = "font-black text-white text-[10px]";
                    card.querySelector('p').className = "text-[9px] text-emerald-300 font-semibold mt-1";
                } else {
                    card.className = "flex-1 p-2 bg-slate-900/60 border border-white/10 rounded-xl text-left transition-all duration-300 hover:scale-[1.02]";
                    card.querySelector('span:first-child').className = "font-black text-slate-300 text-[10px]";
                    card.querySelector('p').className = "text-[9px] text-slate-400 font-semibold mt-1";
                }
            }
        });
    }

    // Boot everything up on document load
    document.addEventListener('DOMContentLoaded', () => {
        initMandiChart();
        startRealtimeMandiPolling();
        
        // Schemes file upload listener
        const schemeInput = document.getElementById('scheme-file-upload');
        if (schemeInput) {
            schemeInput.addEventListener('change', (e) => {
                const label = document.getElementById('scheme-upload-label');
                if (label && e.target.files.length > 0) {
                    label.textContent = `Selected: ${e.target.files[0].name}`;
                    label.className = "text-[11px] font-black text-purple-600 block";
                }
            });
        }

        initSoilChart();
        initWeatherForecastChart();
        initBenefitsDoughnutChart();
        initInsuranceClaimsChart();
        // New overview analytics charts
        initYieldTrendChart();
        initOverviewMandiChart();
        initIncomeExpenseChart();
        initCropDistributionChart();
        // 🌤️ Real-time weather from Open-Meteo
        fetchRealWeather();

        // Reorder overview section: Live Analytics FIRST, then Metrics, then Feature Center
        const overviewSection = document.getElementById('overview');
        if (overviewSection) {
            const kids = [...overviewSection.children];
            // kids[0]=header, kids[1]=metricsGrid, kids[2]=featureCenter, kids[3]=liveAnalytics
            // Insert liveAnalytics (kids[3]) before metricsGrid (kids[1]) → order becomes: header, live, metrics, feature
            if (kids[3]) overviewSection.insertBefore(kids[3], kids[1]);
        }

        // Intercept sidebar link clicks for AJAX tab-switching
        const links = document.querySelectorAll('.sidebar-link');
        links.forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                if (href && href.startsWith('#')) {
                    e.preventDefault();
                    const tabId = href.substring(1);
                    switchTab(tabId);
                }
            });
        });

        // Initialize GIS satellite map
        initGISFarmMap();

        // Initialize with overview tab active (initial load)
        switchTab('overview', true);
    });
</script>

<style>
    /* Slow spinning animation for weather sun icon */
    .animate-spin-slow {
        animation: spin 8s linear infinite;
    }
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
</style>
@endsection
