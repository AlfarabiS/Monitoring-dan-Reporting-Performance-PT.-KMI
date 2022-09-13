<header>
    <!--Nav-->
    <nav aria-label="menu nav" class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                <a href="#" aria-label="Home">
                    <span class="text-xl pl-2"><i class="em em-grinning"><span class="ml-3">Hi, {{ $ActiveUser }}</span></i></span>
                </a>
            </div>

            <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
                <span class="relative w-full">
                    <form action="">
                        @csrf
                        <input aria-label="search" type="search" id="search" placeholder="Search" class="w-full bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-5 appearance-none leading-normal">
                    </form>
                </span>
            </div>

            <div class="flex">
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
            </div>
        </div>

    </nav>
</header>