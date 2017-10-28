<?
//==========================================
require_once("mysql.php");
//==========================================

	$user_hash=$_POST['key'];
	$db=db_connect();
	$query="select * from db_order where user_hash='".$user_hash."' order by uid desc";
	$res=mysql_query($query);
	$res_count=mysql_num_rows($res);
	if ($res_count>0) {
		$data=mysql_fetch_row($res);
	}
	echo $data[0];
	mysql_close($db);


?>