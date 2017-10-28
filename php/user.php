<?
//==========================================
require_once("mysql.php");
//==========================================

function reg_user($session_name,$ip,$geo_country_id,$geo_region_id,$geo_city_id) {
	$db=db_connect();
	$query="select * from db_session where user_hash='".$session_name."'";
	$res=mysql_query($query);
	if (mysql_num_rows($res)==1) {
		$query="update db_session set 
		ip='".$ip."',
		country_uid=".$geo_country_id.",
		region_uid=".$geo_region_id.",
		city_uid=".$geo_city_id.",
		session_date=NOW()
		where user_hash='".$session_name."'";
		mysql_query($query);
		return('update');
	} else {
		$query="
			insert into db_session (
				user_hash,
				ip,
				country_uid,
				region_uid,
				city_uid,
			)
			values (
				'".$session_name."',
				'".$ip."',
				".$geo_country_id.",
				".$geo_region_id.",
				".$geo_city_id."
			)
		";
		mysql_query($query);
		return('insert');
	}

	mysql_close($db);
}

?>