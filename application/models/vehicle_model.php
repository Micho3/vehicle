<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_model extends CI_Model{
    public function __construct(){
        parent::__construct();  
    }
    public function findExistsCar($licence_province,$licence_area,$licence_number){
        $sql = "SELECT * FROM `vehicle` WHERE `licence_province` = '{$licence_province}' AND `licence_area` = '{$licence_area}' AND `licence_number` = '{$licence_number}'";
        return $this->db->query($sql)->row();
    }
    public function insertVehicleOnstep($licence_province,$licence_area,$licence_number){
        $sql = "INSERT INTO `vehicle`(`licence_province`,`licence_area`,`licence_number`) VALUES('{$licence_province}','{$licence_area}','{$licence_number}')";
        $res = $this->db->query($sql);
        if($res == true){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    public function updVehicleStepOne($id,$licence_province,$licence_area,$licence_number){
        $sql = "UPDATE `vehicle` SET `licence_province` = {$licence_province}, `licence_area` = {$licence_area} ,`licence_number` = {$licence_number} WHERE `id` = {$id}";
        $this->db->query($sql)->result();
    }
    //修改车辆所属人
    public function updCarOwner($userId,$carId){
        $sql = "UPDATE `vehicle` SET `userId` = '{$userId}' WHERE `id`='{$carId}'";
        return $this->db->query($sql);
    }
}