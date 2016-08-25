<?php
/**
 *
 * Antutu interface
 * Created by PhpStorm.
 * User: jianhua.he
 * Date: 2016/8/25
 * Time: 19:12
 */

class Api_Antutu extends PhalApi_Api {

    public function getRules() {
        return array(
            'getTestCompletedInfo' => array(
                'product' 	=> array('name' => 'product', 'default' => 'Flash3', 'desc' => '项目名称'),
            ),
        );
    }

    /**
     * @desc 获得这个项目的测试完成结果次数信息
     * @return int test_result_count 测试结果次数
     */
    public function getTestCompletedInfo() {
        $rs = array('code' => 0, 'msg' => '000000', 'info' => array());
        if(empty($this->product)) {
            return array('code' => -1, 'msg' => 'have to give product parameter', 'info' => array());
        }

        return $rs;
    }
}