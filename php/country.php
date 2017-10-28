<?
//==========================================
require_once("mysql.php");
//==========================================

function check_country($country_uid,$country_code) {
	$db=db_connect();
	$query="select * from db_country where country_uid=".$country_uid;
	$res=mysql_query($query);
	$res_count=mysql_num_rows($res);
	if ($res_count==0) {
		$query="insert into db_country(country_uid,country_code) values(".$country_uid.",'".$country_code."')";
		mysql_query($query);
	}
	mysql_close($db);
}

?>