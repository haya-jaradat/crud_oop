@extends('layouts.app')

@section('content')
    <form action="{{route('tasks.store')}}" method="POST">
        <div class="form-group">
           @csrf
            <label for="task">Task</label>
            <input name="task" type="task" class="form-control" placeholder="Enter Task">
        </div>

        <button type="submit" class="btn btn-primary">Add task</button>
    </form>
@endsection
