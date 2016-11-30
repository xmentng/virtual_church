<?php
include('dbcon.php');
session_start();
$ip=$_SERVER['REMOTE_ADDR']; 
$id2=$_SESSION['id'];
function getAllVotes($id)
	{
	/**
	Returns an array whose first element is votes_up and the second one is votes_down
	**/
	$votes = array();
	$q = "SELECT * FROM testimony_posts WHERE p_id = $id";
	$r = mysql_query($q);
	if(mysql_num_rows($r)==1)//id found in the table
		{
		$row = mysql_fetch_assoc($r);
		$votes[0] = $row['votes_up'];
		$votes[1] = $row['votes_down'];
		}
	return $votes;
	}

function getEffectiveVotes($id)
	{
	/**
	Returns an integer
	**/
	$votes = getAllVotes($id);
	$effectiveVote = $votes[0] - $votes[1];
	return $effectiveVote;
	}

$id = $_POST['id'];
$action = $_POST['action'];

//get the current votes
$cur_votes = getAllVotes($id);

//ok, now update the votes

$b = "insert into testimony_voting set
       p_id ='$id',
	   ip_address ='$ip',
	   user_id ='$id2'";
	   mysql_query($b);
if($action=='vote_up') //voting up
{
	$votes_up = $cur_votes[0]+1;
	$q = "UPDATE testimony_posts SET votes_up = $votes_up WHERE p_id = '$id' ";
}
elseif($action=='vote_down') //voting down
{
	$votes_down = $cur_votes[1]+1;
	$q = "UPDATE testimony_posts SET votes_down = $votes_down WHERE p_id = '$id' ";
}

$r = mysql_query($q);
if($r) //voting done
	{
	$effectiveVote = getEffectiveVotes($id);
	echo $effectiveVote." Likes";
	}
elseif(!$r) //voting failed
	{
	echo "Failed!";
	}
?>