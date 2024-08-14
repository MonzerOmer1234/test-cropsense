@extends('layouts.app');


@section('content')
    <div class="d-flex justify-content-end align-items-center">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary me-5">Add a task</a>
    </div>
    <div class="  overflow-scroll d-flex justify-content-center align-items-center  mx-5 table-content position-relative"
        style="margin-top: 100px ; z-index : 100">

        <table class="table">
            <thead>
                <tr>

                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Due_Date</th>

                </tr>
            </thead>
            <tbody>



                @foreach ($tasks as $task)

                    <tr>

                        <td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></td>
                        <td>{{ $task->description }}</td>

                        <td>{{ $task->status}}</td>
                        <td>{{ $task->due_date }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
