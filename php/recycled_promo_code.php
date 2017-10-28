<?
//==========================================
require_once("mysql.php");
//==========================================

	$code=$_POST['promo_code'];
	$key=$_POST['key'];
	if ( (strlen($key)==32)and(strlen($code)>5) ){
		$db=db_connect();
		$query="
			SELECT 
				*
			FROM db_promo 
			where promo_code='".$code."'
		";

		$res=mysql_query($query);
		$res_num=mysql_num_rows($res);
		if ($res_num==1) {
				$data=mysql_fetch_row($res);
				echo $data[4];
				mysql_close($db);
				exit();
		}
		else {
			echo "0";
			mysql_close($db);
			exit();		
		}
	} else 
		echo "0";
?>