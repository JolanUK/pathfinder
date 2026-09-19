<header class="bg-white">
    <nav aria-label="Global" class="mx-auto flex max-w-7xl items-center justify-between p-4 lg:px-6">
        <div class="flex items-center gap-x-12">
            <a href="/home" class="-m-1.5 p-1.5">
                <span class="sr-only">{{ config('app.name') }}</span>
                <x-icon-aw-codes class="h-14 w-auto" />
            </a>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="/home" class="text-sm/6 font-semibold text-white hover:text-primary-500">Home</a>
                <a href="/about-us" class="text-sm/6 font-semibold text-white hover:text-primary-500">About Us</a>
                <a href="/contact" class="text-sm/6 font-semibold text-white hover:text-primary-500">Contact</a>
            </div>
        </div>
        <div class="flex lg:hidden">
            <button type="button" command="show-modal" commandfor="mobile-menu" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400 hover:text-white">
                <span class="sr-only">Open main menu</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                    <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex">
            <a href="/admin/login" class="text-sm/6 font-semibold text-white hover:text-primary-500">Log in <span aria-hidden="true">&rarr;</span></a>
        </div>
    </nav>
    <el-dialog>
        <dialog id="mobile-menu" class="m-0 p-0 backdrop:bg-transparent lg:hidden">
            <div tabindex="0" class="fixed inset-0 focus:outline">
                <el-dialog-panel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white p-4 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10 dark:bg-gray-900 dark:sm:ring-gray-100/10">
                    <div class="flex items-center justify-between">
                        <a href="/home" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <x-icon-aw-codes class="h-14 w-auto" />
                        </a>
                        <button type="button" command="close" commandfor="mobile-menu" class="-m-2.5 rounded-md p-2.5 text-gray-700 dark:text-gray-400 dark:hover:text-white">
                            <span class="sr-only">Close menu</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10 dark:divide-white/10">
                            <div class="space-y-2 py-6">
                                <a href="/home" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50 dark:text-white dark:hover:bg-white/5">Home</a>
                                <a href="/about-us" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50 dark:text-white dark:hover:bg-white/5">About Us</a>
                                <a href="/contact" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50 dark:text-white dark:hover:bg-white/5">Contact</a>
                            </div>
                            <div class="py-6">
                                <a href="/admin/login" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50 dark:text-white dark:hover:bg-white/5">Log in</a>
                            </div>
                        </div>
                    </div>
                </el-dialog-panel>
            </div>
        </dialog>
    </el-dialog>
</header>
