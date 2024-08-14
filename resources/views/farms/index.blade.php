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
            <th scope="col" >Size</th>
            <th scope="col" >Location</th>
            <th scope="col" >Crop Type</th>
            <th scope="col" >Description</th>

          </tr>
        </thead>
        <tbody>

            @foreach ($farms as $farm)

            <tr>

              <td ><a href="{{route('farms.show' , $farm->id)}}">{{$farm->name}}</a></td>
              <td>{{$farm->size}}</td>
              <td>{{$farm->location}}</td>
              <td>{{$farm->crop_type}}</td>
              <td>{{$farm->description}}</td>
            </tr>
            @endforeach

        </tbody>
      </table>

 </div>

@endsection
