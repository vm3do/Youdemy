<?php
    require __DIR__ . "/../actions/auth.php";
    require __DIR__ . "/../Classes/Auth.php";

    Auth::checkLogin();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="fixed top-0 w-full bg-white z-50 px-10 py-4 shadow-sm">
        <div class="max-w-8xl mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold">
                <span class="text-purple-800">You</span>Demy
            </div>
            <nav>
                <ul class="flex items-center gap-6">
                    <li><a href="homepage" class="text-gray-600 hover:text-purple-800">Home</a></li>
                    <li><a href="courses" class="text-gray-600 hover:text-purple-800">Courses</a></li>
                    <li><a href="login"
                            class="inline-flex items-center justify-center h-10 border border-purple-800 text-purple-800 hover:bg-purple-800 hover:text-white px-6 rounded-lg transition-colors">Log
                            In</a></li>
                    <li><a href="register"
                            class="inline-flex items-center justify-center h-10 bg-purple-800 text-white px-6 rounded-lg hover:bg-purple-900 transition-colors">Sign
                            Up</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="min-h-screen flex">
        <!-- Purple -->
        <div class="hidden lg:flex lg:w-1/2 bg-purple-800 items-center justify-center relative overflow-hidden">
            <div class="relative z-10 px-12 text-center">
                <div class="w-24 h-24 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-8">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-white mb-4">Welcome to YouDemy</h2>
                <p class="text-white/80 text-lg">Join our community of learners and start your educational journey
                    today.</p>
            </div>
            <!-- circles -->
            <div class="absolute top-0 left-0 w-full h-full">
                <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-white/5 rounded-full"></div>
                <div class="absolute bottom-1/4 right-1/4 w-48 h-48 bg-white/5 rounded-full"></div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center px-8">
            <div class="w-full max-w-md">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Welcome Back!</h2>

                <div class="bg-white py-8 px-6 shadow-sm rounded-xl sm:px-10">
                    <form class="space-y-6" action="register" method="POST">
                        <div>
                            <p class="text-red-500"><?= $error ?></p>
                        </div>
                        <!-- Role -->
                        <div class="grid grid-cols-2 gap-4">
                            <!-- Student -->
                            <div>
                                <input type="radio" id="role-student" name="role" value="student" class="sr-only peer"
                                    checked>
                                <label for="role-student" class="flex flex-col items-center p-6 rounded-xl border-2 cursor-pointer
                                    text-gray-600 border-gray-200 hover:border-purple-800 hover:bg-purple-800/5
                                    peer-checked:border-purple-800 peer-checked:bg-purple-800/5 peer-checked:text-purple-800
                                    transition-colors">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-purple-800/10 flex items-center justify-center mb-3">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    </div>
                                    <span class="font-medium">Student</span>
                                </label>
                            </div>

                            <!-- Teacher -->
                            <div>
                                <input type="radio" id="role-teacher" name="role" value="teacher" class="sr-only peer">
                                <label for="role-teacher" class="flex flex-col items-center p-6 rounded-xl border-2 cursor-pointer
                                    text-gray-600 border-gray-200 hover:border-purple-800 hover:bg-purple-800/5
                                    peer-checked:border-purple-800 peer-checked:bg-purple-800/5 peer-checked:text-purple-800
                                    transition-colors">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-purple-800/10 flex items-center justify-center mb-3">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                                        </svg>
                                    </div>
                                    <span class="font-medium">Teacher</span>
                                </label>
                            </div>
                        </div>

                        <!-- Name -->
                        <div>
                            <label for="fullname" class="block text-sm font-medium text-gray-700">
                                Full Name
                            </label>
                            <div class="mt-1">
                                <input id="fullname" name="name" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                                    placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-800/20 focus:border-purple-800
                                    transition-colors" placeholder="Enter your full name">
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Email Address
                            </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                                    placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-800/20 focus:border-purple-800
                                    transition-colors" placeholder="Enter your email">
                            </div>
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Password
                            </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm 
                                    placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-800/20 focus:border-purple-800
                                    transition-colors" placeholder="Enter your password">
                            </div>
                        </div>

                        <!-- Submit -->
                        <div>
                            <button name="signup" type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm 
                                text-sm font-medium text-white bg-purple-800 hover:bg-purple-800/90 focus:outline-none focus:ring-2 
                                focus:ring-offset-2 focus:ring-purple-800/50 transition-colors">
                                Sign in
                            </button>
                        </div>
                    </form>

                    <!-- SU Message -->
                    <div class="mt-6 text-center text-sm text-gray-600">
                        Already have an account?
                        <a href="login" class="font-medium text-purple-800 hover:text-purple-800/80">
                            Log In
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>