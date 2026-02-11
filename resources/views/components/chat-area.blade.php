<!-- Main Chat Area -->
<main class="flex-1 flex flex-col bg-slate-50 dark:bg-background-dark relative" ng-if="!is_default_screen && chat_type == 'personal'">
    <!-- Chat Header -->
    <header class="h-[72px] flex items-center justify-between px-6 bg-white dark:bg-[#111a22] border-b border-slate-200 dark:border-[#233648] shrink-0">
        <div class="flex items-center gap-3">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Header Avatar of Sarah Miller" style='background-image: url(<%inbox.avatar%>)'></div>
            <div>
                <h3 class="text-base font-bold leading-tight"><%inbox.name%></h3>
                <p ng-show="inbox.is_online" class="text-xs text-green-500 font-medium">Online</p>
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
    <div class="flex-1 overflow-y-auto p-6 space-y-6 no-scrollbar" >
        <div ng-repeat="(day, messages) in inbox.messages">
            <div class="flex justify-center mb-[5px]">
                <span class="text-[11px] font-bold text-slate-400 dark:text-[#92adc9] bg-slate-100 dark:bg-[#233648] px-3 py-1 rounded-full uppercase tracking-widest"><%day%></span>
            </div>
            <!-- Sender Message -->
            <div ng-repeat="message in messages" >
                <div class="flex flex-row-reverse gap-3 max-w-[70%] ml-auto" ng-if="message.sent_by == user_id">
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8 shrink-0 mt-auto" data-alt="Alex Johnson small avatar" style='background-image: url(<%user_avatar%>);'></div>
                    <div class="flex flex-col items-end">
                        <div class="bg-primary text-white p-3.5 rounded-2xl rounded-br-none shadow-md shadow-primary/10 text-sm leading-relaxed">
                            <%message.message%>
                        </div>
                        <div class="flex items-center gap-1 mt-1">
                            <span class="text-[10px] text-slate-400"><%message.time%></span>
                            <span ng-class="{'text-primary': message.is_seen, 'text-slate-400': !message.is_seen}" class="material-symbols-outlined text-[14px] shrink-0">
                                done_all
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Recipient Message -->
                <div class="flex gap-3 max-w-[70%]" ng-if="message.sent_by != user_id">
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8 shrink-0 mt-auto" data-alt="Sarah Miller small avatar" style='background-image: url(<%inbox.avatar%>);'></div>
                    <div>
                        <div class="bg-white dark:bg-[#233648] p-3.5 rounded-2xl rounded-bl-none shadow-sm text-sm leading-relaxed border border-slate-100 dark:border-transparent">
                            <%message.message%>
                        </div>
                        <span class="text-[10px] text-slate-400 mt-1 block"><%message.time%></span>
                    </div>
                </div>
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
            <textarea ng-model="form.message" ng-keyup="$event.keyCode == 13 ? sendMessage() : null" class="flex-1 bg-transparent border-none focus:ring-0 resize-none py-2 text-sm max-h-32 text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-[#92adc9]" placeholder="Type a message..." rows="1"></textarea>
            <button class="p-2 text-slate-400 hover:text-primary transition-colors">
                <span class="material-symbols-outlined">mic</span>
            </button>
            <button ng-click="sendMessage()" class="bg-primary hover:bg-primary/90 text-white size-10 rounded-xl flex items-center justify-center transition-all shadow-md shadow-primary/30">
                <span class="material-symbols-outlined">send</span>
            </button>
        </div>
    </footer>
</main>

<!-- Main Chat Area -->
<main class="flex-1 flex flex-col bg-slate-50 dark:bg-background-dark relative"  ng-if="!is_default_screen && chat_type == 'groups'">
    <header class="h-[72px] flex items-center justify-between px-6 bg-white dark:bg-[#111a22] border-b border-slate-200 dark:border-[#233648] shrink-0 z-10">
        <div class="flex items-center gap-3">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" style='background-image: url(<%inbox.avatar%>);'></div>
            <div>
                <h3 class="text-base font-bold leading-tight"><%inbox.name%></h3>
                <p class="text-xs text-slate-400 dark:text-[#92adc9] font-medium">12 Members, 4 Online</p>
            </div>
        </div>
        <div class="flex items-center gap-4 text-slate-400 dark:text-[#92adc9]">
            <button class="hover:text-primary transition-colors cursor-pointer"><span class="material-symbols-outlined">videocam</span></button>
            <button class="hover:text-primary transition-colors cursor-pointer"><span class="material-symbols-outlined">search</span></button>
            <div class="w-px h-6 bg-slate-200 dark:bg-[#233648] mx-1"></div>
            <button class="hover:text-primary transition-colors cursor-pointer"><span class="material-symbols-outlined">info</span></button>
            <button class="hover:text-primary transition-colors cursor-pointer"><span class="material-symbols-outlined">more_vert</span></button>
        </div>
    </header>
    <div class="bg-white/80 dark:bg-[#111a22]/80 backdrop-blur-md px-6 py-2 border-b border-slate-200 dark:border-[#233648] flex items-center justify-between z-10 sticky top-0">
        <div class="flex items-center gap-3 overflow-hidden">
            <span class="material-symbols-outlined text-primary text-lg" style="font-variation-settings: 'FILL' 1">push_pin</span>
            <div class="text-xs truncate">
                <span class="font-bold text-slate-700 dark:text-slate-200">Pinned:</span>
                <span class="text-slate-500 dark:text-slate-400 ml-1">Q4 Branding Guidelines v2.pdf - Final deadline is Friday.</span>
            </div>
        </div>
        <button class="text-slate-400 hover:text-slate-600 dark:hover:text-white transition-colors">
            <span class="material-symbols-outlined text-sm">close</span>
        </button>
    </div>
    <div class="flex-1 overflow-y-auto p-6 space-y-6 no-scrollbar">
        <div class="flex justify-center my-4">
            <span class="text-[11px] font-bold text-slate-400 dark:text-[#92adc9] bg-slate-100 dark:bg-[#233648] px-3 py-1 rounded-full uppercase tracking-widest">Today</span>
        </div>
        <div class="flex gap-3 max-w-[70%]">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8 shrink-0 mt-auto" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA3xB8UnveIFUNpYKMjeoElB-jhjTmZPgkr7cQwtZHJDSd-S1FTpqMsl4tl_aVO1th11JJae9Bn2_vicKjV0qzrZrEJtxAkdCu22KONUJPFCKO3CIp0c1D_vDU3zrw4nVAp5dzzfIvD9bjX-QMtMvI4L1EUwaAII4lPwb3_zcppeWcTSF0HqpvzxXKwOiH8NYQyqbnrmAwy7tA5MuLI_LXVdP7cAoVwe2rdMX7glx4-zIvthugXr8R11mI_aZC_fbNOW7P7dHw3pWQ");'></div>
            <div class="flex flex-col">
                <span class="text-[11px] font-bold text-primary/80 mb-1 ml-1">Sarah Miller</span>
                <div class="bg-white dark:bg-bubble-1-dark p-3.5 rounded-2xl rounded-bl-none shadow-sm text-sm leading-relaxed border border-slate-100 dark:border-white/5">
                    Has everyone seen the latest wireframes for the dashboard? I just uploaded them to the shared folder.
                </div>
                <span class="text-[10px] text-slate-400 mt-1 ml-1">10:42 AM</span>
            </div>
        </div>
        <div class="flex gap-3 max-w-[70%]">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8 shrink-0 mt-auto" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCVdH3pIimvh612EB2704O_k7Wp-GrebQyLODyZEGgVa9Tfyc0Ci2QD1-bS8e1FmcouMmXXW_tShNvLQTqvbXspwUvZUldQLVmi25GTY_p2FN9FdKXdG8Ggka9u5S5pyPwszqrNp95xyt_fLVlg1EBYEnMD6g-kZyNr49IUuMFTHwXz7IvzZ522bQ1S4RY1jaQRiYWgRE-4WU6dbf6Cc6zw398A6aEtzzhMXzqWIhJ-0Lw_QIBkNWO-ujcChQAudLTvcAQolb7GwMQ");'></div>
            <div class="flex flex-col">
                <span class="text-[11px] font-bold text-pink-500 mb-1 ml-1">Emily Chen</span>
                <div class="bg-white dark:bg-bubble-2-dark p-3.5 rounded-2xl rounded-bl-none shadow-sm text-sm leading-relaxed border border-slate-100 dark:border-white/5">
                    Looking at them now! The new color palette for the analytics charts is much cleaner. Great work on the accessibility contrast.
                </div>
                <span class="text-[10px] text-slate-400 mt-1 ml-1">10:44 AM</span>
            </div>
        </div>
        <div class="flex gap-3 max-w-[70%]">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8 shrink-0 mt-auto" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCqaBb7MEf_GGLu1MR5KpDCfSHJ15HJc9CuaDP8M3mSyFqWNWavZroSUh5gmJ4QoSTAWB9VSmjg061ne_SedNYqo0MeEvyVjHW4rOzJF0eQSMSMWwL7QBoHSgx7vU5hg3qHRHlHensBvxlePMrHuItHplqSDU6qPBPZXp0RO-MNDn1_FWsNhC83kCnlkrfdScImjfyAzMd3CGHg-mn5MJfY9V-pZHHE2pxVJbGhZgcAzEmLFVdKigTiKwZHWtXy3IfN64Pm-QLwkG4");'></div>
            <div class="flex flex-col">
                <span class="text-[11px] font-bold text-emerald-500 mb-1 ml-1">James Wilson</span>
                <div class="bg-white dark:bg-bubble-3-dark p-3.5 rounded-2xl rounded-bl-none shadow-sm text-sm leading-relaxed border border-slate-100 dark:border-white/5">
                    Agreed. Sarah, did you also update the mobile navigation behavior we discussed in the sync?
                </div>
                <span class="text-[10px] text-slate-400 mt-1 ml-1">10:45 AM</span>
            </div>
        </div>
        <div class="flex flex-row-reverse gap-3 max-w-[70%] ml-auto">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-8 shrink-0 mt-auto" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuACb5KPKBAQmy_oJJ-ZrXhLDsd6bKrjQl_k1U3J0AduamvX1b02cuXDDh8aAQvzFTOvNNRbLPznZm-Wiu_uuqtAje1VWw1-NsRqJbhTOkPdPi5cWGNwotl4BAY3vOSe2epGkJDvIt3i8gB04jycGLixd8QH909e0Pc73g6-QAJrSyvNMJQuFIqnQlTkJa3NkrmSfuXm7lGim2HwMKLYOJYX2GRDTTQ0C-4aLOKEufwLyqAAEwluGAC9enrfVqN4HPv4sXyYYqeFvc4");'></div>
            <div class="flex flex-col items-end">
                <span class="text-[11px] font-bold text-slate-400 mb-1 mr-1 uppercase tracking-tight">You</span>
                <div class="bg-primary text-white p-3.5 rounded-2xl rounded-br-none shadow-md shadow-primary/10 text-sm leading-relaxed">
                    Hey team, just checked the prototypes. Sarah, I've left a few comments regarding the interaction on the sidebar. Overall looks amazing!
                </div>
                <div class="flex items-center gap-1 mt-1 mr-1">
                    <span class="text-[10px] text-slate-400">10:47 AM</span>
                    <span class="material-symbols-outlined text-[14px] text-primary" style="font-variation-settings: 'FILL' 1">check_circle</span>
                </div>
            </div>
        </div>
    </div>
    <footer class="p-6 pt-2">
        <div class="bg-white dark:bg-[#111a22] border border-slate-200 dark:border-[#233648] rounded-2xl p-2 flex items-end gap-2 shadow-lg dark:shadow-none">
            <button class="p-2 text-slate-400 hover:text-primary transition-colors">
                <span class="material-symbols-outlined">add_circle</span>
            </button>
            <button class="p-2 text-slate-400 hover:text-primary transition-colors">
                <span class="material-symbols-outlined">sentiment_satisfied</span>
            </button>
            <textarea class="flex-1 bg-transparent border-none focus:ring-0 resize-none py-2 text-sm max-h-32 text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-[#92adc9]" placeholder="Message #Design Team" rows="1"></textarea>
            <button class="p-2 text-slate-400 hover:text-primary transition-colors">
                <span class="material-symbols-outlined">mic</span>
            </button>
            <button class="bg-primary hover:bg-primary/90 text-white size-10 rounded-xl flex items-center justify-center transition-all shadow-md shadow-primary/30 shrink-0">
                <span class="material-symbols-outlined">send</span>
            </button>
        </div>
    </footer>
</main>
