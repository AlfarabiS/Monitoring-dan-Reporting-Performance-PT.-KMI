<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script type="text/javascript">
    // function filter_seconds(date){
    //     return date
    //     // .replace(/(\d{1,2}\:\d{1,2})\:\d{2}/, '$1')
    // }

      var year = new Date().getYear();
     document.getElementById("testing").value= year;

  </script>

</head>
<body>

  <form action="" method="get">
    <input type="text" name="test" id="testing">
    <input type="text" id="date" value="" />
    <input type="button" value="asd" value="Get dfsd Date!" onclick="document.getElementById('date').value = year"/>
    </form>
    
    // <input id="button" type="button" value="Get dfsd Date!" onclick="document.getElementById('date').value = new Date().getMinutes()
    // {{-- // toLocaleTimeString(navigator.language)" /> --
{{-- <input type="button" value=""> --}}
<?php
    
    // $test=strtotime('10-09-2019 12:01:00');
    // echo($test);


?>
{{-- <div class="overflow-x-auto">
  <table class="text-center table table-zebra w-full">
    <tr class="">
      <th>No</th>
      <th>Nama Proses</th>
      <th>Gudang</th>
      <th>Action</th>
    </tr>
    <tr>
      <td>ads</td>
      <td>ads</td>
      <td>ads</td>
      <td>
        <div class="flex">
          <span class="bg-green-400 px-auto mx-auto rounded-full ">
            <i class="fa fa-pencil"></i>
          </span>
          <span class="bg-blue-500 h-full  px-auto mx-auto rounded-full">
            <i class="fa fa-plus"></i>
          </span>
          <span>
            
          </span>
        </div>
      </td>
    </tr>
  </table>
</div>S --}}

</body>
</html>