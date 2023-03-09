<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="author" content="David Grzyb">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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
<body class="bg-white font-family-karla h-screen">

    <div class="w-full flex flex-wrap">
        <!-- Login Section -->
        <div class="w-full lg:w-1/2 flex flex-col">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-12">
                <!-- <img class="w-14" src="https://th.bing.com/th/id/R.a2e5ca9ec6da8cb1ec1f1a47ee7105be?rik=MNQeIn1LXlRzqg&riu=http%3a%2f%2ffiles.softicons.com%2fdownload%2fculture-icons%2fsharingan-icons-1.5-by-harenome-razanajato%2fpng%2f512x512%2fkakashi.png&ehk=NCoOIVMXKMEcU6vp6WE8wX92zqNDrIEPKVSwc9dIzaA%3d&risl=&pid=ImgRaw&r=0" alt="icon"> -->
            </div>

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl mb-4">Welcome.</p>
                <form class="flex flex-col" action="{{ route('login') }}" method="POST">@csrf
                    
                    
                        @if(isset($error))
                        <div class="flex flex-col border border-red-600 p-2">
                            <p class="text-red-600 p-auto">{{ $error }}</p>
                        </div>
                        @endif


                    <div class="flex flex-col pt-4">
                        <label for="username" class="text-lg">Username</label>
                        <input type="text" id="username" name="username" placeholder="your username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
    
                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
    
                    <input type="submit" value="Log In" name="login" class=" rounded bg-black text-white cursor-pointer font-bold text-lg hover:bg-red-600 p-2 mt-8">
                </form>
                <div class="text-center pt-12 pb-12">
                    <p>Don't have an account? <a href="{{ '/register' }}" class=" hover:underline hover:decoration-4 font-semibold">Register here.</a></p>
                </div>
            </div>

        </div>

        <!-- Image Section -->
        <div class="flex flex-col w-1/2 shadow-2xl">
            <img class="h-screen hidden lg:block" src="https://ih1.redbubble.net/image.896639176.9105/raf,750x1000,075,t,101010:01c5ca27c6.jpg" alt="Background" />
        </div>
    </div>

</body>
</html>