<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('logo/logo_rean_demo.ico') }}">
    <title>{{ config('app.name') }} | Data Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
    background:
        radial-gradient(circle at top right,
        rgba(239,68,68,.15),
        transparent 30%),

        radial-gradient(circle at bottom left,
        rgba(244,63,94,.12),
        transparent 30%),

        #09090b;
}
    </style>
</head>

<body class="text-slate-200 min-h-screen flex flex-col font-sans">

    <!-- Header / Navbar -->
    <header class="p-6 flex justify-between items-center max-w-6xl mx-auto w-full">
        <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center shadow-[0_0_15px_rgba(59,130,246,0.5)]">
                <i class="fas fa-terminal text-white text-sm"></i>
            </div>
            <span class="font-black text-xl tracking-tighter uppercase">REAN-<span class="text-blue-500">PRO</span></span>
        </div>
        <div class="hidden md:block">
            <a href="https://t.me/reandocumentary" class="text-sm bg-white/5 hover:bg-white/10 border border-white/10 px-4 py-2 rounded-full transition">
                <i class="fab fa-telegram mr-2 text-blue-400"></i>Join Community
            </a>
        </div>
    </header>

 

    <main class="flex-grow px-6 py-10">

<div
    class="relative max-w-7xl mx-auto overflow-hidden
    rounded-[40px]
    border border-red-500/10
    bg-gradient-to-br
    from-[#111111]
    via-[#171717]
    to-[#220d0d]
    shadow-[0_0_80px_rgba(239,68,68,0.10)]">

    <!-- Background Glow -->

    <div
        class="absolute -top-32 -right-32
        w-[450px] h-[450px]
        bg-red-500/15
        blur-[120px]
        rounded-full">
    </div>

    <div
        class="absolute -bottom-32 -left-32
        w-[450px] h-[450px]
        bg-rose-500/10
        blur-[120px]
        rounded-full">
    </div>

    <div class="relative z-10 grid lg:grid-cols-2 gap-12 p-10 lg:p-14">

        <!-- Left Side -->

        <div class="flex flex-col justify-center">

            <span
                class="w-fit px-4 py-2 rounded-full
                bg-red-500/10
                border border-red-500/20
                text-red-400
                text-xs font-bold tracking-widest">

                REAN-PRO API PORTAL

            </span>

            <h1
                class="mt-6 text-4xl md:text-6xl
                font-black text-white leading-tight">

                API Dashboard 

                <span
                    class="block mt-2
                    text-transparent
                    bg-clip-text
                    bg-gradient-to-r
                    from-red-500
                    via-rose-500
                    to-orange-400">

                    Branch Network

                </span>

            </h1>

            <p
                class="mt-6 text-slate-400
                text-lg leading-relaxed
                max-w-xl">

                Centralized cloud platform for branch registration,
                POS systems, garage management, hospitals,
                business applications and API integrations.

            </p>

            <div class="flex flex-wrap gap-4 mt-8">

                <a href="#branches"
                    class="px-7 py-3 rounded-xl
                    bg-gradient-to-r
                    from-red-500
                    via-rose-500
                    to-orange-400
                    text-white font-bold
                    hover:scale-105
                    transition">

                    View Branches

                </a>

                <a href="#"
                    class="px-7 py-3 rounded-xl
                    border border-white/10
                    hover:bg-white/5
                    text-white">

                    API Documentation

                </a>

            </div>

        </div>

        <!-- Right Side Dashboard -->

        <div>

            <div
                class="rounded-3xl
                bg-white/[0.03]
                border border-white/10
                backdrop-blur-xl
                p-8">

                <div class="flex items-center justify-between">

                    <h3 class="text-white font-bold text-xl">
                        System Overview
                    </h3>

                    <span
                        class="px-3 py-1 rounded-full
                        bg-emerald-500/10
                        text-emerald-400 text-xs">

                        ● ONLINE

                    </span>

                </div>

                <div class="grid grid-cols-2 gap-4 mt-8">

                    <div
                        class="rounded-2xl
                        bg-black/20
                        border border-white/5
                        p-5">

                        <p class="text-slate-500 text-sm">
                            Total Branches
                        </p>

                        <h4 class="text-3xl font-black text-white mt-2">
                            {{ number_format($totalBranches) }}
                        </h4>

                    </div>

                    <div
                        class="rounded-2xl
                        bg-black/20
                        border border-white/5
                        p-5">

                        <p class="text-slate-500 text-sm">
                            API Version
                        </p>

                        <h4 class="text-3xl font-black text-white mt-2">
                            v1.0
                        </h4>

                    </div>

                    <div
                        class="rounded-2xl
                        bg-black/20
                        border border-white/5
                        p-5">

                        <p class="text-slate-500 text-sm">
                            Framework
                        </p>

                        <h4 class="text-white font-black mt-2">
                            Laravel
                        </h4>

                    </div>

                    <div
                        class="rounded-2xl
                        bg-black/20
                        border border-white/5
                        p-5">

                        <p class="text-slate-500 text-sm">
                            Status
                        </p>

                        <h4 class="text-emerald-400 font-black mt-2">
                            ACTIVE
                        </h4>

                    </div>

                </div>

                <div
                    class="mt-6 rounded-2xl
                    border border-red-500/10
                    bg-red-500/5
                    p-5">

                    <div class="flex items-center">

                        <div
                            class="w-12 h-12 rounded-xl
                            bg-red-500/10
                            flex items-center justify-center">

                            <i class="fas fa-server text-red-400"></i>

                        </div>

                        <div class="ml-4">

                            <h4 class="text-white font-semibold">
                                REAN-PRO Cloud
                            </h4>

                            <p class="text-slate-500 text-sm">
                                Secure Laravel API Infrastructure
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

    </main>

    <main class="flex-grow px-6 py-10">


        <div class="max-w-7xl mx-auto">

            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10">

                <div>
                    <h1 class="text-5xl font-black text-white tracking-tight">
                        Client Portal
                    </h1>

                    <p class="text-slate-400 mt-3 text-lg">
                        Modern customer management dashboard with premium UI experience.
                    </p>
                </div>

            </div>

            <!-- Statistic Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

                <!-- Card -->
                <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 backdrop-blur-2xl p-7 shadow-2xl">

                    <div class="absolute top-0 right-0 w-40 h-40 bg-red-500/20 blur-3xl rounded-full"></div>

                    <div class="relative z-10 flex items-center justify-between">

                        <div>
                            <p class="text-slate-400 text-sm uppercase tracking-widest">
                                Total Clients
                            </p>

                            <h2 class="text-4xl font-black text-white mt-3">

                                {{ number_format($totalBranches) }}

                            </h2>
                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-red-500/20 flex items-center justify-center border border-red-400/20">
                            <i class="fas fa-users text-red-400 text-2xl"></i>
                        </div>

                    </div>
                </div>

                <!-- Card -->
                <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 backdrop-blur-2xl p-7 shadow-2xl">

                    <div class="absolute bottom-0 left-0 w-40 h-40 bg-pink-500/20 blur-3xl rounded-full"></div>

                    <div class="relative z-10 flex items-center justify-between">

                        <div>
                            <p class="text-slate-400 text-sm uppercase tracking-widest">
                                New Today
                            </p>

                            <h2 class="text-4xl font-black text-white mt-3">
                                {{ $totalBranches }}
                            </h2>
                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-pink-500/20 flex items-center justify-center border border-pink-400/20">
                            <i class="fas fa-user-plus text-pink-400 text-2xl"></i>
                        </div>

                    </div>
                </div>

                <!-- Card -->
                <div class="relative overflow-hidden rounded-3xl border border-white/10 bg-white/5 backdrop-blur-2xl p-7 shadow-2xl">

                    <div class="absolute top-0 left-0 w-40 h-40 bg-rose-500/20 blur-3xl rounded-full"></div>

                    <div class="relative z-10 flex items-center justify-between">

                        <div>
                            <p class="text-slate-400 text-sm uppercase tracking-widest">
                                Active Projects
                            </p>

                            <h2 class="text-4xl font-black text-white mt-3">
                                202
                            </h2>
                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-rose-500/20 flex items-center justify-center border border-rose-400/20">
                            <i class="fas fa-layer-group text-rose-400 text-2xl"></i>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Table Container -->
            <div class="relative overflow-hidden rounded-[32px] border border-white/10 bg-white/[0.04] backdrop-blur-3xl shadow-[0_0_60px_rgba(255,0,0,0.08)]">

                <!-- Blur Background -->
                <div class="absolute top-0 left-0 w-72 h-72 bg-red-600/10 blur-3xl rounded-full"></div>
                <div class="absolute bottom-0 right-0 w-72 h-72 bg-pink-500/10 blur-3xl rounded-full"></div>

                <!-- Header -->
                <div class="relative z-10 p-7 border-b border-white/10 flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                    <div>
                        <h2 class="text-2xl font-black text-white flex items-center">
                            <i class="fas fa-database mr-3 text-red-400"></i>
                            Customer Register Today
                        </h2>

                        <p class="text-slate-400 mt-2 text-sm">
                            All registered customer information and activity logs.
                        </p>
                    </div>

                    <!-- Search -->
                    <div class="relative">
                        <input
                            type="text"
                            placeholder="Search customer..."
                            class="w-72 bg-black/20 border border-white/10 rounded-2xl py-3 pl-12 pr-5 text-white placeholder:text-slate-500 focus:outline-none focus:border-red-500 transition">

                        <i class="fas fa-search absolute left-4 top-4 text-slate-500"></i>
                    </div>

                </div>

                <!-- Table -->
                <div class="relative z-10 overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-white/[0.03]">

                            <tr class="text-left border-b border-white/10">

                                <th class="px-7 py-5 text-slate-300 font-semibold">No</th>

                                <th class="px-7 py-5 text-slate-300 font-semibold">
                                    Customer Name
                                </th>

                                <th class="px-7 py-5 text-slate-300 font-semibold">
                                    Phone
                                </th>

                                <th class="px-7 py-5 text-slate-300 font-semibold">
                                    Description
                                </th>

                                <th class="px-7 py-5 text-slate-300 font-semibold">
                                    Date
                                </th>

                                <th class="px-7 py-5 text-center text-slate-300 font-semibold">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($branches as $index => $branch)

                            <tr class="border-b border-white/5 hover:bg-white/[0.03] transition duration-300">

                                <td class="px-7 py-6 text-slate-300 font-medium">
                                    {{ $index + 1 }}
                                </td>

                                <td class="px-7 py-6">
                                    <div class="flex items-center">

                                        <div class="w-12 h-12 rounded-2xl bg-blue-500/10 border border-blue-400/20 flex items-center justify-center mr-4">
                                            <i class="fas fa-building text-blue-400"></i>
                                        </div>

                                        <div>
                                            <h4 class="text-white font-bold">
                                                {{ $branch->branch_name }}
                                            </h4>

                                            <p class="text-slate-500 text-sm">
                                                {{ $branch->system_type }}
                                            </p>
                                        </div>

                                    </div>
                                </td>

                                <td class="px-7 py-6 text-slate-300">
                                    {{ $branch->phone }}
                                </td>

                                <td class="px-7 py-6 text-slate-400">
                                    {{ $branch->location }}
                                </td>

                                <td class="px-7 py-6 text-slate-400">
                                    {{ $branch->created_at->format('d M Y') }}
                                </td>

                                <td class="px-7 py-6">

                                    <div class="flex items-center justify-center">

                                        <button class="w-11 h-11 rounded-2xl bg-blue-500/10 border border-blue-400/10 hover:bg-blue-500/20 text-blue-400 transition">
                                            <i class="fas fa-eye"></i>
                                        </button>

                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="6" class="text-center py-10 text-slate-500">
                                    No branch found.
                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </main>


    <!-- Footer -->
    <footer class="p-8 border-t border-white/5 text-center">
        <p class="text-slate-500 text-sm">
            &copy; {{ date('Y') }} <span class="text-slate-300 font-semibold">REAN PROGRAMMING</span>. All rights reserved.
        </p>
        <div class="mt-4 flex justify-center space-x-6">
            <a href="https://github.com/reanprogramming" class="text-slate-500 hover:text-white transition"><i class="fab fa-github"></i></a>
            <a href="https://youtube.com/@reanprogramming" class="text-slate-500 hover:text-white transition"><i class="fab fa-youtube"></i></a>
            <a href="https://youtube.com/@joincoder" class="text-slate-500 hover:text-white transition"><i class="fab fa-youtube"></i></a>
            <a href="https://facebook.com/reanprogramming" class="text-slate-500 hover:text-white transition"><i class="fab fa-facebook"></i></a>
        </div>
    </footer>

</body>

</html>