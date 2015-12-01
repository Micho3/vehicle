<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_model extends CI_Model{
    public function __construct(){
        parent::__construct();  
    }
    //查找已存在的车辆信息
    public function findExistsCar($licence_province,$licence_area,$licence_number){
        $sql = "SELECT * FROM `vehicle` WHERE `licence_province` = '{$licence_province}' AND `licence_area` = '{$licence_area}' AND `licence_number` = '{$licence_number}'";
        return $this->db->query($sql)->row();
    }
    //将车牌信息入库
    public function insertVehicleOnstep($licence_province,$licence_area,$licence_number){
        $sql = "INSERT INTO `vehicle`(`licence_province`,`licence_area`,`licence_number`) VALUES('{$licence_province}','{$licence_area}','{$licence_number}')";
        $res = $this->db->query($sql);
        if($res == true){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    //修改车牌信息
    public function updVehicleStepOne($id,$licence_province,$licence_area,$licence_number){
        $sql = "UPDATE `vehicle` SET `licence_province` = {$licence_province}, `licence_area` = {$licence_area} ,`licence_number` = {$licence_number} WHERE `id` = {$id}";
        $this->db->query($sql)->result();
    }
    //修改车主
    public function updCarOwner($userId,$carId){
        $sql = "UPDATE `vehicle` SET `userId` = '{$userId}' WHERE `id`='{$carId}'";
        return $this->db->query($sql);
    }
    //修改车架、品牌、型号信息
    public function UpdDetailOfCar($carId,$vin,$brand,$series){
        $sql = "UPDATE `vehicle` SET `vin` = '{$vin}' , `brand` = '{$brand}' , `series` = '{$series}' WHERE `id` = '{$carId}'";
        return $this->db->query($sql);
    }
}