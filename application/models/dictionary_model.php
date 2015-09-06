<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dictionary_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function getProvinceListOfCarId(){
        $sql = "SELECT * FROM `dictionary` WHERE `type` = 'PROVINCE_CARID' ORDER BY `sort`";
        return $this->db->query($sql)->result();
    }
}