<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul }}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


   </head>
   <body class="bg-slate-100 ">

      {{-- <div class="w-full grid grid-cols-10 h-full">
         
         <aside class="w-64 h-full mt-10 bg-side-nav col-span-2 block md:block lg:block" aria-label="Sidebar">
            <div class="overflow-y-auto h-full py-4 px-3 bg-gray-800 dark:bg-gray-800">
               <ul class="space-y-2 "> 
                  <li>
                     <a href="/tracking/fg" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">Tracking FG</span>
                        <span><i class="fa fa-user font-white"></i></span>
                     </a>
                  </li>
                  <li>
                     <a href="/tracking/rm" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">Tracking RM</span>
                        <span><i class="fa fa-user font-white"></i></span>
                     </a>
                  </li>
                  <li>
                     <a href="/tracking/pm" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">Tracking PM</span>
                        <span><i class="fa fa-user font-white"></i></span>
                     </a>
                  </li>
                  <li>
                     <a href="/tracking/" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">
                        <span class="flex-1 ml-3 whitespace-nowrap">Tracking
                        </span>
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
         </aside>
   
   
   
         <div class="w-full h-full  px-5  bg-slate-100  mt-14 col-span-8 relative ">
            <div class="grid grid-cols-2 ">
               <div class="mb-10">
                  <p class="text-3xl font-bold ">{{$judul}}</p>
               </div>
               
            </div>
            <div class="w-full mx-auto bg-slate-200">
               @yield('content')
            </div>
         </div>   
      </div> --}}

      <div class="drawer drawer-mobile mt-10">
         <input id="my-drawer" type="checkbox" class="drawer-toggle" />
         <div class="drawer-content ">
               <div class=" grid grid-cols-7 mb-6 mt-5 ml-10">
                  <div class="">
                     <p class="text-3xl font-bold ">{{$judul}}</p>
                  </div>
                  <div>
                     <span class="bg-green-400 h-10 w-10 px-auto mx-auto rounded-full hover:rotate-45 transition">
                        <a href="/administrator/user/edit">
                            <i class="mx-auto my-3 fa fa-pencil"></i>
                        </a>
                      </span>
                  </div>
               </div>   
            @yield('content')
          </div> 
         <div class="drawer-side ">
           <label for="my-drawer" class="drawer-overlay"></label>
           <ul class="menu p-4 overflow-y-auto w-60 bg-gray-800 text-base-content">
             <!-- Sidebar content here -->
             <li>
               <a href="/administrator/user" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">
                  <span class="flex-1 ml-3 whitespace-nowrap">User</span>
                  <span><i class="fa fa-user font-white"></i></span>
               </a>
            </li>
            <li>
               <a href="/administrator/proses" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">
                  <span class="flex-1 ml-3 whitespace-nowrap">proses</span>
                  <span><i class="fa fa-user font-white"></i></span>
               </a>
            </li>
            <li>
               <a href="/dashboard" class="flex items-center p-2 text-base font-normal  rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">
                  <span class="flex-1 ml-3 whitespace-nowrap">Dashboard</span>
                  <span><i class="fa-solid fa-chart-line"></i></span>
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