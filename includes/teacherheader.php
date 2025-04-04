
<header class="w-full bg-white shadow-sm z-30 border-b">
        <div class="w-full flex items-center justify-between px-6 py-4">
            <a href="<?= BASE_URL ?>/homepage" class="text-2xl font-bold">
                <span class="text-purple-800">You</span>Demy
</a>
            <div class="flex items-center gap-4">
                <div class="hidden md:flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-purple-800/10 flex items-center justify-center">
                        <svg class="w-5 h-5 text-purple-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="hidden md:block">
                        <p class="font-medium text-gray-700"><?= $_SESSION['name'] ?? ""?></p>
                        <p class="text-sm text-gray-500">Teacher</p>
                    </div>
                </div>
                <div class="hidden md:block h-8 w-px bg-gray-200 mx-2"></div>
                <a href="<?= BASE_URL ?>/logout" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-red-600 
                    transition-colors rounded-lg hover:bg-red-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </header>