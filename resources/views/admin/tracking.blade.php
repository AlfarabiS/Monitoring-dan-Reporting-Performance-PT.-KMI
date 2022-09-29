@extends('layout.navbar')
@extends('layout.admin_layout')



@section('content')
<div class="overflow-x-scroll h-96 rounded-lg hover:shadow-xl transition">
    <table class="w-full h-2 table table-zebra table-compact text-center">
        <thead class="">
            <tr class="sticky top-0 h-8 ">    
                <th class="w-2 whitespace-nowrap">No</th>
                <th class="w-60 whitespace-nowrap">@sortablelink('name','Nama')</th>
                <th class="w-20 whitespace-nowrap">NIK</th>    
            @foreach ($Processes as $process)
                <th class="table-fixed	w-20   whitespace-nowrap">{{ $process->process_name}}</th>        
            @endforeach
            </tr>
        </thead>

        <tbody class="">    
            @foreach ($Users as $user)
     
            <tr class="hover">
                <td class="border whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class="bordercenter whitespace-nowrap">{{ $user->name }}</td>
                <td class="border whitespace-nowrap">{{ $user->NIK }}</td>                
                @foreach ($Processes     as $process)
                @if ($user->process_id === $process->process_id)
                    <td class="border object-none object-center whitespace-nowrap">
                        <div class="tooltip" data-tip="{{ $user->keterangan }}">
                            <i class=" fa fa-user"  ></i>
                        </div>
                    </td>  
                @else
                    <td class="border whitespace-nowrap"></td>
                @endif
                @endforeach
            
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>  
        
@endsection