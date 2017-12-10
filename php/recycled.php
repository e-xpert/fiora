<?
//==========================================
require_once("mysql.php");
//==========================================

function get_basket_count($user_hash) {
	$db=db_connect();
	$query="select sum(count+box_count+lavanda_count) from db_basket where user_hash='".$user_hash."'";
	$res=mysql_query($query);
	$data=mysql_fetch_row($res);
	if ($data[0]>0) { echo $data[0]; }
	else {echo "0";}
	mysql_close($db);
}

function get_basket($user_hash) {
	$db=db_connect();
	$query="select * from db_basket where user_hash='".$user_hash."' order by `from` desc";
	$res=mysql_query($query);
	$res_count=mysql_num_rows($res);
	for ($i=0;$i<$res_count;$i++) {
		$data[$i]=mysql_fetch_row($res);
	}
	return($data);
	mysql_close($db);
}

function get_order($user_hash) {
	$db=db_connect();
	$query="select * from db_order where user_hash='".$user_hash."' order by uid desc";
	$res=mysql_query($query);
	$res_count=mysql_num_rows($res);
	if ($res_count>0) {
		$data=mysql_fetch_row($res);
	}
	return($data);
	mysql_close($db);
}

function get_reserve_time($user_hash) {

	$db=db_connect();
	$query="select hash_date from db_basket where user_hash='".$user_hash."' LIMIT 1";
	$res=mysql_query($query);
	$data=mysql_fetch_row($res);
	mysql_close($db);

	return is_array($data) ? $data[0] : false;
}

function clear_outdated() {
	$db=db_connect();
	$query='DELETE FROM db_basket WHERE DATE_ADD(hash_date, INTERVAL 3 hour) < NOW()';
	$res=mysql_query($query);
	mysql_close($db);
}

?>