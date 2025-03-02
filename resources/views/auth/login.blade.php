<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <!--
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        -->

        <!-- Password -->
        <!--
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        -->

        <!-- Remember Me -->
        <!--
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        -->
        <div class="flex flex-col items-center justify-center space-y-4">
            <!-- Google Login Button -->
            <a href="{{ url('/auth/google') }}" class="flex items-center space-x-2 bg-white-600 text-black px-4 py-2 rounded-lg shadow-md hover:bg-white-700 transition">
                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo" class="w-6 h-6">&nbsp;
                <span>Sign in with DepEd GMail</span>
            </a>
            <br>

            <!-- Session Messages -->
            @if (session('not_reg'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md text-sm items-center justify-center">
                    <strong>{{ session('not_reg') }}</strong>
                    <a href="./rms/register" class="text-blue-600 hover:underline">Register?</a>
                </div>
            @endif

            @if (session('not_deped'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md text-sm items-center justify-center">
                    <strong>{{ session('not_deped') }}</strong>
                </div>
            @endif

            <!-- Forgot Password -->
            <center>
            <p class="text-gray-700 text-sm text-center">
                Forgot your DepEd GMail/Microsoft password? <br>
                Request for reset 
                <a href="https://hrms.depedbohol.org/help/reset" class="text-blue-600 hover:underline">here</a>.
            </p>
            </center>
        </div>
    </form>
</x-guest-layout>
