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
            $facebook['user_profile'] = $this->facebook->api('/me');
            $facebook['logout_url'] = site_url('welcome/logout');

            return $facebook;
        }else {

        	return false;           
        }
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

	