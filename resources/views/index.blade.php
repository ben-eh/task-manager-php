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
  @foreach($tasks as $task_item)
    <li>{{ $task_item->name }}</li>
  @endforeach
</ul>

@endsection
