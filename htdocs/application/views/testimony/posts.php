<link href="/dependencies/screen.css" type="text/css" rel="stylesheet" />
	<?php
	error_reporting(0);
	//include('dbcon.php');
	//session_start();
	$id	=$page_res['session_id'];
	

	function checkValues($value)
	{
		 $value = trim($value);
		 
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		
		 $value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
		
		 $value = strip_tags($value);
		$value = mysql_real_escape_string($value);
		$value = htmlspecialchars ($value);
		return $value;
		
	}	
	
	function clickable_link($text = '')
	{
		$text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $text);
		$ret = ' ' . $text;
		$ret = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
		
		$ret = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
		$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
		$ret = substr($ret, 1);
		return $ret;
	}

	$next_records = 10;
	$show_more_button = 0;
	$name = $_POST['name'];
	$code = $_POST['code'];
	if(checkValues($_REQUEST['value']))
	{
		//$name = $_POST['name'];
		$userip = $_SERVER['REMOTE_ADDR'];
		/* "INSERT INTO testimony_posts (post,f_name,userip,date_created,user_id) VALUES('".checkValues($_REQUEST['value'])."','".$name."','".$userip."','".strtotime(date("Y-m-d H:i:s"))."','".$id."')";
		
		mysql_query("INSERT INTO testimony_posts (post,f_name,userip,user_id,date_created) VALUES('".checkValues($_REQUEST['value'])."','".$name."','".$userip."','".$id."','".strtotime(date("Y-m-d H:i:s"))."')");*/
	
		$result = mysql_query("SELECT *,
		UNIX_TIMESTAMP() - time_posted AS TimeSpent FROM tbl_testimonies,tbl_users where tbl_testimonies.user_name =tbl_users.user_name  order by id desc limit 1");
	
	}
	elseif($_REQUEST['show_more_post']) // more posting paging
	{
		$next_records = $_REQUEST['show_more_post'] + 10;
		
		$result = mysql_query("SELECT *,
		UNIX_TIMESTAMP() - time_posted AS TimeSpent FROM tbl_testimonies,tbl_users where tbl_testimonies.user_name =tbl_users.user_name order by id desc limit ".$_REQUEST['show_more_post'].", 10");
		
		$check_res = mysql_query("SELECT * FROM tbl_testimonies,tbl_users where tbl_testimonies.user_name =tbl_users.user_name order by id desc limit ".$next_records.", 10");
		
		$show_more_button = 0; // button in the end
		
		$check_result = mysql_num_rows(@$check_res);
		if($check_result > 0)
		{
			$show_more_button = 1;
		}
	}
	else
	{	
		$show_more_button = 1;
		$result = mysql_query("SELECT *,
		UNIX_TIMESTAMP() - date_created AS TimeSpent FROM testimony_posts,users where testimony_posts.user_id =users.id  order by p_id desc limit 0,10");
		
	}
	
	while ($row = mysql_fetch_array($result))
	{
		$comments = mysql_query("SELECT *,
		UNIX_TIMESTAMP() - date_created AS CommentTimeSpent FROM testimony_posts_comments,users where testimony_posts_comments.f_id =users.id and post_id = ".$row['p_id']." order by c_id asc");		?>
        <div class="commentWr">
       <div class="friends_area" id="record-<?php  echo $row['p_id'];?>">
<?php 
$pics = $row['pics'];
?>
	   <img src="<?php echo "/picdisplay.php?dm=".base64_encode('40X40').'&pt='.base64_encode("pics/$pics"); ?>" style="float:left;" alt="<?php echo "$row[Fist_Name] $row[Last_Name]";?>" />

		   <label style="float:left" class="name">

		   <b><strong><?php echo "$row[Fist_Name] $row[Last_Name]";?></strong></b>

		   <em><?php  echo clickable_link($row['post']);?></em>
		   <br clear="all" />

		   <span>
		   <?php  
		   $net_vote = $row['votes_up'] - $row['votes_down'];?>
		   	<span class='votes_count' id='votes_count<?php echo $row['p_id']; ?>'><?php echo $net_vote." like"; ?></span>
            <?php
			 $p_id =$row['p_id'];
			 $userip = $_SERVER['REMOTE_ADDR'];
			$check_res1 = mysql_query("SELECT * FROM testimony_voting where p_id = '$p_id' and ip_address='$userip' ");

		
		$check_result1 = mysql_num_rows(@$check_res1);
		
		if ($check_result1 =='0'){?>
        
            <span class='vote_buttons' id='vote_buttons<?php echo $row['p_id']; ?>'>
		<a href='javascript:;' class='vote_up' id='<?php echo $row['p_id']; ?>'>LIKES!</a>
		<a href='javascript:;' class='vote_down' id='<?php echo $row['p_id']; ?>'></a>
	</span>
    
     
			<?php
		}
		else{}
		?>
        <a href="javascript: void(0)" id="post_id<?php  echo $row['p_id']?>" class="showCommentBox">Comments</a><BR />
        <?php
		   echo strtotime($row['date_created'],"Y-m-d H:i:s");
   		    
		    $days = floor($row['TimeSpent'] / (60 * 60 * 24));
			$remainder = $row['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
			
			if($days > 0)
			echo date('F d Y', $row['date_created']);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes ago';
			else
			echo "few seconds ago";	
			
		   ?>
		   
		   </span>
		  

		   </label>
		   <?php
			$userip = $_SERVER['REMOTE_ADDR'];
			if($row['userip'] == $userip){?>
		  	<a href="#" class="delete"> Remove</a>
		   <?php
			}?>
		    <br clear="all" />
			<div id="CommentPosted<?php  echo $row['p_id']?>" style=" width:89%;  background:#e4e4e4;
	margin-right:5%;
	margin-left:6%;
	margin-top:0px;">
				<?php
				$comment_num_row = mysql_num_rows(@$comments);
				if($comment_num_row > 0)
				{
					while ($rows = mysql_fetch_array($comments))
					{
						$days2 = floor($rows['CommentTimeSpent'] / (60 * 60 * 24));
						$remainder = $rows['CommentTimeSpent'] % (60 * 60 * 24);
						$hours = floor($remainder / (60 * 60));
						$remainder = $remainder % (60 * 60);
						$minutes = floor($remainder / 60);
						$seconds = $remainder % 60;						
						?>
					<div class="commentPanel" id="record-<?php  echo $rows['c_id'];?>" align="left">
                   
                            <?php 
$pics1 = $rows['pics'];
?>
			<img src=" <?php echo "/picdisplay.php?dm=".base64_encode('30X30').'&pt='.base64_encode("pics/$pics1"); ?>"  style="float:left;" alt="<?php echo "$rows[Fist_Name] $rows[Last_Name]";?>"class="CommentImg"  />
<strong style=" text-align:left; margin-left:5px; float:left; color:#036 ;font-weight:bold;"> <?php echo "$rows[Fist_Name] $rows[Last_Name]";?></strong>

						<label class="postedComments">
							<?php  echo clickable_link($rows['comments']);?>
						</label>
						<br clear="all" />
						<span style="margin-left:43px; color:#666666; font-size:11px">
						<?php
						
						if($days2 > 0)
						echo date('F d Y', $rows['date_created']);
						elseif($days2 == 0 && $hours == 0 && $minutes == 0)
						echo "few seconds ago";		
						elseif($days2 == 0 && $hours == 0)
						echo $minutes.' minutes ago';
						else
			echo "few seconds ago";	
						?>
						</span>
						<?php
						$userip = $_SERVER['REMOTE_ADDR'];
						if($rows['userip'] == $userip){?>
						&nbsp;&nbsp;<a href="#" id="CID-<?php  echo $rows['c_id'];?>" class="c_delete">Delete</a>
						<?php
						}?>
					</div>
					<?php
					}?>				
					<?php
				}?>
			</div>
			<div class="commentBox" align="right" id="commentBox-<?php  echo $row['p_id'];?>" <?php echo (($comment_num_row) ? '' :'style="display:none"')?>>
            <?php
					$result15 = mysql_query("SELECT Fist_Name,Last_Name,pics,id FROM users where id = '$id'");
		   
		   $row5 = mysql_fetch_array($result15);
					?>
                   
                                                  <?php 
$pics1 = $row5['pics'];
?>
			<img src="<?php echo "/picdisplay.php?dm=".base64_encode('30X30').'&pt='.base64_encode("pics/$pics1"); ?>" style="float:left;" alt="<?php echo "$row5[Fist_Name] $row5[Last_Name]";?>"class="CommentImg"  />

 <strong style=" text-align:left; margin-left:5px; float:left; color:#036 ;font-weight:bold;">
                    <?php  echo $row5['Fist_Name']; echo ' ';echo $row5['Last_Name'];?>
                    </strong>
				<label id="record-<?php  echo $row['p_id'];?>">
                 <input type="hidden" name="fid" id="fid" value="<?php echo $id;?>" />
					<textarea class="commentMark" id="commentMark-<?php  echo $row['p_id'];?>" name="commentMark" cols="60"></textarea>
				</label>
				<br clear="all" />
				<a id="SubmitComment" class="small button1 comment"> Comment</a>
			</div>
	   </div></div>
       
	<?php
	}
	if($show_more_button == 1){?>
	<div id="bottomMoreButton">
	<a id="more_<?php echo @$next_records?>" class="more_records" href="javascript: void(0)">Older Posts</a>
	</div>
	<?php
	}?>
	