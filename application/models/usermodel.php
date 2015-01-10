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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

	