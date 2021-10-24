@extends('templates.main')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Welcome to Image share
            </h1>
        </div>
    </div>

    <a href="{{ route('login') }}">
    <div class="sm:grid grid-flow-col grid-cols-3 gap-4 w-4/5 mx-auto py-15 border-b border-gray-200">

        <div class="row-start-2 row-span-2">
            <img src="https://picsum.photos/200/300?random=1">
        </div>
        <div class="row-end-3 row-span-2">
            <img src="https://picsum.photos/200/300?random=2">
        </div>
        <div class="row-start-2 row-span-2">
            <img src="https://picsum.photos/200/300?random=3">
        </div>
    </div>

        <div class="sm:grid grid-flow-col grid-cols-3 gap-4 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div class="row-start-2 row-span-2">
            <img src="https://picsum.photos/200/300?random=4">
        </div>
        <div class="row-end-3 row-span-2">
            <img src="https://picsum.photos/200/300?random=5">
        </div>
        <div class="row-start-2 row-span-2">
            <img src="https://picsum.photos/200/300?random=6">
        </div>
    </div>
    </a>
@endsection
