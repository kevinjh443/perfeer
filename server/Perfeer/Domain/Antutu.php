<?php
/**
 * Created by PhpStorm.
 * User: jianhua.he
 * Date: 2016/8/26
 * Time: 14:07
 */


class Domain_Antutu {

    public function getDetailInfo($product) {

        $model = new Model_Antutu();
        return $model->getDetailInfo($product);
    }

    public function getTestCountInfo($product) {
        $model = new Model_Antutu();
        return $model->getTestCountInfo($product);
    }
}