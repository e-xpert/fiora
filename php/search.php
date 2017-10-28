<?
//==========================================
require_once("mysql.php");
//==========================================

$request = $_POST['request'];

$db = db_connect();
$query = '
    SELECT
        r.artikul,
        c.col_name,
        f.form_name,
        r.price_old,
        r.ext_glass
    FROM
        db_rest as r
        LEFT JOIN db_collection as c ON r.col_uid = c.col_uid
        LEFT JOIN db_form as f ON r.form_uid = f.form_uid
    where
        c.col_visible = 1
        and r.art_visible = 1
        AND (
            r.artikul LIKE "%'.$request.'%"
            or c.col_name LIKE "%'.$request.'%"
            or f.form_name LIKE "%'.$request.'%"
        )
    order by
        c.col_order asc,
        f.form_order asc,
        r.art_order asc,
        r.price asc
    limit 3';
$res = mysql_query($query);
$res_num = mysql_num_rows($res);
if ($res_num == 0) {
    $data = 0;
} else {
    for($res_i = 0; $res_i < $res_num; $res_i++) {
        $data[] = mysql_fetch_row($res);
    }
}

print_r(json_encode($data));

mysql_close($db);
?>
