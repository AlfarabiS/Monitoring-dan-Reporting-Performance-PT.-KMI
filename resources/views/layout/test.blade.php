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