<header>
    <!--Nav-->
    <nav aria-label="menu nav" class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

        <div class="flex flex-wrap items-center justify-between">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                <a href="#" aria-label="Home">
                    <span class="text-xl pl-2"><i class="em em-grinning"><span class="ml-3">Hi, {{$ActiveUser}}</span></i></span>
                </a>
            </div>

            

            <div class="flex flex-wrap">
                <ul class="list-reset flex justify-between items-center">
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            @if (Session::has('process_id'))
                                <button class="w-full flex p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700" disabled>                       
                            @else
                                <button class="w-full flex p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700 dark:hover:bg-gray-700" >   
                            @endif
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