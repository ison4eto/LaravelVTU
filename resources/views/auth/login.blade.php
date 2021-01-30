@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <h1 class="font-bold text-2xl pb-6 text-center">Login</h1>
            @if(session('errorMessage'))
                <div class="pb-2 rounded-lg mb-6 text-red-500 text-left font-bold">
                    {{ session('errorMessage') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg
                                  @error('email') border-red-500 @enderror "
                           value="{{ old('email') }}">
                    @error('email')
                    <div class="text-red-500 mt-2 text-m">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg
                                  @error('password') border-red-500 @enderror ">
                    @error('password')
                    <div class="text-red-500 mt-2 text-m">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
