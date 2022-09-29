@extends('layout.navbar')
@extends('layout.superadmin_layout')

@section('content')

<div class="container ml-5">

    <form action="/administrator/proses/post" method="post">
        @csrf
        <div class="form-control w-full max-w-xs">
            <label class="label">
            <span class="label-text">Nama Proses</span>
            </label>
            <input type="text" name="process_name" placeholder="Nama Proses" value="{{ $ProcessName }}" class="input input-bordered w-full max-w-xs">
        </div>
        <div class="form-control w-full max-w-xs">
            <label class="label">
            <span class="label-text">ID Proses</span>
            </label>
            <input type="text" name="process_id" value="{{ $ProcessId }}" placeholder="FG-Loading" class="input input-bordered w-full max-w-xs">
        </div>
        <div class="form-control w-full max-w-xs">
            <label class="label">
            <span class="label-text">Lokasi</span>
            </label>
            <select class="select select-bordered w-full max-w-xs" name="gudang_id" id="">
                <option value="FG">Finish Good</option>
                <option value="RM">Raw Material</option>
                <option value="PM">Packaging Material</option>
            </select>
        </div>
        <div class="form-control w-full max-w-xs">
            <div class="flex">
                <div class="mr-2">
                    <label class="label">
                        <span class="label-text">Qty</span>
                    </label>
                    <input type="number" name="qty" placeholder="00" value="{{$Qty}}"  class="input input-bordered w-full max-w-xs "    >
                </div>
                <div class="ml-2">
                    <label class="label">
                        <span class="label-text">Waktu</span>
                        </label>
                        <input type="text" class="input input-bordered w-full max-w-xs" name="time" id="" placeholder="00:00:00" value="{{$Time}}">
                </div>
            </div>
        </div>
        <div class="form-control w-full max-w-xs mt-5">
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </form>

</div>
    
@endsection