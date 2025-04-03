<?php
require_once __DIR__ . "/../actions/auth.php";
require_once  __DIR__ . "/../Classes/Auth.php";
require_once __DIR__ . "/../Classes/Admin.php";

Auth::checkRole("admin");

require_once __DIR__ .  "/../actions/manageusers.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-40">
            <!-- Add toggle button that's attached to sidebar -->
            <button id="menuBtn" class="lg:hidden absolute -right-8 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-r-lg shadow-lg border-t border-r border-b">
                <svg id="menuIcon" class="w-4 h-4 text-gray-700 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="p-6 border-b">
                    <div class="text-2xl font-bold">
                        <span class="text-purple-800">You</span>Demy
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 overflow-y-auto p-4">
                    <div class="space-y-2">
                        <a href="admin.php"
                            class="flex items-center gap-3 px-4 py-2.5 text-gray-600 hover:bg-purple-800/10 hover:text-purple-800 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>
                        <a href="manageusers.php"
                            class="flex items-center gap-3 px-4 py-2.5 text-purple-800 bg-purple-800/10 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            User Management
                        </a>
                        <a href="manageteachers.php"
                            class="flex items-center gap-3 px-4 py-2.5 text-gray-600 hover:bg-purple-800/10 hover:text-purple-800 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Teachers Requests
                        </a>
                        <a href="managecourses.php"
                            class="flex items-center gap-3 px-4 py-2.5 text-gray-600 hover:bg-purple-800/10 hover:text-purple-800 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            Courses Management
                        </a>
                        <a href="admin.php"
                            class="flex items-center gap-3 px-4 py-2.5 text-gray-600 hover:bg-purple-800/10 hover:text-purple-800 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            Statistics
                        </a>
                    </div>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 lg:ml-64">
            <header class="w-full bg-white shadow-sm z-30 border-b">
                <div class="w-full flex items-center justify-between px-6 py-4">
                    <div class="text-2xl font-bold">
                        <span class="text-purple-800">You</span>Demy
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-purple-800/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="hidden md:block">
                                <p class="font-medium text-gray-700">Admin Panel</p>
                                <p class="text-sm text-gray-500">Administrator</p>
                            </div>
                        </div>
                        <div class="h-8 w-px bg-gray-200 mx-2"></div>
                        <a href="actions/logout.php" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-red-600 
                            transition-colors rounded-lg hover:bg-red-50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </a>
                    </div>
                </div>
            </header>
            <main class="p-6">
                <!-- Page Header -->
                <div class="bg-white rounded-xl shadow-sm mb-6"></div>
                <div class="p-6 border-b flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-bold">Manage Users</h2>
                        <p class="text-sm text-gray-500 mt-1">Monitor and manage user accounts</p>
                    </div>
                </div>
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left bg-purple-800 rounded-lg">
                                    <th class="p-4 text-white font-semibold rounded-tl-lg">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                            User Details
                                        </div>
                                    </th>
                                    <th class="p-4 text-white font-semibold">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            Role
                                        </div>
                                    </th>
                                    <th class="p-4 text-white font-semibold">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                                </path>
                                            </svg>
                                            Status
                                        </div>
                                    </th>
                                    <th class="p-4 text-white font-semibold rounded-tr-lg">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>

                                    <tr class="border-b hover:bg-gray-100 transition-colors">
                                        <td class="p-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-10 h-10 rounded-full bg-<?php echo $user["role"] == "teacher" ? "yellow" : "blue"; ?>-100 flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-<?php echo $user["role"] == "teacher" ? "yellow" : "blue"; ?>-600" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5"
                                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-semibold"><?= $user['name'] ?></p>
                                                    <p class="text-sm text-gray-500"><?= $user['email'] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <span
                                                class="px-2.5 py-1 bg-<?php echo $user["role"] == "teacher" ? "purple" : "blue"; ?>-100 
                                            text-<?php echo $user["role"] == "teacher" ? "purple" : "blue"; ?>-800 rounded-full text-sm font-medium">
                                                <?= ucfirst($user['role']) ?>
                                            </span>
                                        </td>
                                        <td class="p-4">
                                            <span
                                                class="px-2.5 py-1 bg-<?php echo $user["status"] == "active" ? "green" : "red"; ?>-100
                                            text-<?php echo $user["status"] == "active" ? "green" : "red"; ?>-800 rounded-full text-sm font-medium">
                                                <?= ucfirst($user['status']) ?>
                                            </span>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex gap-2">
                                                <form action="manageusers.php" method="post">
                                                    <input type="hidden" name="user_id" value="<?= $user["id"] ?>">
                                                    <button type="submit" name="<?php echo $user["status"] == "active" ? "ban" : "unban"; ?>"
                                                        class="w-24 px-3 py-1.5 bg-<?php echo $user["status"] == "active" ? "orange" : "green" ?>-500 hover:bg-<?php echo $user["status"] == "active" ? "green" : "orange"; ?>-600 text-white rounded-lg transition-colors flex items-center justify-center gap-1 text-sm">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                        </svg>
                                                        <?php echo $user["status"] == "active" ? "Ban" : "Unban"; ?>
                                                    </button>
                                                </form>

                                                <form action="manageusers.php" method="post">
                                                    <input type="hidden" name="user_id" value="<?= $user["id"] ?>">
                                                    <button type="submit" name="delete"
                                                        class="w-24 px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors flex items-center justify-center gap-1 text-sm">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>

    <script>
        const menuBtn = document.getElementById('menuBtn');
        const menuIcon = document.getElementById('menuIcon');
        const sidebar = document.getElementById('sidebar');

        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            menuIcon.style.transform = sidebar.classList.contains('-translate-x-full') 
                    ? 'rotate(0deg)' 
                    : 'rotate(180deg)';
        });

        
    </script>
</body>

</html>