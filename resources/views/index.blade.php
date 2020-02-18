@extends('layouts.app')

@section('content')

<div>
  <form method="post" action="/">
    @csrf
    <div class="form-group">
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter task">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-6 center-text">
      <?php if(count($data['tasks']) < 1): ?>
        <h4>No tasks yet. Add one to get started.</h4>
      <?php else: ?>
        <p>This should print out if there are tasks</p>
        <!-- Condition for if there are both priority task and regular ones -->
        <?php if(count($data['priorities']) > 0 && count($data['regulars']) > 0): ?>
          <p>This means there are priorities and regulars</p>
          <h4>Priorities</h4>
          <ul class="no-list-bullets">
            @foreach($data['priorities'] as $priority)
              <li>
                {{ $priority->name }}
                <a href="/tasks/finish/{{ $priority->id }}"><i class="fas fa-check-square"></i></a>
                <a href="/tasks/prioritize/{{ $priority->id }}"><i class="fas fa-chess-pawn"></i></a>
                <a href="/tasks/delete/{{ $priority->id }}"><i class="fas fa-trash-alt"></i></a>
              </li>
            @endforeach
          </ul>
          <h4>Regulars</h4>
          <ul class="no-list-bullets">
            @foreach($data['regulars'] as $regular)
              <li>
                {{ $regular->name }}
                <a href="/tasks/finish/{{ $regular->id }}"><i class="fas fa-check-square"></i></a>
                <a href="/tasks/prioritize/{{ $regular->id }}"><i class="fas fa-chess-king"></i></a>
                <a href="/tasks/delete/{{ $regular->id }}"><i class="fas fa-trash-alt"></i></a>
              </li>
            @endforeach
          </ul>
        <!-- Condition if there are only priorities -->
        <?php elseif(count($data['priorities']) > 0 && count($data['regulars']) < 1): ?>
          <h4>Priorities</h4>
          <ul class="no-list-bullets">
            @foreach($data['priorities'] as $priority)
              <li>
                {{ $priority->name }}
                <a href="/tasks/finish/{{ $priority->id }}"><i class="fas fa-check-square"></i></a>
                <a href="/tasks/prioritize/{{ $priority->id }}"><i class="fas fa-chess-king"></i></a>
                <a href="/tasks/delete/{{ $priority->id }}"><i class="fas fa-trash-alt"></i></a>
              </li>
            @endforeach
          </ul>
        <!-- Condition if there are only regular tasks -->
        <?php elseif(count($data['priorities']) < 1 && count($data['regulars']) > 0): ?>
          <h4>To Do</h4>
          <ul class="no-list-bullets">
            @foreach($data['regulars'] as $regular)
              <li>
                {{ $regular->name }}
                <a href="/tasks/finish/{{ $regular->id }}"><i class="fas fa-check-square"></i></a>
                <a href="/tasks/prioritize/{{ $regular->id }}"><i class="fas fa-chess-king"></i></a>
                <a href="/tasks/delete/{{ $regular->id }}"><i class="fas fa-trash-alt"></i></a>
              </li>
            @endforeach
          </ul>
        <?php endif ?>
      <?php endif ?>
    </div>
    <div class="col-md-6">
      <h4>Completed Tasks</h4>
      <ul class="no-list-bullets">
        @foreach($data['completes'] as $complete)
          <li>
            {{ $complete->name }}
            <a href="/tasks/finish/{{ $complete->id }}"><i class="fas fa-list-ul"></i></a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>

<button><a href="/tasks/remove">Remove Finished Tasks</a></button>

@endsection

