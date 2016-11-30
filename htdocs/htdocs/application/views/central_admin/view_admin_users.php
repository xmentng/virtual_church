<?php $this->load->view('vw_header');  ?>



<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('central_admin/vw_headmast'); ?>

<!--NAVIGATION -->

<?php $this->load->view('central_admin/vw_horizontal_nav'); ?>
  
  

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
 <i class="icon-doc-text-inv" ></i> <span>ALL CHURCH ACCOUNTS</span> 
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
<a href="/churchadmin/useraccount/create/" title="Create New User"> <i class="icon-plus-circled"></i>
 <br><span class="smalltext"> New</span></a>
 </div>
 
 <div class="img"> 
 <a href="/churchadmin/useraccount/edit/" title="Edit User Account"><i class="icon-pencil"></i>
 <br><span class="smalltext">Edit</span> </a>
 </div>
 
 <div class="img">  
 <a href="/churchadmin/useraccount/activate/" title="Activate User Accounts"><i class="icon-thumbs-up"></i>
 <br><span class="smalltext">Activate</span></a>
 </div>
 <div class="img"> 
 <a href="/churchadmin/useraccount/deactivate/" title="Deactivate User Account"><i class="icon-thumbs-down"></i>
 <br><span class="smalltext">Deactivate</span></a>
 </div>
 <div class="img"> 
 <a href="#"><i class="icon-cancel-circled"></i>
 <br><span class="smalltext">Delete</span></a>
 </div>
 
 </div>
 <div class="clearfix"></div>
 </div>
  -->




<div class="messageWr"  style=" padding:5px 0">
<form action="" method="post" id="this-form">
<table width="100%" cellpadding="10" cellspacing="10">
  <tr>
   <!--<td width="45" style=" background:#eee"><input  name="reason" type="checkbox" value="" class="check-all" id="checkall" /></td>-->
    <td width="176" style=" background:#eee"><strong>Name</strong></td>
    <td width="137" style=" background:#eee"><strong>User ID</strong></td>
    <td width="162" style=" background:#eee"><strong>Password</strong></td>
    <td width="162" style=" background:#eee"><strong>Church Name</strong></td>
    <td width="72" style=" background:#eee"><strong>Status</strong></td>
     <td width="197" style=" background:#eee"><strong>Date</strong></td>
     <!--<td width="114" style=" background:#eee"><strong>Action</strong></td>-->
    <!--<td width="164" style=" background:#eee"><strong>Deactivate</strong></td>-->
  </tr>
  <?php     
  	if(@$data['nof_items'] > 0 ){   
		if(@$totalrecord['size'] >@$totalrecord['per_page']):
			for($i=0; $i < @$totalrecord['per_page']; $i++){
			
   ?>
          <tr>
           <!--<td width="45"><input name="reason" type="checkbox" value="" id="<?php //echo @$admin_user['id'][$i];  ?>" /></td>-->
            <td width="176"><a href=""><?php echo @$admin_user['first_name'][$i]."  ".@$admin_user['last_name'][$i];  ?></a></td>
            <td width="137"><?php echo @$admin_user['user_name'][$i];  ?></td>
            <td width="162"><?php echo @$admin_user['user_pwd'][$i];  ?></td>
            <td width="72"><?php echo @$admin_user['church_name'][$i];  ?></td>
            <td width="72"><?php echo @$admin_user['status'][$i];  ?></td>
            <td width="197"><?php echo date("h:i:s A",@$admin_user['date_created'][$i]);  ?></td>
            <!--<td width="114"><a style="display:block;" href="/centraladmin/churchadmin/edit/<?php  #echo @$admin_user['id'][$i]; ?>" class="uicon-thumbs-up" name=""  id="<?php #echo @$admin_user['id'][$i];  ?>" title="Edit this account"></a></td>-->
            <!-- <td width="164"><input class="uicon-thumbs-down" name="" type="submit" value="" id="<?php #echo @$admin_user['id'][$i];  ?>"></td>-->
         
          </tr>
 <?php
			}
			endif;
			
			if(@$totalrecord['size'] <= @$totalrecord['per_page']):
			for($i=0; $i < @$totalrecord['size']; $i++){
	
?>
			<tr>
           <!--<td width="45"><input name="reason" type="checkbox" value="" id="<?php //echo @$admin_user['id'][$i];  ?>" /></td>-->
            <td width="176"><a href=""><?php echo @$admin_user['first_name'][$i]."  ".@$admin_user['last_name'][$i];  ?></a></td>
            <td width="137"><?php echo @$admin_user['user_name'][$i];  ?></td>
            <td width="162"><?php echo @$admin_user['user_pwd'][$i];  ?></td>
            <td width="72"><?php echo @$admin_user['church_name'][$i];  ?></td>
            <td width="72"><?php echo @$admin_user['status'][$i];  ?></td>
            <td width="197"><?php echo date("h:i:s A",@$admin_user['date_created'][$i]);  ?></td>
            <!--<td width="114"><a style="display:block;" href="/centraladmin/churchadmin/edit/<?php  #echo @$admin_user['id'][$i]; ?>"   class="uicon-thumbs-up" name=""  id="<?php #echo @$admin_user['id'][$i];  ?>" title="Edit this account"></a></td>-->
            <!-- <td width="164"><input class="uicon-thumbs-down" name="" type="submit" value="" id="<?php #echo @$admin_user['id'][$i];  ?>"></td>-->
         
          </tr>
          
 <?php
			}
			endif;
	}
?>		
        <tr>
        	<td colspan="7"> <?php 
			if(@$totalrecord['size'] > @$totalrecord['per_page']){
				echo "<a href=\"/churchadmin/useraccount/edit/\"><</a>".$data['paginate'];
			}  ?></td>
        </tr>       
</table>
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
<script type="text/javascript">
$('#checkall:checkbox').change(function () {
    if($(this).attr("checked")) $('input:checkbox').attr('checked','checked');
    else $('input:checkbox').removeAttr('checked');
});
////////////////////////////////////////
var nof_chkbox = 0;
$("input[name='reason']").on('click',function(e) {
    var itemselected = $("input[name='reason']:checked");
    var nof_chkbox = itemselected.length;
	
    
});
/////////////////////////////////////////


</script>

<!--END OF CONTENT-->


  </body>
</html>
