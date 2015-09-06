<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/9/6
 * Time: 15:07
 */
class Area_code_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function getAreaCode($parent_code){
        $sql = "SELECT `code` FROM `area_code` WHERE `parent_code` = '{$parent_code}' AND `status` = 1 ORDER BY `sort` ASC,`code` ASC ";
        return $this->db->query($sql)->result();
    }
}