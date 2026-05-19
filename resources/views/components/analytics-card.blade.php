@props(['title', 'value', 'metric' => null, 'emoji' => '📊', 'theme' => 'emerald', 'id' => null])

<div class="bg-white/90 backdrop-blur-xl border border-slate-100 shadow-xl rounded-[2rem] p-5 hover:scale-105 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between relative overflow-hidden group select-none">
    
    <!-- Top Glowing Gradient Bar based on theme -->
    <div class="absolute top-0 left-0 right-0 h-1.5 @if($theme === 'purple') bg-gradient-to-r from-purple-500 to-indigo-600 @else bg-gradient-to-r from-emerald-400 to-teal-500 @endif"></div>

    <div class="flex items-start justify-between">
        <span class="text-3.5xl group-hover:scale-110 transition-transform duration-300">{{ $emoji }}</span>
        
        @if($metric)
            <span class="text-[10px] font-black px-2.5 py-1 rounded-full @if(strpos($metric, '-') !== false) bg-red-100 text-red-800 @else bg-emerald-100 text-emerald-800 @endif">
                {{ $metric }}
            </span>
        @endif
    </div>

    <div class="mt-4">
        <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">{{ $title }}</h4>
        <p @if($id) id="{{ $id }}" @endif class="text-2xl font-black text-slate-900 mt-1.5 leading-none tracking-tight">{{ $value }}</p>
    </div>
</div>
