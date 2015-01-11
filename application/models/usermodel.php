<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_Model {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function authorization()
	{
		$user = $this->facebook->getUser();

        if($user) {
            return true;
        }else {
        	return false;           
        }
	}
    public function getUserProfile(){
        $user = $this->facebook->getUser();

        $facebook['user']['user_profile'] = $this->facebook->api('/me');
        $facebook['user']['logout_url'] = site_url('portal/logout');

        return $facebook;
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

	