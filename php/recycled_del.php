<?
//==========================================
require_once("mysql.php");
//==========================================

//echo $_POST['artikul']."-".$_POST['key'];

$db=db_connect();
$query="delete from db_basket where user_hash='".$_POST['key']."' and artikul=".$_POST['artikul'];
if (mysql_query($query)) {
	echo "1";
	mysql_close($db);
	exit;
}

mysql_close($db);
echo "0";

?>