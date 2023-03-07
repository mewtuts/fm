<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    @vite('resources/css/app.css')
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>
</head>
<body class="bg-whitefont-family-karla h-screen">

    <div class="w-full flex flex-wrap">

        <!-- Register Section -->
        <div class="w-full lg:w-1/2 flex flex-col">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-12">
                <img class="w-14" src="https://th.bing.com/th/id/R.a2e5ca9ec6da8cb1ec1f1a47ee7105be?rik=MNQeIn1LXlRzqg&riu=http%3a%2f%2ffiles.softicons.com%2fdownload%2fculture-icons%2fsharingan-icons-1.5-by-harenome-razanajato%2fpng%2f512x512%2fkakashi.png&ehk=NCoOIVMXKMEcU6vp6WE8wX92zqNDrIEPKVSwc9dIzaA%3d&risl=&pid=ImgRaw&r=0" alt="icon">
            </div>

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">Join Us.</p>

                <form class="flex flex-col pt-3 md:pt-8" action="{{ route('register') }}" method="POST">@csrf
                    
                    @if ($errors->any())
                    <div class="flex flex-col pt-4 border-2 border-red-600 text-red-600 p-2 md:hiden lg:hidden xl:hidden">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li class="py-2 px-3 text-lg">{{ $error }}</li>
                    @endforeach
                    </ul>
                    </div>
                    @endif
                    
                    <div class="flex flex-col pt-4">
                        <label for="id_number" class="text-lg">ID number</label>
                        <input type="text" id="id_number" name="id_number" placeholder="your school ID number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
                    
                    <div class="flex flex-col pt-4">
                        <label for="first_name" class="text-lg">First name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="your first name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="middle_name" class="text-lg">Middle name</label>
                        <input type="text" id="middle_name" name="middle_name" placeholder="your middle name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="last_name" class="text-lg">Last name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="your last name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="username" class="text-lg">Username</label>
                        <input type="text" id="username" placeholder="your username" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="email" class="text-lg">Email</label>
                        <input type="email" id="email" placeholder="your@email.com" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
    
                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>
    
                    <input type="submit" value="Register" name="register" class="bg-black text-white font-bold text-lg hover:bg-red-600 p-2 mt-8 rounded cursor-pointer"/>
                </form>
                <div class="text-center pt-12 pb-12">
                    @if(Session::has('message'))
                        <p class="text-green-500">{{Session::get('message')}}<a class='underline font-semibold text-blue-600' href="{{ '/' }}">here </a>to login</p>
                    @else
                    <p>Already have an account? <a href="{{ '/' }}" class="hover:underline font-semibold">Log in here.</a></p>
                    @endif
                </div>
            </div>

        </div>

        <!-- Image Section -->
        <div class="bg-white w-1/2 text-red-600 shadow-2xl bg-no-repeat bg-center hidden px-3 lg:block" style="background-image: url(https://wallpaperaccess.com/full/2932938.jpg)">
            @if ($errors->any())
            <div class="p-8 m-20 mt-64 bg-white border border-red-600 opacity-90 text-center">
            <ul>
            @foreach ($errors->all() as $error)
                <li class="py-2 px-3 text-lg">{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif
            {{-- <img class="h-screen w-screen hidden lg:block" src="https://s-media-cache-ak0.pinimg.com/736x/0a/a8/ab/0aa8ab40d84ccdb008f8a2de26946851.jpg" alt="Background" /> --}}
        </div>
    </div>

</body>
</html>