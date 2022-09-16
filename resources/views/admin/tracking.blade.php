@extends('layout.navbar')
@extends('layout.admin_layout')



@section('content')
<div class="overflow-x-scroll h-96 rounded-lg hover:shadow-xl transition">
    <table class="w-full h-2 table table-zebra table-compact ">
        <thead class="">
            <tr class="sticky top-0 h-8 ">    
                <th class="w-2  text-center whitespace-nowrap">No</th>
                <th class="w-60  text-center whitespace-nowrap">Nama</th>
                <th class="w-20  text-center whitespace-nowrap">NIK</th>    
            @foreach ($Processes as $process)
                <th class="table-fixed	w-5  text-center whitespace-nowrap">{{ $process->process_name}}</th>        
            @endforeach
            </tr>
        </thead>

        <tbody class="">    
            @foreach ($Users as $user)
     
            <tr class="hover">
                <td class="border text-center whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class="border text-center whitespace-nowrap">{{ $user->name }}</td>
                <td class="border text-center whitespace-nowrap">{{ $user->NIK }}</td>                
                <td class="border flex flex-center whitespace-nowrap">
                <img src="/assets/img/user.svg" alt="" width="20px">  
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>  
        
@endsection