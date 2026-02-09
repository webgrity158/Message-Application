@extends('layouts.app')
@section('title', 'Socket Test')
@section('content')
    <div ng-app="nodeProjectApp" ng-controller="SocketHomeController" ng-init='init()' class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-white antialiased overflow-hidden h-screen relative">
        <div class="flex h-full w-full overflow-hidden">
            <x-sidebar />
            <div class="flex-1 relative flex">
                <x-default-welcome-screen ng-if="is_default_screen" />
                <x-chat-area ng-show="!is_default_screen" />
                <div ng-show="is_new_chat_window_active" class="absolute inset-0 flex items-center justify-center">
                    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
                    <div class="relative z-10">
                        <x-newchat-section />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    window.authUser = @json(auth()->user());
</script>
@endpush
