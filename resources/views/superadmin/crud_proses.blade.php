@extends('layout.navbar')
@extends('layout.superadmin_layout')

@section('content')

<div class="container ml-5">

    <form action="" method="post">
        <div class="form-control w-full max-w-xs">
            <label class="label">
            <span class="label-text">Nama</span>
            </label>
            <input type="text" name="name" placeholder="Name" class="input input-bordered w-full max-w-xs">
        </div>
        <div class="form-control w-full max-w-xs">
            <label class="label">
            <span class="label-text">NIK</span>
            </label>
            <input type="text" name="NIK" placeholder="NIK" class="input input-bordered w-full max-w-xs">
        </div>
        <div class="form-control w-full max-w-xs">
            <div class="flex">
                <div class="mr-2">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" name="username" placeholder="Username" class="input input-bordered w-full max-w-xs">
                </div>
                <div class="ml-2">
                    <label class="label">
                        <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" placeholder="" class="input input-bordered w-full max-w-xs">
                </div>
            </div>
        </div>
        <div class="form-control w-full max-w-xs">
            <label class="label">
            <span class="label-text">Lokasi</span>
            </label>
            <input type="text" name="name" placeholder="Name" class="input input-bordered w-full max-w-xs">
        </div>
        <div class="form-control w-full max-w-xs mt-5">
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
        </div>
    </form>

</div>
    
@endsection