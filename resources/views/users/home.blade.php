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
    </style>
</head>
<body>
    {{-- @if (Session::exists('username'))
        {{ Session::get('username') }}
        <p>Name does exist</p>
    @else
        <p>Name does not exist</p>
    @endif --}}
<div><!-- PARENT CONTAINER -->
    <div class="text-lg"> <!-- NAVIGATION CONTAINER -->
        <div class="grid place-items-center p-3 bg-black">
            <img class="w-14" src="https://i.pinimg.com/originals/cf/08/5d/cf085de99662fc50d8bc78adb47cc596.gif" alt="icon">
        </div>
        <nav class="bg-black text-red-600 border border-y-2 border-red-600">
            <ul class="grid grid-cols-2 p-2">
                <li>Welcome Username</li>
                <li class="text-right underline"><a href="#">Logout</a></li>
            </ul>
        </nav>
    </div><!-- END NAVIGATION CONTAINER -->



    <div class=""><!-- CONTENT CONTAINER -->
        <main class="grid grid-cols-3 h-screen max-h-screen">
            <div class="col-span-3 p-2 border-r-2 border-red-600 text-red-600 h-full bg-black md:col-span-1"> <!-- MENU CONTAINER -->
                
                <ul class="border bg-white border-red-600 p-2 max-h-screen overflow-auto font-semibold">
                    <li>
                        <div class="flex justify-start gap-x-1 font-semibold"> 
                            <!--RIGHT ARROW ICON-->
                            <span><a href="#dropdown" id="dropdown"><img class="w-8 p-2" src="https://cdn-icons-png.flaticon.com/512/626/626053.png" alt="right-arrow"></a></span> 
                            <!--END RIGHT ARROW ICON-->
                            <!--DOWN ARROW ICON-->
                            {{-- <span><img class="w-9 pl-4" src="https://cdn-icons-png.flaticon.com/512/6364/6364586.png" alt="down-arrow"></span> --}} 
                            <!--END DOWN ARROW ICON-->
                            <span><img class="w-8" src="https://cdn-icons-png.flaticon.com/512/7903/7903760.png" alt="Parent"></span>
                            <a class="p-1" href="#">Parent Folder</a>   
                        </div>

                        <!--Sub folder & files-->
                        <div id='subff'>
                            <ul>
                                <li>
                                    <div class="flex justify-start gap-x-1 font-semibold max-h-screen overflow-auto">
                                        <!--RIGHT ARROW ICON-->
                                        <span><img class="w-8 p-2" src="https://cdn-icons-png.flaticon.com/512/626/626053.png"   alt="right-arrow"></span> 
                                        <!--END RIGHT ARROW ICON-->
                                        <!--DOWN ARROW ICON-->
                                        {{-- <span><img class="w-9 pl-4" src="https://cdn-icons-png.flaticon.com/512/6364/6364586.png   alt="down-arrow"></span> --}} 
                                        <!--END DOWN ARROW ICON-->
                                        <span><img class="w-8" src="https://cdn-icons-png.flaticon.com/512/7903/7903761.png" alt="Sub"> </span>
                                        <p>Sub Folder</p>
                                    </div>   
                                </li>
                            </ul>
                        </div><!--End Sub folder & files-->

                    </li>
                </ul>

            </div><!-- END MENU CONTAINER -->




            <div class="col-span-3 p-8 text-white underline font-semibold bg-gradient-to-r from-black to-red-600 md:col-span-2 lg:col-span2"> <!-- SHOW CONTAINER -->
                <ul>
                    <li class="hover:text-yellow-100 focus:text-yellow-300">file.txt</li>
                    <li class="hover:text-yellow-100 focus:text-yellow-300">file.png</li>
                    <li class="hover:text-yellow-100 focus:text-yellow-300">file.pdf</li>
                </ul>
            </div><!-- END SHOW CONTAINER -->
        </main>
    </div><!-- END CONTENT CONTAINER -->
    <div class="bg-black bg-no-repeat bg-center  border-t-2 border-red-600" style="background-image: url(https://i.pinimg.com/originals/de/d9/37/ded937b4fc8be02405d98a118dcf25ed.gif)"><!-- FOOTER CONTAINER -->
        <footer class="h-40 text-right text-red-600 pr-4 pt-10 underline">
            <ul>
                <li>Facebook @Jo-mar A. Macaraeg</li>
                <li>Instagram @JoAsuMa</li>
                <li>Tiktok @jomjom</li>
            </ul>
        </footer>
    </div><!-- END FOOTER CONTAINER -->
</div><!-- END PARENT CONTAINER -->
</body>
</html>

<script>
$(document).ready(function() {
    $("#dropdown").click(function() {
        $("#subff").fadeToggle(1000);
    });
});
</script>