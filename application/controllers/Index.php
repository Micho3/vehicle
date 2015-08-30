<?php defined('BASEPATH') OR exit('No direct script access allowed');
loadController('base');

class Index extends base {
    public function __construct(){
        parent::__construct();
        $this->load->model('dictionary_model');
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()	{
        $provinceCarId = $this->dictionary_model->getProvinceListOfCarId();//获取省份
        $this->assign('province',$provinceCarId);
        $areaCarId = $this->dictionary_model->getAreaListOfCarId();//获取省份
        $this->assign('area',$areaCarId);
        $this->assign('function',$this->common_url['function']);
        $this->display('index/index');
	}
}
