<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portal extends CI_Controller {

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

		$data['view']['nav'] = $this->load->view('nav', NULL, TRUE);
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
}