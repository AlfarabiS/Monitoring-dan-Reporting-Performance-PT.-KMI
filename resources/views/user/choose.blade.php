@extends('layout.user_layout')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-slate-100">
@include('layout.user_navbar')
    <div class="container px-10 py-10 bg-slate-200 mx-auto mt-36"> 
        <div class="flex items-center justify-center ">
            <form action="/user/fg">
                @csrf
                <input type="hidden" name="gudang" value="gudang_id">
                <div class="flex items-center justify-center">
                    <button type="submit" class="w-40 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105 transition-transform">
                            Finish Good
                        </button>
                    </div> 
            </form>
        </div>
        <div class="container px-10  bg-slate-200 mx-auto mt-5"> 
    
            <form action="/user/rm">
            @csrf
                <input type="hidden" name="gudang" value="gudang_id">
                <div class="flex items-center justify-center">
                        <button type="submit" class="w-40 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105 transition-transform">
                            Raw Material
                        </button>
                </div> 
            </form>
        </div>
        <div class="container px-10  bg-slate-200 mx-auto mt-5"> 
    
            <form action="/user/pm">
                @csrf
                <input type="hidden" name="gudang" value="gudang_id">
                <div class="flex items-center justify-center">
                        <button type="submit" class="w-40 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105 transition-transform">
                            Packaging Material
                        </button>
                </div> 
            </form>
        </div>
    </div>

</body>
</html>