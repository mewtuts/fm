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
                <div class="mt-5">
                    <!-- Template Title -->
                    <span class="text-xl font-bold text-zinc-700">Template Title</span>
                    <!-- Template Description -->
                    <div class="mt-5">
                        <p class="w-full text-justify"><span class="mr-10"></span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum rutrum quis lectus ac luctus. Fusce vitae lacus pellentesque, scelerisque dolor id, tincidunt felis. Aenean lacinia, ligula et pharetra pulvinar, sem arcu volutpat sem, a gravida justo ipsum id orci. Cras ut lacus pharetra, dapibus orci et, ornare mi. Nam lobortis quam ac tellus feugiat, a tincidunt nisi ornare. Etiam ultricies, justo in cursus rhoncus, arcu est faucibus odio, eu imperdiet nisi justo ut massa. Suspendisse mattis tellus at risus fringilla, vitae viverra felis semper. Proin egestas ornare nibh, eu dignissim lorem luctus et. Sed pellentesque velit at metus dignissim lobortis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas viverra efficitur risus non dignissim. Sed dui risus, aliquam eu porttitor eu, lobortis sed sem. In euismod orci ligula, sit amet condimentum arcu 
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