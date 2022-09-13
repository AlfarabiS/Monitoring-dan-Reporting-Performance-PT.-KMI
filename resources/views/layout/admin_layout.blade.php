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

      <div class="grid grid-cols-10 h-full">
         
         {{-- <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

            <ul class="list-reset flex flex-col">
                <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                    <a href="index.html"
                       class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-tachometer-alt float-left mx-2"></i>
                        Dashboard
                        <span><i class="fas fa-angle-right float-right"></i></span>
                    </a>
                </li>
                <li class="w-full h-full py-3 px-2 border-b border-light-border">
                    <a href="forms.html"
                       class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fab fa-wpforms float-left mx-2"></i>
                        Forms
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>
                <li class="w-full h-full py-3 px-2 border-b border-light-border">
                    <a href="buttons.html"
                       class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-grip-horizontal float-left mx-2"></i>
                        Buttons
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>
                <li class="w-full h-full py-3 px-2 border-b border-light-border">
                    <a href="tables.html"
                       class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-table float-left mx-2"></i>
                        Tables
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>
                <li class="w-full h-full py-3 px-2 border-b border-light-border">
                    <a href="ui.html"
                       class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fab fa-uikit float-left mx-2"></i>
                        Ui components
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>
                <li class="w-full h-full py-3 px-2 border-b border-300-border">
                    <a href="modals.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="fas fa-square-full float-left mx-2"></i>
                        Modals
                        <span><i class="fa fa-angle-right float-right"></i></span>
                    </a>
                </li>
                <li class="w-full h-full py-3 px-2">
                    <a href="#"
                       class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                        <i class="far fa-file float-left mx-2"></i>
                        Pages
                        <span><i class="fa fa-angle-down float-right"></i></span>
                    </a>
                    <ul class="list-reset -mx-2 bg-white-medium-dark">
                        <li class="border-t mt-2 border-light-border w-full h-full px-2 py-3">
                            <a href="login.html"
                               class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                Login Page
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                        <li class="border-t border-light-border w-full h-full px-2 py-3">
                            <a href="register.html"
                               class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                Register Page
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                        <li class="border-t border-light-border w-full h-full px-2 py-3">
                            <a href="404.html"
                               class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                404 Page
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </aside> --}}

         <aside class="w-64 h-full mt-14 bg-side-nav col-span-2 hidden md:block lg:block" aria-label="Sidebar">
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
                              Logout <i class=" fa fa-sign-out fa-2xs"></i>
                           </span>
                        </button>
                     </form>
                  </li>
                  
               </ul>
            </div>
         </aside>
   
   
   
         <div class="w-full h-full  py-5 bg-slate-100  mt-14 col-span-7 relative ">
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