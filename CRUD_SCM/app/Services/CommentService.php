<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Contracts\Dao\CommentDaoInterface;
use App\Contracts\Services\CommentServiceInterface;

/**
 * Service class for post.
 */
class CommentService implements CommentServiceInterface
{
  /**
   * commentDao
   */
  private $commentDao;
  /**
   * Class Constructor
   * @param PostDaoInterface
   * @return
   */
  public function __construct(CommentDaoInterface $commentDaoInterface)
  {
    $this->commentDao = $commentDaoInterface;
  }

  public function createComment()
  {
    return $this->commentDao->createComment();
  }

  public function deleteComment($id)
  {
    return $this->commentDao->deleteComment($id);
  }
 
}
