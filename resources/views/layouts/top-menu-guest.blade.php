<header x-data="{ open: false }" class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-2">
                <span class="sr-only">Time system</span>
                <img class="w-auto h-12 rounded-full" src="{{ asset('images/time.gif') }}" alt="clock-spinning">
            </a>
        </div>
        <div class="flex lg:hidden">
            <button @click="open = !open" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="#" class="font-semibold text-gray-900 text-sm/6">Home</a>
            <a href="#" class="font-semibold text-gray-900 text-sm/6">Product</a>
            <a href="#" class="font-semibold text-gray-900 text-sm/6">Features</a>
            <a href="#" class="font-semibold text-gray-900 text-sm/6">Company</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-900 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-900 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-900 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <!-- Mobile menu -->
    <div x-show="open" class="lg:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-50" @click="open = false"></div>
        <div class="fixed inset-y-0 right-0 z-50 w-full px-6 py-6 overflow-y-auto bg-white sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Time system</span>
                    <img class="w-auto h-10 rounded-full" src="{{ asset('images/time.gif') }}" alt="clock-spinning">
                </a>
                <button @click="open = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flow-root mt-6">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="py-6 space-y-2">
                        <a href="#" class="block px-3 py-2 -mx-3 font-semibold text-gray-900 rounded-lg text-base/7 hover:bg-gray-50">Home</a>
                        <a href="#" class="block px-3 py-2 -mx-3 font-semibold text-gray-900 rounded-lg text-base/7 hover:bg-gray-50">Product</a>
                        <a href="#" class="block px-3 py-2 -mx-3 font-semibold text-gray-900 rounded-lg text-base/7 hover:bg-gray-50">Features</a>
                        <a href="#" class="block px-3 py-2 -mx-3 font-semibold text-gray-900 rounded-lg text-base/7 hover:bg-gray-50">Company</a>
                    </div>
                    <div class="py-6 space-y-2">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="block px-3 py-2 -mx-3 font-semibold text-gray-900 rounded-lg text-base/7 hover:bg-gray-50">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="block px-3 py-2 -mx-3 font-semibold text-gray-900 rounded-lg text-base/7 hover:bg-gray-50">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="block px-3 py-2 -mx-3 font-semibold text-gray-900 rounded-lg text-base/7 hover:bg-gray-50">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
