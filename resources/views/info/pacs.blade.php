@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-48 overflow-hidden" style="background-color: #7c2d12;">
    <div class="absolute inset-0 z-0 opacity-20">
        <svg class="h-full w-full" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="pacs-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#pacs-grid)" />
        </svg>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-white">
        <nav class="flex mb-8 text-sm font-medium opacity-80" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li><a href="/" class="hover:text-orange-300 transition-colors font-bold text-white">Home</a></li>
                <li><svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20" style="width: 1rem; height: 1rem;"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></li>
                <li class="text-orange-300 font-bold">About PACS</li>
            </ol>
        </nav>

        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-2/3 space-y-6 text-left">
                <h1 class="text-5xl md:text-7xl font-black leading-tight text-white" style="color: white !important; font-size: 4rem; line-height: 1.1;">
                    Primary Agricultural <br/> <span style="color: #fb923c;">Credit Societies (PACS)</span>
                </h1>
                <p class="text-xl max-w-2xl leading-relaxed font-bold text-white" style="color: white !important; opacity: 1; font-size: 1.25rem;">
                    The backbone of rural credit: Providing essential financial services and agricultural inputs at the doorstep of every farmer.
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#services" class="bg-white text-orange-900 px-8 py-4 rounded-full font-black shadow-2xl hover:bg-orange-400 transition-all transform hover:scale-105" style="color: #7c2d12 !important; background-color: white !important; padding: 1rem 2rem; border-radius: 9999px; font-weight: 900; display: inline-block;">
                        PACS Services
                    </a>
                    <a href="#modernization" class="bg-orange-800/50 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-full font-black shadow-xl hover:bg-white/20 transition-all" style="color: white !important; border: 1px solid white; padding: 1rem 2rem; border-radius: 9999px; font-weight: 900; display: inline-block;">
                        Computerization
                    </a>
                </div>
            </div>
            <div class="lg:w-1/3 relative">
                <div class="bg-white/10 backdrop-blur-xl p-8 rounded-[3rem] border border-white/20 shadow-2xl relative z-10" style="background-color: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 3rem; padding: 2rem;">
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div class="p-4 bg-orange-500/20 rounded-2xl border border-white/10" style="background-color: rgba(249,115,22,0.2); padding: 1rem; border-radius: 1rem;">
                            <p class="text-3xl font-black text-orange-300" style="color: #fdba74; font-size: 1.875rem; font-weight: 900;">95K+</p>
                            <p class="text-[10px] uppercase tracking-widest font-bold text-white">Total PACS</p>
                        </div>
                        <div class="p-4 bg-orange-500/20 rounded-2xl border border-white/10" style="background-color: rgba(249,115,22,0.2); padding: 1rem; border-radius: 1rem;">
                            <p class="text-3xl font-black text-orange-300" style="color: #fdba74; font-size: 1.875rem; font-weight: 900;">130M</p>
                            <p class="text-[10px] uppercase tracking-widest font-bold text-white">Rural Members</p>
                        </div>
                    </div>
                    <img src="https://cdn-icons-png.flaticon.com/512/3233/3233508.png" alt="PACS Icon" class="w-full mt-8 filter drop-shadow-2xl" style="width: 100%; margin-top: 2rem;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-24 bg-white relative -mt-20 rounded-t-[5rem] z-20 shadow-[0_-20px_50px_rgba(0,0,0,0.05)]" style="background-color: white; border-top-left-radius: 5rem; border-top-right-radius: 5rem; margin-top: -5rem; position: relative; z-index: 20;">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">Multipurpose Role of <span class="text-orange-600">PACS</span></h2>
            <p class="text-lg text-gray-600 font-medium">PACS are evolving beyond credit to become village-level economic hubs.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-8 bg-orange-50 rounded-[3rem] border border-orange-100 hover:shadow-2xl transition-all">
                <div class="bg-orange-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg" style="width: 4rem; height: 4rem;">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h4 class="text-xl font-black text-gray-900 mb-4">Short-term Credit</h4>
                <p class="text-gray-600 font-medium">Providing seasonal crop loans and term loans for small agricultural projects at concessional rates.</p>
            </div>
            <div class="p-8 bg-orange-50 rounded-[3rem] border border-orange-100 hover:shadow-2xl transition-all">
                <div class="bg-orange-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg" style="width: 4rem; height: 4rem;">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
                <h4 class="text-xl font-black text-gray-900 mb-4">Input Distribution</h4>
                <p class="text-gray-600 font-medium">Stocking and distributing quality seeds, fertilizers, and pesticides to farmers in remote areas.</p>
            </div>
            <div class="p-8 bg-orange-50 rounded-[3rem] border border-orange-100 hover:shadow-2xl transition-all">
                <div class="bg-orange-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg" style="width: 4rem; height: 4rem;">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h4 class="text-xl font-black text-gray-900 mb-4">Custom Hiring</h4>
                <p class="text-xl font-black text-gray-900 mb-4">Storage & Hiring</p>
                <p class="text-gray-600 font-medium">Operating godowns for harvest storage and providing farm machinery like tractors on rent.</p>
            </div>
        </div>
    </div>
</section>

<!-- Modernization Section -->
<section id="modernization" class="py-24 bg-orange-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="PACS Office" class="rounded-[3rem] shadow-2xl border-8 border-white">
                    <div class="absolute -top-6 -left-6 bg-white p-6 rounded-3xl shadow-xl border border-orange-100">
                        <p class="text-3xl font-black text-orange-600">63K</p>
                        <p class="text-xs font-bold text-gray-500 uppercase">PACS Computerized</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/2 space-y-8">
                <h2 class="text-4xl font-black text-gray-900 leading-tight">Digital Transformation <br/> of <span class="text-orange-600">PACS</span></h2>
                <p class="text-lg text-gray-700 font-bold">The Government of India is implementing a landmark project to computerize 63,000 functional PACS to bring transparency and efficiency.</p>
                <div class="space-y-4">
                    <div class="p-5 bg-white rounded-2xl shadow-sm border border-orange-100">
                        <h4 class="font-black text-gray-900 mb-1">Common Software</h4>
                        <p class="text-sm text-gray-600">Unified ERP software for seamless accounting and MIS reporting.</p>
                    </div>
                    <div class="p-5 bg-white rounded-2xl shadow-sm border border-orange-100">
                        <h4 class="font-black text-gray-900 mb-1">Direct Benefit Transfer (DBT)</h4>
                        <p class="text-sm text-gray-600">Facilitating direct transfers of subsidies and payments to farmers' accounts.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Story -->
<section class="py-32 relative overflow-hidden" style="background-color: #431407; color: white; padding: 8rem 0;">
    <div class="absolute top-0 right-0 w-96 h-96 bg-orange-500 rounded-full blur-[120px] opacity-20"></div>
    <div class="container mx-auto px-4 relative z-10 text-white">
        <div class="max-w-4xl mx-auto text-center">
            <div class="mx-auto flex items-center justify-center shadow-2xl transform rotate-12" style="background-color: #f97316; width: 6rem; height: 6rem; border-radius: 1.5rem; margin: 0 auto 3rem auto; display: flex; align-items: center; justify-center: center;">
                <span class="font-serif italic" style="color: #431407; font-size: 4rem;">"</span>
            </div>
            <h3 class="text-3xl md:text-5xl font-black leading-tight tracking-tight text-white" style="color: white !important; font-weight: 900; font-size: 3rem; margin-bottom: 3rem;">
                "Our local PACS made it possible to get seeds and a loan in one day. We are no longer dependent on private lenders."
            </h3>
            <div class="flex flex-col items-center" style="display: flex; flex-direction: column; align-items: center;">
                <div class="rounded-full bg-orange-800 overflow-hidden border-4 border-orange-400 shadow-2xl" style="width: 6rem; height: 6rem; border-radius: 9999px; border: 4px solid #fb923c; overflow: hidden; margin-bottom: 1.5rem;">
                    <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="PACS Leader" class="w-full h-full object-cover" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <p class="font-black text-2xl text-orange-400" style="color: #fb923c; font-weight: 900; font-size: 1.5rem;">Suresh Singh</p>
                <p class="text-white opacity-70 uppercase tracking-[0.3em] text-xs font-bold mt-2" style="color: white !important; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.3em; margin-top: 0.5rem;">Member, Village PACS</p>
            </div>
        </div>
    </div>
</section>

@endsection
