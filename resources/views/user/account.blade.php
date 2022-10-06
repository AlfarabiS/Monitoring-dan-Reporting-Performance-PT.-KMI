@extends('layout.user_layout')


@include('layout.user_navbar')


<div class="flex items-center justify-center h-screen">

    <form action="/user/account/post" method="post">
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
        
        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">Password</span>
                </label>
                <input type="password" name="password" placeholder="" value="" class="input input-bordered w-full max-w-xs " required>
        </div>
        <div class="form-control w-full max-w-xs mt-5">
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </form>

</div>
    