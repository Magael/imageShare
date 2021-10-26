@extends('templates.main')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl ">
                Users
            </h1>
            <a class="bg-gray-700 uppercase bg-transparent text-gray-100
                text-l font-extrabold py-3 px-5 rounded-3xl float-right" href="{{ route('admin.users.create')}}" role="button">Create</a>
        </div>
    </div>

    {{--<div class="w-4/5 m-auto pt-20 items-center justify-center">--}}
   <div class="flex items-center justify-center py-6 px-4 sm:px-6 lg:px-8 mt-5">
        <table class="table-auto">
            <thead>
            <tr>
                <th class="px-4 py-2">#Id</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Actions</th>

            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                <td class="border px-4 py-2">{{ $user->id }}</td>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">
                    <a class="bg-gray-700 uppercase bg-transparent text-gray-100
                text-base font-bold py-3 px-5 rounded-3xl" href="{{ route('admin.users.edit', $user->id)}}" role="button">Edit</a>

                    <button type="button" class="bg-red-700 uppercase bg-transparent text-gray-100
                text-base font-bold py-3 px-5 rounded-3xl"
                    onclick="event.preventDefault();
                     document.getElementById('delete-user-form-{{ $user->id }}').submit()">
                        Delete
                    </button>

                    <form id="delete-user-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
                </tr>
                <div class="flex items-center justify-center bg-gray-50 py-4 px-2 sm:px-6 lg:px-8 ">
                    {{ $users->links() }}
                </div>
            @endforeach

            </tbody>
        </table>

    </div>


@endsection
