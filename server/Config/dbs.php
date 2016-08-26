<?php
/**
 * 分库分表的自定义数据库路由配置
 */

return array(
    /**
     * DB数据库服务器集群
     */
    'servers' => array(
        'db_perfeer' => array(                         //服务器标记
            'host'      => 'localhost',             //数据库域名
            'name'      => 'perfeer',               //数据库名字
            'user'      => 'root',                  //数据库用户名
            'password'  => 'Aa123456',	                    //数据库密码
            'port'      => '3306',                  //数据库端口
            'charset'   => 'UTF8',                  //数据库字符集
        ),
    ),

    /**
     * 自定义路由表
     */
    'tables' => array(
        //通用路由
        '__default__' => array(
            'prefix' => '',
            'key' => 'id',
            'map' => array(
                array('db' => 'db_perfeer'),
            ),
        ),

        /**
        'demo' => array(                                                //表名
            'prefix' => 'pf_',                                         //表名前缀
            'key' => 'id',                                              //表主键名
            'map' => array(                                             //表路由配置
                array('db' => 'db_perfeer'),                               //单表配置：array('db' => 服务器标记)
                array('start' => 0, 'end' => 2, 'db' => 'db_perfeer'),     //分表配置：array('start' => 开始下标, 'end' => 结束下标, 'db' => 服务器标记)
            ),
        ),
         */
    ),
);
