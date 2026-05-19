@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-48 overflow-hidden" style="background-color: #064e3b;">
    <div class="absolute inset-0 z-0 opacity-20">
        <svg class="h-full w-full" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="shg-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#shg-grid)" />
        </svg>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-white">
        <nav class="flex mb-8 text-sm font-medium opacity-80" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li><a href="/" class="hover:text-green-300 transition-colors font-bold text-white">Home</a></li>
                <li><svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20" style="width: 1rem; height: 1rem;"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></li>
                <li class="text-green-300 font-bold">About SHG</li>
            </ol>
        </nav>

        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-2/3 space-y-6 text-left">
                <h1 class="text-5xl md:text-7xl font-black leading-tight text-white" style="color: white !important; font-size: 4rem; line-height: 1.1;">
                    Self Help Groups <br/> <span style="color: #4ade80;">(SHGs)</span>
                </h1>
                <p class="text-xl max-w-2xl leading-relaxed font-bold text-white" style="color: white !important; opacity: 1; font-size: 1.25rem;">
                    Empowering women and rural communities through micro-credit, collective savings, and socio-economic leadership.
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#schemes" class="bg-white text-emerald-900 px-8 py-4 rounded-full font-black shadow-2xl hover:bg-green-400 transition-all transform hover:scale-105" style="color: #064e3b !important; background-color: white !important; padding: 1rem 2rem; border-radius: 9999px; font-weight: 900; display: inline-block;">
                        Govt Schemes
                    </a>
                    <a href="#benefits" class="bg-emerald-800/50 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-full font-black shadow-xl hover:bg-white/20 transition-all" style="color: white !important; border: 1px solid white; padding: 1rem 2rem; border-radius: 9999px; font-weight: 900; display: inline-block;">
                        Core Functions
                    </a>
                </div>
            </div>
            <div class="lg:w-1/3 relative">
                <div class="bg-white/10 backdrop-blur-xl p-8 rounded-[3rem] border border-white/20 shadow-2xl relative z-10" style="background-color: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 3rem; padding: 2rem;">
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div class="p-4 bg-emerald-500/20 rounded-2xl border border-white/10" style="background-color: rgba(16,185,129,0.2); padding: 1rem; border-radius: 1rem;">
                            <p class="text-3xl font-black text-green-300" style="color: #86efac; font-size: 1.875rem; font-weight: 900;">12M+</p>
                            <p class="text-[10px] uppercase tracking-widest font-bold text-white">Active SHGs</p>
                        </div>
                        <div class="p-4 bg-emerald-500/20 rounded-2xl border border-white/10" style="background-color: rgba(16,185,129,0.2); padding: 1rem; border-radius: 1rem;">
                            <p class="text-3xl font-black text-green-300" style="color: #86efac; font-size: 1.875rem; font-weight: 900;">140M</p>
                            <p class="text-[10px] uppercase tracking-widest font-bold text-white">Women Members</p>
                        </div>
                    </div>
                    <img src="https://cdn-icons-png.flaticon.com/512/3062/3062306.png" alt="Women Empowerment" class="w-full mt-8 filter drop-shadow-2xl" style="width: 100%; margin-top: 2rem;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Functions Section -->
<section id="benefits" class="py-24 bg-white relative -mt-20 rounded-t-[5rem] z-20" style="background-color: white; border-top-left-radius: 5rem; border-top-right-radius: 5rem; margin-top: -5rem; position: relative; z-index: 20;">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">Core Functions of <span class="text-emerald-600">SHGs</span></h2>
            <p class="text-lg text-gray-600 font-medium">SHGs provide a platform for social and economic transformation at the village level.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-8 bg-emerald-50 rounded-[3rem] border border-emerald-100 hover:shadow-2xl transition-all">
                <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg" style="width: 4rem; height: 4rem;">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h4 class="text-xl font-black text-gray-900 mb-4">Financial Intermediation</h4>
                <p class="text-gray-600 leading-relaxed font-medium">Collecting small savings from members and providing small loans for immediate family and farm needs at low interest rates.</p>
            </div>
            <div class="p-8 bg-emerald-50 rounded-[3rem] border border-emerald-100 hover:shadow-2xl transition-all">
                <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg" style="width: 4rem; height: 4rem;">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h4 class="text-xl font-black text-gray-900 mb-4">Social Empowerment</h4>
                <p class="text-gray-600 leading-relaxed font-medium">Enabling women to participate in village decision-making and Gram Sabhas, fostering leadership and community status.</p>
            </div>
            <div class="p-8 bg-emerald-50 rounded-[3rem] border border-emerald-100 hover:shadow-2xl transition-all">
                <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg" style="width: 4rem; height: 4rem;">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h4 class="text-xl font-black text-gray-900 mb-4">Livelihood Training</h4>
                <p class="text-gray-600 leading-relaxed font-medium">Providing skill training in tailoring, food processing, handicrafts, and modern farming to create diverse income sources.</p>
            </div>
        </div>
    </div>
</section>

<!-- Government Schemes Section -->
<section id="schemes" class="py-24 bg-emerald-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-start gap-16">
            <div class="lg:w-1/3">
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mb-6">Government Support & <span class="text-emerald-600">Schemes</span></h2>
                <p class="text-gray-600 font-medium mb-8">The Ministry of Rural Development and various state governments provide significant financial support to SHGs.</p>
                <ul class="space-y-4">
                    <li class="flex items-center space-x-3 text-gray-700 font-bold">
                        <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>DAY-NRLM Integration</span>
                    </li>
                    <li class="flex items-center space-x-3 text-gray-700 font-bold">
                        <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>Interest Subvention Scheme</span>
                    </li>
                    <li class="flex items-center space-x-3 text-gray-700 font-bold">
                        <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>Community Investment Fund</span>
                    </li>
                </ul>
            </div>
            <div class="lg:w-2/3 overflow-hidden rounded-[3rem] shadow-2xl bg-white border border-gray-100">
                <table class="w-full text-left">
                    <thead class="bg-emerald-900 text-white">
                        <tr>
                            <th class="px-8 py-6 font-black uppercase text-xs tracking-widest">Scheme Name</th>
                            <th class="px-8 py-6 font-black uppercase text-xs tracking-widest">Benefit</th>
                            <th class="px-8 py-6 font-black uppercase text-xs tracking-widest">Eligibility</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <td class="px-8 py-6 font-black text-gray-900">NRLM Revolving Fund</td>
                            <td class="px-8 py-6 text-gray-600 font-medium">Grant of ₹15,000 per SHG</td>
                            <td class="px-8 py-6 text-emerald-600 font-bold">6 Months old SHG</td>
                        </tr>
                        <tr class="bg-emerald-50/30">
                            <td class="px-8 py-6 font-black text-gray-900">Interest Subvention</td>
                            <td class="px-8 py-6 text-gray-600 font-medium">Loans at 7% p.a.</td>
                            <td class="px-8 py-6 text-emerald-600 font-bold">Regular Repayment</td>
                        </tr>
                        <tr>
                            <td class="px-8 py-6 font-black text-gray-900">PM-FME Support</td>
                            <td class="px-8 py-6 text-gray-600 font-medium">35% Subsidy for Units</td>
                            <td class="px-8 py-6 text-emerald-600 font-bold">Food Processing SHGs</td>
                        </tr>
                    </tbody>
                </table>
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
                "We were just housewives. Now we are managers of our own processing unit and breadwinners for our families."
            </h3>
            <div class="flex flex-col items-center" style="display: flex; flex-direction: column; align-items: center;">
                <div class="rounded-full bg-emerald-800 overflow-hidden border-4 border-green-400 shadow-2xl" style="width: 6rem; height: 6rem; border-radius: 9999px; border: 4px solid #4ade80; overflow: hidden; margin-bottom: 1.5rem;">
                    <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="SHG Leader" class="w-full h-full object-cover" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <p class="font-black text-2xl text-green-400" style="color: #4ade80; font-weight: 900; font-size: 1.5rem;">Radha Devi</p>
                <p class="text-white opacity-70 uppercase tracking-[0.3em] text-xs font-bold mt-2" style="color: white !important; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.3em; margin-top: 0.5rem;">Leader, Jai Maa Durga SHG</p>
            </div>
        </div>
    </div>
</section>

@endsection
