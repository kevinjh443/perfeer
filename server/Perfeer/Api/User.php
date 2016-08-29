<?php
/**
 * Created by PhpStorm.
 * User: jianhua.he
 * Date: 2016/8/27
 * Time: 17:54
 */

class Api_User extends PhalApi_Api {

    public function getRules() {
        return array(
            'login' => array(
                'username' 	=> array('name' => 'username', 'min' => 6, 'require' => true, 'desc' => '用户名' ),
                'password' 	=> array('name' => 'password', 'min' => 6, 'require' => true, 'desc' => '用户登录密码' ),
            ),

            'logout' => array(
                'username' 	=> array('name' => 'username', 'min' => 6, 'require' => true, 'desc' => '用户名' ),
            ),
        );
    }


    /**
     * 用户登录
     * @desc 用户登录
     * @return int data.info.online 1在线,0离线
     */
    public function login() {

        $domain = new Domain_User();
        return $domain->login($this->username, $this->password);
    }

    /**
     * 用户退出
     * @desc 用户退出
     * @return int data.info.online 1在线,0离线
     */
    public function logout() {

        $domain = new Domain_User();
        return $domain->logout($this->username);
    }

}