<?php
/**
 * Created by PhpStorm.
 * User: jianhua.he
 * Date: 2016/8/29
 * Time: 10:54
 */

class Api_Upload extends PhalApi_Api {

    /**
     * 获取参数
     * @return array 参数信息
     */
    public function getRules() {
        return array(
            'uploadAntutuExcel' => array(
                'file' => array(
                    'name' => 'file',
                    'type' => 'file',
                    'min' => 0,
                    'max' => 1024 * 1024,
                   // 'range' => array('image/jpg', 'image/jpeg', 'image/png'),
                    'ext' => array('xls', 'xlsx')
                ),
            ),
        );
    }

    /**
     * 上传文件
     * @return string $url 绝对路径
     * @return string $file 相对路径，用于保存至数据库，按项目情况自己决定吧
     */
    public function uploadAntutuExcel() {

        DI()->loader ->addDirs('Library');

        DI()->ucloud = new UCloud_Lite();

        //设置上传路径 设置方法参考3.2
        DI()->ucloud->set('Upload',date('Y/m/d'));

        $filename = date('YmdHis');
        $filename = 'AntutuTestData_'.$filename;
        //新增修改文件名设置上传的文件名称
        DI()->ucloud->set('file_name', $filename);

        //上传表单名
        $rs = DI()->ucloud->upfile($this->file);

        $this -> importAntutuExcelToDB('../Perfeer/Upload/'.$rs['file']);//attention the path

        return $rs;
    }

    private function importAntutuExcelToDB($file_path) {

        $domain = new Domain_Antutu();
        return $domain->importAntutuExcelToDB($file_path);
    }
}