<?php
  class comments extends CI_Controller{
      
      function __construct(){
          //call parent controller
          parent::__construct();
          //load the commentsmanager model
		  //useraccount::redirect_not_churchadmin();
          $this->load->model('commentsmanager');
		  $this->load->library(array('sessiondata'));
      }
      
      function add(){
          //add comments to a content eg video
          //$mode = $this->uri->segment(3);
          //if($mode == 'ajax'){
              //this is an AJAX call..treat like wise
               if(empty($_POST['contentID']) || empty($_POST['comments'])){
                    //form not submitted...reload the form
                     echo json_encode(array('status'=>false,'error'=>'&nbsp; Please fill all fields.'));
                     exit;
               }
               else{
                   ///we have data....
                   $this->load->library('inputfilter');
                   $arrInfo = array();
				   
                   $arrInfo['comment_author_id'] = $this->session->userdata('id');
                   $arrInfo['comment'] = $this->inputfilter->process($this->input->post('comments'));
                   $arrInfo['approved'] = '0';
                  
                   $arrInfo['time_posted'] = time();
                    
                   $arrInfo['video_post_id'] = $this->inputfilter->process($this->input->post('contentID')); 
                   $arrInfo['ipaddress'] = $_SERVER['REMOTE_ADDR'];    
                   //pass it to the commentsmanager
                   $resp = $this->mysql->insert($arrInfo, 'tbl_vod_comments');
				  
                   if($resp){
					  //echo json_encode(array('status'=>false,'error'=>$resp));exit;
                      echo json_encode(array('status'=>true,'message'=>'&nbsp; Comments successfully submitted.'));
                      exit; 
                   }
                   else{
                       echo json_encode(array('status'=>false,'error'=>'&nbsp; Error submitting comments.'));
                       exit;
                       
                   }
                }
         // }//
          
      }//end function
      
      function loadinline($contentID){
         //$contentID = $this->uri->segment(3);    
         global $page_res;
		 sessiondata::general_page_resource();
		 
		 $arrComments = $this->commentsmanager->loadComments($contentID,array('id','video_post_id', 'comment_author_id', 'comment','time_posted','approved'),NULL);
		 
		 //var_dump($arrComments);
		 
		 $data['info_msg'] = "Kindly find below comments on the video selected.";
		 $data['css_cls'] = "";
		 $data['page_title'] = "Selected Video Comments";
		 
		 $page_res['page_name'] = "Selected Video Comments";
		 
		 
          $this->load->view('videos/comments_loadline',array('comment'=>$arrComments, 'data'=>$data, 'page_res'=>$page_res));
      }
	
function approve(){
	
	$commentID = intval($this->uri->segment(3));
	
	if($commentID > 0){
		
		$flag_approved = $this->commentsmanager->approveComments($commentID);
		
		if($flag_approved):
			//echo "success"; exit;
			echo json_encode(array('status'=>true, 'message'=>'&nbsp;Comment successfully approved.')); exit;
		endif;
		
	}
	
}//end function


function disapprove(){
	
	$commentID = intval($this->uri->segment(3));
	
	if($commentID > 0){
		
		$flag = $this->commentsmanager->disapproveComments($commentID);
		
		if($flag):
		
			echo json_encode(array('status'=>true, 'message'=>'&nbsp;Comment successfully disapproved.')); exit;
		endif;
		
	}
	
}//end function
	  
function load_vod_comments(){
	
	global $page_res;
	sessiondata::general_page_resource();
	
	$church_id = intval($page_res['church_id']);
	//echo $church_id;
	
	$commentInfo = commentsmanager::loadBatchedComments($church_id);
	
	$data['info_msg'] = "Kindly find below video on demand total comments";
	$data['css_cls'] = 'info';
	$data['page_title'] = 'Video Comments';
	$page_res['page_name']='Video Comments';
	
	$this->load->view('videos/vod_batched_comments', array('comment'=>$commentInfo, 'data'=>$data, 'page_res'=>$page_res));
	
	
	
}//end function


function view_selected_vod_comments(){
	
	global $page_res;
	sessiondata::general_page_resource();
	
	$vod_post_id = intval($this->uri->segment(3));
	
	$this->loadinline($vod_post_id);
	
}//end function
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  
	  
  }//end class
