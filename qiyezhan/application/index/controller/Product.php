<?php
namespace app\index\controller;

use think\Controller;
class Product extends Controller
{
    public function product()
    {
        $image = model('content')->showImg2(4);
        $picture = model('imagepath')->select();
        $erweimaContent=model('content')->showImg3(1,18);
        $erweima=model('Imagepath')->showImg4($erweimaContent);
        return $this->fetch('', ['image' => $image, 'picture' => $picture,'erweima'=>$erweima]);
    }
}