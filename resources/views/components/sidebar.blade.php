<!-- Leftmost Workspace Nav -->
<aside class="w-20 flex flex-col items-center py-6 bg-slate-100 dark:bg-[#111a22] border-r border-slate-200 dark:border-[#233648] shrink-0">
    <div class="mb-8">
        <div class="bg-primary size-12 rounded-xl flex items-center justify-center text-white shadow-lg shadow-primary/20">
            <span class="material-symbols-outlined font-bold">chat_bubble</span>
        </div>
    </div>
    <nav class="flex flex-col gap-6 flex-1">
        <div class="flex flex-col items-center gap-1 group cursor-pointer text-primary">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1">chat_bubble</span>
            <span class="text-[10px] font-bold">Chats</span>
        </div>
        <div class="flex flex-col items-center gap-1 group cursor-pointer text-slate-500 dark:text-[#92adc9] hover:text-primary transition-colors">
            <span class="material-symbols-outlined">contacts</span>
            <span class="text-[10px] font-medium">Contacts</span>
        </div>
        <div class="flex flex-col items-center gap-1 group cursor-pointer text-slate-500 dark:text-[#92adc9] hover:text-primary transition-colors">
            <span class="material-symbols-outlined">call</span>
            <span class="text-[10px] font-medium">Calls</span>
        </div>
        <div class="flex flex-col items-center gap-1 group cursor-pointer text-slate-500 dark:text-[#92adc9] hover:text-primary transition-colors">
            <span class="material-symbols-outlined">grid_view</span>
            <span class="text-[10px] font-medium">Apps</span>
        </div>
    </nav>
    <div class="flex flex-col items-center gap-6">
        <div class="text-slate-500 dark:text-[#92adc9] hover:text-primary cursor-pointer transition-colors">
            <span class="material-symbols-outlined">settings</span>
        </div>
        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 ring-2 ring-primary/20" data-alt="User profile avatar of Alex Johnson" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBc1yZQ-JqXFhJoNH9qo2uLyJFcig0tD72biRl2MxYlabWP7UclV3HiVXPX7qJWDf9Dgkf6VwHrpc6ayG0xxZchBYXCQPvqmllszsxt7K5TH6TDOeqQssxOGw6mRbcA4FB9XerG6mjxZYwfDUtC61qa89CPqlF7qryQEoetS8-Mb9vuevK1ulqQkdBqgDyvtyty5ZUeplICPHS4nx-OaugO_3p_tRYLBU8LC7ItZOC9L538qG48DlTHKi3RoBRKkIj5PhEZyXUUd1w");'></div>
    </div>
</aside>
<!-- Conversation Sidebar -->
<section class="w-[380px] flex flex-col bg-white dark:bg-[#111a22] border-r border-slate-200 dark:border-[#233648] shrink-0">
    <div class="p-5">
        <h2 class="text-xl font-bold mb-4">Messages</h2>
        <div class="pb-1">
            <label class="flex flex-col min-w-40 h-10 w-full">
                <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                    <div class="text-slate-400 dark:text-[#92adc9] flex border-none bg-slate-100 dark:bg-[#233648] items-center justify-center pl-4 rounded-l-lg">
                        <span class="material-symbols-outlined text-xl">search</span>
                    </div>
                    <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-r-lg text-slate-900 dark:text-white focus:outline-0 focus:ring-0 border-none bg-slate-100 dark:bg-[#233648] h-full placeholder:text-slate-400 dark:placeholder:text-[#92adc9] px-3 text-sm font-normal" placeholder="Search conversations" value=""/>
                </div>
            </label>
        </div>
    </div>
    <div class="pb-3 px-1">
        <div class="flex border-b border-slate-100 dark:border-[#324d67] px-4 gap-8">
            <a class="flex flex-col items-center justify-center border-b-[3px] border-b-primary text-slate-900 dark:text-white pb-[13px] pt-2" href="#">
                <p class="text-xs font-bold leading-normal tracking-wide">ALL</p>
            </a>
            <a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-slate-400 dark:text-[#92adc9] pb-[13px] pt-2" href="#">
                <p class="text-xs font-bold leading-normal tracking-wide">UNREAD</p>
            </a>
            <a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-slate-400 dark:text-[#92adc9] pb-[13px] pt-2" href="#">
                <p class="text-xs font-bold leading-normal tracking-wide">GROUPS</p>
            </a>
        </div>
    </div>
    <div class="flex-1 overflow-y-auto no-scrollbar">
            <div class="all_messages ">
                @foreach($messages as $message)
                    @if($messages->type == 1)
                        <div class="flex items-center gap-4 bg-primary/10 dark:bg-[#233648] px-5 min-h-[80px] py-3 cursor-pointer border-l-4 border-primary">
                            <div class="relative">
                                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-12 w-12" data-alt="Portrait of Sarah Miller" style='background-image: url(message->user->profile_picture);'></div>
                                <div class="absolute bottom-0 right-0 size-3 rounded-full bg-green-500 ring-2 ring-white dark:ring-[#111a22]"></div>
                            </div>
                            <div class="flex flex-col justify-center flex-1 min-w-0">
                                <div class="flex justify-between items-center mb-0.5">
                                    <p class="text-slate-900 dark:text-white text-sm font-semibold truncate">Sarah Miller</p>
                                    <p class="text-primary text-[11px] font-medium">10:30 AM</p>
                                </div>
                                <p class="text-slate-500 dark:text-[#92adc9] text-xs font-medium line-clamp-1">Can we review the Q4 results later?</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            

            <div class="flex items-center gap-4 hover:bg-slate-50 dark:hover:bg-white/5 px-5 min-h-[80px] py-3 cursor-pointer transition-colors">
                <div class="relative">
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-12 w-12" data-alt="Design Team Group Avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBWHidZib66B-OPO-wqoZm6IoW1raY3oSMl2HKxIBVzP2ilSdR5uOKPSopVwOMUqFxR_bJurzpV95UPthNNhNSUBkVLWBfOjM_88L8K7gQuy5wqrB1IzQm9CnP3JvS0ZCKcq4Dnux2x6bS1-ooxoG7mfDrJozQCygehKaW9CSmshj26K4ya9ZUN-MmnHHjxya65heVqgEhl0xBxzbdfPUYwdU-unPnGoMUN70xfuNbcYc7R51GBW2bE-0AN-rHhPRUtVC4Qr04gBVM");'></div>
                    <div class="absolute bottom-0 right-0 size-3 rounded-full bg-green-500 ring-2 ring-white dark:ring-[#111a22]"></div>
                </div>
                <div class="flex flex-col justify-center flex-1 min-w-0">
                    <div class="flex justify-between items-center mb-0.5">
                        <p class="text-slate-900 dark:text-white text-sm font-semibold truncate">Design Team</p>
                        <p class="text-slate-400 dark:text-[#92adc9] text-[11px]">Yesterday</p>
                    </div>
                    <div class="flex items-center gap-1">
                        <p class="text-slate-500 dark:text-[#92adc9] text-xs line-clamp-1 flex-1">New mockups are ready for review</p>
                        <div class="size-2 rounded-full bg-primary"></div>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-4 hover:bg-slate-50 dark:hover:bg-white/5 px-5 min-h-[80px] py-3 cursor-pointer transition-colors">
                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-12 w-12" data-alt="Portrait of James Wilson" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCqaBb7MEf_GGLu1MR5KpDCfSHJ15HJc9CuaDP8M3mSyFqWNWavZroSUh5gmJ4QoSTAWB9VSmjg061ne_SedNYqo0MeEvyVjHW4rOzJF0eQSMSMWwL7QBoHSgx7vU5hg3qHRHlHensBvxlePMrHuItHplqSDU6qPBPZXp0RO-MNDn1_FWsNhC83kCnlkrfdScImjfyAzMd3CGHg-mn5MJfY9V-pZHHE2pxVJbGhZgcAzEmLFVdKigTiKwZHWtXy3IfN64Pm-QLwkG4");'></div>
                <div class="flex flex-col justify-center flex-1 min-w-0">
                    <div class="flex justify-between items-center mb-0.5">
                        <p class="text-slate-900 dark:text-white text-sm font-semibold truncate">James Wilson</p>
                        <p class="text-slate-400 dark:text-[#92adc9] text-[11px]">Oct 24</p>
                    </div>
                    <p class="text-slate-500 dark:text-[#92adc9] text-xs line-clamp-1">I've sent over the contract for signing.</p>
                </div>
            </div>
            <div class="flex items-center gap-4 hover:bg-slate-50 dark:hover:bg-white/5 px-5 min-h-[80px] py-3 cursor-pointer transition-colors">
                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-12 w-12" data-alt="Portrait of Emily Chen" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCVdH3pIimvh612EB2704O_k7Wp-GrebQyLODyZEGgVa9Tfyc0Ci2QD1-bS8e1FmcouMmXXW_tShNvLQTqvbXspwUvZUldQLVmi25GTY_p2FN9FdKXdG8Ggka9u5S5pyPwszqrNp95xyt_fLVlg1EBYEnMD6g-kZyNr49IUuMFTHwXz7IvzZ522bQ1S4RY1jaQRiYWgRE-4WU6dbf6Cc6zw398A6aEtzzhMXzqWIhJ-0Lw_QIBkNWO-ujcChQAudLTvcAQolb7GwMQ");'></div>
                <div class="flex flex-col justify-center flex-1 min-w-0">
                    <div class="flex justify-between items-center mb-0.5">
                        <p class="text-slate-900 dark:text-white text-sm font-semibold truncate">Emily Chen</p>
                        <p class="text-slate-400 dark:text-[#92adc9] text-[11px]">Oct 23</p>
                    </div>
                    <p class="text-slate-500 dark:text-[#92adc9] text-xs line-clamp-1">The meeting has been rescheduled to Friday.</p>
                </div>
            </div>

            <!-- Chat Item: Product Launch 2024 -->
            <div class="flex items-center gap-4 hover:bg-slate-50 dark:hover:bg-white/5 px-5 min-h-[80px] py-3 cursor-pointer transition-colors border-l-4 border-transparent">
                <div class="relative h-12 w-12 shrink-0 group-avatar-collage bg-slate-200 dark:bg-[#233648]">
                    <div class="bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBNsvZcLVpRGVAvppGMD3bhD1LpSbcP1mLW4k6Z65Rmchg55RjUpduUaf7NyCbzetEYVzkVK1bBbKJTeURWqhJnjnN-kaAvtLHP1Ie2j1y4u-WIIZ_0gk4ElJJ7-NtdEvJEd7hUXDqHFdzSTo-X1hRcBl0OQxR30aJltbnh-13odRPDqbUI5bqkdgkgNCDhQfOfvnxVWA1diqVLTMynL6aYPXvG_I5TPE8X6cKp2CZyQdVmwoRKV4GANY_O3nsXojFXl306VnPkVOE");'></div>
                    <div class="bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCqaBb7MEf_GGLu1MR5KpDCfSHJ15HJc9CuaDP8M3mSyFqWNWavZroSUh5gmJ4QoSTAWB9VSmjg061ne_SedNYqo0MeEvyVjHW4rOzJF0eQSMSMWwL7QBoHSgx7vU5hg3qHRHlHensBvxlePMrHuItHplqSDU6qPBPZXp0RO-MNDn1_FWsNhC83kCnlkrfdScImjfyAzMd3CGHg-mn5MJfY9V-pZHHE2pxVJbGhZgcAzEmLFVdKigTiKwZHWtXy3IfN64Pm-QLwkG4");'></div>
                    <div class="bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCVdH3pIimvh612EB2704O_k7Wp-GrebQyLODyZEGgVa9Tfyc0Ci2QD1-bS8e1FmcouMmXXW_tShNvLQTqvbXspwUvZUldQLVmi25GTY_p2FN9FdKXdG8Ggka9u5S5pyPwszqrNp95xyt_fLVlg1EBYEnMD6g-kZyNr49IUuMFTHwXz7IvzZ522bQ1S4RY1jaQRiYWgRE-4WU6dbf6Cc6zw398A6aEtzzhMXzqWIhJ-0Lw_QIBkNWO-ujcChQAudLTvcAQolb7GwMQ");'></div>
                    <div class="bg-slate-300 dark:bg-[#324d67] flex items-center justify-center text-[8px] font-bold text-slate-600 dark:text-[#92adc9]">+8</div>
                </div>
                <div class="flex flex-col justify-center flex-1 min-w-0">
                    <div class="flex justify-between items-center mb-0.5">
                        <p class="text-slate-900 dark:text-white text-sm font-semibold truncate">Product Launch 2024</p>
                        <p class="text-slate-400 dark:text-[#92adc9] text-[11px]">10:30 AM</p>
                    </div>
                    <p class="text-slate-500 dark:text-[#92adc9] text-xs font-medium line-clamp-1">
                        <span class="text-primary">Sarah:</span> Can we review the Q4 results?
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
{{ $slot ?? '' }}
