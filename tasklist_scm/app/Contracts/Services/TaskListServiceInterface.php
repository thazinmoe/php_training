<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface TaskListServiceInterface
{
  
  public function uploadTaskList(Request $request);
 
  public function updateTaskList(Request $request);

 
  public function getTaskList(); 

  
  public function editTaskList($id);

  
  public function completeTaskList($id);

  
  public function deleteTaskList($id);
 
}
