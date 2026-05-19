@extends('layouts.app')

@section('content')
<div class="bg-[#fcfdfb] min-h-screen w-full text-slate-800 antialiased flex flex-col relative overflow-x-hidden">
    
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
    
    <!-- Main Dashboard Container -->
    <div class="flex-1 w-full flex flex-col relative z-10">
        
        <!-- Top Navbar -->
        <nav class="sticky top-0 z-30 bg-white/90 backdrop-blur-xl border-b border-slate-100 px-6 py-4 flex flex-wrap items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <div>
                    <h1 class="text-xl md:text-2xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                        Welcome Back, {{ explode(' ', Auth::user()->name)[0] }} 👋
                    </h1>
                    <p class="text-xs font-semibold text-slate-500">Kalyan Village, Patiala District, Punjab</p>
                </div>
            </div>

            <!-- Navbar Actions -->
            <div class="flex items-center gap-4 mt-4 sm:mt-0">
                
                <!-- Weather Widget Quick Pill -->
                <div class="hidden md:flex items-center gap-2.5 px-4 py-2 bg-gradient-to-r from-emerald-500/10 to-teal-500/10 border border-emerald-100 rounded-full text-xs font-bold text-emerald-800">
                    <svg class="w-5 h-5 text-emerald-600 animate-spin-slow" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464-5.636a1 1 0 010 1.414l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-5.464 4.036a1 1 0 010 1.414l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 0zM7 10a1 1 0 00-1-1H5a1 1 0 100 2h1a1 1 0 001-1zM5.05 6.464a1 1 0 10-1.414 1.414l.707.707a1 1 0 001.414-1.414l-.707-.707zm1.414 8.486a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707z" clip-rule="evenodd"></path></svg>
                    <span>32°C • Light Drizzle Advisory</span>
                </div>

                <!-- Notifications -->
                <div class="relative hidden sm:block">
                    <button class="p-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 text-slate-600 border border-slate-100 transition-colors">
                        <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-1 right-1 flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                        </span>
                    </button>
                </div>

                <!-- User Profile -->
                <div class="flex items-center gap-3 border-l border-slate-100 pl-4">
                    <div class="w-10 h-10 rounded-full border-2 border-emerald-500 p-[2px]">
                        <div class="w-full h-full rounded-full bg-slate-100 flex items-center justify-center font-black text-emerald-600 text-lg">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    </div>
                    <div class="text-left">
                        <h4 class="text-xs font-black text-slate-800 leading-none">{{ Auth::user()->name }}</h4>
                        <span class="text-[9px] font-black text-purple-600 uppercase tracking-widest leading-none">{{ Auth::user()->role }}</span>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-8 xl:px-32 w-full max-w-[1600px] mx-auto">
            
            <div class="bg-white/90 backdrop-blur-xl border border-slate-100/60 shadow-xl rounded-[2.5rem] p-6 md:p-10 hover:shadow-2xl transition-shadow duration-300 w-full mt-4">
                <div class="flex flex-col xl:flex-row items-center gap-10">
                    
                    <!-- Left Profile Column -->
                    <div class="flex flex-col items-center text-center xl:border-r xl:border-slate-100 xl:pr-10 flex-shrink-0 w-full xl:w-80">
                        <div class="relative w-36 h-36 rounded-[2.5rem] bg-gradient-to-tr from-emerald-500 to-purple-600 p-[3px] shadow-lg mb-5 overflow-hidden">
                            <div class="w-full h-full rounded-[2.3rem] bg-emerald-50 flex items-center justify-center font-black text-emerald-700 text-5xl">
                                {{ substr(explode(' ', Auth::user()->name)[0], 0, 1) }}{{ isset(explode(' ', Auth::user()->name)[1]) ? substr(explode(' ', Auth::user()->name)[1], 0, 1) : '' }}
                            </div>
                            <!-- Verified badge -->
                            <span class="absolute bottom-2 right-2 bg-emerald-600 text-white rounded-full p-1.5 border-2 border-white flex items-center justify-center shadow-md">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </span>
                        </div>
                        <h3 class="text-2xl font-black text-slate-900 tracking-tight">{{ Auth::user()->name }}</h3>
                        <span class="text-xs bg-slate-100 px-4 py-1.5 rounded-full font-bold text-slate-500 mt-2 block">Aadhaar: ****-****-8921</span>
                        
                        <div class="mt-6 flex flex-wrap gap-2 justify-center">
                            <span class="text-[10px] px-3 py-1.5 bg-purple-50 border border-purple-100 text-purple-700 font-bold rounded-full">FPO Kalyan Collective</span>
                            <span class="text-[10px] px-3 py-1.5 bg-emerald-50 border border-emerald-100 text-emerald-700 font-bold rounded-full">PACS Affiliated</span>
                        </div>
                    </div>

                    <!-- Right Stats Grid -->
                    <div class="flex-1 w-full space-y-6">
                        <div>
                            <h2 class="text-xl md:text-2xl font-black text-slate-900 tracking-tight flex items-center gap-2">
                                <span class="h-7 w-2.5 bg-purple-500 rounded-full inline-block"></span>
                                {{ ucfirst(Auth::user()->role) }} Digital Profile
                            </h2>
                            <p class="text-xs md:text-sm font-semibold text-slate-400 mt-1">Verified details on national registry system</p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                            <div class="p-5 bg-slate-50/80 rounded-3xl border border-slate-100 transition-colors hover:bg-slate-50">
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Land Information</span>
                                <p class="text-lg font-black text-slate-800 mt-1">4.5 Acres</p>
                                <span class="text-[10px] font-bold text-slate-400 block mt-0.5">Cultivable Area</span>
                            </div>
                            <div class="p-5 bg-slate-50/80 rounded-3xl border border-slate-100 transition-colors hover:bg-slate-50">
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Soil Profile</span>
                                <p class="text-lg font-black text-slate-800 mt-1">Clayey Loam</p>
                                <span class="text-[10px] font-bold text-slate-400 block mt-0.5">pH 6.8 Optimal</span>
                            </div>
                            <div class="p-5 bg-slate-50/80 rounded-3xl border border-slate-100 transition-colors hover:bg-slate-50">
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Irrigation Type</span>
                                <p class="text-lg font-black text-slate-800 mt-1">Drip Irrigation</p>
                                <span class="text-[10px] font-bold text-slate-400 block mt-0.5">Smart Automated</span>
                            </div>
                            <div class="p-5 bg-slate-50/80 rounded-3xl border border-slate-100 transition-colors hover:bg-slate-50">
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Primary Cultivation</span>
                                <p class="text-lg font-black text-slate-800 mt-1">Wheat & Mustard</p>
                                <span class="text-[10px] font-bold text-slate-400 block mt-0.5">Kharif / Rabi double crop</span>
                            </div>
                            <div class="p-5 bg-slate-50/80 rounded-3xl border border-slate-100 transition-colors hover:bg-slate-50">
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Livestock Holdings</span>
                                <p class="text-lg font-black text-slate-800 mt-1">3 Cows, 2 Buffaloes</p>
                                <span class="text-[10px] font-bold text-slate-400 block mt-0.5">Dairy coop supplier</span>
                            </div>
                            <div class="p-5 bg-gradient-to-br from-emerald-500/5 to-purple-500/5 rounded-3xl border border-emerald-100/50">
                                <span class="text-[10px] font-black text-slate-400 uppercase tracking-wider">Health Rating</span>
                                <p class="text-lg font-black text-emerald-700 mt-1">82/100 (Grade A)</p>
                                <span class="text-[10px] font-bold text-slate-500 block mt-0.5">Eligible for premier credits</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sign Out Button -->
            <div class="mt-12 flex justify-center">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-white/80 border border-red-100 text-red-500 px-8 py-3 rounded-2xl font-black hover:bg-red-50 hover:text-red-600 transition-all uppercase tracking-widest text-xs shadow-sm">
                        Sign Out
                    </button>
                </form>
            </div>
            
        </main>
    </div>

    <!-- Floating Chat Button -->
    <button class="fixed bottom-6 right-6 w-14 h-14 bg-gradient-to-tr from-emerald-400 to-purple-500 rounded-full shadow-lg shadow-purple-500/30 flex items-center justify-center text-white hover:scale-105 transition-transform z-50">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
        <span class="absolute -top-1 -right-1 bg-purple-600 text-white text-[9px] font-black w-5 h-5 rounded-full flex items-center justify-center border-2 border-white">1</span>
    </button>
</div>
@endsection
