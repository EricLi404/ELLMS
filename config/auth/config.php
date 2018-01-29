<?php
//配置文件
return [

    'captcha' => [
        // 验证码字符集合
        'codeSet' => 'XQWERTYUPASFHJKZVNM2345679',
        // 验证码字体大小(px)
        'fontSize' => 32,
        // 是否画混淆曲线
        'useCurve' => false,
        // 验证码位数
        'length' => 4,
        // 验证成功后是否重置
        'reset' => true,
        // 验证码高度
        'imageH' => 36,
        // 验证码宽度
        'imageW' => 139
    ],

];