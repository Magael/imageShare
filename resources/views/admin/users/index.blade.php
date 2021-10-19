@extends('templates.main')
@section('content')
    <div class="mb-5 py-10 px-2 justify-center">

        <h1 class="uppercase text-3xl font-bold float-left">Users</h1>
        <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded float-right" href="{{ route('admin.users.create')}}" role="button">Create</a>

    </div>
    <div class="flex items-center justify-center bg-gray-50 py-6 px-4 sm:px-6 lg:px-8 ">
        <table class="table-auto m-t-10">
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
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('admin.users.edit', $user->id)}}" role="button">Edit</a>

                    <button type="button" class="bg-blue-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
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
            @endforeach

            </tbody>
        </table>
    </div>
    <div class="flex items-center justify-center bg-gray-50 py-4 px-2 sm:px-6 lg:px-8 ">
    {{ $users->links() }}
    </div>

@endsection
