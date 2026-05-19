<!-- Sidebar component with mobile drawer support -->
<aside id="sidebar-drawer" class="fixed top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full lg:translate-x-0 duration-300 select-none" aria-label="Sidebar">

    <!-- Glass background -->
    <div class="h-full w-full shadow-2xl flex flex-col relative overflow-hidden" style="background: linear-gradient(175deg, #ecfdf5 0%, #d1fae5 40%, #a7f3d0 100%); border-right: 2px solid #6ee7b7;">

        <!-- Subtle glow blobs -->
        <div class="absolute top-0 right-0 w-48 h-48 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-20 left-0 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Scrolling Nav Container -->
        <div class="flex-1 overflow-y-auto no-scrollbar px-4 py-5 flex flex-col gap-5 relative z-10">

            <!-- ── Branding Header ── -->
            <div class="flex items-center gap-3 px-2 pb-4 border-b border-white/5">
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-emerald-400 to-purple-600 p-[2px] flex-shrink-0 shadow-lg shadow-emerald-500/20">
                    <div class="w-full h-full bg-slate-950 rounded-[14px] flex items-center justify-center font-black text-emerald-400 text-base tracking-tight">
                        FT
                    </div>
                </div>
                <div>
                    <h3 class="font-black tracking-tight leading-none text-base" style="color: #065f46;">FarmTech MIS</h3>
                    <span class="text-[10px] uppercase tracking-[0.15em] font-black block mt-1 leading-none" style="color: #059669;">SHG Portal</span>
                </div>
            </div>

            <!-- ── Profile Card ── -->
            <div class="p-3.5 rounded-2xl border flex items-center gap-3" style="background: rgba(255,255,255,0.6); border-color: rgba(16,185,129,0.3); backdrop-filter: blur(8px);">
                <div class="w-11 h-11 rounded-full bg-gradient-to-tr from-emerald-500 to-purple-600 p-[2px] flex-shrink-0 shadow-md">
                    <div class="w-full h-full rounded-full bg-slate-900 flex items-center justify-center font-black text-emerald-400 text-base">
                        MS
                    </div>
                </div>
                <div class="min-w-0">
                    <h4 class="text-sm font-black tracking-tight leading-tight truncate" style="color: #064e3b;">{{ auth()->user()->name ?? 'Maa Shakti SHG' }}</h4>
                    <p class="text-xs font-bold block mt-0.5 leading-none" style="color: #059669;">Kalyan Village</p>
                </div>
            </div>

            <!-- ── Nav Links ── -->
            <nav>
                <p class="text-[10px] font-black uppercase tracking-[0.18em] px-3 mb-2" style="color: #047857;">Main Menu</p>
                <ul class="space-y-1">
                    <!-- Dashboard -->
                    <li>
                        <a href="#overview" onclick="switchTab('overview', event)" class="sidebar-link flex items-center gap-3 px-3 py-3 rounded-2xl font-extrabold text-sm tracking-tight transition-all duration-200 group active-tab" style="color: #065f46;">
                            <span class="text-xl flex-shrink-0">🎛️</span>
                            <span class="flex-1">Dashboard</span>
                        </a>
                    </li>
                    
                    <!-- Value Addition -->
                    <li>
                        <a href="#value-addition" onclick="switchTab('value-addition', event)" class="sidebar-link flex items-center gap-3 px-3 py-3 rounded-2xl font-extrabold text-sm tracking-tight transition-all duration-200 group" style="color: #065f46;">
                            <span class="text-xl flex-shrink-0">🥫</span>
                            <span class="flex-1">Product Value Add</span>
                        </a>
                    </li>

                    <!-- Marketplace -->
                    <li>
                        <a href="#marketplace" onclick="switchTab('marketplace', event)" class="sidebar-link flex items-center gap-3 px-3 py-3 rounded-2xl font-extrabold text-sm tracking-tight transition-all duration-200 group" style="color: #065f46;">
                            <span class="text-xl flex-shrink-0">🛒</span>
                            <span class="flex-1">Marketplace</span>
                        </a>
                    </li>

                    <!-- Inventory -->
                    <li>
                        <a href="#inventory" onclick="switchTab('inventory', event)" class="sidebar-link flex items-center gap-3 px-3 py-3 rounded-2xl font-extrabold text-sm tracking-tight transition-all duration-200 group" style="color: #065f46;">
                            <span class="text-xl flex-shrink-0">📦</span>
                            <span class="flex-1">Inventory</span>
                        </a>
                    </li>


                    <!-- Rankings -->
                    <li>
                        <a href="#rankings" onclick="switchTab('rankings', event)" class="sidebar-link flex items-center gap-3 px-3 py-3 rounded-2xl font-extrabold text-sm tracking-tight transition-all duration-200 group" style="color: #065f46;">
                            <span class="text-xl flex-shrink-0">🏆</span>
                            <span class="flex-1">Rankings</span>
                        </a>
                    </li>

                    <!-- Processing Unit -->
                    <li>
                        <a href="#processing" onclick="switchTab('processing', event)" class="sidebar-link flex items-center gap-3 px-3 py-3 rounded-2xl font-extrabold text-sm tracking-tight transition-all duration-200 group" style="color: #065f46;">
                            <span class="text-xl flex-shrink-0">🏭</span>
                            <span class="flex-1">Processing Unit</span>
                        </a>
                    </li>

                    <!-- Business Incubation -->
                    <li>
                        <a href="#incubation" onclick="switchTab('incubation', event)" class="sidebar-link flex items-center gap-3 px-3 py-3 rounded-2xl font-extrabold text-sm tracking-tight transition-all duration-200 group" style="color: #065f46;">
                            <span class="text-xl flex-shrink-0">💡</span>
                            <span class="flex-1">Incubation</span>
                        </a>
                    </li>


                </ul>

                <!-- Divider -->
                <div class="h-px my-4 mx-3" style="background: rgba(16,185,129,0.25);"></div>

                <p class="text-[10px] font-black uppercase tracking-[0.18em] px-3 mb-2" style="color: #047857;">Tools</p>
                <ul class="space-y-1">
                    <!-- Reports -->
                    <li>
                        <button onclick="printSHGReport()" class="w-full sidebar-link flex items-center gap-3 px-3 py-3 rounded-2xl font-extrabold text-sm tracking-tight transition-all duration-200 group text-left focus:outline-none" style="color: #065f46;">
                            <span class="text-xl flex-shrink-0">🧾</span>
                            <span class="flex-1">Quick Print Reports</span>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- ── Footer: PWA Badge ── -->
        <div class="px-4 pb-5 space-y-3 relative z-10 border-t border-white/5 pt-4">
            <!-- PWA Sync Badge -->
            <div class="flex items-center justify-center gap-2 py-2.5 rounded-2xl" style="background:rgba(16,185,129,0.1); border: 1px solid rgba(16,185,129,0.25);">
                <span class="h-2 w-2 rounded-full animate-pulse" style="background:#34d399; box-shadow: 0 0 6px rgba(52,211,153,0.6);"></span>
                <span class="text-[10px] font-black uppercase tracking-[0.15em]" style="color:#34d399;">PWA Sync Enabled</span>
            </div>
        </div>
    </div>
</aside>

<!-- Background backdrop for mobile sidebar drawer -->
<div id="sidebar-backdrop" onclick="toggleSidebar()" class="fixed inset-0 z-30 bg-gray-900/60 backdrop-blur-sm lg:hidden hidden"></div>

<style>
    /* Active tab — solid emerald highlight on light green bg */
    .active-tab {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
        color: #fff !important;
        border-left: none !important;
        border-radius: 14px !important;
        box-shadow: 0 4px 16px rgba(16,185,129,0.35), 0 1px 4px rgba(16,185,129,0.2);
        font-weight: 900 !important;
    }

    /* Hover state for non-active links on light bg */
    .sidebar-link:not(.active-tab):hover {
        background: rgba(16,185,129,0.12) !important;
        color: #065f46 !important;
        border-radius: 14px;
    }

    /* No scrollbar */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
