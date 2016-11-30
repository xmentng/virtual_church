
<style type="text/css">
	.active{
		background:#fff;
		color:#002C40;
		
	}
</style>

<script type="text/javascript">
$(document).ready(function(){
	
	$('li a').click(function(){
		//$('li a').removeClass('active'); // remove all active classes
  		//$(this).addClass('active'); // add active class to element clicked	
		
		var id = $(this).attr('id');
		
		//alert(id);
		
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
	
	$('#id_church_service').click(function(e){
		e.preventDefault();
		
		$.ajax({
			   
			   type: "POST",
				   url:	"/churchsystem/markChurchAttendance/" + <?php echo @$page_res['user_id'];    ?>,
				   data: $('#main_tab').serialize(),
				   success:	function(resp){
					  // alert(resp);
					   var response = $.parseJason(resp);
					   
					   if(response.status){
						   
						  // alert(response.message);
						   
					   }else{
						   
						   
						   
					   }
					   
					   
					   
				   }//end success
			   
		});
		
		document.location="/churchmember/church_service";
	});
	///////////////////////////////////////////////////////////////////////////////
	
	return false;
});//end document ready
</script>
    
   <style>
   
 .navbar { 
 line-height:30px;
 height:30px;
 }
 .navbar ul li {
	background:#444; 
	height: 30px;
 }
.navbar ul li > a{ 
display: block;
padding: 0 16px;
white-space: nowrap;
color: #eee;
text-shadow:none;
height: 30px;
line-height: 28px;
font-size: 12px;
font-weight: bold;

}

.navbar ul li > a:hover { 

color: #fff;
background:#06C

}

   
   </style>
        
        
 <!-- <div style=" background:#444; width:100%;">-->     
  <form id="main_tab">
   <div class="row navbar" id="nav2" style="">
    <a class="toggle" gumby-trigger="#nav2 > ul" href="#"><i class="icon-menu"></i></a>
    <!--<h1 class=" columns" >
      <a href="#">
      
      </a>
    </h1>-->
    <ul class="twelve columns">
    
       <li style="float:left; display:block; height:25px; line-height:25px;">
            <a id="id_profile" href="/churchmember/" style="display:block; height:25px; line-height:25px;">
            		<span style="padding:0px 15px; color:#fff; ">&nbsp;Profile&nbsp;</span>
            </a>
      </li>	
       <li  style="float:left; display:block; height:25px; line-height:25px;"><a id="id_church_service" href="/churchmember/church_service" style="display:block; height:25px; line-height:25px;"><span style="padding:0px 3px;  ">Church Service</span></a></li>
       
      <li  style="float:left; display:block;  height:25px; line-height:25px;"><a id="id_cell_system" href="/churchmember/cell_system" style="display:block; height:25px; line-height:25px;"><span style="padding:0px 3px;  ">Cell System</span></a></li>
      
        <li  style="float:left; display:block;  height:25px; line-height:25px;"><a id="id_inbox" href="/churchmember/feedback" style="display:block; height:25px; line-height:25px;"><span style="padding:0px 3px;  ">Feedback</span></a></li>
                    
                    <li  style="float:left; display:block;  height:25px; line-height:25px;"><a id="id_testimony" href="/churchmember/testimony" style="display:block; height:25px; line-height:25px;"><span style="padding:0px 3px;  ">Testimony</span></a></li>
                    
                    <li  style="float:left; display:block;  height:25px; line-height:25px;"><a id="id_give_online" href="/churchmember/give_online" style="display:block; height:25px; line-height:25px;"><span style="padding:0px 3px;  ">Give Online</span></a></li>
                    
                   <li  style="float:left; display:block;  height:25px; line-height:25px;"><a id="id_send_tract" href="/churchmember/send_tract" style="display:block; height:25px; line-height:25px;"><span style="padding:0px 3px;  ">Send a Tract</span></a></li>
                  
                    <li  style="float:left; display:block; background: #007CB9; height:25px; line-height:25px;"><a id="id_logout" href="/auth/logout" style="display:block; height:25px; line-height:25px;"><span style="padding:0px 3px;  color: #fff; font-weight:bolder;">Logout</span></a></li>
      
        
    </ul>
    
 </div>
 </form>   
 
<!-- </div> -->   
          