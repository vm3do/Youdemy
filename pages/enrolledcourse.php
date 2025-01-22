<?php

    require "../actions/auth.php";
    require "../Classes/Auth.php";
    
    Auth::checkRole("student");
    
    require "../actions/studentFunc.php";
    require "../actions/getCourse.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Development Masterclass - YouDemy</title>
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
        <div class="bg-gradient-to-br from-violet-50 to-white border-b">
            <div class="max-w-7xl mx-auto px-4 py-8">
                <div class="flex items-center gap-2 mb-4">
                    <span class="px-3 py-1 bg-purple-800/10 text-purple-800 text-sm font-medium rounded-full">
                        Category
                    </span>
                </div>
                <h1 class="text-3xl lg:text-4xl font-bold mb-4"><?= $course["title"] ?? "" ?></h1>
                <p class="text-gray-600 text-lg mb-8 max-w-3xl">
                <?= $course["description"] ?? "description" ?>
                </p>

                <!-- Instructor Info -->
                <div class="flex items-center gap-4 pb-6">
                    <div class="w-12 h-12 rounded-full bg-purple-800/10 flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-900">Teacher</h3>
                        <p class="text-gray-500 text-sm">Certified Teacher</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Course Content Section -->
        <div class="max-w-7xl mx-auto px-4 py-8">
            <!-- Video Template -->
            <?php if($course["content_type"] == "video"): ?>
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="aspect-w-16 aspect-h-9 bg-gray-800">
                        <video class="w-full h-full object-cover" controls>
                            <source src="../Classes/<?php echo explode("Classes/", $course["content"])[1] ?? "" ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-4"><?= $course["title"] ?? "" ?></h2>
                        <p class="text-gray-600">
                            <?= $course["description"] ?? "" ?>
                        </p>
                        <div class="mt-4 flex items-center gap-4">
                            <span class="text-sm text-gray-500">Duration: 15:30</span>
                        </div>
                    </div>
                </div>
            <?php endif ?>

            <?php if($course["content_type"] == "text"): ?>
            <!-- Text Template -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6"><?= $course["title"] ?? "" ?></h2>
                    <div class="prose max-w-none">
                        <p class="text-gray-600 text-lg leading-relaxed mb-6">
                            <?= $course["description"] ?>
                        </p>
                        <p class="text-gray-600 text-lg leading-relaxed mb-6">
                            <?= $course["content"] ?? "" ?>
                        </p>
                    </div>
                </div>
            </div>

            <?php endif ?>
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