<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Giving extends CI_Controller{
	//protected $trans_id;
	
	public function index(){
		
	}
	
	public function checkout(){
		if($this->session->userdata('user_name')==""){
			$here = $_SERVER['REQUEST_URI'];
			header('Location: /auth/login?ref='.urlencode($here));
			exit;
		}
		$data['title'] = "Online Giving - Checkout";
		$view = "may2014/payment_checkout";
		
		$this->load->view($view, $data);
	}
	
	public function pay(){
		if($this->session->userdata('user_name')==""){
			$here = $_SERVER['REQUEST_URI'];
			header('Location: /auth/login?ref='.urlencode($here));
			exit;
		}
		if(isset($_POST['submit'])) {
			$username = $this->session->userdata('user_name');
			$category = $this->input->post('category');
			$currency = $this->input->post('currency');
			$amount = $this->input->post('amount');
			$trans_id = $this->input->post('trans_id');
			
			if($amount==""){
				header('Location: /giving/checkout?msg='.md5("failed"));
				exit;
			}
			
			$details = array(
				'amount'		=> $amount,
				'category_code'	=> $category,
				'time_posted'	=> time(),
				'user_account'	=> $username,
				'TransactionRef'=> $trans_id,
				'currency'		=> $currency
			);
			
			$saved = mysql::insert($details, 'online_church_giving');
			
			if(!$saved){
				header('Location: /giving/checkout');
				exit;
			}
			$data = $_POST;
		} else {
			header('Location: /giving/checkout');
			exit;
		}
		####
		$data['title'] = "Online Giving - Pay";
		$this->load->view('may2014/pay', $data);
	}
	
	public function pay2(){
		$this->load->view('may2014/pay2');
	}
	
	public function thank_you(){
		
	}
}