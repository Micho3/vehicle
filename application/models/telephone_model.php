<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/11/24
 * Time: 6:32
 */
class telephone_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    //将数据插入表
    public function insertData($userId,$telArr){
        $sql = "INSERT INTO `telephone` VALUES";
        foreach ($telArr as $key=>$val) {
            $sql .= "('{$userId}','{$val}'),";
        }
        $sql = rtrim($sql,',');
        return $this->db->query($sql);
    }
}