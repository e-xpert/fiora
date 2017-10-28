<?
    setcookie('login', 0, time()+60*60*24*30, '/');
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: https://myfiora.com/');
    exit();
?>
