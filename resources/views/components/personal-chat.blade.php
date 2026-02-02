<!-- Main Chat Area -->
<main class="flex-1 flex flex-col bg-slate-50 dark:bg-background-dark relative">
    <!-- Chat Header -->
    <header class="h-[72px] flex items-center justify-between px-6 bg-white dark:bg-[#111a22] border-b border-slate-200 dark:border-[#233648] shrink-0">
        <div class="flex items-center gap-3">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Header Avatar of Sarah Miller" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB1U6RVA-gMxpiwVJbhj62ZMaIy22rjSnC5H-gUDbvCEQhVguxigAi4ryZSmrPr4hNWY_9LSgVCM5EPoeRG8bj2fP0Lh14b-BBwPwqsFJ6tu3iJIEvXTKs6Hzw6fSURnJZ0JH6Am7FyM0NpUSREnxaTYy92QobjdtklYJ1ew33t5VL1GXGp-AoddEpwWpisNf1mH77fDvHQCFN_Z15bIG2tUzwB8LWFY1xLiMIFj_6Y8okIpTpg2s_qIfHeckHzEBecmKN9BBVvdnI");'></div>
            <div>
                <h3 class="text-base font-bold leading-tight">Sarah Miller</h3>
                <p class="text-xs text-green-500 font-medium">Online</p>
            </div>
        </div>
        <div class="flex items-center gap-4 text-slate-400 dark:text-[#92adc9]">
            <button class="hover:text-primary transition-colors cursor-pointer"><span class="material-symbols-outlined">videocam</span></button>
            <button class="hover:text-primary transition-colors cursor-pointer"><span class="material-symbols-outlined">call</span></button>
            <div class="w-px h-6 bg-slate-200 dark:bg-[#233648] mx-1"></div>
            <button class="hover:text-primary transition-colors cursor-pointer"><span class="material-symbols-outlined">info</span></button>
            <button class="hover:text-primary transition-colors cursor-pointer"><span class="material-symbols-outlined">more_vert</span></button>
        </div>
    </header>
    <!-- Message Feed -->
    <div class="flex-1 overflow-y-auto p-6 space-y-6 no-scrollbar">
        <div class="flex justify-center">
            <span class="text-[11px] font-bold text-slate-400 dark:text-[#92adc9] bg-slate-100 dark:bg-[#233648] px-3 py-1 rounded-full uppercase tracking-widest">Today</span>
        </div>
        <!-- Recipient Message -->
        <div class="flex gap-3 max-w-[70%]">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8 shrink-0 mt-auto" data-alt="Sarah Miller small avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA3xB8UnveIFUNpYKMjeoElB-jhjTmZPgkr7cQwtZHJDSd-S1FTpqMsl4tl_aVO1th11JJae9Bn2_vicKjV0qzrZrEJtxAkdCu22KONUJPFCKO3CIp0c1D_vDU3zrw4nVAp5dzzfIvD9bjX-QMtMvI4L1EUwaAII4lPwb3_zcppeWcTSF0HqpvzxXKwOiH8NYQyqbnrmAwy7tA5MuLI_LXVdP7cAoVwe2rdMX7glx4-zIvthugXr8R11mI_aZC_fbNOW7P7dHw3pWQ");'></div>
            <div>
                <div class="bg-white dark:bg-[#233648] p-3.5 rounded-2xl rounded-bl-none shadow-sm text-sm leading-relaxed border border-slate-100 dark:border-transparent">
                    Hi Alex! I've been going through the Q4 projection reports. There are a few discrepancies in the marketing budget section.
                </div>
                <span class="text-[10px] text-slate-400 mt-1 block">10:28 AM</span>
            </div>
        </div>
        <!-- Recipient Message -->
        <div class="flex gap-3 max-w-[70%]">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8 shrink-0 invisible"></div>
            <div>
                <div class="bg-white dark:bg-[#233648] p-3.5 rounded-2xl rounded-bl-none shadow-sm text-sm leading-relaxed border border-slate-100 dark:border-transparent">
                    Can we review the Q4 results later? I'm free after 2 PM today.
                </div>
                <span class="text-[10px] text-slate-400 mt-1 block">10:29 AM</span>
            </div>
        </div>
        <!-- Sender Message -->
        <div class="flex flex-row-reverse gap-3 max-w-[70%] ml-auto">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8 shrink-0 mt-auto" data-alt="Alex Johnson small avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuACb5KPKBAQmy_oJJ-ZrXhLDsd6bKrjQl_k1U3J0AduamvX1b02cuXDDh8aAQvzFTOvNNRbLPznZm-Wiu_uuqtAje1VWw1-NsRqJbhTOkPdPi5cWGNwotl4BAY3vOSe2epGkJDvIt3i8gB04jycGLixd8QH909e0Pc73g6-QAJrSyvNMJQuFIqnQlTkJa3NkrmSfuXm7lGim2HwMKLYOJYX2GRDTTQ0C-4aLOKEufwLyqAAEwluGAC9enrfVqN4HPv4sXyYYqeFvc4");'></div>
            <div class="flex flex-col items-end">
                <div class="bg-primary text-white p-3.5 rounded-2xl rounded-br-none shadow-md shadow-primary/10 text-sm leading-relaxed">
                    Hey Sarah! Sure, 2:30 PM works best for me. I'll take a look at the budget section before our call so I can have the answers ready.
                </div>
                <div class="flex items-center gap-1 mt-1">
                    <span class="text-[10px] text-slate-400">10:32 AM</span>
                    <span class="material-symbols-outlined text-[14px] text-primary" style="font-variation-settings: 'FILL' 1">check_circle</span>
                </div>
            </div>
        </div>
        <!-- Recipient Message -->
        <div class="flex gap-3 max-w-[70%]">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8 shrink-0 mt-auto" data-alt="Sarah Miller small avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCNHkgy3lvhyn_TWqdeQGYm0pZhwKde1WnBYARjPxdzA-6EdXcovySwSADKMXKq7BH7mV7bH3_cbfZub_vU-eKNhgquBRztFsAPt_pb1BVAOglAwu3kPYqLlKMu1rqXTYdnRBaEfjxWV0HygRrTJtg1qfU6_CasykzrVXeI7_4kCx5VF1nbZAO2V9c3amfuek0HOyH-JoxjMq2bYnCTD0c5_IbF6FLuiQ9ywvjfmDRhSOb7NoIuGb51yjl3WoRn-0gNN9NCpRHBWxk");'></div>
            <div>
                <div class="bg-white dark:bg-[#233648] p-3.5 rounded-2xl rounded-bl-none shadow-sm text-sm leading-relaxed border border-slate-100 dark:border-transparent">
                    Perfect. I'll send a calendar invite now. See you then!
                </div>
                <span class="text-[10px] text-slate-400 mt-1 block">10:34 AM</span>
            </div>
        </div>
    </div>
    <!-- Message Input -->
    <footer class="p-6 pt-2">
        <div class="bg-white dark:bg-[#111a22] border border-slate-200 dark:border-[#233648] rounded-2xl p-2 flex items-end gap-2 shadow-lg dark:shadow-none">
            <button class="p-2 text-slate-400 hover:text-primary transition-colors">
                <span class="material-symbols-outlined">add_circle</span>
            </button>
            <button class="p-2 text-slate-400 hover:text-primary transition-colors">
                <span class="material-symbols-outlined">sentiment_satisfied</span>
            </button>
            <textarea class="flex-1 bg-transparent border-none focus:ring-0 resize-none py-2 text-sm max-h-32 text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-[#92adc9]" placeholder="Type a message..." rows="1"></textarea>
            <button class="p-2 text-slate-400 hover:text-primary transition-colors">
                <span class="material-symbols-outlined">mic</span>
            </button>
            <button class="bg-primary hover:bg-primary/90 text-white size-10 rounded-xl flex items-center justify-center transition-all shadow-md shadow-primary/30">
                <span class="material-symbols-outlined">send</span>
            </button>
        </div>
    </footer>
</main>