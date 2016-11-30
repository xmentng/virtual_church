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
<h4  style=""> 
 <i class="icon-doc-text-inv" ></i> <span>EDIT USERS ACCOUNT</span> 
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




<div class="twelve columns"  style=" padding:5px 0">
<form action="" method="post" id="this-form">
<div class="table-wrapper" style="width:100%">
        
<div class="wrapper-panel">  
<table width="100%" cellpadding="10" cellspacing="10" id="contentTbl">
  <tr>
   <!--<td width="45" style=" background:#eee"><input  name="reason" type="checkbox" value="" class="check-all" id="checkall" /></td>-->
   	 <td style=" background:#eee"><strong>S/N</strong></td>
    <td  style=" background:#eee"><strong>Name</strong></td>
    <td  style=" background:#eee"><strong>User ID</strong></td>
    <td  style=" background:#eee"><strong>Password</strong></td>
    <td width="72" style=" background:#eee"><strong>Status</strong></td>
<!--     <td width="197" style=" background:#eee"><strong>Date</strong></td>-->
     <td width="114" style=" background:#eee"><strong>Action</strong></td>
    <!--<td width="164" style=" background:#eee"><strong>Deactivate</strong></td>-->
  </tr>
  <?php     
  	if(@$data['nof_rec'] > 0 ){   
		
			$sn = 0;
			for($i=0; $i < @$data['nof_rec']; $i++){
			++$sn;
   ?>
          <tr>
           <!--<td width="45"><input name="reason" type="checkbox" value="" id="<?php //echo @$users['id'][$i];  ?>" /></td>-->
           <td width="137"><?php echo @$sn;  ?></td>
            <td width="176"><a href=""><?php echo @$users['first_name'][$i]."  ".@$users['last_name'][$i];  ?></a></td>
            <td width="137"><?php echo @$users['user_name'][$i];  ?></td>
            <td width="162"><?php echo @$users['user_pwd'][$i];  ?></td>
            <td width="72"><?php echo @$users['status'][$i];  ?></td>
           <!-- <td width="197"><?php #echo date("h:i:s A",@$users['date_created'][$i]);  ?></td>-->
            <td width="114"><a style="display:block;" href="/churchadmin/useraccount/editaccount/<?php  echo @$users['id'][$i]; ?>" class="uicon-thumbs-up" name=""  id="<?php echo @$users['id'][$i];  ?>" title="Edit this account"></a></td>
            <!-- <td width="164"><input class="uicon-thumbs-down" name="" type="submit" value="" id="<?php #echo @$users['id'][$i];  ?>"></td>-->
         
          </tr>
 <?php
			}
		
	}
?>			
       
</table>

</div>
    <?php  if(@$data['nof_rec'] > 0 ){  ?>
    <div class="twelve columns wrapper-paging">
      <ul>
        <li><a class="paging-back">&lt;</a></li>
        <li><a class="paging-this"><strong>0</strong> of <span>x</span></a></li>
        <li><a class="paging-next">&gt;</a></li>
      </ul>
    </div>
    
    <a href="/export/church_user_accounts" title="Export to Excel" style="float:right; height:25px; line-height:25px; display:block; background-color:#EEE; color:#555;"><span style="font-size:0.6875em; font-weight:bolder; padding:0px 10px;">Export to Excel</span></a>
   <?php }else{ ?>
   
    There are no users online
    
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
$("input[name='reason']").on('click',function(e) {
    var itemselected = $("input[name='reason']:checked");
    var nof_chkbox = itemselected.length;
	
    
});
/////////////////////////////////////////


</script>

<!--END OF CONTENT-->


  </body>
</html>
