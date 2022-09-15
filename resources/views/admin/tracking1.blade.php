@extends('layout.navbar')
@extends('layout.admin_layout')



@section('content')
<div class="overflow-x-scroll  h-96  hover:shadow-xl transition">
    <table class="w-full h-2 table table-zebra table-compact ">
        <thead class=" text-black">
            <tr class="sticky top-0">    
                <th class="w-2 border text-center whitespace-nowrap">No</th>
                <th class="w-10 border text-center whitespace-nowrap">Nama</th>
                <th class="w-10 border text-center whitespace-nowrap">Lokasi</th>    
                <th class="table-fixed border text-center	w-10 whitespace-nowrap">Status</th>        
        </thead>
        <tbody class="">    
            @foreach ($Users as $user)
     
            <tr class=" hover">
                <td class=" border  text-center whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class=" border  text-center whitespace-nowrap">{{ $user->name }}</td>
                <td class=" border  text-center whitespace-nowrap">{{ $user->gudang_name }}</td>                
                <td class=" border   whitespace-nowrap"></td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>  
        
@endsection