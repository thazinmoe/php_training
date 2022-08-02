<?php

namespace App\Dao;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Contracts\Dao\CrudDaoInterface;

/**
 * Data accessing object for post
 */
class CrudDao implements CrudDaoInterface
{
  public function createArticle()
  {
    $article = new Article;
    $article->fname = request()->fname;
    $article->lname = request()->lname;
    $article->title = request()->title;
    $article->body = request()->body;
    $article->category = request()->category;
    $article->save();
    return $article;
  }
  public function deleteArticle($id)
  {
    $article = Article::find($id);
    $article->delete();
  }
  public function indexArticle()
  {
    $data = Article::latest()->paginate(5);
    return $data;
  }
  public function detailArticle($id)
  {
    $data = Article::find($id);
    return $data;
  }
  public function editArticle($id)
  {
    $article = Article::find($id);
    return $article;
  }
  public function updateArticle(Request $request)
  {
    $article = Article::find($request->id);
    $article->update([
      'fname' => $request->fname,
      'lname' => $request->lname,
      'title' => $request->title,
      'body' => $request->body,
      'category' => $request->category,
    ]);
    return $article;
  }
}
