
@extends('layout.navbar')
@extends('layout.admin_layout')

@section('content')
<div class="overflow-x-scroll h-96 rounded-lg hover:shadow-xl transition">
    <table class="w-full h-2 text-center table table-zebra table-compact ">
        <thead class=" ">
            <tr class="sticky bg-gray-800 top-0 h-8 bg-gray">    
                <th class="w-2 border text-center whitespace-nowrap">No</th>
                <th class="w-60 border  text-center whitespace-nowrap">@sortablelink('name','Nama')</th>
                <th class="w-20 border  text-center whitespace-nowrap">@sortablelink('date','Waktu')</th>
                <th class="w-20 border  text-center whitespace-nowrap">@sortablelink('gudang','Lokasi')</th>
                <th class="w-20 border  text-center whitespace-nowrap">@sortablelink('proses','Proses')</th>
                <th class="w-5 border  text-center whitespace-nowrap">@sortablelink('performance','Performance')</th>


        </thead>
        <tbody class="">  
            @foreach ($Report as $report)
                
            <tr class="bg-gray ">
                <td class=" whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class=" whitespace-nowrap">{{ $report->name }}</td>
                <td class=" whitespace-nowrap">{{ $report->reports_time}}</td>
                <td class=" whitespace-nowrap">{{ $report->gudang_name}}</td>
                <td class=" whitespace-nowrap">{{ $report->process_name}}</td>
                <td class=" whitespace-nowrap">{{ $report->performance}}%</td>         
            </tr>
            
            @endforeach  
            
        </tbody>
    </table>
</div>  
{{ $Report->onEachSide(1)->links() }}
@endsection