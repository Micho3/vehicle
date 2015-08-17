<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/8
 * Time: 17:42
 */

class login extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->display('login/index.html');
    }
}