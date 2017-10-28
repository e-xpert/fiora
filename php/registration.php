<?
//==========================================
require_once("mysql.php");
//==========================================
$db=db_connect();

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
    $spam = (isset($_POST['spam'])) ? $_POST['spam'] : 0 ;
    $query="
        insert into
            db_users (name, email, phone, spam, date_reg)
            values('".$_POST['name']."','".$_POST['email']."','".$_POST['phone']."','".$spam."', '".date("Y-m-d H:i:s")."')";
    mysql_query($query);
} else {
    # code...
}

mysql_close($db);
?>
