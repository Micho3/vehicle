<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Micho
 * Date: 2015/7/18
 * Time: 14:37
 */

class admin_model extends CI_Model{
    public function checkAdmin($user,$pass){
        $sql = "SELECT * FROM admin WHERE username = '{$user}' AND password = '{$pass}' AND status = 1";
        if($this->db->query($sql)->row() != false){
            return true;
        }else{
            return false;
        }
    }
}