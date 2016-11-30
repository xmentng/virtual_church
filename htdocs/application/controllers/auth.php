<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct() {
		parent::__construct();

	}//end function
	
	public function processlogindetails()
	{
		if($this->session->userdata('user_name')!=""){
			$this->session->set_flashdata('error', 'You are already logged in');
			redirect(base_url());
		}
		$email = mysql_real_escape_string($this->input->post('email'));
		$password = mysql_real_escape_string($this->input->post('password'));
		$from = $this -> input -> post('_from');
		
		$user = authmanager::authenticate_user($email, $password);
		/*
		echo "<pre>";
		die(var_dump($user));*/
		
		if($user!=false){
			$this->session->set_userdata('user_id', $user['id']);
			$this->session->set_userdata($user);
			//die(var_dump($this->session->all_userdata()));
			mysql::update($tbl = 'tbl_users', $setflds = array('is_online' => 1), $where = array('email' => $email));
			mysql::update($tbl = 'tbl_users', $setflds = array('is_logged_in' => 1, 'enabled' => 1), $where = array('id' => $this -> session -> userdata('user_id')));
			mysql::insert(array('user_id' => $this -> session -> userdata('user_id'), 'time_logged_in' => time(), 'is_logged_in' => 1), "tbl_log_sessions");
			
			$this->session->set_flashdata('success', 'Log in successful!');
			if($from==""){
				redirect("home");
			}else{
				redirect($from);
			}
		}else{
			$this->session->set_flashdata('error', 'Error! Invalid log in credentials!');
			redirect("auth/login");
		}
	}
	
	function processlogindetails1() {

		$email = validator_lib::cleanUserName($this -> input -> post('email'));

		$pwd = mysql_real_escape_string($this -> input -> post('usr_pwd'));

		$from = $this -> input -> post('from');
		//echo $pwd; exit;

		$_church_id = 0;
		$_flag_notfound = false;

		$user = authmanager::authenticate_user($email, $pwd);

		if ($user) {
			$_acc_level = $this -> authmanager -> get_user_access_level($user['access_level_id'][0], $tblname = "tbl_access_levels");

			if ($_acc_level) {
				$is_updated = mysql::update($tbl = 'tbl_users', $setflds = array('is_online' => 1), $where = array('user_name' => $usr));

				$this -> session -> set_userdata($user);
				$this -> session -> set_userdata(array('session_id' => misc::random_string('alnum', 30)));

				//load the session library and create the session information

				$this -> load -> library('sessiondata');

				global $page_res;
				sessiondata::general_page_resource();

				//update the user log timer
				mysql::insert(array('user_id' => $this -> session -> userdata('user_id'), 'time_logged_in' => time(), 'is_logged_in' => 1), "tbl_log_sessions");
				mysql::update($tbl = 'tbl_users', $setflds = array('is_logged_in' => 1, 'enabled' => 1), $where = array('id' => $this -> session -> userdata('user_id')));

				//echo "success|".$_acc_level;	exit;
				if ($from != "") {
					echo "success|" . $this -> input -> post('from');
					exit ;
				} else {
					echo "success|/home/";
					exit ;
				}

			} else {
				//echo "success|".$_SERVER['REQUEST_URI']; exit;
				echo "success|/home/";
				exit ;

			}//

		} else {
			#header("Location:/auth/login/?refr=".base64_encode($_SERVER['REQUEST_URI'])."");
			echo "failure| <img src=\"/images/icons/invalid_small.png\" align='absmiddle' /> Kindly ensure your user details are valid.";
		}//end if-else

	}//end function
	
	function register() {
		if($this->session->userdata('user_name')!=""){
			$this->session->set_flashdata('error', 'You are already logged in');
			redirect(base_url());
		}
		$from = $this -> input -> get('ref');
		if ($from != "")
			$data['from'] = urldecode($from);
		if($this->input->post()){
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '</div>');
			//$this->form_validation->set_rules('user_name','Username','required|alpha_numeric|is_unique[tbl_users.user_name]|trim');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('rpassword','Repeat Password','required|matches[password]');
			$this->form_validation->set_rules('first_name','First Name','required');
			$this->form_validation->set_rules('last_name','Last Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tbl_users.email]');
			$this->form_validation->set_rules('phone','Phone Number','required');
			$this->form_validation->set_rules('country','Country','required');
			$this->form_validation->set_rules('dob','Date Of Birth','required');
			
			if($this->form_validation->run()!=FALSE){
				$details['user_name'] 	= mysql_real_escape_string($this->input->post('email'));
				$details['user_pwd'] 	= mysql_real_escape_string($this->input->post('password'));
				$details['first_name'] 	= mysql_real_escape_string($this->input->post('first_name'));
				$details['last_name'] 	= mysql_real_escape_string($this->input->post('last_name'));
				$details['email'] 		= mysql_real_escape_string($this->input->post('email'));
				$details['phone_no'] 	= mysql_real_escape_string($this->input->post('phone'));
				$details['country'] 	= mysql_real_escape_string($this->input->post('country'));
				$dob = explode("/", $this->input->post("dob"));
				$details['birth_day'] = $dob[0];
				$details['birth_month'] = $dob[1];
				$details['birth_year'] = $dob[2];
				$details['status'] = 1;
				
				$from = $this -> input -> post('_from');
				
				if($_FILES['profile_pic']['size']!=0){
					$dir = "user_res/pics/";
					$ext = strtolower(strrchr($_FILES['profile_pic']['name'], "."));
					//die(var_dump($ext));
					if(!in_array($ext, array(".png", ".jpg", ".jpeg", ".gif"))){
						$this->session->set_flashdata('error', 'Error! Unsupported image format');
						redirect("auth/register/".(($from!="")?"?ref=".$from:""));
					}else{
						$destination = $dir.str_replace(array("@", "."), "", $details['user_name']).time().$ext;
						if(move_uploaded_file($_FILES['profile_pic']['tmp_name'], $destination)){
							$details['profile_pic'] = $destination;
						}else{
							$this->session->set_flashdata('error', 'Error! Unable to upload image');
							redirect("auth/register/".(($from!="")?"?ref=".$from:""));
						}
					}
				}
				
				$this->db->insert('tbl_users', $details);
				if($this->db->affected_rows()>0){
					// registration successful
					if($from!=""){
						//log in automatically and redirect to intended page
						$user = authmanager::authenticate_user($details['email'], $details['user_pwd']);
						if($user!=false){
							$this->session->set_userdata('user_id', $user['id']);
							$this->session->set_userdata($user);
							
							mysql::update($tbl = 'tbl_users', $setflds = array('is_online' => 1), $where = array('user_name' => $username));
							mysql::update($tbl = 'tbl_users', $setflds = array('is_logged_in' => 1, 'enabled' => 1), $where = array('id' => $this -> session -> userdata('user_id')));
							mysql::insert(array('user_id' => $this -> session -> userdata('user_id'), 'time_logged_in' => time(), 'is_logged_in' => 1), "tbl_log_sessions");
							
							$this->session->set_flashdata('success', 'Log in successful!');
							if($from==""){
								redirect("home");
							}else{
								redirect($from);
							}
						}
					}else{
						$this->session->set_flashdata('success','Registration Successful! Log In Now');
						redirect("auth/login");
					}
				}else{
					$this->session->set_flashdata('error','Successfully registered but unable to log in. Please try again');
					redirect("auth/login/".(($from!="")?"?ref=".$from:""));
				}
			}
		}
		$data['page_title'] = "Register";
		$this->load->view('register', $data);
	}
	
	function register1() {
		$data['title'] = "Register - Christ Embassy Virtual Church";
		$this -> load -> view('may2014/register', $data);
	}
	
	function login(){
		if($this->session->userdata('user_name')!=""){
			$this->session->set_flashdata('error', 'You are already logged in');
			redirect(base_url());
		}
		$from = $this -> input -> get('ref');
		if ($from != "")
			$data['from'] = urldecode($from);
		$data['page_title'] = "Log In";
		$this->load->view('login', $data);
	}

	function login1() {
		$from = $this -> input -> get('ref');
		if ($from != "")
			$data['from'] = urldecode($from);
		$data['title'] = "Login - Christ Embassy Virtual Church";
		$data['css_class'] = "info";
		$data['info_msg'] = "<img src=\"/images/icons/info_small.png\" align='absmiddle' /> Kindly login with your valid details.";

		$this -> load -> view('may2014/login', $data);
	}
	
	function logout(){
		#lets update the is_online flag for this user; setting it to 0
		mysql::insert(array('user_id' => $this -> session -> userdata('user_id'), 'time_logged_out' => time(), 'is_logged_out' => 1), "tbl_log_sessions");
		mysql::update($tbl = 'tbl_users', $setflds = array('is_logged_in' => 0, 'is_online' => 0), $where = array('id' => $this -> session -> userdata('user_id')));
		$this->db->where('user_id', $this -> session -> userdata('user_id'));
		$this->db->delete('tbl_users_online');
		$CI = &get_instance();

		///destroy all authentication variables
		$CI -> session -> sess_destroy();
		
		redirect("home");
	}
	
	function logout1() {

		$this -> load -> library('sessiondata');

		global $page_res;

		sessiondata::general_page_resource();

		#lets update the is_online flag for this user; setting it to 0
		$logged_in_account = $this -> session -> userdata('user_name');

		//echo $logged_in_account; exit;
		$is_updated = mysql::update($tbl = 'tbl_users', $setflds = array('is_online' => 0), $where = array('user_name' => $logged_in_account));

		mysql::insert(array('user_id' => $this -> session -> userdata('user_id'), 'time_logged_out' => time(), 'is_logged_out' => 1), "tbl_log_sessions");
		mysql::update($tbl = 'tbl_users', $setflds = array('is_logged_in' => 0, 'enabled' => 0), $where = array('id' => $this -> session -> userdata('user_id')));

		#echo($is_updated);exit;

		$CI = &get_instance();

		///destroy all authentication variables

		$CI -> session -> unset_userdata('user_name');
		$CI -> session -> unset_userdata($page_res);

		//$this->session->unset_userdata('user_name');
		$CI -> session -> sess_destroy();

		header("Location:" . CUSTOM_BASE_URL);
		exit ;
	}//end function

	//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function forgotpass() {

		global $page_res;
		$this -> general_page_resource();

		$view = "vw_forgot_password";
		$data['page_title'] = "Recover Password | Christ Embassy Live Streaming Portal.";
		$data['css_cls'] = 'info';
		$data['info_msg'] = 'To retreive your password, kindly fill out the form below.';

		$this -> load -> view($view, array('data' => $data, 'page_res' => $page_res));
	}//end function

	function recover_password() {

		//echo 'Isaac'; exit;

		$email = validator_lib::cleanEmail($_POST['email']);

		$user = useraccount::loadDetails('tbl_users', $arrFilter = array('email' => $email), $arrAttribute = array('first_name', 'last_name', 'user_name', 'user_pwd'), $num = 1, $orderBy = '');

		if ($user['user_pwd'][0]) {

			$name = $user['first_name'][0] . ' ' . $user['last_name'][0];
			//echo $name; exit;
			$detail = array('name' => $name, 'email' => $email, 'password' => $user['user_pwd'][0]);
			// dispatch mail to the user
			$mail_sent = useraccount::dispatch_password_recovery_mail($detail, $arrMoreInfo = NULL, $tblname = 'tbl_users');

			if ($mail_sent['status']) :
				util_lib::display_message($arrMessage = array('Your password has been sent to your email address specified.'), $msg_type = 'success', $img_source = '/images/icons/success_small.png');
			endif;//end if

		} else {

			util_lib::display_message($arrMessage = array('The email address you specified does not exist or is invalid.'), $msg_type = 'failure', $img_source = '/images/icons/invalid_small.png');

		}

	}//end function

	function resetpassword() {
		$usn = misc::cleanUserName($_POST['usn']);
		$ismember = authmanager::isUser($usn);
		if ($ismember) {
			//lets generate new temporary password for this user
			$p = substr(md5(uniqid(rand(), true)), 0, 4);
			$tp = $p;
			$p = misc::hash($p);
			//update the user account with the new password
			$input = array('pwd' => $p);
			$where = array('username' => $usn);
			//get the user email
			$user = contentmanager::loadUserByUserName($usn);

			$fn = @(string)$user['firstname'];
			//$em = @(string)$user['email'];

			$isupdated = querymanager::update('adminusers', $input, $where);

			if ($isupdated) {
				$detail2 = array('hashpwd' => $p);
				querymanager::insert($detail2, 'hashedpassword');

				//lets mail the new password to the user
				$this -> load -> library('email');

				$this -> email -> from('admin@demo.schinfosystem.com');
				$this -> email -> to($user['email']);

				$msg = 'Dear User' . $fn . ', <br>Your password to log into website http://peakinschinfosystem.focusedexperiential.com has been temporarily changed to ' . $tp . '. <br><br>Please log in using that password and this username' . $usn . ' Then you may change your password to something more familiar.';

				/*echo $msg;
				 exit;*/
				$this -> email -> subject('Your temporary password');
				$this -> email -> message($msg);

				@$this -> email -> send();

				echo "success|Your password has been changed.You will receive the new, temporary password via email. Once you have logged in with this new password, you may change it.";

			} else {
				//do nothing
			}//end-inne if-else
		} else {
			echo "failure| The detail you entered is invalid.";
		}//end if-else
	}//end function

	function activate() {
		///user is trying to activate his account
		$userID = (int)($this -> uri -> segment(3));

		if (empty($userID)) {
			//$this->flashnotice->add('Error activating account.','error');
			header("Location:/dashboard/activation/error/");
			exit ;
		}
		//validate
		$arrUserInfo = $this -> useraccount -> loadRefUser($userID, 'tbl_users');

		if (!is_array($arrUserInfo)) {
			//userID does not exist
			//$this->flashnotice->add('Error activating account.','error');
			header("Location:/dashboard/activation/error/");
			exit ;

		}

		if ($arrUserInfo['status'][0] == '0') {
			$this -> useraccount -> activateAccount($userID, $tblname = 'tbl_users');
			//$this->flashnotice->add('Your account was successfully activated.','success');
			header("Location:/dashboard/activation/success/");
			exit ;
		}
		if ($arrUserInfo['status'][0] == '1') {
			//$this->useraccount->activateAccount($userID);
			//$this->flashnotice->add('Account already activated.','info');
			header("Location:/dashboard/activation/prevactivated/");
			exit ;
		}
		header("Location:/home/");
		exit ;

	}//end function

	function profile() {
		if ($this -> session -> userdata('user_name') == "") {
			$here = $_SERVER['REQUEST_URI'];
			header('Location: /auth/login?ref=' . urlencode($here));
			exit ;
		} else {
			$data['firstname'] = $this -> session -> userdata('first_name');
			$data['lastname'] = $this -> session -> userdata('last_name');

			$data['title'] = $data['firstname'] . " " . $data['lastname'] . " - Christ Embassy Virtual Church";

			$data['profile_pic'] = $this -> session -> userdata('profile_pic');
			$data['country'] = $this -> session -> userdata('country');

			$this -> load -> view('may2014/profile', $data);
		}
	}

    public function invitation($hash_code){
		$sql = "SELECT * FROM `tbl_invitees` WHERE `hash_code`='{$hash_code}'";
		$query = mysql::query($sql);

		$invitee = mysql_fetch_assoc($query);

        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>', '</div>');
            //$this->form_validation->set_rules('user_name','Username','required|alpha_numeric|is_unique[tbl_users.user_name]|trim');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('rpassword','Repeat Password','required|matches[password]');
            $this->form_validation->set_rules('first_name','First Name','required');
            $this->form_validation->set_rules('last_name','Last Name','required');
            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tbl_users.email]');
            $this->form_validation->set_rules('phone','Phone Number','required');
            $this->form_validation->set_rules('country','Country','required');
            $this->form_validation->set_rules('dob','Date Of Birth','required');

            if($this->form_validation->run()!=FALSE){
                $details['user_name'] 	= mysql_real_escape_string($this->input->post('email'));
                $details['user_pwd'] 	= mysql_real_escape_string($this->input->post('password'));
                $details['first_name'] 	= mysql_real_escape_string($this->input->post('first_name'));
                $details['last_name'] 	= mysql_real_escape_string($this->input->post('last_name'));
                $details['email'] 		= mysql_real_escape_string($this->input->post('email'));
                $details['phone_no'] 	= mysql_real_escape_string($this->input->post('phone'));
                $details['country'] 	= mysql_real_escape_string($this->input->post('country'));
                $dob = explode("/", $this->input->post("dob"));
                $details['birth_day'] = $dob[0];
                $details['birth_month'] = $dob[1];
                $details['birth_year'] = $dob[2];
                $details['status'] = 1;

               if($_FILES['profile_pic']['size']!=0){
                    $dir = "user_res/pics/";
                    $ext = strtolower(strrchr($_FILES['profile_pic']['name'], "."));
                    //die(var_dump($ext));
                    if(!in_array($ext, array(".png", ".jpg", ".jpeg", ".gif"))){
                        $this->session->set_flashdata('error', 'Error! Unsupported image format');
                        redirect("auth/invitation/".$hash_code);
                    }else{
                        $destination = $dir.str_replace(array("@", "."), "", $details['user_name']).time().$ext;
                        if(move_uploaded_file($_FILES['profile_pic']['tmp_name'], $destination)){
                            $details['profile_pic'] = $destination;
                        }else{
                            $this->session->set_flashdata('error', 'Error! Unable to upload image');
                            redirect("auth/invitation/".$hash_code);
                        }
                    }
                }

                $this->db->insert('tbl_users', $details);
                if($this->db->affected_rows()>0){
                    // registration successful
                    mysql_query("UPDATE `tbl_invitees` SET `accepted`=1 WHERE `hash_code`='{$hash_code}'");

					//add to inviter's cell
					//$this->db->where();
					$invQry = $this->db->get_where('tbl_users', array('id'=>$invitee['user_id']));
					$inviter = $invQry->result();
					//die(var_dump($inviter[0]));
					mysql_query("UPDATE tbl_users SET cell_id='".$inviter[0]->cell_id."', is_cell_member='1', status='1', enabled='1', invited_by='".$invitee['user_id']."' WHERE email='".$details['email']."'") or die(mysql_error());

                    $this->session->set_flashdata('success','Registration Successful! Log In Now');
                    redirect("auth/login");

                }else{
                    $this->session->set_flashdata('error','Unable to register. Please try again');
                    redirect("auth/invitation/".$hash_code);
                }
            }
        }

        $this->load->view('invitee_register', $invitee);
    }

	function checkOnlineStatus(){
		$user_id = $_GET['user_id'];
		$check = $this->db->get_where('tbl_users_online', array('user_id'=>$user_id));
		if($check->num_rows()==0){
			$this->db->insert('tbl_users_online', array('user_id'=>$user_id, 'curr_time'=>time()));
		}else{
			$this->db->where('user_id', $user_id);
			$this->db->update('tbl_users_online', array('user_id'=>$user_id, 'curr_time'=>time()));
		}
		$this->db->where('curr_time <', time()-600);
		$this->db->delete('tbl_users_online');
	}

}//end class
