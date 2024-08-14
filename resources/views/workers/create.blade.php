@extends('layouts.app');


@section('content')
{{-- @if ($errors->any())
<div class="alert alert-danger d-flex mx-5  justify-content-center align-items-center">
    <ul>
    @foreach ($errors->all() as $item)
     <li >{{$item}}</li>
    @endforeach


    </ul>
</div> --}}


{{-- @endif --}}
    <form style="margin: 100px" action="{{route('workers.store')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label >Name</label>
            <input required type="text" name="name" class="form-control"  aria-describedby="emailHelp"
                placeholder="Enter Your name">


                @error('name')
                <div class=" text-danger">
                    {{$message}}
                </div>

                @enderror




        </div>
        <div class="form-group  mb-3">
            <label >Email address</label>
            <input required type="email" name="email" class="form-control"  aria-describedby="emailHelp"
                placeholder="Enter email">
                @error('email')
                <div class=" text-danger">
                    {{$message}}
                </div>

                @enderror

        </div>
        <div class="form-group  mb-3">
            <label >Phone</label>
            <input required type="text" name="phone" class="form-control"  aria-describedby="emailHelp"
                placeholder="Enter Your phone number">
                @error('phone')
                <div class=" text-danger">
                    {{$message}}
                </div>

                @enderror
        </div>
        <div class="form-group  mb-3">
            <label >Password</label>
            <input required type="password" name="password" class="form-control"  placeholder="Enter your password">
            @error('password')
            <div class=" text-danger">
                {{$message}}
            </div>

            @enderror
        </div>
        <div class="form-group  mb-3">
            <label >Confirm Password</label>
            <input required type="password" name="password_confirmation" class="form-control"  placeholder="repeat your password">
            @error('password_confirmation')
            <div class=" text-danger">
                {{$message}}
            </div>

            @enderror
        </div>
        <div class=" d-flex justify-content-center align-items-center mt-5">

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
