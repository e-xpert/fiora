<?
//==========================================
require_once("mysql.php");
//==========================================

$db=db_connect();
$query="select * from db_basket where user_hash='".$_POST['key']."' and artikul=".$_POST['artikul'];
$res=mysql_query($query);
if (mysql_num_rows($res)==1) {
	$query="update db_basket set count=count-1 where user_hash='".$_POST['key']."' and artikul=".$_POST['artikul'];
	mysql_query($query);	
	$query="select sum(count+box_count+lavanda_count) from db_basket where user_hash='".$_POST['key']."'";
	$res=mysql_query($query);
	$data=mysql_fetch_row($res);
	echo $data[0];
	mysql_close($db);
	exit;
}

?>