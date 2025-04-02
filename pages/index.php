<?php
    require __DIR__ . "/../actions/auth.php";
    require __DIR__ . "/../Classes/Auth.php";

    Auth::redirect();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Hero Section</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="overflow-x-hidden">

    <header class="fixed top-0 w-full bg-white z-50 px-4 sm:px-10 py-4 shadow-sm">
        <div class="max-w-8xl mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold">
                <span class="text-purple-800">You</span>Demy
            </div>
            
            <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="lg:hidden text-gray-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            
            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-8">
                <a href="index.php" class="text-purple-800 font-medium">Home</a>
                <a href="courses.php" class="text-gray-800 hover:text-purple-800">Courses</a>
                <?php if(isset($_SESSION["user_id"])): ?>
                    <a href="mycourses.php"
                        class="inline-flex items-center justify-center h-10 bg-purple-800 text-white px-6 rounded-lg hover:bg-purple-900 transition-colors">My Courses</a>

                    <a href="../actions/logout.php"
                        class="inline-flex items-center justify-center h-10 border border-red-800 text-red-800 hover:bg-red-800 hover:text-white px-6 rounded-lg transition-colors">Log
                        Out</a>
                <?php else: ?>
                    <a href="login.php"
                        class="inline-flex items-center justify-center h-10 border border-purple-800 text-purple-800 hover:bg-purple-800 hover:text-white px-6 rounded-lg transition-colors">Log
                        In</a>
                    <a href="signup.php"
                        class="inline-flex items-center justify-center h-10 bg-purple-800 text-white px-6 rounded-lg hover:bg-purple-900 transition-colors">Sign up</a>
                <?php endif ?>
            </nav>
        </div>
        
        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="lg:hidden hidden mt-4 pb-4">
            <nav class="flex flex-col space-y-4">
                <a href="index.php" class="text-purple-800 font-medium">Home</a>
                <a href="courses.php" class="text-gray-800 hover:text-purple-800">Courses</a>
                <?php if(isset($_SESSION["user_id"])): ?>
                    <a href="mycourses.php"
                        class="inline-flex items-center justify-center h-10 bg-purple-800 text-white px-6 rounded-lg hover:bg-purple-900 transition-colors">My Courses</a>

                    <a href="../actions/logout.php"
                        class="inline-flex items-center justify-center h-10 border border-red-800 text-red-800 hover:bg-red-800 hover:text-white px-6 rounded-lg transition-colors">Log
                        Out</a>
                <?php else: ?>
                    <a href="login.php"
                        class="inline-flex items-center justify-center h-10 border border-purple-800 text-purple-800 hover:bg-purple-800 hover:text-white px-6 rounded-lg transition-colors">Log
                        In</a>
                    <a href="signup.php"
                        class="inline-flex items-center justify-center h-10 bg-purple-800 text-white px-6 rounded-lg hover:bg-purple-900 transition-colors">Sign up</a>
                <?php endif ?>
            </nav>
        </div>
    </header>

    <main class="min-h-screen pt-24 px-8">
        <div
            class="max-w-8xl mx-auto flex flex-col lg:flex-row items-center justify-center min-h-[calc(100vh-6rem)] gap-16">
            <!-- Hero Content -->
            <div class="flex-1 text-center lg:text-left">
                <span class="inline-block px-4 py-2 rounded-lg bg-purple-800/10 text-purple-800 font-semibold text-sm">
                    100% TRUSTED PLATFORM
                </span>
                <h1 class="text-4xl lg:text-5xl font-bold mt-6 mb-4">Your Classroom Without Limits With <span
                        class="text-purple-800">You</span>Demy</span></h1>
                <p class="text-gray-600 mb-8">An interactive platform for students and teachers to connect, grow, and
                    succeed together.</p>
                <button class="bg-purple-800 text-white px-8 py-3 rounded-lg hover:bg-purple-900 transition-all">
                    Try it free
                </button>

                <div class="flex items-center justify-center lg:justify-start gap-4 mt-8">
                    <div class="flex -space-x-4">
                        <div class="w-10 h-10 rounded-full bg-purple-800/20 border-2 border-white"></div>
                        <div class="w-10 h-10 rounded-full bg-purple-800/40 border-2 border-white"></div>
                        <div class="w-10 h-10 rounded-full bg-purple-800/60 border-2 border-white"></div>
                        <div class="w-10 h-10 rounded-full bg-purple-800/80 border-2 border-white"></div>
                    </div>
                    <p class="text-gray-600">325k+ Active Students</p>
                </div>
            </div>

            <!-- Hero Image -->
            <div class="flex-1 relative">
                <img src="../assets/hero.webp" alt="Person using payment app" class="rounded-2xl w-full">
                <div class="absolute top-4 right-4 bg-white p-4 rounded-xl shadow-lg">
                    <p class="text-gray-600"></p>
                    <h4 class="text-2xl font-bold text-purple-800">Join Us</h4>
                    <small class="text-gray-500"> 100% Free</small>
                </div>
            </div>
        </div>
    </main>

    <!-- Advantages Section -->
    <section class="py-24 px-8 bg-gray-300">
        <div class="max-w-8xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 rounded-lg bg-purple-800/10 text-purple-800 font-semibold text-sm">
                    WHY CHOOSE YOUDEMY ?
                </span>
                <h2 class="text-3xl lg:text-4xl font-bold mt-6 mb-4">Empower Your Learning Journey</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Discover why thousands of students and educators choose
                    YouDemy as their preferred learning platform.</p>
            </div>

            <!-- Advantages Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Advantage 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-all">
                    <div class="w-12 h-12 bg-purple-800/10 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-800" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Expert-Led Courses</h3>
                    <p class="text-gray-600 mb-4">Learn from industry professionals and certified experts who bring
                        real-world experience to every lesson.</p>
                </div>

                <!-- Advantage 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-all">
                    <div class="w-12 h-12 bg-purple-800/10 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-800" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Learn at Your Pace</h3>
                    <p class="text-gray-600 mb-4">Access content 24/7 and study at your own rhythm with lifetime access
                        to all purchased courses.</p>
                </div>

                <!-- Advantage 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-all">
                    <div class="w-12 h-12 bg-purple-800/10 rounded-lg flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-800" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Active Community</h3>
                    <p class="text-gray-600 mb-4">Join a vibrant community of learners and educators who support and
                        inspire each other.</p>
                </div>
            </div>

            <!-- cta button -->
            <div class="mt-16 text-center">
                <a href="#"
                    class="inline-block bg-purple-800 text-white px-8 py-3 rounded-lg hover:bg-purple-900 transition-all">
                    Start Learning Today - It's Free!
                </a>
                <p class="text-gray-500 mt-4">Join 325,000+ students already learning on YouDemy</p>
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-gray-200 py-12 px-8">
        <div class="max-w-8xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Logo and Description -->
                <div class="col-span-1 md:col-span-2">
                    <div class="text-2xl font-bold mb-4">
                        <span class="text-purple-800">You</span>Demy
                    </div>
                    <p class="text-gray-600 max-w-md">
                        An interactive platform for students and teachers to connect, grow, and succeed together.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-semibold text-gray-800 mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-purple-800">Home</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-purple-800">Courses</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-purple-800">About Us</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-purple-800">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="font-semibold text-gray-800 mb-4">Contact</h3>
                    <ul class="space-y-2">
                        <li class="text-gray-600">support@youdemy.com</li>
                        <li class="text-gray-600">+212777591881</li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-200 mt-8 pt-8 text-center text-gray-600">
                <p>&copy; 2025 YouDemy. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>