<?

$path_php="http://fiora-rf.su/php/";
$path_domen="http://336265.ru/fiora/";

function db_connect() {
	$db=mysql_connect('localhost',"u0298238_fiora","binom_1004");
	if (isset($db)) {
		mysql_select_db('u0298238_route_fiora_db',$db);
		mysql_query("SET NAMES 'utf8");
		mysql_query("SET CHARACTER SET 'utf8'");
		mysql_query("SET time_zone = 'Europe/Minsk'");
		return($db);
	}
	else {
		return("0");
	}
}

?>
