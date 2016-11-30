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
<h4  style="height:50px; line-height:50px;  width:400px;"> 
 <i class="icon-doc-text-inv" ></i> <span>Manage Users Account</span> 
 </h4>
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
 
<div class="adminheader">

     <div class="admintopright">
     <form method="post" name="frmpost" id="frmpost">
         <div class="img">
        <a href="/churchadmin/useraccount/create/" title="Create New User" id="id_create"> <i class="icon-plus-circled"></i>
         <br><span class="smalltext"> New</span></a>
         </div>
     
         <div class="img"> 
         <a href="javascript:void();" title="Edit User Account" id="id_edit" rel=""><i class="icon-pencil"></i>
         <br><span class="smalltext">Edit</span> </a>
         </div>
         
         <div class="img">  
         <a href="javascript:void();" title="Activate User Accounts" id="id_activate" rel=""><i class="icon-thumbs-up"></i>
         <br><span class="smalltext">Activate</span></a>
         </div>
         
         <div class="img"> 
         <a href="javascript:void();" title="Deactivate User Account" id="id_deactivate" rel=""><i class="icon-thumbs-down"></i>
         <br><span class="smalltext">Deactivate</span></a>
         </div>
         
         <!--<div class="img"> 
         <a href="javascript:void();" id="id_delete" rel=""><i class="icon-cancel-circled"></i>
         <br><span class="smalltext">Delete</span></a>
         </div>-->
         
         <div class="img"> 
         <a href="javascript:void();" id="id_delete" rel=""><i class="icon-cancel-circled"></i>
         <br><span class="smalltext">Delete</span></a>
         </div>
         
         </form>
         
         <div class="img" style="float:right:"> 
         	<form method="post" name="frmsearch">
                <span style="font-size:0.6875em;">Search By:</span>
               	<select name="lstsearch" id="lstsearch">
                	<option value="">--Search By---</option>
                    <option value="user_name">User Name</option>
                    <option value="user_full_name">User Full Name</option>
                    <option value="e-mail">E-mail</option>
                   <!-- <option value="active_accounts">Active Account</option>
                    <option value="in_active_accounts">In-Active Account</option>-->
                    
                </select>
                
                <span id="search_param">
                <input name="txtsearch" type="text" id="txtsearch" placeholder="Search Criteria">
                </span>
                <input name="cmdclick" type="submit" class="cls_buttons" value="Go" style="background-color:#000; color:#FFF" />
                
             </form>
         </div>
     
     </div><!--end class admintopright-->
 <div class="clearfix"></div>
 </div><!--end class adminheader-->
  




<div class="messageWr"  style=" padding:5px 0">
<form action="" method="post" id="this-form">
<div class="table-wrapper" style="width:100%">
<code id="post_result_msg" class="<?php  echo $data['css_cls'];   ?>">Below are list of church members account</code>    
<div class="wrapper-panel">     
<table width="100%" cellpadding="10" cellspacing="10" id="contentTbl">

  <tr>
  	<td style=" background:#eee"><strong>S/N</strong></td>
   	<td style=" background:#eee"><input  name="reason" type="checkbox" value="" class="check-all" id="checkall" /></td>
    <td style=" background:#eee"><strong>Name</strong></td>
    <td style=" background:#eee"><strong>E-Mail</strong></td>
    <td style=" background:#eee"><strong>User ID</strong></td>
    <td style=" background:#eee"><strong>Password</strong></td>
    <td style=" background:#eee"><strong>Status</strong></td>
     <!--<td width="197" style=" background:#eee"><strong>Date</strong></td>-->
     <td style=" background:#eee"><strong>Activate</strong></td>
    <td style=" background:#eee"><strong>Deactivate</strong></td>
  </tr>
  <?php     
  	if(count(@$users['id'])> 0 ){   
		//if(@$totalrecord['size'] >= 	@$totalrecord['per_page']):
		$sn = 0;
			for($i=0; $i < count(@$users['id']); $i++){
			++$sn;
			
   ?>
          <tr>
          	<td><?php echo @$sn;  ?></td>
           	<td><input name="reason" type="checkbox" value="" id="<?php echo @$users['id'][$i];  ?>" /></td>
            <td><a href="admin_create.php"><?php echo @$users['first_name'][$i]."  ".@$users['last_name'][$i];  ?></a></td>
            <td><?php echo @$users['email'][$i];  ?></td>
            <td><?php echo @$users['user_name'][$i];  ?></td>
            <td><?php echo @$users['user_pwd'][$i];  ?></td>
            <td><?php echo @$users['status'][$i];  ?></td>
           <!-- <td width="197"--><?php //echo date("h:i:s A",@$users['date_created'][$i]);  ?><!--</td>-->
            <td><input class="uicon-thumbs-up" name="" type="submit" value="" id="<?php echo @$users['id'][$i];  ?>"></td>
             <td><input class="uicon-thumbs-down" name="" type="submit" value="" id="<?php echo @$users['id'][$i];  ?>"></td>
         
          </tr>
 <?php
		}
			
?>
			
          
 <?php
		
	}
?>		
       
</table>

</div>
   <?php  if(count(@$users['id'])> 0 ){  ?>
    <div class="wrapper-paging">
      <ul>
        <li><a class="paging-back">&lt;</a></li>
        <li><a class="paging-this"><strong>0</strong> of <span>x</span></a></li>
        <li><a class="paging-next">&gt;</a></li>
      </ul>
    </div>
   <?php }else{ ?>
   
    No record matches your search criteria.
    
    <?php } ?>
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
var del2 = 0;
$("input[name='reason']").on('click',function(e) {
    var itemselected = $("input[name='reason']:checked");
    var nof_chkbox = itemselected.length;
	
	//alert(nof_chkbox); return false;
	
	chkbox_id = $("input[name='reason']:checked").attr('id');
	$('#id_edit').attr('rel',chkbox_id);
	$('#id_activate').attr('rel',chkbox_id);
	$('#id_deactivate').attr('rel',chkbox_id);
	$('#id_delete').attr('rel',chkbox_id);

	
	
	uid = $('#id_edit').attr('rel');
	uid1 = $('#id_activate').attr('rel');
	uid2 = $('#id_deactivate').attr('rel');
	del2 = $('#id_delete').attr('rel');
	
	//alert(del2); return false;
	
	//alert(uid2); return false;
	//alert(uid);
	$('#id_delete').click(function(){
		
		var res = confirm("Do you want to delete this record?");
		if(res){
			$.ajax({
				   
				type: "POST",
				cache:false,
				data: $('#frmpost').serialize(),
				url: "/delete/remove_ref_useraccount/"+del2,
				success: function(e){
						alert(e);
						document.location="/churchadmin/useraccount/manage/";
				}//end function
				   
			}); //end ajax
		}//end if
		
	}); //end function
	
	$('#id_edit').click(function(){
		document.location="/churchadmin/useraccount/editaccount/" + uid;							 
	});
	
	$('#id_activate').click(function(){
									 
		//alert(nof_chkbox); return false;							 
		//document.location="/churchadmin/activate_user/" + uid;
		activateAllMembers(nof_chkbox);
		return false;
	});
	
	$('#id_deactivate').click(function(){
		//document.location="/churchadmin/deactivate_user/" + uid2;	
		deactivateAllUsers(nof_chkbox);
		
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


///////////////////////////////////////////////////////

$('#search_param').hide();

$('#lstsearch').change(function(){
	var param = $(this).val();
	//alert(param);
	
	if(param == "user_name"){
			$('#search_param').show();
			return false;
	}else{
		$('#search_param').hide();
	}
	
	if(param == "user_full_name"){
			$('#search_param').show();
			return false;
	}else{
		$('#search_param').hide();
	}
	
	if(param == "e-mail"){
			$('#search_param').show();
			return false;
	}else{
		$('#search_param').hide();
	}
});

///////////////////////////////////////////////////


function deactivateAllUsers(param){
	
	/*alert(param); return false;*/
	$('#post_result_msg').removeClass("success");
		$('#post_result_msg').removeClass("error");
		$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
		
	$.ajax({
		  	type: "POST",
			   		url:	"/postmanager/deactivateAllUsers/" + param + "",
					data:	$('#this-form').serialize(),
					success:	function(e){
							
							//alert(e); return false;
							var sp = e.split('|');
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass("success");
								$('#post_result_msg').addClass("error");
								$('#post_result_msg').html(sp[1]);
								
								$('html, body').animate({scrollTop:0}, 'slow');
								
				
							}//end if
							
							if(sp[0] == "success"){
						
								$('#post_result_msg').removeClass("error");
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').html(sp[1]);
								/*$('html, body').animate({scrollTop:0}, 'slow');
								$('#this-form')[0].reset();*/
								document.location="/churchadmin/useraccount/manage";
							}//end if
						
					}//end function success
		   
		   
	});//end ajax
}//end function


function activateAllMembers(param){
		$('#post_result_msg').removeClass("success");
		$('#post_result_msg').removeClass("error");
		$('#post_result_msg').html('<img src="/images/loading.gif" align="left">&nbsp; Please wait...');
	$.ajax({
		  	type: "POST",
			   		url:	"/postmanager/activateAllUsers/" + param + "",
					data:	$('#this-form').serialize(),
					success:	function(e){
							
							//alert(e); return false;
							var sp = e.split('|');
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass("success");
								$('#post_result_msg').addClass("error");
								$('#post_result_msg').html(sp[1]);
								
								$('html, body').animate({scrollTop:0}, 'slow');
								
				
							}//end if
							
							if(sp[0] == "success"){
						
								$('#post_result_msg').removeClass("error");
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').html(sp[1]);
								/*$('html, body').animate({scrollTop:0}, 'slow');
								$('#this-form')[0].reset();*/
								document.location="/churchadmin/useraccount/manage";
							}//end if
						
					}//end function success
		   
		   
	});//end ajax
	
}//end function


</script>

<!--END OF CONTENT-->


  </body>
</html>
