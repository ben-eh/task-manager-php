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
<?php if(count($data['tasks']) < 1): ?>
    <h4>No tasks yet. Add one to get started.</h4>
<?php endif ?>
<?php echo count($data['tasks']) ?>
<h5>Regular Tasks</h5>
<ul>
  @foreach($data['regulars'] as $regular)
    <li>
      {{ $regular->name }} - {{ $regular->priority }}
      <a href="/tasks/delete/{{ $regular->id }}"><i class="fas fa-trash-alt"></i></a>
      <a href="/tasks/prioritize/{{ $regular->id }}"><i class="fas fa-chess-king"></i></a>
      <a href="/tasks/finish/{{ $regular->id }}"><i class="fas fa-check-square"></i></a>
    </li>
  @endforeach
  <br>
</ul>

@endsection
