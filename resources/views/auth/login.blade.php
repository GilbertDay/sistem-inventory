<x-authentication-layout>
    <div class="flex justify-center mb-6">
        <img class="" src="{{ asset('images/logo-jbg.png') }}" alt="LPPM_Logo" width="130" height="130" />
    </div>
    @if (session('status'))
    <div class="mb-4 text-sm font-medium text-green-600">
        {{ session('status') }}
    </div>
    @endif
    <!-- Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="space-y-4">
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
            <!-- <div class="mr-1">
                <a class="text-sm underline hover:no-underline" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a> -->
        </div>
        @endif
        <x-button class="flex w-full bg-[#1A237E]">
            {{ __('Login') }}
        </x-button>
        </div>
    </form>
    <x-validation-errors class="mt-4" />
    <!-- Footer -->
    <!-- <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
        <div class="text-sm">
            {{ __('Don\'t you have an account?') }} <a
                class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                href="{{ route('register') }}">{{ __('Sign Up') }}</a>
        </div>
        <div class="mt-5">
            <div class="px-3 py-2 text-yellow-700 rounded-lg bg-yellow-500/20">
                <svg class="inline w-3 h-3 fill-current shrink-0" viewBox="0 0 12 12">
                    <path
                        d="M10.28 1.28L3.989 7.575 1.695 5.28A1 1 0 00.28 6.695l3 3a1 1 0 001.414 0l7-7A1 1 0 0010.28 1.28z" />
                </svg>
                <span class="text-sm">
                    To support you during the pandemic super pro features are free until March 31st.
                </span>
            </div>
        </div>
    </div> -->
</x-authentication-layout>
