<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;

class Task extends Model
{
  const FINISHED = false;
  const PRIORITY = false;

  protected $attributes = [
    'finished' => self::FINISHED,
    'priority' => self::PRIORITY,
  ];
}
