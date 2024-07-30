<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Office</title>













        <style>
        body {
            background-image: url('pexels-rickyrecap-1666667.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;

             -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        }



.login-modal {
    z-index: 499;
    border-radius: 10px;
    background-color: white;
    width: 50%;
    position: absolute;
    text-align: center;
    min-width: 650px;
    min-height: 600px;
    margin: 0px 0px 0px 0px;
    box-shadow: 0px 0px 1px 1px #A9A9A8;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    overflow: hidden;
}

 .pids-wrapper {
        width: 100%;
    }

    .pid {
        width: calc(15% - 10px);
        height: 10px;
        display: inline-block;
        margin: 5px;
        background-color: #e6e7e8;
        border-radius: 100px;
    }

    #_dropdown {
        max-height: 420px;
        overflow: hidden auto;
    }


    </style>
    </head>
    <body class="antialiased">


       <div id="loginAdvanced" class="login-modal ng-scope" data-ng-controller="PartnerSearchCtrl">
         <header>
           <h3>
            Virtual Office - Guest Login
           </h3>
         </header>

 @if (Route::has('login'))

                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth




 @endif


<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>









</div>
    </body>
</html>
