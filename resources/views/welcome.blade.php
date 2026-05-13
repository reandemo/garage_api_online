<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | Data Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: radial-gradient(circle at top right, #1e293b, #0f172a, #000000);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
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

    <!-- Main Section -->
    <main class="flex-grow flex items-center justify-center px-6 py-12">
        <div class="glass-card max-w-4xl w-full rounded-3xl overflow-hidden shadow-2xl flex flex-col md:flex-row">
            
            <!-- Left Side: Hero Text -->
            <div class="p-10 md:w-1/2 flex flex-col justify-center border-b md:border-b-0 md:border-r border-white/10">
                <h2 class="text-blue-500 font-bold tracking-widest text-xs uppercase mb-2">Cloud Storage Initiative</h2>
                <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-6">
                    Keep your data <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">online for free.</span>
                </h1>
                <p class="text-slate-400 mb-8 leading-relaxed">
                    A secure and accessible platform built to help users manage their information globally without costs.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#" class="bg-blue-600 hover:bg-blue-500 text-white px-8 py-3 rounded-xl font-bold transition transform hover:-translate-y-1 shadow-lg shadow-blue-900/20">
                        Launch Project
                    </a>
                </div>
            </div>

            <!-- Right Side: Project Info -->
            <div class="p-10 md:w-1/2 bg-white/[0.02]">
                <h3 class="text-lg font-bold text-white mb-6 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-blue-500"></i> Project Manifest
                </h3>
                
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="mt-1 mr-4 text-blue-400"><i class="fas fa-code"></i></div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-300 uppercase">Created By</h4>
                            <p class="text-lg text-white font-mono">REAN-CODING</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="mt-1 mr-4 text-blue-400"><i class="fas fa-shield-alt"></i></div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-300 uppercase">License & Mission</h4>
                            <p class="text-slate-400 text-sm">Providing free data infrastructure for the developer community.</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="mt-1 mr-4 text-blue-400"><i class="fab fa-telegram-plane"></i></div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-300 uppercase">Support Channel</h4>
                            <a href="https://t.me/reandocumentary" class="text-blue-400 hover:text-blue-300 font-medium">@reandocumentary</a>
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
                            245
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
                            18
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
                            31
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
                        class="w-72 bg-black/20 border border-white/10 rounded-2xl py-3 pl-12 pr-5 text-white placeholder:text-slate-500 focus:outline-none focus:border-red-500 transition"
                    >

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

                        <!-- Row -->
                        <tr class="border-b border-white/5 hover:bg-white/[0.03] transition duration-300">

                            <td class="px-7 py-6 text-slate-300 font-medium">
                                01
                            </td>

                            <td class="px-7 py-6">

                                <div class="flex items-center">

                                    <div class="w-12 h-12 rounded-2xl bg-red-500/10 border border-red-400/20 flex items-center justify-center mr-4">
                                        <i class="fas fa-user text-red-400"></i>
                                    </div>

                                    <div>
                                        <h4 class="text-white font-bold">
                                            JOINCODER
                                        </h4>

                                        <p class="text-slate-500 text-sm">
                                            Premium Customer
                                        </p>
                                    </div>

                                </div>

                            </td>

                            <td class="px-7 py-6 text-slate-300">
                                +855 12 888 005
                            </td>

                            <td class="px-7 py-6 text-slate-400">
                                POS System Development & Hosting Service
                            </td>

                            <td class="px-7 py-6 text-slate-400">
                               {{ now()->format('d M Y') }}
                            </td>

                            <td class="px-7 py-6">

                                <div class="flex items-center justify-center gap-3">

                                    <button class="w-11 h-11 rounded-2xl bg-blue-500/10 border border-blue-400/10 hover:bg-blue-500/20 text-blue-400 transition">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                </div>

                            </td>

                        </tr>

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