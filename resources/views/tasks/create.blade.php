@extends('layouts.app');


@section('content')

    <form style="margin: 100px" action="{{route('tasks.store')}}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label >Title</label>
            <input required type="text" name="title" class="form-control"  aria-describedby="emailHelp"
                placeholder="Enter A Title">


                @error('title')
                <div class=" text-danger">
                    {{$message}}
                </div>

                @enderror




        </div>
        <div class="form-group  mb-3">
            <label >Description</label>
              <textarea name="description" placeholder="Write Your Description" class=" d-block my-4 w-100 p-4" style="height: 200px" id=""></textarea>
                @error('description')
                <div class=" text-danger">
                    {{$message}}
                </div>

                @enderror

        </div>
        <div class="form-group  mb-3">
            <label >Status</label>
            <select class="form-select" name="status" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">Idle</option>
                <option value="2">Processing</option>
                <option value="3">Complete</option>
                <option value="4">Revise</option>
              </select>
                @error('status')
                <div class=" text-danger">
                    {{$message}}
                </div>

                @enderror
        </div>
        <div class="form-group  mb-3">
            <label >Due Date</label>
            <input required type= "date" name="due_date" class="form-control">
            @error('due_date')
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
