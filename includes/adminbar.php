<!-- Sidebar -->
<aside id="sidebar"
    class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40">
    <!-- Add toggle button that's attached to sidebar -->
    <button id="menuBtn" class="lg:hidden absolute -right-8 top-1/4 transform -translate-y-1/2 bg-white p-2 rounded-r-lg shadow-lg ">
        <svg id="menuIcon" class="w-4 h-4 text-purple-800 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <div class="flex flex-col h-full">
        <!-- Logo -->
        <div class="p-6 border-b">
            <div class="text-2xl font-bold">
                <span class="text-purple-800">You</span>Demy
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto p-4">
            <div class="space-y-2">
                <a href="<?= BASE_URL ?>dashboard"
                    class="flex items-center gap-3 px-4 py-2.5 <?= basename($_SERVER['PHP_SELF']) === 'dashboard' ? 'text-purple-800 bg-purple-800/10' : 'text-gray-600 hover:bg-purple-800/10 hover:text-purple-800' ?> rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Dashboard
                </a>
                <a href="<?= BASE_URL ?>manage/users"
                    class="flex items-center gap-3 px-4 py-2.5 <?= basename($_SERVER['PHP_SELF']) === 'manage/users' ? 'text-purple-800 bg-purple-800/10' : 'text-gray-600 hover:bg-purple-800/10 hover:text-purple-800' ?> rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    User Management
                </a>
                <a href="<?= BASE_URL ?>manage/pending"
                    class="flex items-center gap-3 px-4 py-2.5 <?= basename($_SERVER['PHP_SELF']) === 'manage/pending' ? 'text-purple-800 bg-purple-800/10' : 'text-gray-600 hover:bg-purple-800/10 hover:text-purple-800' ?> rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Teachers Requests
                </a>
                <a href="<?= BASE_URL ?>manage/courses"
                    class="flex items-center gap-3 px-4 py-2.5 <?= basename($_SERVER['PHP_SELF']) === 'manage/courses' ? 'text-purple-800 bg-purple-800/10' : 'text-gray-600 hover:bg-purple-800/10 hover:text-purple-800' ?> rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Courses Management
                </a>
                <a href="<?= BASE_URL ?>dashboard?statistics"
                    class="flex items-center gap-3 px-4 py-2.5 text-gray-600 hover:bg-purple-800/10 hover:text-purple-800 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                        </path>
                    </svg>
                    Statistics
                </a>
            </div>
        </nav>
    </div>
</aside>

<script>
    const menuBtn = document.getElementById('menuBtn');
    const menuIcon = document.getElementById('menuIcon');
    const sidebar = document.getElementById('sidebar');

    menuBtn.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        menuIcon.style.transform = sidebar.classList.contains('-translate-x-full') 
                ? 'rotate(0deg)' 
                : 'rotate(180deg)';
    });

    document.addEventListener('click', (e) => {
        if (window.innerWidth < 1024) {
            if (!sidebar.contains(e.target) && !menuBtn.contains(e.target)) {
                sidebar.classList.add('-translate-x-full');
                menuIcon.style.transform = 'rotate(0deg)';
            }
        }
    });
</script> 