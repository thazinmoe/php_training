<?php

namespace App\Services;

use App\Contracts\Dao\TaskListDaoInterface;
use App\Contracts\Services\TaskListServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for post.
 */
class TaskListService implements TaskListServiceInterface
{
  /**
   * tasklistDao
   */
  private $tasklistDao;
  /**
   * Class Constructor
   * @param PostDaoInterface
   * @return
   */
  public function __construct(TaskListDaoInterface $tasklistDao)
  {
    $this->tasklistDao = $tasklistDao;
  }
 
  public function uploadTaskList(Request $request)
  {
    return $this->tasklistDao->uploadTaskList($request);
  }
  
  public function updateTaskList(Request $request)
  {
    return $this->tasklistDao->updateTaskList($request);
  }
  
  public function getTaskList()
  {
    return $this->tasklistDao->getTaskList();
  }  
  public function editTaskList($id)
  {
    return $this->tasklistDao->editTaskList($id);
  }
  public function completeTaskList($id)
  {
    return $this->tasklistDao->completeTaskList($id);
  }
  public function deleteTaskList($id)
  {
    return $this->tasklistDao->deleteTaskList($id);
  }

  
}
