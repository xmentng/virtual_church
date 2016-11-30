<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo @$data['title'];   ?></title>
<script language="javascript" src="/js/jquery-1.8.2.min.js"></script>
<script language="javascript" src="/js/jquery.timers-1.0.0.js"></script>
<script type="text/javascript">

$(document).ready(function(){
///////////////////////////////////////////





////////////////////////////////////////////
	//refresh the chat page
	$(".refresh").everyTime(400,function(i){
			$.ajax({
			  url: "/churchadmin/refreshchatpost/<?php echo @$data['chat_user_id'] ?>/?mode=<?php echo @$data['chat_login_time'];  ?>",
			  cache: false,
			  success: function(html){
				$(".refresh").html(html);
			  }
			});
		});

	////////////////end refresh //////////////////
	
	
	////////savepost to all chat mesagges /////////
	
	$('#cmd_post_chatmsg').click(function(){
		
		$.ajax({
			 type: "POST",
				   url:	"/churchadmin/savechatpost",
				   data: $('#frmchat').serialize(),
				   success:	function(e){
					   //alert(e);return false;
						 $('.refresh').css({color:"green"});
						 $('#textb').attr('value', '');
					  	
				   } //end function success

		});//end ajax
	
		return false;
	});  //end click event
	
	//////////end save post//////////////////////
	return false;
});  //end document.ready

</script>
<style type="text/css">
.refresh {
    border: 1px solid #3366FF;
	border-left: 4px solid #3366FF;
    color: green;
    font-family: tahoma;
    font-size: 12px;
    height: 225px;
    overflow: auto;
    width: 400px;
	padding:10px;
	background-color:#FFFFFF;
}
#cmd_post_chatmsg{
	border: 1px solid #3366FF;
	background-color:#3366FF;
	width: 100px;
	color:#FFFFFF;
	font-weight: bold;
	margin-left: -105px; padding-top: 4px; padding-bottom: 4px;
	cursor:pointer;
}
#textb{
	border: 1px solid #3366FF;
	border-left: 4px solid #3366FF;
	width: 320px;
	margin-top: 10px; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; width: 415px;
}
#texta{
	border: 1px solid #3366FF;
	border-left: 4px solid #3366FF;
	width: 410px;
	margin-bottom: 10px;
	padding:5px;
}
p{
border-top: 1px solid #EEEEEE;
margin-top: 0px; margin-bottom: 5px; padding-top: 5px;
}
span{
	font-weight: bold;
	color: #3B5998;
}
</style>
</head>
<body style="position:absolute; left:0; top:90;" class="fixed">
<div class="cls_form" style="width:100%">
<form method="POST" name="frmchat" action="" id="frmchat" style="width:100%;">
<input name="chat_name" type="text" id="texta" value="Chat Name: <?php echo @$page_res['name_of_user'] ?>" readonly="readonly" style="font-weight:bolder;"/>

<input name="user_full_name" type="text" id="texta" value="Conversation with : <?php echo @$data['full_name'] ?>" readonly="readonly" style="font-weight:bolder;"/>


<input name="sender_account_name" type="hidden" id="texta" value="<?php echo @$page_res['logged_in_account'] ?>" readonly="readonly" style="font-weight:bolder;"/>
<input name="receiver_account_id" type="hidden" id="texta" value="<?php echo @$data['chat_user_id'];   ?>" readonly="readonly" style="font-weight:bolder;"/>

<input name="chat_login_time" type="hidden" id="texta" value="<?php echo @$data['chat_login_time'];   ?>" readonly="readonly" style="font-weight:bolder;"/>

<div class="refresh"></div>
<input name="message" type="text" id="textb"/>
<input name="submit" type="submit" value="Chat" id="cmd_post_chatmsg" />
</form>
</div>
<style>
.fixed {
  position: fixed !important;
  top: 0 !important;
  bottom: 0 !important;
  left: 0;
  right: 0;
}
</style>
<script>

$('.fixed').resizable({
  handles: "n"
});
</script>

</body>
</html>
