@props(['product'])

<div x-data="{ showQR: false }" class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2.2rem] p-6 hover:shadow-2xl hover:scale-[1.03] transition-all duration-300 flex flex-col justify-between relative overflow-hidden group">
    
    <!-- Top Decorative Gradient Header -->
    <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-emerald-500 to-purple-600"></div>

    <div class="space-y-4">
        <!-- Mock Product Image/Visual Card -->
        <div class="h-44 w-full bg-gradient-to-br from-emerald-100/60 to-purple-100/60 rounded-3xl flex items-center justify-center relative overflow-hidden">
            <span class="text-5xl group-hover:scale-110 transition-transform duration-300 select-none">
                @if($product->processed_product === 'Paneer') 🧀
                @elseif($product->processed_product === 'Pickle') 🥫
                @elseif($product->processed_product === 'Flour') 🌾
                @else 🍯
                @endif
            </span>
            <!-- Eco-Friendly badge -->
            <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black text-[9px] uppercase tracking-wider px-2.5 py-1 rounded-full shadow border border-emerald-500/10">Eco-Friendly</span>
        </div>

        <div>
            <!-- Category Tag -->
            <span class="text-[9px] bg-purple-100 text-purple-800 px-2.5 py-0.5 rounded-full font-black uppercase tracking-wider inline-block">Processed Crop</span>
            <!-- Title -->
            <h3 class="text-base font-black text-slate-800 mt-1.5">{{ $product->product_name }}</h3>
            <p class="text-[10px] text-slate-400 font-bold leading-none mt-1">Packaging: {{ $product->packaging }}</p>
        </div>

        <!-- Prices and Volume details -->
        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-slate-100/60 text-xs">
            <div>
                <span class="text-[9px] font-black text-slate-400 uppercase">Unit Price</span>
                <p class="text-base font-black text-emerald-700">₹{{ number_format($product->price, 2) }}</p>
            </div>
            <div>
                <span class="text-[9px] font-black text-slate-400 uppercase">Stock Volume</span>
                <p class="text-sm font-black text-slate-700 mt-0.5">{{ $product->quantity }} Units</p>
            </div>
        </div>

        <!-- Buyer Interest Badge -->
        <div class="flex items-center gap-2 px-3.5 py-2.5 bg-emerald-50 rounded-2xl border border-emerald-100/50">
            <span class="h-2 w-2 bg-emerald-500 rounded-full animate-ping"></span>
            <span class="text-[10px] font-black text-emerald-800 uppercase tracking-wide">{{ $product->buyer_interest ?? '12 Buyers Interested' }}</span>
        </div>
    </div>

    <!-- Actions / QR overlay -->
    <div class="mt-6 flex flex-col gap-2">
        <div class="flex gap-2">
            <!-- Contact Buyer Direct trigger -->
            <button onclick="contactBuyerDirect('{{ $product->product_name }}')" class="flex-1 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-black rounded-xl shadow-md transition-all hover:scale-[1.02]">Contact Buyer</button>
            
            <!-- QR Verification toggle -->
            <button @click="showQR = !showQR" class="px-3 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl transition-all font-bold text-sm focus:outline-none flex items-center justify-center">
                🔲
            </button>
        </div>
    </div>

    <!-- QR Code Slide-over Container -->
    <div x-show="showQR" x-transition.opacity.duration.300ms class="absolute inset-0 bg-white/95 backdrop-blur-md rounded-[2.2rem] p-6 flex flex-col items-center justify-center text-center space-y-4 z-20">
        <h4 class="text-xs font-black text-slate-800 uppercase tracking-wider">Batch Certificate & Traceability QR</h4>
        
        <!-- Custom Vector Styled QR Code Container -->
        <div class="w-36 h-36 bg-slate-50 border border-slate-200 rounded-2xl p-2.5 flex items-center justify-center shadow">
            <svg class="w-full h-full text-slate-800" viewBox="0 0 100 100" fill="currentColor">
                <!-- Outer borders -->
                <rect x="5" y="5" width="25" height="25" fill="none" stroke="currentColor" stroke-width="6"/>
                <rect x="10" y="10" width="15" height="15"/>
                <rect x="70" y="5" width="25" height="25" fill="none" stroke="currentColor" stroke-width="6"/>
                <rect x="75" y="10" width="15" height="15"/>
                <rect x="5" y="70" width="25" height="25" fill="none" stroke="currentColor" stroke-width="6"/>
                <rect x="10" y="75" width="15" height="15"/>
                <!-- Noise data points -->
                <rect x="40" y="5" width="8" height="8"/>
                <rect x="55" y="12" width="10" height="6"/>
                <rect x="42" y="30" width="12" height="12"/>
                <rect x="15" y="42" width="8" height="15"/>
                <rect x="72" y="45" width="18" height="8"/>
                <rect x="48" y="55" width="15" height="15"/>
                <rect x="75" y="75" width="15" height="15"/>
                <rect x="35" y="78" width="10" height="10"/>
                <rect x="62" y="82" width="8" height="8"/>
            </svg>
        </div>
        <p class="text-[9px] text-slate-400 font-bold leading-normal">FSSAI Certified • Sown at Patiala farms • Hand-packaged by {{ auth()->user()->name ?? 'Maa Shakti SHG' }}</p>
        <button @click="showQR = false" class="px-4 py-1.5 bg-slate-900 text-white rounded-lg text-[10px] font-black uppercase tracking-wider focus:outline-none">Close</button>
    </div>

</div>
