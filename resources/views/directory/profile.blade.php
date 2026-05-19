@extends('layouts.app')

@section('content')
<div class="min-h-screen pb-24" style="background-color: #f8fafc;">
    <!-- Profile Hero (Robust Style) -->
    <section class="relative pt-32 pb-64 overflow-hidden" style="background-color: #064e3b; color: white;">
        <div class="absolute inset-0 z-0 opacity-20">
            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" alt="Banner" class="w-full h-full object-cover">
            <div class="absolute inset-0" style="background: linear-gradient(to top, #064e3b 0%, rgba(6,78,59,0.7) 100%);"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col lg:flex-row items-center lg:items-end gap-12">
                <div class="w-48 h-48 bg-white rounded-[3rem] p-4 shadow-2xl flex items-center justify-center transform hover:scale-105 transition-transform border-4 border-white/20" style="background-color: white;">
                    @if($type === 'fpo')
                        <div class="w-full h-full bg-emerald-50 rounded-[2.5rem] flex items-center justify-center text-emerald-600">
                            <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                    @elseif($type === 'shg')
                        <div class="w-full h-full bg-purple-50 rounded-[2.5rem] flex items-center justify-center text-purple-600">
                            <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                    @elseif($type === 'pacs')
                        <div class="w-full h-full bg-amber-50 rounded-[2.5rem] flex items-center justify-center text-amber-600">
                            <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    @else
                        <div class="w-full h-full bg-blue-50 rounded-[2.5rem] flex items-center justify-center text-blue-600">
                            <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                    @endif
                </div>
                
                <div class="text-center lg:text-left flex-1 space-y-4">
                    <div class="flex flex-col lg:flex-row lg:items-center gap-4">
                        <h1 class="text-5xl lg:text-7xl font-black text-white leading-tight" style="color: white !important; font-weight: 900;">{{ $item->name ?? $item->group_name }}</h1>
                        @if($item->verified)
                        <div class="inline-flex items-center bg-emerald-500 text-white px-6 py-2 rounded-full text-xs font-black uppercase tracking-widest shadow-xl border border-white/30">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            Verified Organization
                        </div>
                        @endif
                    </div>
                    <div class="flex flex-wrap justify-center lg:justify-start gap-6 text-xl font-bold text-green-300">
                        <span class="flex items-center"><svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>{{ $item->district }}, {{ $item->state }}</span>
                        <span class="flex items-center"><svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>Reg No: FT-{{ rand(1000, 9999) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Overlap -->
    <div class="container mx-auto px-4 -mt-32 relative z-20">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            <div class="bg-white p-10 rounded-[3rem] shadow-2xl border border-gray-100 text-center flex flex-col items-center justify-center transform hover:-translate-y-2 transition-transform duration-500">
                <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-4 shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <p class="text-4xl font-black text-gray-900 mb-1">{{ number_format($item->member_count ?? $item->members_count ?? 0) }}</p>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Active Members</p>
            </div>
            <div class="bg-white p-10 rounded-[3rem] shadow-2xl border border-gray-100 text-center flex flex-col items-center justify-center transform hover:-translate-y-2 transition-transform duration-500">
                <div class="w-16 h-16 bg-pink-50 rounded-2xl flex items-center justify-center text-pink-600 mb-4 shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <p class="text-4xl font-black text-gray-900 mb-1">{{ number_format($item->women_members ?? 0) }}</p>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Women Led</p>
            </div>
            <div class="bg-white p-10 rounded-[3rem] shadow-2xl border border-gray-100 text-center flex flex-col items-center justify-center transform hover:-translate-y-2 transition-transform duration-500">
                <div class="w-16 h-16 bg-yellow-50 rounded-2xl flex items-center justify-center text-yellow-600 mb-4 shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-4xl font-black text-gray-900 mb-1">₹{{ number_format(($item->member_count ?? 50) * 1250 / 100000, 1) }}L</p>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Yearly Turnover</p>
            </div>
            <div class="bg-white p-10 rounded-[3rem] shadow-2xl border border-gray-100 text-center flex flex-col items-center justify-center transform hover:-translate-y-2 transition-transform duration-500">
                <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 mb-4 shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <p class="text-4xl font-black text-gray-900 mb-1">{{ $item->registration_year ?? $item->formation_year ?? 2020 }}</p>
                <p class="text-xs font-black text-gray-400 uppercase tracking-widest">Est. Since</p>
            </div>
        </div>
    </div>

    <!-- Details Grid -->
    <main class="container mx-auto px-4 mt-16 flex flex-col lg:flex-row gap-12">
        <div class="lg:w-2/3 space-y-12">
            <!-- About Section -->
            <div class="bg-white rounded-[4rem] p-12 shadow-2xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-8 flex items-center gap-4">
                    <div class="w-12 h-12 bg-emerald-900 text-white rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    Mission & History
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed font-medium mb-10">
                    {{ $item->description ?? "This organization is a collective powerhouse established to empower local farmers by providing direct market access, technical training, and financial stability. By pooling resources and produce, members achieve economies of scale previously unreachable individually." }}
                </p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($item->activities ?? ['Collective Harvesting', 'Primary Processing', 'Market Research', 'Skill Training'] as $act)
                    <div class="p-6 bg-emerald-50 rounded-[2rem] text-center border border-emerald-100">
                        <span class="text-xs font-black text-emerald-800 uppercase tracking-widest">{{ $act }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Featured Products -->
            <div class="bg-white rounded-[4rem] p-12 shadow-2xl border border-gray-100">
                <h2 class="text-3xl font-black text-gray-900 mb-10 flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-600 text-white rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    Key Deliverables
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($item->products ?? ['Organic Rice', 'Seasonal Fruits', 'Dairy Products', 'Handicrafts'] as $prod)
                    <div class="group flex items-center gap-6 p-8 rounded-[3rem] bg-gray-50 border border-transparent hover:border-blue-200 hover:bg-white transition-all duration-500">
                        <div class="w-20 h-20 bg-white rounded-[2rem] shadow-md flex items-center justify-center group-hover:scale-110 group-hover:rotate-6 transition-all">
                            <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-2xl font-black text-gray-900">{{ $prod }}</h4>
                            <p class="text-xs font-black text-blue-500 uppercase tracking-widest mt-1">Export Quality</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sidebar Actions -->
        <div class="lg:w-1/3 space-y-12">
            <!-- Growth Chart -->
            <div class="bg-white rounded-[4rem] p-10 shadow-2xl border border-gray-100">
                <h3 class="text-xl font-black text-gray-900 mb-8">Membership Growth</h3>
                <div class="h-64">
                    <canvas id="growthChart"></canvas>
                </div>
            </div>

            <!-- Contact Box -->
            <div class="bg-emerald-900 rounded-[4rem] p-12 shadow-2xl text-white relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-[60px]"></div>
                <h3 class="text-2xl font-black mb-10">Connect With Us</h3>
                <div class="space-y-8">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase text-emerald-400 tracking-widest mb-1">Direct Call</p>
                            <p class="text-lg font-bold">+91 {{ $item->phone ?? '98765 43210' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-black uppercase text-emerald-400 tracking-widest mb-1">Send Email</p>
                            <p class="text-lg font-bold lowercase">{{ $item->email ?? 'info@farmtech.org' }}</p>
                        </div>
                    </div>
                </div>
                <button class="w-full mt-12 bg-white text-emerald-900 py-5 rounded-[2rem] font-black shadow-xl hover:bg-green-50 transition-all transform active:scale-95 uppercase tracking-widest text-sm">
                    Inquire Collaboration
                </button>
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('growthChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['2020', '2021', '2022', '2023', '2024'],
                datasets: [{
                    label: 'Membership',
                    data: [{{ rand(50, 100) }}, {{ rand(150, 300) }}, {{ rand(400, 600) }}, {{ rand(700, 900) }}, {{ $item->member_count ?? 1000 }}],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16,185,129,0.1)',
                    fill: true,
                    tension: 0.5,
                    borderWidth: 4,
                    pointRadius: 5,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#10b981',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { grid: { display: false }, ticks: { display: false } },
                    x: { grid: { display: false }, ticks: { font: { weight: 'bold' } } }
                }
            }
        });
    });
</script>
@endsection
