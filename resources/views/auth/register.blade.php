@extends('layouts.auth', ['title' => ' | Inscription'])

@section('title', 'Inscription')

@section('content')
<div class="max-w-lg mx-auto">
    <h1 class="text-center">
        <a href="{{ route('login') }}">
            <span class="bg-green-500 font-bold text-2xl text-white px-2 py-1 rounded">Dream-house</span>
        </a>
    </h1>

    <div class="bg-gray-100 mt-8 px-6 py-8 rounded-lg shadow-2xl hover:shadow-lg duration-300">
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="font-semibold text-gray-500" for="name">Nom</label>
                    <input name="name" value="{{ old('name') }}"
                        class="block w-full rounded-md text-base py-2 h-9 border-gray-300" id="name" type="text">
                    @error('name')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="font-semibold text-gray-500" for="email">Email</label>
                    <input value="{{ old('email') }}" name="email"
                        class="block w-full rounded-md text-base py-2 h-9 border-gray-300" id="email" type="text">
                    @error('email')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="font-semibold text-gray-500" for="password">Mot de passe</label>
                    <input name="password" class="block w-full rounded-md text-base py-2 h-9 border-gray-300"
                        id="password" type="password">
                    @error('password')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="font-semibold text-gray-500" for="password">Confirmation Mot de passe</label>
                    <input name="password_confirmation"
                        class="block w-full rounded-md text-base py-2 h-9 border-gray-300" id="password"
                        type="password">
                </div>
            </div>

            <button
                class="bg-blue-500 mt-5 duration-200 hover:bg-blue-700 py-2 rounded-md px-2 text-white block w-full text-base"
                type="submit">Inscription</button>
        </form>
        <div class="text-center mt-2">
            <a class="underline" href="{{ route('login') }}">Connexion</a>
        </div>
    </div>
</div>
@endsection