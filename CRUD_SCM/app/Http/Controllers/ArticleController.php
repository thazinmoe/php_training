<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Exports\ArticleExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Contracts\Services\CrudServiceInterface;
use App\Imports\ArticleImport;

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

    public function exportexcel(){
        return Excel::download(new ArticleExport,'article.xlsx');
    }

    public function importexcel(Request $request){
        Excel::import(new ArticleImport, $request->file('file')->store('files'));
        return redirect()->back();
//        $data = $request->file('file');
//
//        $namefile = $data->getClientOriginalName();
//        $data->move('ArticleData', $namefile);
//
//        Excel::import(new ArticleImport, \public_path('/ArticleData/',$namefile));
//        return \redirect()->back();
    }

    //public function import(Request $request){
    //    Excel::import(new ImportUser, $request->file('file')->store('files'));
    //    return redirect()->back();
    //}
}
