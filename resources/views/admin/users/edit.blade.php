@extends('templates.main')
@section('content')
    <h1 class="text-6xl text-center">Edit user</h1>

    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-xl">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

                @method('PATCH')
               @include('admin.includes.form')
            </form>
        </div>
    </div>
@endsection
