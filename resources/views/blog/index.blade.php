@extends('templates.main')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Blog Posts
            </h1>
        </div>
    </div>
    <div class="sm:grid grid-flow-col auto-cols-max gap-4 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <a href="">
            <img src="https://cdn.pixabay.com/photo/2020/03/22/16/38/metro-4957736_960_720.jpg">
            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">Author </span>, 1 day ago.
            </span>
            </a>
        </div>
        <div>
            <a href="">
                <img src="https://cdn.pixabay.com/photo/2020/03/22/16/38/metro-4957736_960_720.jpg">
                <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">Author </span>, 1 day ago.
            </span>
            </a>

        </div>
    </div>

@endsection
