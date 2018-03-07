<?php
/**
 * @author: EricLi <leiflyy@outlook.com>
 */

namespace app\admin\controller;


use app\admin\model\UserModel;
use controller\BaseController;
use service\LogService;
use think\facade\Request;
use think\facade\Session;

class LoginController extends BaseController
{
    /**
     * 初始化时调用
     * TODO   ???
     * @author: EricLi <leiflyy@outlook.com>
     */
    protected function initialize()
    {
//        如果session 中有用户信息，且请求的操作不是 'out' 则直接登录到首页
        if (session('user') && Request::action() !== 'out') {
            $this->redirect('@admin');
        }
    }

    /**
     * 登录 action
     * @author: EricLi <leiflyy@outlook.com>
     * @return int|mixed @GET 请求则渲染页面， @POST请求则执行登录操作
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        if ($this->request->isGet()) {
            return $this->fetch();
        } elseif ($this->request->isPost()) {
            $captcha = $this->request->post('captcha', '', 'trim');
            if(!captcha_check($captcha)){
                $this->error('验证码错误，请重试');
            }else{
                $username = $this->request->post('username', '', 'trim');
                if (strlen($username) < 4){
                    $this->error('登录账号长度不能少于4位有效字符!');
                }else{
                    $password = $this->encryptionPassword($this->request->post('password', '', 'trim'));
                    if (strlen($password) < 5){
                        $this->error('登录密码长度不能少于6位有效字符!');
                    }else{
                        $user = UserModel::where('username', $username)->find();
                        if (empty($user)) {
                            $this->error('账号不存在，请重试');
                        } else {
                            if ($user->password !== $password) {
                                $this->error('密码错误，请重试');
                            } else {
                                if (empty($user->status)) {
                                    $this->error('账号已被禁用，请联系管理员');
                                } else {
//                                    登录成功,将登录记录写入数据库
                                    $login_data = ['login_at' => ['exp', 'now()'], 'login_num' => ['exp', 'login_num+1']];
                                    $user->login_at = date("Y-m-d H:i:s", time());
                                    $user->login_num += 1;
                                    $user->save();
//                                    写入session
                                    Session::set('user', $user);
//                                    TODO 权限校验，写入log
                                    LogService::write('登录','登录成功');
                                    $this->success('登录成功，正在进入系统...', '/');
                                }
                            }
                        }
                    }
                }
            }
        } else {
//            TODO  404
            return 0;
        }
//            TODO  404
        return 0;
    }


}