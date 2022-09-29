@extends('layout.user_layout')

<body class="bg-slate-100">
@include('layout.user_navbar')
    <div class="container px-10 py-10 bg-slate-200 mx-auto mt-32"> 
        <div class="flex items-center justify-center font-bold text-xl">
            <h1 id="time"></h1>
        </div>

        <div class="flex justify-center mt-0">
            <form action="/user/hold/start" method="POST">
                @csrf
                <input type="hidden" name="time_start" value="{{$time_start}}">
                <input type="hidden" name="process_id" value="{{$process_id}}">
                <input type="hidden" name="gudang_id" value="{{$gudang_id}}">
                <input type="hidden" name="details" value="{{$details}}">
                <input type="hidden" id="hold-start" name="hold_start" value="" />
                <div class="mx-auto mb-3">
                    <label class="label text-center font-semibold" for="qty">Keterangan</label>
                    <textarea class="textarea" name="keterangan" id="" cols="25" rows="5" placeholder="Keterangan Hold Proses"></textarea>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" class="w-40 text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105 transition" onclick="document.getElementById('hold-start').value = waktu"> 
                       Hold      
                    </button>            
                </div>
            </form>    
        </div>
    </div>

    <script type="text/javascript">

        var today = new Date();
        var waktu = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        
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