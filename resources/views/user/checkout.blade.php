@extends('layout.user_layout')
@include('layout.user_navbar')
    <div class="container px-10 py-10 bg-slate-200 mx-auto mt-48"> 
        <div class="flex items-center justify-center font-bold text-xl">
            <h1 id="time"></h1>
        </div>
        <div class="flex justify-center mt-5">
            <form action="/user/checkout" method="POST">
                @csrf
                <div class="mx-auto mb-3">
                    <label class="text-center font-semibold" for="qty">Masukan Quantity</label>
                    <input class=" mx-auto input input-bordered w-full max-w-xs" type="number" name="qty" id="qty" required placeholder="Quantity">
                    <div class="mb-3 float-right">
                        <select class="select select-bordered  max-w-xs" name="satuan">
                        @foreach ($Satuan as $satuan)
                        <option value="{{$satuan->satuan}}">{{$satuan->satuan}}</option>
                        @endforeach     
                        </select>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-5">
                        <button type="submit" class="w-40 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105 transition-transform " onclick="document.getElementById('time_end').value = waktu">
                            CheckOut
                        </button>
                </div>
            </form>    
        </div>
        <div class="flex items-center justify-center mt-5">
            <form action="/user/hold" method="post">
                @csrf
                {{-- <input type="hidden" name="time_start" value="{{$time_start}}">
                <input type="hidden" name="process_id" value="{{$process_id}}">
                <input type="hidden" name="gudang_id" value="{{$gudang_id}}">
                <input type="hidden" name="details" value="{{$details}}"> --}}
                <div class="flex items-center justify-center">
                    <button type="submit" class="w-40 text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105 transition"> 
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

    window.beforeunload = function() { return "Your work will be lost."; };
    </script>
</body>
</html>