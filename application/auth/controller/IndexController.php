<?php
namespace app\auth\controller;

use think\captcha\Captcha;
use think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function login()
    {
        return $this->fetch();
    }

    public function verify()
    {
        $captcha = new Captcha();
        return $captcha->entry();
    }
}
