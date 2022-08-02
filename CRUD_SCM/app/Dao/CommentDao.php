<?php

namespace App\Dao;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Contracts\Dao\CommentDaoInterface;

/**
 * Data accessing object for post
 */
class CommentDao implements CommentDaoInterface
{
  public function createComment()
  {
    $comment = new Comment;
    $comment->content = request()->content;
    $comment->article_id = request()->article_id;
    $comment->user_id = auth()->user()->id;
    $comment->save();
  }

  public function deleteComment($id)
  {
    $comment = Comment::find($id);
    return $comment;
  }
}
