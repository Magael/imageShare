@extends('templates.main')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15">
            <h1 class="text-6xl">
                Register
            </h1>
        </div>
    </div>

    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-lg">
            <form method="POST" action="{{ route('register') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2" for="name">
                        Name
                    </label>
                    <input class="form-control @error('name') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-lg font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="form-control @error('email') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" placeholder="email" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-lg font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="form-control @error('password') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" placeholder="Insert password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                @enderror
                <!--<p class="text-red-500 text-xs italic">Please choose a password.</p>-->
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-lg font-bold mb-2" for="password_confirmation">
                        Password confirm
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm password">
                    <!--<p class="text-red-500 text-xs italic">Please choose a password.</p>-->
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
