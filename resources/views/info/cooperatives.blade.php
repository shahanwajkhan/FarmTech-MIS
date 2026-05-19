@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative pt-32 pb-48 overflow-hidden" style="background-color: #1e3a8a;">
    <div class="absolute inset-0 z-0 opacity-20">
        <svg class="h-full w-full" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="coop-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#coop-grid)" />
        </svg>
    </div>
    
    <div class="container mx-auto px-4 relative z-10 text-white">
        <nav class="flex mb-8 text-sm font-medium opacity-80" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li><a href="/" class="hover:text-blue-200 transition-colors font-bold text-white">Home</a></li>
                <li><svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20" style="width: 1rem; height: 1rem;"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></li>
                <li class="text-blue-200 font-bold">Cooperatives</li>
            </ol>
        </nav>

        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-2/3 space-y-6 text-left">
                <h1 class="text-5xl md:text-7xl font-black leading-tight text-white" style="color: white !important; font-size: 4rem; line-height: 1.1;">
                    Agricultural <br/> <span style="color: #93c5fd;">Cooperatives</span>
                </h1>
                <p class="text-xl max-w-2xl leading-relaxed font-bold text-white" style="color: white !important; opacity: 1; font-size: 1.25rem;">
                    Sahakar se Samriddhi: Powering the rural economy through the spirit of cooperation and shared ownership.
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#principles" class="bg-white text-blue-900 px-8 py-4 rounded-full font-black shadow-2xl hover:bg-blue-300 transition-all transform hover:scale-105" style="color: #1e3a8a !important; background-color: white !important; padding: 1rem 2rem; border-radius: 9999px; font-weight: 900; display: inline-block;">
                        Coop Principles
                    </a>
                    <a href="#impact" class="bg-blue-800/50 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-full font-black shadow-xl hover:bg-white/20 transition-all" style="color: white !important; border: 1px solid white; padding: 1rem 2rem; border-radius: 9999px; font-weight: 900; display: inline-block;">
                        Economic Impact
                    </a>
                </div>
            </div>
            <div class="lg:w-1/3 relative">
                <div class="bg-white/10 backdrop-blur-xl p-8 rounded-[3rem] border border-white/20 shadow-2xl relative z-10" style="background-color: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); border-radius: 3rem; padding: 2rem;">
                    <div class="grid grid-cols-2 gap-4 text-center">
                        <div class="p-4 bg-blue-500/20 rounded-2xl border border-white/10" style="background-color: rgba(59,130,246,0.2); padding: 1rem; border-radius: 1rem;">
                            <p class="text-3xl font-black text-blue-200" style="color: #bfdbfe; font-size: 1.875rem; font-weight: 900;">8.5L+</p>
                            <p class="text-[10px] uppercase tracking-widest font-bold text-white">Societies</p>
                        </div>
                        <div class="p-4 bg-blue-500/20 rounded-2xl border border-white/10" style="background-color: rgba(59,130,246,0.2); padding: 1rem; border-radius: 1rem;">
                            <p class="text-3xl font-black text-blue-200" style="color: #bfdbfe; font-size: 1.875rem; font-weight: 900;">290M</p>
                            <p class="text-[10px] uppercase tracking-widest font-bold text-white">Members</p>
                        </div>
                    </div>
                    <img src="https://cdn-icons-png.flaticon.com/512/3233/3233508.png" alt="Cooperatives Icon" class="w-full mt-8 filter drop-shadow-2xl" style="width: 100%; margin-top: 2rem;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Principles Section -->
<section id="principles" class="py-24 bg-white relative -mt-20 rounded-t-[5rem] z-20 shadow-[0_-20px_50px_rgba(0,0,0,0.05)]" style="background-color: white; border-top-left-radius: 5rem; border-top-right-radius: 5rem; margin-top: -5rem; position: relative; z-index: 20;">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">The 7 <span class="text-blue-600">Cooperative Principles</span></h2>
            <p class="text-lg text-gray-600 font-medium">Cooperatives worldwide follow these core values to ensure member-centric growth.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="p-8 bg-blue-50 rounded-[3rem] border border-blue-100 hover:shadow-xl transition-all">
                <h4 class="text-lg font-black text-blue-900 mb-4 uppercase tracking-widest">01. Voluntary Membership</h4>
                <p class="text-gray-600 font-medium text-sm">Open to all persons able to use their services and willing to accept responsibilities.</p>
            </div>
            <div class="p-8 bg-blue-50 rounded-[3rem] border border-blue-100 hover:shadow-xl transition-all">
                <h4 class="text-lg font-black text-blue-900 mb-4 uppercase tracking-widest">02. Democratic Control</h4>
                <p class="text-gray-600 font-medium text-sm">Members actively participate in setting policies and making decisions.</p>
            </div>
            <div class="p-8 bg-blue-50 rounded-[3rem] border border-blue-100 hover:shadow-xl transition-all">
                <h4 class="text-lg font-black text-blue-900 mb-4 uppercase tracking-widest">03. Member Participation</h4>
                <p class="text-gray-600 font-medium text-sm">Members contribute equitably to, and democratically control, the capital of their cooperative.</p>
            </div>
        </div>
    </div>
</section>

<!-- Impact Section -->
<section id="impact" class="py-24 bg-blue-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2">
                <h2 class="text-4xl font-black text-gray-900 mb-8 leading-tight">Economic & Social <span class="text-blue-600">Impact</span></h2>
                <p class="text-lg text-gray-700 font-bold mb-6">Cooperatives handle a massive share of India's agricultural output, ensuring fair prices for producers.</p>
                <div class="grid grid-cols-2 gap-6">
                    <div class="p-6 bg-white rounded-3xl shadow-sm border border-blue-100">
                        <p class="text-3xl font-black text-blue-600">20%</p>
                        <p class="text-xs font-bold text-gray-500 uppercase">Share in Fertilizer Distribution</p>
                    </div>
                    <div class="p-6 bg-white rounded-3xl shadow-sm border border-blue-100">
                        <p class="text-3xl font-black text-blue-600">24%</p>
                        <p class="text-xs font-bold text-gray-500 uppercase">Share in Sugar Production</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/2 relative">
                <div class="bg-white p-12 rounded-[4rem] shadow-2xl border border-blue-100">
                    <h4 class="text-xl font-black text-blue-900 mb-8">Role in Value Chain</h4>
                    <ul class="space-y-6">
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-blue-600 rounded-full flex-shrink-0 mt-1 shadow-lg"></div>
                            <p class="font-bold text-gray-700">Providing cold storage and warehousing facilities.</p>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-blue-600 rounded-full flex-shrink-0 mt-1 shadow-lg"></div>
                            <p class="font-bold text-gray-700">Direct procurement from farm-gate to factory.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Story -->
<section class="py-32 relative overflow-hidden" style="background-color: #172554; color: white; padding: 8rem 0;">
    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-500 rounded-full blur-[120px] opacity-20"></div>
    <div class="container mx-auto px-4 relative z-10 text-white">
        <div class="max-w-4xl mx-auto text-center">
            <div class="mx-auto flex items-center justify-center shadow-2xl transform rotate-12" style="background-color: #3b82f6; width: 6rem; height: 6rem; border-radius: 1.5rem; margin: 0 auto 3rem auto; display: flex; align-items: center; justify-center: center;">
                <span class="font-serif italic" style="color: #1e3a8a; font-size: 4rem;">"</span>
            </div>
            <h3 class="text-3xl md:text-5xl font-black leading-tight tracking-tight text-white" style="color: white !important; font-weight: 900; font-size: 3rem; margin-bottom: 3rem;">
                "Our cooperative society turned us from mere producers to owners of a successful dairy brand."
            </h3>
            <div class="flex flex-col items-center" style="display: flex; flex-direction: column; align-items: center;">
                <div class="rounded-full bg-blue-800 overflow-hidden border-4 border-blue-400 shadow-2xl" style="width: 6rem; height: 6rem; border-radius: 9999px; border: 4px solid #60a5fa; overflow: hidden; margin-bottom: 1.5rem;">
                    <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Coop Leader" class="w-full h-full object-cover" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <p class="font-black text-2xl text-blue-400" style="color: #60a5fa; font-weight: 900; font-size: 1.5rem;">Shanti Devi</p>
                <p class="text-white opacity-70 uppercase tracking-[0.3em] text-xs font-bold mt-2" style="color: white !important; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.3em; margin-top: 0.5rem;">President, Women's Dairy Coop</p>
            </div>
        </div>
    </div>
</section>

@endsection
