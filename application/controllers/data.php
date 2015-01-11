<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller {

	public function __construct(){
		parent::__construct();

        $this->load->helper('url');
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

	}
	public function getCurrencyFull($currency){
		$this->load->model('Financialmodel');
		$output = json_encode($this->Financialmodel->getCurrencyFull($currency));

		$this->output->set_content_type('application/json');
		$this->output->set_output($output);
	}
}