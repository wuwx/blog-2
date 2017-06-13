<?php
/**
 * Created by PhpStorm.
 * User: ycp
 * Date: 2017/6/3
 * Time: 17:38
 */

namespace App\Services\Admin;


use App\Models\Admin\Pri;
use App\Services\Ifs\Admin\PriServices;

class PriServicesImpl implements PriServices
{
    protected $priDao;
    public function __construct()
    {
        $this->priDao = new Pri();
    }

    public function getAll()
    {
        $this->priDao->getAll();
    }

    public function getOne($id)
    {
        // TODO: Implement getOne() method.
    }

    public function save()
    {
        $this->priDao->addAppPri();
    }

    public function update($data)
    {
        // TODO: Implement updateRole() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}