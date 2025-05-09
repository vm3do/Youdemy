<?php

    require_once __DIR__ . "/../actions/auth.php";
    require_once __DIR__ . "/../Classes/Auth.php";
    require_once __DIR__ . "/../actions/editCourse.php";

    Auth::checkRole("teacher");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course - YouDemy</title>
    <script src="https://cdn.tailwindcss.com"></script>

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
                        <p class="font-medium text-gray-700">John Doe</p>
                        <p class="text-sm text-gray-500">Teacher</p>
                    </div>
                </div>
                <div class="h-8 w-px bg-gray-200 mx-2"></div>
                <a href="<?= BASE_URL ?>/logout" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:text-red-600 
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
    <div class="container mx-auto px-4 py-8">
        <!-- Back Button -->
        <div class="flex items-center gap-4 mb-6">
            <a href="<?= BASE_URL ?>/teacher/dashboard"
                class="flex items-center gap-2 text-gray-600 hover:text-violet-600 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span>Back to Dashboard</span>
            </a>
        </div>

        <!-- Edit Course Form -->
        <div class="bg-gradient-to-br from-violet-50 to-white rounded-xl shadow-sm p-6 border border-violet-100">
            <div class="flex items-center gap-4 mb-8">
                <div class="p-3 bg-violet-100 rounded-xl">
                    <svg class="w-8 h-8 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Edit Course</h1>
                    <p class="text-gray-500">Update your course information and content</p>
                </div>
            </div>

            <?php if($error["success"] === false && !empty($error["message"])): ?>
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg text-red-600">
                <?= $error["message"] ?>
            </div>
            <?php endif; ?>

            <?php if($success["success"] === true && !empty($success["message"])): ?>
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-600">
                <?= $success["message"] ?>
            </div>
            <?php endif; ?>

            <form class="space-y-8" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="course_id" value="<?= $course["id"] ?>">
                
                <!-- Course Title -->
                <div class="space-y-1 bg-white p-6 rounded-xl border border-violet-100 shadow-sm">
                    <label
                        class="inline-flex items-center gap-2 text-lg font-bold text-gray-800 mb-3 border-l-4 border-violet-500 pl-3">
                        <span class="text-violet-500">01.</span> Course Title
                    </label>
                    <input type="text" name="title" value="<?= htmlspecialchars($course["title"]) ?>" class="block w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm 
                        focus:ring-2 focus:ring-violet-500/20 focus:border-violet-500 
                        hover:border-violet-300 outline-violet-600 transition-colors">
                </div>

                <!-- Course Description -->
                <div class="space-y-1 bg-white p-6 rounded-xl border border-violet-100 shadow-sm">
                    <label
                        class="inline-flex items-center gap-2 text-lg font-bold text-gray-800 mb-3 border-l-4 border-violet-500 pl-3">
                        <span class="text-violet-500">02.</span> Course Description
                    </label>
                    <textarea name="description" rows="4"
                        class="block w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm 
                        focus:ring-2 focus:ring-violet-500/20 focus:border-violet-500 
                        hover:border-violet-300 outline-violet-600 transition-colors"><?= htmlspecialchars($course["description"]) ?></textarea>
                </div>

                <!-- Content Type -->
                <div class="space-y-1 bg-white p-6 rounded-xl border border-violet-100 shadow-sm">
                    <label
                        class="inline-flex items-center gap-2 text-lg font-bold text-gray-800 mb-3 border-l-4 border-violet-500 pl-3">
                        <span class="text-violet-500">03.</span> Content Type
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <!-- Video Course Option -->
                        <div>
                            <input type="radio" id="type-video" name="contentType" value="video" class="sr-only peer"
                                <?= $course["content_type"] == "video" ? "checked" : "" ?> onchange="toggleContentInput()">
                            <label for="type-video" class="flex flex-col items-center p-4 rounded-xl border-2 cursor-pointer
                                text-gray-600 border-gray-200 hover:border-violet-500 hover:bg-violet-50
                                peer-checked:border-violet-500 peer-checked:bg-violet-50 peer-checked:text-violet-600
                                transition-colors">
                                <div class="w-12 h-12 mb-3 rounded-full bg-violet-100 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="font-medium text-lg mb-1">Video Course</div>
                                <div class="text-sm text-gray-500 text-center">Upload video content for your course
                                </div>
                            </label>
                        </div>

                        <!-- Text Course Option -->
                        <div>
                            <input type="radio" id="type-text" name="contentType" value="text" class="sr-only peer"
                                <?= $course["content_type"] == "text" ? "checked" : "" ?> onchange="toggleContentInput()">
                            <label for="type-text" class="flex flex-col items-center p-4 rounded-xl border-2 cursor-pointer
                                text-gray-600 border-gray-200 hover:border-violet-500 hover:bg-violet-50
                                peer-checked:border-violet-500 peer-checked:bg-violet-50 peer-checked:text-violet-600
                                transition-colors">
                                <div class="w-12 h-12 mb-3 rounded-full bg-violet-100 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-violet-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div class="font-medium text-lg mb-1">Text Course</div>
                                <div class="text-sm text-gray-500 text-center">Create text-based course content</div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Video Content Input -->
                <div id="videoInput" class="space-y-4 <?= $course["content_type"] == "text" ? "hidden" : "" ?>">
                    <label class="block text-lg font-bold text-gray-800 mb-3 border-l-4 border-violet-500 pl-3">
                        Video Content
                    </label>
                    <div class="border-2 border-gray-200 rounded-lg bg-white">
                        <!-- Current Video Preview -->
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
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">Current: <?= basename($course["content"]) ?></p>
                                    <p class="text-sm text-gray-500"><?= round(filesize($course["content"]) / 1024 / 1024, 2) ?> MB</p>
                                </div>
                            </div>
                        </div>

                        <!-- Upload New Video -->
                        <div class="p-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Upload New Video</label>
                            <div class="flex items-center gap-3">
                                <div class="flex-1">
                                    <input type="file" name="video" accept="video/mp4,video/webm" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                        file:rounded-lg file:border-0 file:text-sm file:font-semibold
                                        file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100
                                        cursor-pointer border border-gray-200 rounded-lg
                                        focus:outline-none focus:ring-2 focus:ring-violet-500/20">
                                </div>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">
                                Supported formats: MP4, WebM (Max size: 2GB)
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Text Content Input -->
                <div id="textInput" class="space-y-4 <?= $course["content_type"] == "video" ? "hidden" : "" ?>">
                    <label class="block text-lg font-bold text-gray-800 mb-3 border-l-4 border-violet-500 pl-3">
                        Text Content
                    </label>
                    <textarea name="text" rows="8" placeholder="Enter your course content here..." class="block w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm 
                        focus:ring-2 focus:ring-violet-500/20 focus:border-violet-500 
                        hover:border-violet-300 outline-violet-600 transition-colors"><?= $course["content_type"] == "text" ? htmlspecialchars($course["content"]) : "" ?></textarea>
                </div>

                <!-- Tags -->
                <div class="space-y-1 bg-white p-6 rounded-xl border border-violet-100 shadow-sm">
                    <label
                        class="inline-flex items-center gap-2 text-lg font-bold text-gray-800 mb-3 border-l-4 border-violet-500 pl-3">
                        <span class="text-violet-500">04.</span> Tags
                    </label>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach($tags as $tag): ?>
                        <div>
                            <input type="checkbox" id="tag-<?= $tag["id"] ?>" name="tags[]" value="<?= $tag["id"] ?>" class="sr-only peer"
                                <?= in_array($tag["id"], $courseTags) ? "checked" : "" ?>>
                            <label for="tag-<?= $tag["id"] ?>" class="inline-flex px-3 py-1.5 rounded-lg border-2 cursor-pointer
                                text-gray-600 border-gray-200 hover:border-violet-500 hover:bg-violet-50
                                peer-checked:border-violet-500 peer-checked:bg-violet-50 peer-checked:text-violet-600
                                transition-colors">
                                <?= htmlspecialchars($tag["name"]) ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Category -->
                <div class="space-y-1 bg-white p-6 rounded-xl border border-violet-100 shadow-sm">
                    <label
                        class="inline-flex items-center gap-2 text-lg font-bold text-gray-800 mb-3 border-l-4 border-violet-500 pl-3">
                        <span class="text-violet-500">05.</span> Category
                    </label>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach($categories as $category): ?>
                        <div>
                            <input type="radio" id="cat-<?= $category["id"] ?>" name="category" value="<?= $category["id"] ?>"
                                class="sr-only peer" <?= $category["id"] == $course["category_id"] ? "checked" : "" ?>>
                            <label for="cat-<?= $category["id"] ?>" class="inline-flex px-3 py-1.5 rounded-lg border-2 cursor-pointer
                                text-gray-600 border-gray-200 hover:border-violet-500 hover:bg-violet-50
                                peer-checked:border-violet-500 peer-checked:bg-violet-50 peer-checked:text-violet-600
                                transition-colors">
                                <?= htmlspecialchars($category["name"]) ?>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3 pt-6">
                    <a href="<?= BASE_URL ?>/teacher/dashboard" class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 
                        rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-violet-500/20 
                        transition-colors">
                        Cancel
                    </a>
                    <button type="submit" name="updateCourse" class="px-6 py-2.5 text-sm font-medium text-white bg-violet-600 rounded-lg 
                        hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-violet-500/50 
                        transition-colors">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
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

        document.querySelectorAll('input[name="contentType"]').forEach(radio => {
            radio.addEventListener('change', toggleContentInput);
        });

        toggleContentInput();
    </script>
</body>

</html>