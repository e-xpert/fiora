<?
$count = $file = file_get_contents('order_count.txt') + 1;
$handle = fopen('order_count.txt', 'w');
fwrite($handle, $count);
fclose($handle);

$subject = 'Заявка на бизнес на myfiora.com №' . str_pad($count, 3, '0', STR_PAD_LEFT) . ' от ' . date('d.m.Y');

$message="
	<html><head><meta charset='utf-8'></head>
		<body>
		
		" . $subject . "
		Город: <b>".$_POST['city']."</b><br><br>
		Имя: <b>".$_POST['name']."</b><br><br>
		Телефон: <b>".$_POST['phone']."</b><br><br>
		e-mail: <b>".$_POST['email']."</b><br><br>
		Комментарий: ".$_POST['comment']."
	
		</body>
	</html>
";

$to  = 'myfiora@yandex.ru ';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: ТМ Fi’ora <no_reply@myfiora.com>' . "\r\n";

mail($to, $subject, $message, $headers);
?>
