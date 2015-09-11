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
    public function getUserList(){
        $sql = "SELECT * FROM `user` ORDER BY `pinyin` ASC";
        return $this->db->query($sql)->result();
    }
}