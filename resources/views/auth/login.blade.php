<x-authentication-layout>
    <div class="flex flex-col items-center justify-center mb-6">
        <img class="" src="{{ asset('images/logo-jbg.png') }}" alt="LPPM_Logo" width="130" height="130" />
        <x-validation-errors class="mt-4 " />
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
</x-authentication-layout>


