@extends('templates.main')
@section('content')
    <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <h1 class="text-6xl">
                {{ $post->title }}
            </h1>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div class="w-4/5 m-auto pt-20">
            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, created on {{ date('d M Y', strtotime($post->updated_at)) }}.
            </span>
            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                {{ $post->description }}
            </p>
        </div>
        <div class="w-4/5 m-auto pt-20">
            <img src="{{ asset('images/' . $post->image_path) }}" alt="" class="w-3/4 rounded">

        </div>
        <div class="pt-15 w-4/5 m-auto">
            <a
                href="/blog"
                class=" bg-gray-700 uppercase bg-transparent text-gray-100
                text-l font-extrabold py-3 px-5 rounded-3xl float-left">
                Back
            </a>
        </div>
    </div>




@endsection
