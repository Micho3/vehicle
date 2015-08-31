<?php if (!defined('BASEPATH')) exit('No direct access allowed.');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/8
 * Time: 11:29
 */
class MY_Controller extends CI_Controller{
    public $sm;
    public function __construct(){
        parent::__construct();
        session_start();
        $this->load->library('Sm');
        $this->load->library('pin');
        $this->load->helper('url');
        $this->sm = new Sm();
        $this->loadConfig();
        $this->load->helper('url_helper');
    }
    //加载默认配置
    public function loadConfig(){
        $this->load->config('common_url');
        $this->load->config('static_url');
        $this->common_url = $this->config->item('common_url');
        $this->static = $this->config->item('static_url');
    }
    //将smarty的方法写入父类
    public function assign($key,$value){
        $this->sm->assign($key,$value);
    }
    //作用同上
    public function display($html){
        $this->sm->display(APPPATH."views\\".$html.".html");
    }
}