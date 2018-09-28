<?php
namespace app\common\model;
use think\Model;
class Project extends model{
    public function getCategory($id){
        $res=$this->where("status!=-1 AND category_id={$id}")->select();
        return $res;
    }
}