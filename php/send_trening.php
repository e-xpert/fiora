<?
$subject = 'Заявка на онлайн-тренинг на myfiora.com';

$message="
	<html><head><meta charset='utf-8'></head>
		<body>
		
		" . $subject . "</b><br><br>
		Имя: <b>".$_POST['name']."</b><br><br>
		Телефон: <b>".$_POST['phone']."</b><br><br>
		Email: <b>".$_POST['email']."</b><br><br>
		Есть согласие с правилами обработки персональных данных
	
		</body>
	</html>
";

$to  = 'myfiora@yandex.ru ';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: ТМ Fi’ora<order@myfiora.com>' . "\r\n";

mail($to, $subject, $message, $headers, '-forder@myfiora.com');
?>
