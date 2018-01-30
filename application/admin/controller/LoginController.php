<?php
/**
 * @author: EricLi <leiflyy@outlook.com>
 */

namespace app\admin\controller;


use controller\BaseController;

class LoginController  extends BaseController
{
    /**
     * 初始化时调用
     * TODO
     * @author: EricLi <leiflyy@outlook.com>
     */
    protected function initialize()
    {
        //request->action() 调用控制器类的操作
        if (session('user') && $this->request->action() !== 'out') {
            $this->redirect('@admin');
        }
    }


    public function index()
    {
        if ($this->request->isGet()){
//            echo "get";
            return $this->fetch();
        }elseif ($this->request->isPost()) {
            $data = $this->request->post();
            $res['msg'] = '正在登录。。。';
            $res['code'] = 1;
            $res['url'] = Url::build('/admin');
            return json($res);
        }else{
            return 0;
        }
    }
}