<?php
    require "../actions/auth.php";
    require "../Classes/Auth.php";

    Auth::checkRole("teacher");

    require "../actions/teacherFunc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouDemy Teacher Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        
    </style>
</head>

<body class="bg-gray-100">
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
                        <p class="font-medium text-gray-700"><?= $_SESSION['name'] ?? ""?></p>
                        <p class="text-sm text-gray-500">Teacher</p>
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
    <?php if($_SESSION['status'] == "pending"){
        include "../includes/pending.html";
    } else {?>
    <div class="container mx-auto px-4 py-8">
        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Courses -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Total Courses</h3>
                        <p class="text-sm text-gray-500">Active courses</p>
                    </div>
                    <span class="bg-blue-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </span>
                </div>
                <div class="flex items-center">
                    <h2 class="text-3xl font-bold text-gray-800"><?= $coursesCount["total_courses"] ?? "0" ?></h2>
                </div>
            </div>

            <!-- Total Students -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Total Students</h3>
                        <p class="text-sm text-gray-500">Enrolled students</p>
                    </div>
                    <span class="bg-green-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                </div>
                <div class="flex items-center">
                    <h2 class="text-3xl font-bold text-gray-800"><?= $students["students"] ?? "0" ?></h2>
                </div>
            </div>
        </div>

        <!-- Course Management Section -->
        <div class="mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Course Management</h2>
                <button onclick="toggleModal()"
                    class="bg-purple-800 hover:bg-purple-900 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add New Course
                </button>
            </div>

            <!-- Course List -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left bg-purple-800 rounded-lg">
                                <th class="p-4 text-white font-semibold rounded-tl-lg">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                        Course Details
                                    </div>
                                </th>
                                <th class="p-4 text-white font-semibold">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        Students
                                    </div>
                                </th>
                                <th class="p-4 text-white font-semibold">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Created At
                                    </div>
                                </th>
                                <th class="p-4 text-white font-semibold rounded-tr-lg">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                        </svg>
                                        Actions
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <!-- Course Row -->
                            <?php foreach( $courses as $course): ?>

                                <tr class="hover:bg-gray-100/50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-12 h-12 rounded-xl bg-violet-100 flex items-center justify-center flex-shrink-0">
                                                <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-medium text-gray-900"><?= $course["title"] ?? "empty"?></h4>
                                                
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div
                                                class="w-8 h-8 rounded-full bg-violet-100 flex items-center justify-center">
                                                <svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <span class="font-semibold text-gray-900"><?= $course["students"]?></span>
                                                <span class="text-gray-500 text-sm ml-1"> students</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-2">
                                            <div
                                                class="w-8 h-8 rounded-full bg-violet-100 flex items-center justify-center">
                                                <svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <span class="text-gray-900"><?= explode(" ", $course['created_at'])[0]?></span>
                                                <span class="block text-xs text-gray-500"><?= explode(" ", $course['created_at'])[1]?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <form action="edit.php" method="POST">
                                                <input type="hidden" name="course_id" value="<?= $course["id"]?>">
                                                <button
                                                    class="p-2 text-violet-600 hover:bg-violet-600 hover:text-white rounded-lg transition-colors group relative">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                            </form>

                                            <form action="teacher.php" method="POST">
                                                <input type="hidden" name="course_id" value="<?= $course["id"]?>">
                                                <button type="submit" name="delete"
                                                    class="p-2 text-red-600 hover:bg-red-600 hover:text-white rounded-lg transition-colors group relative">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
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

    <!-- Add Course Modal -->
    <div id="addCourseModal" class="fixed inset-0 bg-gray-900/50 z-50 hidden">
        <div class="min-h-screen px-4 text-center flex items-center justify-center">

            
            <!-- Modal panel -->
            <div class="w-full max-w-2xl bg-white shadow-xl rounded-2xl relative">
                <!-- Fixed Header -->
                <div class="sticky top-0 bg-white px-6 py-4 border-b rounded-t-2xl z-10">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-bold text-gray-900">Add New Course</h3>
                        <button onclick="toggleModal()"
                            class="text-gray-400 hover:text-gray-500 p-2 hover:bg-violet-50 rounded-lg transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Modal Content -->
                <div class="px-6 py-4 max-h-[calc(100vh-180px)] overflow-y-auto scrollbar-hide">
                    <?php if(!$addError["success"] || !$return["success"]): ?>
                    <div class="text-red-500" ><?= $return["message"] ?? $addError["message"] ?? "" ?></div>
                    <?php else: ?>
                    <div class="text-green-500" ><?= $return["message"] ?? $addError["message"] ?? "" ?></div>
                    <?php endif; ?>
                    <form id="addCourse" action="teacher.php" method="POST" name="addCourse" enctype="multipart/form-data" class="space-y-6">
                        
                        <!-- Title -->
                        <div class="space-y-1 text-left">
                            <label class="block text-base font-semibold text-gray-800 mb-2">
                                Course Title
                            </label>
                            <div class="relative">
                                <input type="text" id="courseTitle" name="title" required class="block w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm 
                                    focus:ring-2 focus:ring-violet-500/20 focus:border-violet-500 
                                    hover:border-violet-300 outline-violet-600 transition-colors"
                                    placeholder="Enter course title">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="space-y-1 text-left">
                            <label class="block text-base font-semibold text-gray-800 mb-2">
                                Course Description
                            </label>
                            <div class="relative">
                                <textarea name="description" rows="3" required class="block w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm 
                                    focus:ring-2 focus:ring-violet-500/20 focus:border-violet-500 
                                    hover:border-violet-300 outline-violet-600 transition-colors"
                                    placeholder="Describe your course"></textarea>
                            </div>
                        </div>

                        <!-- Course Background Image -->
                        <div class="space-y-1">
                            <label class="block text-base font-semibold text-gray-800 mb-2">
                                Course Background Image
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-violet-500 transition-colors">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="background" class="relative cursor-pointer bg-white rounded-md font-medium text-violet-600 hover:text-violet-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-violet-500">
                                            <span>Upload a file</span>
                                            <input id="background" name="background" type="file" class="sr-only" accept="image/*" required>
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 2MB
                                    </p>
                                    <!-- Preview -->
                                    <div id="imagePreview" class="hidden mt-4">
                                        <img id="preview" src="#" alt="Preview" class="mx-auto max-h-40 rounded-lg">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Type -->
                        <div class="space-y-1 text-left">
                            <label class="block text-base font-semibold text-gray-800 mb-2">
                                Content Type
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <!-- Video Course Option -->
                                <div>
                                    <input type="radio" id="type-video" name="contentType" value="video"
                                        class="sr-only peer" checked onchange="toggleContentInput()">
                                    <label for="type-video" class="flex flex-col items-center p-4 rounded-xl border-2 cursor-pointer
                                        text-gray-600 border-gray-200 hover:border-violet-500 hover:bg-violet-50
                                        peer-checked:border-violet-500 peer-checked:bg-violet-50 peer-checked:text-violet-600
                                        transition-colors">
                                        <div
                                            class="w-12 h-12 mb-3 rounded-full bg-violet-100 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div class="font-medium text-lg mb-1">Video Course</div>
                                        <div class="text-sm text-gray-500 text-center">Upload video content for your
                                            course</div>
                                    </label>
                                </div>

                                <!-- Text Course Option -->
                                <div>
                                    <input type="radio" id="type-text" name="contentType" value="text"
                                        class="sr-only peer" onchange="toggleContentInput()">
                                    <label for="type-text" class="flex flex-col items-center p-4 rounded-xl border-2 cursor-pointer
                                        text-gray-600 border-gray-200 hover:border-violet-500 hover:bg-violet-50
                                        peer-checked:border-violet-500 peer-checked:bg-violet-50 peer-checked:text-violet-600
                                        transition-colors">
                                        <div
                                            class="w-12 h-12 mb-3 rounded-full bg-violet-100 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <div class="font-medium text-lg mb-1">Text Course</div>
                                        <div class="text-sm text-gray-500 text-center">Create text-based course content
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Video File -->
                        <div id="videoInput" class="space-y-4">
                            <label class="block text-lg font-bold text-gray-800 mb-3 border-l-4 border-violet-500 pl-3">
                                Video Content
                            </label>
                            <div class="border-2 border-gray-200 rounded-lg bg-white">
                                <!-- Current Video -->
                                <div class="p-4 border-b border-gray-200">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-12 h-12 rounded-lg bg-violet-100 flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Upload New Video -->
                                <div class="p-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload New Video</label>
                                    <div class="flex items-center gap-3">
                                        <div class="flex-1">
                                            <input type="file" accept="video/mp4" name="video" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                                file:rounded-lg file:border-0 file:text-sm file:font-semibold
                                                file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100
                                                cursor-pointer border border-gray-200 rounded-lg
                                                focus:outline-none focus:ring-2 focus:ring-violet-500/20">
                                        </div>
                                    </div>
                                    <p class="mt-2 text-xs text-gray-500">
                                        Supported formats: MP4 (Max size: 8mb)
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Text Content -->

                        <div id="textInput" class="hidden space-y-1">
                            <label class="block text-base font-semibold text-gray-800 mb-2">
                                Course Content
                            </label>
                            <div class="relative">
                                <textarea id="textContent" name="text" rows="6" class="block w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm 
                                    focus:ring-2 focus:ring-violet-500/20 focus:border-violet-500 
                                    hover:border-violet-300 outline-violet-600 transition-colors"
                                    placeholder="Enter your course content"></textarea>
                                <div class="absolute top-3 right-3 pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16m-7 6h7" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="space-y-1 text-left">
                            <label class="block text-base font-semibold text-gray-800 mb-2">
                                Tags
                            </label>
                            <div class="flex flex-wrap gap-2">

                                <?php foreach($tags as $tag): ?>

                                    <div>
                                        <input type="checkbox" id="<?= $tag["id"] ?>" name="tags[]" value="<?= $tag["id"] ?>"
                                            class="sr-only peer">
                                        <label for="<?= $tag["id"] ?>" class="inline-flex px-3 py-1.5 rounded-lg border-2 cursor-pointer
                                            text-gray-600 border-gray-200 hover:border-violet-500 hover:bg-violet-50
                                            peer-checked:border-violet-500 peer-checked:bg-violet-50 peer-checked:text-violet-600
                                            transition-colors">
                                            <?= $tag["name"] ?>
                                        </label>
                                    </div>

                                <?php endforeach ?>

                                
                            </div>
                            <p class="mt-1 text-sm text-gray-500">Select all that apply</p>
                        </div>

                        <!-- Categories -->
                        <div class="space-y-1 text-left">
                            <label class="block text-base font-semibold text-gray-800 mb-2">
                                Category
                            </label>
                            <div class="flex flex-wrap gap-2">

                                <?php foreach($categories as $category): ?>

                                    <div>
                                        <input type="radio" id="cat<?=$category["id"] ?>" name="category" value="<?= $category["id"] ?>"
                                            class="sr-only peer">
                                        <label for="cat<?=$category["id"] ?>" class="inline-flex px-3 py-1.5 rounded-lg border-2 cursor-pointer
                                            text-gray-600 border-gray-200 hover:border-violet-500 hover:bg-violet-50
                                            peer-checked:border-violet-500 peer-checked:bg-violet-50 peer-checked:text-violet-600
                                            transition-colors">
                                            <?= $category["name"] ?>
                                        </label>
                                    </div>

                                <?php endforeach ?>

                            </div>
                            <p class="mt-1 text-sm text-gray-500">Select one category</p>
                        </div>
                        
                    </form>
                    
                    

                </div>

                <!-- Modal Footer -->
                <div class="sticky bottom-0 bg-white px-6 py-4 border-t flex justify-end gap-3 rounded-b-2xl">
                    <button type="button" onclick="toggleModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 
                        rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-violet-500/20 
                        transition-colors">
                        Cancel
                    </button>
                    <button type="submit" name="addCourse" form="addCourse" class="px-4 py-2 text-sm font-medium text-white bg-violet-600 rounded-lg 
                        hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500/50 
                        transition-colors">
                        Create Course
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <script>
        function toggleModal() {
            const modal = document.getElementById('addCourseModal');
            modal.classList.toggle('hidden');
        }


        function toggleContentInput() {
            const videoInput = document.getElementById('videoInput');
            const textInput = document.getElementById('textInput');
            const selectedType = document.querySelector('input[name="contentType"]:checked').value;

            if (selectedType === 'video') {
                videoInput.classList.remove('hidden');
                textInput.classList.add('hidden');
            } else {
                videoInput.classList.add('hidden');
                textInput.classList.remove('hidden');
            }
        }

        document.getElementById('background').onchange = function(evt) {
            const [file] = this.files;
            if (file) {
                const preview = document.getElementById('preview');
                const previewContainer = document.getElementById('imagePreview');
                preview.src = URL.createObjectURL(file);
                previewContainer.classList.remove('hidden');
            }
        }

    </script>

</body>

</html>