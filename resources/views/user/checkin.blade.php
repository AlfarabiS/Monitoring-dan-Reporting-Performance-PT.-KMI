@extends('layout.user_layout')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-slate-100">
@include('layout.user_navbar')

    <div class="container px-10 py-10 bg-slate-200 mx-auto my-20"> 
        <div class="flex items-center justify-center font-bold text-xl">
            <h1 id="time"></h1>
        </div>
        <div class="flex items-center justify-center mt-5">
            <form action="/user/checkin" method="POST">
                @csrf
                {{-- INPUT WAKTU OTOMATIS GETTIME BLM--}}
                <input type="hidden" id="time-start" name="time_start" value="" />
                @foreach ($Processes as $item)
                    <input  type="hidden" name="gudang_id" value="{{ $item->gudang_id }}">
                @endforeach
                <div class="mx-auto mb-3">
                    <label class=" label" for="proses">Proses</label>
                    <select class="select select-bordered w-full max-w-xs" name="process_id">
                            @foreach ($Processes as $process)
                            <option value="{{ $process->process_id }}">{{ $process->process_name }}</option>
                            {{-- <input type="hidden" name="gudang_id" value="{{ $process->gudang_id }}"> --}}
                            @endforeach
                        </select>
                </div>
                    <div class="mx-auto ">
                        <label class="label" for="details">Detail</label>
                        <textarea class="textarea" name="details" id="" cols="30" rows="5" placeholder=""></textarea>
                    </div>
                <div class="flex items-center justify-center mt-5">
                    <button type="submit" class="w-40 text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105 transition" onclick="document.getElementById('time-start').value = waktu"> 
                            Check In         
                    </button>            
                </div> 
            </form>
        </div>
    </div>


    <script type="text/javascript">

        var today = new Date();
        var waktu = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        //document.getElementById("time-start").value = testingan; 

        var timeDisplay = document.getElementById("time");
     
    
        function refreshTime() {
            var dateString = new Date().toLocaleString("id-ID");
            var formattedString = dateString.replace(/\//g, "-");
            var formattedString = formattedString.replace(".", ":");
            var formattedString = formattedString.replace(".", ":");
            timeDisplay.innerHTML = formattedString;
    
        }

        setInterval(refreshTime,1000);
    </script>  
</body>
</html>