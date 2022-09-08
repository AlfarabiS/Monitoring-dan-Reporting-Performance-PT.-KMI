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
@include('layout.navbar1')
    <div class="container px-10 py-10 bg-slate-200 mx-auto mt-36"> 
        <div class="flex items-center justify-center ">
            <p class="text-3xl font-bold">
                00:00:00
            </p>
        </div>
        <div class="flex items-center justify-center mt-5">
            <form class="" action="#">
                <div class="mx-auto mb-3">
                    <label class=" font-semibold" for="proses">Proses</label>
                    <select name="proses" id="id_proses">
                        <option value="proses1">proses1</option>
                        <option value="proses2">proses2</option>
                        <option value="proses3">proses3</option>
                        <option value="proses4">proses4</option>
                    </select>
                </div>
                <div class="flex items-center justify-center">
                    <a href="/checkout">
                        <button type="submit" class="w-40 text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105 transition"> 
                        <a href="/checkout">
                            Check In
                        </a>
                        </button>
                    </a>                        
                </div> 
            </form>
        </div>
    </div>

</body>
</html>