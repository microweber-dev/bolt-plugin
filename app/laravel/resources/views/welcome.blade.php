<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BoltStarter – Startup Module for AdminBolt</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center px-4">
    <div class="max-w-2xl w-full bg-white/90 dark:bg-[#18181b]/90 rounded-2xl shadow-xl p-8 flex flex-col items-center relative border border-gray-200 dark:border-gray-700 transition-colors">
        <!-- Logo / Icon -->
        <div class="mb-6">
            <span class="inline-block bg-gradient-to-r from-orange-500 to-pink-500 text-white rounded-full p-4 shadow-lg">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="48" height="48" rx="12" fill="url(#paint0_linear)"/>
                    <path d="M14 34L24 14L34 34H14Z" fill="white"/>
                    <defs>
                        <linearGradient id="paint0_linear" x1="0" y1="0" x2="48" y2="48" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#F59E42"/>
                            <stop offset="1" stop-color="#F43F5E"/>
                        </linearGradient>
                    </defs>
                </svg>
            </span>
        </div>
        <!-- Headline -->
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2 text-center">Welcome to <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-pink-500">BoltStarter</span></h1>
        <!-- Description -->
        <p class="text-lg text-gray-700 dark:text-gray-300 mb-6 text-center max-w-xl">
            <strong class="text-gray-900 dark:text-white">BoltStarter</strong> is the startup module for <span class="font-semibold text-gray-900 dark:text-white">AdminBolt</span>.<br>
            <span class="text-gray-700 dark:text-gray-300">Enjoy the freedom to create standalone module applications for the AdminBolt Linux control panel.<br>
            Empower your server management with modular, extensible, and modern tools.</span>
        </p>
        <!-- Features -->
        <div class="w-full mb-8">
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <li class="flex items-start gap-3">
                    <span class="text-orange-500 dark:text-orange-400 mt-1">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm3.707 6.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z"/></svg>
                    </span>
                    <span class="text-gray-800 dark:text-gray-200">Freedom to create standalone modules</span>
                </li>
                <li class="flex items-start gap-3">
                   <span class="text-orange-500 dark:text-orange-400 mt-1">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm3.707 6.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z"/></svg>
                    </span>
                    <span class="text-gray-800 dark:text-gray-200">Seamless integration with AdminBolt</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-orange-500 dark:text-orange-400 mt-1">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm3.707 6.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z"/></svg>
                    </span>
                    <span class="text-gray-800 dark:text-gray-200">Empowering Linux control panel customization</span>
                </li>
                <li class="flex items-start gap-3">
                   <span class="text-orange-500 dark:text-orange-400 mt-1">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm3.707 6.293a1 1 0 00-1.414 0L9 11.586 7.707 10.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4a1 1 0 000-1.414z"/></svg>
                    </span>
                    <span class="text-gray-800 dark:text-gray-200">Modern, extensible, and open source</span>
                </li>
            </ul>
        </div>
        <!-- Call to Action -->
        <div class="flex flex-col sm:flex-row gap-4 w-full justify-center">
            <a href="#" class="px-6 py-2 rounded-lg bg-gradient-to-r from-orange-500 to-pink-500 text-white font-semibold shadow hover:from-orange-600 hover:to-pink-600 transition border border-transparent dark:border-pink-400">Get Started</a>
            <a href="#" class="px-6 py-2 rounded-lg border border-orange-400 dark:border-orange-300 text-orange-600 dark:text-orange-200 font-semibold bg-white dark:bg-[#23232a] hover:bg-orange-50 dark:hover:bg-orange-950 transition">Documentation</a>
        </div>
    </div>
    <footer class="mt-8 text-gray-500 dark:text-gray-400 text-sm text-center">
        &copy; {{ date('Y') }} BoltStarter for AdminBolt. All rights reserved.
    </footer>
    <script>
        // Dark mode toggle logic
        const html = document.documentElement;
        const toggleBtn = document.getElementById('dark-toggle');
        const iconSpan = document.getElementById('dark-toggle-icon');
        const sunIcon = `<svg width=\"20\" height=\"20\" fill=\"currentColor\" viewBox=\"0 0 20 20\"><path d=\"M10 15a5 5 0 100-10 5 5 0 000 10zm0 2a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm0-14a1 1 0 011-1V1a1 1 0 10-2 0v1a1 1 0 011 1zm9 8a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zm-16 0a1 1 0 01-1 1H1a1 1 0 110-2h1a1 1 0 011 1zm12.071 6.071a1 1 0 010 1.415l-.707.707a1 1 0 11-1.415-1.415l.707-.707a1 1 0 011.415 0zm-10.142 0a1 1 0 010 1.415l-.707.707a1 1 0 11-1.415-1.415l.707-.707a1 1 0 011.415 0zm12.02-12.02a1 1 0 010 1.415l-.707.707a1 1 0 11-1.415-1.415l.707-.707a1 1 0 011.415 0zm-10.02 0a1 1 0 010 1.415l-.707.707A1 1 0 113.22 4.05l.707-.707a1 1 0 011.415 0z\"/></svg>`;
        const moonIcon = `<svg width=\"20\" height=\"20\" fill=\"currentColor\" viewBox=\"0 0 20 20\"><path d=\"M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z\"/></svg>`;

        function setIcon(isDark) {
            iconSpan.innerHTML = isDark ? sunIcon : moonIcon;
        }

        function setDarkMode(isDark) {
            if (isDark) {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
            setIcon(isDark);
        }

        // On load, set theme from localStorage or system preference
        (function() {
            const stored = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const isDark = stored === 'dark' || (!stored && prefersDark);
            setDarkMode(isDark);
        })();

        toggleBtn.addEventListener('click', () => {
            const isDark = !html.classList.contains('dark');
            setDarkMode(isDark);
        });
    </script>
</body>
</html>
