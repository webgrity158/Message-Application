<div class="bg-white dark:bg-[#111a22] w-full max-w-[560px] rounded-2xl shadow-2xl flex flex-col max-h-[85vh] border border-slate-200 dark:border-[#233648]">
    <div class="p-6 border-b border-slate-200 dark:border-[#233648] flex justify-between items-center">
        <div>
            <h2 class="text-xl font-bold">New Chat</h2>
            <p class="text-sm text-slate-500 dark:text-[#92adc9]">Connect with colleagues and friends</p>
        </div>
        <button ng-click="toggleNewChatWindow()" class="p-2 text-slate-400 hover:text-slate-600 dark:hover:text-white transition-colors">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>

    <div class="px-6 py-4 space-y-4">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="material-symbols-outlined text-slate-400">search</span>
            </div>
            <input
                class="block w-full pl-10 pr-4 py-2.5 bg-slate-50 dark:bg-[#233648] border-none rounded-xl text-sm focus:ring-2 focus:ring-primary/50 text-slate-900 dark:text-white placeholder:text-slate-400 dark:placeholder:text-[#92adc9]"
                placeholder="Search people or email addresses"
                type="text"
            />
        </div>

        <label class="flex items-center justify-between w-full gap-3 cursor-pointer">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-primary text-xl" style="font-variation-settings: 'FILL' 1">group_add</span>
                <span class="text-sm font-semibold">Create a Group</span>
            </div>
            <div class="flex items-center">
                <input class="sr-only peer" type="checkbox" value="" />
                <span
                    class="relative inline-flex w-11 h-6 rounded-full bg-slate-200 dark:bg-[#233648] transition-colors duration-200 ease-in-out peer-focus-visible:outline-none peer-focus-visible:ring-2 peer-focus-visible:ring-primary/70 peer-checked:bg-primary after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:h-5 after:w-5 after:bg-white after:border after:border-gray-300 after:rounded-full after:shadow-lg after:transition-all peer-checked:after:translate-x-full peer-checked:after:border-white">
                </span>
            </div>
        </label>
    </div>

    <div class="flex-1 overflow-y-auto px-2 pb-4 no-scrollbar">
        <div class="px-4 py-2">
            <h3 class="text-[11px] font-bold text-slate-400 dark:text-[#92adc9] uppercase tracking-wider">Suggested Contacts</h3>
        </div>

        <!-- Contact Items -->
        <label class="flex items-center gap-4 px-4 py-3 hover:bg-slate-50 dark:hover:bg-white/5 rounded-xl cursor-pointer transition-colors group">
            <div class="relative">
                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-11 w-11"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBNsvZcLVpRGVAvppGMD3bhD1LpSbcP1mLW4k6Z65Rmchg55RjUpduUaf7NyCbzetEYVzkVK1bBbKJTeURWqhJnjnN-kaAvtLHP1Ie2j1y4u-WIIZ_0gk4ElJJ7-NtdEvJEd7hUXDqHFdzSTo-X1hRcBl0OQxR30aJltbnh-13odRPDqbUI5bqkdgkgNCDhQfOfvnxVWA1diqVLTMynL6aYPXvG_I5TPE8X6cKp2CZyQdVmwoRKV4GANY_O3nsXojFXl306VnPkVOE");'>
                </div>
                <div class="absolute bottom-0 right-0 size-3 rounded-full bg-green-500 ring-2 ring-white dark:ring-[#111a22]"></div>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold truncate">Sarah Miller</p>
                <p class="text-xs text-slate-500 dark:text-[#92adc9] truncate">sarah.m@company.com</p>
            </div>
            <div class="relative">
                <input checked="" class="form-checkbox size-5 rounded-md border-slate-300 dark:border-slate-600 text-primary focus:ring-primary focus:ring-offset-0 dark:bg-transparent checked:bg-primary" type="checkbox"/>
            </div>
        </label>

        <label class="flex items-center gap-4 px-4 py-3 hover:bg-slate-50 dark:hover:bg-white/5 rounded-xl cursor-pointer transition-colors group">
            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-11 w-11"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCqaBb7MEf_GGLu1MR5KpDCfSHJ15HJc9CuaDP8M3mSyFqWNWavZroSUh5gmJ4QoSTAWB9VSmjg061ne_SedNYqo0MeEvyVjHW4rOzJF0eQSMSMWwL7QBoHSgx7vU5hg3qHRHlHensBvxlePMrHuItHplqSDU6qPBPZXp0RO-MNDn1_FWsNhC83kCnlkrfdScImjfyAzMd3CGHg-mn5MJfY9V-pZHHE2pxVJbGhZgcAzEmLFVdKigTiKwZHWtXy3IfN64Pm-QLwkG4");'>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold truncate">James Wilson</p>
                <p class="text-xs text-slate-500 dark:text-[#92adc9] truncate">james.wilson@pro-service.com</p>
            </div>
            <div class="relative">
                <input class="form-checkbox size-5 rounded-md border-slate-300 dark:border-slate-600 text-primary focus:ring-primary focus:ring-offset-0 dark:bg-transparent checked:bg-primary" type="checkbox"/>
            </div>
        </label>

        <!-- Add other contacts in same pattern -->

        <div class="px-4 py-2 mt-2">
            <h3 class="text-[11px] font-bold text-slate-400 dark:text-[#92adc9] uppercase tracking-wider">Recent</h3>
        </div>

        <label class="flex items-center gap-4 px-4 py-3 hover:bg-slate-50 dark:hover:bg-white/5 rounded-xl cursor-pointer transition-colors group">
            <div class="flex items-center justify-center bg-slate-200 dark:bg-[#233648] text-slate-600 dark:text-slate-300 font-bold rounded-full h-11 w-11">
                DA
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold truncate">David Anderson</p>
                <p class="text-xs text-slate-500 dark:text-[#92adc9] truncate">danderson@outlook.com</p>
            </div>
            <div class="relative">
                <input class="form-checkbox size-5 rounded-md border-slate-300 dark:border-slate-600 text-primary focus:ring-primary focus:ring-offset-0 dark:bg-transparent checked:bg-primary" type="checkbox"/>
            </div>
        </label>
    </div>

    <div class="p-6 border-t border-slate-200 dark:border-[#233648] flex items-center justify-between">
        <div class="flex -space-x-3">
            <div class="size-8 rounded-full border-2 border-white dark:border-[#111a22] bg-cover bg-center"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBNsvZcLVpRGVAvppGMD3bhD1LpSbcP1mLW4k6Z65Rmchg55RjUpduUaf7NyCbzetEYVzkVK1bBbKJTeURWqhJnjnN-kaAvtLHP1Ie2j1y4u-WIIZ_0gk4ElJJ7-NtdEvJEd7hUXDqHFdzSTo-X1hRcBl0OQxR30aJltbnh-13odRPDqbUI5bqkdgkgNCDhQfOfvnxVWA1diqVLTMynL6aYPXvG_I5TPE8X6cKp2CZyQdVmwoRKV4GANY_O3nsXojFXl306VnPkVOE");'>
            </div>
            <div class="size-8 rounded-full border-2 border-white dark:border-[#111a22] bg-cover bg-center"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBWHidZib66B-OPO-wqoZm6IoW1raY3oSMl2HKxIBVzP2ilSdR5uOKPSopVwOMUqFxR_bJurzpV95UPthNNhNSUBkVLWBfOjM_88L8K7gQuy5wqrB1IzQm9CnP3JvS0ZCKcq4Dnux2x6bS1-ooxoG7mfDrJozQCygehKaW9CSmshj26K4ya9ZUN-MmnHHjxya65heVqgEhl0xBxzbdfPUYwdU-unPnGoMUN70xfuNbcYc7R51GBW2bE-0AN-rHhPRUtVC4Qr04gBVM");'>
            </div>
            <div class="size-8 rounded-full border-2 border-white dark:border-[#111a22] bg-slate-200 dark:bg-[#233648] flex items-center justify-center text-[10px] font-bold">
                +2
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button class="px-4 py-2 text-sm font-semibold text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white transition-colors">Cancel</button>
            <button class="bg-primary hover:bg-primary/90 text-white px-6 py-2.5 rounded-xl text-sm font-bold transition-all shadow-lg shadow-primary/20 flex items-center gap-2">
                Start Chat
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </button>
        </div>
    </div>
</div>
