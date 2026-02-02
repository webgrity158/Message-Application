@extends('layouts.app')

@section('title', 'Socket Test')

@section('content')
    <h1>HI</h1>
@endsection

@push('scripts')
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
    <script>
        const socket = io("http://192.168.0.215:3000");

        socket.on("message", (msg) => {
            console.log("New message:", msg);
        });
    </script>

@endpush
