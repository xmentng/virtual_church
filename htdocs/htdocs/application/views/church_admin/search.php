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
<!--  <div class="clearfix"></div>-->
  <div class="messageWr"  style=" padding:5px 0">
  <form action="" method="post" id="this-form">
<div class="table-wrapper" style="width:100%">
        
<div class="wrapper-panel" style="font-size:0.75em;">     

	<div class="cls_landing_page" style="float:left;  width:75%;">
    	<p style="text-align:justify; line-height:1.87em; padding:0px 10px;">
        	
            <h4>Welcome to Our Virtual Church Search Menus</h4>
            
            The search menu afords the user the capability of perusing the content on the website, exporting search results to excel or csv file, sorting and analyzing the search result where necessary.
            <br>
			<br>
			To use this functionality, kindly peruse the menu on your side bar.</div>
    
    <div class="cls_search_criteria" style="float:right;  width:25%;">
        <div style="border:solid 1px #EEE;">	
            <li id="search_menu" style="height:30px; line-height:30px; background:#EFEFEF; list-style:none;">
                <span style="padding:0px 10px; font-weight:bolder;">Search for:</span>
            </li>
            <li class="search_menu_item" style="list-style:none;">
            <a href="/churchadmin/search_online_users_by_name"><span style="padding:0px 10px;">Users on-line by name</span></a></li>
            <li class="search_menu_item" style="list-style:none;">
            <a href="/churchadmin/search_online_users_by_email"><span style="padding:0px 10px;">Users on-line by email</span></a></li>
            <li class="search_menu_item" style="list-style:none;">
            <a href="/churchadmin/search_invites_by_name"><span style="padding:0px 10px;">Invites to church service by name</span></a></li>
            <li class="search_menu_item" style="list-style:none;">
            <a href="/churchadmin/search_invites_by_email"><span style="padding:0px 10px;">Invites to church service by email</span></a></li>
           
            
            <li id="search_menu" style="height:30px; line-height:30px; background:#EFEFEF; list-style:none;">
                <span style="padding:0px 10px; font-weight:bolder;">Search for:</span>
            </li>
            <li class="search_menu_item" style="list-style:none;">
             <a href="/churchadmin/search_active_users"><span style="padding:0px 10px;">Active Users</span></a></li>
            <li class="search_menu_item" style="list-style:none;">
             <a href="/churchadmin/search_inactive_users"><span style="padding:0px 10px;">In-active Users</span></a></li>
            <li class="search_menu_item" style="list-style:none;">
             <a href="/churchadmin/search_church_service_by_date"><span style="padding:0px 10px;">Church Services by date</span></a></li>
        </div> 
    </div>

	<div style="clear:both"></div>
</div>
 
  
</div>
</form>


</div>

 
 <div class="clearfix"></div> 
 </div>
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
		   url:		"/delete/remove_ref_help_line/" + param,
		   data: $('#this-form').serialize(),
		   success:	function(e){
			   alert(e);
			   document.location="/churchadmin/help_line_content/edit";
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
