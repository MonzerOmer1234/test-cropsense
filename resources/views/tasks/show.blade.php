


@extends('layouts.app')
@section('content')
 <div class=" d-flex justify-content-center align-items-center" style="min-height: 100vh ">
    <div class="card" style="width: 18rem;box-shadow : 0 0 10px #ddd">
        <ul class="list-group list-group-flush w-auto">
          <li class="list-group-item">Title : {{$task->title}}</li>
          <li class="list-group-item">Description : {{$task->description}}</li>
          <li class="list-group-item">Status : {{$task->status}}</li>
          <li class="list-group-item">Due Date : {{$task->due_date}}</li>
        </ul>
      </div>
 </div>
@endsection
