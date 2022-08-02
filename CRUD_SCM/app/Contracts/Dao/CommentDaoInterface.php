<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface CommentDaoInterface
{ 

    public function createComment();
    public function deleteComment($id);  

}
