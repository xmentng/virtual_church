<?php
class Migrate extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//only run this through terminal
		if($this->input->is_cli_request() == FALSE){
			show_404();
		}
	}
	public functiontion index(){
		echo "Your head odia Pablo";
	}
}
?>