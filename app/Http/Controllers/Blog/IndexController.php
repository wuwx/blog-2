<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use YuanChao\Editor\EndaEditor;
use App\Services\Ifs\Admin\ArticleServices;

class IndexController extends controller
{
    protected $articles;

    public function __construct(ArticleServices $articleServices)
    {
        $this->articles = $articleServices;
    }
    /**
     * @name 后台首页
     * @desc 后台首页
     * @author ycp
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = $this->articles->getAllByPaginate(3);
        return view('blog.index.index',['articles'=>$articles]);
    }
    public function article($id)
    {
        $article = $this->articles->getOne($id);
        $article['content'] = EndaEditor::MarkDecode($article->content);
        return view('blog.article.index',['article'=>$article]);
    }

}