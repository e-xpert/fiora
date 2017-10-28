<?

//==========================================
require_once("php/mysql.php");
//==========================================

// регистрационная информация (пароль #1)
// registration info (password #1)
$mrh_pass1 = "PD8xNqafDpn1F173BKlQ";

// чтение параметров
// read parameters
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$shp_item = $_REQUEST["Shp_item"];
$crc = $_REQUEST["SignatureValue"];


$crc = strtoupper($crc);

$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item"));

/*

// проверка корректности подписи
// check signature
if ($my_crc != $crc)
{
  echo "bad sign\n";
  exit();
}
*/


	$db=db_connect();
	$query="update db_order set pay_status=1, pay_summa='".$out_summ."' where uid=".$inv_id;
	mysql_query($query);
	mysql_close($db);

		
//		}




?>














?>