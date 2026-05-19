<nav x-data="{ 
        scrolling: false, 
        timer: null
    }" 
    x-init="
        window.addEventListener('scroll', () => {
            scrolling = true;
            clearTimeout(timer);
            timer = setTimeout(() => { scrolling = false }, 150);
        });
    "
    class="container mx-auto px-4 -mt-10 sticky top-20 z-[9999] transition-all duration-700 ease-in-out transform origin-top"
    :class="scrolling ? 'opacity-0 -translate-y-48 scale-90 pointer-events-none' : 'opacity-100 translate-y-0 scale-100'">
    <div class="rounded-full px-8 py-5 flex items-center justify-between shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-white/60 bg-white/70 backdrop-blur-xl">
        <!-- Brand/Logo (Far Left) -->
        <a href="/" class="flex items-center space-x-2.5 group">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center shadow-md transition-transform group-hover:scale-110" style="background: linear-gradient(135deg, #10b981, #0d9488); box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);">
                <svg class="w-5 h-5" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <span class="text-lg font-black text-gray-900 tracking-tight">Farm<span class="text-green-600">Tech</span></span>
        </a>

        <!-- Main Links (Centered) -->
        <div class="hidden lg:flex items-center space-x-8">
            <a href="/" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 hover:scale-105 transition-all font-bold text-sm tracking-widest uppercase">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                <span>Home</span>
            </a>
            
            <!-- Learn Dropdown -->
            <div class="relative group" x-data="{ open: false }">
                <button type="button" @mouseenter="open = true" @mouseleave="open = false" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 hover:scale-105 transition-all font-bold text-sm tracking-widest uppercase py-2">
                    <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L1 7l11 5 11-5-11-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                    <span>Learn</span>
                    <svg class="w-3 h-3 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" @mouseenter="open = true" @mouseleave="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="absolute left-0 mt-2 bg-white rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.15)] border border-emerald-100/50 p-8 z-[99999]" style="width: 24rem; min-width: 24rem;">
                    <div class="space-y-3">
                        <!-- About FPO -->
                        <a href="{{ route('about.fpo') }}" class="flex items-center space-x-4 p-4 rounded-3xl hover:bg-emerald-50 transition-all group/item border border-transparent hover:border-emerald-100">
                            <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center border border-emerald-100 shadow-sm transition-all duration-300 group-hover/item:scale-110 group-hover/item:bg-emerald-500 group-hover/item:text-white">
                                <svg class="w-6 h-6 text-emerald-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-black text-gray-900 group-hover/item:text-emerald-600 transition-colors text-base truncate">About FPO</p>
                                <p class="text-[10px] text-gray-500 font-medium">Farmer Producer Organizations</p>
                            </div>
                        </a>

                        <!-- About SHGs -->
                        <a href="{{ route('about.shg') }}" class="flex items-center space-x-4 p-4 rounded-3xl hover:bg-purple-50 transition-all group/item border border-transparent hover:border-purple-100">
                            <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center border border-purple-100 shadow-sm transition-all duration-300 group-hover/item:scale-110 group-hover/item:bg-purple-500 group-hover/item:text-white">
                                <svg class="w-6 h-6 text-purple-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-black text-gray-900 group-hover/item:text-purple-600 transition-colors text-base truncate">About SHGs</p>
                                <p class="text-[10px] text-gray-500 font-medium">Self Help Groups info</p>
                            </div>
                        </a>

                        <!-- About PACS -->
                        <a href="{{ route('about.pacs') }}" class="flex items-center space-x-4 p-4 rounded-3xl hover:bg-amber-50 transition-all group/item border border-transparent hover:border-amber-100">
                            <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center border border-amber-100 shadow-sm transition-all duration-300 group-hover/item:scale-110 group-hover/item:bg-amber-500 group-hover/item:text-white">
                                <svg class="w-6 h-6 text-amber-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-black text-gray-900 group-hover/item:text-amber-600 transition-colors text-base truncate">About PACS</p>
                                <p class="text-[10px] text-gray-500 font-medium">Credit Societies Details</p>
                            </div>
                        </a>

                        <!-- Cooperatives -->
                        <a href="{{ route('cooperatives') }}" class="flex items-center space-x-4 p-4 rounded-3xl hover:bg-blue-50 transition-all group/item border border-transparent hover:border-blue-100">
                            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center border border-blue-100 shadow-sm transition-all duration-300 group-hover/item:scale-110 group-hover/item:bg-blue-500 group-hover/item:text-white">
                                <svg class="w-6 h-6 text-blue-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-black text-gray-900 group-hover/item:text-blue-600 transition-colors text-base truncate">Cooperatives</p>
                                <p class="text-[10px] text-gray-500 font-medium">Rural Cooperative Details</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Directory Dropdown -->
            <div class="relative group" x-data="{ open: false }">
                <button type="button" @mouseenter="open = true" @mouseleave="open = false" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 hover:scale-105 transition-all font-bold text-sm tracking-widest uppercase py-2">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9v-2h2v2zm0-4H9V7h2v5z"/></svg>
                    <span>Directory</span>
                    <svg class="w-3 h-3 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" @mouseenter="open = true" @mouseleave="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="absolute left-0 mt-2 bg-white rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.15)] border border-emerald-100/50 p-8 z-[99999]" style="width: 24rem; min-width: 24rem;">
                    <div class="space-y-3">
                        <!-- FPO Directory Link -->
                        <a href="{{ route('directory.fpo') }}" class="flex items-center space-x-4 p-4 rounded-3xl hover:bg-emerald-50 transition-all group/item border border-transparent hover:border-emerald-100">
                            <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center border border-emerald-100 shadow-sm transition-all duration-300 group-hover/item:scale-110 group-hover/item:bg-emerald-500 group-hover/item:text-white">
                                <svg class="w-6 h-6 text-emerald-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-black text-gray-900 group-hover/item:text-emerald-600 transition-colors text-base truncate">FPO Directory</p>
                                <p class="text-[10px] text-gray-500 font-medium">List of registered FPOs</p>
                            </div>
                        </a>
                        
                        <!-- SHG Directory Link -->
                        <a href="{{ route('directory.shg') }}" class="flex items-center space-x-4 p-4 rounded-3xl hover:bg-purple-50 transition-all group/item border border-transparent hover:border-purple-100">
                            <div class="w-12 h-12 bg-purple-50 rounded-2xl flex items-center justify-center border border-purple-100 shadow-sm transition-all duration-300 group-hover/item:scale-110 group-hover/item:bg-purple-500 group-hover/item:text-white">
                                <svg class="w-6 h-6 text-purple-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-black text-gray-900 group-hover/item:text-purple-600 transition-colors text-base truncate">SHGs List</p>
                                <p class="text-[10px] text-gray-500 font-medium">Directory of Self Help Groups</p>
                            </div>
                        </a>
                        
                        <!-- PACS Directory Link -->
                        <a href="{{ route('directory.pacs') }}" class="flex items-center space-x-4 p-4 rounded-3xl hover:bg-amber-50 transition-all group/item border border-transparent hover:border-amber-100">
                            <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center border border-amber-100 shadow-sm transition-all duration-300 group-hover/item:scale-110 group-hover/item:bg-amber-500 group-hover/item:text-white">
                                <svg class="w-6 h-6 text-amber-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-black text-gray-900 group-hover/item:text-amber-600 transition-colors text-base truncate">PACS Directory</p>
                                <p class="text-[10px] text-gray-500 font-medium">Agricultural Credit Societies</p>
                            </div>
                        </a>
                        
                        <!-- Cooperative Directory Link -->
                        <a href="{{ route('directory.cooperatives') }}" class="flex items-center space-x-4 p-4 rounded-3xl hover:bg-blue-50 transition-all group/item border border-transparent hover:border-blue-100">
                            <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center border border-blue-100 shadow-sm transition-all duration-300 group-hover/item:scale-110 group-hover/item:bg-blue-500 group-hover/item:text-white">
                                <svg class="w-6 h-6 text-blue-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="font-black text-gray-900 group-hover/item:text-blue-600 transition-colors text-base truncate">Cooperatives</p>
                                <p class="text-[10px] text-gray-500 font-medium">Rural Cooperative Societies</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <a href="{{ url('/#features') }}" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 hover:scale-105 transition-all font-bold text-sm tracking-widest uppercase">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                <span>Features</span>
            </a>

            <a href="{{ url('/#our-story') }}" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 hover:scale-105 transition-all font-bold text-sm tracking-widest uppercase">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                <span>Our Story</span>
            </a>

            <a href="{{ url('/#contact') }}" class="flex items-center space-x-2 text-gray-800 hover:text-green-600 hover:scale-105 transition-all font-bold text-sm tracking-widest uppercase">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                <span>Contact</span>
            </a>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center space-x-4">
            @auth
                <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-emerald-600 to-teal-700 text-white px-6 py-2.5 rounded-full font-bold text-xs shadow-lg transform hover:scale-110 active:scale-95 transition-all flex items-center space-x-2 border border-emerald-400/30">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span class="tracking-widest uppercase">Dashboard</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="bg-gradient-to-r from-purple-600 to-indigo-700 text-white px-6 py-2.5 rounded-full font-bold text-xs shadow-lg transform hover:scale-110 active:scale-95 transition-all flex items-center space-x-2 border border-purple-400/30">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                    <span class="tracking-widest uppercase">Login</span>
                </a>
                <a href="{{ route('register.select') }}" class="bg-gradient-to-r from-yellow-400 to-orange-500 text-green-950 px-6 py-2.5 rounded-full font-black text-xs shadow-xl transform hover:scale-110 active:scale-95 transition-all flex items-center space-x-2 border-2 border-white/50">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                    <span class="tracking-widest uppercase">Register</span>
                </a>
            @endauth
        </div>

        <!-- Mobile Toggle -->
        <div class="lg:hidden">
            <button type="button" class="text-gray-800 p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>
    </div>
</nav>


