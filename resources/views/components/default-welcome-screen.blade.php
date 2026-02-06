<!-- Personal Mesage page -->
<main class="flex-1 flex flex-col items-center justify-center bg-background-light dark:bg-background-dark p-12 text-center" ng-show="is_default_screen && active_page != 'groups'" >
    <div class="max-w-md flex flex-col items-center">
        <!-- Empty State Illustration Placeholder -->
        <div class="relative w-72 h-72 mb-8 bg-gradient-to-br from-primary/5 to-primary/20 rounded-full flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-primary via-transparent to-transparent"></div>
            <span class="material-symbols-outlined text-primary/30 text-[120px] select-none">forum</span>
            <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-primary/10 rounded-full blur-2xl"></div>
        </div>

        <!-- Welcome Text -->
        <h2 class="text-3xl font-bold text-slate-800 dark:text-white mb-4">Welcome back, Alex!</h2>
        <p class="text-slate-500 dark:text-slate-400 text-lg mb-10">
            Select a conversation from the left to start messaging, or reach out to someone new.
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 w-full justify-center">
            <button class="flex items-center justify-center gap-2 bg-primary hover:bg-primary/90 text-white font-semibold py-3 px-8 rounded-xl transition-all shadow-lg shadow-primary/20">
                <span class="material-symbols-outlined">add_comment</span>
                Start New Chat
            </button>
            <button class="flex items-center justify-center gap-2 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 font-semibold py-3 px-8 rounded-xl transition-all">
                <span class="material-symbols-outlined">person_search</span>
                View Contacts
            </button>
        </div>

        <!-- Footer Info -->
        <div class="mt-16 pt-8 border-t border-slate-200 dark:border-slate-800 w-full flex items-center justify-center gap-8 opacity-60">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">security</span>
                <span class="text-xs font-medium">End-to-end encrypted</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">laptop_mac</span>
                <span class="text-xs font-medium">Sync with mobile</span>
            </div>
        </div>

    </div>
</main>

<!-- Group Discussions Page -->
<main class="flex-1 flex flex-col items-center justify-center bg-slate-50 dark:bg-background-dark p-6 text-center" ng-show="is_default_screen && active_page == 'groups'">
    <div class="max-w-md w-full flex flex-col items-center">

        <!-- Illustration -->
        <div class="size-64 mb-8 text-slate-200 dark:text-[#1e2e3d]">
            <div class="relative">
                <span class="material-symbols-outlined text-[160px] opacity-20" style="font-variation-settings: 'FILL' 1">forum</span>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="bg-primary/10 p-8 rounded-full">
                        <span class="material-symbols-outlined text-6xl text-primary/40">groups</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Heading -->
        <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">Your Group Discussions</h3>

        <!-- Description -->
        <p class="text-slate-500 dark:text-[#92adc9] mb-8 leading-relaxed">
            Select a group from the list on the left to start collaborating with your team, or create a new group to start a project.
        </p>

        <!-- Action Buttons -->
        <div class="flex gap-4">
            <button class="bg-white dark:bg-[#233648] hover:bg-slate-100 dark:hover:bg-[#2d465c] text-slate-900 dark:text-white font-semibold py-2.5 px-6 rounded-xl border border-slate-200 dark:border-transparent transition-all shadow-sm">
                View Contacts
            </button>
            <button class="bg-primary hover:bg-primary/90 text-white font-semibold py-2.5 px-6 rounded-xl transition-all shadow-md shadow-primary/20">
                Create New Group
            </button>
        </div>

        <!-- Quick Tip -->
        <div class="mt-16 pt-8 border-t border-slate-200 dark:border-[#233648] w-full max-w-xs">
            <p class="text-[11px] font-bold text-slate-400 dark:text-[#5c7c9b] uppercase tracking-widest mb-4">Quick Tip</p>
            <p class="text-xs text-slate-400 dark:text-[#7a9bbd] italic">
                "You can mention members in groups by typing @ followed by their name."
            </p>
        </div>
    </div>
</main>

