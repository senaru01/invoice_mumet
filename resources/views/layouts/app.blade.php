<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Invoice System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation Light Theme -->
        <nav class="bg-white border-b border-gray-300 shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}" class="text-xl font-bold text-emerald-600 hover:text-emerald-700 transition">
                                Invoice System
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            @if(auth()->user()->role === 'supplier')
                                <a href="{{ route('tickets.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('tickets.*') ? 'border-emerald-600 text-gray-900' : 'border-transparent text-gray-600 hover:text-gray-800 hover:border-gray-400' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                    Tiket Saya
                                </a>
                            @elseif(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.dashboard') ? 'border-emerald-600 text-gray-900' : 'border-transparent text-gray-600 hover:text-gray-800 hover:border-gray-400' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                    Dashboard
                                </a>
                            @elseif(auth()->user()->role === 'reception')
                                <a href="{{ route('reception.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('reception.*') ? 'border-emerald-600 text-gray-900' : 'border-transparent text-gray-600 hover:text-gray-800 hover:border-gray-400' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                    Reception
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <div class="ml-3 relative">
                            <div x-data="{ open: false }" @click.away="open = false" class="relative">
                                <button @click="open = !open" class="flex items-center text-sm font-medium text-gray-700 hover:text-emerald-600 focus:outline-none transition duration-150 ease-in-out">
                                    <div>Supplier {{ Auth::user()->company->name ?? Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>

                                <div x-show="open"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="transform opacity-0 scale-95"
                                     x-transition:enter-end="transform opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="transform opacity-100 scale-100"
                                     x-transition:leave-end="transform opacity-0 scale-95"
                                     class="absolute right-0 mt-2 w-48 rounded-md shadow-lg origin-top-right"
                                     style="display: none;">
                                    <div class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white border border-gray-200">
                                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-emerald-600 transition duration-150 ease-in-out">
                                            Profile
                                        </a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-emerald-600 transition duration-150 ease-in-out">
                                                Log Out
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hamburger (Mobile) -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu (Mobile) -->
            <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden" x-data="{ open: false }">
                <div class="pt-2 pb-3 space-y-1">
                    @if(auth()->user()->role === 'supplier')
                        <a href="{{ route('tickets.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('tickets.*') ? 'border-emerald-600 text-emerald-700 bg-emerald-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-100 hover:border-gray-400' }} text-base font-medium transition duration-150 ease-in-out">
                            Tiket Saya
                        </a>
                    @elseif(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('admin.dashboard') ? 'border-emerald-600 text-emerald-700 bg-emerald-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-100 hover:border-gray-400' }} text-base font-medium transition duration-150 ease-in-out">
                            Dashboard
                        </a>
                    @elseif(auth()->user()->role === 'reception')
                        <a href="{{ route('reception.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('reception.*') ? 'border-emerald-600 text-emerald-700 bg-emerald-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-100 hover:border-gray-400' }} text-base font-medium transition duration-150 ease-in-out">
                            Reception
                        </a>
                    @endif
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-300">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-600">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <a href="{{ route('profile.edit') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 hover:border-gray-400 transition duration-150 ease-in-out">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 hover:border-gray-400 transition duration-150 ease-in-out">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow border-b border-gray-200">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset>

        <!-- Page Content -->
        <main class="py-6">
            @if(session('success'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-4">
                    <div class="bg-emerald-100 border border-emerald-400 text-emerald-800 px-4 py-3 rounded relative shadow-md">
                        <strong class="font-bold">✓ </strong>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-4">
                    <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded relative shadow-md">
                        <strong class="font-bold">✗ </strong>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>

    @stack('scripts')
</body>
</html>