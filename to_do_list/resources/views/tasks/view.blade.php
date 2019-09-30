@extends('layouts.app')
@section('content')

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Task</th>
        <th scope="col">Action</th>

    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
    <tr>
        <td>{{$task['user_id']}}</td>
        <td>{{$task['task']}}</td>
     </tr>
  @endforeach
    <form action="{{route('tasks.destroy','task->id')}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="DELETE" class="btn btn-danger">
    </form>
    </tbody>
</table>
@endsection
