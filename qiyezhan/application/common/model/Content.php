<?php
namespace app\common\model;
use think\Model;
class Content extends model{
//存储产品服务图片信息
    public function saveImage($data){
        $this->category_id='4';
        $this->allowField(['name','abstract','project_id','category_id'])->save($data);
        return $this->id;
    }
    //存储轮播图和二维码信息
    public function saveLImage($data){
        $this->category_id='1';
        $this->time=date('Y-m-d');
        $this->allowField(['name','abstract','project_id','category_id','importantkey','article','time'])->save($data);
        return $this->id;
    }
//存储资讯新闻的信息
    public function saveArticleImage($data){
        $this->category_id='3';
        $this->time=date('Y-m-d');
        $this->allowField(['name','abstract','project_id','category_id','importantkey','article','time'])->save($data);
        return $this->id;
    }
    public function saveAboutImage($data){
        $this->category_id='2';
        $this->time=date('Y-m-d');
        $this->allowField(['name','project_id','category_id','article','time'])->save($data);
        return $this->id;
    }
    //获得所有案例的图片和文章信息
    public function getImage($id){
        $res=$this->where("status!=-1 AND category_id={$id}")->select();
        return $res;
    }
    //服务项目，轮播图
    public function showImg($id,$code=''){
        $data=[
            'status'=>1,
            'category_id'=>$id,
            'project_id'=>$code
        ];
        $res=$this->where($data)->select();
        return $res;
    }
    //暂时用着之后删除
    public function showImg2($id){
        $data=[
            'status'=>1,
            'category_id'=>$id,
        ];
        $res=$this->where($data)->select();
        return $res;
    }
    //返回如二维码类似的图片信息id
    public function showImg3($id,$code=''){
        $data=[
            'status'=>1,
            'category_id'=>$id,
            'project_id'=>$code
        ];
        $res=$this->where($data)->find();
        return $res->id;
    }

    public function getOne($id){
        $data=[
            'id'=>$id,
        ];
        $res=$this->where($data)->select();
        return $res;
    }
    //获得所有图片信息
    public function getAllImage(){
        $order=[
            'id'=>'desc'
        ];
        $result=$this->order($order)->where("status!=-1 ")->select();
        // echo $this->getLastSql();
        return $result;
    }
    //模板关联
    public function picture()
    {
        return $this->hasMany('Imagepath');
    }
}