<?php
/**
 * @author: EricLi <leiflyy@outlook.com>
 */
namespace controller;


class BaseController extends \think\Controller
{

    /**
     * 密码加盐加密
     * @author: EricLi <leiflyy@outlook.com>
     * @param string $password
     * @return string
     */
    protected function encryptionPassword($password = '')
    {
        $salt = sha1('EricLi#leiflyy@outlook.com');
        $en_password = md5($password.$salt);
        return $en_password;
    }
}