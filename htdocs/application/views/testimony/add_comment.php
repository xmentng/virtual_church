<link href="/dependencies/screen.css" type="text/css" rel="stylesheet" />
<?php
	include('dbcon.php');
	
	function checkValues($value)
	{
		 // Use this function on all those values where you want to check for both sql injection and cross site scripting
		 //Trim the value
		 $value = trim($value);
		 
		// Stripslashes
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		
		 // Convert all &lt;, &gt; etc. to normal html and then strip these
		 $value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
		
		 // Strip HTML Tags
		 $value = strip_tags($value);
		
		// Quote the value
		$value = mysql_real_escape_string($value);
		$value = htmlspecialchars ($value);
		return $value;
		
	}	
	$fid = $_REQUEST['fid'];
	if(checkValues($_REQUEST['comment_text']) && $_REQUEST['post_id'])
	{
		$userip = $_SERVER['REMOTE_ADDR'];
		
		mysql_query("INSERT INTO testimony_posts_comments (post_id,comments,userip,date_created,f_id) VALUES('".$_REQUEST['post_id']."','".checkValues($_REQUEST['comment_text'])."','".$userip."','".strtotime(date("Y-m-d H:i:s"))."','$fid')");
		
		$result = mysql_query("SELECT *,
		UNIX_TIMESTAMP() - date_created AS CommentTimeSpent FROM testimony_posts_comments order by c_id desc limit 1");
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
	while ($rows = mysql_fetch_array($result))
	{
		$days2 = floor($rows['CommentTimeSpent'] / (60 * 60 * 24));
		$remainder = $rows['CommentTimeSpent'] % (60 * 60 * 24);
		$hours = floor($remainder / (60 * 60));
		$remainder = $remainder % (60 * 60);
		$minutes = floor($remainder / 60);
		$seconds = $remainder % 60;	?>
		<div  class="commentPanel" id="record-<?php  echo $rows['c_id'];?>" align="left">
        <?php
					$result15 = mysql_query("SELECT Fist_Name,Last_Name,pics,id FROM users where id = '$fid'");
		   
		   $row5 = mysql_fetch_array($result15);
					  //echo $row5['Fist_Name']; echo ' ';echo $row5['Last_Name'];?>
                                                  <?php 
$pics1 = $row5['pics'];
?>

			<img src=" <?php echo "/picdisplay.php?dm=".base64_encode('30X30').'&pt='.base64_encode("pics/$pics1"); ?>"  style="float:left;" alt="<?php echo "$row5[Fist_Name] $row5[Last_Name]";?>"class="CommentImg"  />
<strong style=" text-align:left; margin-left:5px; float:left; color:#036 ;font-weight:bold;"> <?php echo "$row5[Fist_Name] $row5[Last_Name]";?></strong><label class="postedComments">
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

		
		
		
		