
<?php
	$this->load->library('sessiondata');
	global $page_res;
	sessiondata::general_page_resource();
	
	//retrieve the current live meeting:
	$cur_day = date('d');
	$cur_month = date('d');
	$cur_year = date('Y');
	
	$cur_hr = date('h');
	$cur_min = date('i');
	
	$cur_time = mktime($cur_hr, $cur_min,0,$cur_month, $cur_day, $cur_year);
	$flag_islive = false;
	
	//$meeting
	
	
?>
<script type="text/javascript" src="/js/libs/gumby.js"></script>
<script type="text/javascript" src="/js/libs/gumby.min.js"></script>
<script type="text/javascript">
function sendTract(){

document.location="/churchmember/send_tract";
}//end function
function markChurchAttendance(){
	//alert(1); return false;
	
	$.ajax({
			 type: "POST",
				   url:	"/churchsystem/markChurchAttendance/<?php  echo $page_res['user_id']; ?>",
				   data: $('#frmmain_tab').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						//do nothing
						var response = $.parseJSON(e);
						
						if(response.status){
							document.location="/churchmember/church_service";
						}else{
							document.location="/churchmember/church_service";
						}
					  	
				   } //end function success
				   
				  // 

		});//end ajax
	
}//end function

$(document).ready(function(){
	
	///////////////////////////////////////////////////////////////////////
	
	
	/////////////////////////////////////////////////////////////////////
	$('li a').click(function(){
		//$('li a').removeClass('active'); // remove all active classes
  		//$(this).addClass('active'); // add active class to element clicked	
		
		var id = $(this).attr('id');
		
		//alert(id); return false;
		
		if(id=="id_church_service"){
			markChurchAttendance();
			return false;
		}
		
		if(id == "id_profile"){
			$(this).addClass('active');
			$('#id_church_service').removeClass('active');
			$('#id_cell_system').removeClass('active');
			$('#id_inbox').removeClass('active');
			$('#id_testimony').removeClass('active');
			$('#id_give_online').removeClass('active');
			$('#id_send_tract').removeClass('active');
			$('#id_suggestion').removeClass('active');
			$('#id_member').removeClass('active');
		}
		
		
		if(id == "id_church_service"){
			$(this).addClass('active');
			$('#id_profile').removeClass('active');
			$('#id_cell_system').removeClass('active');
			$('#id_inbox').removeClass('active');
			$('#id_testimony').removeClass('active');
			$('#id_give_online').removeClass('active');
			$('#id_send_tract').removeClass('active');
			$('#id_suggestion').removeClass('active');
			$('#id_member').removeClass('active');
		}
		
		
		
		if(id == "id_cell_system"){
			$(this).addClass('active');
			$('#id_profile').removeClass('active');
			$('#id_church_service').removeClass('active');
			$('#id_inbox').removeClass('active');
			$('#id_testimony').removeClass('active');
			$('#id_give_online').removeClass('active');
			$('#id_send_tract').removeClass('active');
			$('#id_suggestion').removeClass('active');
			$('#id_member').removeClass('active');
		}
		
	});
	
	///////////////////////////////////////////////////////////////////////////////

	///////////////////////////////////////////////////////////////////////////////
	
	return false;
});//end document ready
</script>
    
   <style>
   
/*==========================================================
 cls main tab
 ===============================================================*/
 .cls_maintab{
	height:60px;
	line-height:60px;
	/*background-color: #5F5F5F;*/
	/*background-color:#0084C4;*/
	font-size:13px; /* 13px */
	z-index:200000000px;
	margin-botom:0%;
	background-color:#444;
	
}

.cls_maintab   li{
	height:60px;
	line-height:60px;
	list-type:none;
	float:left;
	
	display:block;
	margin:0;
	text-align:center;
	padding:0px 7px;
	
	font-size:13px; /* 13px */
	
}

.cls_maintab   li  a img{
	width:10%; border:none; height:auto;
	
}

.cls_maintab li a{

display:block;
height:60px;
color:#fff;

}


.cls_maintab   li:hover{
	
	position:relative;
	height:60px;
	display:block;
	border-right:0px;
	
}

.cls_maintab  li ul{
	position:relative;
	left:5;
	top:59;
	display:none;
	margin:0;
	padding:0;
	width:200px;
	text-align:left;
	z-index:100;
	
}


.cls_maintab  li ul li{
	height:60px;
	line-height:60px;
	list-style-type:none;
	text-align:left;
	display:block;
	width:90%;
	position:relative;
	left:0;
	
}

.cls_maintab li ul li a{
	text-decoration:none;
	height:60px;
	line-height:60px;
	text-align:left;
	color:#FFF;
	width:100%;

}

.cls_maintab li ul li a:hover{
	text-decoration:none;
	height:60px;
	line-height:60px;
	list-style-type:none;
	text-align:left;
	color:#FFF;

}

.cls_maintab  li ul li a span{
	padding:0px 4px;
}




.cls_maintab  li:hover>ul{
	position:absolute;
	top:59px;
	margin:0;
	display:block;
	background-color:#0084C4;
	filter:alpha(opacity=97);
		-moz-opacity:0.97;
	opacity:0.97;
	z-index:999;
}

.cls_maintab li a{
	color:#fff;
	text-decoration:none;
	display:block;
	height:60px;
	line-height:60px;
	padding:0px 3px;
}

.cls_maintab li a:hover{

	background-color:#006B9F;
	color:#FFF;	
}
 
   </style>
        
        
 <!-- <div style=" background:#444; width:100%;">-->     
  
   <div class="cls_maintab" id="nav2" style="font-size:13px; color:#fff; height:60px; z-index:9899999999px;">
   
   <form id="frmmain_tab" name="frmmain_tab" method="post" style="height:60px;">

			<li style="float:left; height:60px;">
				<a href="<?php echo CUSTOM_BASE_URL."/churchmember";  ?>">
					<span>Home</span>
				</a>
			</li>
			
			
			<li style="float:left; height:60px;">
				<a href="<?php echo CUSTOM_BASE_URL."/cellleader/dashboard";  ?>">
					<span>Dashboard</span>
				</a>
			</li>
			
			
			<li style="float:left; height:60px;">
				<a href="<?php echo CUSTOM_BASE_URL."/cellleader/managecellsystem?tab=0";  ?>">
					<span>Manage Cell System</span>
				</a>

			</li>
			
			<li style="float:left; height:60px;">
				<a href="<?php echo CUSTOM_BASE_URL."/cellleader/groupchat?tab=10";  ?>">
					<span>Chat System</span>
				</a>

			</li>
              
			<li style="float:right;height:60px; margin-right:1px; border-right:none; background-color:#687C9B;">
				<a href="<?php echo CUSTOM_BASE_URL."/auth/logout";  ?>">
					<span style="font-weight: bolder;">Logout</span>
				</a>
			</li>
				
	 

     </form>
 </div>
   
 
<!-- </div> -->   
          