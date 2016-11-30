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
  <div style="float:right; margin-right:20px; font-size:0.75em;"><em>Welcome&nbsp; <?php echo strtoupper(@$page_res['name_of_user']); ?>!</em></div>
        <h4  style=""> 
         <i class="icon-doc-text-inv" ></i> <span>View Invites</span>
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
		
 
<!--<div class="adminheader">

 <div class="admintopright">
 
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
 <div class="img"> 
 <a href="javascript:void();" id="id_delete" rel=""><i class="icon-cancel-circled"></i>
 <br><span class="smalltext">Delete</span></a>
 </div>
 
 </div>
 <div class="clearfix"></div>
 </div>-->
  




<div class="twelve columns"  style=" padding:5px 0">
<form action="" method="post" id="this-form">
<div class="table-wrapper" style="width:100%">
        
<div class="wrapper-panel">  

<div class="row">

	<div class="twelve columns" style="background-color:#6B9BAB; color:#FFF;">
    
    	<div class="one columns">
        	S|No
        </div>
        
        <div class="three columns">
        	Name
        </div>
        
        <div class="four columns">
        	Email
        </div>
        
        
        <div class="two columns">
        	Invite Accepted
        </div>
        
        <div class="two columns">
        	Time
        </div>
    
    </div>
</div>   
<table width="100%" cellpadding="10" cellspacing="10" id="contentTbl">
<tr>
<td>
<?php if(@$data['n_invites'] > 0 ){ ?>

  <?php     
  	   
		//if(@$totalrecord['size'] >= 	@$totalrecord['per_page']):
			$sn = 0;
			for($i=0; $i < @$data['n_invites']; $i++){
			 $sn = $sn + 1;
   ?>
   
   <div class="row">

	<div class="twelve columns">
    
    	<div class="one columns">
        	<?php echo $sn;  ?>
        </div>
        
        <div class="three columns">
        	<?php echo @$invite['invite_first_name'][$i]."  ".@$invite['invite_last_name'][$i];  ?>
        </div>
        
        <div class="four columns">
        	<?php echo @$invite['invite_email'][$i];  ?>
        </div>
        
        
        <div class="two columns">
        	<?php echo @$invite['invite_accepted'][$i];  ?>
        </div>
        
        <div class="two columns">
        	<?php echo date('Y / m /d g:i:s A', @$invite['time_posted'][$i]);  ?>
        </div>
    
    </div>
</div> 

 <?php
	}
			
	
?>
		
 <?php
		
	}
?>		
 </td>
 </tr>    
</table>

</div>
<?php  if(@$data['n_invites'] > 0 ){  ?>
    <div class="wrapper-paging">
      <ul>
        <li><a class="paging-back">&lt;</a></li>
        <li><a class="paging-this"><strong>0</strong> of <span>x</span></a></li>
        <li><a class="paging-next">&gt;</a></li>
      </ul>
    </div>
   <?php }else{ ?>
   
    There are no current record
    
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



</script>

<!--END OF CONTENT-->


  </body>
</html>
