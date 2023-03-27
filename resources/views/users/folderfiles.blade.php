<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    @vite('resources//css/app.css')
    <title>Folder and Files</title>
</head>
<body>
<body class="bg-slate-50">
    <header class="bg-slate-100 h-20 flex">
        <a href="#" class="flex items-center p-4" title="Home">
            <i class="bi bi-folder-fill text-orange-300 text-4xl pr-4"></i>
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-green-800">File Management</span>
        </a>
    </header>

    <!-- Main Content -->
    <div class="w-screen h-fit overflow-auto">
       <div class="grid xl:grid-cols-6 lg:grid-cols-6 md:grid-cols-6 gap-5">
            <div class="h-fit xl:col-span-2 lg:col-span-2 md:col-span-3 p-5">
                <!-- Form Content -->
                <div class="shadow p-5 h-fit rounded-lg">
                    <!-- Buttons to create and upload -->
                    <div class="w-full flex justify-end  px-5 pb-2">
                        <!-- Create Folder -->
                        <div class="flex justify-center border-2 rounded-full w-fit items-center mr-2 bg-green-800 text-white hover:bg-green-900">
                            <button id="buttonCreateFolder" class="w-10 cursor-pointer text-center p-2"><i class="bi bi-folder font-bold"></i></button>
                        </div>
                        <!-- Upload File -->
                        <div id="buttonUploadFile" class="flex justify-center border-2 rounded-full w-fit items-center mr-2 bg-green-800 text-white hover:bg-green-900">
                            <button class="w-10 cursor-pointer text-centerp-2"><i class="bi bi-file-earmark"></i></button>
                        </div>
                        <!-- Upload Via URL -->
                        <div id="buttonUploadFileUrl" class="flex justify-center border-2 rounded-full w-fit items-center mr-2 bg-green-800 text-white hover:bg-green-900">
                            <button class="w-10 cursor-pointer text-centerp-2"><i class="bi bi-link"></i></button>
                        </div>
                    </div>
                    <!-- Create Folder Form -->
                    <div class="h-fit mt-2 flex items-center justify-center">
                        <div class="w-full" id="showCreateFolder">
                            <form action="" class="px-5 py-10 bg-slate-200 rounded-lg flex items-center flex-col">
                                <span class="pb-10 text-zinc-700 text-2xl">Create Folder</span>
                                <input type="text" placeholder="Folder Name" class="w-full p-3 rounded border-none bg-slate-50">
                                <select name="" id="" class="w-full mt-3 p-3 rounded text-zinc-600 border-none bg-slate-50">
                                    <option value="" selected disabled>Specify where the folder will locate</option>
                                </select>
                                <input type="submit" value="Create Folder" class="w-full p-3 text-lg bg-green-800 hover:bg-green-900 text-slate-50 mt-7 rounded cursor-pointer">
                            </form>
                        </div>
                        <!-- Upload File Form -->
                        <div class="hidden w-full" id="showUploadFile">
                            <form action="" class="px-5 py-10 bg-slate-200 rounded flex items-center flex-col">
                                <span class="pb-10 text-zinc-700 text-2xl">Upload File</span>
                                <input type="text" placeholder="Folder Name" class="w-full p-3 rounded border-none bg-slate-50">
                                <div class="flex mt-3 items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center rounded w-full h-fit border-2 bg-slate-50 cursor-pointer">
                                    <i class="bi bi-cloud-arrow-up-fill text-green-800 text-3xl pt-3"></i>
                                    <p class="text-green-800 py-3 text-center">Click to upload or drag and down</p>
                                    <input id="dropzone-file" type="file" class="hidden" />
                                    </label>
                                </div>
                                <select name="" id="" class="w-full mt-3 p-3 rounded text-zinc-600 border-none bg-slate-50">
                                    <option value="" selected disabled>Specify where the folder will locate</option>
                                </select>
                                <input type="submit" value="Upload File" class="w-full p-3 text-lg bg-green-800 hover:bg-green-900 text-slate-50 mt-7 rounded cursor-pointer">
                            </form>
                        </div>
                        <!-- Upload Via URL -->
                        <div class="hidden w-full" id="showUploadFileUrl">
                            <form action="" class="px-5 py-10 bg-slate-200 rounded flex items-center flex-col">
                                <span class="pb-10 text-zinc-700 text-2xl">Upload Url</span>
                                <input type="url" class="w-full p-3 rounded border-none bg-slate-50" placeholder="Url">
                                <select name="" id="" class="w-full mt-3 p-3 rounded text-zinc-600 border-none bg-slate-50">
                                    <option value="" selected disabled>Specify where the folder will locate</option>
                                </select>
                                <input type="submit" value="Upload Url" class="w-full p-3 text-lg bg-green-800 hover:bg-green-900 text-slate-50 mt-7 rounded cursor-pointer">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-5 max-h-96 py-2">
                    <!-- Recent Uploads -->
                    <div class="rounded-lg w-full shadow">
                        <h1 class="px-3 py-4 text-xl bg-slate-200 rounded-tr-lg rounded-tl-lg">Recent Upload Files</h1>
                        <div class="px-2 py-3 w-full flex">
                            <i class=" pl-2 bi bi-file-earmark-image-fill text-indigo-800"></i>
                            <p class="ml-2">image.png</p>
                        </div>
                        <div class="rounded-bl-lg rounded-br-lg"></div>
                    </div>
                </div>
            </div>
            <!-- Folders and Files -->
            <div class="xl:col-span-4 lg:col-span-4 md:col-span-3 p-5">
                <!-- Template Title and Template Description -->
                <div class="">
                    <!-- Template Title -->
                    <span class="text-xl font-bold text-zinc-700">Template Title</span>
                    <!-- Template Description -->
                    <div class="mt-5">
                        <p class="w-full text-justify"><span class="mr-10"></span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum rutrum quis lectus ac luctus. Fusce vitae lacus pellentesque, scelerisque dolor id, tincidunt felis. Aenean lacinia, ligula et pharetra pulvinar, sem arcu volutpat sem, a gravida justo ipsum id orci. Cras ut lacus pharetra, dapibus orci et, ornare mi. Nam lobortis quam ac tellus feugiat, a tincidunt nisi ornare. Etiam ultricies, justo in cursus rhoncus, arcu est faucibus odio, eu imperdiet nisi justo ut massa. Suspendisse mattis tellus at risus frinbotgilla, vitae viverra felis semper. Proin egestas ornare nibh, eu dignissim lorem luctus et. Sed pellentesque velit at metus dignissim lobortis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas viverra efficitur risus non dignissim. Sed dui risus, aliquam eu porttitor eu, lobortis sed sem. In euismod orci ligula, sit amet condimentum arcu
            aliquet sed.</p>
                    </div>
                </div>
                <!-- Folder and Files -->
                <div class="mt-10">
                    <p class="text-xl font-bold text-zinc-700">Folder and Files</p>
                    <div class="mt-5 bg-slate-100 rounded p-3">
                        <!-- Folder -->
                        <div class="flex items-center">
                            <i class="bi bi-folder-fill text-orange-300 px-2"></i>
                            <p class="text-lg">Sample Folder</p>
                        </div>
                        <!-- Files -->
                        <div class="flex items-center border-b hover:bg-slate-200 cursor-pointer">
                            <i class="bi bi-dot text-3xl ml-2 text-indigo-800"></i>
                            <i class="bi bi-file-image-fill text-indigo-800 pr-1"></i>
                            <p class="cursor-pointer">image.jpeg</p>
                        </div>
                        <div class="flex items-center border-b hover:bg-slate-200 cursor-pointer">
                            <i class="bi bi-dot text-3xl ml-2 text-indigo-800"></i>
                            <i class="bi bi-file-image-fill text-indigo-800 pr-1"></i>
                            <p class="cursor-pointer">image.jpeg</p>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>

    <!-- Jquery -->
    <script>
        $(document).ready(function(){
            $("#buttonCreateFolder").click(function(){
                $("#showCreateFolder").show(400);
            });
            $("#buttonCreateFolder").click(function(){
                $("#showUploadFile").hide(400);
            });
            $("#buttonCreateFolder").click(function(){
                $("#showUploadFileUrl").hide(400);
            });
        });
        $(document).ready(function(){
            $("#buttonUploadFile").click(function(){
                $("#showUploadFile").show(400);
            })
            $("#buttonUploadFile").click(function(){
                $("#showCreateFolder").hide(400);
            })
            $("#buttonUploadFile").click(function(){
                $("#showUploadFileUrl").hide(400);
            })
        });
        $(document).ready(function(){
            $("#buttonUploadFileUrl").click(function(){
                $("#showUploadFileUrl").show(400);
            })
            $("#buttonUploadFileUrl").click(function(){
                $("#showCreateFolder").hide(400);
            })
            $("#buttonUploadFileUrl").click(function(){
                $("#showUploadFile").hide(400);
            })
        });
        $(document).ready(function(){
            $("#buttonInsertCaption").click(function(){
                $("#showInsertCaption").toggle(400);
            })
        });
    </script>


    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <!-- Jquery Validate Plugin  -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
</body>
</html>




{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <title>Files</title>
</head>
<body class="bg-slate-50">
    <header class="bg-slate-100 h-20 flex">
        <a href="{{ '/users/home' }}" class="flex items-center p-4" title="Home">
            <i class="bi bi-folder-fill text-orange-300 text-4xl pr-4"></i>
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-green-800">File Management</span>
        </a>
    </header>

    <!-- Main Content -->
    <div class="w-screen h-fit overflow-auto">
        <!-- Content to Create Folder and Upload File -->
        <div class="w-full border-2 border-zinc-100 py-5 px-2">
            <div class="flex justify-between w-full p-2">
                <!-- Create Folder Buttons -->
                <div class="w-3/5">
                    <div id="createFolder" class="p-5 w-full bg-green-800 text-white hover:bg-green-900 rounded text-2xl text-center cursor-pointer">
                        <button>Create Folder</button>
                    </div>
                    <!-- Form to Create Folder -->
                    <div class="mt-5 hidden" id="showFolderForm">
                        <form action="{{ route('storeSubParent') }}" class="px-10 py-10 bg-slate-200 rounded" method="post"> @csrf
                            <input type="text" name="title" placeholder="Folder Name" class="w-full p-3 rounded" required>
                            <select name="parent_id" id="" class="w-full p-3 mt-5 rounded text-zinc-600" required>
                                <option value="" selected disabled>Specify where the folder will locate</option>
                                @foreach ($categories as $category)

                                    <x-select-category :category="$category" />

                                @endforeach
                            </select>
                            <input type="submit" value="Create Folder" class="w-full bg-green-800 hover:bg-green-900 text-white text-xl p-3 mt-7 rounded cursor-pointer">
                        </form>
                    </div>
                </div>
            <!-- Space -->
            <div class="p-4"></div>
            <!-- Space -->
            <div class="w-3/5">
                <!-- Upload File Buttons -->
                <div id="uploadFile" class="p-5 w-full bg-green-800 text-white hover:bg-green-900 rounded text-2xl text-center cursor-pointer">
                    <button>Upload File</button>
                </div>
                <!-- Form to Upload File -->
                <div class="mt-5 hidden" id="showUploadFile">
                    <form action="{{ route('uploadFile') }}" method="POST" enctype="multipart/form-data" class="px-10 py-10 bg-slate-200 rounded">@csrf
                        <!-- Uploading -->
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-green-800">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            </div>
                            <input id="dropzone-file" type="file" name="file" class="hidden" />
                        </label>
                        <select name="parent_id" id="" class="w-full p-3 mt-5 rounded text-zinc-600">
                            <option value="" selected disabled>Specify where the file will locate</option>
                            @foreach ($categories as $category)

                                <x-select-category :category="$category" />

                            @endforeach
                        </select>
                        <input type="submit" value="Upload File" class="w-full bg-green-800 hover:bg-green-900 text-white text-xl p-3 mt-7 rounded cursor-pointer">
                    </form>
                </div>
            </div>
            </div>


        </div>
        <!-- Created Folder and Upload File Here... -->
        <div class="p-5">

            <form class="w-full grid grid-cols-2 items-center justify-between border-b" action="{{ '/users/delete_sff' }}" method="post"> @csrf

                <h1 class=" p-3 text-2xl text-zinc-800 border-r">Folders and Files</h1>

                <div class="showEditDelete text-right">

                <!-- Updating a new name -->
                    <div class="inline mr-3 hidden" id="showEditNameFileTwo">
                        <form action="" class="flex">
                            <input type="text" class="w-3/5 border-none shadow bg-slate-50 p-2 rounded-tl rounded-bl" placeholder="New Name">
                            <input type="submit" class="bg-green-800 hover:bg-green-900 rounded-tr rounded-br text-white p-2 cursor-pointer">
                        </form>
                    </div>
                    <!-- Update -->
                    <label for="update" id="buttonEditNameFileTwo"><i class="bi bi-pencil-fill w-full text-zinc-600 mr-2 cursor-pointer text-2xl hover:text-3xl"></i></label>
                    <input class="border-2 border-black p-2 cursor-pointer hidden" type="submit" name="submit" value="update" id="update">
                    <!-- Delete -->
                    <label for="delete"><i class="bi bi-trash-fill w-full text-zinc-600 cursor-pointer text-2xl hover:text-3xl"></i></label>
                    <input class="border-2 border-black p-2 cursor-pointer hidden" type="submit" name="submit" value="delete" id="delete">
                </div>

                @foreach ($categories as $category)

                    <x-sub-category :category="$category" />

                @endforeach

            </form>

        </div>
    </div>

    <!-- Jquery -->
    <script>

        // Toggle Folder
        $(document).ready(function(){
            $("#createFolder").click(function(){
                $("#showFolderForm").toggle(500);
            })
        });
        $(document).ready(function(){
            $("#uploadFile").click(function(){
                $("#showUploadFile").toggle(500);
            })

            $("buttonEditNameFileTwo").click(function(){
                $("showEditNameFileTwo").toggle(500);
            })
        });

    </script>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <!-- Jquery Validate Plugin  -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
</body>
</html> --}}
