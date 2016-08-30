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

    public function importAntutuExcelToDB($file_path, $username, $password) {
        //check the user
        $model_user = new Model_User();
        $status_user = $model_user->login($username, $password);
        if($status_user['code'] != 0 || $status_user['info']['online'] != 1) {
            return $status_user;
        }

        $PHPExcel = new PHPExcel_Lite();
        $res = $PHPExcel->importExcel($file_path);

        $model = new Model_Antutu();
        $fields = $model->exportAntutuExcelEmpty();

        foreach($res as $item) {
            //检查值是否正确 匹配 $res == $fields?
            //echo var_dump($item)."<br><br>";
        }

        return $model->importAntutuDataToDB($res);
    }

    public function exportAntutuExcelEmpty() {
        $model = new Model_Antutu();
        return $model->exportAntutuExcelEmpty();
    }
}