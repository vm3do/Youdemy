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
    <?php include_once __DIR__ . "/../includes/adminbar.php"; ?>

    <!-- Main Content -->
    <div class="flex-1 lg:ml-64">
    <?php include_once __DIR__ . "/../includes/adminheader.php" ?>
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
                        <tbody class="bg-white">
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
        </main>
    </div>
</body>

</html>