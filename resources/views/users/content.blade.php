<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Home Page</title>
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
    </style>
</head>
<body class="bg-gradient-to-r from-black to-red-600">
    <div class="text-lg"> <!-- NAVIGATION CONTAINER -->
        <div class="grid place-items-center p-3 bg-black">
            <a href="{{ route('templates') }}"><img class="w-14" src="https://i.pinimg.com/originals/cf/08/5d/cf085de99662fc50d8bc78adb47cc596.gif" alt="icon"></a>
        </div>
        <nav class="bg-black text-red-600 border border-y-2 border-red-600">
            <ul class="grid grid-cols-3 p-2">
                <li>Welcome {{ Session::get('username') }}</li>
                <li class="text-center underline font-bold">{{ $contents->name }}</li>
                <li class="text-right underline"><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </nav>
    </div><!-- END NAVIGATION CONTAINER -->

    <!-- CONTENT CONTAINER -->
    <div class="">
        <main class="grid grid-cols-3 h-96 max-h-screen">
            <!-- MENU CONTAINER -->
            <div class="col-span-3 p-2 border-r-2 border-red-600 overflow-auto text-red-600 h-full bg-black md:col-span-1"> 
                <div class="text-white">
                    <ul id="ul" class="w-full border-b">
                        <li class=""><span class="caret">Item</span>
                            <span class="cursor-pointer"><i class="bi bi-folder-plus"></i></span>
                            <span class="cursor-pointer"><i class="bi bi-file-earmark-plus"></i></span>
                            <ul class="nested pl-5">
                                <li class="border-b">Item 1</li>
                                <li>Item 2</li>
                                <li><span class="caret">Item 3</span>
                                    <ul class="nested pl-5">
                                        <li>Item 3.1</li>
                                        <li>Item 3.1</li>
                                        <li>Item 3.1</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END MENU CONTAINER -->

            <div class="col-span-3 p-8 text-white underline font-semibold bg-gradient-to-r from-black to-red-600 md:col-span-2 lg:col-span2"> <!-- SHOW CONTAINER -->
                <ul>
                    <li class="hover:text-yellow-100 focus:text-yellow-300">file.txt</li>
                    <li class="hover:text-yellow-100 focus:text-yellow-300">file.png</li>
                    <li class="hover:text-yellow-100 focus:text-yellow-300">file.pdf</li>
                </ul>
            </div><!-- END SHOW CONTAINER -->
        </main>
    </div><!-- END CONTENT CONTAINER -->
    <div class="bg-black bg-no-repeat bg-center h-96 border-t-2 border-red-600" style="background-image: url(https://i.pinimg.com/originals/de/d9/37/ded937b4fc8be02405d98a118dcf25ed.gif)"><!-- FOOTER CONTAINER -->
        <footer class="h-40 text-red-600 text-center pr-4 pt-72 underline">    
    </div><!-- END FOOTER CONTAINER -->

    <!-- JAVASCRIPT -->
    <script>
        $(document).ready(function() {
            $("#dropdown").click(function() {
                $("#subff").fadeToggle(1000);
            });
        });

        //  Hide and show content of the Main Folder
        var toggler = document.getElementsByClassName("caret");
        for (var i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function(){
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });

        // Append Ul

        // Append li
            
        }
    </script>
</body>
</html>
