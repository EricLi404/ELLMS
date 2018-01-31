<?php
/**
 * @author: EricLi <leiflyy@outlook.com>
 */

namespace service;


use app\admin\model\LogModel;
use think\facade\Request;
use think\facade\Session;

class LogService
{
    public static function write($action = '行为', $content = '行为描述')
    {
        $ip = Request::ip();
        $node = strtolower(join('/',[Request::module(),Request::controller(),Request::action()]));
        $username = Session::get('user.username');
        $log = LogModel::create([
            'ip'=>$ip,
            'node'=>$node,
            'username'=>$username,
            'action'=>$action,
            'content'=>$content,
        ],true);
    }
}