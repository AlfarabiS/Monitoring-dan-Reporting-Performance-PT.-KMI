
@extends('layout.navbar')
@extends('layout.admin_layout')

@section('content')
<div class="ml-10 mb-5 mt-2 flex grid-col-2">
    <form action="/admin/report" method="get" name="report" id="report">
        <select class="select select-bordered max-w-xs mt-2" name="name">
            <option disabled selected>Pilih Nama</option>
            @foreach ($Users as $user)
            <option>{{ $user->name }}</option>
            @endforeach
        </select>
        <input type="date" name="start_date" class="ml-0 md:ml-3 input mt-2 max-w-xs" value="2020-01-01" required>
            <h1 class="inline font-extrabold text-xl">-</h1>
        <input type="date" name="end_date" class=" input mt-2 max-w-xs" value="{{ date('Y-m-d') }}" required>
        
        <button type="submit" class="mt-2 ml-2 text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Set</button> 
    </form>
    <form action="/admin/report/export" method="get" class="">
        <input type="hidden" name="name" value="{{ $name }}" id="">
        <input type="hidden" name="date_start" value="{{ $date_start }}" id="">
        <input type="hidden" name="date_end" value="{{ $date_end }}" id="">
        <button type="submit" class="mt-3 ml-2 text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105 transition"> 
            Export      
        </button> 
    </form>
</div>
<div class="overflow-x-scroll h-96 rounded-lg hover:shadow-xl transition">
    <table class="w-full h-2 text-center table table-zebra table-compact ">
        <thead class=" ">
            <tr class="sticky bg-gray-800 top-0 h-8 bg-gray">    
                <th class="w-2 border text-center whitespace-nowrap">No</th>
                <th class="w-60 border  text-center whitespace-nowrap">@sortablelink('name','Nama')</th>
                <th class="w-20 border  text-center whitespace-nowrap">@sortablelink('gudang','Lokasi')</th>
                <th class="w-20 border  text-center whitespace-nowrap">@sortablelink('proses','Proses')</th>
                <th class="w-20 border  text-center whitespace-nowrap">@sortablelink('date','Waktu')</th>
                <th class="w-5 border  text-center whitespace-nowrap">Waktu Kerja</th>
                <th class="w-5 border  text-center whitespace-nowrap">@sortablelink('performance','Performance')</th>
            </tr>
        </thead>
        <tbody class="">  
            @foreach ($Report as $report)
            <tr class="bg-gray ">
                <td class=" whitespace-nowrap">{{ $loop->iteration }}</td>
                <td class=" whitespace-nowrap">{{ $report->name }}</td>
                <td class=" whitespace-nowrap">{{ $report->gudang_name}}</td>
                <td class=" whitespace-nowrap">{{ $report->process_name}}</td>
                <td class=" whitespace-nowrap">{{ $report->reports_time}}</td>
                <td class=" whitespace-nowrap">{{ $report->work_time}}</td>         
                <td class=" whitespace-nowrap">{{ $report->performance}}%</td>         
            </tr>
            @endforeach  
        </tbody>
    </table>
    {{ $Report->onEachSide(1)->links() }}

</div>  

<script>
        // document.addEventListener("DOMContentLoaded", function(event) {
        //     document.createElement('form').submit.call(document.getElementById('report'));
        //     });  
</script>
@endsection