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
	public function currency($from = NULL, $to = NULL, $dateFrom = NULL, $dateTo  = NULL){
		$this->load->model('Financialmodel');
		$output = json_encode($this->Financialmodel->getCurrencyRates($from, $to, $dateFrom, $dateTo));

		$this->output->set_content_type('application/json');
		$this->output->set_output($output);
	}
}