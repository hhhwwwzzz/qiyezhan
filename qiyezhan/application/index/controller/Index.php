<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $content=model('content')->showImg(1,17);
        $erweimaContent=model('content')->showImg3(1,18);
        $erweima=model('Imagepath')->showImg4($erweimaContent);
       $imagepath=model('Imagepath')->select();
        $image = model('content')->showImg2(4);
       $picture = model('imagepath')->select();
       return $this->fetch('',['content'=>$content,'imagepath'=>$imagepath,'image'=>$image,'picture'=>$picture,'erweima'=> $erweima]);
    }
   public function index_case()
  {
      $image=model('content')->showImg(5);
      $picture=model('imagepath')->select();
      $erweimaContent=model('content')->showImg3(1,18);
      $erweima=model('Imagepath')->showImg4($erweimaContent);
      return $this->fetch('',['image'=>$image,'picture'=> $picture,'erweima'=> $erweima]);
     return $this->fetch();
  }
    public function cooperation()
    {
        $erweimaContent=model('content')->showImg3(1,18);
        $erweima=model('Imagepath')->showImg4($erweimaContent);
        return $this->fetch('',['erweima'=>$erweima]);
    }
    public function experience()
    {
        $erweimaContent=model('content')->showImg3(1,18);
        $erweima=model('Imagepath')->showImg4($erweimaContent);
        return $this->fetch('',['erweima'=>$erweima]);
    }

    public function solution()
    {
        $erweimaContent=model('content')->showImg3(1,18);
        $erweima=model('Imagepath')->showImg4($erweimaContent);
        return $this->fetch('',['erweima'=>$erweima]);
    }
}
