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
      <a href="/tasks/delete/{{ $task->id }}"><i class="fas fa-trash-alt"></i></a>
      <a href="/tasks/prioritize/{{ $task->id }}"><i class="fas fa-chess-king"></i></a>
      <a href="/tasks/finish/{{ $task->id }}"><i class="fas fa-check-square"></i></a>
    </li>
  @endforeach
  <br>
</ul>

<h5>Test for Priority</h5>
<ul>
  @foreach($priorities as $priority)
    <li>{{ $priority->name }}</li>
  @endforeach
</ul>
@endsection
