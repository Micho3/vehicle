<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/8
 * Time: 10:59
 */
if(!defined('BASEPATH')) EXIT('No direct script asscess allowed');
require_once(APPPATH.'libraries/Smarty/libs/Smarty.class.php');

class Sm extends Smarty{
    public $ci;
    public $sm;

    public function __construct(){
        $this->ci = & get_instance();
        $this->ci->load->config('smarty');
        $this->template_dir = $this->ci->config->item('tempalte_dir');
        $this->compile_dir = $this->ci->config->item('compile_dir');
        $this->cache_dir = $this->ci->config->item('cache_dir');
        $this->config_dir = $this->ci->config->item('config_dir');
        $this->config_ext = $this->ci->config->item('config_ext');
        $this->caching = $this->ci->config->item('caching');
        $this->cache_lefttime = $this->ci->config->item('cache_lefttime');
        $this->left_delimiter = $this->ci->config->item('left_delimiter');
        $this->right_delimiter = $this->ci->config->item('right_delimiter');
    }
}