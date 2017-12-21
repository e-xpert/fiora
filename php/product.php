<?
//==========================================
require_once("mysql.php");
//==========================================

function get_product($artikul,$country_uid) {
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
			r.lavanda,
			f.form_name_short,
			f.form_material,
			r.ext_glass,
			r.art_flowers,
			r.art_flowers_add,
			r.art_desc,
			a.name,
			a.uid
		FROM db_rest as r
		LEFT JOIN db_action as a
			ON r.art_action=a.uid

		LEFT JOIN db_collection as c
			ON r.col_uid=c.col_uid

		LEFT JOIN db_form as f
			ON r.form_uid=f.form_uid

		where r.country_uid=".$country_uid."
		and r.artikul=".$artikul."
		and c.col_visible=1
		and r.art_visible=1
	";

	$res=mysql_query($query);     
	$res_num=mysql_num_rows($res);
	if ($res_num==1) {
			$data=mysql_fetch_row($res);
			return($data);
		}
	else return(0);

	mysql_close($db);
}

function get_other_color($form_uid,$artikul,$country_uid) {
	$db=db_connect();
	$query="
		SELECT 
			artikul
		FROM db_rest 
		where country_uid=".$country_uid."
		and artikul<>".$artikul."
		and form_uid=".$form_uid."
		and art_visible=1
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

function get_other_forms($col_uid,$form,$country_uid) {
	$db=db_connect();
	$query="
		SELECT 
			r.artikul,
			r.price,
			r.art_visible,
			r.col_uid,
			c.col_name,
			c.col_visible,
			r.form_uid,
			f.form_name,
			f.form_x,
			f.form_y,
			f.form_z
		FROM db_rest as r
		LEFT JOIN db_collection as c
			ON r.col_uid=c.col_uid

		LEFT JOIN db_form as f
			ON r.form_uid=f.form_uid

		where r.country_uid=".$country_uid."
		and r.form_uid<>".$form."
		and r.col_uid=".$col_uid."
		and r.art_visible=1
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





?>