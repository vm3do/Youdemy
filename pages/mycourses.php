<?php
    require "../actions/auth.php";
    require "../Classes/Auth.php";

    Auth::checkRole("studet");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="fixed top-0 w-full bg-white z-50 px-10 py-4 shadow-sm">
        <div class="max-w-8xl mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold">
                <span class="text-purple-800">You</span>Demy
            </div>
            <nav class="flex items-center gap-8">
                <a href="index.html" class="text-gray-800 hover:text-purple-800">Home</a>
                <a href="courses.html" class="text-gray-800 hover:text-purple-800">Courses</a>
                <a href="#"
                    class="inline-flex items-center justify-center h-10 border border-purple-800 text-purple-800 hover:bg-purple-800 hover:text-white px-6 rounded-lg transition-colors">Log
                    In</a>
                <a href="#"
                    class="inline-flex items-center justify-center h-10 bg-purple-800 text-white px-6 rounded-lg hover:bg-purple-900 transition-colors">Sign
                    Up</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-24 pb-12">
        <!-- Page Header -->
        <div class="bg-gradient-to-br from-violet-50 to-white border-b">
            <div class="max-w-7xl mx-auto px-4 py-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">My Courses</h1>
                <p class="text-gray-600">Continue learning from where you left off</p>
            </div>
        </div>

        <!-- Courses Grid -->
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Course Card -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                    <a href="enrolledcourse.html" class="block">
                        <img src="https://placehold.co/600x400" alt="Course thumbnail" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="px-2.5 py-0.5 bg-purple-800/10 text-purple-800 text-sm font-medium rounded-full">
                                    Programming
                                </span>
                            </div>
                            <h3 class="font-bold text-lg mb-2 text-gray-900">Web Development Masterclass</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                Master the fundamentals of web development with hands-on projects and real-world
                                applications.
                            </p>
                            <div class="flex items-center gap-3 text-sm text-gray-500">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    20 hours
                                </div>
                                <span>•</span>
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    John Doe
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Course Card -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                    <a href="enrolledcourse.html" class="block">
                        <img src="https://placehold.co/600x400" alt="Course thumbnail" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="px-2.5 py-0.5 bg-blue-100 text-blue-700 text-sm font-medium rounded-full">
                                    Design
                                </span>
                            </div>
                            <h3 class="font-bold text-lg mb-2 text-gray-900">UI/UX Design Principles</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                Learn the fundamentals of user interface and user experience design with practical
                                examples.
                            </p>
                            <div class="flex items-center gap-3 text-sm text-gray-500">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    15 hours
                                </div>
                                <span>•</span>
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Jane Smith
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- No Courses -->
                <div class="col-span-full hidden">
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-purple-800/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-purple-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No courses yet</h3>
                        <p class="text-gray-600 mb-6">Start your learning journey by enrolling in a course</p>
                        <a href="courses.html"
                            class="inline-flex items-center justify-center h-10 bg-purple-800 text-white px-6 rounded-lg hover:bg-purple-900 transition-colors">
                            Browse Courses
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-12 px-8">
        <div class="max-w-7xl mx-auto">
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
                        <li class="text-gray-600">+1 (555) 123-4567</li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-200 mt-8 pt-8 text-center text-gray-600">
                <p>&copy; 2025 YouDemy. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>