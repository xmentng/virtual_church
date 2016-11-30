<?php $this->load->view('vw_header');  ?>
<script type="text/javascript"
  src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js">
</script>
<script>
  $(document).ready(function()
  {
	//ajaxTime.php is called every second to get time from server
   var refreshId = setInterval(function() 
   {
	 $('#ben2').load('/online.php?randval='+ Math.random());
   }, 9000);
   //stop the clock when this button is clicked
 
  });
   </script>
    <script type="text/javascript">
$(function() {

$(".btn2").click(function() {

var name = $("#name").val();
var email = $("#email").val();
var comment = $("#comment").val();
var Country = $("#Country").val();
var dataString = 'name='+ name + '&email=' + email + '&comment=' + comment + '&Country=' + Country;
	
	if(name=='' || email=='' || comment=='')
     {
    alert('Please Give Valide Details');
     }
	else
	{
	$("#flash222").show();
	$("#flash222").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
$.ajax({
		type: "POST",
  url: "/response.php",
   data: dataString,
  cache: false,
  success: function(html){
 
  $("ol#update").append(html);
  $("ol#update li:last").fadeIn("slow");
  document.getElementById('email').value='';
   document.getElementById('name').value='';
    document.getElementById('comment').value='';
	$("#name").focus();
 
  $("#flash222").hide();
	
  }
 });
}
return false;
	});



});


</script>
  <link rel="stylesheet" href="/css/news.css" type="text/css" media="screen" />
  <script src="/js/jquery-1.7.1.min.js" type="text/javascript"></script> 
  <script src="/js/jquery.hashchange.min.js" type="text/javascript"></script>
  <script src="/js/jquery.easytabs.min.js" type="text/javascript"></script> 

<link href="/css/style.css" media="all" rel="stylesheet" />
<link href="/css/menu.css" media="all" rel="stylesheet" />
<link href="/css/maintabs.css" media="all" rel="stylesheet" />
 <link rel="stylesheet" href="/css/slideshow.css" type="text/css" media="screen" /> 
  <link rel="stylesheet" href="/css/news.css" type="text/css" media="screen" />
<style>

.maintabs  a:nth-child(2) {
background: #fff;
color:#333;
border-left-color: #CCC;
}
</style>


    
    
<style>


#video{ width:97%; height:360px; background:#000 url(/images/video_banner.jpg); padding:9px; float:left}
#topBlueBar{ width:100%; height:25px; background:url(/images/topbarbg.jpg) left top repeat-x; font-size:11px; color:#fff;}
#bottomBlueBar{ width:100%; height:47px; background:url(/images/bottombarbg.jpg) left top repeat-x; color:#fff; float:left;}
#topBlueBarInnerLeft{ width:200px; padding:3px 20px; float:left;}

#topBlueBarInnerRight{ width:121px; height:33px; padding:4px 0; float:right;}
#tabs{height:20px; margin:0 5px; padding:12px 7px; float:left; color:#fff; font-size:20px}
.panel-container
{
height:405px;
 width:95%;
 padding:5px 2.8%; 
 float:left;
 background:#eee  url(/images/preload.gif) center no-repeat;	
}
#tabs1-blog,#tabs1-bible,#tabs1-note, #tabs1-card{
height:400px;
width:100%; 
background:#F5F5F5;
overflow:auto;

}

frame{ float:left;}
.selectmenu{
	width:250px;
	height:36px;
	background:#fff;
	padding:2px 0;	
	
	}
#tabmenu{
		 width:100%; 
		 float:left;
		  background:url(/images/bottombarbg.jpg) left top repeat-x;
		   height:41px;
		   
	}
ul#tabmenu {
		margin:0;
		padding:0;
		z-index:1000;
		
		}
		
 ul#tabmenu li{
	display:block;
		height:40px;
		line-height:40px;
		float:left;
		font-size:12px;
		color:#fff;
		font-weight:bold;
		margin-left:5px;
		list-style:none;
		padding:0 10px;
		
		}
 ul#tabmenu li a{
		color:#fff;
		text-decoration:none;
		}

/*ul#tabmenu li:hover{
		text-decoration:none;
		height:40px;
		color:#333;
		position:relative;
	 top:5px;
		cursor:pointer;
		background-color:#fff;
		background:url(images/taboverbg.jpg) top left repeat;
		}
		
		ul#tabmenu li:hover a{
		text-decoration:none;
		color:#333;
		}
		*/
		
	ul#tabmenu li.active {
	 
	 text-decoration:none;
	 position:relative;
	 top:5px;
	height:40px;
	margin-left:5px;
		cursor:pointer;
		background-color:#fff;
		background:#f5f5f5 url(/images/taboverbg.jpg) top left repeat-x;
		 }
		 
		 ul#tabmenu li.active a{
			 text-decoration:none;
		color:#333;
		text-shadow:1px 1px 1px #fff;
		}	
</style>


<style type="text/css">
.background {
    border-style: none;
    width: 62px;
	margin-top:10px;
	overflow:hidden;
	position:relative;
	top:-10px;
    height: 38px;
}
.numbers {
    border-style: none;
    background-color: #292929;
    padding: 0px;
    margin: 0px;
    width: 62px;
    height: 42px;
	
    text-align: center; 
    font-family: Arial; 
    font-size: 34px;
    font-weight: normal;    /* options are normal, bold, bolder, lighter */
    color: #C00;     /* change color using the hexadecimal color codes for HTML */
}
.title {    /* the styles below will affect the title under the numbers, i.e., "Days", "Hours", etc. */
    border: none;    
    padding: 0px;
    margin: -5px 3px;
    width: 62px;
    text-align: center; 
    font-family: Arial; 
    font-size: 10px; 
    font-weight: normal;    /* options are normal, bold, bolder, lighter */
    color: #f5f5f5;    /* change color using the hexadecimal color codes for HTML */
    background-color:none;  
}
#form {    /* the styles below will affect the outer border of the countdown timer */
    width: 450px;
    height: 80px;
	text-shadow:none;
    border-style: ridge;  /* options are none, dotted, dashed, solid, double, groove, ridge, inset, outset */
    border-width:0;
    border-color: #666666;  /* change color using the hexadecimal color codes for HTML */ 
    background-image:transparent;
    padding: 5px;
    margin: 190px auto 0;
    position: relative;   /* leave as "relative" to keep timer centered on your page, or change to "absolute" then change the values of the "top" and "left" properties to position the timer */
    top: 0px;            /* change to position the timer */
    left: 0px;            /* change to position the timer; delete this property and it's value to keep timer centered on page */
}
.line {
    border-style: none;
    width: 62px; 
    height: 2px;
    z-index: 15;
	color: # 999
}
</style>
<body class="whitebg">

<!--HEADER-->
<?php $this->load->view('vw_headmast'); ?>

<!--END OF HEADER -->


<!--CONTENT-->
<div class="container ">

  	<div class="row">
  	  <div class="nine columns" style="width:100%;">
      <!--VIDEO -->
          <div class="greybar">
              <div class="greybar_left">  
                    <div>
                       <!-- <a href="/auth/logout/"  style=" padding:2px 5px; font-size:12px; height:auto;"><strong>Logout</strong></a> -->                    
                    </div>
              </div>
              
              <div class="greybar_right">
                    <strong><em><?php  echo "Welcome ". authmanager::load_user_fullname().' from '.$church_detail['church_name'][0];  ?>!</em></strong>
              </div>
              
              <div style="clear:both"></div>
              
          </div><!--end class greybar-->
      
      
    	</div><!--end class nine columns-->
        
         <div class="cls_landing_page" style="font-size:0.75em; height:auto; background: #FFF; width:100%;">
    
			<div class="cls_maintab" style="width:100%; height:25px; line-height:25px;background:#E8E8E8;">
                <?php  $this->load->view('maintab');    ?>
            </div><!--end cls_maintab-->
            <div style="clear:both"></div>
            
            <div class="cls_landing_page_content">
            	
                <div class="55perc_col_content" style="width:55%; float:left;">
                	<div id="video">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>


                    </div>
               
                </div><!--end class 55perc_col_content-->
                
                
                <div class="45perc_col_content" style="width:45%; float:right;">
                	
                    <div style="width:390px; margin-left:10px; float:left; background:#eee; text-shadow:none;">

<!--<div  id="topBlueBar">

<div id="topBlueBarInnerLeft">
<div style=" float:left; padding:2px 10px"><img src="images/siloh.png" width="15" height="16" alt="siloh" /></div>
<div style="width:auto; padding:2px 2px; float:left;">Welcome Chris!</div>
<div style="width:auto; padding:6px 10px; float:left;"><img src="images/arrow.png" width="8" height="7" alt="aroow" /></div>
</div>
<div id="topBlueBarInnerRight" style="width:auto; height:18px; padding:4px 20px; float:right;">

<script type="text/javascript"
src="http://www.seocentro.com/geo/geocf.pl">
</script>
</div>
</div>-->
<!--<div  id="bottomBlueBar">

<div id="tabs">Info</div>
<div id="tabs">Blog</div>
<div id="tabs">Bible</div>
<div id="tabs">Note</div>
<div id="tabs">LiveChat</div>

</div>-->

 
<!--<div style="width:100%; background:url(images/gradient2.jpg) left top repeat-x; float:left">

<div style="width:92%; padding:10px 10px 10px 20px;  float:left">LIVE BROADCAST SCHEDULE</div>

<div style="width:95%; margin:2px 10px; background:#000; float:left">
<div style="width:96px; float:left; padding:5px 10px; color:#0D96EB; font-weight:bold"> SUNDAY </div>
<div style="width:100px; float:left; padding:5px 10px; color:#f5f5f5; font-weight:bold">  10:00HRS GMT       </div>
<div style="width:110px; float:left; padding:5px 10px; color:#0D96EB; font-weight:bold"> SUNDAY SERVICE</div>


</div>



<div style="width:95%; margin:2px 10px; background:#000; float:left">
<div style="width:96px; float:left; padding:5px 10px; color:#0D96EB; font-weight:bold"> SUNDAY </div>
<div style="width:100px; float:left; padding:5px 10px; color:#f5f5f5; font-weight:bold">  10:00HRS GMT       </div>
<div style="width:110px; float:left; padding:5px 10px; color:#0D96EB; font-weight:bold"> SUNDAY SERVICE</div>


</div>




<div style="width:95%; margin:2px 10px; background:#000; float:left">
<div style="width:96px; float:left; padding:5px 10px; color:#0D96EB; font-weight:bold"> SUNDAY </div>
<div style="width:100px; float:left; padding:5px 10px; color:#f5f5f5; font-weight:bold">  10:00HRS GMT       </div>
<div style="width:110px; float:left; padding:5px 10px; color:#0D96EB; font-weight:bold"> SUNDAY SERVICE</div>


</div>
<div style="width:92%; padding:10px 10px 10px 20px; float:left">LATEST NEWS</div>

<div style="float:left;padding-bottom:8px;">
<div style="width:361px; height:
219px; margin:0 auto; padding:5px 10px;  background:url(images/newsbg.jpg) center top no-repeat;">  
<div style="width:94%; float:left; border-bottom:2px groove #FFF; padding:5px 10px;">
<p>Rhapsody of Realities Electronic format for May is now available for download. Click Here to Download.</p>
</div> 

<div style="width:94%; float:left; border-bottom:2px groove #FFF; padding:5px 10px;">
<p>Rhapsody of Realities Electronic format for May is now available for download. Click Here to Download.</p>
</div>


<div style="width:94%; float:left; border-bottom:2px groove #FFF; padding:5px 10px;">
<p>Rhapsody of Realities Electronic format for May is now available for download. Click Here to Download.</p>
</div>

<div style="width:94%; float:left; border-bottom:2px groove #FFF; padding:5px 10px;">
<p>Rhapsody of Realities Electronic format for May is now available for download. Click Here to Download.</p>
</div>
<div style="width:94%; float:left; border-bottom:2px groove #FFF; padding:5px 10px;">
<p>Rhapsody of Realities Electronic format for May is now available for download. Click Here to Download.</p>
</div>

<div style=" clear:both" ></div>
 </div>
 
 
</div>



</div>-->

<div id="tab-container" class='tab-container'>
  
  
  <ul class='etabs' id="tabmenu">
   
   
   <li class='tab'><a href="#tabs1-chat">Live Chat</a></li>
   
   <li class='tab'><a href="#tabs1-bible">Bible</a></li>
   
    <li class='tab'><a href="#tabs1-note">Note</a></li>
    
     <li class='tab'><a href="#tabs1-card">Call to salvation</a></li>
   
 </ul>
 
 <div style="clear:both"></div>
 
 <div class='panel-container'>
  <div id="tabs1-chat"><?php 
$file = 'coveritlive.txt';
$fh = fopen($file, 'r');
$contents = fread($fh,filesize($file));
fclose($fh);
echo "$contents";
//exit;
?>
</div>
   <div id="tabs1-bible"><iframe height="400px" width="370px" frameborder="0"  src="http://m.youversion.com/bible/kjv/gen/1/1"></iframe></div>
 
  <div id="tabs1-note"> <form style="padding:0; margin:0;" action="" target="emailFrame" method="post" onSubmit="emailSent2();" id="notesEmailerForm">
                
		  <div class="noteLinks">
                         		<iframe height="360px" width="365px" frameborder="0"  src="/note.php"></iframe><!-- End DIV "noteLinks" --><!-- End DIV "notesTabInner" --><!-- End DIV "notesPadding" --><!-- End DIV "notesContainer2" -->
                
                 </div><!-- End DIV "noteLinks" --><!-- End DIV "notesTabInner" --><!-- End DIV "notesPadding" --><!-- End DIV "notesContainer2" -->
                
                <div class="notesContainer2" id="notesEmailer2" style="display: none;">
                    <div class="notesPadding2">
                        <div class="notesTabInner" style="padding: 10px;">
                            <h2 class="notesHeader">Email Notes</h2>                           
                            <div class="emailDetails">
                                <p>Enter your email address below and click <strong>send</strong> to send your notes to your inbox.</p>
                            </div><!-- End DIV "emailDetails" -->

                            <div class="formField">
                                Email Address: &nbsp;
                                <input type="text" name="recipientAddress" id="recipientAddress" /><br />

                                <input type="submit" name="submit" id="submit" value="Send" />
                                <input type="hidden" name="fromAddress" value="info@worldchangers.org" />
                                <input type="hidden" name="fromName" value="World Changers Church International" />
                                <input type="hidden" name="organizationName" value="World Changers Church International" />
                            </div><!-- End DIV "formField" -->
                            
                            <div class="noteLinks">
                                <a href="javascript:void(emailSent2());">&#8249; Return to Notes</a>
                            </div><!-- End DIV "noteLinks" -->
                        </div><!-- End DIV "notesTabInner" -->
                 	</div><!-- End DIV "notesPadding" -->
            </div><!-- End DIV "notesContainer" -->   
 
 
            </form><!-- End FORM "notesEmailerForm" -->
            
            </div>
            
   
   
   <div id="tabs1-card" style=" background:#fff;border:1px solid #999"> 
   
   <div style="padding:10px 5px; ">
   <div id="flash222"></div>
   <ol  id="update" class="timeline">
</ol> <form action="" id="sharetestimony" method="post" enctype="multipart/form-data" style="font-size:12px;color:#666600;">
<br>


  <table width="100%" border="0" cellspacing="0" cellpadding="5" style="color:#666666; font-size:12px;">

    <tr>

      <td width="12%"></td>

      <td width="88%"><input name="name" id="name" type="hidden" value="<?php echo $page_res['name_of_user']; ?>"></td>

      </tr>

    <tr>

      <td></td>

      <td><input name="email" id="email" type="hidden" value="<?php echo $page_res['email'];?>"></td>

      </tr>
 <tr>

      <td></td>

      <td><input name="Phone_no" type="hidden" value="<?php echo $page_res['phone_no'];?>"></td>

      </tr>

    <tr>

      <td></td>

      <td><input name="Country" id="Country" type="hidden" value="<?php echo @$Country;?>"></td>

      </tr>

    <tr>

      <td valign="top"><span style="color:#FF0000; font-size:10px;color:red;">*</span>Message:</td>

      <td><textarea class=" textareaEmail2" name="comment" id="comment" style="min-height:80px; min-width:270px;"></textarea></td>

      </tr>

    <tr>

      <td>&nbsp;</td>

      <td><input class="btn2" type="submit" name="cmdPostComment" id="cmdPostComment" value="SEND" />

        <input type="hidden" name="postid" id="postid" value="" /></td>

      </tr>

  </table>

  </form>

 </div>           </div>         
 </div>
  
  <div class="clear"></div>
</div>
  <div class=" clearfix"></div>
</div>
                </div><!--end class 45perc_col_content-->
                
                <div class=" clearfix"></div>
            	
           </div>
            <div class=" clearfix"></div>
    	 </div><!--end class landing page-->
    </div><!--end class row-->

    <div class=" clearfix"></div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="main_footer2">
    <?php  $this->load->view('vw_footer');  ?>
    </div>
</div>

<!--FOOTER-->
    

<script type="text/javascript">

	function hide_account_detail(){
		$('#recipient_acct_no').hide();
		$('#recipient_bank').hide();
		$('#teller_no').hide();
		return false;
	}//end function
	
	
	function show_account_detail(){
		$('#recipient_acct_no').show();
		$('#recipient_bank').show();
		$('#teller_no').show();
		return false;
	}//end function
	
	
	function show_local_wired_transfer_detail(){
		$('#issued_bank').show();
		$('#receiving_bank').show();
		$('#issued_bank_account').show();
		$('#receiving_bank_account').show();
		return false;
	
	}
	
	function hide_local_wired_transfer_detail(){
		$('#issued_bank').hide();
		$('#receiving_bank').hide();
		$('#issued_bank_account').hide();
		$('#receiving_bank_account').hide();
		return false;
	
	}
	
	
	function pay_pay_api(){
		hide_account_detail();
		hide_local_wired_transfer_detail();
		alert('Comming soon...');	
	}
	
	
	function play_on_android_device(){
		$('#screen').html('<video src="<?php echo @$church_detail['android'][0];    ?>" width="770" height="450" controls="controls"  autoplay="autoplay" preload></video>');
		
	}//end function
	
	
	function play_on_ipad_device(){
		$('#screen').html('<video src="<?php echo @$church_detail['ipad'][0];    ?>" width="770" height="450" controls="controls"  autoplay="autoplay" preload></video>');
	}//end function
	
	
	
	function play_on_bb_device(){
		//alert(2);
		$('#screen').innerHTML = '<video src="<?php echo @$church_detail['blackberry'][0];    ?>" width="770" height="450" controls ></video>';
	}//end function

$(document).ready(function(){

//////////////////////////////////////////////////////////

	$('#android_device').click(function(){
		play_on_android_device();
		return false;
	});
	
	
	$('#ipad_device').click(function(){
		play_on_ipad_device();
		return false;
	});
	
	
	$('#bb_device').click(function(){
		play_on_bb_device();
		return false;
	});

///////////////////////////////////////////////////////////
	$('#cmdclick').click(function(){
		//alert(1);return false;
		$.ajax({
			 type: "POST",
				   url:	"/postmanager/change_user_password/",
				   data: $('#frmpost').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						var sp = e.split('|');
		
							if(sp[0] == "success"){
								//alert(e);return false;
								$('#post_result_msg').addClass("success");
								$('#post_result_msg').removeClass("error");
								
								$('#post_result_msg').html( sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								$('#frmpost')[0].reset();
								//document.location="/churchmember/edit_profile";
								
								
							}//end if
							
							if(sp[0] == "failure"){
								
								$('#post_result_msg').removeClass('success');
								$('#post_result_msg').addClass('error');
								$('#post_result_msg').html(sp[1]);
								//$('html, body').animate({scrollTop:0}, 'slow');
								
								
							}//end if
					  	
				   } //end function success

		});//end ajax
	
		return false;
	});//end click  event
	
///////////////////////////////////////////////////////	
	return false;	
						   
});

</script>



<!--END OF CONTENT-->



  </body>
</html>

