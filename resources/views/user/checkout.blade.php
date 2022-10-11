@include('layout.user_layout')
@include('layout.user_navbar')
    <div class="container px-10 py-10 bg-slate-200 mx-auto mt-48"> 
        <div class="flex items-center justify-center font-bold text-xl">
            <h1 id="time"></h1>
        </div>
        {{-- <div class="flex items-center justify-center font-bold text-xl">
            <h1>{{$Session->process_name}}</h1>
        </div> --}}
        <div class="flex justify-center mt-5">
            <form action="/user/checkout" method="POST">
                @csrf
                <div class="mx-auto mb-3">
                    <label class="text-center font-semibold" for="qty">Quantity</label>
                    <input class=" mx-auto input input-bordered w-22 max-w-xs" type="number" name="qty" id="qty" required placeholder="Quantity">
                    @if (!is_null($Standard))
                    <div class="mb-3 mt-3 ml-2 float-right">
                        <span class="font-bold">{{ $Standard->satuan }}</span>
                        <input type="hidden" name="satuan" value="{{ $Standard->satuan }}" id="" >
                    @else
                    <div class="mb-3 float-right">
                        <select class="select select-bordered  max-w-xs" name="satuan">
                        @foreach ($Satuan as $satuan)
                        <option value="{{$satuan->satuan}}">{{$satuan->satuan}}</option>
                        @endforeach     
                        </select>
                    @endif
                    </div>
                </div>
                <div class="flex items-center justify-center mt-5">
                        <button type="submit" class="w-40 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105 transition-transform " onclick="document.getElementById('time_end').value = waktu">
                            CheckOut
                        </button>
                </div>
            </form>    
        </div>
        <div class="flex items-center justify-center mt-2">
            <form action="/user/hold" method="post">
                @csrf
                <div class="flex items-center justify-center">
                    <button type="submit" class="w-40 text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105 transition"> 
                       Hold      
                    </button>            
            </div> 
            </form>
        </div>
        <div class="flex items-center justify-center mt-2">
            <form action="/user/invalid" method="post">
                @csrf
                @if (!is_null($Standard))
                <input type="hidden" name="satuan" value="{{ $Standard->satuan }}" id="" >
                @else
                <input type="hidden" name="satuan" value="Lain-lain" id="" >
                @endif
                <div class="flex items-center justify-center">
                    <button type="submit" class="w-40 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 hover:scale-105 transition"> 
                       Invalid      
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