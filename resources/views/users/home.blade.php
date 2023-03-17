<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <title>Templates</title>
    <style>
        /* Inline CSS */
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
                </li>
                <li class="rounded-xl" id="">
                    <!-- Form to create New Template -->
                    <form action="{{ 'addTemplate' }}" class="p-3 bg-slate-200 rounded mt-5 relative hidden" id="showTemplateForm" method="POST">@csrf
                        <input type="text" placeholder="Folder Name" name="title" class="w-full p-3 rounded-lg focus:outline-none focus:outline-green-900 border-none">
                        <!-- Buttons -->
                        <div class="flex justify-end mt-3">
                            <input type="submit" value="Create" name="submit" class="bg-green-800 hover:bg-green-900 text-white w-full rounded-lg p-3 text-lg cursor-pointer">
                            <!-- {{-- <input type="reset" value="Cancel" id="hideTemplate" class="bg-red-800 hover:bg-red-900 text-white w-6/12 rounded-lg p-3 text-lg cursor-pointer" name="back"> --}} -->
                        </div>
                    </form>
                </li>
                <li>
                    <a href="{{ '/users/logout' }}" class="flex items-center p-4 text-lg font-medium text-white rounded-lg hover:bg-slate-50 hover:text-green-900">
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
            <h1 class="text-zinc-600 pb-4 ml-2 text-2xl">Parent Folder</h1>
            <!-- Search Input -->
            <!-- <div class="grid grid-cols-1 mb-4">
                <input type="search" placeholder="Search template" class="rounded focus:outline-green-800 outline-none">
            </div> -->
            <!-- Templates -->
            <div class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-5 mb-4">
                @if ($templates->isEmpty())
                    <!-- Condition when no template has been created -->
                    <div class=" ml-2 absolute text-center">
                        <h1 class="text-3xl text-zinc-600">No Template Created</h1>
                    </div>
                    <!-- Content when template have created -->
                @else
                    @foreach ($templates as $template)
                        @if (Session::get('user_id') == $template->user_id)
                            <div class="flex items-center justify-center flex-col shadow h-64 rounded-xl cursor-pointer text-zinc-600 bg-slate-100 border-2 border-slate-200 hover:bg-green-800 hover:text-white">
                                <div class="w-full p-5 flex justify-between">
                                    <div>
                                        <a href="{{ '/users/file/'.$template->id }}" class="cursor-pointer bg-blue-500 px-3 py-2 hover:bg-blue-600 text-white rounded-lg mr-2"><i class="bi bi-arrow-right"></i></a>
                                    </div>
                                    <div>
                                        <!--Edit icon-->
                                        <a href="#edit" class="cursor-pointer bg-yellow-400 py-2 px-1 hover:bg-yellow-500 rounded-lg mr-2"><i class="bi bi-pencil-fill text-slate-100 p-2"></i></a>

                                        <!--Delete icon-->
                                        <a href="{{ '/users/delete_template/'.$template->id }}" class="cursor-pointer bg-red-500 py-2 px-1 hover:bg-red-600 rounded-lg"><i class="bi bi-trash3-fill text-slate-100 p-2"></i></a>
                                    </div>
                                </div>
                                    <p class="text-5xl mb-10 mt-5 text-orange-300">
                                        <i class="bi bi-folder-fill"></i>
                                    </p>
                                        <!-- Update New Name -->
                                    <a href="" class="text-xl text-center mb-10" contenteditable="true">
                                        {{ $template->title }}
                                    </a>
                                </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>

<!--Error Messages-->
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>alert('something went wrong')</script>
    @endforeach
@endif

    <script>
        $(document).ready(function(){
            $("#showTemplate").click(function(){
                $("#showTemplateForm").toggle(200);
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
