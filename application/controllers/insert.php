<?php defined('BASEPATH') OR exit('No direct script access allowed');
loadController('base');

class insert extends base{
    public function __construct(){
        parent::__construct();
        $this->load->model('vehicle_model');
        $this->load->model('vehicle_info_model');
    }
    public function insertStepOne(){
        if(!(isset($_REQUEST['licence_province'])&&isset($_REQUEST['licence_area'])&&isset($_REQUEST['licence_number']))) echojson(0,'','数据错误');
        if(isset($_REQUEST['carId'])){
            $res = $this->vehicle_model->updVehicleStepOne($_REQUEST['carId'],$_REQUEST['licence_province'],$_REQUEST['licence_area'],$_REQUEST['licence_number']);
            if($res==true){
                echojson(1,$_REQUEST['carId'],'修改记录成功');
            }else{
                echojson(0,$_REQUEST['carId'],'失败');
            }
        }else{
            $res = $this->vehicle_model->findExistsCar($_REQUEST['licence_province'],$_REQUEST['licence_area'],$_REQUEST['licence_number']);
            if(empty($res)){
                $vehicleId = $this->vehicle_model->insertVehicleOnstep($_REQUEST['licence_province'],$_REQUEST['licence_area'],$_REQUEST['licence_number']);
                echojson(1,$vehicleId,'添加成功');
            }else{
                echojson(2,$res->id,'数据已存在');
            }
        }
    }
}