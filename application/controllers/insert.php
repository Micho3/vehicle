<?php defined('BASEPATH') OR exit('No direct script access allowed');
loadController('base');

class insert extends base{
    public function __construct(){
        parent::__construct();
        $this->load->model('vehicle_model');
    }
    public function insertStepOne(){
        if(!(isset($_REQUEST['licence_province'])&&isset($_REQUEST['licence_area'])&&isset($_REQUEST['licence_number']))) echojson(0,'','������д��ȫ');
        $res = $this->vehicle_model->findExistsCar($_REQUEST['licence_province'],$_REQUEST['licence_area'],$_REQUEST['licence_number']);
        if(empty($res)){
            #����
        }else{
            echojson(0,"{$_REQUEST['licence_province']}{$_REQUEST['licence_area']} {$_REQUEST['licence_number']}",'�ó��ƺ���ע��');
        }
        echo json_encode(array('status'=>1,'msg'=>'ceshi','data'=>'12313'));
    }
}