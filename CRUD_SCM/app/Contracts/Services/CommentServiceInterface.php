<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface CommentServiceInterface
{ 
    public function createComment();    
    public function deleteComment($id);
}
