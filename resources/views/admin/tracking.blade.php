@extends('layout.navbar')
@extends('layout.admin_layout')



@section('content')
<div class="overflow-x-scroll  h-96 rounded-lg hover:shadow-xl transition">
    <table class="w-full h-2 border border-spacing-0 rounded-lg ">
        <thead class="bg-gray-800 text-white">
            <tr class="sticky top-0 h-8 bg-gray border-b-2 border-slate-800">    
                <th class="w-2 border border-slate-300 text-center whitespace-nowrap">No</th>
                <th class="w-60 border border-slate-300 text-center whitespace-nowrap">Nama</th>
                <th class="w-20 border border-slate-300 text-center whitespace-nowrap">NIK</th>
                <th class="w-5 border border-slate-300 text-center whitespace-nowrap">Proses 1</th>
                <th class="w-5 border border-slate-300 text-center whitespace-nowrap">Proses 2</th>
                <th class="w-5 border border-slate-300 text-center whitespace-nowrap">Proses 3</th>
                <th class="w-5 border border-slate-300 text-center whitespace-nowrap">Proses 4</th>
                <th class="w-5 border border-slate-300 text-center whitespace-nowrap">Proses 5</th>
                <th class="w-5 border border-slate-300 text-center whitespace-nowrap">Proses 6</th>
                <th class="w-5 border border-slate-300 text-center whitespace-nowrap">Proses 7</th>
                <th class="w-5 border border-slate-300 text-center whitespace-nowrap">Proses 8</th>
                <th class="w-5 border border-slate-300 text-center whitespace-nowrap">Proses 9</th>
                <th class="w-5 border border-slate-300 text-center whitespace-nowrap">Proses 10</th>

        </thead>
        <tbody class="">    
            <tr class="bg-gray border-b-2 border-slate-800">
                <td class="border border-slate-300 text-center whitespace-nowrap">1</td>
                <td class="border border-slate-300 text-center whitespace-nowrap">Muhamad Alfarabi S</td>
                <td class="border border-slate-300 text-center whitespace-nowrap">1234567890</td>
                <td class="border border-slate-300 flex justify-center whitespace-nowrap">
                    <img src="/assets/img/user.svg" alt="">
                </td>
                <td class="border border-slate-300 text-center whitespace-nowrap"></td>
                <td class="border border-slate-300 text-center whitespace-nowrap"></td>
                <td class="border border-slate-300 text-center whitespace-nowrap"></td>
                <td class="border border-slate-300 text-center whitespace-nowrap"></td>            
                <td class="border border-slate-300 text-center whitespace-nowrap"></td>
                <td class="border border-slate-300 text-center whitespace-nowrap"></td>            
                <td class="border border-slate-300 text-center whitespace-nowrap"></td>
                <td class="border border-slate-300 text-center whitespace-nowrap"></td>            
            </tr>
            
        
        </tbody>
    </table>
</div>  
        
@endsection