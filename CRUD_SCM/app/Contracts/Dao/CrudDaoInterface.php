<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface CrudDaoInterface
{
  
    public function createArticle();    
    public function deleteArticle($id);
    public function indexArticle();
    public function detailArticle($id);
    public function editArticle($id);
    public function updateArticle(Request $request);

}
