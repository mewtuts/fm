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
                    <!-- Update -->
                    <label for="update"><i class="bi bi-pencil-fill w-full text-zinc-600 mr-2 cursor-pointer text-2xl hover:text-3xl"></i></label>
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
        });

    </script>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    <!-- Jquery Validate Plugin  -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
</body>
</html>
