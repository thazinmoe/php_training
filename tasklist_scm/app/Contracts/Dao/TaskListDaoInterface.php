<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface TaskListDaoInterface
{
  
    public function uploadTaskList(Request $request);
 
    public function updateTaskList(Request $request);
  
   
    public function getTaskList(); 
  
    
    public function editTaskList($id);
  
    
    public function completeTaskList($id);
  
    
    public function deleteTaskList($id);
}
