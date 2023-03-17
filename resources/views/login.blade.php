<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="author" content="David Grzyb">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <meta name="description" content="">
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <!-- TAILWINDCSS -->
    @vite('resources/css/app.css')
    <!-- Inline CSS -->
    <style> 
        /* body{
            background-image: url(" {{ url('image/wave.svg') }} " );
        } */
        .error{
            color: red;
            padding-left: 5px;
        }
    </style>
</head>
<body>
  
    <div class="w-screen h-screen bg-slate-50">
        <!-- Login Section -->
        <div class="w-full h-full flex justify-center items-center">
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 w-register-box rounded-xl shadow-xl bg-slate-200">
                <p class="text-center text-4xl mb-4 mt-10 text-green-800">Login</p>
                <form class="flex flex-col p-10" id="login_form" action="{{ route('login') }}" method="POST">@csrf
                    
                    
                        <!-- @if(isset($error))
                        <div class="flex flex-col border border-red-600 p-2">
                            <p class="text-red-600 p-auto">{{ $error }}</p>
                        </div>
                        @endif -->


                    <div class="flex flex-col w-full">
                        <label for="username" class="text-base text-zinc-800 px-1">Username</label>
                        <input type="text" id="username" name="username" placeholder="your username" class="shadow border rounded w-full py-3 px-3 text-gray-700 mt-1 focus:outline-green-900 bg-slate-50">
                    </div>
    
                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-base text-zinc-800 px-1">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="shadow border rounded w-full py-3 px-3 text-gray-700 mt-1 focus:outline-green-900 bg-slate-50">
                    </div>
                    
                    <div class="flex justify-between pt-4 fl-xsm:flex-col">
                        <div>
                            <input type="checkbox" class="bg-slate-50 outline-none pl-2 cursor-pointer" id="showPassword" onclick="passwordFunction()">
                            <label for="showPassword" class="text-zinc-800 cursor-pointer">Show Password</label>
                        </div>
                        <a href="" class="text-green-800 hover:underline hover:underline-green-900 fl-xsm:pt-2">Forgot Password</a>
                    </div>
    
                    <input type="submit" value="Log In" name="login" class=" rounded bg-green-800 text-slate-50 cursor-pointer text-xl hover:bg-green-900 p-3 mt-10">

                    <div class="text-center text-lg p-5">
                        <p>Don't have an account? <a href="{{ '/register' }}" class=" text-green-800 hover:underline hover:decoration-2 font-semibold">Register here.</a></p>
                    </div>
                </form>
            </div>

        </div>
    </div>
    
     <!-- Jquery -->
     <script>
        // Form Validation
        $(document).ready(function(){
            $("#login_form").validate({
                errorClass: "error fail-alert",
                validClass: "valid success-alert",
                rules : {
                   username : {
                        required: true,
                   } ,
                   password : {
                        required: true,
                   } 
                },
                messages : {
                   username : {
                        required: "Please enter your username",
                   } ,
                   password : {
                        required: "Please enter your password",
                   }
                }
            });
        });

        // Hide and Show Password
        function passwordFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
</body>
</html>