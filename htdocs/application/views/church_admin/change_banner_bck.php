<?php $this->load->view('vw_header'); ?>

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

    <div class="twelve columns"  style=" padding:5px 0;">
	<code class="_id_page_description" style="font-size:16px; border:none; color:#480000">
          <strong><?php echo @$data['page_desc'];   ?></strong>
    </code>
    
    <form action="" method="post" name="frmpost"  id="this-form" enctype="multipart/form-data">
    <?php if(@$data['flag']=="error") echo "<code id=\"post_result_msg\" class=\"error\">". @$data['info_msg']."</code>";   ?>
	   <?php if(@$data['flag']=="success") echo "<code id=\"post_result_msg\" class=\"success\">". @$data['info_msg']."</code>";   ?>
       <?php if(@$data['flag']=="info") echo "<code id=\"post_result_msg\" class=\"info\">". @$data['info_msg']."</code>";   ?>
	
    <!--<code class="<?php //echo @$data['css_cls'];   ?> stdfont stdfontcolor" id="post_result_msg"><?php //echo @$data['info_msg']; ?></code>-->
    <em style="font-size:11px; margin-bottom:10px;">*Required</em>
    <br>
    <br>
    <ul>
        <li class="field"><input class="text input" type="text" placeholder="Description" name="banner_desc" id="banner_desc" /></li>
		<li class="field"><input class="file input" name="userfile" type="file" placeholder="Upload" required><span style="font-size:11px; color:#00324A"><br>
		  [dimension: 940px by 150px; format:png]</span></li>
        
        <li class="field">
        	<input name="submit_btn" id="buttons" class="pretty medium primary btn" type="submit" value="&nbsp;&nbsp;Update Banner&nbsp;&nbsp;" / style="color:#FFF; text-shadow:1px 1px 1px #333; width:auto; padding:2px 7px;">
            <input name="content_type_id" id="content_type_id" type="hidden" value="1">
            <input name="church_id" id="church_id" type="hidden" value="<?php  echo @$data['church_id'];  ?>">
        </li>
    </ul>
    </form>
    
    
    
    
    
    
    
    </div>

 
 <div class="clearfix"></div>
 
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
/*
$(document).ready(function(){
	
	$('#this-form').submit(function(e) {
      e.preventDefault();
      $.ajaxFileUpload({
         url         :'/postmanager/update_general_banner/', 
         secureuri      :false,
         fileElementId  :'userfile',
         dataType    : 'html',
         data        : $('#this-form').serialize(),
         success  : function (data, status)
         {
            if(data.status != 'error')
            {
              alert(data.msg);
            }
            alert(data.msg);
         }
      });
      return false;
   });//end ajaxform upload
	
	return false;
});*/

</script>    
    
<!--END OF CONTENT-->


  </body>
</html>
