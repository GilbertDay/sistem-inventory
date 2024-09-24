<header class="sticky top-0 bg-[#283593] z-30 ">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 ">

            <!-- Header: Left side -->
            <div class="flex">

                <!-- Hamburger button -->
                <button class="text-gray-500 hover:text-gray-600 dark:hover:text-gray-400 lg:hidden"
                    @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="4" y="5" width="16" height="2" />
                        <rect x="4" y="11" width="16" height="2" />
                        <rect x="4" y="17" width="16" height="2" />
                    </svg>
                </button>

            </div>

            <!-- Header: Right side -->
            <div class="flex items-center space-x-3">

                <!-- Search Button with Modal -->

                <!-- Notifications button -->
                <!-- <x-dropdown-notifications align="right" /> -->

                <!-- Info button -->
                <!-- <x-dropdown-help align="right" /> -->

                <!-- Dark mode toggle -->
                <!-- <x-theme-toggle /> -->

                <!-- Divider -->
                <hr class="w-px h-6 bg-gray-200 border-none dark:bg-gray-700/60" />

                <!-- User button -->
                <x-dropdown-profile align="right" />

            </div>

        </div>
    </div>
</header>
