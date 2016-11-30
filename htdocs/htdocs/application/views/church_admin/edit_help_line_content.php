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
 <i class="icon-doc-text-inv" ></i> <span>Edit Help Lines</span> 
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
  <div class="twelve columns"  style=" padding:5px 0">
  <form action="" method="post" id="this-form">
<div class="table-wrapper" style="width:100%">
        
<div class="wrapper-panel" id="contentTbl">  

<div class="row" style="background-color:#7A8DAD; color:#FFF;">
	<div class="twelve columns">
        <div class="two columns">
            S/N
        
        </div>
        
        
        <div class="seven columns">
        
            Help Lines
        </div>
        
        
        <div class="three columns">
        
        Action
        
        </div>
    </div>
  </div>  

<!--   
<table width="100%" cellpadding="10" cellspacing="10" id="contentTbl">
  <tr>
    <td style=" background:#eee"><strong>S/No.</strong></td>
    <td style=" background:#eee"><strong>Help Line Content</strong></td>
    <!--<td width="197" style=" background:#eee"><strong>Date</strong></td>
    <td style=" background:#eee"><strong>Action</strong></td>
    </tr>-->
    
    <?php   
  	$sn = 0;
  	if(@$data['nof_rec'] > 0 ){   
		//if(@$totalrecord['size'] >= 	@$totalrecord['per_page']):
			for($i=0; $i < @$data['nof_rec']; $i++){
				++$sn;
   ?>
    <div class="row">
	<div class="twelve columns">
  
          
          <div class="two columns">
                <?php  echo $sn;  ?>
            
            </div>
            
            
            <div class="seven columns">
            
                <?php echo @$nbcontent['help_line'][$i];  ?>
            </div>
            
            
            <div class="three columns">
            
            <a href="/churchadmin/help_line_content/update/<?php echo @$nbcontent['id'][$i]  ?>">Edit</a>
                &nbsp; &nbsp; &nbsp;
                
                <a  class="cls_delete" id="<?php echo @$nbcontent['id'][$i]  ?>" href="/churchadmin/help_line_content/delete">Delete </a>
            
            </div>
            
           </div>
          </div> 
          
        <!--  <tr>
            <td width="45"></td>
            <td></td>
           
            <td width="162">
            	
                
             </td>
            
            </tr>-->
 <?php
			}
			
	
?>
 
  
  <?php
			
	}
?>		
 
</div>
  <?php  //if(@$data['nof_rec'] > 0 ){  ?>
   <!-- <div class="wrapper-paging">
      <ul>
        <li><a class="paging-back">&lt;</a></li>
        <li><a class="paging-this"><strong>0</strong> of <span>x</span></a></li>
        <li><a class="paging-next">&gt;</a></li>
      </ul>
    </div>-->
   <?php //}else{ ?>
   
   <!-- There are no current content.-->
    
    <?php //} ?>
<!--</div>-->
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
