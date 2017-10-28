<?
//==========================================
require_once("mysql.php");
//==========================================
function check_city ( $city_uid , $city_name , $region_uid , $region_name ) {
	$db=db_connect();
	$query="select * from db_city where city_uid=".$city_uid;
	$res=mysql_query($query);
	$res_count=mysql_num_rows($res);
	if ($res_count==0) {
		$query="insert into db_city(city_uid,city_name,region_uid,region_name) values(".$city_uid.",'".$city_name."',".$region_uid.",'".$region_name."')";
		if ( mysql_query($query) ) {
			return(1);
		} else { return('err_insert'); }
	} else { return(0); }
	mysql_close($db);
}

// список соседних городов
function get_city_root($root_uid) {
	$db=db_connect();
	$query="select * from db_city_root where city_root_uid=".$root_uid;
	$res=mysql_query($query);
	$res_num=mysql_num_rows($res);
	if ($res_num>0) {
		for ($res_i=0;$res_i<$res_num;$res_i++) {
			$data[$res_i]=mysql_fetch_row($res);
		}
		return($data);
	} else return(0);
	mysql_close($db);
}

?>
