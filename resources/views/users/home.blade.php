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
        }
    </style>
</head>
<body class="bg-black font-mono sm:2xl md:text-3xl lg:4xl xl:5xl">
    
    <div> <!-- NAVIGATION CONTAINER -->
        <div class="grid place-items-center p-3 bg-black">
            <img class="w-14" src="https://i.pinimg.com/originals/cf/08/5d/cf085de99662fc50d8bc78adb47cc596.gif" alt="icon">
        </div>
        <nav class="bg-black text-red-600 border-y-2 border-red-600">
            <ul class="grid grid-cols-2 p-2">
                <li>Welcome Username</li>
                <li class="text-right underline"><a href="#">Logout</a></li>
            </ul>
        </nav>
    </div><!-- END NAVIGATION CONTAINER -->

    <div class="border-y-2 border-red-600 text-red-600 p-2 my-2"> <!-- MENU CONTAINER -->
        <form class="bg-red-600 text-black p-2 grid grid-cols-2 gap-4" action="#" method="POST">@csrf
            <input class="bg-gray-100 text-black text-center lg:p-6" type="name" placeholder="Template Name" name="name" required>
            <input class="bg-black text-red-600" type="submit" name="submit" value="Create Template" required>
        </form>
    </div>
   
    <div class="p-10 text-white underline font-semibold max-h-screen h-screen overflow-auto bg-cover bg-no-repeat sm:border-y-2 border-red-600 lg:m-12 border-2" style="background-image: url(https://media1.tenor.com/images/7ee68785e912300b89900a6243419f3b/tenor.gif?itemid=16101554)"> <!-- SHOW CONTAINER -->
        <ul class="grid grid-cols-1 p-16 text-center lg:grid-cols-4 gap-4">
            <li class="bg-gradient-to-r from-black to-red-600 border-2 border-red-600 mb-2"><a class="" href="#"><img class="md:w-screen" src="https://cdn-icons-png.flaticon.com/512/9218/9218289.png" alt="Folder Icon">Title</a>
            </li>
            <li class="bg-gradient-to-r from-black to-red-600 border-2 border-red-600 mb-2"><a class="" href="#"><img class="md:w-screen" src="https://cdn-icons-png.flaticon.com/512/9218/9218289.png" alt="Folder Icon">Title</a>
            </li>
            <li class="bg-gradient-to-r from-black to-red-600 border-2 border-red-600 mb-2"><a class="" href="#"><img class="md:w-screen" src="https://cdn-icons-png.flaticon.com/512/9218/9218289.png" alt="Folder Icon">Title</a>
            </li>         
            </li>
            <li class="bg-gradient-to-r from-black to-red-600 border-2 border-red-600 mb-2"><a class="" href="#"><img class="md:w-screen" src="https://cdn-icons-png.flaticon.com/512/9218/9218289.png" alt="Folder Icon">Title</a>
            </li>         
            </li>
            <li class="bg-gradient-to-r from-black to-red-600 border-2 border-red-600 mb-2"><a class="" href="#"><img class="md:w-screen" src="https://cdn-icons-png.flaticon.com/512/9218/9218289.png" alt="Folder Icon">Title</a>
            </li>         
            </li>
            <li class="bg-gradient-to-r from-black to-red-600 border-2 border-red-600 mb-2"><a class="" href="#"><img class="md:w-screen" src="https://cdn-icons-png.flaticon.com/512/9218/9218289.png" alt="Folder Icon">Title</a>
            </li>         
            </li>
            <li class="bg-gradient-to-r from-black to-red-600 border-2 border-red-600 mb-2"><a class="" href="#"><img class="md:w-screen" src="https://cdn-icons-png.flaticon.com/512/9218/9218289.png" alt="Folder Icon">Title</a>
            </li>         
            </li>
            <li class="bg-gradient-to-r from-black to-red-600 border-2 border-red-600 mb-2"><a class="" href="#"><img class="md:w-screen" src="https://cdn-icons-png.flaticon.com/512/9218/9218289.png" alt="Folder Icon">Title</a>
            </li>         
        </ul> 
    </div>
</body>
</html>

<script>
$(document).ready(function() {
    $("#dropdown").click(function() {
        $("#subff").fadeToggle(1000);
    });
});
</script>