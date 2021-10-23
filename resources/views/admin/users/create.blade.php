@extends('templates.main')
@section('content')
    <h1 class="text-6xl text-center">Create new User</h1>

    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-xl">
            <form method="POST" action="{{ route('admin.users.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
               @include('admin.includes.form', ['create'=>true])
            </form>
        </div>
    </div>
@endsection
