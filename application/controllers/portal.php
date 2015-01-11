<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portal extends CI_Controller {

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
	public function currencies()
	{

		$this->load->model('Financialmodel');
		$financial['currencies'] = $this->Financialmodel->getCurrneciesToday();

		$data['view']['nav'] = $this->_getNavigationBar();
		$data['view']['content'] = $this->load->view('currencies-list', $financial, TRUE);
		$this->load->view('portal-default', $data);
	}
	public function login(){
		$this->facebook->destroySession();
		$facebookData['login_url'] = $this->facebook->getLoginUrl(array(
            'redirect_uri' => site_url('portal/index'), 
            'scope' => array("email, public_profile")
        ));

		$data['view']['login'] = $this->load->view('login', $facebookData, TRUE);
        $this->load->view('portal-default', $data);
    }
    public function logout(){
		$this->facebook->destroySession();
		redirect('/portal/login');
    }



    public function _getNavigationBar()
	{
		$this->load->model('Usermodel');
		return $this->load->view('nav', $this->Usermodel->getUserProfile(), TRUE);
	}
	public function _output($output)
	{
	    echo $output;
	}
}