<?php

namespace App\Dao;

use App\Models\Todo;
use App\Contracts\Dao\TaskListDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for post
 */
class TaskListDao implements TaskListDaoInterface
{
  public function getTaskList()
  {
    $todos = Todo::orderBy('completed')->get();
    return $todos;
  }
  public function uploadTaskList(Request $request)
  {
    $todo = $request->title;
    Todo::create(['title' => $todo]);
  }
  public function updateTaskList(Request $request)
  {
    $updateTodo = Todo::find($request->id);
    $updateTodo->update(['title' => $request->title]);  
  }

  public function editTaskList($id)
  {
    $todo = Todo::find($id);
    return $todo;
  }
  public function completeTaskList($id)
  {
    $todo = Todo::find($id);
    return $todo;
  }
  public function deleteTaskList($id)
  {
    $todo = Todo::find($id);
    return $todo;
  }
}
