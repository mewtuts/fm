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
        .error{
            color: red;
            padding-left: 5px;
        }
        .HomeContentBlur{
            opacity: 0.2;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="w-screen h-screen bg-slate-50">

        <!-- Home Content Section -->
        <div class="" id="HomeContent">
            <div class="w-full h-full absolute overflow-x-hidden">
                <header class="w-full bg-green-800 h-24 flex justify-center items-center py-2 mb-10">
                    <ul class="flex justify-between w-full text-white">
                        <li class="text-2xl flex justify-center items-center pl-5">
                            <img src="{{ asset ('image/tau.png') }}" alt="" class="relative h-20 w-24">
                            <p class="text-center text-3xl fl-sm:hidden">Tarlac Agricultural University</p>
                        </li>
                        <li class="flex justify-center items-center"><button class="text-xl bg-blue-600 px-12 py-3 hover:bg-blue-700 cursor-pointer rounded mr-10" id="buttonLogin">Login</button></li>
                    </ul>
                </header>
                {{-- Content (Files and Folders) --}}
                <div class="">
                    <b class="px-10 text-xl">National Budget Circular 542</b>
                    <p class="text-justify px-10 pt-5 text-lg">National Budget Circular 542, issued by the Department of Budget and Management on August 29, 2012, reiterates compliance with Section 93 of the General Appropriations Act of FY2012. Section 93 is the Transparency Seal provision, to wit: <br><br>

                        Sec. 93. Transparency Seal. To enhance transparency and enforce accountability, all national government agencies shall maintain a transparency seal on their official websites. The transparency seal shall contain the following information: (i) the agency’s mandates and functions, names of its officials with their position and designation, and contact information; (ii) annual reports, as required under National Budget Circular Nos. 507 and 507-A dated January 31, 2007 and June 12, 2007, respectively, for the last three (3) years; (iii) their respective approved budgets and corresponding targets immediately upon approval of this Act; (iv) major programs and projects categorized in accordance with the five key results areas under E.O. No. 43, s. 2011; (v) the program/projects beneficiaries as identified in the applicable special provisions; (vi) status of implementation and program/project evaluation and/or assessment reports; and (vii) annual procurement plan, contracts awarded and the name of contractors/suppliers/consultants. <br><br>

                        The respective heads of the agencies shall be responsible for ensuring compliance with this section. <br><br>

                        A Transparency Seal, prominently displayed on the main page of the website of a particular government agency, is a certificate that it has complied with the requirements of Section 93. This Seal links to a page within the agency’s website which contains an index of downloadable items of each of the above-mentioned documents.</p><br><br>
                    <b class="px-10 text-xl">Symbolism</b>
                    <p class="text-justify px-10 pt-5 text-lg">
                        A pearl buried inside a tightly-shut shell is practically worthless. Government information is a pearl, meant to be shared with the public in order to maximize its inherent value. <br> <br>

The Transparency Seal, depicted by a pearl shining out of an open shell, is a symbol of a policy shift towards openness in access to government information. On the one hand, it hopes to inspire Filipinos in the civil service to be more open to citizen engagement; on the other, to invite the Filipino citizenry to exercise their right to participate in governance. <br> <br>

This initiative is envisioned as a step in the right direction towards solidifying the position of the Philippines as the Pearl of the Orient – a shining example for democratic virtue in the region. <br> <br>
                    </p>
                    {{-- Files and Folders --}}
                    <div class="">
                        <div class="px-10 text-xl mb-10">
                            <b>Folder Name</b>
                            <div class="text-base ml-10 cursor-pointer flex items-center w-fit justify-center">
                                <i class="bi bi-dot text-3xl text-green-800"></i>
                                <p class="text-green-800 text-lg text-center">Attachment File</p>
                            </div>
                            <div class="text-base ml-10 cursor-pointer flex items-center w-fit justify-center">
                                <i class="bi bi-dot text-3xl text-green-800"></i>
                                <p class="text-green-800 text-lg text-center">Attachment File</p>
                            </div>
                            <div class="text-base ml-10 cursor-pointer flex items-center w-fit justify-center">
                                <i class="bi bi-dot text-3xl text-green-800"></i>
                                <p class="text-green-800 text-lg text-center">Attachment File</p>
                            </div>
                        </div>
                        <div class="px-10 text-xl mb-10">
                            <b>Folder Name Two</b>
                            <div class="text-base ml-10 cursor-pointer flex items-center w-fit justify-center">
                                <i class="bi bi-dot text-3xl text-green-800"></i>
                                <p class="text-green-800 text-lg text-center">Attachment File Two</p>
                            </div>
                            <div class="text-base ml-10 cursor-pointer flex items-center w-fit justify-center">
                                <i class="bi bi-dot text-3xl text-green-800"></i>
                                <p class="text-green-800 text-lg text-center">Attachment File Two</p>
                            </div>
                            <div class="text-base ml-10 cursor-pointer flex items-center w-fit justify-center">
                                <i class="bi bi-dot text-3xl text-green-800"></i>
                                <p class="text-green-800 text-lg text-center">Attachment File Two</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Footer Section --}}
                <div id="Footer" class=" bg-green-800 text-slate-50 py-5">
                    <footer class="flex items-center justify-around h-40 fl-md:h-fit fl-md:flex-col fl-md:w-full fl-md:justify-center ">
                        <div class="h-full fl-md:mb-7">
                            <p class="text-xl fl-md:text-center">About</p>
                            <div class="pl-2 mt-2 fl-md:pl-0">
                                <p>File Management contains folders and files.</p>
                            </div>
                        </div>
                        <div class="h-full fl-md:mb-7">
                            <p class="text-xl fl-md:text-center">Developer</p>
                            <div class=" pl-2 mt-2 fl-md:pl-0">
                                <div class="flex items-center"><img src="{{ asset ('image/jomar.jpg') }}" alt="" class="w-9 rounded-full h-9 border-2 border-zinc-600"><p class="ml-2">Jomar A. Macaraeg</p></div>
                                <div class="flex items-center mt-2"><img src="{{ asset ('image/nath.jpg') }}" alt="" class="w-9 rounded-full h-9 border-2 border-zinc-600"><p class="ml-2">Nathaniel DC. Teria</p></div>
                            </div>
                        </div>
                        <div class="h-full fl-md:mb-7">
                            <p class="text-xl fl-md:text-center">Email us</p>
                            <div class=" pl-2 mt-2 fl-md:pl-0">
                                <div class="flex items-center"><i class="bi bi-envelope text-xl"></i><p class="ml-2">jmmacaraeg@gmail.com</p></div>
                                <div class="flex items-center"><i class="bi bi-envelope text-xl"></i><p class="ml-2">nathanieldcteria@gmail.com</p></div>
                            </div>
                        </div>
                    </footer>
                    <div class="px-10"><div class="border-b mt-5 border-slate-50"></div></div>
                    {{-- Copyright Section --}}
                    <div class="flex justify-center items-center mt-5">
                        <i class="bi bi-c-circle"></i>
                        <p class="pl-2">File Management 2023™. All rights reserved.</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Login Section -->
        <div class="CloseLogin hidden" id="showLogin">
            <div class="absolute w-full h-full flex justify-center items-center">
                <div class="flex flex-col justify-center w-register-box rounded-xl shadow bg-slate-200">
                    <!-- Close Login -->
                    <div id="buttonCloseLogin" class="flex justify-end"><i class="bi bi-x-lg pt-2 px-4 text-2xl cursor-pointer text-zinc-700 hover:text-red-800"></i></div>
                    <p class="text-center text-4xl mb-4 mt-5 text-green-800">Login</p>
                    <form class="flex flex-col p-10" id="login_form" action="{{ route('login') }}" method="POST">@csrf


                            <!-- @if(isset($error))
                            <div class="flex flex-col border border-red-600 p-2">
                                <p class="text-red-600 p-auto">{{ $error }}</p>
                            </div>
                            @endif -->


                        <div class="flex flex-col w-full">
                            <label for="username" class="text-base text-zinc-800 px-1">Username</label>
                            <input type="text" id="username" name="username" placeholder="Username" class="shadow border rounded w-full py-3 px-3 text-gray-700 mt-1 focus:outline-green-900 bg-slate-50">
                            <!-- input here error message-->
                            <p class="p-1 text-red-600 hidden">Error message</p>
                            <!-- input here error message-->
                        </div>

                        <div class="flex flex-col pt-4">
                            <label for="password" class="text-base text-zinc-800 px-1">Password</label>
                            <input type="password" id="password" name="password" placeholder="Password" class="shadow border rounded w-full py-3 px-3 text-gray-700 mt-1 focus:outline-green-900 bg-slate-50">
                            <!-- input here error message-->
                            <p class="p-1 text-red-600 hidden">Error message</p>
                            <!-- input here error message-->
                        </div>

                        <div class="flex justify-between pt-4 fl-xsm:flex-col">
                            <div>
                                <input type="checkbox" class="bg-slate-50 outline-none pl-2 cursor-pointer" id="showPassword" onclick="passwordFunction()">
                                <label for="showPassword" class="text-zinc-800 cursor-pointer">Show Password</label>
                            </div>
                            <!-- <a href="" class="text-green-800 hover:underline hover:underline-green-900 fl-xsm:pt-2">Forgot Password</a> -->
                        </div>

                        <input type="submit" value="Log In" name="login" class=" rounded bg-green-800 text-slate-50 cursor-pointer text-xl hover:bg-green-900 p-3 mt-10">

                        <!-- <div class="text-center text-lg p-5">
                            <p>Don't have an account? <a href="{{ '/register' }}" class=" text-green-800 hover:underline hover:decoration-2 font-semibold">Register here.</a></p>
                        </div> -->
                    </form>
                </div>

            </div>
        </div>
    </div>
     <!-- Jquery -->
     <script>
        // Show Login
        $(document).ready(function(){
            $("#buttonLogin").click(function(){
                $("#showLogin").show();
            });

            // Blur the background
            $("#buttonLogin").click(function(){
                $("#HomeContent, #Footer").addClass("HomeContentBlur");
            });
        });

        // Close Login
        $(document).ready(function(){
            $("#buttonCloseLogin").click(function(){
                $(".CloseLogin").hide();
            });
            $("#buttonCloseLogin").click(function(){
                $("#HomeContent, #Footer").removeClass("HomeContentBlur");
            });
        });

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
