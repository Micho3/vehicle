<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/18
 * Time: 14:31
 */
class base extends  MY_Controller{
    public function __construct(){
            parent::__construct();
        //验证登陆
        //$this->checkLogin();
        $this->load->helper('url_helper');
        $this->load->model('admin_model');
        $this->assign('static',$this->static);
        $this->assign("url",$this->common_url);
    }
    //验证登陆
    private function checkLogin(){
        //判断用户是否登陆切登录状态是否正确
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user']['username'];
            $pass = md5($_SESSION['user']['password']);
            if(!$this->admin_model->checkAdmin($user,$pass)){
                session_unset();
                redirect($this->common_url['login']);
            }else{
                $_SESSION['return'] = $_SERVER['referer'];
            }
        }else{
            session_unset();
            redirect('login/index');
        }
    }
}