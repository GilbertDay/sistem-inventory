@if ($errors->any())
    <div {{ $attributes }}>
        <div class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg max-w-1/2">
            <div class="font-medium">{{ __('Email atau Password Salah !!') }}</div>

        </div>
    </div>
@endif
