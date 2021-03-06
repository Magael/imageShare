@extends('templates.main')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Blog Posts
            </h1>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    @if(Auth::check())
        <div class="pt-15 w-4/5 m-auto">
            <a
                href="/blog/create"
                class=" bg-gray-700 uppercase bg-transparent text-gray-100
                text-l font-extrabold py-3 px-5 rounded-3xl float-right">
                Create Post
            </a>
        </div>
    @endif

    <div class="grid grid-flow-row grid-cols-3 grid-rows-3 gap-4 w-4/5 mx-5 py-5">

    @foreach($posts as $post)

    <div>
        <div>
            <a href="/blog/{{ $post->slug }}">
            <img src="{{ asset('images/' . $post->image_path) }}" alt=""class="w-3/4 rounded py-5">
            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $post->user->name}}</span>, created on {{ date('d M Y', strtotime($post->updated_at)) }}.
            </span>
            </a>

            @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <span class="float-right">
                    <a href="/blog/{{ $post->slug }}/edit"
                        class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                        Edit
                    </a>
                </span>

                <span class="float-right">
                    <form action="/blog/{{ $post->slug }}"
                          method="POST">
                        @csrf
                        @method('delete')

                        <button class="text-red-500 pr-3" type="submit">
                            Delete
                        </button>
                    </form>
                </span>
            @endif
        </div>
    </div>
    @endforeach
    </div>
@endsection
