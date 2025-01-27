<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <main class="min-h-screen flex items-center justify-center p-6">
        <div class="max-w-2xl w-full text-center">

            <div class="mb-8 inline-flex">
                <div class="w-24 h-24 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 md:p-12">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">403 - Forbidden</h1>
                <p class="text-gray-600 mb-8">
                    Sorry, you don't have permission to access this page. Please make sure you're logged in with the correct account.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="login.php" 
                        class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 border border-transparent 
                        text-base font-medium rounded-lg text-white bg-purple-800 hover:bg-purple-900 
                        transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Login
                    </a>
                    <a href="index.php" 
                        class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 border border-purple-800 
                        text-base font-medium rounded-lg text-purple-800 bg-transparent hover:bg-purple-50 
                        transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Go Home
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html> 