<?php
/**
 * Created by PhpStorm.
 * User: jianhua.he
 * Date: 2016/8/26
 * Time: 14:12
 */

class Model_Antutu extends PhalApi_Model_NotORM {

    public function getDetailInfo($product) {

        $data = $this->getORM()
            ->select('*')
            ->where('product = ?', $product)
            ->fetchAll();

        return $data;
    }

    public function getTestCountInfo($product) {
        $data = $this->getORM()
            ->select('*')
            ->where('product = ?', $product)
            ->fetchAll();
        $rs = array('count' => count($data));
        return $rs;
    }

    public function importAntutuDataToDB($data) {
        $insert_data = array();
        foreach($data as $item) {
            if($item['A'] == 'version_time' || $item['A'] == 'test_time') {
                continue;// for test here, 正式版本要改
            }
            $insert_data[$item['A']] = $item['C'];
        }
        //再验证是否数据正确。TODO

        //echo var_dump($insert_data);
        $rs = $this->getORM()
            ->insert($insert_data);
        $id = $this->getORM()->insert_id();
        return array('insert_id' => $id);
    }

    public function exportAntutuExcelEmpty() {
        return $this->getTableFieldList();
    }

    protected function getTableName($id) {
        return 'antutu_score_all';
    }

    protected function getCreateTableSQL() {
        return "
        CREATE TABLE IF NOT EXISTS `antutu_score_all` (
            `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
            `product` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'Flash3' COMMENT '测试项目' ,
            `version_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'user' COMMENT 'user userdebug eng version' ,
            `version` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '项目版本' ,
            `version_time`  datetime NULL COMMENT '版本日期' ,
            `test_time`  datetime NULL COMMENT '测试日期' ,
            `tester_email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '测试人邮箱' ,
            `review_tester_email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '审查人邮箱' ,
            `showing_valid` bit NULL DEFAULT b'0' COMMENT '是否显示, 1=ok,0=no' ,
            `score`  int(11) NULL DEFAULT NULL COMMENT 'antutu总分' ,
            `3d`  int(11) NULL DEFAULT NULL COMMENT '3D总分' ,
            `3d_marooned`  int(11) NULL DEFAULT NULL COMMENT '3D Marooned' ,
            `3d_garden`  int(11) NULL DEFAULT NULL COMMENT '3D Garden' ,
            `ux`  int(11) NULL DEFAULT NULL COMMENT 'UX score' ,
            `ux_data_secure`  int(11) NULL DEFAULT NULL COMMENT 'UX Data Secure' ,
            `ux_data_process`  int(11) NULL DEFAULT NULL COMMENT 'UX Data process' ,
            `ux_strategy_games`  int(11) NULL DEFAULT NULL COMMENT 'UX Strategy games' ,
            `ux_image_process`  int(11) NULL DEFAULT NULL COMMENT 'UX Image process' ,
            `ux_io_performance`  int(11) NULL DEFAULT NULL COMMENT 'UX IO performance' ,
            `cpu`  int(11) NULL DEFAULT NULL COMMENT 'CPU score' ,
            `cpu_mathematics`  int(11) NULL DEFAULT NULL COMMENT 'CPU Mathematics' ,
            `cpu_common_use`  int(11) NULL DEFAULT NULL COMMENT 'CPU Common Use' ,
            `cpu_multi_core`  int(11) NULL DEFAULT NULL COMMENT 'CPU Multi-Core' ,
            `ram`  int(11) NULL DEFAULT NULL COMMENT 'RAM' ,
            PRIMARY KEY (`id`)
            )
            ENGINE=MyISAM
            DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
            AUTO_INCREMENT=1
            CHECKSUM=0
            ROW_FORMAT=FIXED
            DELAY_KEY_WRITE=0
            ;
        ";
    }
}