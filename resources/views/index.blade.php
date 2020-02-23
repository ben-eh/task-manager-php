@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row input-card">
    <div class="col-md-4 offset-md-4 center-div">
      <form method="post" action="/" class="full-width">
        @csrf
        <div class="input-group full-width">
          <input type="text" class="form-control form-input" id="name" name="name" placeholder="Enter task">
          <button type="submit" class="btn btn-primary">Add Task</button>
        </div>
      </form>
    </div>
  </div>


  <div class="row tasks-card">
    <?php if(count($data['tasks']) < 1): ?>
      <div><h4>No tasks yet. Add one to get started.</h4></div>
    <?php else: ?>
      <div class="col-md-6 center-text">
        <!-- Condition for if there are both priority task and regular ones -->
        <?php if(count($data['priorities']) > 0 && count($data['regulars']) > 0): ?>
          <h3 class="underline">Priorities</h3>
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
          <h4 class="underline">Regulars</h4>
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
          <h4 class="underline">To Do</h4>
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
        <?php elseif(count($data['regulars']) < 1 && count($data['priorities']) < 1): ?>
          <h4>Nothing left to do for now</h4>
        <?php endif ?>
      </div>
      <div class="col-md-6 center-text">
        <h4 class="underline">Completed Tasks</h4>
        <ul class="no-list-bullets">
          @foreach($data['completes'] as $complete)
            <li>
              <p>{{ $complete->name }}</p>
              <a href="/tasks/finish/{{ $complete->id }}"><i class="fas fa-list-ul"></i></a>
            </li>
          @endforeach
        </ul>
      </div>
    <?php endif ?>
  </div>
</div>

<button><a href="/tasks/removeFinished">Remove Finished Tasks</a></button>

@endsection

