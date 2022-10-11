<header>
    <!--Nav-->
    <nav aria-label="menu nav" class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink w-full justify-start md:justify-start text-white">
                {{-- <a href="#" aria-label="Home"> --}}
                    <span class=" pl-2">
                        <label for="my-drawer" class="btn btn-circle swap swap-rotate">
  
                            <!-- this hidden checkbox controls the state -->
                            <input id="my-drawer" type="checkbox" class="drawer-toggle"  />
                            
                            <!-- hamburger icon -->
                            <svg class="swap-off fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z"/></svg>
                            
                            <!-- close icon -->
                            <svg class="swap-on fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512"><polygon points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49"/></svg>
                            
                          </label>
                    </span>
                    @if (Auth::check())
                    <span class=" text-xl ml-3 mt-2.5">
                        Hi, {{ $ActiveUser }}
                    </span>
                    @else
                    <span class=" text-xl ml-3 mt-2.5">
                        Silahkan Login
                    </span>
                    @endif
                {{-- </a> --}}
            </div>


            {{-- <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
                <span class="relative w-full">
                    <form action="">
                        @csrf
                        <input aria-label="search" type="search" id="search" placeholder="Search" class="w-full bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-5 appearance-none leading-normal">
                    </form>
                </span>
            </div> --}}

            {{-- <div class="flex flex-wrap">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="w-full flex p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700">                       
                               <span class="flex-1  whitespace-nowrap">
                                Logout
                                <i class=" fa fa-sign-out fa-2xs"></i></span>
                            </span>
                            </button>
                         </form>
                     </li>
                                       
                </ul>
            </div> --}}
        </div>

    </nav>
</header>