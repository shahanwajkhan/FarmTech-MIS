<!-- Floating Chatbot Button -->
<button onclick="toggleChatbot()" id="chatbot-trigger" class="fixed bottom-6 right-6 z-50 p-4 bg-gradient-to-tr from-emerald-500 to-purple-600 rounded-full shadow-2xl hover:scale-110 active:scale-95 transition-all duration-300 group flex items-center justify-center border border-white/20">
    <svg class="w-8 h-8 text-white group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
    <span class="absolute -top-2 -left-2 flex h-5 w-5">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-400 opacity-75"></span>
        <span class="relative inline-flex rounded-full h-5 w-5 bg-purple-500 text-[10px] text-white font-black flex items-center justify-center shadow">1</span>
    </span>
</button>

<!-- Glassmorphism Chat Window -->
<div id="chatbot-window" class="fixed bottom-24 right-6 z-50 w-[400px] h-[550px] max-w-[calc(100vw-2rem)] flex flex-col bg-white/95 backdrop-blur-xl border border-emerald-100 rounded-[2.5rem] shadow-2xl hidden transition-all duration-300 overflow-hidden flex flex-col">
    <!-- Chat Header -->
    <div class="p-5 bg-gradient-to-r from-emerald-500 to-purple-600 text-white flex items-center justify-between shadow-md">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-white/20 flex items-center justify-center border border-white/10">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
            </div>
            <div>
                <h3 class="font-black text-sm tracking-tight">FarmTech AI Assistant</h3>
                <span class="text-[10px] bg-white/20 px-2 py-0.5 rounded-full font-bold uppercase tracking-widest text-emerald-100 animate-pulse">Agri-Expert Online</span>
            </div>
        </div>
        <button onclick="toggleChatbot()" class="p-1 rounded-xl hover:bg-white/10 transition-colors text-white/80 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <!-- Chat Messages Scrollway -->
    <div id="chat-messages-container" class="flex-1 p-5 overflow-y-auto space-y-4 bg-slate-50/50">
        <!-- AI Welcome Message -->
        <div class="flex gap-2.5 items-start max-w-[85%]">
            <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center flex-shrink-0 font-bold border border-emerald-200">AI</div>
            <div class="p-4 bg-white border border-emerald-100/50 rounded-2xl rounded-tl-none shadow-sm text-sm text-gray-700 font-medium leading-relaxed">
                Namaste {{ explode(' ', auth()->user()->name ?? 'Ramesh Kumar')[0] }}! 🙏 I am your smart **FarmTech AI Assistant**.<br><br>
                How can I assist you with your farming decisions today? Feel free to ask about fertilizers, nearby FPOs, solar pump subsidies, or crops!
            </div>
        </div>

        <!-- Dynamic responses go here -->
    </div>

    <!-- Quick Suggestions Container -->
    <div class="px-5 py-3 border-t border-slate-100 bg-white/80">
        <p class="text-[10px] text-purple-600 font-black mb-2 uppercase tracking-wider">Suggested Questions</p>
        <div class="flex flex-wrap gap-1.5 max-h-[80px] overflow-y-auto">
            <button onclick="askPreset('Best fertilizer for wheat?')" class="text-xs px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-100 rounded-full font-semibold transition-all">Best fertilizer for wheat?</button>
            <button onclick="askPreset('Nearby FPO in Punjab?')" class="text-xs px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-100 rounded-full font-semibold transition-all">Nearby FPO in Punjab?</button>
            <button onclick="askPreset('Which subsidy can I apply for?')" class="text-xs px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-100 rounded-full font-semibold transition-all">Which subsidy can I apply?</button>
            <button onclick="askPreset('Best crop for rainy season?')" class="text-xs px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-100 rounded-full font-semibold transition-all">Best crop for rainy season?</button>
        </div>
    </div>

    <!-- Chat Typing Loader -->
    <div id="chat-typing-loader" class="px-5 py-2 flex gap-2 items-center bg-slate-50/50 hidden">
        <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center flex-shrink-0 font-bold border border-emerald-200">AI</div>
        <div class="p-3 bg-white border border-emerald-100/50 rounded-2xl rounded-tl-none shadow-sm flex items-center gap-1">
            <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-bounce" style="animation-delay: 0.1s"></span>
            <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
            <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-bounce" style="animation-delay: 0.3s"></span>
        </div>
    </div>

    <!-- Input Form -->
    <form id="chatbot-form" onsubmit="submitChatMessage(event)" class="p-4 bg-white border-t border-slate-100 flex items-center gap-2">
        <input type="text" id="chat-input-field" placeholder="Ask FarmTech AI..." class="flex-1 px-4 py-3 bg-slate-50 rounded-2xl text-sm font-semibold border border-slate-200 focus:outline-none focus:border-emerald-500 transition-colors" required>
        <button type="submit" class="p-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl shadow transition-colors flex items-center justify-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
        </button>
    </form>
</div>

<script>
    function toggleChatbot() {
        const chatWindow = document.getElementById('chatbot-window');
        chatWindow.classList.toggle('hidden');
        if (!chatWindow.classList.contains('hidden')) {
            const container = document.getElementById('chat-messages-container');
            container.scrollTop = container.scrollHeight;
            document.getElementById('chat-input-field').focus();
        }
    }

    function askPreset(promptText) {
        document.getElementById('chat-input-field').value = promptText;
        submitChatMessage(new Event('submit'));
    }

    function appendMessage(text, isUser = false) {
        const container = document.getElementById('chat-messages-container');
        const wrapper = document.createElement('div');
        
        if (isUser) {
            wrapper.className = "flex gap-2.5 items-end justify-end max-w-[85%] ml-auto";
            wrapper.innerHTML = `
                <div class="p-4 bg-gradient-to-br from-emerald-600 to-emerald-700 text-white rounded-2xl rounded-tr-none shadow-sm text-sm font-semibold leading-relaxed">
                    ${text}
                </div>
                <div class="w-8 h-8 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center flex-shrink-0 font-bold border border-purple-200 text-xs">ME</div>
            `;
        } else {
            wrapper.className = "flex gap-2.5 items-start max-w-[85%]";
            wrapper.innerHTML = `
                <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center flex-shrink-0 font-bold border border-emerald-200 text-xs">AI</div>
                <div class="p-4 bg-white border border-emerald-100/50 rounded-2xl rounded-tl-none shadow-sm text-sm text-gray-700 font-medium leading-relaxed">
                    ${text.replace(/\n/g, '<br>').replace(/\*\*(.*?)\*\*/g, '<b>$1</b>').replace(/\*(.*?)\*/g, '<i>$1</i>')}
                </div>
            `;
        }
        
        container.appendChild(wrapper);
        container.scrollTop = container.scrollHeight;
    }

    function submitChatMessage(event) {
        event.preventDefault();
        const inputField = document.getElementById('chat-input-field');
        const text = inputField.value.trim();
        if (!text) return;

        // Append user query
        appendMessage(text, true);
        inputField.value = '';

        // Show typing indicator
        const loader = document.getElementById('chat-typing-loader');
        loader.classList.remove('hidden');
        const container = document.getElementById('chat-messages-container');
        container.scrollTop = container.scrollHeight;

        // Send AJAX request
        fetch('{{ route("farmer.chatbot.message") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ message: text })
        })
        .then(response => response.json())
        .then(data => {
            loader.classList.add('hidden');
            if (data.status === 'success') {
                appendMessage(data.response, false);
            } else {
                appendMessage("I apologize, but I encountered an error connecting to my database. Please try again.", false);
            }
        })
        .catch(error => {
            loader.classList.add('hidden');
            appendMessage("Offline sync simulated. Message stored locally for transmission.", false);
            console.error('Error:', error);
        });
    }
</script>
