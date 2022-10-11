<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul }}</title>
    <link rel="icon" href="/assets/img/kalbe-milko-logo.svg">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


   </head>
   <body class="bg-slate-100 ">

      <div class="drawer mt-10">
         <input id="my-drawer" type="checkbox" class="drawer-toggle" />
         <div class="drawer-content">
            <div class="ml-10 mt-8">
               <div class="mb-5">
                  <p class="text-3xl font-bold ">{{$judul}}</p>
               </div>
               
            </div>
            @yield('content')
          </div> 
         <div class="drawer-side ">
           <label for="my-drawer" class="drawer-overlay"></label>
           <ul class="menu p-4 overflow-y-auto w-60 bg-gray-800 text-base-content">
             <!-- Sidebar content here -->
             <li>
               <a href="/admin/tracking/" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">
                  <span class="flex-1 ml-3 whitespace-nowrap">Tracking
                  </span>
                  <span><i class="fa fa-user font-white"></i></span>
               </a>
            </li>
             <li>
               <a href="/admin/tracking/fg" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">
                  <span class="flex-1 ml-3 whitespace-nowrap">Finish Good</span>
                  <span><i class="fa fa-user font-white"></i></span>
               </a>
            </li>
            <li>
               <a href="/admin/tracking/rm" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">
                  <span class="flex-1 ml-3 whitespace-nowrap">Raw Material</span>
                  <span><i class="fa fa-user font-white"></i></span>
               </a>
            </li>
            <li>
               <a href="/admin/tracking/pm" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">
                  <span class="flex-1 ml-3 whitespace-nowrap">Packaging Material</span>
                  <span><i class="fa fa-user font-white"></i></span>
               </a>
            </li>
            <li>
               <a href="/admin/report" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">                        
                  <span class="flex-1 ml-3 whitespace-nowrap">Report</span>
                  <span><i class="fa fa-book-open font-white"></i></span>
               </a>
            </li>
            <li>
               <a href="/administrator" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">                        
                  <span class="flex-1 ml-3 whitespace-nowrap">Administrator</span>
                  <span><i class="fa fa-lock font-white"></i></span>
               </a>
            </li>
            <li>
               <form action="/logout" method="POST">
                  @csrf
                  <button class="w-full flex item-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">                       
                     <span class="flex-1  whitespace-nowrap">
                        Logout 
                        <i class=" fa fa-sign-out fa-2xs"></i>
                     </span>
                  </button>
               </form>
            </li>
           </ul>
         </div>
       </div>
 
      </body>
   </html>