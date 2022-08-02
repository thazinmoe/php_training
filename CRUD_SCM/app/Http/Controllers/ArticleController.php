<?php

namespace App\Http\Controllers;

use App\Contracts\Services\CrudServiceInterface;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * productDao
     */
    private $crudInterface;
    /**
     * Class Constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct(CrudServiceInterface $crudServiceInterface)
    {
        $this->crudInterface = $crudServiceInterface;
        $this->middleware('auth')->except(['index', 'detail']);
    }

    public function index()
    {
        $data = $this->crudInterface->indexArticle();
        return view('articles.index', [
            'articles' => $data
        ]);
    }
    public function detail($id)
    {
        $data = $this->crudInterface->detailArticle($id);
        return view('articles.detail', [
            'article' => $data
        ]);
    }
    public function add()
    {
        return view('articles.add');
    }
    public function create()
    {
        $validator = validator(request()->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $article = $this->crudInterface->createArticle();
        return redirect('/articles');
    }
    public function edit($id)
    {
        $article = $this->crudInterface->editArticle($id);
        return view('articles.edit')->with(['id' => $id, 'article' => $article]);
    }
    public function update(Request $request)
    {
        $validator = validator(request()->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $article = $this->crudInterface->updateArticle($request);
        return redirect('/articles');
    }
    public function delete($id)
    {
        $article = $this->crudInterface->deleteArticle($id);
        return redirect('/articles')->with('info', 'Article deleted');
    }
}
