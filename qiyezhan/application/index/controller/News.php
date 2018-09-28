<?php
namespace app\index\controller;

use think\Controller;

class News extends Controller
{
    public function news()
    {
        $content=model('Content')->showImg2(3);
        $erweimaContent=model('content')->showImg3(1,18);
        $erweima=model('Imagepath')->showImg4($erweimaContent);
        return $this->fetch('',['content'=>$content,'erweima'=>$erweima]);
    }
    public function details()
    {
        $id=input('get.id');
        $content=model('Content')->getOne($id);
        $imagepath=model('Imagepath')->select();
        $erweimaContent=model('content')->showImg3(1,18);
        $erweima=model('Imagepath')->showImg4($erweimaContent);
        return $this->fetch('',['content'=>$content,'imagepath'=>$imagepath,'erweima'=>$erweima]);
    }
}