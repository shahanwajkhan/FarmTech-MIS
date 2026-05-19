@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center relative overflow-hidden bg-[#f8fafc] font-outfit" x-data="farmerRegistration()" style="padding-top: 60px; padding-bottom: 80px;">
    <!-- Background Orbs -->
    <div class="absolute top-0 left-0 w-[800px] h-[800px] bg-emerald-400/20 rounded-full blur-[120px] -ml-48 -mt-48 animate-pulse pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[1000px] h-[1000px] bg-teal-400/10 rounded-full blur-[150px] -mr-64 -mb-64 pointer-events-none"></div>
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-[0.03] pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-5xl mx-auto">
            
            <div class="text-center mb-12">
                <div class="inline-flex items-center space-x-3 bg-emerald-50 text-emerald-700 px-6 py-2 rounded-full font-bold text-sm tracking-widest uppercase mb-6 border border-emerald-100 shadow-sm">
                    <svg class="w-5 h-5 text-emerald-500 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    <span>Smart Digital Identity</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-black text-gray-900 mb-4 tracking-tighter">
                    Farmer <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-teal-500">Registration</span>
                </h1>
                <p class="text-xl text-gray-500 font-medium max-w-2xl mx-auto">Complete your onboarding to access government schemes, crop analytics, and smart farming tools.</p>
            </div>

            <!-- Stepper -->
            <div class="mb-12 overflow-x-auto pb-4 hide-scrollbar">
                <div class="flex items-center justify-between min-w-[800px] relative">
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-gray-200 rounded-full z-0"></div>
                    <div class="absolute left-0 top-1/2 -translate-y-1/2 h-1 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-full z-0 transition-all duration-500" :style="'width: ' + ((step - 1) / 6 * 100) + '%'"></div>

                    <template x-for="i in 7" :key="i">
                        <div class="relative z-10 flex flex-col items-center group cursor-pointer" @click="if(i < step) step = i">
                            <div class="w-12 h-12 rounded-full flex items-center justify-center font-black text-lg transition-all duration-300 shadow-lg border-4 animate-all"
                                :class="step === i ? 'bg-emerald-500 text-white border-white scale-110 shadow-emerald-200' : (step > i ? 'bg-teal-500 text-white border-white' : 'bg-white text-gray-400 border-gray-100')">
                                <span x-show="step <= i" x-text="i"></span>
                                <svg x-show="step > i" class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="absolute top-14 whitespace-nowrap text-xs font-bold uppercase tracking-widest transition-colors duration-300"
                                :class="step === i ? 'text-emerald-600 font-black' : (step > i ? 'text-teal-600' : 'text-gray-400')" x-text="getStepName(i)"></span>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Main Form Container -->
            <div class="bg-white/90 backdrop-blur-2xl rounded-[40px] p-8 md:p-14 shadow-2xl border border-white/40">
                <form id="farmerForm" method="POST" action="/register/farmer" enctype="multipart/form-data" @submit="validateSubmit($event)" autocomplete="off">
                    @csrf
                    <!-- Prevent browser auto-fill -->
                    <input type="text" style="display:none;" autocomplete="off" />
                    <input type="email" style="display:none;" autocomplete="off" />
                    <input type="password" style="display:none;" autocomplete="new-password" />
                    
                    <!-- STEP 1: PERSONAL INFORMATION -->
                    <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0">
                        <h2 class="text-3xl font-black text-gray-900 mb-8 border-b-2 border-emerald-100 pb-4">Personal Information</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Full Name <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                    <input type="text" name="name" x-model="formData.name" required autocomplete="off" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="As per Aadhaar" style="padding-left: 66px;">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Father/Husband Name</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    </div>
                                    <input type="text" name="father_name" x-model="formData.father_name" autocomplete="off" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="Relative's Name" style="padding-left: 66px;">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Gender</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    </div>
                                    <select name="gender" x-model="formData.gender" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-10 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 appearance-none" style="padding-left: 66px;">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <div style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #9ca3af;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Date of Birth</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <input type="date" name="dob" x-model="formData.dob" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" style="padding-left: 66px;">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Mobile Number <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    </div>
                                    <input type="tel" name="mobile" x-model="formData.mobile" required autocomplete="off" pattern="[0-9]{10}" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="10-digit number" style="padding-left: 66px;">
                                </div>
                            </div>
                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Aadhaar Number</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                                    </div>
                                    <input type="text" name="aadhaar_number" x-model="formData.aadhaar_number" pattern="[0-9]{12}" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 tracking-widest" placeholder="XXXX XXXX XXXX" style="padding-left: 66px;">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">PAN Number</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                    </div>
                                    <input type="text" name="pan_number" x-model="formData.pan_number" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 uppercase" placeholder="ABCDE1234F" style="padding-left: 66px;">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Farmer Category</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    </div>
                                    <select name="farmer_category" x-model="formData.farmer_category" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-10 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 appearance-none" style="padding-left: 66px;">
                                        <option value="">Select Category</option>
                                        <option value="Marginal">Marginal (< 1 ha)</option>
                                        <option value="Small">Small (1-2 ha)</option>
                                        <option value="Medium">Medium (2-10 ha)</option>
                                        <option value="Large">Large (> 10 ha)</option>
                                    </select>
                                    <div style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #9ca3af;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Education</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                                    </div>
                                    <select name="education_level" x-model="formData.education_level" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-10 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 appearance-none" style="padding-left: 66px;">
                                        <option value="">Select Education</option>
                                        <option value="Primary">Primary</option>
                                        <option value="Secondary">Secondary</option>
                                        <option value="Graduate">Graduate</option>
                                        <option value="Agri Degree">Agriculture Degree</option>
                                    </select>
                                    <div style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #9ca3af;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Occupation</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <select name="occupation_type" x-model="formData.occupation_type" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-10 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 appearance-none" style="padding-left: 66px;">
                                        <option value="">Select Type</option>
                                        <option value="Full-Time">Full-Time Farmer</option>
                                        <option value="Part-Time">Part-Time Farmer</option>
                                        <option value="Dairy">Dairy Farmer</option>
                                        <option value="Poultry">Poultry Farmer</option>
                                    </select>
                                    <div style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #9ca3af;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2: ADDRESS INFORMATION -->
                    <div x-show="step === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" style="display: none;">
                        <h2 class="text-3xl font-black text-gray-900 mb-8 border-b-2 border-emerald-100 pb-4">Address Information</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">State <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <select name="state" x-model="formData.state" required class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-10 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 appearance-none" style="padding-left: 66px;">
                                        <option value="">Select State</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    </select>
                                    <div style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #9ca3af;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">District <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </div>
                                    <input type="text" name="district" x-model="formData.district" required class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="District Name" style="padding-left: 66px;">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Tehsil/Taluka</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </div>
                                    <input type="text" name="tehsil" x-model="formData.tehsil" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="Tehsil Name" style="padding-left: 66px;">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Village</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </div>
                                    <input type="text" name="village" x-model="formData.village" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="Village Name" style="padding-left: 66px;">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Pincode <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path></svg>
                                    </div>
                                    <input type="text" name="pincode" x-model="formData.pincode" required pattern="[0-9]{6}" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 tracking-widest" placeholder="123456" style="padding-left: 66px;">
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Full Address</label>
                            <div class="relative">
                                <div style="position: absolute; left: 12px; top: 16px; width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <textarea name="address" x-model="formData.address" rows="3" class="w-full bg-gray-50 border border-gray-200 rounded-2xl pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="House No, Street, Landmark" style="padding-left: 66px; padding-top: 24px;"></textarea>
                            </div>
                        </div>

                        <div class="bg-emerald-50 border border-emerald-100 rounded-[2rem] p-6 mt-8 flex items-center justify-between">
                            <div>
                                <h4 class="font-black text-emerald-900">GPS Location</h4>
                                <p class="text-sm text-emerald-700 font-medium">Pin your exact farm location for precise weather alerts.</p>
                            </div>
                            <button type="button" @click="getLocation()" class="bg-white text-emerald-600 px-6 py-3 rounded-xl font-bold shadow-sm hover:shadow-md transition-all border border-emerald-200 flex items-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"></path></svg>
                                <span x-text="formData.gps_location ? 'Location Captured' : 'Get Location'"></span>
                            </button>
                            <input type="hidden" name="gps_location" x-model="formData.gps_location">
                        </div>
                    </div>

                    <!-- STEP 3: FARM INFORMATION -->
                    <div x-show="step === 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" style="display: none;">
                        <h2 class="text-3xl font-black text-gray-900 mb-8 border-b-2 border-emerald-100 pb-4">Farm Information</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Total Land Area</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <input type="number" step="0.01" name="land_area" x-model="formData.land_area" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="0.00" style="padding-left: 66px;">
                                    <div class="absolute inset-y-0 right-0 pr-5 flex items-center pointer-events-none text-gray-400 font-bold">Acres</div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Soil Type</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                    </div>
                                    <select name="soil_type" x-model="formData.soil_type" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-10 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 appearance-none" style="padding-left: 66px;">
                                        <option value="">Select Soil Type</option>
                                        <option value="Alluvial">Alluvial</option>
                                        <option value="Black">Black Cotton</option>
                                        <option value="Red">Red & Yellow</option>
                                        <option value="Laterite">Laterite</option>
                                        <option value="Arid">Arid / Desert</option>
                                    </select>
                                    <div style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #9ca3af;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Irrigation Type</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                    </div>
                                    <select name="irrigation_type" x-model="formData.irrigation_type" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-10 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 appearance-none" style="padding-left: 66px;">
                                        <option value="">Select Irrigation</option>
                                        <option value="Rainfed">Rainfed</option>
                                        <option value="Canal">Canal</option>
                                        <option value="Tube Well">Tube Well</option>
                                        <option value="Drip">Drip / Micro</option>
                                        <option value="Sprinkler">Sprinkler</option>
                                    </select>
                                    <div style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #9ca3af;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-8">
                            <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2 mb-4 block">Major Crops Cultivated (Select Multiple)</label>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <template x-for="crop in ['Wheat', 'Rice', 'Maize', 'Cotton', 'Sugarcane', 'Vegetables', 'Fruits', 'Pulses']">
                                    <label class="flex items-center space-x-3 p-4 bg-white border-2 border-gray-100 rounded-2xl cursor-pointer hover:border-emerald-300 transition-all shadow-sm" :class="formData.crops.includes(crop) ? 'border-emerald-500 bg-emerald-50 ring-2 ring-emerald-200' : ''">
                                        <input type="checkbox" name="crops[]" :value="crop" x-model="formData.crops" class="hidden">
                                        <div class="w-6 h-6 rounded-md border-2 flex items-center justify-center transition-all" :class="formData.crops.includes(crop) ? 'bg-emerald-500 border-emerald-500 text-white' : 'border-gray-300'">
                                            <svg x-show="formData.crops.includes(crop)" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                        <span class="font-bold text-gray-700" x-text="crop"></span>
                                    </label>
                                </template>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Farming Method</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                                    </div>
                                    <select name="farming_method" x-model="formData.farming_method" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-10 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 appearance-none" style="padding-left: 66px;">
                                        <option value="Traditional">Traditional</option>
                                        <option value="Organic">Organic</option>
                                        <option value="Smart Farming">Smart Farming</option>
                                        <option value="Hydroponics">Hydroponics</option>
                                    </select>
                                    <div style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #9ca3af;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Ownership Type</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    </div>
                                    <select name="ownership_type" x-model="formData.ownership_type" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-10 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 appearance-none" style="padding-left: 66px;">
                                        <option value="Owner">Owner</option>
                                        <option value="Tenant">Tenant / Lease</option>
                                        <option value="Sharecropper">Sharecropper</option>
                                    </select>
                                    <div style="position: absolute; right: 16px; top: 50%; transform: translateY(-50%); pointer-events: none; color: #9ca3af;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Farming Experience</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <input type="number" name="farming_experience" x-model="formData.farming_experience" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="Years" style="padding-left: 66px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 4: FINANCIAL INFORMATION -->
                    <div x-show="step === 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" style="display: none;">
                        <h2 class="text-3xl font-black text-gray-900 mb-8 border-b-2 border-emerald-100 pb-4">Financial Information</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Bank Name</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                    </div>
                                    <input type="text" name="bank_name" x-model="formData.bank_name" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="e.g. State Bank of India" style="padding-left: 66px;">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Account Number</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                                    </div>
                                    <input type="text" name="account_number" x-model="formData.account_number" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 tracking-widest" placeholder="XXXXXXXXXXXX" style="padding-left: 66px;">
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">IFSC Code</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                                    </div>
                                    <input type="text" name="ifsc_code" x-model="formData.ifsc_code" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 uppercase" placeholder="SBIN0001234" style="padding-left: 66px;">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Annual Income (₹)</label>
                                <div class="relative">
                                    <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none; font-weight: 900; font-size: 1.25rem;">₹</div>
                                    <input type="number" name="annual_income" x-model="formData.annual_income" class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800" placeholder="500000" style="padding-left: 66px;">
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-[2rem] p-8 border border-gray-200">
                            <h4 class="font-black text-gray-900 mb-6 uppercase tracking-widest text-sm">Government Benefits</h4>
                            <div class="space-y-4">
                                <label class="flex items-center justify-between p-4 bg-white rounded-2xl shadow-sm border border-gray-100 cursor-pointer">
                                    <span class="font-bold text-gray-700">PM-KISAN Beneficiary</span>
                                    <div class="relative">
                                        <input type="checkbox" name="pm_kisan_beneficiary" x-model="formData.pm_kisan_beneficiary" class="sr-only">
                                        <div class="block bg-gray-200 w-14 h-8 rounded-full transition-colors duration-300" :class="formData.pm_kisan_beneficiary ? 'bg-emerald-500' : ''"></div>
                                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition-transform duration-300 shadow-md" :class="formData.pm_kisan_beneficiary ? 'transform translate-x-6' : ''"></div>
                                    </div>
                                </label>
                                <label class="flex items-center justify-between p-4 bg-white rounded-2xl shadow-sm border border-gray-100 cursor-pointer">
                                    <span class="font-bold text-gray-700">Has Kisan Credit Card (KCC)</span>
                                    <div class="relative">
                                        <input type="checkbox" name="kcc_status" x-model="formData.kcc_status" class="sr-only">
                                        <div class="block bg-gray-200 w-14 h-8 rounded-full transition-colors duration-300" :class="formData.kcc_status ? 'bg-emerald-500' : ''"></div>
                                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition-transform duration-300 shadow-md" :class="formData.kcc_status ? 'transform translate-x-6' : ''"></div>
                                    </div>
                                </label>
                                <label class="flex items-center justify-between p-4 bg-white rounded-2xl shadow-sm border border-gray-100 cursor-pointer">
                                    <span class="font-bold text-gray-700">Crop Insurance (PMFBY) Active</span>
                                    <div class="relative">
                                        <input type="checkbox" name="insurance_status" x-model="formData.insurance_status" class="sr-only">
                                        <div class="block bg-gray-200 w-14 h-8 rounded-full transition-colors duration-300" :class="formData.insurance_status ? 'bg-emerald-500' : ''"></div>
                                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition-transform duration-300 shadow-md" :class="formData.insurance_status ? 'transform translate-x-6' : ''"></div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 5: DOCUMENTS UPLOAD -->
                    <div x-show="step === 5" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" style="display: none;">
                        <h2 class="text-3xl font-black text-gray-900 mb-8 border-b-2 border-emerald-100 pb-4">Document Uploads</h2>
                        <p class="text-gray-500 mb-6 font-medium">Please upload clear images or PDFs. Maximum size 5MB per file.</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Profile Photo -->
                            <div class="border-2 border-dashed border-emerald-300 rounded-[2rem] bg-emerald-50/50 p-8 text-center hover:bg-emerald-50 transition-colors relative group">
                                <input type="file" name="profile_image" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" @change="previewImage($event, 'profilePreview')">
                                <div class="w-20 h-20 mx-auto mb-4 bg-white rounded-full flex items-center justify-center text-emerald-500 shadow-md overflow-hidden relative border-4 border-emerald-100">
                                    <template x-if="!previews.profilePreview">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </template>
                                    <template x-if="previews.profilePreview">
                                        <img :src="previews.profilePreview" class="w-full h-full object-cover">
                                    </template>
                                </div>
                                <h4 class="font-black text-gray-900">Profile Photo</h4>
                                <p class="text-xs text-gray-500 font-bold mt-1">Click or drag to upload</p>
                            </div>

                            <!-- Aadhaar Card -->
                            <div class="border-2 border-dashed border-gray-300 rounded-[2rem] bg-gray-50/50 p-8 text-center hover:bg-gray-50 hover:border-emerald-300 transition-colors relative group">
                                <input type="file" name="documents[aadhaar]" accept=".pdf,image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" @change="handleFile($event, 'Aadhaar')">
                                <div class="w-16 h-16 mx-auto mb-4 bg-white rounded-2xl flex items-center justify-center text-gray-400 shadow-sm border border-gray-100 group-hover:text-emerald-500 transition-colors">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                                </div>
                                <h4 class="font-black text-gray-900">Aadhaar Card <span class="text-red-500">*</span></h4>
                                <p class="text-xs text-gray-500 font-bold mt-1" x-text="files.Aadhaar || 'PDF or Image'"></p>
                            </div>

                            <!-- Land Document -->
                            <div class="border-2 border-dashed border-gray-300 rounded-[2rem] bg-gray-50/50 p-8 text-center hover:bg-gray-50 hover:border-emerald-300 transition-colors relative group">
                                <input type="file" name="documents[land]" accept=".pdf,image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" @change="handleFile($event, 'Land')">
                                <div class="w-16 h-16 mx-auto mb-4 bg-white rounded-2xl flex items-center justify-center text-gray-400 shadow-sm border border-gray-100 group-hover:text-emerald-500 transition-colors">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <h4 class="font-black text-gray-900">Land Record (7/12 etc)</h4>
                                <p class="text-xs text-gray-500 font-bold mt-1" x-text="files.Land || 'PDF or Image'"></p>
                            </div>

                            <!-- Bank Passbook -->
                            <div class="border-2 border-dashed border-gray-300 rounded-[2rem] bg-gray-50/50 p-8 text-center hover:bg-gray-50 hover:border-emerald-300 transition-colors relative group">
                                <input type="file" name="documents[bank]" accept=".pdf,image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" @change="handleFile($event, 'Bank')">
                                <div class="w-16 h-16 mx-auto mb-4 bg-white rounded-2xl flex items-center justify-center text-gray-400 shadow-sm border border-gray-100 group-hover:text-emerald-500 transition-colors">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                </div>
                                <h4 class="font-black text-gray-900">Bank Passbook</h4>
                                <p class="text-xs text-gray-500 font-bold mt-1" x-text="files.Bank || 'PDF or Image'"></p>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 6: PREFERENCES -->
                    <div x-show="step === 6" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" style="display: none;">
                        <h2 class="text-3xl font-black text-gray-900 mb-8 border-b-2 border-emerald-100 pb-4">Preferences & Smart Features</h2>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-8">
                            <!-- Notifications -->
                            <div>
                                <h3 class="text-lg font-black text-gray-900 mb-6 flex items-center"><svg class="w-5 h-5 text-emerald-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg> Alerts & Notifications</h3>
                                <div class="space-y-4">
                                    <label class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl cursor-pointer hover:bg-emerald-50 transition-colors shadow-sm">
                                        <span class="font-bold text-gray-700">SMS Alerts</span>
                                        <div class="relative">
                                            <input type="checkbox" name="notification_preferences[sms]" x-model="formData.notification_preferences.sms" class="sr-only">
                                            <div class="block bg-gray-200 w-12 h-7 rounded-full transition-colors" :class="formData.notification_preferences.sms ? 'bg-emerald-500' : ''"></div>
                                            <div class="dot absolute left-1 top-1 bg-white w-5 h-5 rounded-full transition-transform" :class="formData.notification_preferences.sms ? 'transform translate-x-5' : ''"></div>
                                        </div>
                                    </label>
                                    <label class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl cursor-pointer hover:bg-emerald-50 transition-colors shadow-sm">
                                        <span class="font-bold text-gray-700">WhatsApp Updates</span>
                                        <div class="relative">
                                            <input type="checkbox" name="notification_preferences[whatsapp]" x-model="formData.notification_preferences.whatsapp" class="sr-only">
                                            <div class="block bg-gray-200 w-12 h-7 rounded-full transition-colors" :class="formData.notification_preferences.whatsapp ? 'bg-emerald-500' : ''"></div>
                                            <div class="dot absolute left-1 top-1 bg-white w-5 h-5 rounded-full transition-transform" :class="formData.notification_preferences.whatsapp ? 'transform translate-x-5' : ''"></div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Market Interest -->
                            <div>
                                <h3 class="text-lg font-black text-gray-900 mb-6 flex items-center"><svg class="w-5 h-5 text-emerald-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg> Market Interests</h3>
                                <div class="grid grid-cols-2 gap-3">
                                    <template x-for="interest in ['Organic Farming', 'Food Processing', 'Export', 'Training', 'Gov Schemes', 'Equipment Rental']">
                                        <label class="flex items-center space-x-2 p-3 bg-white border border-gray-200 rounded-xl cursor-pointer hover:border-emerald-300 shadow-sm animate-all" :class="formData.market_preferences.includes(interest) ? 'border-emerald-500 bg-emerald-50 ring-1 ring-emerald-200' : ''">
                                            <input type="checkbox" name="market_preferences[]" :value="interest" x-model="formData.market_preferences" class="hidden">
                                            <div class="w-4 h-4 rounded border flex items-center justify-center" :class="formData.market_preferences.includes(interest) ? 'bg-emerald-500 border-emerald-500 text-white' : 'border-gray-300'">
                                                <svg x-show="formData.market_preferences.includes(interest)" class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                            </div>
                                            <span class="font-bold text-xs text-gray-700" x-text="interest"></span>
                                        </label>
                                    </template>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-emerald-500 to-teal-500 rounded-[2rem] p-8 text-white relative overflow-hidden shadow-xl mt-8">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                            <div class="relative z-10 flex items-center justify-between">
                                <div>
                                    <h4 class="font-black text-2xl mb-2">Smart Recommendation Engine</h4>
                                    <p class="font-medium text-emerald-50 max-w-md">Once registered, our AI will automatically suggest the best crops, fertilizers, and nearest FPOs based on your soil type and location.</p>
                                </div>
                                <div class="hidden md:block w-16 h-16 bg-white/20 rounded-2xl backdrop-blur-md flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 7: REVIEW -->
                    <div x-show="step === 7" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-8" x-transition:enter-end="opacity-100 translate-x-0" style="display: none;">
                        <h2 class="text-3xl font-black text-gray-900 mb-8 border-b-2 border-emerald-100 pb-4">Review & Submit</h2>
                        
                        <div class="bg-gray-50 rounded-[2rem] p-8 border border-gray-200 mb-8">
                            <div class="flex items-center space-x-6 mb-8">
                                <div class="w-24 h-24 bg-white rounded-full border-4 border-emerald-100 shadow-md flex items-center justify-center overflow-hidden">
                                    <template x-if="previews.profilePreview">
                                        <img :src="previews.profilePreview" class="w-full h-full object-cover">
                                    </template>
                                    <template x-if="!previews.profilePreview">
                                        <svg class="w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                    </template>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-black text-gray-900" x-text="formData.name || 'Name not provided'"></h3>
                                    <p class="text-emerald-600 font-bold" x-text="formData.mobile || 'Mobile not provided'"></p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm">
                                    <p class="text-[10px] uppercase tracking-widest font-black text-gray-400 mb-1">Farm Location</p>
                                    <p class="font-bold text-gray-800" x-text="`${formData.village || '-'}, ${formData.district || '-'}, ${formData.state || '-'}`"></p>
                                </div>
                                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm">
                                    <p class="text-[10px] uppercase tracking-widest font-black text-gray-400 mb-1">Total Land</p>
                                    <p class="font-bold text-gray-800"><span x-text="formData.land_area || '0'"></span> Acres</p>
                                </div>
                                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm">
                                    <p class="text-[10px] uppercase tracking-widest font-black text-gray-400 mb-1">Major Crops</p>
                                    <p class="font-bold text-gray-800" x-text="formData.crops.join(', ') || 'None selected'"></p>
                                </div>
                                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm">
                                    <p class="text-[10px] uppercase tracking-widest font-black text-gray-400 mb-1">Aadhaar</p>
                                    <p class="font-bold text-gray-800" x-text="formData.aadhaar_number ? 'XXXX XXXX ' + formData.aadhaar_number.slice(-4) : 'Not provided'"></p>
                                </div>
                            </div>
                        </div>

                        <!-- Account Setup Box -->
                        <div class="bg-emerald-50/60 rounded-[2rem] p-8 border border-emerald-100 mb-8 space-y-6">
                            <h3 class="text-sm uppercase tracking-widest font-black text-emerald-700 border-b border-emerald-200 pb-3 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                                Account Setup
                            </h3>
                            <p class="text-sm text-gray-500 font-medium -mt-2">Set your login email and a strong password to access FarmTech MIS.</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Email Address <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; pointer-events: none;">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <input type="email" name="email" x-model="formData.email" required autocomplete="username" class="w-full bg-white border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-sm text-gray-800" placeholder="farmer@example.com" style="padding-left: 66px;">
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Password <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 42px; height: 42px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; pointer-events: none;">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                        </div>
                                        <input type="password" name="password" required autocomplete="new-password" class="w-full bg-white border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-sm text-gray-800" placeholder="Min. 8 characters" style="padding-left: 66px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-emerald-50 rounded-2xl p-6 border border-emerald-100 text-emerald-800 font-medium text-sm flex items-start space-x-3">
                            <svg class="w-6 h-6 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <p>By submitting this form, you agree to the FarmTech MIS terms of service and consent to the use of your data for agricultural analytics and government scheme matching.</p>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="mt-12 pt-8 border-t border-gray-100 flex items-center justify-between">
                        <button type="button" @click="step > 1 ? step-- : window.location.href='{{ route('register.select') }}'" class="px-8 py-4 text-gray-500 font-black tracking-widest uppercase text-sm hover:text-gray-900 transition-colors flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                            <span x-text="step === 1 ? 'Cancel' : 'Previous'"></span>
                        </button>
                        
                        <button type="button" x-show="step < 7" @click="step++" class="bg-gray-900 text-white px-10 py-4 rounded-2xl font-black shadow-lg hover:bg-emerald-600 transition-all uppercase tracking-widest text-sm flex items-center space-x-2 transform hover:-translate-y-1">
                            <span>Next Step</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                        </button>

                        <button type="submit" x-show="step === 7" class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-10 py-4 rounded-2xl font-black shadow-[0_10px_30px_-10px_rgba(16,185,129,0.5)] hover:shadow-[0_20px_40px_-10px_rgba(16,185,129,0.7)] transition-all uppercase tracking-widest text-sm flex items-center space-x-2 transform hover:-translate-y-1" style="display: none;">
                            <span>Submit Registration</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<script>
    function farmerRegistration() {
        return {
            step: 1,
            formData: {
                name: '', father_name: '', gender: '', dob: '', mobile: '', email: '', aadhaar_number: '', pan_number: '', farmer_category: '', education_level: '', occupation_type: '',
                state: '', district: '', tehsil: '', village: '', pincode: '', address: '', gps_location: '',
                land_area: '', soil_type: '', irrigation_type: '', farming_method: '', ownership_type: '', farming_experience: '', crops: [],
                bank_name: '', account_number: '', ifsc_code: '', annual_income: '', pm_kisan_beneficiary: false, kcc_status: false, insurance_status: false,
                notification_preferences: { sms: true, whatsapp: false }, market_preferences: []
            },
            files: { Aadhaar: '', Land: '', Bank: '' },
            previews: { profilePreview: null },
            
            getStepName(i) {
                const names = ['Personal', 'Address', 'Farm', 'Financial', 'Documents', 'Preferences', 'Review'];
                return names[i - 1];
            },
            
            previewImage(event, previewKey) {
                const file = event.target.files[0];
                if (file) {
                    this.previews[previewKey] = URL.createObjectURL(file);
                }
            },

            handleFile(event, key) {
                const file = event.target.files[0];
                if (file) {
                    this.files[key] = file.name;
                }
            },

            getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition((position) => {
                        this.formData.gps_location = `${position.coords.latitude}, ${position.coords.longitude}`;
                    });
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            },

            validateSubmit(e) {
                if (this.step !== 7) {
                    e.preventDefault();
                }
            }
        }
    }
</script>
@endsection
