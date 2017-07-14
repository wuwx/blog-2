<?php
/**
 * Created by PhpStorm.
 * role: ycp
 * Date: 2017/5/31
 * Time: 22:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Services\Ifs\Admin\ArticleServices;
use Illuminate\Http\Request;

class ArticleController extends controller
{
    protected $article;

    public function __construct(ArticleServices $articleServices)
    {
        $this->article=$articleServices;
    }
    /**
     * @name 博客首页
     * @desc 博客首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = $this->article->getAll();
        return view('admin.article.index',['data'=>$data,'title'=>'文章列表']);
    }

    /**
     * @name 添加文章页面
     * @desc 添加文章页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admin.article.edit',['title'=>'添加文章']);
    }

    /**
     * @name 添加文章操作
     * @desc 添加文章操作
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addOperate(Request $request)
    {
        if($this->article->save($request)){
            return response()->json(msg('success','添加成功!'));
        }
        return response()->json(msg('error','添加失败！'));
    }

    /**
     * @name 修改页面
     * @desc 修改页面
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @internal param Request $request
     */
    public function edit($id)
    {
        $data = $this->article->getOne($id);
        return view('admin.article.edit',['data'=>$data,'title'=>'编辑文章']);
    }
    /**
     * @name 修改操作
     * @desc 修改操作
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editOperate(Request $request)
    {
        if($this->article->update($request->input())){
            return response()->json(msg('success','修改成功!'));
        }
        return response()->json(msg('error','修改失败！'));
    }

    /**
     * @name 删除文章
     * @desc 删除文章
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request)
    {
        if($this->article->delete($request->input('id'))){
            return response()->json(msg('success','删除成功!'));
        } else
            return response()->json(msg('error','删除失败!'));
    }

}