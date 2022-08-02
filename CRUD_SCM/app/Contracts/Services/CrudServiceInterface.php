<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface CrudServiceInterface
{
  
  public function createArticle();
  public function deleteArticle($id);
  public function indexArticle();
  public function detailArticle($id);
  public function editArticle($id);
  public function updateArticle(Request $request);
 
}
