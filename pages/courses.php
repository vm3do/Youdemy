<?php
    require __DIR__ . "/../actions/auth.php";
    require __DIR__ . "/../Classes/Auth.php";
    require __DIR__ . "/../Classes/Course.php";

    Auth::redirect();

    $courses = Course::getCourses() ?? [];
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - YouDemy</title>
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
                <a href="index.php" class="text-gray-800 hover:text-purple-800">Home</a>
                <a href="courses.php" class="text-purple-800 font-medium">Courses</a>
                <?php if(isset($_SESSION["user_id"])): ?>
                    <a href="mycourses.php?"
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

    <!-- Main Content -->
    <main class="max-w-8xl mx-auto px-4 pt-24 pb-12">
        <!-- Search -->
        <div class="mb-8 flex flex-col md:flex-row gap-4 items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-800">Available Courses</h1>
            <div class="relative w-full md:w-96">
                <input type="search" placeholder="Search courses..."
                    class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-800/20 focus:border-purple-800">
                <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <!-- Courses Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Course Card -->
            <?php foreach($courses as $course): ?>

                <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                    <div class="relative">
                        <img src="<?= $course["background"] ?? "../assets/cover.jpeg"?>" alt="Course thumbnail" class="w-full h-48 object-cover">
                        <span class="absolute top-4 right-4 px-2 py-1 bg-purple-800 text-white text-xs font-medium rounded">
                            Free
                        </span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg mb-2 text-gray-800"><?= $course["title"]?></h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            <?= $course["description"]?>
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <span class="text-sm text-gray-600"><?= $course["name"] ?? "Empty"?></span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span class="text-sm font-medium text-gray-600">4.8</span>
                            </div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
                            <span class="text-purple-800 font-bold">$00.00</span>
                            <form action="coursedetails.php" method="POST">
                                <input type="hidden" name="course_id" value="<?= $course["id"]?>">
                                <button <?php if(!isset($_SESSION["user_id"])){echo "disabled";} ?>
                                    class="px-4 py-2 bg-purple-800/10 text-purple-800 font-medium rounded-lg 
                                    hover:bg-purple-800 hover:text-white transition-colors">
                                    View Course
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <?php if(empty($courses)): ?>
                    <div class="col-span-full">
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-purple-800/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-purple-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No courses yet</h3>
                        <p class="text-gray-600 mb-6">Be the teacher and start your teaching journey today !</p>
                    </div>
                </div>
        <?php endif ?>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center gap-2">
            <button
                class="w-10 h-10 rounded-lg border border-gray-200 flex items-center justify-center text-gray-600 hover:border-purple-800 hover:text-purple-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="w-10 h-10 rounded-lg bg-purple-800 text-white flex items-center justify-center">1</button>
            <button
                class="w-10 h-10 rounded-lg border border-gray-200 flex items-center justify-center text-gray-600 hover:border-purple-800 hover:text-purple-800 transition-colors">2</button>
            <button
                class="w-10 h-10 rounded-lg border border-gray-200 flex items-center justify-center text-gray-600 hover:border-purple-800 hover:text-purple-800 transition-colors">3</button>
            <button
                class="w-10 h-10 rounded-lg border border-gray-200 flex items-center justify-center text-gray-600 hover:border-purple-800 hover:text-purple-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </main>

    <!-- Footer -->
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
                        <li class="text-gray-600">+212777591881/li>
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