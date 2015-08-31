<?php defined('BASEPATH') OR exit('No direct script access allowed');
loadController('base');

class insert extends base{
    public function __construct(){
        parent::__construct();
        $this->load->model('vehicle_model');
        $this->load->model('vehicle_info_model');
    }
    public function insertStepOne(){
        if(!(isset($_REQUEST['licence_province'])&&isset($_REQUEST['licence_area'])&&isset($_REQUEST['licence_number']))) echojson(0,'','数据填写不全');
        $res = $this->vehicle_model->findExistsCar($_REQUEST['licence_province'],$_REQUEST['licence_area'],$_REQUEST['licence_number']);
        if(empty($res)){
            $vehicleId = $this->vehicle_model->insertVehicleOnstep($_REQUEST['licence_province'],$_REQUEST['licence_area'],$_REQUEST['licence_number']);
            dump($vehicleId);
        }else{
            echojson(2,"{$_REQUEST['licence_province']}{$_REQUEST['licence_area']} {$_REQUEST['licence_number']}",'该车牌号已注册');
        }
    }
}