<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/31
 * Time: 16:09
 */
class vehicle_info_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    //插入新车辆详情
    public function insertNewDetailOfcar($carId){
        $sql = "INSERT INTO `vehicle_info`(`car_id`) VALUES('{$carId}')";
        return $this->db->query($sql);
    }
}