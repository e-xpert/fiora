<?

require_once("location/SxGeo.php");
$SxGeo = new SxGeo('location/SxGeoCity.dat');
$ip=getenv('REMOTE_ADDR');
$data=$SxGeo->get($ip);

extract($data);

extract($city);

$getpos_city=mb_strtolower($name_ru,'utf-8');
$getpos_id=mb_strtolower($id,'utf-8');



function db_connect() {
	$u_log="mailbo1t_price";
	$u_pas="10041505";
	$db=mysql_connect('localhost',$u_log,$u_pas);
	if (isset($db)) {
		mysql_select_db('mailbo1t_price',$db);
		mysql_query("SET NAMES 'utf8");
		mysql_query("SET CHARACTER SET 'utf8'");
		mysql_query("SET time_zone = 'Europe/Minsk'");
		return($db);
	}
	else {
		return("0");
	}
}

$db=0;
$db=db_connect();

if ($db<>0) {
	$query="insert into db_city(city_name,city_id) values('".$getpos_city."',".$getpos_id.")";
	echo $query;
	$res=mysql_query($query);
	mysql_close($db);
}


?>