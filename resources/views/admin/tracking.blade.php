@extends('layout.navbar')
@extends('layout.admin_layout')



@section('content')
<div class="overflow-x-scroll  h-96 rounded-lg hover:shadow-xl transition">
    <table class="w-full h-2 border border-spacing-0 rounded-lg ">
        <thead class=" text-white">
            <tr class="sticky bg-gray-800 top-0 h-8 bg-gray border-b-2 border-slate-800">    
                <th class="w-2 border border-slate-300 text-center whitespace-nowrap">No</th>
                <th class="w-60 border border-slate-300 text-center whitespace-nowrap">Nama</th>
                <th class="w-20 border border-slate-300 text-center whitespace-nowrap">NIK</th>    
            @foreach ($Processes as $process)
                <th class="table-fixed	w-5 border border-slate-300 text-center whitespace-nowrap">{{ $process->process_name}}</th>        
            @endforeach
        </thead>
        <tbody class="">    
            @foreach ($Users as $user)
     
            <tr class="bg-gray border-b-2 border-slate-800">
                <td class="border border-slate-300 text-center whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class="border border-slate-300 text-center whitespace-nowrap">{{ $user->name }}</td>
                <td class="border border-slate-300 text-center whitespace-nowrap">{{ $user->NIK }}</td>                
                <td class="border border-slate-300 flex justify-center whitespace-nowrap">
                <img src="/assets/img/user.svg" alt="">  
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>  
        
@endsection