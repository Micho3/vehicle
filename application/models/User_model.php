<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/9/10
 * Time: 16:06
 */
class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    //获取用户列表
    public function getUserList(){
        $sql = "SELECT * FROM `user` ORDER BY `pinyin` ASC";
        return $this->db->query($sql)->result();
    }
    //插入用户
    public function insertUser($data){
        $sql = "INSERT INTO `user` (`name`,`content`,`sex`,`company`,`pinyin`) VALUES ({$data['name']},{$data['content']},{$data['sex']},{$data['company']},{$data['pinyin']})";
        if($this->db->query($sql))
            return $this->db->last_insert_id();
        else
            return false;
    }
}