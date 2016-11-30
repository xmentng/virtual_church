<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class guest extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}//end function
	
	public function index()
	{
		$this->load->view('vw_dashboard');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */