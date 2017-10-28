<?
//==========================================
require_once("mysql.php");
//==========================================
$db=db_connect();

if (isset($_POST['email']) && isset($_POST['phone'])) {
    $query = '
        SELECT count(*)
        FROM db_users
        WHERE email = "'.$_POST['email'].'" AND phone = "'.$_POST['phone'].'"';
    $res = mysql_query($query);
    if ($res != 0) {
        setcookie('login', 1, time()+60*60*24*30, '/');
    }
}
header("HTTP/1.1 301 Moved Permanently");
header('Location: https://myfiora.com/');
mysql_close($db);
exit();
?>
