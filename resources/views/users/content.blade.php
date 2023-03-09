<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>@yield('directories') Directories Page</title>
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <style>
        #subff{
            display: none;
            /* visibility: hidden; */
        }
        /* Hide and Show the content of the Main Folder */
        /* #ul */
        .caret{
            cursor: pointer;
            user-select: none;
        }
        .caret::before{
            content: '\25B6';
            display: inline;
            margin-right: 5px;
        }
        .nested{
            display: none;
        }
        .active{
            display: block;
        }
        .caret-down::before{
            transform: rotate(90deg);
        }
        #show_addForm{
            display: none;
        }
    </style>
</head>
<body class=" h-screen bg-gradient-to-r from-black to-red-600">
    <div class="text-lg"> <!-- NAVIGATION CONTAINER -->
        <div class="p-3 flex justify-between">
            <a title="Home" href="{{ route('templates') }}"><img class="w-14" src="https://i.pinimg.com/originals/cf/08/5d/cf085de99662fc50d8bc78adb47cc596.gif" alt="icon"></a>
        </div>
    </div><!-- END NAVIGATION CONTAINER -->

    <!-- CONTENT CONTAINER -->
    <div class="max-h-full h-fit">
    <span class="text-white text-xl p-2">{{ $templates->name }} Folder</span>
        <main class="grid grid-cols-3 mt-3 border-t-2 border-t-red-700">
            <!-- MENU CONTAINER -->
            <div class="col-span-3 p-2 border-r-2 border-red-700 shadow-inner overflow-auto text-red-600 h-full md:col-span-1"> 
                <div class="text-white p-2">

                    <ul id="ul" class="w-full">
                        <li class=""><span class="caret text-xl">{{ $templates->name }}</span>
                            <span id="addFolder" title="New Folder" class="cursor-pointer ml-2 px-2 py-1 bg-white text-red-600 rounded text-sm"><i class="bi bi-folder-plus"></i></span>
                            <span id="show_addForm" class="remove_form">
                                <form action="{{ '/users/content/'.$templates->id.'/'.$templates->name.'/mkdir' }}" method="POST" class="absolute mt-3 bg-slate-200 p-2 rounded">@csrf
                                    <input class="text-black" type="text" name="name_folder" class="mt-3 rounded" required>
                                    <div class="flex justify-between mt-2">
                                        <input type="submit" class="w-full cursor-pointer text-sm p-1 bg-blue-800 rounded">
                                    </div>
                                </form>
                                <div id="cancel_addForm" class="absolute text-red-900 mt-2 w-full cursor-pointer"><i class="bi bi-x"></i></div>
                            </span>
                           
                            <!-- File Upload -->
                            <label class="cursor-pointer px-2 py-1 bg-white text-red-600 rounded text-sm" for="upload-file"><i class="bi bi-file-earmark"></i></label>
                            <form id="addFileForm" action="{{ '/users/content/file/upload/'.$content_id }}" method="POST" class="border-2 hidden" enctype="multipart/form-data">@csrf
                                <input type="file" id="upload-file" name="file">
                                <input type="submit" name="file_upload">
                            </form>

                            <ul class="nested pl-5">
                            
                                @foreach ($contents as $content)

                                @if($content->parent_id == null)

                                    @elseif($content->count() >= 0)
                                        <li class="">
                                            <span class="caret text-xl">{{ $content->caption }}</span>

                                            <span id="addFolder" title="New Folder" class="cursor-pointer ml-2 px-2 py-1 bg-white text-red-600 rounded text-sm"><i class="bi bi-folder-plus"></i></span>

                                            <span id="show_addForm" class="remove_form">
                                                <form action="{{ '/users/content/'.$templates->id.'/'.$templates->name.'/mkdir' }}" method="POST" class="absolute mt-3 bg-slate-200 p-2 rounded">@csrf
                                                    <input class="text-black" type="text" name="name_folder" class="mt-3 rounded" required>
                                                    <div class="flex justify-between mt-2">
                                                        <input type="submit" class="w-full cursor-pointer text-sm p-1 bg-blue-800 rounded">
                                                    </div>
                                                </form>
                                                
                                                <div id="cancel_addForm" class="absolute text-red-900 mt-2 w-full cursor-pointer"><i class="bi bi-x"></i></div>
                                            </span>
            
                                            <label class="cursor-pointer px-2 py-1 bg-white text-red-600 rounded text-sm" for="upload-file"><i class="bi bi-file-earmark"></i>
                                            </label>

                                            <form action="{{ 'users/content/file/upload/'.$content->id }}" class="border-2 hidden">
                                                <input type="file" id="upload-file" name="upload-file">
                                            </form>
                                    @else  
                                @endif
                            @endforeach
                        </ul>
                    </li>
                            <!-- Folder Upload -->
                        
                            
                            {{-- <ul class="nested pl-5">
                                <li class="">Item 1</li>
                                <li>Item 2</li>
                          
                                    <li><span class="caret"> item-3</span>
                                        <ul class="nested pl-5">
                                            <li>Item 3.1</li>
                                            <li>Item 3.1</li>
                                            <li>Item 3.1</li>
                                        </ul>
                                    </li>
                           
                            </ul> --}}
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END MENU CONTAINER -->

            <div class="col-span-3 p-4 text-xl text-white font-semibold md:col-span-2 lg:col-span2">
                @yield('content')
            </div>

        </main>
    </div>
    <!-- END CONTENT CONTAINER -->

    <!-- <div class="bg-black bg-no-repeat bg-center h-96 border-t-2 border-red-600" style="background-image: url(https://i.pinimg.com/originals/de/d9/37/ded937b4fc8be02405d98a118dcf25ed.gif)">
        <footer class="h-40 text-red-600 text-center pr-4 pt-72 underline">    
    </div> -->

    <!-- JAVASCRIPT -->
    <script>
        $(document).ready(function() {
            $("#addFolder").click(function() {
                $("#show_addForm").fadeToggle();
            });
        });
        $(document).ready(function() {
            $("#cancel_addForm").click(function() {
                $(".remove_form").hide();
            });
        });
        //  Hide and show content of the Main Folder
        var toggler = document.getElementsByClassName("caret");
        for (var i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function(){
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
        // Append Ul

        // Append li
        
        document.getElementById("upload-file").onchange = function() {
        document.getElementById("addFileForm").submit();
        };
    </script>
</body>
</html>
