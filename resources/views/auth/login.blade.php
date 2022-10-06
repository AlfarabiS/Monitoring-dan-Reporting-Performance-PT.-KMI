<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$judul}}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="assets/css/login.css">

</head>
<body>



<div class="container h-screen ">
    
    <div class="flex justify-center ">        
        <div class="bg-white shadow-md border border-gray-200 rounded-xl     max-w-sm p-4 sm:p-6 lg:p-8 dark:bg-gray-800 mt-24 dark:border-gray-700 flex justify-center items-center hover:shadow-xl transition" >
            <form class="space-y-6" action="/login" method="POST">
                @csrf
                <img src="assets/img/kalbe-milko-logo.svg" alt="kalbe-milko">
                <div>
                    <label for="NIK" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">NIK</label>
                    <input type="text" name="NIK"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="NIK" required="">
                </div>
                    <div>
                        <label for="password" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                    </div>
                        <div class="flex items-center justify-center">
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button> 
                        </div>   
            </form>
        </div>
    </div>

</div>

</body>
</html>