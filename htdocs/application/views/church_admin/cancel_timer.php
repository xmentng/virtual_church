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
                        <span style="padding:0px 10px; font-size:0.875em; font-weight:bolder;">Live Service Menus</span>
                    </div>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="/churchadmin/church_service/set_timer" style="color:#000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Set Service Timer</span></a>
                    </li>
                    
                    <li class="cls_rsbar_menu_content" style="list-style:none; border-bottom:dotted 1px #B0B0B0;">
                        <a href="/churchadmin/church_service/cancel_timer" style="color: #F45000;"><span style="padding:0px 10px; font-size:0.75em;"> &rarr; Cancel Timer</span></a>
                    </li>
    
        		</div>
             </div> <!--end cls_sidebar-->
              <div class="cls_landing_page" style="width:67%; float:left; font-size:0.8125em; padding:0px 7px; border:solid 1px #A0A0A0;">
				<div class="row">
                	<div class="twelve columns">
                    	<div class="three columns">
                        	<span style="padding:0px 7px;"><strong>Service Day</strong></span>
                        </div>
                        
                        <div class="three columns">
                        	<strong><span style="padding:0px 7px;">Date</span>
                            </strong></div>
                        
                        <div class="two columns">
                        	<strong><span style="padding:0px 7px;">Time Zone</span>
                            </strong></div>
                        
                        <div class="two columns">
                        	<strong><span style="padding:0px 7px;">Status</span>
                            </strong></div>
                        
                        <div class="two columns">
                        	<strong><span style="padding:0px 7px;">Action</span>
                            </strong></div>
                    </div>
     
                </div><!--end row-->
                
                
                
                <?php
					if($data['n_timer'] > 0 ){
						
						$sn=0;
						
						for($i=0; $i<$data['n_timer']; $i++):

				?>
                <div class="row" style="border:solid 1px #DDD; margin:0 0 5px 0">
                	<div class="twelve columns">
                    	
                        <div class="two columns">
                        	<span style="padding:0px 7px;"><?php  echo $timer['service_day'][$i];   ?></span>
                        </div>
                        
                        <div class="four columns">
                        	<span style="padding:0px 7px;"><?php  echo date("d-m-Y h:i:s A", $timer['time_posted'][$i]);   ?></span>
                        </div>
                        
                        <div class="two columns">
                        	<span style="padding:0px 7px;"><?php  echo  $timer['time_zone'][$i] ?></span>
                        </div>
                        
                        <div class="two columns">
                        	<span style="padding:0px 7px;"><?php  echo  $timer['status'][$i] ?></span>
                        </div>
                        
                        <div class="two columns">
                        
                        	<a href="javascript:void(0)" id="<?php  echo $timer['id'][$i];  ?>" class="btn cls_cancel_timer">
                            	<span style="padding:0px 7px;">Cancel</span>
                            </a>
                            
                        </div>
                        
                    </div>
     
                </div><!--end row-->
                <?php
						endfor; 
					}else{
				
				?>
                <div class="row">
                	
                    <div class="twelve columns">
                    	<span style="padding:0px 7px;">There are no current record.</span>
                    </div>
     
                </div><!--end row-->
                
                <?php
					}
				?>
              </div><!--end cls_landing_page-->
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

function cancel_timer(param){
	$.ajax({
		   type: "POST",
		   url:		"/delete/cancel_ref_timer/" + param,
		   data: $('#this-form').serialize(),
		   success:	function(e){
			   alert(e);
			   document.location="/churchadmin/church_service/cancel_timer";
		   }//end success execution
	});
}//end function

/////////////////////////////////////////////////////

$('.cls_cancel_timer').click(function(){
	
	var id = $(this).attr('id');
	
	if (confirm("Do you want to cancel this timer?")) {
        cancel_timer(id);
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
