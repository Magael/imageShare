@csrf
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
        Name
    </label>
    <input class="form-control @error('name') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" placeholder="Name"
           value="{{ old('name') }} @isset($user) {{ $user->name }} @endisset">
    @error('name')
    <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
    @enderror
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
        Email
    </label>
    <input class="form-control @error('email') is-invalid @enderror shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" name="email" placeholder="email" value="{{ old('email') }}
    @isset($user) {{ $user->email }} @endisset">
    @error('email')
    <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
    @enderror
</div>
@isset($create)
<div class="mb-6">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
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
@endisset
<div class="mb-6">
    @foreach($roles as $role)
        <div class="form-check">
            <input class="form-check-input" name="roles[]"
                   type="checkbox" value="{{ $role->id }}" id="{{ $role->name }}"
                @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
            <label class="form-check-label" for="{{ $role->name }}">
                {{ $role->name }}
            </label>
        </div>
    @endforeach
</div>
<div class="flex items-center justify-between">
    <button class="bg-gray-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" >
        Submit
    </button>
</div>
