@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-48 overflow-hidden" style="background-color: #064e3b;">
    <div class="absolute inset-0 z-0 opacity-20">
        <svg class="h-full w-full" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="fpo-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#fpo-grid)" />
        </svg>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-white">
        <nav class="flex mb-8 text-sm font-medium opacity-80" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li><a href="/" class="hover:text-green-300 transition-colors font-bold text-white">Home</a></li>
                <li><svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20" style="width: 1rem; height: 1rem;"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></li>
                <li class="text-green-300 font-bold">About FPO</li>
            </ol>
        </nav>

        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-2/3 space-y-6 text-left">
                <h1 class="text-5xl md:text-7xl font-black leading-tight text-white" style="color: white !important; font-size: 4rem; line-height: 1.1;">
                    Farmer Producer <br/> <span style="color: #4ade80;">Organizations (FPO)</span>
                </h1>
                <p class="text-xl max-w-2xl leading-relaxed font-bold text-white" style="color: white !important; opacity: 1; font-size: 1.25rem;">
                    Unlocking the power of collective farming to ensure better market access and higher profits for every farmer.
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#services" class="bg-white text-emerald-900 px-8 py-4 rounded-full font-black shadow-2xl hover:bg-green-400 transition-all transform hover:scale-105" style="color: #064e3b !important; background-color: white !important; padding: 1rem 2rem; border-radius: 9999px; font-weight: 900; display: inline-block;">
                        FPO Services
                    </a>
                    <a href="#linkages" class="bg-emerald-800/50 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-full font-black shadow-xl hover:bg-white/20 transition-all" style="color: white !important; border: 1px solid white; padding: 1rem 2rem; border-radius: 9999px; font-weight: 900; display: inline-block;">
                        Market Linkage
                    </a>
                </div>
            </div>
            <div class="lg:w-1/3 relative">
                <div class="bg-white/10 backdrop-blur-xl p-8 rounded-[3rem] border border-white/20 shadow-2xl relative z-10" style="background-color: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 3rem; padding: 2rem;">
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div class="p-4 bg-emerald-500/20 rounded-2xl border border-white/10" style="background-color: rgba(16,185,129,0.2); padding: 1rem; border-radius: 1rem;">
                            <p class="text-3xl font-black text-green-300" style="color: #86efac; font-size: 1.875rem; font-weight: 900;">10K+</p>
                            <p class="text-[10px] uppercase tracking-widest font-bold text-white">Active FPOs</p>
                        </div>
                        <div class="p-4 bg-emerald-500/20 rounded-2xl border border-white/10" style="background-color: rgba(16,185,129,0.2); padding: 1rem; border-radius: 1rem;">
                            <p class="text-3xl font-black text-green-300" style="color: #86efac; font-size: 1.875rem; font-weight: 900;">2.5M</p>
                            <p class="text-[10px] uppercase tracking-widest font-bold text-white">Farmers Joined</p>
                        </div>
                    </div>
                    <img src="https://cdn-icons-png.flaticon.com/512/3233/3233508.png" alt="Collective Farming" class="w-full mt-8 filter drop-shadow-2xl" style="width: 100%; margin-top: 2rem;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FPO Services Section -->
<section id="services" class="py-24 bg-white relative -mt-20 rounded-t-[5rem] z-20" style="background-color: white; border-top-left-radius: 5rem; border-top-right-radius: 5rem; margin-top: -5rem; position: relative; z-index: 20;">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">Key Services of <span class="text-emerald-600">FPOs</span></h2>
            <p class="text-lg text-gray-600 font-medium">FPOs provide end-to-end support to small and marginal farmers, from seed to market.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="p-8 bg-emerald-50 rounded-[3rem] border border-emerald-100 hover:shadow-2xl transition-all group">
                <div class="w-12 h-12 bg-emerald-600 rounded-xl flex items-center justify-center text-white mb-6 shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                <h4 class="text-lg font-black text-gray-900 mb-2">Input Supply</h4>
                <p class="text-sm text-gray-600 font-medium">Bulk procurement of seeds, fertilizers, and pesticides at lower costs for members.</p>
            </div>
            <div class="p-8 bg-emerald-50 rounded-[3rem] border border-emerald-100 hover:shadow-2xl transition-all group">
                <div class="w-12 h-12 bg-emerald-600 rounded-xl flex items-center justify-center text-white mb-6 shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h4 class="text-lg font-black text-gray-900 mb-2">Aggregation</h4>
                <p class="text-sm text-gray-600 font-medium">Collecting small harvests from many farmers to create large tradable volumes for big buyers.</p>
            </div>
            <div class="p-8 bg-emerald-50 rounded-[3rem] border border-emerald-100 hover:shadow-2xl transition-all group">
                <div class="w-12 h-12 bg-emerald-600 rounded-xl flex items-center justify-center text-white mb-6 shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                </div>
                <h4 class="text-lg font-black text-gray-900 mb-2">Quality Control</h4>
                <p class="text-sm text-gray-600 font-medium">Standardized grading, sorting, and packaging to meet high-end market requirements.</p>
            </div>
            <div class="p-8 bg-emerald-50 rounded-[3rem] border border-emerald-100 hover:shadow-2xl transition-all group">
                <div class="w-12 h-12 bg-emerald-600 rounded-xl flex items-center justify-center text-white mb-6 shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                </div>
                <h4 class="text-lg font-black text-gray-900 mb-2">Credit Access</h4>
                <p class="text-sm text-gray-600 font-medium">Facilitating institutional loans and credit for farmers by leveraging the group's collective strength.</p>
            </div>
        </div>
    </div>
</section>

<!-- Market Linkage Section -->
<section id="linkages" class="py-24 bg-emerald-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2">
                <h2 class="text-4xl font-black text-gray-900 mb-8 leading-tight">Direct Market <span class="text-emerald-600">Connection</span></h2>
                <div class="space-y-6">
                    <div class="flex items-start space-x-6">
                        <div class="bg-white p-3 rounded-2xl shadow-md text-emerald-600 font-black text-xl">01</div>
                        <div>
                            <h4 class="font-black text-gray-900 text-xl mb-2">Eliminating Middlemen</h4>
                            <p class="text-gray-600 font-medium">FPOs negotiate directly with retailers, exporters, and processors, ensuring farmers get a higher share of the consumer price.</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-6">
                        <div class="bg-white p-3 rounded-2xl shadow-md text-emerald-600 font-black text-xl">02</div>
                        <div>
                            <h4 class="font-black text-gray-900 text-xl mb-2">e-NAM Integration</h4>
                            <p class="text-gray-600 font-medium">FPOs are being onboarded to the Electronic National Agriculture Market for nationwide price discovery.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/2">
                <div class="bg-white p-8 rounded-[3rem] shadow-2xl border border-gray-100">
                    <h4 class="text-xl font-black text-emerald-900 mb-6 text-center">Central Sector Scheme for FPOs</h4>
                    <div class="space-y-4">
                        <div class="p-4 bg-emerald-50 rounded-2xl border-l-4 border-emerald-600">
                            <p class="font-black text-emerald-900">Equity Grant Support</p>
                            <p class="text-xs text-gray-600 font-bold uppercase">Up to ₹15 Lakh per FPO</p>
                        </div>
                        <div class="p-4 bg-emerald-50 rounded-2xl border-l-4 border-emerald-600">
                            <p class="font-black text-emerald-900">Credit Guarantee Fund</p>
                            <p class="text-xs text-gray-600 font-bold uppercase">Risk cover for bank loans</p>
                        </div>
                        <div class="p-4 bg-emerald-50 rounded-2xl border-l-4 border-emerald-600">
                            <p class="font-black text-emerald-900">Formation Allowance</p>
                            <p class="text-xs text-gray-600 font-bold uppercase">₹18 Lakh for 3 years management</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Story -->
<section class="py-32 relative overflow-hidden" style="background-color: #022c22; color: white; padding: 8rem 0;">
    <div class="absolute top-0 right-0 w-96 h-96 bg-green-500 rounded-full blur-[120px] opacity-20"></div>
    <div class="container mx-auto px-4 relative z-10 text-white">
        <div class="max-w-4xl mx-auto text-center">
            <div class="mx-auto flex items-center justify-center shadow-2xl transform rotate-12" style="background-color: #22c55e; width: 6rem; height: 6rem; border-radius: 1.5rem; margin: 0 auto 3rem auto; display: flex; align-items: center; justify-center: center;">
                <span class="font-serif italic" style="color: #064e3b; font-size: 4rem;">"</span>
            </div>
            <h3 class="text-3xl md:text-5xl font-black leading-tight tracking-tight text-white" style="color: white !important; font-weight: 900; font-size: 3rem; margin-bottom: 3rem;">
                "Joining the FPO changed everything. We no longer wait for middlemen; we sell directly to processing units."
            </h3>
            <div class="flex flex-col items-center" style="display: flex; flex-direction: column; align-items: center;">
                <div class="rounded-full bg-emerald-800 overflow-hidden border-4 border-green-400 shadow-2xl" style="width: 6rem; height: 6rem; border-radius: 9999px; border: 4px solid #4ade80; overflow: hidden; margin-bottom: 1.5rem;">
                    <img src="https://images.unsplash.com/photo-1595067331631-f8518804f331?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="FPO Leader" class="w-full h-full object-cover" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <p class="font-black text-2xl text-green-400" style="color: #4ade80; font-weight: 900; font-size: 1.5rem;">Mahesh Kumar</p>
                <p class="text-white opacity-70 uppercase tracking-[0.3em] text-xs font-bold mt-2" style="color: white !important; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.3em; margin-top: 0.5rem;">Chairman, Village Prosperity FPO</p>
            </div>
        </div>
    </div>
</section>

@endsection
