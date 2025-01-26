<?php
    require __DIR__ . "/../Classes/Auth.php";
    require_once __DIR__ . "/../Classes/Course.php";

    Auth::redirect();

    require_once __DIR__ . "/../actions/getCourse.php";
    require_once __DIR__ . "/../actions/studentFunc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details - YouDemy</title>
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
    <main class="pt-24 pb-12">
        <!-- Course Header -->
        <?php if(isset($_POST["course_id"])): ?>
            <div class="bg-gradient-to-br from-violet-50 to-white border-b">
                <div class="max-w-7xl mx-auto px-4 py-12">
                    <div class="flex flex-col lg:flex-row gap-12">
                        <!-- Course Info -->
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-4">
                                <span class="px-3 py-1 bg-purple-800/10 text-purple-800 text-sm font-medium rounded-full">
                                    <?= $course["category"] ?? "category"?>
                                </span>
                            </div>
                            <h1 class="text-3xl lg:text-4xl font-bold mb-4"><?= $course["title"] ?? "title"?></h1>
                            <p class="text-gray-600 text-lg mb-8">
                                <?= $course["description"] ?? "description"?>
                            </p>
            
                            <!-- Instructor Info -->
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-purple-800/10 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-purple-800" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900"><?= $course["name"] ?? "teacher"?></h3>
                                    <p class="text-gray-500 text-sm">Certified Teacher</p>
                                </div>
                            </div>
                        </div>
            
                        <!-- Enroll Panel -->
                        <div class="w-full lg:w-96">
                            <div class="bg-white rounded-xl shadow-lg border border-violet-100 p-6 sticky top-24">
                                <div class="flex items-center justify-between mb-6">
                                    <div>
                                        <span class="text-3xl font-bold text-gray-900">$00.00</span>
                                        <span class="text-lg text-gray-500 line-through ml-2">$99.99</span>
                                    </div>
                                    <span class="px-3 py-1 bg-green-100 text-green-600 text-sm font-medium rounded-full">
                                        100% OFF
                                    </span>
                                </div>
                                <form action="coursedetails.php" target="_blank" method="post">

                                    <input type="hidden" name="course_id" value="<?= $course["id"] ?? ""?>">
                                    <button type="submit" name="enroll" class="w-full bg-purple-800 text-white py-3 rounded-lg font-medium mb-6 
                                        hover:bg-purple-900 transition-colors">
                                        Enroll Now
                                    </button>
                                </form>
                                <div class="space-y-4">
            
                                    <div class="flex items-center gap-3 text-gray-600">
                                        <svg class="w-5 h-5 text-purple-800" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                                        </svg>
                                        Lifetime access
                                    </div>
                                    <div class="flex items-center gap-3 text-gray-600">
                                        <svg class="w-5 h-5 text-purple-800" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                        </svg>
                                        Certificate of completion
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <!-- Locked Content -->
        <div class="max-w-7xl mx-auto px-4 mt-12">
            <div class="bg-gradient-to-br from-purple-50 to-white rounded-xl border border-violet-100 p-8">
                <div class="flex flex-col items-center text-center max-w-2xl mx-auto">
                    <!-- Lock Icon -->
                    <div class="w-16 h-16 bg-purple-800/10 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-purple-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">
                        Course Content Locked
                    </h3>
                    <p class="text-gray-600">
                        Enroll now to unlock the course content. Start your learning journey today!
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-12 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

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
</body>

</html>