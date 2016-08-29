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
            //interface #1
            'getTestCountInfo' => array(
                'product' 	=> array('name' => 'product', 'default' => 'Flash3', 'desc' => '项目名称'),
            ),

            //interface #2
            'getDetailInfo' => array(
                'product' 	=> array('name' => 'product', 'default' => 'Flash3', 'desc' => '项目名称'),
            ),

            //interface #3
            'exportAntutuExcelEmpty' => array(
                'product' 	=> array('name' => 'product', 'default' => 'Flash3', 'desc' => '忽略这个'),
            ),
        );
    }


    /**
     * @desc 获得这个项目的测试完成结果 详细数据
     * @return array test_detail_information 测试详细数据
     */
    public function getDetailInfo() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());
        if(empty($this->product)) {
            return array('code' => -1, 'msg' => 'have to give product parameter', 'info' => array());
        }

        $domain = new Domain_Antutu();
        $info = $domain->getDetailInfo($this->product);

        $rs['info'] = $info;
        return $rs;
    }

    /**
     * @desc 获得这个项目的测试完成结果次数信息
     * @return int test_result_count 测试结果次数
     */
    public function getTestCountInfo() {
        $rs = array('code' => 0, 'msg' => '', 'info' => array());
        if(empty($this->product)) {
            return array('code' => -1, 'msg' => 'have to give product parameter', 'info' => array());
        }

        $domain = new Domain_Antutu();
        $info = $domain->getTestCountInfo($this->product);

        $rs['info'] = $info;
        return $rs;
    }


    /**
     * @导出antutu上传模板excel文件。
     * @return array file 导出antutu上传模板excel文件
     */
    public function exportAntutuExcelEmpty() {

        $domain = new Domain_Antutu();
        $data = $domain->exportAntutuExcelEmpty();

        $filename    = "Antutu_field_for_upload_sample_v1.0.xlsx";
        $headArr = array();
//        $attr = array();
//        foreach($data as $item) {
//            array_push($attr, $item[0]."-".$item[1]);
//        }
        $PHPExcel = new PHPExcel_Lite();
        $PHPExcel->exportExcel($filename, $data, $headArr);
        //echo "<a href='".$filename."'> download </a>";
        return array();
    }
}