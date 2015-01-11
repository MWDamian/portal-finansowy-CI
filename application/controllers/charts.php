<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charts extends CI_Controller {

	public function __construct(){
		parent::__construct();

        $this->load->helper('url');
		$this->load->helper('autoload');
		$this->load->library('facebook'); 

		if($this->router->method != 'login'){
			$this->load->model('Usermodel');
			if(!$this->Usermodel->authorization()){
				redirect('/portal/login');
			}
		}
	}
	public function index()
	{
		$this->currencies();
	}
	public function currencies($currency){
		$this->load->library('../controllers/portal');
		$financial['type'] = 'currency';
		$financial['content'] = $currency;

		$data['view']['nav'] = $this->portal->_getNavigationBar();
		$data['view']['content'] = $this->load->view('charts/stock', $financial, TRUE);
		$this->load->view('portal-default', $data);
	}
}