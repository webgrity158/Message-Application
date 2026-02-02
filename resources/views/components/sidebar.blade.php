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
                @foreach($messages["all_messages"] as $message)
                    <div class="flex items-center gap-4 bg-primary/10 dark:bg-[#233648] px-5 min-h-[80px] py-3 cursor-pointer border-l-4 border-primary">
                        <div class="relative">
                            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-12 w-12" data-alt="Portrait of Sarah Miller" style='background-image: url({{$message->avatar}});'></div>
                            <div class="absolute bottom-0 right-0 size-3 rounded-full bg-green-500 ring-2 ring-white dark:ring-[#111a22]"></div>
                        </div>
                        <div class="flex flex-col justify-center flex-1 min-w-0">
                            <div class="flex justify-between items-center mb-0.5">
                                <p class="text-slate-900 dark:text-white text-sm font-semibold truncate">{{$message->name}}</p>
                                <p class="text-primary text-[11px] font-medium">{{$message->time}}</p>
                            </div>
                            @if($message->type == 1)
                                <div class="flex items-center gap-2 min-w-0">
                                    @if($message->is_sent_by_me)
                                        @if($message->is_seen)
                                            <span class="material-symbols-outlined text-[14px] text-primary shrink-0">
                                                done_all
                                            </span>
                                        @else
                                            <span class="material-symbols-outlined text-[14px] text-slate-400 shrink-0">
                                                done_all
                                            </span>
                                        @endif
                                    @endif
                                    <p class="text-slate-500 dark:text-[#92adc9] text-xs line-clamp-1 flex-1">
                                        {{ $message->message }}
                                    </p>
                                    @if(@$message->unread)
                                        <div
                                            class="min-w-[20px] h-[20px] px-1 rounded-full bg-primary
                                                flex items-center justify-center shrink-0">
                                            <span class="text-[10px] leading-none text-white font-semibold">
                                                10
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <p class="text-slate-500 dark:text-[#92adc9] text-xs font-medium line-clamp-1">
                                    <span class="text-primary">{{ $message->last_message_user_name }}:</span> {{ $message->message }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
{{ $slot ?? '' }}
