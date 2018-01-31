<?php

namespace app\admin\controller;

use controller\BaseController;
use think\captcha\Captcha;
use think\Controller;
use think\facade\Request;

class IndexController extends BaseController
{
    public function index()
    {
        return $this->fetch();
    }


    public function verify()
    {
        $captcha = new Captcha();
        return $captcha->entry();
    }


    public function test()
    {
//        echo $this->encryptionPassword('aaaaaa');
        if(Request::isAjax()){
            $res['lllll'] = "sfssfggg";
            return $res;
        }
        return $this->fetch();
    }

}
