@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center relative overflow-hidden bg-[#f8fafc] font-outfit" style="padding-top: 60px; padding-bottom: 80px;">
    <!-- Background Accents -->
    <div class="absolute top-0 left-0 w-[800px] h-[800px] bg-emerald-400/20 rounded-full blur-[120px] -ml-48 -mt-48 animate-pulse pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[1000px] h-[1000px] bg-teal-400/10 rounded-full blur-[150px] -mr-64 -mb-64 pointer-events-none"></div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03] pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-5xl mx-auto">
            
            <!-- Header section matching FPO -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center space-x-3 bg-emerald-50 text-emerald-700 px-6 py-2 rounded-full font-bold text-sm tracking-widest uppercase mb-6 border border-emerald-100 shadow-sm">
                    <svg class="w-5 h-5 text-emerald-500 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span>Farmer Profile Identity</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-black text-gray-900 mb-4 tracking-tighter">
                    Farmer <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-teal-500">Registration</span>
                </h1>
                <p class="text-xl text-gray-500 font-medium max-w-2xl mx-auto">Register to access agriculture services and government schemes.</p>
            </div>

            <!-- Main Form Container matching FPO -->
            <div class="bg-white/90 backdrop-blur-2xl rounded-[3rem] shadow-2xl border border-white/50 p-8 md:p-12 relative overflow-hidden">
                
                @if ($errors->any())
                    <div class="mb-8 bg-red-50 rounded-2xl p-6 border-l-4 border-red-500">
                        <h4 class="font-black text-red-800 text-sm uppercase tracking-widest mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            Please resolve validation errors
                        </h4>
                        <ul class="list-disc pl-5 text-sm text-red-700 font-bold space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.farmer') }}" enctype="multipart/form-data" autocomplete="off" class="space-y-10">
                    @csrf
                    <!-- Prevent browser auto-fill -->
                    <input type="text" style="display:none;" autocomplete="off" />
                    <input type="email" style="display:none;" autocomplete="off" />
                    <input type="password" style="display:none;" autocomplete="new-password" />

                    <!-- PERSONAL DETAILS -->
                    <div>
                        <h3 class="text-xl font-black text-emerald-800 mb-6 border-b-2 border-emerald-100 pb-2">Personal Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Full Name <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                    <input type="text" name="name" required autocomplete="off" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="Enter your full name" style="padding-left: 66px;">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Mobile Number <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    </div>
                                    <input type="tel" name="mobile" required pattern="[0-9]{10}" autocomplete="off" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="10-digit number" style="padding-left: 66px;">
                                </div>
                            </div>

                            <div class="space-y-2 md:col-span-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Email Address <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <input type="email" name="email" required autocomplete="off" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="farmer@example.com" style="padding-left: 66px;">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Password <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                    </div>
                                    <input type="password" name="password" required autocomplete="new-password" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="Min. 8 characters" style="padding-left: 66px;">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Confirm Password <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                    </div>
                                    <input type="password" name="password_confirmation" required autocomplete="new-password" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="Confirm your password" style="padding-left: 66px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ADDRESS DETAILS -->
                    <div>
                        <h3 class="text-xl font-black text-emerald-800 mb-6 border-b-2 border-emerald-100 pb-2">Address Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">State <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <input type="text" name="state" required autocomplete="off" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="State" style="padding-left: 66px;">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">District <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </div>
                                    <input type="text" name="district" required autocomplete="off" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="District" style="padding-left: 66px;">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Village/City <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    </div>
                                    <input type="text" name="village" required autocomplete="off" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="Village" style="padding-left: 66px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FARM DETAILS -->
                    <div>
                        <h3 class="text-xl font-black text-emerald-800 mb-6 border-b-2 border-emerald-100 pb-2">Farm Details</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Land Area (Acres) <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                                    </div>
                                    <input type="number" step="0.01" name="land_area" required class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="e.g., 2.5" style="padding-left: 66px;">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Main Crop Type <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                    </div>
                                    <input type="text" name="crop_type" required autocomplete="off" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="e.g., Wheat, Rice" style="padding-left: 66px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- OTHER INFORMATION -->
                    <div>
                        <h3 class="text-xl font-black text-emerald-800 mb-6 border-b-2 border-emerald-100 pb-2">Other Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">SHG/FPO Member? <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </div>
                                    <select name="shg_fpo_member" required class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-10 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 appearance-none" style="padding-left: 66px;">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                    <div style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #9ca3af;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Farmer Photo</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <input type="file" name="profile_photo" accept="image/*" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 transition-all text-gray-800 file:hidden cursor-pointer" style="padding-left: 66px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BUTTONS -->
                    <div class="flex items-center justify-between pt-10 border-t border-gray-100">
                        <button type="reset" class="px-8 py-4 text-gray-500 font-black tracking-widest uppercase text-sm hover:text-gray-900 transition-colors">
                            Reset Form
                        </button>
                        
                        <button type="submit" class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-10 py-4 rounded-2xl font-black shadow-[0_8px_30px_rgb(16,185,129,0.3)] hover:shadow-[0_8px_30px_rgb(16,185,129,0.5)] transition-all uppercase tracking-widest text-sm flex items-center space-x-2 transform hover:-translate-y-1">
                            <span>Register Farmer</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>

                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection
