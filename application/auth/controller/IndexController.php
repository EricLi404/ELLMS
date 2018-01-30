<?php
namespace app\auth\controller;

use think\captcha\Captcha;
use think\Controller;
use think\facade\Request;
use think\facade\Url;

class IndexController extends Controller
{
    public function index()
    {
        echo url('admin/common/login');
        return $this->fetch();
    }

    public function login()
    {
        if ($this->request->isGet()){
//            echo "get";
            return $this->fetch();
        }elseif ($this->request->isAjax()){
            echo "ajax";
            $res['data'] = 'fff';
            return json($res);
        }elseif ($this->request->isPost()){
            $this->success('postsuccess','/');
        }
    }

    public function verify()
    {
        $captcha = new Captcha();
        return $captcha->entry();
    }
}
