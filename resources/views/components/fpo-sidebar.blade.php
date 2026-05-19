<!-- Desktop & Mobile Sidebar component with mobile drawer support -->
<aside id="sidebar-drawer" class="fixed top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full lg:translate-x-0 duration-300 select-none animate-fade-in" aria-label="Sidebar">

    <!-- Glass background -->
    <div class="h-full w-full shadow-2xl flex flex-col relative overflow-hidden" style="background: linear-gradient(175deg, #ecfdf5 0%, #d1fae5 40%, #a7f3d0 100%); border-right: 2px solid #6ee7b7;">

        <!-- Subtle glow blobs -->
        <div class="absolute top-0 right-0 w-48 h-48 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-20 left-0 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Scrolling Nav Container -->
        <div class="flex-1 overflow-y-auto no-scrollbar px-4 py-5 flex flex-col gap-5 relative z-10">

            <!-- ── Branding Header ── -->
            <div class="flex items-center gap-3 px-2 pb-4 border-b border-white/5 justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-emerald-400 to-purple-600 p-[2px] flex-shrink-0 shadow-lg shadow-emerald-500/20">
                        <div class="w-full h-full bg-slate-950 rounded-[14px] flex items-center justify-center font-black text-emerald-400 text-base tracking-tight">
                            FT
                        </div>
                    </div>
                    <div>
                        <h3 class="font-black tracking-tight leading-none text-base" style="color: #065f46;">FarmTech MIS</h3>
                        <span class="text-[10px] uppercase tracking-[0.15em] font-black block mt-1 leading-none" style="color: #059669;">FPO Portal</span>
                    </div>
                </div>
                <!-- Close Button (Mobile only) -->
                <button onclick="toggleSidebar()" class="lg:hidden p-1 rounded-lg bg-emerald-105 hover:bg-emerald-200 text-emerald-800 focus:outline-none">
                    <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- ── Profile Card ── -->
            <div class="p-3.5 rounded-2xl border flex items-center gap-3" style="background: rgba(255,255,255,0.6); border-color: rgba(16,185,129,0.3); backdrop-filter: blur(8px);">
                <div class="w-11 h-11 rounded-full bg-gradient-to-tr from-emerald-500 to-purple-600 p-[2px] flex-shrink-0 shadow-md">
                    <div class="w-full h-full rounded-full bg-slate-900 flex items-center justify-center font-black text-emerald-400 text-base">
                        GH
                    </div>
                </div>
                <div class="min-w-0">
                    <h4 class="text-sm font-black tracking-tight leading-tight truncate" style="color: #064e3b;">{{ auth()->user()->name ?? 'GreenHarvest FPO' }}</h4>
                    <p class="text-xs font-bold block mt-0.5 leading-none" style="color: #059669;">Patiala District Union</p>
                </div>
            </div>

            <!-- ── Nav Links ── -->
            <nav>
                <p class="text-[10px] font-black uppercase tracking-[0.18em] px-3 mb-2" style="color: #047857;">Main Menu</p>
                <ul class="space-y-1">
                    @php
                        $menuItems = [
                            ['href' => '#overview', 'label' => 'Dashboard', 'icon' => '🎛️'],
                            ['href' => '#farmers', 'label' => 'Farmer Management', 'icon' => '👨‍🌾'],
                            ['href' => '#pooling', 'label' => 'Crop Pooling Hub', 'icon' => '🤝'],
                            ['href' => '#logistics', 'label' => 'Logistics & Fleet', 'icon' => '🚚'],
                            ['href' => '#equipment', 'label' => 'Equipment Rental', 'icon' => '🚜'],
                            ['href' => '#gis', 'label' => 'GIS Farmer Map', 'icon' => '📍'],
                            ['href' => '#yield', 'label' => 'Yield Prediction', 'icon' => '📈'],
                            ['href' => '#orders', 'label' => 'Marketplace Orders', 'icon' => '📦'],
                            ['href' => '#reports', 'label' => 'Reports Center', 'icon' => '🧾'],
                        ];
                    @endphp

                    @foreach($menuItems as $item)
                        <li>
                            <a href="{{ $item['href'] }}" onclick="switchTab('{{ str_replace('#', '', $item['href']) }}', event)" class="sidebar-link flex items-center gap-3 px-3 py-3 rounded-2xl font-extrabold text-sm tracking-tight transition-all duration-200 group @if($item['href'] === '#overview') active-tab @endif" style="color: #065f46;">
                                <span class="text-xl flex-shrink-0">{{ $item['icon'] }}</span>
                                <span class="flex-1">{{ $item['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>

            </nav>
        </div>

        <!-- ── Footer: PWA Sync Badge ── -->
        <div class="px-4 pb-5 space-y-3 relative z-10 border-t border-white/5 pt-4">
            <div class="flex items-center justify-center gap-2 py-2.5 rounded-2xl" style="background:rgba(16,185,129,0.1); border: 1px solid rgba(16,185,129,0.25);">
                <span class="h-2 w-2 rounded-full animate-pulse" style="background:#059669; box-shadow: 0 0 6px rgba(16,185,129,0.6);"></span>
                <span class="text-[10px] font-black uppercase tracking-[0.15em]" style="color:#059669;">PWA Sync Enabled</span>
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
