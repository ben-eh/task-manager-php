<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;

class Task extends Model
{
  // const FINISHED = false;
  // const PRIORITY = false;

  protected $attributes = [
    'finished' => false,
    'priority' => false,
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }
}
