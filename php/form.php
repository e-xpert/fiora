<?
//==========================================
require_once("mysql.php");
//==========================================

function get_form() {
	$db=db_connect();

	$query="select * from db_form where order by form_order asc";	
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