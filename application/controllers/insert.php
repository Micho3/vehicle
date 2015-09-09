<?php defined('BASEPATH') OR exit('No direct script access allowed');
loadController('base');

class insert extends base{
    public function __construct(){
        parent::__construct();
        $this->load->model('vehicle_model');
        $this->load->model('vehicle_info_model');
        $this->load->model('area_code_model');
    }
    //录入第一步
    public function insertStepOne() {
        if (!(isset($_REQUEST['licence_province']) && isset($_REQUEST['licence_area']) && isset($_REQUEST['licence_number']))) echojson(0, '', '数据错误');
        $_REQUEST['licence_number'] = strtoupper($_REQUEST['licence_number']);
        $patten = "/^[A-Z0-9]{5}$/";
        if(!preg_match($patten,$_REQUEST['licence_number'])) echojson(0,'','车牌号格式错误');
        $res = $this->vehicle_model->findExistsCar($_REQUEST['licence_province'], $_REQUEST['licence_area'], $_REQUEST['licence_number']);
        if (empty($res)) {
            $vehicleId = $this->vehicle_model->insertVehicleOnstep($_REQUEST['licence_province'], $_REQUEST['licence_area'], $_REQUEST['licence_number']);
            echojson(1, $vehicleId, '添加成功');
        } else {
            echojson(2, $res->id, '数据已存在');
        }
    }
    //ajax获取地区编码
    public function getAreaCode(){
        $pCode = (isset($_REQUEST['code'])&&!empty($_REQUEST['code']))?$_REQUEST['code']:"";
        if($pCode=='') echojson(0,'','参数有误');
        $data = $this->area_code_model->getAreaCode($pCode);
        if($data!=null){
            echojson(1,$data,'查询成功');
        }else{
            echojson(0,'','没有查询到');
        }
    }
    //录入第二步
    public function insertStepTwo(){

    }
}