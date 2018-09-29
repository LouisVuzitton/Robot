<?php
$path = __DIR__.'/tmp/';

return [
        'path' => $path,
            'swoole'  => [
            'status' => true,
            'ip'     => '127.0.0.1',
            'port'   => '8866',
        ],
        /*
         * 下载配置项
         */
        'download' => [
            'image'         => true,
            'voice'         => true,
            'video'         => true,
            'emoticon'      => true,
            'file'          => true,
            'emoticon_path' => $path.'emoticons', // 表情库路径（PS：表情库为过滤后不重复的表情文件夹）
        ],
        /*
         * 输出配置项
         */
        'console' => [
            'output'  => true, // 是否输出
            'message' => true, // 是否输出接收消息 （若上面为 false 此处无效）
        ],
        /*
         * 日志配置项
         */
        'log' => [
            'level'         => 'debug',
            'permission'    => 0777,
            'system'        => $path.'log', // 系统报错日志
            'message'       => $path.'log', // 消息日志
        ],
        /*
         * 缓存配置项
         */
        'cache' => [
            'default' => 'file', // 缓存设置 （支持 redis 或 file）
            'stores'  => [
                'file' => [
                    'driver' => 'file',
                    'path'   => $path.'cache',
                ],
                'redis' => [
                    'driver'     => 'redis',
                    'connection' => 'default',
                ],
            ],
        ],
        /*
         * 拓展配置
         * 如果加载拓展则必须加载此配置项
         * 管理员配置（必选），优先加载 remark_name
         */
        'extension' => [
            'admin' => [
                'remark'   => '',
                'nickname' => '',
            ],
        ]
];