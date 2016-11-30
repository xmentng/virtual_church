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
 <i class="icon-doc-text-inv" ></i> <span>ONLINE USERS</span> 
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
          <?php
			  	
			  	if( @$data['n_online_churches'] > 0 ){ 
			  ?>
			  <table width="100%" border="0" cellspacing="0" cellpadding="7" style="border:solid 1px #92B6AE;" align="left">
			
                 
                  <?php     
				
				  	//if( @$nschs['size'] > @$nschs['per_page'] ):
						for( $j = 0; $j <  @$data['n_online_churches']; $j++ ){
							
							$church_name = useraccount::getAttributeValue(array('id', 'church_name'), $tblname='tbl_churches', array('id'=>$churches_online['church_id'][$j]), $retval='church_name');
							if($church_name){
								
								 
							//if(!$church_name)echo 'Christ Embassy Church Streaming Portal.';   
							
				  ?>
				  <tr>
				    <td colspan="5">
                    	<div class="schdetail">
                       		 CHURCH NAME:  <em><strong>
							 <?php 
							 	
									//$church_name = useraccount::getAttributeValue(array('id', 'church_name'), $tblname='tbl_churches', array('id'=>$churches_online['church_id'][$j]), $retval='church_name');
									//if($church_name)echo strtoupper($church_name);  
									//if(!$church_name)echo 'Christ Embassy Church Streaming Portal.';   
									echo strtoupper($church_name); 
								
								?></strong>
                                </em>
                           <!--  <br>
					
							  CHURCH ID:  <em><strong><?php //echo strtoupper(@$churches_online['church_id'][$j]);   ?></strong></em>
                             <br>-->
                  
                        </div>
                        <div><strong>Church Member Detail</strong></div>
                        <div style="clear:both"></div>
                    </td>
			      </tr>
                   <!--position to loop for store info-->
                   <?php
						
						//if($nstore > 0){
						$sn = 0;	
																								
				   ?>
                   <tr>
                     <th width="14%" align="left" nowrap="nowrap"  class="tblfldheader" style="border-left:none;"><strong>S/N</strong></th>
                     <th width="23%" align="left" nowrap="nowrap"  class="tblfldheader"><strong>First Name</strong></th>
                     <th width="12%" align="left" nowrap="nowrap"  class="tblfldheader"><strong>Last Name</strong></th>
                   <!--  <th width="6%" align="left" nowrap="nowrap"  class="tblfldheader">Contact No#</th>-->
                     <th align="left" nowrap="nowrap"  class="tblfldheader"><strong>Date Created</strong></th>
                     </tr>
                   
                   <?php  
				   		//get the users under this church
						
						$church_members = useraccount::loadDetails('tbl_users', array('church_id'=>$churches_online['church_id'][$j], 'is_online'=>1, 'status'=>1),array('id', 'first_name', 'last_name', 'user_name', 'email', 'church_id', 'date_modified', 'is_online', 'status'), $num=NULL,$orderBy='id');
						
						$cid = $churches_online['church_id'][$j];
						
						$n_members = useraccount::count_active_records($sql="SELECT * FROM tbl_users WHERE is_online='1' AND status='1' AND church_id=\"$cid\" ORDER BY id");
				   		
						$sn = 0;
				   		for($i = 0; $i < $n_members; $i++):
				   			++$sn;
				   		//echo $n_members; exit;
						if(!$church_members['date_modified'][$i])$date_mod = NULL;
						if($church_members['date_modified'][$i])$date_mod = date('l, j F, Y', @$church_members['date_modified'][$i]);
						
						
						//if(!$date_mod)$date_mod = NULL;
				   ?>
                   <tr  class="rowfldcontent">
                      	<td nowrap="nowrap" class="tblfldcontent"><?php echo @$sn;    ?></td>
                        <td nowrap="nowrap" class="tblfldcontent"><?php echo @$church_members['first_name'][$i];    ?></td>
                        <td nowrap="nowrap" class="tblfldcontent"><?php echo @$church_members['last_name'][$i];    ?></td>
                        <!--<td nowrap="nowrap" class="tblfldcontent"><?php //echo @$store['contact_no'][$i];    ?></td>-->
                        <td nowrap="nowrap" class="tblfldcontent"><?php echo @$date_mod;    ?></td>
                      </tr>
                     
                   <?php
				   		endfor;
					
						echo "<tr><td nowrap=\"nowrap\" class=\"tblfldcontent\" colspan=\"8\"><hr style='border:dotted 1px red'><br></tr>";
				   		//++$pgno;
					   }
						}
				   ?>
                
                   
			  </table>
              <?php  } ?>
              
     
</form>


</div>

 
 <div class="clearfix"></div>
 
 </div>
 </div>
 </div>
 </div>
 

   </div>
   
 </div>
 
 
 
  <div class=" clearfix"></div>
 
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
