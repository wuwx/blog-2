<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 16:46
 */

namespace App\Models\Admin;


use App\Models\Rbac;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Base;
use Yajra\Datatables\Facades\Datatables;

class Pri extends Base
{
    protected $table = 'blog_privilege';
    protected $dateFormat = 'U';
    /**
     * 可以被集体赋值的表字段
     * @var array
     */
    public $fillable = array('id','pri_name','pri_desc','module_name','controller','action_name','parent_id','created_at','updated_at','deleted_at');
    /**
     * 关联模型
     * 属于该用户的身份。
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Admin\Role','admin_role','pri_id','role_id');
    }

    /**
     * @name 获取所有权限
     * @desc 获取所有权限
     * @return mixed
     */
    public function getAll()
    {
        return $this->where('deleted_at',0)->select('id','pri_name','module_name','controller','action_name','parent_id','created_at')->get();
    }
    /**
     * @name 系统权限添加入库
     * @desc 系统权限添加入库
     * @return mixed
     */
    public function addAppPri()
    {
        $model = new Rbac();
        $pris = $model->getAccess();
        dd($pris);
    }




    /**
     * @name 检测字段是否重复
     * @desc 检测字段是否重复
     * @param $field
     * @param string $id
     * @return bool
     */
    public function checkUnique($field, $id='')
    {
        if(!empty($id)){
            $data = $this->where('id','!=',$id)->get();
            foreach ($data as $k=>$v){
                if($v['role_name'] == $field){
                    return true;
                }
            }
        }else
            return $field==$this->where(['role_name'=>$field])->value('role_name') ;
    }


    /**
     * @name 修改信息
     * @desc 修改信息
     * @param $data
     * @return bool
     */
    public function updateRole($data)
    {
        return $this->find($data['id'])->update($data);
    }


}