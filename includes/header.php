<header class="fixed top-0 w-full bg-white z-50 px-4 sm:px-10 py-4 shadow-sm">
        <div class="max-w-8xl mx-auto flex justify-between items-center">
            <a href="<?= BASE_URL ?>/homepage" class="text-2xl font-bold">
                <span class="text-purple-800">You</span>Demy
</a>
            
            <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="lg:hidden text-gray-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            
            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-8">
                <a href="<?= BASE_URL ?>/homepage" class="text-gray-800 hover:text-purple-800">Home</a>
                <a href="<?= BASE_URL ?>/courses" class="text-gray-800 hover:text-purple-800">Courses</a>
                <?php if(isset($_SESSION["user_id"])): ?>
                    <a href="<?= BASE_URL ?>/mycourses"
                        class="inline-flex items-center justify-center h-10 bg-purple-800 text-white px-6 rounded-lg hover:bg-purple-900 transition-colors">My Courses</a>

                    <a href="<?= BASE_URL ?>/logout"
                        class="inline-flex items-center justify-center h-10 border border-red-800 text-red-800 hover:bg-red-800 hover:text-white px-6 rounded-lg transition-colors">Log
                        Out</a>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>/login"
                        class="inline-flex items-center justify-center h-10 border border-purple-800 text-purple-800 hover:bg-purple-800 hover:text-white px-6 rounded-lg transition-colors">Log
                        In</a>
                    <a href="<?= BASE_URL ?>/register"
                        class="inline-flex items-center justify-center h-10 bg-purple-800 text-white px-6 rounded-lg hover:bg-purple-900 transition-colors">Sign up</a>
                <?php endif ?>
            </nav>
        </div>
        
        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="lg:hidden hidden mt-4 pb-4">
            <nav class="flex flex-col space-y-4 text-center">
                <a href="<?= BASE_URL ?>/homepage" class="text-gray-800 hover:text-purple-800">Home</a>
                <a href="<?= BASE_URL ?>/courses" class="text-gray-800 hover:text-purple-800">Courses</a>
                <?php if(isset($_SESSION["user_id"])): ?>
                    <a href="<?= BASE_URL ?>/mycourses"
                        class="inline-flex items-center justify-center h-10 bg-purple-800 text-white px-6 rounded-lg hover:bg-purple-900 transition-colors">My Courses</a>

                    <a href="<?= BASE_URL ?>/logout"
                        class="inline-flex items-center justify-center h-10 border border-red-800 text-red-800 hover:bg-red-800 hover:text-white px-6 rounded-lg transition-colors">Log
                        Out</a>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>/login"
                        class="inline-flex items-center justify-center h-10 border border-purple-800 text-purple-800 hover:bg-purple-800 hover:text-white px-6 rounded-lg transition-colors">Log
                        In</a>
                    <a href="<?= BASE_URL ?>/signup"
                        class="inline-flex items-center justify-center h-10 bg-purple-800 text-white px-6 rounded-lg hover:bg-purple-900 transition-colors">Sign up</a>
                <?php endif ?>
            </nav>
        </div>
    </header>