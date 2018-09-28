<?php
namespace app\common\model;
use think\Model;
class Imagepath extends model{
    public function showImg4($id){
        $data=[
            'status'=>1,
            'image_id'=>$id,
        ];
        $res=$this->where($data)->find();
        return $res;
    }
    //获得所有图片信息
    public function getAllImage(){
        $order=[
            'id'=>'desc'
        ];
        $result=$this->select();
        // echo $this->getLastSql();
        return $result;
    }
}