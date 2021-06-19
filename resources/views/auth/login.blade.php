@extends('layouts.auth')

@section('title', 'Connexion')

@section('content')

<div class="max-w-lg mx-auto">

    <div class="text-center">
        <a href="{{ route('login') }}">
            <span class="bg-green-500 font-bold text-2xl text-white px-2 py-1 rounded">Dream-house</span>
        </a>
    </div>

    <div class="bg-gray-100 mt-8 px-6 py-8 rounded-lg shadow-2xl hover:shadow-lg duration-300">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="space-y-4">
                <div>
                    <!-- Email Address -->
                    <div>
                        <label for="email" class="text-gray-500">{{ __("Email") }}</label>

                        <input id="email" name="email" class="block mt-1 w-full rounded-xl" type="email"
                            value="{{ old('email') }}" required autofocus>
                        @error('email')
                        <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" class="text-gray-500">{{ __("Password") }}</label>

                        <input id="password" class="block mt-1 w-full rounded-xl" type="password" name="password"
                            required autocomplete="current-password">
                        @error('password')
                        <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                    @endif

                </div>

                <div>
                    <a class="text-gray-500 underline mt-5 mr-3" href="{{ url('/') }}">Annuler</a>
                    <button
                        class="bg-blue-500 mt-5 duration-200 hover:bg-blue-700 py-2 rounded-md px-2 text-white text-base"
                        type="submit">Connexion</button>
                </div>
            </div>

        </form>
    </div>

</div>

@endsection