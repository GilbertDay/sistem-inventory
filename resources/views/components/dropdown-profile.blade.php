@props([
'align' => 'right'
])

<div class="relative inline-flex" x-data="{ open: false }">
    <button class="inline-flex items-center justify-center group" aria-haspopup="true" @click.prevent="open = !open"
        :aria-expanded="open">
        <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" width="32" height="32"
            alt="{{ Auth::user()->name }}" />
        <div class="flex items-center gap-2 truncate">
            <span
                class="ml-2 text-sm font-medium text-white truncate dark:text-gray-100 group-hover:text-gray-800 dark:group-hover:text-white">{{ Auth::user()->name }}</span>
            <svg class="w-3 h-3 ml-1 text-white fill-current shrink-0 dark:text-gray-500" viewBox="0 0 12 12">
                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
            </svg>
        </div>
    </button>
    <div class="origin-top-right z-10 absolute top-full min-w-44 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700/60 py-1.5 rounded-lg shadow-lg overflow-hidden mt-1 {{$align === 'right' ? 'right-0' : 'left-0'}}"
        @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
        x-transition:enter="transition ease-out duration-200 transform"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" x-cloak>
        <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-gray-200 dark:border-gray-700/60">
            <div class="font-medium text-gray-800 dark:text-gray-100">{{ Auth::user()->name }}</div>
            <div class="pt-2 text-xs italic text-gray-400 dark:text-gray-400">
                @if(Auth::user()->type == 2)
                Staff Umum
                @elseif(Auth::user()->type == 0)
                Kepala Departemen IT
                @else
                Administrator
                @endif
            </div>
        </div>
        <ul>
            <!-- <li>
                <a class="flex items-center px-3 py-1 text-sm font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                    href="{{ route('profile.show') }}" @click="open = false" @focus="open = true"
                    @focusout="open = false">Settings</a>
            </li> -->
            <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <a class="flex items-center px-3 py-1 text-sm font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                        href="{{ route('logout') }}" @click.prevent="$root.submit();" @focus="open = true"
                        @focusout="open = false">
                        {{ __('Sign Out') }}
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
