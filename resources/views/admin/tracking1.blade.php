@extends('layout.navbar')
@extends('layout.admin_layout')



@section('content')

{{-- @dd($Users); --}}

<div class="overflow-x-scroll  h-96  hover:shadow-xl transition">
    <table class="w-full h-2 table table-zebra table-compact text-center">
        <thead class=" text-black">
            <tr class="sticky top-0">    
                <th class="w-2 border  whitespace-nowrap">No</th>
                <th class="w-10 border whitespace-nowrap">@sortablelink('name','Nama')</th>
                <th class="w-10 border whitespace-nowrap">@sortablelink('lokasi','Lokasi')</th>    
                <th class="table-fixed border w-5 whitespace-nowrap">@sortablelink('status','Status')</th>        
                <th class="table-fixed border w-5 whitespace-nowrap">keterangan</th>        
        </thead>
        <tbody class="">    
            @foreach ($Users as $user)
     
            <tr class=" hover">
                <td class=" border  whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class=" border  whitespace-nowrap">{{ $user->name }}</td>
                <td class=" border  whitespace-nowrap">{{ $user->gudang_name }}</td>                
                <td class=" border   whitespace-nowrap">
                    @if ($user->active == 1)
                    <span class="w-3 h-3 float-right bg-green-700 shadow-2xl rounded-full"></span>
                    @else 
                    <span class="w-3 h-3 float-right bg-slate-400 shadow-2xl rounded-full"></span>
                    @endif
                    {{$user->process_name}}
                </td>
                <td class=" border  whitespace-nowrap">{{ $user->keterangan }}</td>                
            </tr>
            @endforeach
            {{-- <p>{{$Status->process_name}}</p> --}}
        </tbody>
    </table>
    {{ $Users->onEachSide(1)->links() }}
</div>  
        
@endsection