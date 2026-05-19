@extends('layouts.app')

@section('content')
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
<div class="min-h-screen flex items-center justify-center relative overflow-hidden bg-[#f8fafc] font-outfit" style="padding-top: 40px; padding-bottom: 40px; min-height: 100vh;">
    <!-- Background Accents -->
    <div class="absolute top-0 left-0 w-[800px] h-[800px] bg-emerald-400/10 rounded-full blur-[100px] -ml-32 -mt-32 animate-pulse pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[1000px] h-[1000px] bg-teal-400/10 rounded-full blur-[120px] -mr-48 -mb-48 pointer-events-none"></div>

    <div class="relative z-10 w-full px-4 flex flex-col items-center justify-center" style="max-width: 580px; width: 100%; margin: 0 auto;">
        
        <!-- Branding Header -->
        <div class="text-center mb-8 w-full">
            <div class="inline-flex items-center space-x-3 bg-emerald-50 text-emerald-700 px-6 py-2.5 rounded-full font-bold text-xs tracking-widest uppercase mb-4 border border-emerald-100 shadow-sm">
                <svg class="w-4 h-4 text-emerald-500 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                <span>FarmTech MIS Secure Portal</span>
            </div>
            <h1 class="text-4xl font-black text-gray-900 tracking-tighter">
                Welcome <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-teal-500">Back</span>
            </h1>
            <p class="text-sm text-gray-400 font-bold mt-2">Sign in to access your digital agriculture hub</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-[2.5rem] p-8 md:p-14 shadow-2xl border border-gray-200 w-full" style="box-sizing: border-box; min-height: 520px; display: flex; flex-direction: column; justify-content: center;">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <div class="group space-y-2">
                    <label class="text-xs uppercase tracking-widest font-black text-gray-500 ml-2">Email Address <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 44px; height: 44px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"></path></svg>
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 text-base" placeholder="john@example.com" style="padding-left: 66px;">
                    </div>
                    @error('email') <p class="text-red-500 text-xs font-black mt-2 ml-2">{{ $message }}</p> @enderror
                </div>

                <div class="group space-y-2">
                    <div class="flex justify-between items-center px-2">
                        <label class="text-xs uppercase tracking-widest font-black text-gray-500">Password <span class="text-red-500">*</span></label>
                        <a href="#" class="text-xs font-black text-emerald-600 hover:underline">Forgot?</a>
                    </div>
                    <div class="relative">
                        <div style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 44px; height: 44px; border-radius: 12px; background-color: rgba(16, 185, 129, 0.15); border: 1.5px solid rgba(16, 185, 129, 0.3); display: flex; align-items: center; justify-content: center; color: #059669; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.02); pointer-events: none;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input type="password" name="password" required class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-4 pr-5 font-bold outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-all shadow-inner text-gray-800 text-base" placeholder="••••••••" style="padding-left: 66px;">
                    </div>
                    @error('password') <p class="text-red-500 text-xs font-black mt-2 ml-2">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center justify-between px-2 pt-2">
                    <label class="flex items-center space-x-3 cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-5 h-5 rounded-md border-gray-200 text-emerald-600 focus:ring-emerald-500 cursor-pointer transition-all">
                        <span class="text-xs font-black text-gray-400 group-hover:text-gray-800 transition-colors">Remember me</span>
                    </label>
                </div>

                <!-- Cloudflare Turnstile Widget -->
                <div class="flex justify-center pt-2">
                    <div class="cf-turnstile" data-sitekey="{{ env('CLOUDFLARE_TURNSTILE_SITE_KEY') }}" data-theme="light"></div>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-emerald-500 to-teal-500 text-white py-4.5 rounded-2xl font-black shadow-[0_10px_30px_-10px_rgba(16,185,129,0.5)] hover:shadow-[0_20px_40px_-10px_rgba(16,185,129,0.7)] transition-all uppercase tracking-widest text-sm flex items-center justify-center space-x-2 transform hover:-translate-y-0.5" style="padding-top: 18px; padding-bottom: 18px;">
                    <span>Enter Dashboard</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-gray-400 font-bold text-sm">New to FarmTech? <br> <a href="{{ route('register.select') }}" class="text-emerald-600 hover:text-emerald-700 font-black underline underline-offset-4 decoration-2">Create an account</a></p>
            </div>
        </div>
        
    </div>
</div>
@endsection
