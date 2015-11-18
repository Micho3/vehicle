<?php defined('BASEPATH') OR exit('No direct script access allowed');
loadController('base');

class Insert extends base{
    public function __construct(){
        parent::__construct();
        $this->load->model('vehicle_model');
        $this->load->model('vehicle_info_model');
        $this->load->model('area_code_model');
        $this->load->model('user_model');
        $this->load->model('dictionary_model');
    }
    //录入第一页
    public function index(){
        $provinceCarId = $this->dictionary_model->getProvinceListOfCarId();//获取省份
        $this->assign('province',$provinceCarId);
        $this->assign('insertFun',$this->common_url['insertFun']);
        $this->display('insert/index');
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
            if($vehicleId){
                echojson(1, $vehicleId, '添加成功');
            }else{
                echojson(0, '', '添加失败');
            }
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
    //录入第二步--获取全部用户
    public function insertStepTwo(){
        $userList = $this->user_model->getUserList();
        $allUser = array();
        if(!empty($userList)){
            $i = 0;
            foreach ($userList as $key=>$val ) {
                $pin = strtoupper($val->pinyin[0]);
                $allUser[$pin][$i]['id'] = $val->id;
                $allUser[$pin][$i]['name'] = $val->name;
                $allUser[$pin][$i]['firCode'] = $pin;
                $i++;
            }
            foreach ($allUser as $key=>$val) {
                $allUser[$key] = array_values($allUser[$key]);
            }
        }else{
            $allUser = null;
        }
        echojson(1,$allUser,'');
    }
    //插入用户
    public function insertUser(){
        if(!(isset($_REQUEST['name'])&&!empty($_REQUEST['name']))) echojson(0,"","姓名为空");
        if(!(isset($_REQUEST['carId'])&&!empty($_REQUEST['carId']))) echojson(0,"","参数错误");
        $data = array();
        $data['name'] = $_REQUEST['name'];
        $data['sex'] = (isset($_REQUEST['sex'])&&$_REQUEST!='-')?intval($_REQUEST['sex']):null;
        $data['company'] = (isset($_REQUEST['company'])&&!empty($_REQUEST['company']))?$_REQUEST['company']:null;
        $data['content'] = (isset($_REQUEST['content'])&&!empty($_REQUEST['content']))?$_REQUEST['content']:null;
        $data['pinyin'] = $this->pin->Pinyin($data['name'],'UTF-8');
        $userId = $this->user_model->insertUser($data);
        if(empty($userId)){
            echojson(0,'','添加用户失败');
        }else{
            $this->vehicle_model->updCarOwner($userId,$_REQUEST['carId']);
            echojson(1,$userId,'添加用户成功');
        }
    }
}