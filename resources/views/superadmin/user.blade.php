@extends('layout.navbar')
@extends('layout.superadmin_layout')

@section('content')
  
<div class="flex mb-2">
  
  
  <span class="bg-green-400 h-10 w-10 ml-10 rounded-full hover:rotate-45 transition">
    <a href="/administrator/user/add">
        <i class="mx-3 my-3 fa fa-plus"></i>    
    </a>
  </span>
  <span>
    <a href="/administrator/user/add">
    <h1 class="mt-2 ml-2">Tambah Baru</h1>
    </a>
  </span>
  

</div>
<div class="overflow-x-scroll  h-96  hover:shadow-xl transition">
  <table class="w-full h-2 table table-zebra table-compact ">
      <thead class=" text-black">
          <tr class="sticky top-0">    
              <th class="w-2 border text-center whitespace-nowrap">No</th>
              <th class="w-10 border text-center whitespace-nowrap">Nama</th>
              <th class="w-10 border text-center whitespace-nowrap">NIK</th>
              <th class="w-10 border text-center whitespace-nowrap">Email</th>
              <th class="w-10 border text-center whitespace-nowrap">Lokasi</th>    
              <th class="border text-center	w-10 whitespace-nowrap">Action</th>        
      </thead>
      <tbody class="">    
          @foreach ($Users as $user)
   
          <tr class=" hover">
              <td class=" border  text-center whitespace-nowrap">{{ $loop->iteration }}</td>
              <td class=" border  text-center whitespace-nowrap">{{ $user->name }}</td>
              <td class=" border  text-center whitespace-nowrap">{{ $user->NIK }}</td>                
              <td class=" border  text-center whitespace-nowrap">{{ $user->email }}</td>                
              <td class=" border  text-center whitespace-nowrap">{{ $user->gudang_id }}</td>                 
              <td class=" border  text-center whitespace-nowrap">
                <div class="flex">    
                  <span class="bg-green-400 h-10 w-10 px-auto mx-auto rounded-full hover:rotate-45 transition">
                    <form action="/administrator/user/edit" method="POST">
                      @csrf
                      <input type="hidden" name="id_user" value="{{ $user->id }}">
                      <button type="submit">
                        <i class="mx-auto my-3 fa fa-pencil"></i>
                      </button>  
                    </form>
                  </span>
                  <span class="bg-red-500 h-10 w-10  px-auto mx-auto rounded-full">
                    <i class="mx-auto my-3 fa fa-trash"></i>
                  </span>
                </div>
              </td>                 
          </tr>
          @endforeach
          
      </tbody>
  </table>
</div>




  @endsection