<?php
    require __DIR__ . "/../actions/auth.php";
    require __DIR__ . "/../Classes/Auth.php";

    Auth::checkRole("admin");

    require __DIR__ . "/../actions/adminFunc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouDemy Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
<?php include_once __DIR__ . "/../includes/adminbar.php"; ?>
    <!-- Top Navigation -->
    <div class="flex-1 lg:ml-64">
            <?php include_once __DIR__ . "/../includes/adminheader.php" ?>
        <!-- Main Content -->
        

            <main class="p-6">
                <!-- Stats Overview -->
                <div id="statistics"class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Total Courses Card -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-violet-100">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700">Total Courses</h3>
                                    <p class="text-sm text-gray-500">Available on platform</p>
                                </div>
                                <span class="bg-violet-100 p-3 rounded-xl">
                                    <svg class="w-7 h-7 text-violet-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </span>
                            </div>
                            <div class="flex items-center">
                                <h2 class="text-4xl font-bold text-violet-600"><?= $totalcourses["total"] ?> Courses</h2>
                            </div>
                            <div class="mt-6 bg-violet-50 rounded-xl p-4">
                                <div class="flex items-center gap-2 text-violet-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-sm font-medium">Free courses for everyone</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Top Course Card -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-violet-100">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-700">Top Course</h3>
                                    <p class="text-sm text-gray-500">Most enrolled course</p>
                                </div>
                                <span class="bg-violet-100 p-3 rounded-xl">
                                    <svg class="w-7 h-7 text-violet-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                </span>
                            </div>
                            <div class="flex gap-4">
                                <div
                                    class="w-24 h-24 rounded-xl overflow-hidden grid grid-cols-2 grid-rows-2 gap-0.5 bg-violet-100">
                                    <div class="bg-violet-200"></div>
                                    <div class="bg-violet-300"></div>
                                    <div class="bg-violet-400"></div>
                                    <div class="bg-violet-500"></div>
                                </div>

                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800 mb-2"><?= $topcourse["title"] ?? "" ?></h4>
                                    <p class="text-sm text-gray-500 mb-4">By <?= $topcourse["name"] ?? "" ?></p>
                                    <div class="flex items-center gap-6">
                                        <div class="flex items-center gap-2">
                                            <span class="bg-violet-100 p-2 rounded-lg">
                                                <svg class="w-4 h-4 text-violet-600" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                </svg>
                                            </span>
                                            <span class="font-medium text-gray-700">4.9</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="bg-violet-100 p-2 rounded-lg">
                                                <svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="font-medium text-gray-700"><?= $topcourse["enrolls"] ?? "" ?></span>
                                                <span class="text-sm text-gray-500 ml-1">students</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Teacher Validation -->
                <div class="bg-white rounded-xl shadow-sm mb-6">
                    <div class="p-6 border-b flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold">Pending Teacher Validations</h2>
                            <p class="text-sm text-gray-500 mt-1">Review and approve teacher applications</p>
                        </div>
                        <a href="<?= BASE_URL ?>/manage/teachers" class="text-purple-800 hover:text-purple-900 flex items-center gap-2">
                            View All
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-center bg-purple-800 rounded-lg">
                                        <th class="p-4 text-white font-semibold rounded-tl-lg">
                                            <div class="flex items-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                Teacher Details
                                            </div>
                                        </th>
                                        <th class="p-4 text-white font-semibold">
                                            <div class="flex items-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Date
                                            </div>
                                        </th>
                                        <th class="p-4 text-white font-semibold">
                                            <div class="flex items-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                </svg>
                                                Status
                                            </div>
                                        </th>
                                        <th class="p-4 text-white font-semibold rounded-tr-lg">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($teachers as $teacher):?>

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
                                                    <p class="font-semibold"><?= $teacher['name']?></p>
                                                    <p class="text-sm text-gray-500"><?= $teacher['email']?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex items-center gap-2">
                                                <p class="font-medium"><?= explode(" ", $teacher['created_at'])[0]?></p>
                                                <p class="text-sm text-gray-500"><?= explode(" ", $teacher['created_at'])[1]?></p></p>
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
                                                <form action="<?= BASE_URL ?>/dashboard" method="post">
                                                    <input type="hidden" name="teacher_id" value="<?= $teacher['id']?>">
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

                                                <form action="<?= BASE_URL ?>/dashboard" method="post">
                                                    <input type="hidden" name="teacher_id" value="<?= $teacher['id']?>">
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

                <!-- Users Management -->
                <div class="bg-white rounded-xl shadow-sm mb-6">
                    <div class="p-6 border-b flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold">Manage Users</h2>
                            <p class="text-sm text-gray-500 mt-1">Monitor and manage user accounts</p>
                        </div>
                        <a href="<?= BASE_URL ?>/manage/users" class="text-purple-800 hover:text-purple-900 flex items-center gap-2">
                            View All
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-center bg-purple-800 rounded-lg">
                                        <th class="text-center p-4 text-white font-semibold rounded-tl-lg">
                                            <div class="flex justify-center items-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                User Details
                                            </div>
                                        </th>
                                        <th class="p-4 text-white font-semibold">
                                            <div class="flex justify-center items-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Role
                                            </div>
                                        </th>
                                        <th class="p-4 text-white font-semibold">
                                            <div class="flex justify-center items-center gap-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                </svg>
                                                Status
                                            </div>
                                        </th>
                                        <th class="p-4 text-white font-semibold rounded-tr-lg">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $user):?>

                                        <tr class="text-center border-b hover:bg-gray-100 transition-colors">
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
                                                    <p class="font-semibold"><?= $user['name']?></p>
                                                    <p class="text-sm text-gray-500"><?= $user['email']?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <span
                                                class="px-2.5 py-1 bg-<?php echo $user["role"] == "teacher" ? "purple" : "blue"; ?>-100 
                                                    text-<?php echo $user["role"] == "teacher" ? "purple" : "blue"; ?>-800 rounded-full text-sm font-medium">
                                                <?= ucfirst($user['role'])?>
                                            </span>
                                        </td>
                                        <td class="p-4">
                                            <span
                                                class="px-2.5 py-1 bg-<?php echo $user["status"] == "active" ? "green" : "red"; ?>-100
                                                    text-<?php echo $user["status"] == "active" ? "green" : "red"; ?>-800 rounded-full text-sm font-medium">
                                                <?= ucfirst($user['status'])?>
                                            </span>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex justify-center gap-2">
                                                <form action="<?= BASE_URL ?>/dashboard" method="post">
                                                    <input type="hidden" name="user_id" value="<?= $user["id"]?>">
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

                                                <form action="<?= BASE_URL ?>/dashboard" method="post">
                                                    <input type="hidden" name="user_id" value="<?= $user["id"]?>">
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

                <!-- Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Recent Courses -->
                    <div class="bg-white rounded-xl shadow-sm">
                        <div class="p-6 border-b flex justify-between items-center">
                            <h2 class="text-xl font-bold">Recent Courses</h2>
                            <a href="<?= BASE_URL ?>/manage/courses" class="text-purple-800 hover:text-purple-900">View More</a>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <?php foreach($courses as $course): ?>
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 bg-purple-800/10 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-purple-800" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-semibold"><?= $course['title'] ?? "" ?></p>
                                            <p class="text-sm text-gray-500"><?= $course['name']?></p>
                                        </div>
                                        <span class="text-purple-800 font-semibold">$00.00</span>
                                    </div>
                                <?php endforeach?>

                            </div>
                        </div>
                    </div>

                    <!-- Top Teachers -->
                    <div class="bg-white rounded-xl shadow-sm">
                        <div class="p-6 border-b">
                            <h2 class="text-xl font-bold">Top Teachers</h2>
                        </div>
                        <div class="p-6">
                            <div class="space-y-6">
                                <?php $i = 1 ?>
                                <?php foreach($topteachers as $topteacher): ?>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold"><?= $topteacher["name"]?></p>
                                            <p class="text-sm text-gray-500">(<?= $topteacher["total_students"] ?> students)</p>
                                        </div>
                                    </div>
                                    <span class="text-purple-800 font-semibold">#<?= $i ?></span>
                                    <?php $i++ ?>
                                </div>

                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tags Management -->
                <div class="bg-white rounded-xl shadow-sm mt-6">
                    <div class="p-6 border-b border-purple-800/20">
                        <div class="flex justify-between items-center">
                            <div>
                                <h2 class="text-xl font-bold text-purple-800">Tags Management</h2>
                                <p class="text-sm text-gray-500 mt-1">Manage and organize course tags</p>
                            </div>
                            <span class="bg-purple-800/10 text-purple-800 px-3 py-1 rounded-full text-sm font-medium"><?= $tags[0]["total_tags"] ?? "0" ?>
                                Tags</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <!-- Add Tags Form -->
                        <form action="<?= BASE_URL ?>/dashboard" method="POST" class="mb-6">
                            <label for="bulkTags" class="block text-sm font-medium text-gray-700 mb-2">Add Multiple
                                Tags</label>
                                <div>
                                    <p class="text-sm text-red-500">
                                        <?php if(isset($return) && !$return["verify"]){ echo $tag_msg; } ?>
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-green-500">
                                    <?php if(isset($return) && $return["verify"]){ echo $tag_msg; } ?>
                                    </p>
                                </div>
                            <div class="relative">
                                <input type="text" id="bulkTags" name="tags"
                                    class="w-full rounded-lg border-gray-300 focus:border-purple-800 focus:ring-purple-800 outline-violet-600 pl-12 pr-4 py-3"
                                    placeholder="Seperated by commas (Js, Css, .. )">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </div>
                                <button name="add_tags" type="submit"
                                    class="absolute inset-y-0 right-0 flex items-center px-4 text-purple-800 hover:text-purple-900">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Tags will be automatically converted to lowercase and
                                trimmed</p>
                        </form>

                        <!-- Tags -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Existing Tags</h3>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach($tags as $tag): ?>
                                
                                    <span
                                    class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-purple-800/10 text-purple-800 group hover:bg-purple-800/20 transition-colors">
                                    <?= $tag['name']?>
                                    <form action="<?= BASE_URL ?>/dashboard" method="POST" class="inline-block">
                                        <input type="hidden" name="tag_id" value="<?= $tag['id']?>">
                                        <button name="del_tag" type="submit" class="ml-2 opacity-75 flex items-center hover:opacity-100 transition-opacity">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </span>
                                
                                <?php endforeach?>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories Management -->
                <div class="bg-white rounded-xl shadow-sm mt-6">
                    <div class="p-6 border-b border-purple-800/20">
                        <div class="flex justify-between items-center">
                            <div>
                                <h2 class="text-xl font-bold text-purple-800">Categories Management</h2>
                                <p class="text-sm text-gray-500 mt-1">Manage course categories</p>
                            </div>
                            <span class="bg-purple-800/10 text-purple-800 px-3 py-1 rounded-full text-sm font-medium"><?= $categories[0]["total_cats"] ?? "0" ?>
                                Categories</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <!-- Add Category Form -->
                        <form action="<?= BASE_URL ?>/dashboard" method="POST" class="mb-6">
                            <label for="newCategory" class="block text-sm font-medium text-gray-700 mb-2">Add New
                                Category</label>
                                <div>
                                    <p class="text-sm text-red-500">
                                        <?php if(isset($return1) && !$return1["verify"]){ echo $cat_msg; } ?>
                                    </p>
                                </div>
                                <div>
                                    <p class="text-sm text-green-500">
                                    <?php if(isset($return1) && $return1["verify"]){ echo $cat_msg; } ?>
                                    </p>
                                </div>
                            <div class="relative">
                                <input type="text" id="newCategory" name="categories"
                                    class="w-full rounded-lg border-gray-300 focus:border-purple-800 focus:ring-purple-800 outline-violet-600 pl-12 pr-4 py-3"
                                    placeholder="(e.g., Web Development)">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                                <button name="add_cat" type="submit"
                                    class="absolute inset-y-0 right-0 flex items-center px-4 text-purple-800 hover:text-purple-900">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Category names should be clear and descriptive</p>
                        </form>

                        <!-- Categories -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Existing Categories</h3>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach($categories as $category): ?>
                                    <span
                                        class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-purple-800/10 text-purple-800 group hover:bg-purple-800/20 transition-colors">
                                        <?= $category["name"] ?>
                                        <form action="<?= BASE_URL ?>/dashboard" method="POST" class="inline-block">
                                            <input type="hidden" name="cat_id" value="<?= $category["id"] ?>">
                                            <button type="submit" name="del_cat" class="ml-2 opacity-75 hover:opacity-100 flex items-center transition-opacity">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </span>
                                <?php endforeach ?>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        
    </div>

    <script>

    </script>
</body>

</html>