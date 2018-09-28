<?php
namespace app\index\controller;

use think\Controller;

class About extends Controller
{
    public function about()
    {
        $content=model('Content')->showImg2(2);
        $imagepath=model('Imagepath')->select();
        $erweimaContent=model('content')->showImg3(1,18);
        $erweima=model('Imagepath')->showImg4($erweimaContent);
        return $this->fetch('',['content'=>$content,'imagepath'=>$imagepath,'erweima'=>$erweima]);
    }
    public function details()
    {
        $id=input('get.id');
        $erweimaContent=model('content')->showImg3(1,18);
        $erweima=model('Imagepath')->showImg4($erweimaContent);
        $content=model('Content')->getOne($id);
        $imagepath=model('Imagepath')->select();
        return $this->fetch('',['content'=>$content,'imagepath'=>$imagepath,'erweima'=>$erweima]);
    }
}