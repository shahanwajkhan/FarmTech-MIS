@extends('layouts.app')

@section('content')
<div class="min-h-screen pb-24" style="background-color: #f8fafc;">
    <!-- Robust Analytics Hero -->
    <section class="relative pt-32 pb-48 overflow-hidden" style="background-color: #064e3b; color: white;">
        <div class="absolute inset-0 z-0 opacity-10">
            <svg class="h-full w-full" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs><pattern id="grid-pattern-ana" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1" /></pattern></defs>
                <rect width="100%" height="100%" fill="url(#grid-pattern-ana)" />
            </svg>
        </div>
        
        <div class="container mx-auto px-4 relative z-10 text-center">
            <div class="inline-flex items-center space-x-2 px-4 py-2 bg-white/10 rounded-full border border-white/20 mb-8 backdrop-blur-md">
                <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                <span class="text-xs font-black uppercase tracking-widest text-green-300">Live National Analytics</span>
            </div>
            <h1 class="text-5xl md:text-8xl font-black mb-8 leading-none" style="color: white !important; font-weight: 900;">Empowerment in Data</h1>
            <p class="text-xl text-green-300 font-bold max-w-3xl mx-auto mb-16" style="color: #86efac !important;">Visualizing the transformation of Indian agriculture through collective strength, technology, and transparency.</p>
            
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
                <div class="p-8 bg-white/10 backdrop-blur-lg rounded-[3rem] border border-white/20 shadow-2xl group hover:bg-white/20 transition-all cursor-default">
                    <p class="text-5xl font-black text-white mb-2" style="color: white !important;">2.4M</p>
                    <p class="text-[10px] uppercase tracking-widest font-black text-green-400">Total Beneficiaries</p>
                </div>
                <div class="p-8 bg-white/10 backdrop-blur-lg rounded-[3rem] border border-white/20 shadow-2xl group hover:bg-white/20 transition-all cursor-default">
                    <p class="text-5xl font-black text-white mb-2" style="color: white !important;">₹850Cr</p>
                    <p class="text-[10px] uppercase tracking-widest font-black text-pink-400">Rural Credit Flow</p>
                </div>
                <div class="p-8 bg-white/10 backdrop-blur-lg rounded-[3rem] border border-white/20 shadow-2xl group hover:bg-white/20 transition-all cursor-default">
                    <p class="text-5xl font-black text-white mb-2" style="color: white !important;">42%</p>
                    <p class="text-[10px] uppercase tracking-widest font-black text-yellow-400">Women Participation</p>
                </div>
                <div class="p-8 bg-white/10 backdrop-blur-lg rounded-[3rem] border border-white/20 shadow-2xl group hover:bg-white/20 transition-all cursor-default">
                    <p class="text-5xl font-black text-white mb-2" style="color: white !important;">15</p>
                    <p class="text-[10px] uppercase tracking-widest font-black text-blue-400">States Active</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Map & Stats -->
    <div class="container mx-auto px-4 -mt-24 relative z-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Map Visualization -->
            <div class="lg:col-span-2 space-y-12">
                <div class="bg-white rounded-[4rem] p-12 shadow-2xl border border-gray-100 flex flex-col h-full" style="background-color: white;">
                    <div class="flex items-center justify-between mb-12">
                        <div>
                            <h2 class="text-4xl font-black text-gray-900 mb-2">Geographical Presence</h2>
                            <p class="text-gray-400 font-bold uppercase tracking-widest text-[10px]">National Reach Index</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="flex -space-x-2">
                                <img src="https://i.pravatar.cc/100?u=1" class="w-10 h-10 rounded-full border-2 border-white shadow-sm">
                                <img src="https://i.pravatar.cc/100?u=2" class="w-10 h-10 rounded-full border-2 border-white shadow-sm">
                                <img src="https://i.pravatar.cc/100?u=3" class="w-10 h-10 rounded-full border-2 border-white shadow-sm">
                            </div>
                            <span class="text-xs font-black text-gray-900">420+ Partners Joined</span>
                        </div>
                    </div>
                    
                    <div class="flex-1 bg-gray-50 rounded-[4rem] relative overflow-hidden group cursor-crosshair border-2 border-dashed border-gray-200">
                        <!-- Abstract Map Visualization -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="relative w-[500px] h-[500px] opacity-20 transform -rotate-12 group-hover:rotate-0 transition-transform duration-1000">
                                <svg class="w-full h-full text-emerald-900" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </div>
                            <div class="relative z-10 text-center">
                                <p class="text-3xl font-black text-gray-900 mb-4">India Map Portal</p>
                                <p class="text-gray-500 font-bold max-w-sm mx-auto">Interacting with GIS layers... Select a state below to view localized saturation metrics.</p>
                                <button class="mt-8 px-10 py-4 bg-emerald-900 text-white rounded-[2rem] font-black shadow-2xl hover:bg-emerald-800 transition-all active:scale-95">Load Detailed Map</button>
                            </div>
                        </div>
                        
                        <!-- Floating State Card -->
                        <div class="absolute top-10 right-10 bg-white/90 backdrop-blur-md p-8 rounded-[3rem] shadow-2xl border border-white/50 w-64 transform translate-y-10 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                            <h4 class="text-2xl font-black text-gray-900 mb-4">Maharashtra</h4>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Active FPOs</p>
                                    <p class="text-xl font-black text-emerald-600">1,250</p>
                                </div>
                                <div>
                                    <p class="text-[9px] font-black text-gray-400 uppercase tracking-widest mb-1">Growth Score</p>
                                    <p class="text-xl font-black text-blue-600">8.4/10</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Ranking -->
            <div class="space-y-12">
                <div class="bg-white rounded-[4rem] p-10 shadow-2xl border border-gray-100" style="background-color: white;">
                    <h3 class="text-2xl font-black text-gray-900 mb-10">State Performance</h3>
                    <div class="space-y-8">
                        @foreach($stateWise as $index => $state)
                        <div class="group flex items-center justify-between p-4 rounded-3xl hover:bg-gray-50 transition-colors border-2 border-transparent hover:border-emerald-100">
                            <div class="flex items-center gap-5">
                                <div class="w-12 h-12 rounded-2xl flex items-center justify-center font-black text-xl {{ $index < 3 ? 'bg-emerald-900 text-white shadow-lg shadow-emerald-200' : 'bg-gray-100 text-gray-400' }}">
                                    {{ $index + 1 }}
                                </div>
                                <div>
                                    <p class="text-lg font-black text-gray-900">{{ $state['name'] }}</p>
                                    <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">{{ $state['fpos'] }} FPOs Organized</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-black text-emerald-600">+{{ $state['growth'] }}</p>
                                <p class="text-[8px] font-black text-gray-400 uppercase tracking-widest">Growth</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-emerald-900 rounded-[4rem] p-12 shadow-2xl text-white relative overflow-hidden">
                    <div class="absolute -bottom-20 -left-20 w-60 h-60 bg-emerald-500 rounded-full blur-[80px] opacity-20"></div>
                    <h3 class="text-2xl font-black mb-10 relative z-10">Category Mix</h3>
                    <div class="h-64 relative z-10">
                        <canvas id="cropMixChart"></canvas>
                    </div>
                    <div class="mt-10 grid grid-cols-2 gap-4 relative z-10">
                        <div class="bg-white/10 p-4 rounded-3xl backdrop-blur-md">
                            <p class="text-[9px] font-black uppercase text-emerald-400 mb-1">Dominant</p>
                            <p class="font-bold">Organic Cereals</p>
                        </div>
                        <div class="bg-white/10 p-4 rounded-3xl backdrop-blur-md">
                            <p class="text-[9px] font-black uppercase text-emerald-400 mb-1">Rising</p>
                            <p class="font-bold">Value Addition</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Global Progress Chart -->
        <div class="mt-12 bg-white rounded-[4rem] p-16 shadow-2xl border border-gray-100" style="background-color: white;">
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-16 gap-8">
                <div>
                    <h2 class="text-4xl font-black text-gray-900 mb-2">5-Year Empowerment Trend</h2>
                    <p class="text-gray-400 font-bold uppercase tracking-widest text-[11px]">Cumulative Growth of Registered Organizations</p>
                </div>
                <div class="flex gap-4">
                    <div class="flex items-center gap-2">
                        <span class="w-4 h-4 bg-emerald-600 rounded-full shadow-sm"></span>
                        <span class="text-xs font-black text-gray-900 uppercase">FPOs</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-4 h-4 bg-blue-600 rounded-full shadow-sm"></span>
                        <span class="text-xs font-black text-gray-900 uppercase">SHGs</span>
                    </div>
                </div>
            </div>
            <div class="h-[400px]">
                <canvas id="globalTrendChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Global Trend Chart
        const trendCtx = document.getElementById('globalTrendChart').getContext('2d');
        new Chart(trendCtx, {
            type: 'line',
            data: {
                labels: ['2020', '2021', '2022', '2023', '2024'],
                datasets: [
                    {
                        label: 'FPOs',
                        data: [5000, 12000, 28000, 52000, 95000],
                        borderColor: '#065f46',
                        backgroundColor: 'transparent',
                        borderWidth: 6,
                        tension: 0.4,
                        pointRadius: 8,
                        pointBackgroundColor: '#065f46',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 4
                    },
                    {
                        label: 'SHGs',
                        data: [15000, 45000, 95000, 180000, 350000],
                        borderColor: '#2563eb',
                        backgroundColor: 'transparent',
                        borderWidth: 6,
                        tension: 0.4,
                        pointRadius: 8,
                        pointBackgroundColor: '#2563eb',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { grid: { borderDash: [10, 10], color: '#f1f5f9' }, ticks: { font: { weight: 'black', size: 12 } } },
                    x: { grid: { display: false }, ticks: { font: { weight: 'black', size: 12 } } }
                }
            }
        });

        // Crop Mix Chart
        const mixCtx = document.getElementById('cropMixChart').getContext('2d');
        new Chart(mixCtx, {
            type: 'doughnut',
            data: {
                labels: ['Cereals', 'Horticulture', 'Dairy', 'Organic'],
                datasets: [{
                    data: [45, 20, 20, 15],
                    backgroundColor: ['#fff', '#60a5fa', '#fbbf24', '#f472b6'],
                    borderWidth: 0,
                    hoverOffset: 15
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: { legend: { display: false } }
            }
        });
    });
</script>
@endsection
