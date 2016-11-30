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
             <div class="cls_sidebar" style="width:30%; float:left;">
              	<div class="cls_rsbar_content" style="border:solid 1px #E0E0E0;">
        	
                    <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color: #B0B0B0;">
                        <span style="padding:0px 10px; font-size:0.875em; font-weight:bolder; ">Cell System</span>
                    </div>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="/churchadmin/cell/create" style="color: #000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Create Cell</span></a>
                    </li>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="/churchadmin/cell/view" style="color: #000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; View | Edit Cell</span></a>
                    </li>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="/churchadmin/cell_leader/create" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Create Cell Leader</span></a>
                    </li>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="/churchadmin/cell_leader/view" style="color: #F45000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; View | Edit Cell Leader</span></a>
                    </li>
                    
                    <!-- <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="/churchadmin/cell_outline/create" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Create Cell Outline | Message</span></a>
                    </li>
                    -->
                   <!-- <div class="cls_rsbar_header" style="height:30px; line-height:30px; background-color: #B0B0B0;">
                        <span style="padding:0px 10px; font-size:0.875em; font-weight:bolder; ">Cell System Report</span>
                    </div>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="#" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Cell Service Attendance Report</span></a>
                    </li>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="#" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Cell Partnership & Giving Reports</span></a>
                    </li>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="#" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Report on Souls Won</span></a>
                    </li>-->
                    
                   
        		</div>
             </div> <!--end cls_sidebar-->
             
             <div class="cls_landing_page" style="width:70%; float:left;">

                    	<form action="" method="post" id="this-form" style=" margin-left:7px;">
<div class="table-wrapper" style="width:100%">
        
<div class="wrapper-panel">     
<table width="100%" cellpadding="7" cellspacing="0" id="contentTbl">
  <tr>
    <td width="45" style=" background:#eee"><strong>S/No.</strong></td>
    <td width="939" style=" background:#eee"><strong>Name</strong></td>
    <td width="939" style=" background:#eee"><strong>E-mail</strong></td>
    <td width="939" style=" background:#eee"><strong>Country</strong></td>
    <!--<td width="197" style=" background:#eee"><strong>Date</strong></td>-->
    <td width="162" style=" background:#eee"><strong>Cell Name</strong></td>
    <td width="162" style=" background:#eee"><strong>Time Created</strong></td>
    <td width="162" style=" background:#eee"><strong>Action</strong></td>
    </tr>
  <?php   
  	$sn = 0;
  	if(@$data['n_cell_leaders'] > 0 ){   
		//if(@$totalrecord['size'] >= 	@$totalrecord['per_page']):
			for($i=0; $i < @$data['n_cell_leaders']; $i++){
				++$sn;
   ?>
          <tr>
            <td width="45"><?php  echo $sn;  ?></td>
            <td><?php echo @$cell_leader['cell_leader_name'][$i];  ?></td>
            <td><?php echo @$cell_leader['cell_leader_email'][$i];  ?></td>
            <td><?php echo @$cell_leader['country'][$i];  ?></td>
             <td><?php echo @$arrCell['cell_name'][$i];  ?></td>
            <td><?php echo date("m-d-Y h:i:s A",@$cell['time_created'][$i]);  ?></td>
           
            <td width="162">
            	<a href="/churchadmin/cell_leader/edit/<?php echo @$cell_leader['id'][$i]  ?>">Edit</a>
                &nbsp; &nbsp; &nbsp;
                
                <a  class="cls_delete" id="<?php echo @$cell_leader['id'][$i]  ?>" href="#">Delete </a>
                
             </td>
            
            </tr>
 <?php
			}
			
	
?>
 
  
  <?php
			
	}
?>		
 
  </table>

</div>
  <?php  if(@$data['n_cell_leaders'] > 0 ){  ?>
    <div class="wrapper-paging">
      <ul>
        <li><a class="paging-back">&lt;</a></li>
        <li><a class="paging-this"><strong>0</strong> of <span>x</span></a></li>
        <li><a class="paging-next">&gt;</a></li>
      </ul>
    </div>
   <?php }else{ ?>
   
    There are no current content.
    
    <?php } ?>
</div>

</form>


              	
             </div>
             
              
 <div class="clearfix"></div> 
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
		   url:		"/delete/remove_ref_cell_leader/" + param,
		   data: $('#this-form').serialize(),
		   success:	function(e){
			   alert(e);
			   document.location="/churchadmin/cell/view";
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

//////////////////////////////////////////////////

$('#cmdclick').click(function(){
		
		
		$.ajax({
			   type: "POST",
			   		url:	"/postmanager/create_church_cell",
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
								$('html, body').animate({scrollTop:0}, 'slow');
								$('#this-form')[0].reset();
							}//end if
						
					}//end function success
		});//end ajax	
	
	
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
