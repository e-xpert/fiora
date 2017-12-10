<?
//==========================================
require_once("mysql.php");
//==========================================

function get_card_collection() {
	$db=db_connect();

	$query="select * from card_collection";
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
function get_card_rest($col_id) {
    $db=db_connect();

    $query="SELECT * FROM card_rest where col_id=" . (int) $col_id;
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

function get_card($artikul) {
    $db=db_connect();

    $query="SELECT * FROM card_rest where artikul=" . (int) $artikul;
    $res=mysql_query($query);
    $res_num=mysql_num_rows($res);
    if ($res_num==1) {
        $data=mysql_fetch_row($res);
        return($data);
    }
    else return(0);

    mysql_close($db);
}

?>