<?
//==========================================
require_once("mysql.php");
//==========================================

$db=db_connect();
	$query="update db_basket set box_count=0, lavanda_count=1 where user_hash='".$_POST['key']."' and artikul=".$_POST['artikul'];
	mysql_query($query);	
	$query="select sum(count+box_count+lavanda_count) from db_basket where user_hash='".$_POST['key']."'";
	$res=mysql_query($query);
	$data=mysql_fetch_row($res);
	echo $data[0];
	mysql_close($db);
	exit;

?>