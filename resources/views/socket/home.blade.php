@extends('layouts.app')
@section('title', 'Socket Test')
@section('content')
    <div class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-white antialiased overflow-hidden h-screen">
        <div class="flex h-full w-full overflow-hidden">
            <x-sidebar :messages="$messages" />
            <x-default-welcome-screen />
        </div>
    </div>
@endsection
