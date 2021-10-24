@extends('templates.main')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15">
            <h1 class="text-6xl">
                Update profile
            </h1>
        </div>
    </div>

    <div class="w-2/5 m-auto pt-20">
            <form method="POST" action="{{ route('user-profile-information.update') }}" >
                @csrf
                @method("PUT")
                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2" for="name">
                        Name
                    </label>
                    <input class="form-control @error('name') is-invalid @enderror bg-gray-0 block border-b-2 h-20 text-6xl outline-none" id="name" type="text" name="name" placeholder="Name" value="{{ auth()->user()->name }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="form-control @error('email') is-invalid @enderror bg-gray-0 block border-b-2 h-20 text-6xl outline-none" id="email" type="email" name="email" placeholder="email" value="{{ auth()->user()->email }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button class="uppercase mt-15 bg-gray-700 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl" type="submit">
                        Submit
                    </button>
                </div>
            </form>
    </div>
@endsection
