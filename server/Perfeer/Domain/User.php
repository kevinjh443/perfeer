<?php
/**
 * Created by PhpStorm.
 * User: jianhua.he
 * Date: 2016/8/27
 * Time: 18:00
 */

class Domain_User {

    public function login($username, $password) {

        $model = new Model_User();
        return $model->login($username, $password);
    }

    public function logout($username) {

        $model = new Model_User();
        return $model->logout($username);
    }
}