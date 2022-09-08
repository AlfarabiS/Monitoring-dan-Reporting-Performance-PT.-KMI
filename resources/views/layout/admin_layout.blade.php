<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $user }}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


   </head>
   <body class="bg-slate-100 ">

      <div class="grid grid-cols-10 h-full">
         
         <aside class="w-64 h-full mt-14   col-span-2" aria-label="Sidebar">
            <div class="overflow-y-auto h-full py-4 px-3 bg-gray-800 dark:bg-gray-800">
               <ul class="space-y-2 "> 
                  <li>
                     <a href="/tracking" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">Tracking</span>
                        <span><i class="fa fa-user font-white"></i></span>
                     </a>
                  </li>
                  <li>
                     <a href="/report" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">                        
                        <span class="flex-1 ml-3 whitespace-nowrap">Report</span>
                        <span><i class="fa fa-book-open font-white"></i></span>
                     </a>
                  </li>
                  <li>
                     <a href="#" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">
                        
                        <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                     </a>
                  </li>
                  
               </ul>
            </div>
         </aside>
   
   
   
         <div class="w-full h-full px-10 py-10 bg-slate-100 mx-10 mt-14 col-span-7 relative ">
            <div class="grid grid-cols-2 ">
               <div class="mb-10">
                  <p class="text-3xl font-bold ">{{$judul}}</p>
               </div>
               
            </div>
            <div class="w-full mx-auto bg-slate-200">
               @yield('content')
            </div>
         </div>   
      </div>
  
   </body>
   </html>