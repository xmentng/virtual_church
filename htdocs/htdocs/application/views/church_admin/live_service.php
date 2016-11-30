<?php $this->load->view('vw_header');  ?>



<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('church_admin/vw_headmast'); ?>

<!--NAVIGATION -->

<?php $this->load->view('vw_horizontal_nav'); ?>
  
  

<!--CONTENT-->
<div class="container content_wr">
  <div class=" row rowbg">
<!--main content top-->
  <div class="twelve columns"> 
   <!--main Content-->
   <div class="Inner_content"> 
   <!--<h2>Profile on Pastor Chris</h2>-->
  <!-- <img src="images/innercity.jpg">-->
	<div class="clearfix"></div>
	<?php $this->load->view('vw_welcome_user'); ?>
  <hr>
  
  <!--FORM-->
 <div class="container content_wr">
  <div class=" row rowbg">
<!--main content top-->
  <div class="twelve columns"> 
   <!--main Content-->
   <div class="Inner_content"> 
   <!--<h2>Profile on Pastor Chris</h2>-->
  <!-- <img src="images/innercity.jpg">-->
  <div class="clearfix"></div>
  <div class="messageWr"  style=" padding:5px 0">
    <div class="table-wrapper" style="width:100%">
            
        <div class="wrapper-panel">
          <div class="three columns">
              	<div class="cls_rsbar_content" style="border:solid 1px #E0E0E0;">
        	
                    <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color: #B0B0B0;">
                        <span style="padding:0px 10px; font-size:0.875em; font-weight:bolder;">Live Service Menus</span>
                    </div>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="/churchadmin/church_service/set_timer" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Set Service Timer</span></a>
                    </li>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="/churchadmin/church_service/cancel_timer" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Cancel Timer</span></a>
                    </li>
                    
                   <!-- <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="/churchadmin/church_service/view_timer" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; View | Edit Service Timer</span></a>
                    </li>-->

        		</div>
             </div> <!--end cls_sidebar-->
             
             <div class="nine columns cls_landing_page">
               
               <div class="cls_lpage_content" style="padding:0px 5px; margin:0;">
               	
                	<p style="line-height:1.70em; text-align:justify; font-size:0.875em;">
                    	
                        <span style="font-size:1.125em; font-weight:bolder;">Welcome to Our Virtual Live Service System</span>
                        <br>
						<br>
 
                        This utility allows churches set church service parameters such as countdown timers to enable:
                        <br>
                        <br>
                        1. Virtual Church Members to be aware of the next service time as they are expectant
                        <br>
                        2. Church Members to fully prepare ahead of time of the church service
                        <br>
						3. Churches transmit a live online service and meetings
                        
                        <br>
						<br>
						To peruse this functionality;  kindly use the menus on your left hand side of this page.
                        
                    
                    </p>
               
               </div>
              	
             </div>
			<div style="clear:both;"></div>
    </div><!--end wrapper panel-->
</div>

</div>
</div>

 
 <div class="clearfix"></div> 
 </div>
 </div>
 </div>
 </div>
 

  
   </div>
   
 </div>
 
 
 
 
 
 </div>
 
      <div class=" clearfix"></div>

<!--FOOTER-->
<div class="main_footer2">
<?php  $this->load->view('vw_footer');  ?>
</div>
<script type="text/javascript" src="/js/paginate.js"></script>

<script type="text/javascript">

function delete_record(param){
	$.ajax({
		   type: "POST",
		   url:		"/delete/remove_ref_nbcontent/" + param,
		   data: $('#this-form').serialize(),
		   success:	function(e){
			   alert(e);
			   document.location="/churchadmin/notice_board_content/edit";
		   }//end success execution
	});
}//end function

/////////////////////////////////////////////////////

$('.cls_delete').click(function(){
	
	var id = $(this).attr('id');
	
	if (confirm("Do you want to delete this record?")) {
        delete_record(id);
    }
    return false;
});

///////////////////////////////////////////////////
$('#checkall:checkbox').change(function () {
    if($(this).attr("checked")) $('input:checkbox').attr('checked','checked');
    else $('input:checkbox').removeAttr('checked');
});
////////////////////////////////////////
var nof_chkbox = 0;
var uid = 0;
var chkbox_id=0;
var uid1 = 0;
var uid2 = 0;
$("input[name='reason']").on('click',function(e) {
    var itemselected = $("input[name='reason']:checked");
    var nof_chkbox = itemselected.length;
	
	chkbox_id = $("input[name='reason']:checked").attr('id');
	$('#id_edit').attr('rel',chkbox_id);
	$('#id_activate').attr('rel',chkbox_id);
	$('#id_deactivate').attr('rel',chkbox_id);
	uid = $('#id_edit').attr('rel');
	uid1 = $('#id_activate').attr('rel');
	uid2 = $('#id_deactivate').attr('rel');
	//alert(uid);
	$('#id_edit').click(function(){
		document.location="/churchadmin/useraccount/editaccount/" + uid;							 
	});
	
	$('#id_activate').click(function(){
		document.location="/churchadmin/activate_user/" + uid;
		return false;
	});
	
	$('#id_deactivate').click(function(){
		document.location="/churchadmin/deactivate_user/" + uid2;	
		return false;
	});
	
	
    
});
/////////////////////////////////////////
$('.uicon-thumbs-up').click(function(e){
	var uid = $(this).attr('id');
	document.location="/churchadmin/activate_user/" + uid;

	return false;
});

$('.uicon-thumbs-down').click(function(e){
	var uid = $(this).attr('id');
	document.location="/churchadmin/deactivate_user/" + uid ;
	return false;
});

///////////////////////////////////////////////////

	$('#id_delete_nbc').click(function(){
		var id_msg = $(this).attr("id");
		
		//alert(id_msg); return false; 
		var response = prompt("Are you sure you want to delete this record?","ok");
		
		if(response=='ok'){
			delete_nbcontent(id_msg);
		}
		return false;
			
		
	});//end click event
//////////////////////////////////////////////////


function delete_nbcontent(id_msg){
	
	
}

</script>

<!--END OF CONTENT-->


  </body>
</html>
