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
    <?php include_once __DIR__ . "/../includes/header.php" ?>

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
                <h2 class="text-3xl font-bold text-white mb-4">Welcome Back to YouDemy</h2>
                <p class="text-white/80 text-lg">Continue your learning journey with our amazing courses.</p>
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
                    
                    <form class="space-y-6" action="login" method="POST">
                        <div>
                            <p class="text-red-500"><?= $error ?></p>
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
                            <button name="login" type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm 
                                text-sm font-medium text-white bg-purple-800 hover:bg-purple-800/90 focus:outline-none focus:ring-2 
                                focus:ring-offset-2 focus:ring-purple-800/50 transition-colors">
                                Sign in
                            </button>
                        </div>
                    </form>

                    <!-- Sign Up Message -->
                    <div class="mt-6 text-center text-sm text-gray-600">
                        Don't have an account?
                        <a href="register" class="font-medium text-purple-800 hover:text-purple-800/80">
                            Sign up for free
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="includes/script.js"></script>
</body>

</html>