<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	
	public function welcome(){
		$this->session->set_userdata('has_been_welcomed', 'isset');
		$this->load->view('landing3');
	}
	
	public function index1(){
		error_reporting(E_ALL);
		global $page_res, $comment;
		sessiondata::general_page_resource();
		if(!$this->session->set_userdata('has_been_welcomed')){
			redirect('home/welcome');
		}
		
		//get the testimonies under this church id
		$testimony = useraccount::loadDetails($tableName="tbl_testimonies",$arrFilter=array('church_id'=>7,'status'=>1),$arrAttribute=array('id', 'church_id', 'user_name', 'test_format', 'test_video_path', 'test_pic_path', 'test_body', 'time_posted', 'status'),$num=NULL,$orderBy='');
		
		$data['n_testimonies'] = useraccount::count_active_records($sql="SELECT * FROM tbl_testimonies WHERE church_id=\"7\" AND status='1' ");
		
		//$this->load->library('sessiondata');
		$data['testimony'] = $testimony;
		$data['data'] = $data;
		$data['title'] = "Christ Embassy Virtual Church";
		if($this->session->userdata('user_name')!=""){
			$data['firstname'] = $this->session->userdata('first_name');
			$data['lastname'] = $this->session->userdata('last_name');
		}
		
		$view = "may2014/view_home";
		$this->load->view($view, $data);
	}
	
	public function index(){
		if(!$this->session->userdata('has_been_welcomed')){
			redirect('home/welcome');
		}
		//global $page_res, $comment;
		//sessiondata::general_page_resource();
		$data['page_title'] = "Home";
		$data['videos'] = useraccount::loadDetails($tblname="tbl_videos",$arrFilter=array('approved'=>1),$arrAttribute=array('id','video_code','church_id', 'video_title','video_desc' , 'video_url', 'video_thumbnail_url' , 'video_category', 'approved', 'time_posted'),$num=1, $orderBy=array('id'=>'DESC'));
		$data['testimonies'] = useraccount::loadDetails($tableName="tbl_testimonies",$arrFilter=array('status'=>1),$arrAttribute=array('id', 'church_id', 'user_name', 'test_format', 'test_video_path', 'test_pic_path', 'test_body', 'time_posted', 'status'),$num=6, $orderBy=array('id'=>'DESC'));
		
		foreach($data['testimonies'] as &$usr){
			$name = useraccount::getAttributeValue(array('user_name','first_name', 'last_name'), $tblname="tbl_users", $where=array('user_name'=>$usr['user_name']), $retval=array("first_name", "last_name"));
			$usr['full_name'] = $name['first_name']." ".$name['last_name'];
		}
		
		$this->load->view('home', $data);
	}
	
	public function index2(){
		$this->load->view('index2');
	}
	
	public function prayer(){
		if($this->session->userdata('user_name')==""){
			$here = $_SERVER['REQUEST_URI'];
			$this->session->set_flashdata('error', 'Log in to continue');
			header('Location: '.base_url().'auth/login?ref='.urlencode($here));
			exit;
		}
		if($this->input->post()){
			$user_id = NULL;
			if($this->input->post('user_id'))
				$user_id = $this->input->post('user_id');
			$name = mysql_real_escape_string($this->input->post('name', TRUE));
			$location = mysql_real_escape_string($this->input->post('city', TRUE));
			$title = mysql_real_escape_string($this->input->post('title', TRUE));
			$message = mysql_real_escape_string($this->input->post('message', TRUE));
			$time = time();
			
			$this->mysql->InsertRow('prayer_wall', array('name'=>$name, 'location'=>$location, 'title'=>$title, 'message'=>$message, 'timeposted'=>$time));
		}
		$data['page_title'] = "Prayer Wall";
		$data['prayers'] = useraccount::loadDetails($tableName="prayer_wall",$arrFilter=array('approved'=>1),$arrAttribute=array('id', 'user_id', 'name', 'location', 'title', 'message', 'approved', 'timeposted'),$num=null, $orderBy=array('id'=>'DESC'));
		foreach($data['prayers'] as &$p){
			$p['count'] = useraccount::count_active_records("SELECT `id` FROM `i_prayed` WHERE `prayer_id`='".$p['id']."'");
			if(useraccount::has_prayed($this->session->userdata('id'), $p['id'])){
				$p['iprayed'] = 1;
			}
		}
		$this->load->view('prayer_wall', $data);
	}
	
	public function ajax_iprayed(){
		if($this->session->userdata('user_name')==""){
			$here = $_SERVER['REQUEST_URI'];
			header('Location: '.base_url().'auth/login?ref='.urlencode($here));
			exit;
		}
		$action = $this->input->post('action');
		$prayer_id = $this->input->post('prayer_id');
		$user_id = $this->session->userdata('user_id');
		
		if($action=="prayed"){
			if(useraccount::say_prayed($user_id, $prayer_id)){
				echo "success";
			}else{
				echo "failed";
			}
		}else{
			if(useraccount::say_not_prayed($user_id, $prayer_id)){
				echo "success";
			}else{
				echo "failed";
			}
		}
	}

    public function soul_diary(){
        if($this->session->userdata('user_name')==""){
            $here = $_SERVER['REQUEST_URI'];
            $this->session->set_flashdata('error', 'Log in to continue');
            header('Location: '.base_url().'auth/login?ref='.urlencode($here));
            exit;
        }
        if($this->input->post()){
            //invite a friend form submitted
            $this->load->library('form_validation');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_users.email]');
            $this->form_validation->set_rules('country','Country','required');
			$this->form_validation->set_message('is_unique', 'The user with this email address already exists');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '</div>');

            if($this->form_validation->run()!=FALSE){
                $arr['first_name'] = $this->input->post('first_name', true);
                $arr['last_name'] = $this->input->post('last_name', true);
                $arr['email'] = $this->input->post('email', true);
                $arr['phone'] = $this->input->post('phone', true);
                $arr['country'] = $this->input->post('country', true);

                $arr['hash_code'] = $this->misc->random_string("unique", 100);
                $arr['user_id'] = $this->session->userdata('id');

                //insert
                mysql::insert($arr, 'tbl_invitees');

                //send mail
                $mail_subject = "Christ Embassy Church Online Invitation";
                $mail_message = "<p>Dear ".$arr['first_name']." ".$arr['last_name']."!</p>
                <p>You have been invited to Christ Embassy Church Online by ".ucfirst($this->session->userdata('first_name'))." ".ucfirst($this->session->userdata('last_name'))."</p>
                <p>Kindly click <a href='".base_url("auth/invitation/".$arr['hash_code'])."'>here</a> to accept the invitation</p>
                <p>or copy the URL below into the address bar of your browser and hit Enter</p>
                <p>".base_url("auth/invitation/".$arr['hash_code'])."</p>
                <p>God Bless you!</p>
                <small>&copy ".date("Y")." Christ Embassy Church Online</small>";
                $headers = "Content-type: text/html\r\nFrom: Christ Embassy Church Online <no-reply@christembassy.org>";
                mail($arr['email'], $mail_subject, $mail_message, $headers);

                $this->session->set_flashdata('success', "Invitation to ".$arr['first_name']." ".$arr['last_name']." has been sent");
                redirect(base_url("home/soul_diary"));

            }
        }
        $query = $this->db->get_where('tbl_users', array('invited_by'=>$this->session->userdata('id')));
        $data['souls'] = $query->result();
        $this->load->view('my_soul_diary', $data);
    }
	
	public function freebies(){
		$data['freebies'] = useraccount::loadDetails("tbl_freebies", array("enabled"=>1), array('id', 'title', 'description', 'thumbnail_path', 'media_type', 'file_path', 'posted_at'), NULL, array("id"=>'DESC'));
		if($data['freebies']==false){
			$data['freebies'] = array();
		}
		$data['page_title'] = "Freebies";
		
		$this->load->view('freebies', $data);
	}
	
	public function contactus(){
		if($this->input->post()){
			$name = $this->input->post("name", true);
			$email = $this->input->post("email", true);
			$tel = $this->input->post("tel", true);
			$message = $this->input->post("message", true);
			
			$to = "peterojo@loveworld360.com";
			$subject = "Message from ".$name." at Christ Embassy Online Church";
			$headers = "From: Christ Embassy Online Church<no-reply@christembassy.org>\r\nContent-type: text/html";
			
			mail($to, $subject, $message, $headers);
			$this->session->set_flashdata('success','Your message has been sent');
			redirect(base_url("home"));
		}else{
			$this->session->set_flashdata('error','No message sent. Click "Contact Us" to send a message');
			redirect(base_url("home"));
		}
	}
	
	public function liveservice(){
		if($this->session->userdata('user_name')==""){
			$here = $_SERVER['REQUEST_URI'];
			header('Location: /auth/login?ref='.urlencode($here));
			exit;
		}else{
			$data['title'] = "Live Service - Christ Embassy Virtual Church";
			$data['firstname'] = $this->session->userdata('first_name');
			$data['lastname'] = $this->session->userdata('last_name');
			
			$this->load->view('may2014/live_service', $data);
		}
	}
	
	public function commservice(){
		if($this->session->userdata('user_name')==""){
			$here = $_SERVER['REQUEST_URI'];
			header('Location: /auth/login?ref='.urlencode($here));
			exit;
		}else{
			$data['title'] = "Global Communion Service";
			$data['firstname'] = $this->session->userdata('first_name');
			$data['lastname'] = $this->session->userdata('last_name');
			
			$this->load->view('may2014/comm_service', $data);
		}
	}

    public function online_giving(){
        $this->load->view("online_giving");
    }

    public function foundation_school(){
        $this->load->view("foundation_school");
    }

	public function servicehighlights(){
		$data['title'] = "Service Highlights - Christ Embassy Virtual Church";
		if($this->session->userdata('user_name')!=""){
			$data['firstname'] = $this->session->userdata('first_name');
			$data['lastname'] = $this->session->userdata('last_name');
		}
		
		$this->load->view('may2014/service_highlights', $data);
	}
	
	public function partnership(){
		$data['title'] = "Partnership Arms - Christ Embassy Virtual Church";
		
		
		$this->load->view('may2014/partnership', $data);
	}
	
	public function resources(){
		$data['title'] = "Ministry Resources - Christ Embassy Virtual Church";
		
		
		$this->load->view('may2014/resources', $data);
	}
	
	public function fschool(){
		$data['title'] = "Foundation School - Christ Embassy Virtual Church";
		
		
		$this->load->view('may2014/fschool', $data);
	}
	
	public function cellmin(){
		$data['title'] = "Cell Ministry - Christ Embassy Virtual Church";
		
		
		$this->load->view('may2014/cellmin', $data);
	}
	
	function waitingList(){
	
		$email = mysql_real_escape_string($_POST['email']);
		$for = mysql_real_escape_string($_POST['w_for']);
		
		//validate email;
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			util_lib::display_message($arrMessage=array('This email addresss is not valid. please try again'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			exit;
		}
		//$user = useraccount::loadDetails('tbl_users',$arrFilter=array('email'=>$email),$arrAttribute=array('first_name', 'last_name', 'user_name', 'user_pwd'),$num=1,$orderBy='');
		
		$sql = "SELECT * FROM tbl_waiting WHERE email=\"$email\" AND waiting_for=\"$for\"";
		
		$store = mysql_query($sql) or die(mysql_error());
		$num_rows = mysql_num_rows($store);
		
		if($num_rows>0){
			util_lib::display_message($arrMessage=array('You are already subscribed. We will get back to you soon.'), $msg_type='failure', $img_source='/images/icons/invalid_small.png');
			exit;
		}
		
		$insert = mysql_query("INSERT INTO tbl_waiting(email, waiting_for) VALUES('{$email}', '{$for}')") or die(mysql_error());
		//var_dump($user); exit;
		if($insert){
			util_lib::display_message($arrMessage=array('Thank you for subscribing! we\'ll get back to you soon.'), $msg_type='success', $img_source='/images/icons/success_small.png');
			exit;
		}
	}//end function
	
	function save_saved(){
		$fname = mysql_real_escape_string($_POST['fname']);
		$lname = mysql_real_escape_string($_POST['lname']);
		$email = mysql_real_escape_string($_POST['email']);
		$phone = mysql_real_escape_string($_POST['phone']);
		$country = mysql_real_escape_string($_POST['country']);
		
		if(empty($fname)||empty($lname)||empty($email)||empty($country)){
			echo "some required fields are missing";
			exit;
		}

        $sql0 = "UPDATE tbl_users SET phone_no = '{$phone}', country = '{$country}' WHERE email = '{$email}'";
        mysql_query($sql0);
        $this->session->set_userdata('phone_no', $phone);
        $this->session->set_userdata('country', $country);

		$sql = "INSERT INTO n_converts(fname, lname, email, phone, country) VALUES('{$fname}', '{$lname}', '{$email}', '{$phone}', '{$country}')";
		$query = mysql_query($sql) or die(mysql_error());
		if($query){
			echo "success";
		}else{
			echo "failed";
		}
	}
	
	function remotequery(){
		$sql = "CREATE TABLE IF NOT EXISTS `tbl_waiting` (
		  `email` varchar(100) NOT NULL,
		  `waiting_for` varchar(10) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		//$query = mysql_query($sql) or die(mysql_error());
		if($query)
		echo "success";
	}
	
	function subscribe(){
		$data['email'] = $this->input->post('subscriber_email');
		if(!empty($data['email'])){
			if(useraccount::isUnique("tbl_subscribers", $data)){
				$this->db->insert('tbl_subscribers', $data);
				if($this->db->affected_rows()>0){
					echo "success";
				}else{
					echo "Unable to subscribe. Please try again later.";
				}
			}else{
				echo "This email has already been subscribed.";
			}
		}else{
			echo "No data entered.";
		}
	}

	public function ministry_events()
	{
		$this->load->view('ministry_events');
	}
	
}
