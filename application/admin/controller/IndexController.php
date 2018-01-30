<?php

namespace app\admin\controller;

use controller\BaseController;
use think\captcha\Captcha;
use think\Controller;

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

        return $this->fetch();;
    }

}
