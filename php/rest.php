<?
//==========================================
require_once("mysql.php");
//==========================================

function get_rest($country_uid,$col_uid) {
	if ($col_uid>0) {
			$add_text=" and r.col_uid=".$col_uid;
		}   else { $add_text=""; }
	$db=db_connect();

	$query="
		SELECT 
			r.artikul,
			r.price,
			r.price_old,			
			r.rest,
			r.art_visible,
			r.col_uid,
			c.col_name,
			c.col_order,
			c.col_root_uid,
			c.col_visible,
			r.form_uid,
			f.form_name,
			f.form_order,
			f.form_visible,
			r.art_new,
			f.form_x,
			f.form_y,
			f.form_z,
			r.box,
			r.lavanda
		FROM db_rest as r
		LEFT JOIN db_collection as c
			ON r.col_uid=c.col_uid

		LEFT JOIN db_form as f
			ON r.form_uid=f.form_uid

		where r.country_uid=".$country_uid." ".$add_text."

		and c.col_visible=1
		and r.art_visible=1

		order by 
			c.col_order asc,
			f.form_order asc,
			r.art_order asc,
			r.price asc
	";

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


function get_city_price($city_uid,$artikul) {
	$db=db_connect();
	$query="
		SELECT 
			rest,
			price,
			price_new
		FROM db_rest_city
		where city_uid=".$city_uid." 
		and artikul=".$artikul."
	";

	$res=mysql_query($query);
	$res_num=mysql_num_rows($res);
	if ($res_num>0) {
			$data=mysql_fetch_row($res);
			return($data);
	} else return(0);

	mysql_close($db);
}





?>