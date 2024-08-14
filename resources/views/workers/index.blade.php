@extends('layouts.app');


@section('content')

<div class="d-flex justify-content-end align-items-center">
    <a href="{{route('workers.create')}}" class="btn btn-primary me-5">Add A worker</a>
</div>
 <div class="  overflow-scroll d-flex justify-content-center align-items-center  mx-5 table-content position-relative" style="margin-top: 100px ; z-index : 100">

    <table class="table">
        <thead>
          <tr>

            <th scope="col" >Name</th>
            <th scope="col" >Email</th>
            <th scope="col" >Phone</th>

          </tr>
        </thead>
        <tbody>

            @foreach ($workers as $worker)

            <tr>

              <td ><a href="{{route('workers.show' , $worker->id)}}">{{$worker->name}}</a></td>
              <td>{{$worker->email}}</td>
              <td>{{$worker->phone}}</td>
            </tr>
            @endforeach

        </tbody>
      </table>

 </div>

@endsection
