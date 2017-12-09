<?

$path_php="http://fiora/php/";
$path_domen="http://336265.ru/fiora/";

function db_connect() {
	$db=mysql_connect('localhost',"root","");
	if (isset($db)) {
		mysql_select_db('fiora',$db);
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
