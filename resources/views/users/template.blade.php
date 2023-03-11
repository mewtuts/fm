<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <title>Templates</title>
    <style>

    </style>
</head>
<body class="font-poppins bg-slate-50">  

    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 outline-none focus:ring-2 focus:bg-green-800 focus:text-white">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <!-- Side Bar -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-80 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-5 py-4 overflow-y-auto bg-green-800">
            <!-- Logo -->
            <a href="#" class="flex items-center mb-5 mt-2">
                <i class="bi bi-folder-fill text-orange-300 text-4xl pr-4"></i>
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-slate-50">File Management</span>
            </a>
            <ul class="space-y-2 mt-10">
                <li class="rounded-xl" id="showTemplate">
                    <a href="#" class="flex items-center p-4 text-xl font-medium rounded-lg bg-slate-100">
                        <i class="bi bi-plus-circle-fill text-green-800"></i>
                        <span class="ml-5 text-green-900">New Template</span>
                    </a>
                    <!-- Form to create New Template -->
                    <form action="" class="p-3 bg-slate-200 rounded mt-5 relative hidden" id="showTemplateForm">
                        <input type="text" placeholder="Folder Name" class="w-full p-3 rounded-lg focus:outline-none focus:outline-green-900 border-none">
                        <!-- Buttons -->
                        <div class="flex items-center justify-between mt-3">
                            <input type="submit" value="Create" class="bg-green-800 hover:bg-green-900 text-white w-6/12 rounded-lg p-3 mr-2 text-lg cursor-pointer">
                            <input type="reset" value="Cancel" id="hideTemplate" class="bg-red-800 hover:bg-red-900 text-white w-6/12 rounded-lg p-3 text-lg cursor-pointer">
                        </div>
                    </form>
                </li>
                <!-- <li>
                    <a href="#" class="flex items-center p-4 text-lg font-medium text-white rounded-lg hover:bg-slate-50 hover:text-green-900">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="flex-1 ml-5 whitespace-nowrap">Kanban</span>
                    <span class="inline-flex items-center justify-center px-2 ml-5 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-4 text-lg font-medium text-white rounded-lg hover:bg-slate-50 hover:text-green-900">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                    <span class="flex-1 ml-5 whitespace-nowrap">Inbox</span>
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-5 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-4 text-lg font-medium text-white rounded-lg hover:bg-slate-50 hover:text-green-900">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-5 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-4 text-lg font-medium text-white rounded-lg hover:bg-slate-50 hover:text-green-900">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-5 whitespace-nowrap">Products</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-4 text-lg font-medium text-white rounded-lg hover:bg-slate-50 hover:text-green-900">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                    <span class="flex-1 ml-5 whitespace-nowrap">Sign In</span>
                    </a>
                </li> -->
                <li>
                    <a href="#" class="flex items-center p-4 text-lg font-medium text-white rounded-lg hover:bg-slate-50 hover:text-green-900">
                        <i class="bi bi-box-arrow-left text-xl"></i>
                        <span class="flex-1 ml-5 whitespace-nowrap">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Content -->
    <div class="p-4 sm:ml-80">
        <div class="p-4 rounded-lg">
            <h1 class="text-zinc-600 pb-4 ml-2 text-2xl">Templates</h1>
            <!-- Search Input -->
            <!-- <div class="grid grid-cols-1 mb-4">
                <input type="search" placeholder="Search template" class="rounded focus:outline-green-800 outline-none">
            </div> -->
            <!-- Templates -->
            <div class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-5 mb-4">
                <div class="flex items-center justify-center flex-col shadow h-64 rounded-xl cursor-pointer text-zinc-600 bg-slate-100 border-2 border-slate-200 hover:bg-green-800 hover:text-white">
                    <p class="text-5xl text-orange-300">
                        <i class="bi bi-folder-fill"></i>
                    </p>
                    <p class="mt-10 text-xl text-center">
                        Folder Name
                    </p>
                </div>
                <div class="flex items-center justify-center flex-col shadow h-64 rounded-xl cursor-pointer text-zinc-600 bg-slate-100 border-2 border-slate-200 hover:bg-green-800 hover:text-white">
                    <p class="text-5xl text-orange-300">
                        <i class="bi bi-folder-fill"></i>
                    </p>
                    <p class="mt-10 text-xl text-center">
                        Folder Name
                    </p>
                </div>
                <div class="flex items-center justify-center flex-col shadow h-64 rounded-xl cursor-pointer text-zinc-600 bg-slate-100 border-2 border-slate-200 hover:bg-green-800 hover:text-white">
                    <p class="text-5xl text-orange-300">
                        <i class="bi bi-folder-fill"></i>
                    </p>
                    <p class="mt-10 text-xl text-center">
                        Folder Name
                    </p>
                </div>
                <div class="flex items-center justify-center flex-col shadow h-64 rounded-xl cursor-pointer text-zinc-600 bg-slate-100 border-2 border-slate-200 hover:bg-green-800 hover:text-white">
                    <p class="text-5xl text-orange-300">
                        <i class="bi bi-folder-fill"></i>
                    </p>
                    <p class="mt-10 text-xl text-center">
                        Folder Name
                    </p>
                </div>
                <div class="flex items-center justify-center flex-col shadow h-64 rounded-xl cursor-pointer text-zinc-600 bg-slate-100 border-2 border-slate-200 hover:bg-green-800 hover:text-white">
                    <p class="text-5xl text-orange-300">
                        <i class="bi bi-folder-fill"></i>
                    </p>
                    <p class="mt-10 text-xl text-center">
                        Folder Name
                    </p>
                </div>
                <div class="flex items-center justify-center flex-col shadow h-64 rounded-xl cursor-pointer text-zinc-600 bg-slate-100 border-2 border-slate-200 hover:bg-green-800 hover:text-white">
                    <p class="text-5xl text-orange-300">
                        <i class="bi bi-folder-fill"></i>
                    </p>
                    <p class="mt-10 text-xl text-center">
                        Folder Name
                    </p>
                </div>
                <div class="flex items-center justify-center flex-col shadow h-64 rounded-xl cursor-pointer text-zinc-600 bg-slate-100 border-2 border-slate-200 hover:bg-green-800 hover:text-white">
                    <p class="text-5xl text-orange-300">
                        <i class="bi bi-folder-fill"></i>
                    </p>
                    <p class="mt-10 text-xl text-center">
                        Folder Name
                    </p>
                </div>
                <div class="flex items-center justify-center flex-col shadow h-64 rounded-xl cursor-pointer text-zinc-600 bg-slate-100 border-2 border-slate-200 hover:bg-green-800 hover:text-white">
                    <p class="text-5xl text-orange-300">
                        <i class="bi bi-folder-fill"></i>
                    </p>
                    <p class="mt-10 text-xl text-center">
                        Folder Name
                    </p>
                </div>
                <div class="flex items-center justify-center flex-col shadow h-64 rounded-xl cursor-pointer text-zinc-600 bg-slate-100 border-2 border-slate-200 hover:bg-green-800 hover:text-white">
                    <p class="text-5xl text-orange-300">
                        <i class="bi bi-folder-fill"></i>
                    </p>
                    <p class="mt-10 text-xl text-center">
                        Folder Name
                    </p>
                </div>
                <div class="flex items-center justify-center flex-col shadow h-64 rounded-xl cursor-pointer text-zinc-600 bg-slate-100 border-2 border-slate-200 hover:bg-green-800 hover:text-white">
                    <p class="text-5xl text-orange-300">
                        <i class="bi bi-folder-fill"></i>
                    </p>
                    <p class="mt-10 text-xl text-center">
                        Folder Name
                    </p>
                </div>
                <div class="flex items-center justify-center flex-col shadow h-64 rounded-xl cursor-pointer text-zinc-600 bg-slate-100 border-2 border-slate-200 hover:bg-green-800 hover:text-white">
                    <p class="text-5xl text-orange-300">
                        <i class="bi bi-folder-fill"></i>
                    </p>
                    <p class="mt-10 text-xl text-center">
                        Folder Name
                    </p>
                </div>
                <div class="flex items-center justify-center flex-col shadow h-64 rounded-xl cursor-pointer text-zinc-600 bg-slate-100 border-2 border-slate-200 hover:bg-green-800 hover:text-white">
                    <p class="text-5xl text-orange-300">
                        <i class="bi bi-folder-fill"></i>
                    </p>
                    <p class="mt-10 text-xl text-center">
                        Folder Name
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#showTemplate").click(function(){
                $("#showTemplateForm").show();
            });
            $("#hideTemplate").click(function(){
                $("#showTemplateForm").hide();
            });
        });
    </script>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <!-- Jquery Validate Plugin  -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
</body>
</html>