@extends('layouts.app')

@section('content')
<div class="min-h-screen" style="background-color: #f8fafc; position: relative; overflow-x: hidden;" 
     x-data="{ 
        mobileFilters: false, 
        state: '{{ request('state') }}', 
        districts: [], 
        loadingDistricts: false,
        async fetchDistricts() {
            if(!this.state) { this.districts = []; return; }
            this.loadingDistricts = true;
            try {
                const res = await fetch(`/directory/api/districts/${this.state}`);
                this.districts = await res.json();
            } catch(e) { console.error(e); }
            this.loadingDistricts = false;
        }
     }" 
     x-init="if(state) fetchDistricts()">
    
    <!-- BACKGROUND DECORATIONS -->
    <div class="absolute top-1/4 right-0 w-[800px] h-[800px] bg-emerald-500/5 rounded-full blur-[150px] -mr-96 pointer-events-none"></div>
    <div class="absolute bottom-1/4 left-0 w-[600px] h-[600px] bg-teal-500/5 rounded-full blur-[120px] -ml-64 pointer-events-none"></div>

    <!-- FIX 5: PREMIUM HERO SECTION WITH CORRECT SPACING AND TRANSITION -->
    <section class="relative pt-44 md:pt-56 pb-24 md:pb-32 overflow-hidden" style="background: linear-gradient(180deg, #064e3b 0%, #065f46 80%, #f8fafc 100%);">
        <div class="absolute inset-0 z-0 opacity-10">
            <svg class="h-full w-full" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs><pattern id="hero-grid-fix-final" width="50" height="50" patternUnits="userSpaceOnUse"><path d="M 50 0 L 0 0 0 50" fill="none" stroke="white" stroke-width="0.5" /></pattern></defs>
                <rect width="100%" height="100%" fill="url(#hero-grid-fix-final)" />
            </svg>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-5xl mx-auto text-center space-y-8 mb-20">
                <div class="inline-flex items-center space-x-3 px-5 py-2.5 bg-white/10 rounded-full border border-white/20 backdrop-blur-xl">
                    <span class="w-2.5 h-2.5 bg-green-400 rounded-full animate-pulse shadow-[0_0_10px_#4ade80]"></span>
                    <span class="text-[11px] font-black uppercase tracking-[0.3em] text-emerald-100">Agricultural Discovery Platform</span>
                </div>
                <h1 class="text-5xl md:text-8xl font-extrabold text-white leading-none tracking-tight drop-shadow-2xl" style="color: white !important;">
                    FPO <span class="text-emerald-400 italic">Directory</span>
                </h1>
                <p class="text-lg md:text-2xl text-emerald-100/90 font-medium max-w-3xl mx-auto leading-relaxed">
                    Access real-time data of verified organizations empowering rural India.
                </p>
                
                <!-- Hero Statistics Grid -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 max-w-4xl mx-auto pt-8">
                    <div class="bg-white/10 backdrop-blur-md p-6 rounded-3xl border border-white/10 shadow-xl">
                        <p class="text-3xl md:text-4xl font-black text-white leading-none" style="color: white !important;">{{ number_format($stats['total']) }}</p>
                        <p class="text-[9px] uppercase font-black tracking-widest text-emerald-300 mt-2">Active Groups</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md p-6 rounded-3xl border border-white/10 shadow-xl">
                        <p class="text-3xl md:text-4xl font-black text-white leading-none" style="color: white !important;">12.4K</p>
                        <p class="text-[9px] uppercase font-black tracking-widest text-pink-300 mt-2">Women Led</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md p-6 rounded-3xl border border-white/10 shadow-xl">
                        <p class="text-3xl md:text-4xl font-black text-white leading-none" style="color: white !important;">28</p>
                        <p class="text-[9px] uppercase font-black tracking-widest text-yellow-300 mt-2">States Covered</p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md p-6 rounded-3xl border border-white/10 shadow-xl">
                        <p class="text-3xl md:text-4xl font-black text-white leading-none" style="color: white !important;">₹850Cr</p>
                        <p class="text-[9px] uppercase font-black tracking-widest text-blue-300 mt-2">Trade Value</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Subtle Divider -->
        <div class="absolute bottom-0 left-0 right-0 h-px bg-white/5"></div>
    </section>

    <!-- FIX 1, 2, 3: DISCOVERY & DIRECTORY GRID WITH CLEAN SEPARATION -->
    <section class="relative z-10 px-4 lg:px-12 py-16 md:py-24">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16">
                
                <!-- PREMIUM DISCOVERY SIDEBAR -->
                <aside class="col-span-12 lg:col-span-4">
                    <div class="bg-white/95 backdrop-blur-2xl rounded-[40px] shadow-[0_32px_120px_-20px_rgba(0,0,0,0.12)] border border-white sticky top-32 overflow-hidden transition-all duration-500">
                        <!-- Glass Header -->
                        <div class="p-8 pb-0 border-b border-gray-100/50">
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <h3 class="text-3xl font-black text-gray-900 tracking-tight">Discovery Tools</h3>
                                    <p class="text-xs font-bold text-emerald-600 mt-1">Refine your agriculture search</p>
                                </div>
                                <div class="w-14 h-14 bg-emerald-900 rounded-3xl flex items-center justify-center text-white shadow-xl shadow-emerald-200">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                                </div>
                            </div>
                            
                            <!-- Quick Stats Pills -->
                            <div class="flex flex-wrap gap-2 mb-8">
                                <span class="px-3 py-1.5 bg-gray-50 border border-gray-100 rounded-full text-[9px] font-black uppercase tracking-widest text-gray-500">28 States</span>
                                <span class="px-3 py-1.5 bg-emerald-50 border border-emerald-100 rounded-full text-[9px] font-black uppercase tracking-widest text-emerald-600">Verified Hubs</span>
                                <span class="px-3 py-1.5 bg-blue-50 border border-blue-100 rounded-full text-[9px] font-black uppercase tracking-widest text-blue-600">Live Data</span>
                            </div>
                        </div>

                        <form action="{{ url()->current() }}" method="GET" class="p-8 space-y-6">
                            <!-- Input Fields -->
                            <div class="group">
                                <label class="text-[10px] uppercase font-black text-gray-400 tracking-[0.2em] mb-3 block ml-1">Search Keywords</label>
                                <div class="relative">
                                    <svg class="w-5 h-5 absolute left-5 top-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Organization name..." class="w-full bg-gray-50/50 border border-gray-100 focus:border-emerald-500 focus:bg-white rounded-2xl pl-14 pr-6 py-5 font-bold transition-all outline-none">
                                </div>
                            </div>

                            <div class="group">
                                <label class="text-[10px] uppercase font-black text-gray-400 tracking-[0.2em] mb-3 block ml-1">Select State</label>
                                <div class="relative">
                                    <svg class="w-5 h-5 absolute left-5 top-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                    <select name="state" x-model="state" @change="fetchDistricts()" class="w-full bg-gray-50/50 border border-gray-100 focus:border-emerald-500 focus:bg-white rounded-2xl pl-14 pr-12 py-5 font-bold appearance-none transition-all cursor-pointer outline-none">
                                        <option value="">All States</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    </select>
                                    <svg class="w-5 h-5 absolute right-5 top-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>

                            <div class="group" x-show="state" x-transition>
                                <label class="text-[10px] uppercase font-black text-gray-400 tracking-[0.2em] mb-3 block ml-1">Select District</label>
                                <div class="relative">
                                    <svg class="w-5 h-5 absolute left-5 top-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    <select name="district" class="w-full bg-gray-50/50 border border-gray-100 focus:border-emerald-500 focus:bg-white rounded-2xl pl-14 pr-12 py-5 font-bold appearance-none transition-all cursor-pointer outline-none" :disabled="loadingDistricts">
                                        <option value="">All Districts</option>
                                        <template x-for="d in districts" :key="d">
                                            <option :value="d" x-text="d" :selected="d == '{{ request('district') }}'"></option>
                                        </template>
                                    </select>
                                    <div x-show="loadingDistricts" class="absolute right-12 top-5">
                                        <svg class="animate-spin h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                    </div>
                                    <svg x-show="!loadingDistricts" class="w-5 h-5 absolute right-5 top-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>

                            <div class="group">
                                <label class="text-[10px] uppercase font-black text-gray-400 tracking-[0.2em] mb-3 block ml-1">Product Category</label>
                                <div class="relative">
                                    <svg class="w-5 h-5 absolute left-5 top-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                                    <select name="product" class="w-full bg-gray-50/50 border border-gray-100 focus:border-emerald-500 focus:bg-white rounded-2xl pl-14 pr-12 py-5 font-bold appearance-none transition-all cursor-pointer outline-none">
                                        <option value="">All Commodities</option>
                                        <option value="Rice" {{ request('product') == 'Rice' ? 'selected' : '' }}>Rice & Cereals</option>
                                        <option value="Dairy" {{ request('product') == 'Dairy' ? 'selected' : '' }}>Dairy & Poultry</option>
                                        <option value="Organic" {{ request('product') == 'Organic' ? 'selected' : '' }}>Organic Products</option>
                                        <option value="Fruits" {{ request('product') == 'Fruits' ? 'selected' : '' }}>Fruits & Horticulture</option>
                                    </select>
                                    <svg class="w-5 h-5 absolute right-5 top-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>

                            <!-- Tags -->
                            <div class="pt-2">
                                <div class="flex flex-wrap gap-2">
                                    <button type="button" class="px-4 py-2 bg-emerald-50 text-emerald-700 rounded-full text-[10px] font-black uppercase transition-all hover:bg-emerald-600 hover:text-white">Women-Led</button>
                                    <button type="button" class="px-4 py-2 bg-blue-50 text-blue-700 rounded-full text-[10px] font-black uppercase transition-all hover:bg-blue-600 hover:text-white">Export Ready</button>
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-gradient-to-r from-emerald-600 to-teal-500 text-white p-6 rounded-[2.5rem] font-black shadow-2xl shadow-emerald-200 hover:scale-[1.03] transition-all transform active:scale-95 text-lg uppercase tracking-[0.2em]">
                                Search Hubs
                            </button>
                            <a href="{{ url()->current() }}" class="block text-center text-[10px] font-black uppercase tracking-[0.3em] text-gray-400 hover:text-emerald-600 transition-colors">Reset Filter</a>
                        </form>
                    </div>
                </aside>

                <!-- DIRECTORY CARDS GRID -->
                <main class="col-span-12 lg:col-span-8 space-y-12">
                    @if($items->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-12">
                        @foreach($items as $item)
                        <div class="bg-white rounded-[40px] p-10 shadow-[0_32px_80px_-20px_rgba(0,0,0,0.06)] hover:shadow-[0_64px_100px_-30px_rgba(16,185,129,0.12)] transition-all duration-500 border border-transparent hover:border-emerald-100 group relative overflow-hidden flex flex-col hover:-translate-y-4" style="min-height: 560px;">
                            <div class="absolute top-0 right-0 w-40 h-40 bg-emerald-50 rounded-bl-[120px] transition-all duration-700 group-hover:bg-emerald-600 -mr-16 -mt-16 group-hover:-mr-8 group-hover:-mt-8"></div>
                            
                            <div class="flex items-start justify-between mb-12 relative z-10">
                                <div class="flex items-center space-x-6">
                                    @if($type === 'fpo')
                                        <div class="w-24 h-24 bg-emerald-50 rounded-[2.5rem] flex items-center justify-center text-emerald-600 shadow-inner group-hover:bg-white group-hover:shadow-2xl transition-all duration-500 transform group-hover:rotate-6">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                        </div>
                                    @elseif($type === 'shg')
                                        <div class="w-24 h-24 bg-purple-50 rounded-[2.5rem] flex items-center justify-center text-purple-600 shadow-inner group-hover:bg-white group-hover:shadow-2xl transition-all duration-500 transform group-hover:rotate-6">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                        </div>
                                    @elseif($type === 'pacs')
                                        <div class="w-24 h-24 bg-amber-50 rounded-[2.5rem] flex items-center justify-center text-amber-600 shadow-inner group-hover:bg-white group-hover:shadow-2xl transition-all duration-500 transform group-hover:rotate-6">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        </div>
                                    @else
                                        <div class="w-24 h-24 bg-blue-50 rounded-[2.5rem] flex items-center justify-center text-blue-600 shadow-inner group-hover:bg-white group-hover:shadow-2xl transition-all duration-500 transform group-hover:rotate-6">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="text-3xl font-black text-gray-900 group-hover:text-emerald-700 transition-colors leading-[1.1] mb-2">{{ $item->name ?? $item->group_name }}</h4>
                                        <p class="text-gray-500 font-bold text-sm flex items-center">
                                            <svg class="w-4 h-4 mr-1.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                            {{ $item->district }}, {{ $item->state }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-8 mb-12 relative z-10">
                                <div class="p-8 bg-gray-50/50 rounded-[2.5rem] border border-gray-100 group-hover:bg-white transition-colors duration-500">
                                    <p class="text-[10px] uppercase tracking-[0.2em] font-black text-gray-400 mb-2">Members</p>
                                    <p class="text-4xl font-black text-gray-900">{{ number_format($item->member_count ?? $item->members_count ?? 0) }}</p>
                                </div>
                                <div class="p-8 bg-gray-50/50 rounded-[2.5rem] border border-gray-100 group-hover:bg-white transition-colors duration-500">
                                    <p class="text-[10px] uppercase tracking-[0.2em] font-black text-gray-400 mb-2">Focus</p>
                                    <div class="flex flex-wrap gap-2 mt-3">
                                        @forelse(collect($item->products ?? [])->take(2) as $prod)
                                        <span class="px-4 py-1.5 bg-emerald-100 text-emerald-800 rounded-xl text-[9px] font-black uppercase tracking-widest">{{ $prod }}</span>
                                        @empty
                                        <span class="text-[10px] font-bold text-gray-400">Agriculture</span>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                            <div class="mt-auto flex items-center gap-5 relative z-10">
                                <a href="{{ route('directory.profile', ['type' => $type, 'id' => $item->id]) }}" class="flex-1 bg-emerald-900 text-white text-center py-7 rounded-[2.5rem] font-black shadow-2xl hover:bg-emerald-800 transition-all transform active:scale-95 uppercase tracking-[0.2em] text-xs">
                                    Explore Profile
                                </a>
                                <button class="w-20 h-20 bg-emerald-50 text-emerald-600 rounded-[2rem] flex items-center justify-center hover:bg-emerald-600 hover:text-white transition-all transform active:scale-95 shadow-sm">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="pt-20 pb-20 flex justify-center">
                        {{ $items->links() }}
                    </div>
                    @else
                    <div class="bg-white rounded-[4rem] p-32 text-center shadow-2xl border border-white">
                        <div class="w-32 h-32 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-10 shadow-inner">
                            <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <h3 class="text-4xl font-black text-gray-900 mb-6">No Records Found</h3>
                    </div>
                    @endif
                </main>
            </div>
        </div>
    </section>
</div>
@endsection
