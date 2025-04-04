<?php
require_once __DIR__ . "/../actions/auth.php";
require_once __DIR__ . "/../Classes/Auth.php";

Auth::checkRole("admin");

require_once __DIR__ . "/../actions/manageteachers.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Teachers - YouDemy Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <?php include_once __DIR__ . "/../includes/adminbar.php"; ?>

        <!-- Main Content Area -->
        <div class="flex-1 lg:ml-64">
            <!-- Header -->
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
                        <a href="../actions/logout.php" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-red-600 
                            transition-colors rounded-lg hover:bg-red-50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="p-6">
                <!-- Page Header -->
                <div class="bg-white rounded-xl shadow-sm mb-6">
                    <div class="p-6 border-b flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold">Pending Teacher Validations</h2>
                            <p class="text-sm text-gray-500 mt-1">Review and approve teacher applications</p>
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
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                </svg>
                                                Teacher Details
                                            </div>
                                        </th>
                                        <th class="p-4 text-white font-semibold">
                                            <div class="flex items-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                Date
                                            </div>
                                        </th>
                                        <th class="p-4 text-white font-semibold">
                                            <div class="flex items-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                                </svg>
                                                Status
                                            </div>
                                        </th>
                                        <th class="p-4 text-white font-semibold rounded-tr-lg">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($teachers as $teacher): ?>

                                        <tr class="border-b hover:bg-gray-100 transition-colors">
                                            <td class="p-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-yellow-600" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold"><?= $teacher['name'] ?></p>
                                                        <p class="text-sm text-gray-500"><?= $teacher['email'] ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-4">
                                                <div class="flex items-center gap-2">
                                                    <p class="font-medium"><?= explode(" ", $teacher['created_at'])[0] ?></p>
                                                    <p class="text-sm text-gray-500"><?= explode(" ", $teacher['created_at'])[1] ?></p>
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="p-4">
                                                <span
                                                    class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">
                                                    Pending
                                                </span>
                                            </td>
                                            <td class="p-4">
                                                <div class="flex gap-2">
                                                    <form action="manageteachers.php" method="post">
                                                        <input type="hidden" name="teacher_id" value="<?= $teacher['id'] ?>">
                                                        <button type="submit" name="activate" id="activate"
                                                            class="px-4 py-2 bg-purple-800 hover:bg-purple-900 text-white rounded-lg transition-colors flex items-center gap-1">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M5 13l4 4L19 7" />
                                                            </svg>
                                                            Approve
                                                        </button>
                                                    </form>

                                                    <form action="manageteachers.php" method="post">
                                                        <input type="hidden" name="teacher_id" value="<?= $teacher['id'] ?>">
                                                        <button type="submit" name="reject" id="reject"
                                                            class="px-4 py-2 bg-white border border-red-500 text-red-500 hover:bg-red-50 rounded-lg transition-colors flex items-center gap-1">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                            Reject
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    <script>
        const menuBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');

        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        document.addEventListener('click', (e) => {
            if (window.innerWidth < 1024) {
                if (!sidebar.contains(e.target) && !menuBtn.contains(e.target)) {
                    sidebar.classList.add('-translate-x-full');
                }
            }
        });
    </script>
</body>

</html>