<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}//end function
	
	function index()
	{
		$data['welcome_msg'] = "Welcome to Welcome to CE Church Live Streaming Portal";
		$data['page_title'] = "Welcome to CE Church Live Streaming Portal";
		$data['page_content'] = "<h3>Welcome</h3>The IMM Live Streaming Portal affords a user new features and experiences in the streaming of our ministry events and programs. Kindly login using your email and password given to you by your group church. For more information on login into this portal, kindly call the following help lines: ";
		$data['css_class'] = "info";
		$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> Kindly login with your valid details.";
		
		//$this->load->view('feb2014/vw_dashboard', array('data'=>$data));
		$this->load->view('vw_dashboard', array('data'=>$data));
	}//end function
	
	function index2()
	{
		$data['welcome_msg'] = "Welcome to Welcome to CE Church Live Streaming Portal";
		$data['page_title'] = "Welcome to CE Church Live Streaming Portal";
		$data['page_content'] = "<h3>Welcome</h3>The IMM Live Streaming Portal affords a user new features and experiences in the streaming of our ministry events and programs. Kindly login using your email and password given to you by your group church. For more information on login into this portal, kindly call the following help lines: ";
		$data['css_class'] = "info";
		$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> Kindly login with your valid details.";
		
		//$this->load->view('feb2014/vw_dashboard', array('data'=>$data));
		$this->load->view('vw_dash2', array('data'=>$data));
	}//end function
	
	
	function activation(){
		$status_flag = $this->misc->cleanName($this->uri->segment(3));
		
		switch ($status_flag):
			case'success':
				$data['welcome_msg'] = "Welcome to CE Church Live Streaming Portal";
				$data['page_title'] = "Welcome to CE Church Live Streaming Portal";
				$data['page_content'] = "<h3>Welcome</h3>The IMM Live Streaming Portal affords a user new features and experiences in the streaming of our ministry events and programs. Kindly login using your email and password given to you by your group church. For more information on login into this portal, kindly call the following help lines: ";
				$data['css_class'] = "info";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> Your account was successfully activated.";
				
				$this->load->view('vw_dashboard', array('data'=>$data));
			break;
			
			
			case'error':
				$data['welcome_msg'] = "Welcome to CE Church Live Streaming Portal";
				$data['page_title'] = "Welcome to CE Church Live Streaming Portal";
				$data['page_content'] = "<h3>Welcome</h3>The IMM Live Streaming Portal affords a user new features and experiences in the streaming of our ministry events and programs. Kindly login using your email and password given to you by your group church. For more information on login into this portal, kindly call the following help lines: ";
				$data['css_class'] = "info";
				$data['info_msg'] = "<img src=\"/images/icons/invalid_small.png\" align='absmiddle' />Error activating account.";
				
				$this->load->view('vw_dashboard', array('data'=>$data));
			break;
			
			
			case'prevactivated':
				$data['welcome_msg'] = "Welcome to Welcome to CE Church Live Streaming Portal";
				$data['page_title'] = "Welcome to CE Church Live Streaming Portal";
				$data['page_content'] = "<h3>Welcome</h3>The IMM Live Streaming Portal affords a user new features and experiences in the streaming of our ministry events and programs. Kindly login using your email and password given to you by your group church. For more information on login into this portal, kindly call the following help lines: ";
				$data['css_class'] = "info";
				$data['info_msg'] = "<img src=\"/images/icons/invalid_small.png\" align='absmiddle' /> Account already activated.";
				
				$this->load->view('vw_dashboard', array('data'=>$data));
			break;
			
			
			default:
				$data['welcome_msg'] = "Welcome to CE Church Live Streaming Portal";
				$data['page_title'] = "Welcome to CE Church Live Streaming Portal";
				$data['page_content'] = "<h3>Welcome</h3>The IMM Live Streaming Portal affords a user new features and experiences in the streaming of our ministry events and programs. Kindly login using your email and password given to you by your group church. For more information on login into this portal, kindly call the following help lines: ";
				$data['css_class'] = "info";
				$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' />Kindly login with your valid details.";
				
				$this->load->view('vw_dashboard', array('data'=>$data));
				
			
		endswitch;	
			
	}//end function
}//end class
