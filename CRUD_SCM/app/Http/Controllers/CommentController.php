<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Contracts\Services\CommentServiceInterface;

class CommentController extends Controller
{
    /**
     * commentDao
     */
    private $commentInterface;
    /**
     * Class Constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct(CommentServiceInterface $commentServiceInterface)
    {
        $this->commentInterface = $commentServiceInterface;
        $this->middleware('auth')->except(['index', 'detail']);
    }
    public function create()
    {
        $comment = $this->commentInterface->createComment();
        return back();
    }

    public function delete($id)
    {
        $comment = $this->commentInterface->deleteComment($id);
        if (Gate::allows('comment-delete', $comment)) {
            $comment->delete();
            return back();
        } else {
            return back()->with('error', 'Unauthorize');
        }
    }
}
