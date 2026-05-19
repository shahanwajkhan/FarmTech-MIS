@extends('layouts.app')

@section('content')
<div class="min-h-screen py-32 flex items-center justify-center relative overflow-hidden bg-[#f8fafc]">
    <!-- Dynamic Glassmorphism Background Elements -->
    <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-purple-300/30 rounded-full blur-[120px] -mr-96 -mt-96 animate-pulse"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-teal-300/30 rounded-full blur-[100px] -ml-64 -mb-64"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-emerald-200/20 rounded-full blur-[150px] mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03] pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <div class="mb-20 relative">
            <h1 class="text-5xl md:text-7xl font-black text-gray-900 mb-6 tracking-tighter drop-shadow-sm">
                Start Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-teal-500">Journey</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto font-medium">Choose the role that best defines your contribution to India's agricultural transformation.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto">
            <!-- Farmer Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-emerald-500 opacity-0 group-hover:opacity-10 transition-opacity duration-500 rounded-[3.5rem] blur-2xl"></div>
                <div class="relative bg-white/70 backdrop-blur-2xl rounded-[3.5rem] p-12 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/60 hover:border-emerald-200 transform hover:-translate-y-4 transition-all duration-500 flex flex-col h-full group-hover:shadow-[0_30px_60px_rgba(16,185,129,0.15)]">
                    <div class="w-24 h-24 bg-gradient-to-br from-emerald-100 to-emerald-200 rounded-[2rem] flex items-center justify-center text-emerald-600 mb-10 group-hover:from-emerald-500 group-hover:to-teal-500 group-hover:text-white transition-all duration-500 shadow-inner mx-auto border-4 border-white">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-3xl font-black text-black mb-4 tracking-tighter">Farmer</h3>
                    <p class="text-gray-500 font-bold mb-10 leading-relaxed text-sm">Direct market access, government schemes, and crop management tools for individual farmers.</p>
                    
                    <div class="space-y-4 mb-12 flex-1">
                        <div class="flex items-center space-x-3 text-left">
                            <div class="w-7 h-7 rounded-lg bg-emerald-50 border-2 border-black flex items-center justify-center text-emerald-600">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-[10px] font-black text-gray-800 uppercase tracking-widest">Crop Advisories</span>
                        </div>
                        <div class="flex items-center space-x-3 text-left">
                            <div class="w-7 h-7 rounded-lg bg-emerald-50 border-2 border-black flex items-center justify-center text-emerald-600">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-[10px] font-black text-gray-800 uppercase tracking-widest">Market Access</span>
                        </div>
                    </div>

                    <a href="{{ route('register.farmer') }}" class="w-full py-5 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-500 text-white border-4 border-transparent hover:border-emerald-200 font-black shadow-[0_10px_30px_-10px_rgba(16,185,129,0.5)] hover:shadow-[0_20px_40px_-10px_rgba(16,185,129,0.7)] transition-all transform hover:-translate-y-2 uppercase tracking-widest text-[12px] text-center block">Join as Farmer</a>
                </div>
            </div>

            <!-- SHG Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-purple-500 opacity-0 group-hover:opacity-10 transition-opacity duration-500 rounded-[3.5rem] blur-2xl"></div>
                <div class="relative bg-white/70 backdrop-blur-2xl rounded-[3.5rem] p-12 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/60 hover:border-purple-200 transform hover:-translate-y-4 transition-all duration-500 flex flex-col h-full group-hover:shadow-[0_30px_60px_rgba(168,85,247,0.15)]">
                    <div class="w-24 h-24 bg-gradient-to-br from-purple-100 to-purple-200 rounded-[2rem] flex items-center justify-center text-purple-600 mb-10 group-hover:from-purple-500 group-hover:to-indigo-500 group-hover:text-white transition-all duration-500 shadow-inner mx-auto border-4 border-white">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-3xl font-black text-black mb-4 tracking-tighter">SHG</h3>
                    <p class="text-gray-500 font-bold mb-10 leading-relaxed text-sm">Financial empowerment, micro-credit management, and collective trade for Self Help Groups.</p>
                    
                    <div class="space-y-4 mb-12 flex-1">
                        <div class="flex items-center space-x-3 text-left">
                            <div class="w-7 h-7 rounded-lg bg-teal-50 border-2 border-black flex items-center justify-center text-teal-600">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-[10px] font-black text-gray-800 uppercase tracking-widest">Credit Monitoring</span>
                        </div>
                        <div class="flex items-center space-x-3 text-left">
                            <div class="w-7 h-7 rounded-lg bg-teal-50 border-2 border-black flex items-center justify-center text-teal-600">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-[10px] font-black text-gray-800 uppercase tracking-widest">Collective Sales</span>
                        </div>
                    </div>

                    <a href="{{ route('register.shg') }}" class="w-full py-5 rounded-2xl bg-gradient-to-r from-purple-500 to-indigo-500 text-white border-4 border-transparent hover:border-purple-200 font-black shadow-[0_10px_30px_-10px_rgba(168,85,247,0.5)] hover:shadow-[0_20px_40px_-10px_rgba(168,85,247,0.7)] transition-all transform hover:-translate-y-2 uppercase tracking-widest text-[12px] text-center block">Join as SHG</a>
                </div>
            </div>

            <!-- FPO Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-orange-500 opacity-0 group-hover:opacity-10 transition-opacity duration-500 rounded-[3.5rem] blur-2xl"></div>
                <div class="relative bg-white/70 backdrop-blur-2xl rounded-[3.5rem] p-12 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white/60 hover:border-orange-200 transform hover:-translate-y-4 transition-all duration-500 flex flex-col h-full group-hover:shadow-[0_30px_60px_rgba(249,115,22,0.15)]">
                    <div class="w-24 h-24 bg-gradient-to-br from-orange-100 to-orange-200 rounded-[2rem] flex items-center justify-center text-orange-600 mb-10 group-hover:from-orange-500 group-hover:to-red-500 group-hover:text-white transition-all duration-500 shadow-inner mx-auto border-4 border-white">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-3xl font-black text-black mb-4 tracking-tighter">FPO/FPG</h3>
                    <p class="text-gray-500 font-bold mb-10 leading-relaxed text-sm">Enterprise-grade management for Farmer Producer Organizations and Companies.</p>
                    
                    <div class="space-y-4 mb-12 flex-1">
                        <div class="flex items-center space-x-3 text-left">
                            <div class="w-7 h-7 rounded-lg bg-emerald-50 border-2 border-black flex items-center justify-center text-emerald-700">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-[10px] font-black text-gray-800 uppercase tracking-widest">Supply Chain ERP</span>
                        </div>
                        <div class="flex items-center space-x-3 text-left">
                            <div class="w-7 h-7 rounded-lg bg-emerald-50 border-2 border-black flex items-center justify-center text-emerald-700">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            </div>
                            <span class="text-[10px] font-black text-gray-800 uppercase tracking-widest">Inventory Control</span>
                        </div>
                    </div>

                    <a href="{{ route('register.fpo') }}" class="w-full py-5 rounded-2xl bg-gradient-to-r from-orange-500 to-red-500 text-white border-4 border-transparent hover:border-orange-200 font-black shadow-[0_10px_30px_-10px_rgba(249,115,22,0.5)] hover:shadow-[0_20px_40px_-10px_rgba(249,115,22,0.7)] transition-all transform hover:-translate-y-2 uppercase tracking-widest text-[12px] text-center block">Join as FPO</a>
                </div>
            </div>
        </div>

        <div class="mt-20 relative z-10">
            <div class="inline-flex items-center justify-center px-10 py-5 rounded-full bg-white/40 backdrop-blur-xl border border-white/80 shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:bg-white/60 hover:shadow-[0_15px_40px_rgb(0,0,0,0.1)] transition-all duration-300 transform hover:-translate-y-1">
                <p class="text-gray-700 font-bold text-lg tracking-wide drop-shadow-sm">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="ml-2 font-black text-emerald-600 hover:text-emerald-500 transition-colors duration-300 underline underline-offset-8 decoration-emerald-300/50 hover:decoration-emerald-500">Sign In here</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
