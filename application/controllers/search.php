<?php defined('BASEPATH') OR exit('No direct script access allowed');
loadController('base');


class search extends base{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->display('search/index');
    }
}