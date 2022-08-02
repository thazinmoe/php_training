<?php

namespace App\Services;

use App\Contracts\Dao\CrudDaoInterface;
use App\Contracts\Services\CrudServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for post.
 */
class CrudService implements CrudServiceInterface
{
  /**
   * tasklistDao
   */
  private $crudDao;
  /**
   * Class Constructor
   * @param PostDaoInterface
   * @return
   */
  public function __construct(CrudDaoInterface $CrudDao)
  {
    $this->crudDao = $CrudDao;
  }

  public function createArticle()
  {
    return $this->crudDao->createArticle();
  }
  public function deleteArticle($id)
  {
    return $this->crudDao->deleteArticle($id);
  }

  public function indexArticle()
  {
    return $this->crudDao->indexArticle();
  }

  public function detailArticle($id)
  {
    return $this->crudDao->detailArticle($id);
  }
  public function editArticle($id)
  {
    return $this->crudDao->editArticle($id);
  }
  public function updateArticle(Request $request)
  {
    return $this->crudDao->updateArticle($request);
  }
}
