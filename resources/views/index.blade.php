@extends('layouts.app')

@section('content')

<h2>Index Page</h2>

<form method="post" action="/">
  @csrf
  <div class="form-group">
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter task">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<ul>
  @foreach($tasks as $task)
    <li>
      {{ $task->name }} - {{ $task->priority }}
      <form action="/tasks/{{ $task->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
      <!-- <form action="/tasks/prioritize/{{ $task->id }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Prioritize</button>
      </form> -->
      <a href="/tasks/prioritize/{{ $task->id }}">Prioritize</a>
    </li>
  @endforeach
</ul>

@endsection
