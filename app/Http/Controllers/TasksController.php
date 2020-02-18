<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;

class TasksController extends Controller
{
    // Set up auth access control
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tasks = User::find(auth()->user()->id)->tasks;
      $actives = $tasks->where('finished', 0);
      $priorities = $actives->where('priority', 1);
      $regulars = $actives->where('priority', 0);
      $completes = $tasks->where('finished', 1);
      // return view('index')->with('regulars', $regulars)->with('priorities', $priorities);
      return view('index')->with('data', ['tasks' => $tasks, 'regulars' => $regulars, 'priorities' => $priorities, 'completes' => $completes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);
      $this->validate($request, [
        'name' => 'required',
      ]);

      $task = new Task();
      $task->name = $request->input('name');
      $task->user_id = auth()->user()->id;
      $task->save();

      return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function prioritize($id)
    {
      // dd($id);
      // if(auth()->user()->id !== $task->user_id) {
      //   return redirect('/')->with('error', 'not your task to edit');
      // }

      $task = Task::find($id);
      if ($task->priority) {
        $task->priority = 0;
        $task->save();
      }
      else  {
        $task->priority = 1;
        $task->save();
      }

      return redirect('/');
    }

    public function finish($id) {
      $task = Task::find($id);
      if($task->finished) {
        $task->finished = 0;
        $task->save();
      }
      else {
        $task->finished = 1;
        $task->save();
      }

      return redirect('/');
    }

    public function removeFinished() {
      // $tasks = User::find(auth()->user()->id)->tasks;
      // // $tasks->where('finished', true)->delete();
      // $to_delete = $tasks->where('finished', true);
      // dd($to_delete);

      return 123;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $task = Task::find($id);
      $task->delete();

      return redirect('/');
    }
}
