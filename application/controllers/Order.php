<?php defined('BASEPATH') OR exit('No direct script access allowed');
loadController('Base');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/14
 * Time: 6:05
 */
class Order extends Base{
    public function __construct() {
        parent::__construct();
    }
     // description:订单录入页
    public function index(){
        $this->display('order/index');
    }
}