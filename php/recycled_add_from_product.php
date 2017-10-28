<?
//==========================================
require_once("mysql.php");
//==========================================

//echo $_POST['artikul']."-".$_POST['key']."-".$_POST['count'];

$db=db_connect();
$query="select * from db_basket where user_hash='".$_POST['key']."' and artikul=".$_POST['artikul'];
$res=mysql_query($query);
if (mysql_num_rows($res)==1) {
	$query="update db_basket set count=count+".$_POST['count']." where user_hash='".$_POST['key']."' and artikul=".$_POST['artikul'];
	mysql_query($query);	
	$query="select sum(count+box_count+lavanda_count) from db_basket where user_hash='".$_POST['key']."'";
	$res=mysql_query($query);
	$data=mysql_fetch_row($res);
	echo $data[0];
	mysql_close($db);
	exit;
}

if (mysql_num_rows($res)==0) {
	$query="insert into db_basket (user_hash,artikul,count) values('".$_POST['key']."','".$_POST['artikul']."',".$_POST['count'].")";
	mysql_query($query);
	$query="UPDATE db_basket SET hash_date = NOW() where user_hash='".$_POST['key']."'";
	mysql_query($query);
	$query="select sum(count+box_count+lavanda_count) from db_basket where user_hash='".$_POST['key']."'";
	$res=mysql_query($query);
	$data=mysql_fetch_row($res);
	echo $data[0];
	mysql_close($db);
	exit;
}

echo "0";

mysql_close($db);


?>