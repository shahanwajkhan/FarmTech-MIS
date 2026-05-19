@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="home" class="relative bg-white overflow-hidden pt-20 pb-32">
    <!-- Grid Pattern Background -->
    <div class="absolute inset-0 z-0 opacity-5">
        <svg class="h-full w-full" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="plus-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 20 0 L 20 40 M 0 20 L 40 20" fill="none" stroke="currentColor" stroke-width="0.5" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#plus-grid)" />
        </svg>
    </div>

    <!-- Soft Blur Circles -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-green-200 rounded-full blur-3xl opacity-30 z-0"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-purple-200 rounded-full blur-3xl opacity-30 z-0"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <!-- Left Side Content -->
            <div class="lg:w-1/2 space-y-8">
                <div class="inline-block px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-bold tracking-wide uppercase">
                    Digital Agriculture Revolution
                </div>
                <h2 class="text-5xl md:text-7xl font-bold leading-tight text-gray-900">
                    Empowering Farmers Through <span class="gradient-text">Collective Strength</span>
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                    Empowering SHGs, FPOs, and farmers through digital beneficiary tracking, agricultural value addition, and smart rural management solutions.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <a href="#benefits" class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-8 py-4 rounded-full font-bold shadow-xl hover:scale-105 transition-all flex items-center space-x-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        <span>Explore Benefits</span>
                    </a>
                    <a href="{{ route('register.farmer') }}" class="bg-gradient-to-r from-pink-500 to-rose-500 text-white px-8 py-4 rounded-full font-bold shadow-xl hover:scale-105 transition-all flex items-center space-x-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                        <span>Register Farmer</span>
                    </a>
                    <a href="#how-it-works" class="bg-gradient-to-r from-teal-500 to-emerald-500 text-white px-8 py-4 rounded-full font-bold shadow-xl hover:scale-105 transition-all flex items-center space-x-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>How It Works</span>
                    </a>
                </div>

                <div class="flex items-center space-x-8 pt-8 border-t border-gray-100">
                    <div>
                        <p class="text-3xl font-bold text-gray-900">12M+</p>
                        <p class="text-sm text-gray-500 uppercase tracking-widest">Active Farmers</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-gray-900">45K+</p>
                        <p class="text-sm text-gray-500 uppercase tracking-widest">SHG Groups</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-gray-900">₹890Cr</p>
                        <p class="text-sm text-gray-500 uppercase tracking-widest">Disbursed</p>
                    </div>
                </div>
            </div>

            <!-- Right Side Image Card -->
            <div class="lg:w-1/2 relative">
                <div class="relative z-10 bg-white p-4 rounded-[2rem] shadow-2xl border border-gray-100 transform hover:-rotate-2 transition-transform duration-500">
                    <div class="absolute top-6 left-6 bg-white/90 backdrop-blur px-4 py-2 rounded-xl shadow-lg z-20">
                        <p class="text-xs font-bold text-purple-600 uppercase tracking-widest">Self-Help Groups</p>
                    </div>
                    <img src="{{ asset('images/hero.png') }}" alt="Farmers Group" class="rounded-[1.5rem] w-full h-[500px] object-cover">
                </div>
                <!-- Floating Elements -->
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-pink-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
            </div>
        </div>
    </div>
</section>

<!-- SHG Gradient Banner -->
<section class="container mx-auto px-4 -mt-16 relative z-30">
    <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-orange-500 rounded-[2rem] p-8 md:p-12 shadow-2xl flex flex-col md:flex-row items-center justify-between text-white overflow-hidden relative">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
        <div class="relative z-10 space-y-2 text-center md:text-left">
            <h3 class="text-3xl md:text-4xl font-bold">Women's Self-Help Groups</h3>
            <p class="text-lg opacity-90">Join the collective movement of economic empowerment and rural leadership.</p>
        </div>
        <a href="#" class="mt-6 md:mt-0 relative z-10 bg-white text-purple-600 px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition-all shadow-xl hover:scale-105">
            Register SHG
        </a>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-32 bg-[#fcfdfb]" x-data="{ activeFeature: null }">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-20 space-y-4">
            <h2 class="text-4xl font-bold text-gray-900">Modern Digital Infrastructure</h2>
            <p class="text-gray-600 text-lg">Integrated tools designed specifically for the unique needs of the agricultural value chain. Click a card to read full details.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature Card 1 -->
            <div @click="activeFeature = 1" class="bg-white p-8 rounded-[2.5rem] shadow-xl hover:-translate-y-2 transition-all border border-gray-50 hover:border-green-200 cursor-pointer group">
                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-teal-500 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg group-hover:rotate-6 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-4 group-hover:text-green-600 transition-colors">Farmer Registration</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">Unified digital identity for every farmer to access direct government benefits.</p>
                <span class="text-xs font-bold text-green-600 hover:underline">Read Feature Details →</span>
            </div>

            <!-- Feature Card 2 -->
            <div @click="activeFeature = 2" class="bg-white p-8 rounded-[2.5rem] shadow-xl hover:-translate-y-2 transition-all border border-gray-50 hover:border-purple-200 cursor-pointer group">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-400 to-indigo-500 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg group-hover:rotate-6 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-4 group-hover:text-purple-600 transition-colors">Scheme Tracking</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">Real-time monitoring of application status and subsidy disbursements.</p>
                <span class="text-xs font-bold text-purple-600 hover:underline">Read Feature Details →</span>
            </div>

            <!-- Feature Card 3 -->
            <div @click="activeFeature = 3" class="bg-white p-8 rounded-[2.5rem] shadow-xl hover:-translate-y-2 transition-all border border-gray-50 hover:border-orange-200 cursor-pointer group">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-400 to-red-500 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg group-hover:rotate-6 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-4 group-hover:text-orange-600 transition-colors">SHG/FPO Management</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">Complete administrative suite for managing collective groups and assets.</p>
                <span class="text-xs font-bold text-orange-600 hover:underline">Read Feature Details →</span>
            </div>

            <!-- Feature Card 4 -->
            <div @click="activeFeature = 4" class="bg-white p-8 rounded-[2.5rem] shadow-xl hover:-translate-y-2 transition-all border border-gray-50 hover:border-blue-200 cursor-pointer group">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-cyan-500 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg group-hover:rotate-6 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold mb-4 group-hover:text-blue-600 transition-colors">Smart Analytics</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">Data-driven insights to optimize crop cycles and market timing.</p>
                <span class="text-xs font-bold text-blue-600 hover:underline">Read Feature Details →</span>
            </div>
        </div>

        <!-- Pop-up Modal Details Overlay -->
        <template x-if="activeFeature !== null">
            <div class="fixed inset-0 z-[99999] flex items-center justify-center p-4 bg-black/60 backdrop-blur-md" @click.self="activeFeature = null">
                <div class="bg-white rounded-[2.5rem] max-w-xl w-full p-8 md:p-10 relative shadow-2xl border border-gray-100 animate-scale-up" x-transition>
                    <button @click="activeFeature = null" class="absolute top-6 right-6 w-8 h-8 bg-gray-50 hover:bg-gray-100 text-gray-400 hover:text-gray-700 rounded-full flex items-center justify-center shadow-inner transition-all font-bold text-sm">✕</button>
                    
                    <div x-show="activeFeature === 1" class="space-y-4">
                        <div class="w-12 h-12 bg-green-50 rounded-2xl flex items-center justify-center text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <h4 class="text-2xl font-black text-gray-900">Farmer Registration Infrastructure</h4>
                        <p class="text-gray-600 font-medium text-sm leading-relaxed">
                            Every registered farmer receives a unique digital portfolio in our MongoDB backend. This profile tracks their active cultivation land, bank details, and soil cards. It enables direct, transparent benefit payouts and fertilizer subsidy deliveries without middlemen intervention.
                        </p>
                    </div>

                    <div x-show="activeFeature === 2" class="space-y-4">
                        <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center text-purple-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h4 class="text-2xl font-black text-gray-900">Real-Time Scheme Tracking</h4>
                        <p class="text-gray-600 font-medium text-sm leading-relaxed">
                            Farmers can track government schemes like PM-KISAN Nidhi and Fasal Bima Yojana live. The tracking engine displays application status from registration to document validation, field verification, and bank disbursement status.
                        </p>
                    </div>

                    <div x-show="activeFeature === 3" class="space-y-4">
                        <div class="w-12 h-12 bg-orange-50 rounded-2xl flex items-center justify-center text-orange-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <h4 class="text-2xl font-black text-gray-900">Cooperative Group Management</h4>
                        <p class="text-gray-600 font-medium text-sm leading-relaxed">
                            Empowers Self-Help Groups (SHGs) and Farmer Producer Organizations (FPOs) with digital offices. Group leads can track member rosters, register monthly community savings, secure low-interest bank loans, and manage shared tractors/implements transparently.
                        </p>
                    </div>

                    <div x-show="activeFeature === 4" class="space-y-4">
                        <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <h4 class="text-2xl font-black text-gray-900">AI Crop & Market Analytics</h4>
                        <p class="text-gray-600 font-medium text-sm leading-relaxed">
                            Integrates regional mandi crop pricing from national trade boards. Recommends FPOs and farmers on the ideal times to harvest, aggregate, and wholesale agricultural products, optimizing seasonal profit margins.
                        </p>
                    </div>
                </div>
            </div>
        </template>
    </div>
</section>

<!-- Analytics Section -->
<section id="services" class="py-24 bg-green-50 relative overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2 space-y-6">
                <h2 class="text-4xl font-bold text-gray-900">Real-time Performance Monitoring</h2>
                <p class="text-gray-600 text-lg">Our dashboard provides a 360-degree view of rural development initiatives, enabling faster decision-making for government officials and group leaders.</p>
                <ul class="space-y-4">
                    <li class="flex items-center space-x-3 text-gray-700">
                        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span>Automated Report Generation</span>
                    </li>
                    <li class="flex items-center space-x-3 text-gray-700">
                        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span>Geospatial Farmer Mapping</span>
                    </li>
                    <li class="flex items-center space-x-3 text-gray-700">
                        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <span>Inventory & Stock Indicators</span>
                    </li>
                </ul>
            </div>
            
            <div class="lg:w-1/2 grid grid-cols-2 gap-6">
                <div class="bg-white/60 backdrop-blur-xl p-6 rounded-3xl shadow-xl border border-white/50">
                    <p class="text-sm font-bold text-gray-500 uppercase">Farmer Growth</p>
                    <div class="mt-4 h-24 flex items-end space-x-1">
                        <div class="w-full bg-green-200 h-1/2 rounded-t-lg"></div>
                        <div class="w-full bg-green-300 h-2/3 rounded-t-lg"></div>
                        <div class="w-full bg-green-400 h-3/4 rounded-t-lg"></div>
                        <div class="w-full bg-green-500 h-full rounded-t-lg"></div>
                    </div>
                    <p class="mt-4 text-2xl font-bold">+24%</p>
                </div>
                <div class="bg-white/60 backdrop-blur-xl p-6 rounded-3xl shadow-xl border border-white/50 translate-y-6">
                    <p class="text-sm font-bold text-gray-500 uppercase">Scheme Approval</p>
                    <div class="mt-4 flex items-center justify-center">
                        <div class="w-20 h-20 border-8 border-purple-500 border-t-transparent rounded-full flex items-center justify-center">
                            <span class="text-xl font-bold">88%</span>
                        </div>
                    </div>
                    <p class="mt-4 text-center text-xs text-gray-500">Target Reached</p>
                </div>
                <div class="bg-white/60 backdrop-blur-xl p-6 rounded-3xl shadow-xl border border-white/50">
                    <p class="text-sm font-bold text-gray-500 uppercase">Product Sales</p>
                    <p class="mt-4 text-3xl font-bold">₹1.2Cr</p>
                    <p class="text-xs text-green-600 font-bold">↑ 12.5% vs last month</p>
                </div>
                <div class="bg-white/60 backdrop-blur-xl p-6 rounded-3xl shadow-xl border border-white/50 translate-y-6">
                    <p class="text-sm font-bold text-gray-500 uppercase">SHG Participation</p>
                    <div class="mt-4 flex -space-x-2">
                        <div class="w-8 h-8 rounded-full bg-gray-300 border-2 border-white"></div>
                        <div class="w-8 h-8 rounded-full bg-gray-400 border-2 border-white"></div>
                        <div class="w-8 h-8 rounded-full bg-gray-500 border-2 border-white"></div>
                        <div class="w-8 h-8 rounded-full bg-green-600 border-2 border-white flex items-center justify-center text-[10px] text-white">+12</div>
                    </div>
                    <p class="mt-4 text-xs text-gray-500">Active members joining</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section id="benefits" class="py-24 bg-white relative overflow-hidden border-t border-gray-100">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="inline-block px-4 py-1 bg-purple-50 text-purple-600 rounded-full text-xs font-bold tracking-wide uppercase">Core Platform Benefits</span>
            <h2 class="text-4xl font-black text-gray-900 tracking-tight">Tailored Value for Every Stakeholder</h2>
            <p class="text-gray-600 text-lg">Unlocking economic resilience, credit linkage, and collaborative productivity for individual farmers and groups alike.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Benefit 1: Farmers -->
            <div class="bg-gradient-to-br from-rose-50/50 to-pink-50/20 p-6 md:p-8 rounded-[2.5rem] border border-rose-100/50 hover:shadow-xl transition-all duration-300 relative group flex flex-col justify-between">
                <div>
                    <!-- Premium Styled Image Cover Wrapper with Floating Badge -->
                    <div class="relative mb-6" style="width: 100%; height: 180px; border-radius: 1.8rem; overflow: hidden; box-shadow: 0 8px 24px rgba(244,63,94,0.06); border: 1px solid rgba(244,63,94,0.1);">
                        <img src="https://images.unsplash.com/photo-1595974482597-4b8da8879bc5?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="Farmers" 
                             style="width: 100%; height: 100%; object-fit: cover;"
                             class="group-hover:scale-105 transition-transform duration-500">
                        
                        <!-- Floating Vector Icon Badge -->
                        <div class="absolute bottom-3 right-3 w-10 h-10 bg-rose-500 rounded-xl flex items-center justify-center text-white"
                             style="box-shadow: 0 4px 12px rgba(244,63,94,0.4);">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                    </div>

                    <h3 class="text-2xl font-black text-gray-900 mb-4">For Farmers</h3>
                    <ul class="space-y-3 text-gray-600 font-medium text-sm">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            <span>Direct welfare scheme deposits without administrative delays.</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            <span>Secure soil health mapping and digital land record linkage.</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-rose-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            <span>Real-time weather reports and local wholesale crop rates.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Benefit 2: SHGs -->
            <div class="bg-gradient-to-br from-purple-50/50 to-indigo-50/20 p-6 md:p-8 rounded-[2.5rem] border border-purple-100/50 hover:shadow-xl transition-all duration-300 relative group flex flex-col justify-between">
                <div>
                    <!-- Premium Styled Image Cover Wrapper with Floating Badge -->
                    <div class="relative mb-6" style="width: 100%; height: 180px; border-radius: 1.8rem; overflow: hidden; box-shadow: 0 8px 24px rgba(168,85,247,0.06); border: 1px solid rgba(168,85,247,0.1);">
                        <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="Self-Help Groups" 
                             style="width: 100%; height: 100%; object-fit: cover;"
                             class="group-hover:scale-105 transition-transform duration-500">
                        
                        <!-- Floating Vector Icon Badge -->
                        <div class="absolute bottom-3 right-3 w-10 h-10 bg-purple-500 rounded-xl flex items-center justify-center text-white"
                             style="box-shadow: 0 4px 12px rgba(168,85,247,0.4);">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                    </div>

                    <h3 class="text-2xl font-black text-gray-900 mb-4">For Self-Help Groups</h3>
                    <ul class="space-y-3 text-gray-600 font-medium text-sm">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-purple-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            <span>Complete digital logging of manual ledger savings and meetings.</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-purple-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            <span>Automated institutional credit score creation based on logs.</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-purple-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            <span>Instant digital bank linkages for fast, low-interest credit.</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Benefit 3: FPOs -->
            <div class="bg-gradient-to-br from-emerald-50/50 to-teal-50/20 p-6 md:p-8 rounded-[2.5rem] border border-emerald-100/50 hover:shadow-xl transition-all duration-300 relative group flex flex-col justify-between">
                <div>
                    <!-- Premium Styled Image Cover Wrapper with Floating Badge -->
                    <div class="relative mb-6" style="width: 100%; height: 180px; border-radius: 1.8rem; overflow: hidden; box-shadow: 0 8px 24px rgba(16,185,129,0.06); border: 1px solid rgba(16,185,129,0.1);">
                        <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                             alt="FPOs" 
                             style="width: 100%; height: 100%; object-fit: cover;"
                             class="group-hover:scale-105 transition-transform duration-500">
                        
                        <!-- Floating Vector Icon Badge -->
                        <div class="absolute bottom-3 right-3 w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center text-white"
                             style="box-shadow: 0 4px 12px rgba(16,185,129,0.4);">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    </div>

                    <h3 class="text-2xl font-black text-gray-900 mb-4">For FPOs</h3>
                    <ul class="space-y-3 text-gray-600 font-medium text-sm">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            <span>Consolidated procurement tools for large seed/fertilizer orders.</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            <span>Shared equipment scheduling to rent heavy tractors & drills.</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                            <span>Direct integration with state markets for wholesale trade aggregation.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section id="how-it-works" class="py-24 bg-[#fcfdfb] border-t border-b border-gray-100 relative overflow-hidden">
    <!-- Soft Glow Backdrops -->
    <div class="absolute top-1/4 left-0 -translate-x-1/2 w-96 h-96 bg-rose-200/20 rounded-full blur-3xl opacity-60 z-0"></div>
    <div class="absolute bottom-1/4 right-0 translate-x-1/2 w-96 h-96 bg-emerald-200/20 rounded-full blur-3xl opacity-60 z-0"></div>
    
    <div class="container mx-auto px-4 max-w-6xl relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-20 space-y-4">
            <span class="inline-block px-4 py-1 bg-emerald-50 text-emerald-600 rounded-full text-xs font-bold tracking-wide uppercase">Simple Onboarding Process</span>
            <h2 class="text-4xl font-black text-gray-900 tracking-tight">How FarmTech Empowers You</h2>
            <p class="text-gray-600 text-lg">Three streamlined steps to transition your rural enterprise into a modern digital powerhouse.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
            <!-- Connecting Line for wide screens -->
            <div class="hidden md:block absolute top-[120px] left-[15%] right-[15%] h-0.5 bg-gradient-to-r from-rose-200 via-purple-200 to-emerald-200 z-0"></div>

            <!-- Step 1 -->
            <div class="relative z-10 bg-white p-8 md:p-10 rounded-[2.5rem] border border-gray-100 hover:border-rose-200 shadow-md hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 text-center space-y-6 group flex flex-col items-center justify-between">
                <!-- Step Indicator Tag -->
                <div class="absolute top-4 left-6 px-3 py-1 rounded-full text-xs font-bold" style="background-color: #fef2f2; color: #f43f5e;">
                    Step 01
                </div>

                <div class="space-y-6 flex flex-col items-center pt-4">
                    <!-- Immune-to-Purging SVG Icon Badge -->
                    <div class="w-16 h-16 rounded-full flex items-center justify-center transition-all duration-300 group-hover:scale-110"
                         style="background-color: #f43f5e; color: #ffffff; box-shadow: 0 8px 20px rgba(244,63,94,0.3);">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M20 8v6M23 11h-6"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 tracking-tight">Create Secured Profile</h3>
                    <p class="text-gray-500 text-sm font-medium leading-relaxed">
                        Complete a rapid registration form as a Farmer, SHG group leader, or FPO executive to generate your unique, encrypted FarmTech Digital ID profile.
                    </p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative z-10 bg-white p-8 md:p-10 rounded-[2.5rem] border border-gray-100 hover:border-purple-200 shadow-md hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 text-center space-y-6 group flex flex-col items-center justify-between">
                <!-- Step Indicator Tag -->
                <div class="absolute top-4 left-6 px-3 py-1 rounded-full text-xs font-bold" style="background-color: #faf5ff; color: #a855f7;">
                    Step 02
                </div>

                <div class="space-y-6 flex flex-col items-center pt-4">
                    <!-- Immune-to-Purging SVG Icon Badge -->
                    <div class="w-16 h-16 rounded-full flex items-center justify-center transition-all duration-300 group-hover:scale-110"
                         style="background-color: #a855f7; color: #ffffff; box-shadow: 0 8px 20px rgba(168,85,247,0.3);">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"></path><path d="M16 16h5v5"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 tracking-tight">Synchronize Data</h3>
                    <p class="text-gray-500 text-sm font-medium leading-relaxed">
                        Easily input your group's manual ledger books, harvest inventory, or bulk wholesale requests directly into our high-speed MongoDB platform database.
                    </p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative z-10 bg-white p-8 md:p-10 rounded-[2.5rem] border border-gray-100 hover:border-emerald-200 shadow-md hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 text-center space-y-6 group flex flex-col items-center justify-between">
                <!-- Step Indicator Tag -->
                <div class="absolute top-4 left-6 px-3 py-1 rounded-full text-xs font-bold" style="background-color: #ecfdf5; color: #10b981;">
                    Step 03
                </div>

                <div class="space-y-6 flex flex-col items-center pt-4">
                    <!-- Immune-to-Purging SVG Icon Badge -->
                    <div class="w-16 h-16 rounded-full flex items-center justify-center transition-all duration-300 group-hover:scale-110"
                         style="background-color: #10b981; color: #ffffff; box-shadow: 0 8px 20px rgba(16,185,129,0.3);">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 tracking-tight">Unlock Opportunities</h3>
                    <p class="text-gray-500 text-sm font-medium leading-relaxed">
                        Instantly qualify for direct government subsidies, register monthly savings logs for fast banking credit links, and access local shared tractor leasing.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Government Schemes Section -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-12">
            <div>
                <h2 class="text-4xl font-bold text-gray-900">Government Schemes</h2>
                <p class="text-gray-600 mt-2">Active financial assistance and support programs for farmers.</p>
            </div>
            <a href="#" class="text-purple-600 font-bold flex items-center space-x-2 hover:underline">
                <span>View All Schemes</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Scheme Card 1 -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-t-8 border-purple-600 hover:scale-105 transition-all">
                <div class="p-8">
                    <span class="bg-purple-100 text-purple-700 text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full">Financial Support</span>
                    <h3 class="text-2xl font-bold mt-4 mb-2">PM-KISAN Nidhi</h3>
                    <p class="text-gray-500 text-sm mb-6">Direct income support of ₹6,000 per year to all landholding farmer families.</p>
                    <div class="flex items-center justify-between text-sm font-bold border-t pt-6">
                        <span class="text-gray-400">Subsidy: 100%</span>
                        <a href="#" class="text-purple-600">Apply Now →</a>
                    </div>
                </div>
            </div>

            <!-- Scheme Card 2 -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-t-8 border-green-600 hover:scale-105 transition-all">
                <div class="p-8">
                    <span class="bg-green-100 text-green-700 text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full">Irrigation</span>
                    <h3 class="text-2xl font-bold mt-4 mb-2">PM Krishi Sinchayee</h3>
                    <p class="text-gray-500 text-sm mb-6">Focuses on creating sources of assured irrigation and protective irrigation.</p>
                    <div class="flex items-center justify-between text-sm font-bold border-t pt-6">
                        <span class="text-gray-400">Subsidy: Up to 90%</span>
                        <a href="#" class="text-green-600">Apply Now →</a>
                    </div>
                </div>
            </div>

            <!-- Scheme Card 3 -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border-t-8 border-orange-600 hover:scale-105 transition-all">
                <div class="p-8">
                    <span class="bg-orange-100 text-orange-700 text-[10px] font-bold uppercase tracking-widest px-3 py-1 rounded-full">Crop Insurance</span>
                    <h3 class="text-2xl font-bold mt-4 mb-2">Fasal Bima Yojana</h3>
                    <p class="text-gray-500 text-sm mb-6">Comprehensive risk cover against non-preventable natural risks.</p>
                    <div class="flex items-center justify-between text-sm font-bold border-t pt-6">
                        <span class="text-gray-400">Premium: 2%</span>
                        <a href="#" class="text-orange-600">Apply Now →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Value Addition Section -->
<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900">Value Added Products</h2>
            <p class="text-gray-600 mt-2">Elevating rural production through quality food processing and packaging.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg group">
                <div class="h-48 bg-gray-200 relative overflow-hidden">
                    <div class="absolute inset-0 bg-green-900/20 group-hover:bg-transparent transition-all"></div>
                    <img src="https://images.unsplash.com/photo-1590779033100-9f60a05a013d?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Honey" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h4 class="font-bold text-lg">Organic Wild Honey</h4>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-green-600 font-bold">₹450/kg</span>
                        <span class="text-xs text-gray-400">Stock: 450 Units</span>
                    </div>
                </div>
            </div>
            <!-- More product cards -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg group">
                <div class="h-48 bg-gray-200 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1596733430284-f7437764b1a9?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Turmeric" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h4 class="font-bold text-lg">Lakadong Turmeric</h4>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-green-600 font-bold">₹280/kg</span>
                        <span class="text-xs text-gray-400">Stock: 1.2k Units</span>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg group">
                <div class="h-48 bg-gray-200 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1615485290382-441e4d049cb5?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Ghee" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h4 class="font-bold text-lg">Desi Cow Ghee</h4>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-green-600 font-bold">₹1,200/L</span>
                        <span class="text-xs text-gray-400">Stock: 80 Units</span>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg group">
                <div class="h-48 bg-gray-200 relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1523348837708-15d4a09cfac2?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&q=80" alt="Millet" class="w-full h-full object-cover">
                </div>
                <div class="p-6">
                    <h4 class="font-bold text-lg">Pearl Millet Flour</h4>
                    <div class="flex items-center justify-between mt-4">
                        <span class="text-green-600 font-bold">₹85/kg</span>
                        <span class="text-xs text-gray-400">Stock: 3k Units</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials & Contact Section -->
<section id="our-story" class="py-24 bg-white relative" x-data="{ activeStory: 'farmer', contactSubmitted: false }">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            
            <!-- Immersive Stories Tab Deck (7 Columns) -->
            <div class="lg:col-span-7 space-y-8">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Voices of Empowerment</h2>
                    <p class="text-gray-600 text-lg">Read detailed case studies detailing the life-changing impact of digital cooperative systems on smallholders, local micro-savings groups, and Farmer Producer Organizations.</p>
                </div>

                <!-- Tabs Navigation -->
                <div class="flex p-1.5 bg-gray-50 rounded-2xl gap-1">
                    <button @click="activeStory = 'farmer'" 
                            :class="activeStory === 'farmer' ? 'bg-emerald-600 text-white shadow-md' : 'text-gray-600 hover:bg-gray-100'"
                            class="flex-1 py-3 px-4 rounded-xl font-bold text-xs uppercase tracking-widest transition-all">
                        🌱 Farmers
                    </button>
                    <button @click="activeStory = 'shg'" 
                            :class="activeStory === 'shg' ? 'bg-purple-600 text-white shadow-md' : 'text-gray-600 hover:bg-gray-100'"
                            class="flex-1 py-3 px-4 rounded-xl font-bold text-xs uppercase tracking-widest transition-all">
                        👥 SHG Groups
                    </button>
                    <button @click="activeStory = 'fpo'" 
                            :class="activeStory === 'fpo' ? 'bg-blue-600 text-white shadow-md' : 'text-gray-600 hover:bg-gray-100'"
                            class="flex-1 py-3 px-4 rounded-xl font-bold text-xs uppercase tracking-widest transition-all">
                        🌾 FPO Groups
                    </button>
                </div>

                <!-- Story Display Area -->
                <div class="relative min-h-[340px]">
                    <!-- Farmer Story -->
                    <div x-show="activeStory === 'farmer'" x-transition class="bg-gradient-to-br from-emerald-50/50 to-teal-50/50 border border-emerald-100 rounded-[2.5rem] p-8 md:p-10 space-y-6 relative overflow-hidden animate-scale-up">
                        <div class="flex space-x-4">
                            <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold italic text-2xl shrink-0">"</div>
                            <div class="space-y-4">
                                <p class="text-gray-700 italic leading-relaxed text-base">
                                    "For three generations, my family farmed 3.5 acres of dryland cotton in Vidarbha, Maharashtra, relying entirely on high-interest loans from local village merchants to purchase seeds and fertilizers. At harvest, we had no choice but to sell our raw cotton back to those same agents at rock-bottom distress prices to pay off the debt."
                                </p>
                                <p class="text-gray-700 leading-relaxed text-sm">
                                    "Registering on FarmTech changed everything. I received a verified Digital Farmer ID linked directly to our land registry and bank account. Using the platform's group aggregate-sales forecast module, I connected with 45 neighboring smallholders. We aggregated our seasonal yields, stored them in a nearby cooperative warehouse during the peak mid-season glut, and direct-negotiated a high-volume supply contract with a national spinning mill. Bypassing the local middle-brokers boosted our net season profits by 42%!"
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 ml-16 pt-4 border-t border-emerald-100">
                            <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white font-bold text-sm shadow-md">RP</div>
                            <div>
                                <p class="font-bold text-gray-900">Ramesh Patil</p>
                                <p class="text-xs text-emerald-600 uppercase font-bold tracking-wider">Marginal Farmer, Vidarbha</p>
                            </div>
                        </div>
                    </div>

                    <!-- SHG Story -->
                    <div x-show="activeStory === 'shg'" x-transition class="bg-gradient-to-br from-purple-50/50 to-indigo-50/50 border border-purple-100 rounded-[2.5rem] p-8 md:p-10 space-y-6 relative overflow-hidden animate-scale-up">
                        <div class="flex space-x-4">
                            <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold italic text-2xl shrink-0">"</div>
                            <div class="space-y-4">
                                <p class="text-gray-700 italic leading-relaxed text-base">
                                    "Our Self-Help Group (SHG) started with 15 marginal women household heads collecting ₹50 per week in a simple metal box. Keeping manual books of savings was an administrative nightmare, and public banks refused to look at our paper records to verify our creditworthiness."
                                </p>
                                <p class="text-gray-700 leading-relaxed text-sm">
                                    "Once we registered our Jai Maa Durga SHG on the digital portal, we began logging all contributions, meeting attendance, and group micro-loans transparently. The system automatically built a perfect institutional credit rating. A public bank verified our complete digitized record in just 48 hours and disbursed a low-interest livelihood linkage loan. We purchased commercial grinding machinery, and today our branded spice processing center provides stable employment for over 50 local families!"
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 ml-16 pt-4 border-t border-purple-100">
                            <div class="w-10 h-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-bold text-sm shadow-md">SD</div>
                            <div>
                                <p class="font-bold text-gray-900">Sunita Devi</p>
                                <p class="text-xs text-purple-600 uppercase font-bold tracking-wider">Jai Maa Durga SHG Coordinator, Bihar</p>
                            </div>
                        </div>
                    </div>

                    <!-- FPO Story -->
                    <div x-show="activeStory === 'fpo'" x-transition class="bg-gradient-to-br from-blue-50/50 to-cyan-50/50 border border-blue-100 rounded-[2.5rem] p-8 md:p-10 space-y-6 relative overflow-hidden animate-scale-up">
                        <div class="flex space-x-4">
                            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold italic text-2xl shrink-0">"</div>
                            <div class="space-y-4">
                                <p class="text-gray-700 italic leading-relaxed text-base">
                                    "Operating as isolated, smallholder wheat and soybean farmers meant bulk fertilizers and high-yield seed varieties were always extremely expensive. Because each member sold small amounts individually, large food manufacturers refused to trade with us directly."
                                </p>
                                <p class="text-gray-700 leading-relaxed text-sm">
                                    "Through the digital FPO administration suite, we aggregated our agricultural input demands. By placing unified bulk orders, we cut seed and fertilizer prices by 28%. We also set up a digital equipment directory, booking community tractors and seed drills at 50% cheaper rates. By grading, storing, and marketing our wheat collectively, our 320 member farmers sold 150 metric tons directly to a national food corporation at a 35% premium!"
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 ml-16 pt-4 border-t border-blue-100">
                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold text-sm shadow-md">KP</div>
                            <div>
                                <p class="font-bold text-gray-900">Kisan Prosperity FPO</p>
                                <p class="text-xs text-blue-600 uppercase font-bold tracking-wider">Cooperative Union (320+ Members), Maharashtra</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Box (5 Columns) with perfect scroll-target anchor -->
            <div class="lg:col-span-5 bg-gradient-to-br from-green-600 to-teal-500 p-0.5 relative" style="border-radius: 2.8rem; overflow: hidden;">
                <!-- Anchor offset directly above the Contact Card for elegant scrolling focal point -->
                <div id="contact" class="absolute -top-32 left-0 w-full h-0 pointer-events-none"></div>

                <div class="bg-white space-y-6" style="padding: 2.5rem; border-radius: 2.6rem;">
                    <h3 class="text-2xl font-black text-gray-900 tracking-tight">Get In Touch</h3>
                    
                    <!-- Alert success state -->
                    <div x-show="contactSubmitted" class="p-5 bg-emerald-50 border border-emerald-100 text-emerald-800 rounded-2xl" x-transition>
                        <p class="font-bold text-sm">✓ Thank you for reaching out!</p>
                        <p class="text-xs text-emerald-600 mt-1">Our regional agricultural coordinators will contact your group shortly.</p>
                    </div>

                    <form @submit.prevent="contactSubmitted = true" x-show="!contactSubmitted" class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" required placeholder="Full Name" class="w-full px-6 py-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-green-500 text-sm font-bold text-gray-800">
                            <input type="email" required placeholder="Email Address" class="w-full px-6 py-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-green-500 text-sm font-bold text-gray-800">
                        </div>
                        <input type="text" required placeholder="Subject" class="w-full px-6 py-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-green-500 text-sm font-bold text-gray-800">
                        <textarea required placeholder="Message details..." rows="4" class="w-full px-6 py-4 bg-gray-50 rounded-2xl border-none focus:ring-2 focus:ring-green-500 text-sm font-bold text-gray-800"></textarea>
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-4 rounded-2xl font-bold shadow-lg transition-all text-sm tracking-wider uppercase">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Interactive FAQ Section -->
<section id="faq" class="py-24 bg-gray-50/50 border-t border-gray-100" x-data="{ activeFaq: null }">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="text-center space-y-4 mb-16">
            <h2 class="text-4xl font-black text-gray-900 tracking-tight">Frequently Asked Questions</h2>
            <p class="text-gray-600 text-lg">Have questions about FarmTech? Find clear, comprehensive answers about our digital infrastructure and cooperative tools below.</p>
        </div>

        <div class="space-y-6">
            <!-- FAQ Item 1 -->
            <div class="bg-white border transition-all duration-300 relative overflow-hidden" 
                 :class="activeFaq === 1 ? 'border-emerald-500 shadow-[0_15px_30px_rgba(16,185,129,0.08)]' : 'border-gray-200 hover:border-gray-300 hover:shadow-md'"
                 style="border-radius: 1.8rem;">
                
                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-emerald-500 transition-all duration-300" 
                     :class="activeFaq === 1 ? 'opacity-100' : 'opacity-0'"></div>

                <button @click="activeFaq = (activeFaq === 1 ? null : 1)" 
                        class="w-full px-6 py-5 md:px-8 md:py-6 text-left flex items-center justify-between focus:outline-none space-x-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center flex-shrink-0 transition-all duration-300 shadow-sm border border-black/5"
                             :style="activeFaq === 1 ? 'background-color: #10b981; color: #ffffff;' : 'background-color: #ecfdf5; color: #059669;'">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v-6h-2v6zm0-8h2V7h-2v2z"></path></svg>
                        </div>
                        <span class="font-black text-gray-900 text-base md:text-lg tracking-tight leading-snug">What is the FarmTech Digital ID and who is eligible?</span>
                    </div>
                    <span class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 flex-shrink-0 transition-transform duration-300" :class="activeFaq === 1 ? 'rotate-180 bg-emerald-50 text-emerald-600' : ''">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </button>
                <div x-show="activeFaq === 1" x-transition class="px-6 pb-6 md:px-8 md:pb-6 text-gray-600 text-sm md:text-base leading-relaxed pl-16 md:pl-24 pr-6 md:pr-12 pt-2">
                    The FarmTech Digital ID is a unique, secure, and unified digital identity created for individual farmers, Self-Help Groups (SHGs), and Farmer Producer Organizations (FPOs). Any active producer, marginal cultivator, or cooperative group in the region is fully eligible to register. It securely links your profiles to land records and bank details to enable direct welfare transfers and hassle-free cooperative wholesale trading.
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-white border transition-all duration-300 relative overflow-hidden" 
                 :class="activeFaq === 2 ? 'border-purple-500 shadow-[0_15px_30px_rgba(168,85,247,0.08)]' : 'border-gray-200 hover:border-gray-300 hover:shadow-md'"
                 style="border-radius: 1.8rem;">
                
                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-purple-500 transition-all duration-300" 
                     :class="activeFaq === 2 ? 'opacity-100' : 'opacity-0'"></div>

                <button @click="activeFaq = (activeFaq === 2 ? null : 2)" 
                        class="w-full px-6 py-5 md:px-8 md:py-6 text-left flex items-center justify-between focus:outline-none space-x-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center flex-shrink-0 transition-all duration-300 shadow-sm border border-black/5"
                             :style="activeFaq === 2 ? 'background-color: #a855f7; color: #ffffff;' : 'background-color: #f3e8ff; color: #7c3aed;'">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm14 10v-2a4 4 0 0 0-3-3.87m-4-12a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <span class="font-black text-gray-900 text-base md:text-lg tracking-tight leading-snug">How do Self-Help Groups (SHGs) benefit from the platform?</span>
                    </div>
                    <span class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 flex-shrink-0 transition-transform duration-300" :class="activeFaq === 2 ? 'rotate-180 bg-purple-50 text-purple-600' : ''">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </button>
                <div x-show="activeFaq === 2" x-transition class="px-6 pb-6 md:px-8 md:pb-6 text-gray-600 text-sm md:text-base leading-relaxed pl-16 md:pl-24 pr-6 md:pr-12 pt-2">
                    SHGs can completely digitize their manual ledger books, savings logs, meeting minutes, and member rosters. This transparent, secure digital record automatically builds a verified institutional credit rating. Public banks can instantly verify these digital records, slashing loan approval and disbursement times from weeks to less than 48 hours.
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-white border transition-all duration-300 relative overflow-hidden" 
                 :class="activeFaq === 3 ? 'border-amber-500 shadow-[0_15px_30px_rgba(245,158,11,0.08)]' : 'border-gray-200 hover:border-gray-300 hover:shadow-md'"
                 style="border-radius: 1.8rem;">
                
                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-amber-500 transition-all duration-300" 
                     :class="activeFaq === 3 ? 'opacity-100' : 'opacity-0'"></div>

                <button @click="activeFaq = (activeFaq === 3 ? null : 3)" 
                        class="w-full px-6 py-5 md:px-8 md:py-6 text-left flex items-center justify-between focus:outline-none space-x-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center flex-shrink-0 transition-all duration-300 shadow-sm border border-black/5"
                             :style="activeFaq === 3 ? 'background-color: #f59e0b; color: #ffffff;' : 'background-color: #fef3c7; color: #d97706;'">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                        </div>
                        <span class="font-black text-gray-900 text-base md:text-lg tracking-tight leading-snug">Can an FPO manage shared equipment and bulk procurement here?</span>
                    </div>
                    <span class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 flex-shrink-0 transition-transform duration-300" :class="activeFaq === 3 ? 'rotate-180 bg-amber-50 text-amber-600' : ''">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </button>
                <div x-show="activeFaq === 3" x-transition class="px-6 pb-6 md:px-8 md:pb-6 text-gray-600 text-sm md:text-base leading-relaxed pl-16 md:pl-24 pr-6 md:pr-12 pt-2">
                    Absolutely! FarmTech provides a dedicated administrative suite for FPOs to aggregate member procurement requests, allowing you to place massive bulk orders for high-yield seeds and bio-fertilizers at wholesale discounts up to 28%. Additionally, FPOs can publish a shared equipment directory to schedule and lease community tractors and seed drills, slashing operational rental costs by 50%.
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="bg-white border transition-all duration-300 relative overflow-hidden" 
                 :class="activeFaq === 4 ? 'border-blue-500 shadow-[0_15px_30px_rgba(59,130,246,0.08)]' : 'border-gray-200 hover:border-gray-300 hover:shadow-md'"
                 style="border-radius: 1.8rem;">
                
                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-blue-500 transition-all duration-300" 
                     :class="activeFaq === 4 ? 'opacity-100' : 'opacity-0'"></div>

                <button @click="activeFaq = (activeFaq === 4 ? null : 4)" 
                        class="w-full px-6 py-5 md:px-8 md:py-6 text-left flex items-center justify-between focus:outline-none space-x-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center flex-shrink-0 transition-all duration-300 shadow-sm border border-black/5"
                             :style="activeFaq === 4 ? 'background-color: #3b82f6; color: #ffffff;' : 'background-color: #dbeafe; color: #2563eb;'">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                        <span class="font-black text-gray-900 text-base md:text-lg tracking-tight leading-snug">How does the Scheme Tracking system operate?</span>
                    </div>
                    <span class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 flex-shrink-0 transition-transform duration-300" :class="activeFaq === 4 ? 'rotate-180 bg-blue-50 text-blue-600' : ''">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </button>
                <div x-show="activeFaq === 4" x-transition class="px-6 pb-6 md:px-8 md:pb-6 text-gray-600 text-sm md:text-base leading-relaxed pl-16 md:pl-24 pr-6 md:pr-12 pt-2">
                    Our automated Scheme Tracker acts as a bridge between farmers and national/state agricultural welfare initiatives. Once a member submits their application documents on the platform, our background systems monitor the validation status, administrative approvals, and bank remittance timelines in real-time, sending automated alerts at every stage of the process.
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="bg-white border transition-all duration-300 relative overflow-hidden" 
                 :class="activeFaq === 5 ? 'border-teal-500 shadow-[0_15px_30px_rgba(20,184,166,0.08)]' : 'border-gray-200 hover:border-gray-300 hover:shadow-md'"
                 style="border-radius: 1.8rem;">
                
                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-teal-500 transition-all duration-300" 
                     :class="activeFaq === 5 ? 'opacity-100' : 'opacity-0'"></div>

                <button @click="activeFaq = (activeFaq === 5 ? null : 5)" 
                        class="w-full px-6 py-5 md:px-8 md:py-6 text-left flex items-center justify-between focus:outline-none space-x-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center flex-shrink-0 transition-all duration-300 shadow-sm border border-black/5"
                             :style="activeFaq === 5 ? 'background-color: #14b8a6; color: #ffffff;' : 'background-color: #ccfbf1; color: #0d9488;'">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10zM9 11l2 2 4-4"></path></svg>
                        </div>
                        <span class="font-black text-gray-900 text-base md:text-lg tracking-tight leading-snug">Is there a fee to register or list our group in the directory?</span>
                    </div>
                    <span class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 flex-shrink-0 transition-transform duration-300" :class="activeFaq === 5 ? 'rotate-180 bg-teal-50 text-teal-600' : ''">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                </button>
                <div x-show="activeFaq === 5" x-transition class="px-6 pb-6 md:px-8 md:pb-6 text-gray-600 text-sm md:text-base leading-relaxed pl-16 md:pl-24 pr-6 md:pr-12 pt-2">
                    No. FarmTech is a completely open, public-benefit agricultural portal designed to empower local farming communities and cooperatives. Access to the digital ID registry, group administrative suites, and public directory lists is entirely free of charge for all eligible farmers, SHGs, and cooperative unions.
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
