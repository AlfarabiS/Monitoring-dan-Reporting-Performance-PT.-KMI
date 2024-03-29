@extends('layout.navbar')
@extends('layout.superadmin_layout')

@section('content')

<div class="ml-10 w-full">

    <form action="/administrator/user/post" method="post">
        @csrf
        <div class="form-control w-full max-w-xs">
            <label class="label">
            <span class="label-text">Nama</span>
            </label>
            <input type="text" name="name" placeholder="Name" value="{{$Name}}" class="input input-bordered w-full max-w-xs" required>
        </div>
        <div class="form-control w-full max-w-xs">
            <label class="label">
            <span class="label-text">NIK</span>
            </label>
            <input type="text" name="NIK" placeholder="NIK" value="{{$NIK}}" class="input input-bordered w-full max-w-xs " required>
        </div>
        @if ($Edit == 1)
            
        <div class="form-control  w-full max-w-xs">
            <label class="label cursor-pointer">
              <span class="label-text">Change Password</span> 
              <input type="checkbox"  class="checkbox" id="checkboxPassword" onclick="changePassword()" >
            </label>
          </div>
        <div class="form-control w-full max-w-xs" style="display:none" id="passwordField">
            <label class="label">
            <span class="label-text">Password</span>
            </label>
            <input type="password" name="password" placeholder="password" value="" class="input input-bordered w-full max-w-xs ">
        </div>
        @else
        <div class="form-control w-full max-w-xs" >
            <label class="label">
            <span class="label-text">Password</span>
            </label>
            <input type="password" name="password" placeholder="password" value="" class="input input-bordered w-full max-w-xs " required>
        </div>
            
        @endif

        {{-- <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" placeholder="Email" value="{{$Email}}"  class="input input-bordered w-full max-w-xs " required>
        </div> --}}
        <div class="form-control w-full max-w-xs">
            <label class="label">
            <span class="label-text">Lokasi</span>
            </label>
            <select class="select select-bordered w-full max-w-xs" name="gudang" id="" required>
                <option value="FG">Finish Good</option>
                <option value="RM">Raw Material</option>
                <option value="PM">Packaging Material</option>
            </select>
        </div>
        <div class="form-control w-full max-w-xs">
            <label class="label">
            <span class="label-text">Role</span>
            </label>
            <select class="select select-bordered w-full max-w-xs" value="{{ $Role }}" name="role" id="" required>
                <option value="0">Operator</option>
                <option value="1">Admin</option>
            </select>
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