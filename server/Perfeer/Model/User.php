<?php
/**
 * Created by PhpStorm.
 * User: jianhua.he
 * Date: 2016/8/27
 * Time: 18:02
 */

class Model_User extends PhalApi_Model_NotORM {

    public function login($username, $password) {

        $rs = array('code' => 0, 'msg' => '', 'info' => array());
        $data = $this->getORM()
            ->select('*')
            ->where('username = ? AND password = ?', $username, $password)
            ->fetchOne();

        if(empty($data) || count($data) == 0 || $data['id'] < 1) {
            $rs['code'] = -1;
            $rs['msg'] = "cannot find this user : ".$username.". pealse contacts with admin to add user";
        } else {
            $this->getORM()->where('username = ? AND password = ?', $username, $password)->update(array('online' => 1));
            $data['online'] = 1;
            $rs['info'] = $data;
        }
        return $rs;
    }

    public function logout($username) {

        $rs = array('code' => 0, 'msg' => '', 'info' => array());
        $data = $this->getORM()
            ->select('*')
            ->where('username = ?', $username)
            ->fetchOne();

        if(empty($data) || count($data) == 0 || $data['id'] < 1) {
            $rs['code'] = -1;
            $rs['msg'] = "cannot find this user : ".$username.". pealse contacts with admin to add user";
        } else {
            $this->getORM()->where('username = ? AND password = ?', $username, $password)->update(array('online' => 0));
            $data['online'] = 0;
            $rs['info'] = $data;
        }
        return $rs;
    }


    protected function getTableName($id) {
        return 'user';
        /**
         * CREATE TABLE IF NOT EXISTS `user` (
        `id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id' ,
        `username`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'TESTER' COMMENT '用户名' ,
        `password`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '12345678' COMMENT '用户密码' ,
        `online`  bit(1) NULL DEFAULT b'0' COMMENT '在线情况' ,
        `permission`  int(11) NULL DEFAULT 0 COMMENT '权限等级' ,
        `email`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮箱' ,
        `department`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '部门' ,
        PRIMARY KEY (`id`)
        )
        ENGINE=MyISAM
        DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
        AUTO_INCREMENT=1
        CHECKSUM=0
        ROW_FORMAT=DYNAMIC
        DELAY_KEY_WRITE=0
        ;
         */
    }
}