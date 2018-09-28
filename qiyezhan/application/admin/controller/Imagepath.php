<?php
namespace app\admin\controller;

use think\Controller;

class Imagepath extends Controller
{
    public function index()
    {
      $content=model('Content')->getImage(4);
        $imagepath=model('Imagepath')->select();
        return $this->fetch('',['content'=>$content,'imagepath'=>$imagepath]);
    }
    public function add()
    {
        $project=model('project')->where(" status=1 AND categories_id=4")->select();
        return $this->fetch('',['project'=>$project]);
    }
    public function category()
    {
        $project=model('project')->where(" status!=-1 AND categories_id=4")->select();
        return $this->fetch('',['project'=>$project]);
    }
    public function status()
    {
        $data=input('post.');
        $res=model('content')->save(['status'=>$data['status']],['id'=>$data['id']]);
        if($res) {
            return show(1, 'success', $res);
        }
        return show(0,'error');
    }
    public function Prostatus()
    {
        $data=input('post.');
        $res=model('project')->save(['status'=>$data['status']],['id'=>$data['id']]);
        if($res) {
            return show(1, 'success', $res);
        }
        return show(0,'error');
    }
    public function save()
    {
        $data=array();
        $data['pathWU_FILE_0']='';
        $data['pathWU_FILE_1']='';
        $data['pathWU_FILE_2']='';
       // var_dump($data['pathWU_FILE_2']);
     $data=input('post.');
       $res=model('content')->saveImage($data);
        if(!empty($data['pathWU_FILE_0'])) {
            $dataOne=date('Ymd').'/'.$data['pathWU_FILE_0'];
            $list = [
                ['image_id' => $res, 'image_path' => $dataOne]
            ];

            if (!empty($data['pathWU_FILE_1'])) {
                $dataOne=date('Ymd').'/'.$data['pathWU_FILE_0'];
                $dataTwo=date('Ymd').'/'.$data['pathWU_FILE_1'];
                $list = [
                    ['image_id' => $res, 'image_path' => $dataOne],
                    ['image_id' => $res, 'image_path' => $dataTwo]
                ];
            }
            if (!empty($data['pathWU_FILE_2'])) {
                $dataOne=date('Ymd').'/'.$data['pathWU_FILE_0'];
                $dataTwo=date('Ymd').'/'.$data['pathWU_FILE_1'];
                $dataThree=date('Ymd').'/'.$data['pathWU_FILE_2'];
                $list = [
                    ['image_id' => $res, 'image_path' => $dataOne],
                    ['image_id' => $res, 'image_path' => $dataTwo],
                    ['image_id' => $res, 'image_path' => $dataThree]
                ];
            }
            model('Imagepath')->saveAll($list, false);
        }
        if($res){
           $this->success('存储成功');
        }
        else{
           $this->error('失败');
       }
    }
}
