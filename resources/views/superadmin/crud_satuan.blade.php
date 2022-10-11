@extends('layout.navbar')
@extends('layout.superadmin_layout')

@section('content')

<div class="ml-10 w-full">

    <form action="/administrator/satuan/post" method="post">
        @csrf
        <div class="form-control w-full max-w-xs">
            <label class="label">
            <span class="label-text">Satuan</span>
            </label>
            <input type="text" name="satuan" placeholder="Name" value="{{$Satuan}}" class="input input-bordered w-full max-w-xs" required>
            <input type="hidden" name="id" value="{{ $Id }}">
        </div>
        
        <div class="form-control w-full max-w-xs mt-5">
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </form>

</div>

<script>
function changePassword(){
    var checkbox = document.getElementById('checkboxPassword');
    var password = document.getElementById('passwordField');
    
    if (checkbox.checked == true){
        password.style.display = "block";
      } else {
        password.style.display = "none";
      }
}



</script>
    

@endsection