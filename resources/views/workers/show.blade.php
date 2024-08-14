


@extends('layouts.app')
@section('content')
 <div class=" d-flex justify-content-center align-items-center" style="min-height: 100vh ">
    <div class="card" style="width: 18rem;box-shadow : 0 0 10px #ddd">
        <ul class="list-group list-group-flush w-auto">
          <li class="list-group-item">Name : {{$worker->name}}</li>
          <li class="list-group-item">email : {{$worker->email}}</li>
          <li class="list-group-item">phone : {{$worker->phone}}</li>
        </ul>
      </div>
 </div>
@endsection
