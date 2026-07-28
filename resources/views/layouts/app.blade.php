<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIM Pegawai') SIM Pegawai</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 text-slate-800">
    <div class="min-h-screen lg:grid lg:grid-cols-[260px_1fr]">
        <aside class="bg-slate-950 px-5 py-6 text-white">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <span class="grid size-10 place-items-center rounded-xl bg-indigo-500 font-bold">
                    SP
                </span>
                <span>
                    <span class="block text-lg font-bold">SIM Pegawai</span>
                    <span class="block text-xs text-slate-400">Admin Panel</span>
                </span>
            </a>

            <nav class="mt-8 flex gap-2 overflow-x-auto lg:flex-col">
                <a href="{{ route('dashboard') }}" @class([
                    'rounded-lg px-4 py-3 text-sm font-medium transition',
                    'bg-indigo-500 text-white' => request()->routeIs('dashboard'),
                    'text-slate-300 hover:bg-slate-800 hover:text-white' => !request()->routeIs('dashboard'),
                ])>
                    Dashboard
                </a>
                <a href="{{ route('pegawai.index') }}" @class([
                    'rounded-lg px-4 py-3 text-sm font-medium transition',
                    'bg-indigo-500 text-white' => request()->routeIs('pegawai.*'),
                    'text-slate-300 hover:bg-slate-800 hover:text-white' => !request()->routeIs('pegawai.*'),
                ])>
                    Data Pegawai
                </a>
            </nav>
        </aside>

        <main class="min-w-0">
            <header class="border-b border-slate-200 bg-white px-5 py-4 shadow-sm sm:px-8">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-widest text-indigo-600">
                            Administrator
                        </p>
                        <h1 class="text-xl font-bold text-slate-900">
                            @yield('page-title', 'Dashboard')
                        </h1>
                    </div>

                    <div class="grid size-10 place-items-center rounded-full bg-indigo-100 font-bold text-indigo-700">
                        A
                    </div>
                </div>
            </header>

            <div class="p-5 sm:p-8">
                @yield('content')
            </div>
        </main>
    </div>

    @if (session('success'))
        <div data-toast
            class="fixed right-5 top-5 z-[60] flex max-w-sm items-start gap-3 rounded-xl bg-emerald-600 px-4 py-3 text-white shadow-xl"
            role="status">
            <div class="flex-1 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button" data-toast-close class="rounded p-1 leading-none hover:bg-white/20"
                aria-label="Tutup notifikasi">
                x
            </button>
        </div>

    @endif

    @stack('scripts')
</body>

</html>
