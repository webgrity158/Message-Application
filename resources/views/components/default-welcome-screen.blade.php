<!-- Personal Mesage page -->
<main class="flex-1 flex flex-col items-center justify-center bg-background-light dark:bg-background-dark p-12 text-center">
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



